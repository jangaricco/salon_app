<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $id = Auth::id();
        
        $reservations = DB::table('reserves')
                        ->where('user_id', $id)
                        ->select('reservation_id','user_id','menu', 'start_at', 'updated_at')
                        ->latest()
                        ->first();
        
       
        return view('home',compact('reservations'));
    }
}
