<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype=='user') {
                return view('dashboard');
            } 
            elseif ($usertype=='admin')
             {
                return view('admin.adminhome');
            }
            elseif ($usertype=='seller')
             {
                return view('seller.sellerhome');
            }
        }

        // If the user is not authenticated or the usertype is not recognized, you can redirect them to a default page or display an error message.
        // For example:
        return redirect()->route('login')->with('error', 'Invalid user or usertype');
    }
}
