<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // if (Auth::user()->type == 'patient') {
        //     return redirect('/');
        // }
        return view('admin.index');
    }
}
