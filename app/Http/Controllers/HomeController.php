<?php

namespace App\Http\Controllers;

use App\Comic;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        #data for title and breadcrumbs
        $data['title'] = "Home | " . config('app.name');
        $data['subtitle'] = "Dashboard";
        $data['label'] = "Home";

        #get count
        $data['comics'] = Comic::where('user_id', auth()->user()->id)->count();

        return view('home')->with($data);
    }
}
