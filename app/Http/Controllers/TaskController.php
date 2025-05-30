<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function updateStatus(Request $request, string $task_id)
    {
        $task = Task::findOrFail($task_id);

        $task->status = filter_var($request->input('is_completed'), FILTER_VALIDATE_BOOLEAN);
        $task->save();

        return response()->json(['success' => true, 'new_status' => $task->status]);
    }
    public function showCreateTask(string $board_id, string $section_id)
    {
        return view('task.create-task', ['board_id' => $board_id, 'section_id' => $section_id]);
    }
    public function createTask(Request $request, string $board_id, string $section_id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $user = Auth::user();

        $task = Task::create([
            'section_id' => $section_id,
            'name' => $validated['name'],
            'user_id' => $user->id,
            'status' => false,
        ]);

        return redirect('/board/' . $board_id);
    }
    public function showTask(string $task_id)
    {
        $task = Task::with(['section', 'user'])->findOrFail($task_id);
        return view('task.show', ['task' => $task]);
    }
    public function showEditTask(string $task_id)
    {
        $task = Task::with(['section', 'user'])->findOrFail($task_id);
        $sections = Section::where('board_id', $task->section->board_id)->get();
        return view('task.edit', ['task' => $task, 'sections' => $sections]);
    }
    public function editTask(Request $request, string $task_id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            "section_id" => "required|int",
            'status' => 'required|boolean',
        ]);

        $task = Task::findOrFail($request->input('task_id'));
        $task->name = $validated['name'];
        $task->section_id = $validated['section_id'];
        $task->status = $validated['status'];
        $task->save();
        return redirect('/board/' . $task->section->board_id);
    }
    public function deleteTask(string $task_id)
    {
        $task = Task::findOrFail($task_id);
        $board_id = $task->section->board_id;
        $task->delete();
        return redirect('/board/' . $board_id);
    }
}
