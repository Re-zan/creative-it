<?php

namespace App\Http\Controllers\Backend;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::latest()->get();
        
        return view('Backend.Gallery.index' , compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Gallery.Creategallery');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate process
        
        $request->validate([
            'gallery_title' => 'required',
           'gallery_image' => 'required|mimes:png,jpg,jpeg,webp,svg',
        ]);

        //image process
        $extension = $request->gallery_image->getclientOriginalextension();
        $new_img_name = "Gallery".uniqid().'.'.$extension;
        $path= public_path().'/storage/img';
        if(!File::exists($path)){
            mkdir($path);
        }
        $img_upload = $request->gallery_image->move($path, $new_img_name);
       
        //insert process
       $gallery = new Gallery();
       $gallery->gallery_title = $request->gallery_title; 
       $gallery->gallery_image = $new_img_name; 

       $gallery->save();
       return back()->with('success', 'POST INSERTED SUCCESSFULLY');

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
        $gallery = Gallery::find($id, ['id', 'gallery_title', 'gallery_image']);
        
        return view('Backend.Gallery.edit', compact('gallery'));
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
        $request->validate([
            'gallery_title' => 'required',
           'gallery_image' => 'mimes:png,jpg,jpeg,webp,svg',
        ]);
        if($request->gallery_image){
        
            //image proces
            $extension = $request->gallery_image->getclientoriginalextension();
            $new_img_name = "gallery".uniqid().'.'.$extension;
            $path= public_path().'/storage/img/';
            if(!file::exists($path)){
                mkdir($path);
            
            }
            $file_upload = $request->gallery_image->move($path,  $new_img_name);

            //oldpath
            $gallery = Gallery::findorfail($id);
            $oldpath = public_path().'/storage/img/'.$gallery->gallery_image;
            if(File::exists($oldpath)){
            unlink($oldpath);

            //upload procees
            $gallery->gallery_title = $request->gallery_title;
            $gallery->gallery_image = $new_img_name;
            }
        }else{
            $gallery = Gallery::findorfail($id);
            $gallery->gallery_title = $request->gallery_title;
        }
        $gallery->save();
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
        $gallery= Gallery::find($id);
        $path = public_path(). '/storage/img/'.$gallery->gallery_image;
        if(File::exists($path)){
            unlink($path);
        }
        $gallery->delete();
        return back();
    }

    public function status($id){
      
        $gallery = Gallery::findorfail($id);
        if($gallery->status == 1){
            $gallery->status = 2;
        }else{
            $gallery->status = 1;
        }
        $gallery->save();
       return back();
     
    }
}
