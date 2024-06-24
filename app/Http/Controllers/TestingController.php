<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function index(){
        return response()->json(['Data' => "Testing Basic API"]);
    }
}
