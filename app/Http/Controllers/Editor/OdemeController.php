<?php

namespace App\Http\Controllers\Editor;

use App\Balance;
use App\Bus;
use App\Http\Controllers\Controller;
use App\Odeme;
use Illuminate\Http\Request;

class OdemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = Bus::all();
        return view('/Editor/pages/odeme.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Bus::all();
        return view('/Editor/pages/odeme.create', compact('buses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'bus' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'confirmed' => 'The :attribute field must be confirmed',
        ];

        $this->validate($request, $rules, $customMessages);


        $form_data = array(

            'amount' => $request->amount,
            'bus_id' => $request->bus,
            'Description' => $request->Description ?? ''
        );

        Odeme::create($form_data);
        //toast(__('Odeme Added Successfully'), 'success');
        return response("succes");
    }

    public function store(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'bus_id' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'confirmed' => 'The :attribute field must be confirmed',
        ];

        $this->validate($request, $rules, $customMessages);


        $form_data = array(
            'amount' => $request->amount,
            'bus_id' => $request->bus_id,
            'Description' => $request->Description ?? ''
        );

        Odeme::create($form_data);
        toast(__('Odeme Added Successfully'), 'success');
        return redirect()->route('odeme.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getbalance($id)
    {
      //  dd($id);
        $sum = 0;

        $balance = Balance::where('bus_id',$id)->orderBy('created_at','desc')->get();
        $data_arr = array();
        foreach($balance as $record){
            $balanc = $record->amount;
            $cereaed_at = $record->created_at->format('Y/m/d , h:i');
            $data_arr[] = array(
                "balanc" => $balanc,
                "cereaed_at" => $cereaed_at
            );
        }
        $response = array(
            "aaData" => $data_arr,

        );

        echo json_encode($response);
        exit;

        return ['data' => json_encode($data) ?: null];

    }

    public function show($id)
    {
        $sum = 0;
        $sum2 = 0;
        $data = Odeme::where('bus_id',$id)->orderBy('created_at','desc')->get();
        $bus = Bus::findOrFail($id);
        $drvirbus = $bus->busDriver;
        $busNumber = $bus->busNumber;
        $DeviceNumber =$bus->DeviceNumber;
        if ($data){
            foreach($data as $record){
                $amount = $record->amount;
                $sum = $sum +(float)$amount;
                $recordid =  $deleteButton = "<button class='btn btn-sm btn-danger deleteUser' data-id='".$record->id."'>__('Delete')</button>";
                //   dd($recordid);
                $Description = $record->Description;
                $cereated_at = $record->created_at->format('Y/m/d , h:i');
                $drvirbus = $record->bus->busDriver;
                $busNumber = $record->bus->busNumber;
                $DeviceNumber = $record->bus->DeviceNumber;
                $data_arr[] = array(
                    "id" => $recordid,

                    "amount" => $amount,
                    "cereated_at" => $cereated_at,
                    "Description" => $Description
                );
            }
        }
        $balance = Balance::where('bus_id',$id)->orderBy('created_at','desc')->get();
        $data_arr = array();
        foreach($balance as $item){
            $amount2 = $item->amount;
            $sum2 = $sum2 +(float)$amount2;

        }
        $sum =0;
        foreach($data as $record){
            $amount = $record->amount;
            $sum = $sum +(float)$amount;
            $recordid =  $deleteButton = "<button class='btn btn-sm btn-danger deleteUser' data-id='".$record->id."'>Delete</button>";
         //   dd($recordid);
            $Description = $record->Description;
            $cereated_at = $record->created_at->format('Y/m/d , h:i');

            $data_arr[] = array(
                "id" => $recordid,
                "amount" => $amount,
                "cereated_at" => $cereated_at,
                "Description" => $Description
            );
        }

        $response = array(
            "aaData" => $data_arr ?? '',
            "sum" => $sum ?? '',
            "sum2" => $sum2 ?? '',
            "kalan" => $sum2 - $sum ?? $sum,
            "busNumber" =>$busNumber ?? '',
            "drvirbus" =>$drvirbus ?? '',
            "DeviceNumber" =>$DeviceNumber ?? '',

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
        $data = Odeme::findOrFail($id);
        $data->delete();
        echo json_encode(1);
        exit;
    }
}
