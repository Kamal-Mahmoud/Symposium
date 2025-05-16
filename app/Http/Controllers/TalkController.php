<?php

namespace App\Http\Controllers;

use App\Enums\TalkType;
use App\Http\Requests\UpdateTalkRequest;
use App\Models\Talk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use function Laravel\Prompts\select;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view("talks.index" , ["talks" => Auth::user()->talks()]);
        $user_id = Auth::user()->id;
        $talks =  Talk::where('user_id', $user_id)->get();
        return view("talks.index", compact('talks'));
        //     return view("talks.index");
    }


    public function create()
    {
        $user_id = Auth::user()->id;
        //dd($user_id);
        $talk = new Talk;
        return view("talks.create", compact('user_id', 'talk'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'user_id' => "exists:users,id",
            'title' => "required|max:255",
            "length" => "required",
            "type" => ["required", Rule::enum(TalkType::class)],
            "abstract" => "required",
            "organizer_notes" => "nullable"
        ]);
        $date['user_id'] = Auth::user()->id;
        Talk::create($data);
        // Auth::user()->talks->create($data);
        return redirect(url("/talks"));
    }

    public function show(Talk $talk)
     {
    //     if ($talk->author->id != Auth::user()->id) {
    //         abort(403);
    //     }
    // if(request()->user()->cannot('view',$talk)){

    // }
        return view("talks.show", ["talk" => $talk]);
    }


    public function edit(Talk $talk)
    {
        return view("talks.edit", ["talk" => $talk]);
    }


    public function update(UpdateTalkRequest $request, Talk $talk)
     {
    //     $data = $request->validate([

    //     ]);
        $talk->update($request->validated());
        return redirect()->route("talks.show", ["talk" => $talk]);
    }

    public function destroy(Talk $talk)
    {
        if ($talk->user_id == Auth::user()->id) {
            $talk->delete();
        }
        return redirect(url("/talks"));
    }
}
