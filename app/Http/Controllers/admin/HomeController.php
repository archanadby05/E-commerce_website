<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        if (session()->has('errors')) {
            return redirect()->route('admin.login');
        }

        $admin = Auth::guard('admin')->user();
        echo 'Welcome ' . $admin->name . ' <a href="' . route('admin.logout') . '">Logout</a>';
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
