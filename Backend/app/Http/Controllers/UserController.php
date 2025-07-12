<?php

namespace App\Http\Controllers;

use App\Domains\Users\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Domains\Users\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function index() { return User::all(); }
    public function store(UserStoreRequest $request) {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'company_id' => $data['company_id']
        ]);
        return response()->json($user, 201);
    }
    public function show($id) { return User::findOrFail($id); }
    public function update(UserStoreRequest $request, $id) {
        $user = User::findOrFail($id);
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->fill($request->except('password'));
        $user->save();
        return response()->json($user);
    }
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
}
