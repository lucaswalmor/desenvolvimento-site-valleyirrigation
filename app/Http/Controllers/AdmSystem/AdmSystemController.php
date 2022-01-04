<?php

namespace App\Http\Controllers\AdmSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmSystemController extends Controller
{
    public function index()
    {
        return view('admsystem.dashboard');
    }
}
