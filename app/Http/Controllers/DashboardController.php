<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class DashboardController extends Controller
{
    //CRUD khusus profile user
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'user' => Auth::user()
            //'active' => 'dashboard'
        ]);
    }
}
