<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    public function GetData()
    {
        $data = DB::table('customers')->latest()->paginate(2);
        return response()->json($data);
    }
}
