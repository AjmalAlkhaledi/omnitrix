<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Omnitrix\Database\Paginator;
use Omnitrix\Facades\Queue;
use Omnitrix\Http\Request;
use Omnitrix\Http\Response;

final class UserController
{
    /** @return Paginator<User> */
    public function index(Request $request): Paginator
    {
        $page = $request->queryParam('page');

        return User::query()
            ->with('posts')
            ->orderBy('id')
            ->paginate(perPage: 20, page: is_numeric($page) ? (int) $page : 1);
    }

    public function show(Request $request): User
    {
        return User::with('posts')->findOrFail($request->routeInt('id'));
    }

    public function store(Request $request): Response
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:200',
        ]);
        $user = User::create($data); // the password is hashed by the 'hashed' cast
        Queue::dispatch('users.welcome', ['user_id' => $user->id]);

        return Response::json($user, 201);
    }

    public function update(Request $request): User
    {
        $user = User::findOrFail($request->routeInt('id'));
        $user->update($request->validate([
            'name' => 'string|max:100',
            'email' => 'email|max:255',
        ]));

        return $user;
    }

    public function destroy(Request $request): Response
    {
        User::findOrFail($request->routeInt('id'))->delete();

        return Response::noContent();
    }
}
