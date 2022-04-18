<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Support\Facades\File;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::orderBy('created_at', 'DESC')->paginate(4);
       
        return view('Backend.Banner.indexbanner', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Banner.Createbanner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation 
       $request->validate([

        'banner_title' =>'required',
        'banner_image' =>'required|mimes:png,jpg,svg,webp,jepg',
       ]);

       //image process
       $extension = $request->banner_image->getClientOriginalExtension();
       $new_image_name= "Banner".uniqid().'.'.$extension ;
       $path = public_path('/storage/img');

       if(!File::exists($path)){
        mkdir($path);
       }
       //image upload
       $image_upload = $request->banner_image->move($path, $new_image_name);
      
       //insert process
       $banner =new Banner();
       $banner->banner_title = $request->banner_title;
       $banner->banner_image = $new_image_name;
       $banner->save();
       return back()->with('success', 'POST SUCCESSFULLY INSERTED');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner= Banner::findOrfail($id, ['id', 'banner_title', 'banner_image']);
        
       return view('Backend.Banner.Editbanneritem', compact('banner'));
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

            'banner_title' =>'required',
            'banner_image' =>'mimes:png,jpg,svg,webp,jepg',
           ]);

           if($request->banner_image){
            
            //upload procees
            $extension = $request->banner_image->getclientoriginalextension();
            $new_image_name = "Banner".uniqid().'.'.$extension;
            
            $path = public_path().'/storage/img';

            if(!File::exists($path)){
            mkdir($path);
            }

            $image_upload =$request->banner_image->move($path, $new_image_name);

            //unlink procees
            $banner = Banner::findorfail($id);
            $oldpath = public_path().'/storage/img/'.$banner->banner_image;

            if(File::exists($oldpath)){
                unlink($oldpath);
            }
             $banner->banner_title = $request->banner_title;
             $banner->banner_image = $new_image_name;
             $banner->save();
             return back();

           }else{
            $banner = Banner::findorfail($id);
            $banner->banner_title = $request->banner_title;
            $banner->save();
             return back();
           }

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner= Banner::find($id);
       
        $banner->delete();
        return back();
    }

    public function status($id)
    {
    $banner = Banner::findorfail($id);
    if($banner->status == 1){
        $banner->status = 2;
    }else{
        $banner->status = 1;
    }
    $banner->save();
   return back();
    }


    public function trash()
    {
        $banner = Banner::onlyTrashed()->get(); 
        return view('Backend.Banner.trash' , compact('banner'));
    }

    public function parmanentdelete($id)
    {
        $banner = Banner::onlyTrashed()->findorfail($id);
        $path = public_path(). '/storage/img/'.$banner->banner_image;
        if(File::exists($path)){
            unlink($path);
        }
        $banner->forceDelete();
        return back();
    }

    public function restore($id)
    {
        $banner = Banner::onlyTrashed()->findOrFail($id);
        $banner->restore();
        return back();
    }
}
