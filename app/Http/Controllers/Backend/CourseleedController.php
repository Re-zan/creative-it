<?php

namespace App\Http\Controllers\Backend;

use App\Models\Courseleed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CourseleedController extends Controller
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
            'course_title' => 'required',
            'course_description' => 'required',
            'course_img' => 'required',
        ]);

        //img upload 
        $extension = $request->course_img->getclientoriginalextension();
        $new_name= 'Course'.uniqid().'.'.$extension;
        $path = public_path().'/storage/img';
        

        if(!File::exists($path)){
            mkdir($path);
        }

        $file_upload = $request->course_img->move($path, $new_name);
        
        //insert
        $courseleed = new Courseleed();
       $courseleed->course_id = $request->course_id;
        $courseleed->course_title = $request->course_title;
        $courseleed->course_description = $request->course_description;
        $courseleed->course_img =$new_name;
        $courseleed->save();
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
