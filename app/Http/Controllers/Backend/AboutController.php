<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::latest()->get();
        return  view('Backend.About.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.About.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'about_image' => 'required|mimes:png,jpg,webp,jpeg,svg',
            'about_img_title' => 'required',
            'about_title' => 'required',
            'about_details' => 'required',
        ]);

        //image process
        $extension = $request->about_image->getclientoriginalextension();
        $new_img_name = 'About'.uniqid().'.'.$extension;
        $path = public_path().'/storage/img/';

        if(!File::exists($path)){
            mkdir($path);
        }
        //upload
        $file_upload = $request->about_image->move($path, $new_img_name);
        
        //insert
        $about = new About();
        $about->about_image = $new_img_name;
        $about->about_img_title = $request->about_img_title;
        $about->about_title = $request->about_title;
        $about->about_details = $request->about_details;

        $about->save();
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
        $about = About::findorfail($id, ['id', 'about_image', 'about_img_title', 'about_title', 'about_details']);
        return view('Backend.About.edit', compact('about'));
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
          //validate
          $request->validate([
            'about_image' => 'mimes:png,jpg,webp,jpeg,svg',
            'about_img_title' => 'required',
            'about_title' => 'required',
            'about_details' => 'required',
        ]);

        //image process
        if($request->about_image){
            $extension = $request->about_image->getclientoriginalextension();
            $new_img_name = 'About'.uniqid().'.'.$extension;
            $path = public_path().'/storage/img/';
    
            if(!File::exists($path)){
                mkdir($path);
            }
            //upload
            $file_upload = $request->about_image->move($path, $new_img_name);
    
            //old path
            $about = About::findorfail($id);
            $oldpath = public_path().'/storage/img/'.$about->about_image;
            if(File::exists($oldpath)){
                unlink($oldpath);
            }
            $about->about_image = $new_img_name;
            $about->about_img_title = $request->about_img_title;
            $about->about_title = $request->about_title;
            $about->about_details = $request->about_details;

        }else{
            $about = About::findorfail($id);
            $about->about_img_title = $request->about_img_title;
            $about->about_title = $request->about_title;
            $about->about_details = $request->about_details;

           
        }
        $about->save();
        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::findorfail($id);
        $oldpath = public_path().'/storage/img/'.$about->about_image;
        if(File::exists($oldpath)){
            unlink($oldpath);
        }
        $about->delete();
        return back();
    }

    public function status($id){
        $about= About::Findorfail($id);
        if($about->status == 1){
            $about->status = 2;
        }else{
            $about->status = 1;
        }
        $about->save();
        return back();
    }
}
