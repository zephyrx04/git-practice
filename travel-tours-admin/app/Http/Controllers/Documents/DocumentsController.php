<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;

class DocumentsController extends Controller
{
    public function index()
    {
        return view('modules.documents.index');
    }
}
