<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reserve;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $id = Auth::id();

        $reservations = DB::table('reserves')
                        ->where('user_id', $id)
                        ->select('reservation_id','user_id','menu', 'start_at', 'updated_at')
                        ->latest()
                        ->first();
        
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = new Reserve;

        $reservation->user_id = $request->user()->id;
        $reservation->menu = $request->input('menu');
        $reservation->start_at = $request->input('start_at');

        $reservation->save();

        return redirect('reservations/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $reserve = Reserve::find($id);


        if($reserve->menu === 0){
            $menu = 'カット + ブロー 3,800円';
        }
        if($reserve->menu === 1){
            $menu = 'カット + カラー 5,900円';
        }
        if($reserve->menu === 2){
            $menu = 'カット + パーマ 8,400円';
        }
        if($reserve->menu === 3){
            $menu = '来店後相談';
        }

        if($reserve->start_at === 0){
            $start_at = '10:00～';
        }
        if($reserve->start_at === 1){
            $start_at = '10:30～';
        }
        if($reserve->start_at === 2){
            $start_at = '11:00～';
        }
        if($reserve->start_at === 3){
            $start_at = '11:30～';
        }
        if($reserve->start_at === 4){
            $start_at = '12:00～';
        }
        if($reserve->start_at === 5){
            $start_at = '12:30～';
        }
        if($reserve->start_at === 6){
            $start_at = '13:00～';
        }
        if($reserve->start_at === 7){
            $start_at = '13:30～';
        }
        if($reserve->start_at === 8){
            $start_at = '14:00～';
        }
        if($reserve->start_at === 9){
            $start_at = '14:30～';
        }
        if($reserve->start_at === 10){
            $start_at = '15:00～';
        }
        if($reserve->start_at === 11){
            $start_at = '15:30～';
        }
        if($reserve->start_at === 12){
            $start_at = '16:00～';
        }
        if($reserve->start_at === 13){
            $start_at = '16:30～';
        }
        if($reserve->start_at === 14){
            $start_at = '17:00～';
        }
        if($reserve->start_at === 15){
            $start_at = '17:30～';
        }
        if($reserve->start_at === 16){
            $start_at = '18:00～';
        }
        if($reserve->start_at === 17){
            $start_at = '18:30～';
        }

        return view('reservations.show', compact('reserve','menu','start_at'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $reserve = Reserve::find($id);
        
        return view('reservations.edit', compact('reserve'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $reserve = Reserve::find($id);

        $reserve->user_id = $request->user()->id;
        $reserve->menu = $request->input('menu');
        $reserve->start_at = $request->input('start_at');

        $reserve->save();

        return redirect('reservations/show/'.$reserve->reservation_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $reserve = Reserve::find($id);
        $reserve->delete();

        return redirect('reservations/index');
    }
}
