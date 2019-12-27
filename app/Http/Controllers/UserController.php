<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('users.show', compact('users'));
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:users',
            'description' => 'required',
        ]);
        
        User::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        $message = 'User '.$validatedData['name'].' created successfully.';
        session(['message' => $message]);

        return redirect('users-list');
    }

    public function read()
    {

        $users = User::all()->count();
        return view('users.add', compact('users'));

    }

    public function edit(Request $request)
    {

        $id = $request->id;
        $user = User::where('id', $id)->first();
        $roles = Role::all();
        $user_role = Role::where('name', $user->role_id)->first();
        
        return view('users.edit', compact('id', 'user', 'role', 'user_role'));

    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->update();

        $message = 'User with the ID:'.$id.' updated successfully.';
        session(['message' => $message]);
        
        return redirect('users-list');

    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        $message = $user->name.' deleted successfully.';
        session(['message' => $message]);
        
        return redirect('users-list');
    }
}
