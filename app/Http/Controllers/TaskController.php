<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller //CRUD controller for task
{
    /**
     * API endpoint for task list
     */
    public function index(Request $request)
    {

        $query = Task::where('user_id', Auth::id());

        //Filtering for task list
        if ($request->status) {
            switch ($request->status) {
                case 'Completed':
                    $query->where('status', 'completed');
                    break;
                case 'Pending':
                    $query->where('status', 'pending');
                    break;
                case 'In Progress':
                    $query->where('status', 'in-progress');
                    break;
            }
        }

        //Pagination of task, 10 tasks per page
        $tasks = $query->paginate(10);

        return response()->json($tasks);
    }

    /**
     * API endpoint for creating new task
     */
    public function store(TaskRequest $request)
    {
        try {
            $task = Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => 'pending',
                'user_id' => Auth::id()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Task created successfully',
                'data' => $task
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create task',
                'error' => 'Internal server error :' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * API endpoint for updatin existing task
     */
    public function update(TaskRequest $request, Task $task)
    {
        //Authorization check
        if ($task->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 403);
        }

        $task->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Task updated successfully',
            'data' => $task
        ]);
    }

    /**
     * API endpoint for deleting task
     */
    public function delete(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized Access'
            ], 403);
        }
        $task->delete();
        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully'
        ]);
    }
}
