<?php

namespace App\Http\Controllers;

use App\Entries;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$entries = Entries::all()->jsonSerialize();

        return view('welcome', ['entries' => $entries]);
    }
}
