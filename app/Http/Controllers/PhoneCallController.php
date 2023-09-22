<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class PhoneCallController extends Controller
{
    public function phoneCallIndex()
    {
        return Inertia::render("PhoneCall");
    }
}
