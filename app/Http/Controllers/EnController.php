<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnController extends Controller
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
        return view('translate.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->tr)
        {
            $jsonString = file_get_contents(base_path('resources/lang/tr.json'));

            $data = json_decode($jsonString, true);



            // Update Key

            $data[$request->orginal] = $request->tr;


            // Write File

            $newJsonString = json_encode($data, JSON_UNESCAPED_UNICODE);;

            file_put_contents(base_path('resources/lang/tr.json'), stripslashes($newJsonString));
           // dd($newJsonString);
        }


        if ($request->ar)
        {
            $jsonString = file_get_contents(base_path('resources/lang/ar.json'));

            $data = json_decode($jsonString, true);



            // Update Key

            $data[$request->orginal] = $request->ar;


            // Write File

            $newJsonString = json_encode($data, JSON_UNESCAPED_UNICODE);;

            file_put_contents(base_path('resources/lang/ar.json'), stripslashes($newJsonString));
            // dd($newJsonString);
        }


        if ($request->en)
        {
            $jsonString = file_get_contents(base_path('resources/lang/en.json'));

            $data = json_decode($jsonString, true);



            // Update Key

            $data[$request->orginal] = $request->en;


            // Write File

            $newJsonString = json_encode($data, JSON_PRETTY_PRINT);;

            file_put_contents(base_path('resources/lang/en.json'), stripslashes($newJsonString));
            // dd($newJsonString);
        }

        toast(__('Text Translated Successfully'),'success');
        return redirect()->route('en.index');
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
