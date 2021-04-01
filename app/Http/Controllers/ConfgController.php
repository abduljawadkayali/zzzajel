<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfgController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return response("2");
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
      // $dt = Carbon::now(); 
        //$data = array('balance' => 52525  );
      //  $data['time'] = '2020-10-02';
       $mytime = \Carbon\Carbon::now(+2);
       $time = $mytime->toDateTimeString();
      if($request['id'] == "V155"){ ///device id
          return array(
                'b' => 1024+75, //max number is 9999
                'e'   => "Code_" ,
                'w'   => "code20208>" 
               );
      } 
      else if($request['id'] == "6344F814"){  ///card id
          return array(
                'b' => 270, //max number is 9999
                'e'   => "2021-01-18 33:36:52" 
               );
      }
      else{
           return response("56");
      }
     //  dd($request);
 // $request['name'] = "post";
       //return "ATCSQ"; 
          return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
          return response("2");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id=8;
        $data = "AT";
         // return "AAA";
       //  return $id;
         
          return response("edit");
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
        
}
