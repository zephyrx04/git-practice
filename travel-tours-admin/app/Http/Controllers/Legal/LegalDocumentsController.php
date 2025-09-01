<?php

namespace App\Http\Controllers\Legal;

use App\Http\Controllers\Controller;

class LegalDocumentsController extends Controller
{
    public function index()
    {
        return view('modules.legal.index');
    }
}
