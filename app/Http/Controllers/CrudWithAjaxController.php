<?php

namespace App\Http\Controllers;

use App\Models\User;

class CrudWithAjaxController extends Controller
{
    public function create()
    {
        return view('crud_with_ajax.create');
    }

    public function edit(User $user)
    {
        return view('crud_with_ajax.edit', compact('user'));
    }
}
