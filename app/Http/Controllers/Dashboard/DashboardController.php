<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $userId = $user->id;


        $boards = Board::whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        return view('dashboard.index', ['name' => $user->name, 'boards' => $boards]);
    }
    public function showCreateBoard()
    {
        return view('dashboard.create-board');
    }
    public function createBoard(CreateBoardRequest $request)
    {
        $user = Auth::user();

        $board = Board::create($request->validated());

        $board->addUser($user);

        if ($board) {
            return redirect()->route('dashboard.index')->with('success', 'Board created successfully.');
        } else {
            return redirect()->route('dashboard.create-board')->withErrors(['error' => 'Failed to create the board.']);
        }
    }
}
