<?php

namespace App\Http\Controllers;

use App\Entries;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$entries = Entries::all();

		foreach ($entries as $key => $entry)
		{
			$entries[$key]->entry = html_entity_decode($entry->entry);
		}

        return view('admin', ['entries' => $entries]);
	}

    public function edit($entries_id = null)
    {
		$entries = null;
		// print_r(\Auth::user()->id);
		if (!!$entries_id)
		{
			$entries = Entries::findOrFail($entries_id);
			$entries->entry = html_entity_decode($entries->entry);
		}

        return view('edit', ['entry' => $entries]);
	}

    public function post(Request $request)
    {
		$entries_id = $request->entries_id;
		if (!!$entries_id)
		{
			$entries = Entries::findOrFail($entries_id);
		}
		else
		{
			$entries = new Entries();
			$entries->users_id = \Auth::user()->id;
		}

		$entries->title = $request->title;
		$entries->entry = htmlentities($request->entry);
		$entries->save();

        return redirect()->route('admin');
	}

    public function delete(Request $request, $entries_id)
    {
		// print_r($entries_id);
		Entries::destroy($entries_id);

        return redirect()->route('admin');
    }
}
