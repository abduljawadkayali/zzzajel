<?php

namespace App\Http\Controllers\Editor;

use App\Device;
use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct() {
        $this->middleware('permission:Editor');
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();
        return view('/Editor/pages/payment.index', compact('devices'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $data_arr[] = array(
            "id" => '',

            "amount" => '',
            "cereated_at" => ''
        );
        $sname ='';
        $devic ='';
        $sum = 0;
        $data = Payment::where('device_id',$id)->orderBy('created_at','desc')->get();

        if ($data){
            foreach($data as $record){

                $amount = $record->amount;
                $sum = $sum +(float)$amount;
                $recordid =  $deleteButton = "<button class='btn btn-sm btn-danger deleteUser' data-id='".$record->id."'>Delete</button>";

                $cereated_at = $record->created_at->format('Y/m/d , h:i');
                 $sname = $record->device->SalerName;
                 $devic = $record->device->DeviceNumber;
               // $busNumber = $record->bus->busNumber;
               // $DeviceNumber = $record->bus->DeviceNumber;
                $data_arr[] = array(
                    "id" => $recordid,

                    "amount" => $amount,
                    "cereated_at" => $cereated_at
                );
            }
        }


        $response = array(
            "aaData" => $data_arr  ,
            "sum" => $sum  ,
            "sname" =>$sname  ,
            "DeviceNumber" =>$devic  ,
          //  "drvirbus" =>$drvirbus ?? '',
           // "DeviceNumber" =>$DeviceNumber ?? '',

        );

        echo json_encode($response);
        exit;

        return ['data' => json_encode($data) ?: null];
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

    public function save(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'device_id' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'confirmed' => 'The :attribute field must be confirmed',
        ];

        $this->validate($request, $rules, $customMessages);


        $form_data = array(

            'amount' => $request->amount,
            'device_id' => $request->device_id
        );

        Payment::create($form_data);
        //toast(__('Odeme Added Successfully'), 'success');
        return response("succes");
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
        $data = Payment::findOrFail($id);
        $data->delete();
        echo json_encode(1);
        exit;
    }
}
