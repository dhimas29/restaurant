<?php

namespace App\Http\Controllers;

use App\Models\FoodMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $foodMenu = FoodMenu::all();
        return view('home', compact('foodMenu'));
    }
    public function redirects()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            return view('admin.index');
        } else {
            $foodMenu = FoodMenu::all();
            return view('home', compact('foodMenu'));
        }
    }
}
