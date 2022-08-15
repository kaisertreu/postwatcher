<?php

namespace App\Http\Controllers;

use App\Comic;
use App\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #data for title and breadcrumbs
        $data['title'] = "Series List | " . config('app.name');
        $data['subtitle'] = "All Series";
        $data['label'] = "Library";

        $data['sites'] = Website::oldest('url')->get();

        #display
        return view('comics.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        #data for title and breadcrumbs
        $data['title'] = "Add New Series | " . config('app.name');
        $data['subtitle'] = "Add Series";
        $data['label'] = "Add";

        $data['sites'] = Website::oldest('url')->get();

        #display
        return view('comics.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #setting notes as array first and foremost
        (!is_null($request->s_notes) && !empty($request->s_notes)) ? $set_note = json_encode($request->s_notes) : $set_note = "[]";
        // don't forget that (`{}` is json) and (`[]` is array) and json_encode doesn't make array into json but it just
        // make them into an array string smh

        #validate
        $rules = [
            'title' => 'required|string|min:2|max:255',
            'website' => 'required|numeric',
            'slug' => 'required|alpha-dash|min:2|max:255',
            'chapter' => 'required|numeric|min:0|max:65535',
            'rating' => 'required|numeric|min:0|max:5',
            'reading_status' => 'required|string|min:0|max:12',
            's_notes' => 'nullable|array',
        ]; //'alpha' doesn't accept spaces | answer: regex:/^[\pL\s\-]+$/u 👉https://stackoverflow.com/a/34099925

        $v = Validator::make($request->all(), $rules);

        if ($v->fails()) {
            dd($v->errors()->all());
        }

        #store
        $title_name = ucwords(strtolower($request->title));

        $comic = new Comic;

        $comic->title = $title_name;
        $comic->user_id = auth()->user()->id;;
        $comic->url_id = $request->website;
        $comic->slug = $request->slug;
        $comic->chapter = $request->chapter;
        $comic->rating = $request->rating;
        $comic->reading_status = $request->reading_status;
        $comic->note = $set_note;

        // dd($comic); //don't remove this dd() as long as you don't perfected the note array insertion horseshit
        $comic->save();

        #set message
        session()->flash('success', "Series (" . $title_name . ") has been created");

        #redirect
        return redirect()->route('comics.index');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
