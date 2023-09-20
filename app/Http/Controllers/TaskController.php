<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class TaskController extends Controller
{
    public function phoneCallIndex()
    {
        return Inertia::render('PhoneCall');
    }
}
