<?php

namespace App\Http\Controllers;

use App\Models\User;

class CrudWithPostController extends Controller
{
    public function create()
    {
        return view("crud_with_post.create");
    }

    public function edit(User $user)
    {
        return view("crud_with_post.edit", compact('user'));
    }
}
