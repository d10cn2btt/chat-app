<?php

namespace App\Http\Controllers;

use App\Mail\UserOffline;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
//        Mail::to('bui.tuan.truong@framgia.com')->send(new UserOffline(ChatRoom::find(1)));
        return view('home');
    }
}
