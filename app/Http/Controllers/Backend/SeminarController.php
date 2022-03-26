<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Seminar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seminar = Seminar::with('leeds')->select('id', 'topic')->where('status', '1')->get();
       
        return view('Backend.Seminar.index', compact('seminar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Seminar.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation process
        $request->validate([
            'topic' => 'required|unique:seminars,topic',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
        ]);

       $date = Carbon::parse($request->date)->format('d M Y, l');
       $time = Carbon::parse($request->time)->format('h:i, A');
      

        //insert process
        $seminar = new Seminar();
        $seminar->topic = $request->topic;
        $seminar->date = $date;
        $seminar->time = $time;
        $seminar->save();
        return back();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    public function join()
    {
        $seminar = Seminar::select('id', 'topic')->where('status','1')->get();
        return view('Frontend.Seminar_join', compact('seminar'));
    }
}
