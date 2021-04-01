<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;
use App\Bus;

class takipController extends Controller
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
     //    return $request;
         //return response("sucsssadsadasdcess");
      // $dt = Carbon::now(); 
        //$data = array('balance' => 52525  );
      //  $data['time'] = '2020-10-02';
       $mytime = \Carbon\Carbon::now(+2);
       $time = $mytime->toDateTimeString();
 $bus = Bus::where('DeviceNumber', $request->id)->first();
  $bus_id =$bus->id;
  $lastBalance = Balance::where('bus_id',$bus_id)->latest()->first();;
// dd($lastBalance->secretNum);
      //if($request['id'] == "V155"){ ///device id
       
       $data = $request->balance ;
       $dataAr =explode(',',$data);
      // dd($dataAr[1]);
      if($lastBalance->secretNum   == $dataAr[1] ){
           if($lastBalance->amount  == $dataAr[0]){
           return response("success");
           }
           else{
                 $form_data = array(
            'secretNum' => $dataAr[1],
            'bus_id' => $bus_id,
            'amount' => $dataAr[0] 
        );
               
               $lastBalance->update($form_data);
                return response("success"); 
           }
      }
      else{
          if($dataAr[0] == 0)
          {
              return response("success");
          }
          else
          {
                $form_data = array(
            'secretNum' => $dataAr[1],
            'bus_id' => $bus_id,
            'amount' => $dataAr[0] 
        );

       Balance::create($form_data);
          return response("success"); 
          }
        
      }
      
        //toast(__('Odeme Added Successfully'), 'success');
        /*  return array(
                'b' => 41, //max number is 9999
                    'a'   => 16 ,
                    'l' => 60 ,
                'e'   => "2021-11-09 54:72:47" 
               );
               */
                return $request;
    //  } 
      
         /*
      else if($request['id'] == "6344F814"){  ///card id
          return array(
                'b' => 270, //max number is 9999
                'e'   => "2021-01-18 33:36:52" 
               );
      }
      else{
           return response("error");
      }
      */
   
     //  dd($request);
 // $request['name'] = "post";
       //return "ATCSQ"; 
        return response("success");
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
