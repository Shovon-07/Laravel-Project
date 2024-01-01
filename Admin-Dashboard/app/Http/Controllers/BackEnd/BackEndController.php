<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    public function Index()
    {
        return view("BackEnd.Pages.Login");
    }
    public function Home()
    {
        return view("BackEnd.Pages.Home");
    }
    public function Tasks()
    {
        return view("BackEnd.Pages.Tasks");
    }
}
