<?php

namespace App\Http\Controllers\Visitors;

use App\Http\Controllers\Controller;

class VisitorsController extends Controller
{
    public function index()
    {
        return view('modules.visitors.index');
    }
}
