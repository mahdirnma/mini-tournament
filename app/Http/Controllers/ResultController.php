<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::all()->sortByDesc('score');
        return view('result.index',compact('tournaments'));
    }
}
