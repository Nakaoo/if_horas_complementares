<?php


namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class HomeController extends Controller
{
    public function index()
    {
        if(!Auth::user())
            return view('home');
        else
            return redirect()->route('horas_complementares.dashboard');
    }
}
