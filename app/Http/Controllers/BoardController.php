<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $board_id)
    {

        $board = Board::findOrFail($board_id); // This will 404 if not found

        return view('board.index', [
            'board_title' => $board->title,
            'board' => $board
        ]);
    }

    /**
     * Show the form for adding a user to the board.
     */
    public function showAddUser(string $board_id)
    {
        $board = Board::findOrFail($board_id);
        $users = \App\Models\User::whereNotIn('id', $board->users->pluck('id'))->get();

        return view('board.add-user', [
            'board' => $board,
            'users' => $users
        ]);
    }

    /**
     * Add a user to the board.
     */
    public function addUser(Request $request, string $board_id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|in:member,admin,owner'
        ]);

        $board = Board::findOrFail($board_id);
        $user = \App\Models\User::findOrFail($validated['user_id']);

        $board->addUser($user, $validated['role']);

        return redirect()->route('board.show', $board_id)->with('success', 'User added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
