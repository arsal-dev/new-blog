<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return "<h1>Welcome to the Dashboard!</h1>";
    }
}
