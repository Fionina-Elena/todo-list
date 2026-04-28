<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TodoListRequest;

class TodoListController extends Controller
{
    private function getResponse(): JsonResponse
    {
        $tasks = TodoList::all();
        return response()->json(data: [
            'status' => true,
            'message' => 'Успешно',
            'tasks' => $tasks,
        ]);
    }

    public function index(): JsonResponse
    {
        return $this->getResponse();
    }

    public function store(TodoListRequest $request): JsonResponse
    {
        TodoList::create($request->validated() + ['status' => 0]);

        return $this->getResponse();
    }

    public function update(TodoListRequest $request, $id): JsonResponse
    {
        $task = TodoList::findOrFail($id);
        $task->update($request->validated() + ['status' => 1]);

        return $this->getResponse();
    }

    public function show(int $id): JsonResponse
    {
        $task = TodoList::findOrFail($id);

        return response()->json([
            'status' => true,
            'task' => $task
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $task = TodoList::findOrFail($id);
        $task->delete();

        return $this->getResponse();
    }
}
