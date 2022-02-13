<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        dd('index');
    }

    public function create()
    {
        dd('create');
    }

    public function store(StoreUserRequest $request)
    {
        dd('store');
    }

    public function show(User $user)
    {
        dd('show');
    }

    public function edit(User $user)
    {
        dd('edit');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        dd('update');
    }

    public function destroy(User $user)
    {
        dd('destroy');
    }
}
