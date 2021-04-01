<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function __construct() {
    $this->middleware('permission:Designer');
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::all(); //show only 5 items at a time in descending order
        return view('service.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
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
            'body'     =>  'required',
            'title'     =>  'required'
        ]);
        $form_data = array(
            'body'        =>   $request->body,
            'title'        =>   $request->title
        );

        Service::create($form_data);
        toast(__('Service Added Successfully'),'success');
        return redirect()->route('service.index');
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
         $data = Service::findOrFail($id);
        return view('service.edit', compact('data'));
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
            'title'     =>  'required',
            'body'     =>  'required'
        ]);

        $form_data = array(
            'body'    =>  $request->body,
            'title'     =>  $request->title
        );

        Service::whereId($id)->update($form_data);
        toast(__('Service Updated Successfully'),'success');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Service::findOrFail($id);
        $data->delete();
        toast(__('Service Deleted Successfully'),'info');
        return redirect()->route('service.index');
    }
}
