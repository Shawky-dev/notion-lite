<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function showCreateSection(string $board_id)
    {
        return view('section.create-section', ['board_id' => $board_id]);
    }
    public function createSection(Request $request, string $board_id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $section = Section::create([
            'name' => $validated['name'],
            'board_id' => $board_id
        ]);

        return redirect('/board/' . $board_id);
    }
}
