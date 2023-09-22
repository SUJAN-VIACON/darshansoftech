<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\DataTransferObjects\UserDto;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function __construct(
        protected UserService $service
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = $this->service->store(UserDto::formRequest($request));
        return view("crud_with_post.create", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user = $this->service->update($user, UserDto::formRequest($request));
        session()->flash('success', 'User data has been updated');
        return view("crud_with_post.edit", compact("user"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->service->delete($user);
        session()->flash('success', 'User data has been deleted successfully');
        return redirect(route("users.index"));
    }
}
