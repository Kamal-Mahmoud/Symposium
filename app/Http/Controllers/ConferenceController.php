<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view("talks.index" , ["talks" => Auth::user()->talks()]);
        $conferences = Conference::all();
        return view("conferences.index", compact("conferences"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Conference $conference)
    {
        return view("conferences.show", ["conference" => $conference]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conference $conference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conference $conference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conference $conference)
    {
        //
    }
    public function favorite(Conference $conference)
    {

        Auth::user()->favoritedConferences()->attach($conference->id);
        return back();
    }

    public function unfavorite(Conference $conference)
    {
        Auth::user()->favoritedConferences()->detach($conference->id);
        return back();
    }
}
