<?php

namespace App\Http\Controllers\Backend;

use App\Models\Header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Header.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'notice' => 'required',
            'notice_title' => 'required',
            'logo' => 'required',
        ]);

           //image process
       $extension = $request->logo->getClientOriginalExtension();
       $new_image_name= "Logo".uniqid().'.'.$extension ;
       $path = public_path('/storage/img');

       if(!File::exists($path)){
        mkdir($path);
       }
       //image upload
       $image_upload = $request->logo->move($path, $new_image_name);

       //insert
       $header = new Header();
       $header->notice = $request->notice;
       $header->notice_title = $request->notice_title;
       $header->logo = $new_image_name;

       $header->save();
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
}
