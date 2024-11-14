<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('user', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $status = $request->input('status') == 'active' ? 'inactive' : 'active';
        $user->update(['status' => $status]);
        return response()->json(['message' => 'berhasil update status']);
    }
}
