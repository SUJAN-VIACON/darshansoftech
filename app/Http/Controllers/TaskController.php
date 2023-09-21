<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class TaskController extends Controller
{

    // task 1 using blade
    public function crudWithPostIndex()
    {
        return view("crud_with_post.index");
    }

    public function crudWithAjaxIndex()
    {
        return view("crud_with_ajax.index");
    }

    public function fileUploadIndex()
    {
        return view("file_upload.index");
    }

    // task 2 using react

    public function phoneCallIndex()
    {
        // page will render with react component 
        // react folder structure inside the resources/js/ dir

        return Inertia::render('PhoneCall');
    }
}
