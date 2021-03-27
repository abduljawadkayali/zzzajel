<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function __construct() {
      //  $this->middleware('permission:Designer');
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Video::all(); //show only 5 items at a time in descending order
        return view('video.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $this->validate($request, [
            'title'=>'required',
            'link'=>'required',
            'body' =>'required',
        ]);
        $form_data = array(
            'title'       =>   $request->title,
            'link'        =>   $request->link,
            'body'        =>   $request->body
        );
        Video::create($form_data);
        //Display a successful message upon save
        toast(__('Video Added Successfully'),'success');
        return redirect()->route('video.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Video::findOrFail($id);
        return view('video.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Video::findOrFail($id);
        return view('video.edit', compact('data'));
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
        $this->validate($request, [
            'title'=>'required',
            'link'=>'required',
            'body' =>'required',
        ]);
        $form_data = array(
            'title'       =>   $request->title,
            'link'        =>   $request->link,
            'body'        =>   $request->body
        );
        Video::whereId($id)->update($form_data);
        toast(__('Video Updated Successfully'),'success');
        return redirect()->route('video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Video::findOrFail($id);
        $data->delete();
        toast(__('Video Deleted Successfully'),'info');
        return redirect()->route('video.index');
    }
}
