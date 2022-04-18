<?php

namespace App\Http\Controllers\Backend;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterController extends Controller
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
        return view('Backend.Footer.create');
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
            'footer_tag_title' => 'required',
            'footer_text' => 'required',
            'footer_link_text' => 'required',
            'footer_contact_text' => 'required',
            'footer_fb_link' => 'required',
            'footer_youtube_link' => 'required',
            'footer_linkedIn_link' => 'required',
            'footer_insta_link' => 'required',
        ]);
        //insert 
        $footer = new Footer();
        $footer->footer_tag_title = $request->footer_tag_title;
        $footer->footer_text = $request->footer_text;
        $footer->footer_link_text = $request->footer_link_text;
        $footer->footer_contact_text = $request->footer_contact_text;
        $footer->footer_fb_link = $request->footer_fb_link;
        $footer->footer_youtube_link = $request->footer_youtube_link;
        $footer->footer_linkedIn_link = $request->footer_linkedIn_link;
        $footer->footer_insta_link = $request->footer_insta_link;
        $footer->save();
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
