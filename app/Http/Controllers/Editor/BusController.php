<?php

namespace App\Http\Controllers\Editor;

use App\Bus;
use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = Bus::all();
        return view('/Editor/pages/bus.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Company::all();
        return view('/Editor/pages/bus/create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'busDriver' => 'required',
            'busNumber' => 'required|unique:App\Bus,busNumber',
            'DeviceNumber' => 'required|unique:App\Bus,DeviceNumber',
            'DriverPhone' => 'required',
            'password' => 'required|min:6|confirmed',
            'DriverId' => 'required|unique:App\Bus,DriverId'
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'confirmed' => 'The :attribute field must be confirmed',
        ];

        $this->validate($request, $rules, $customMessages);


        $form_data = array(
            'busDriver' => $request->busDriver,
            'busNumber' => $request->busNumber,
            'DeviceNumber' => $request->DeviceNumber,
            'DriverPhone' => $request->DriverPhone,
            'password' => Hash::make($request->password),
            'DriverId' => $request->DriverId,
            'WifiName' => $request->WifiName ?? 'Code',
            'WifiPass' => $request->WifiPass ?? 'code20208',
            'status' => $request->status ?? 'off',
            'company_id' => $request->company_id ?? '1',
            'MemoryAdres' => $request->MemoryAdres ?? '25'
        );

        Bus::create($form_data);
        toast(__('Bus Added Successfully'), 'success');
        return redirect()->route('bus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::all();
        $data = Bus::findOrFail($id);
        return view('/Editor/pages/bus/edit', compact('data','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->password == null)
        {
            $rules = [
                'busDriver' => 'required',
                'busNumber' => 'required|unique:App\Bus,busNumber,'.$id,
                'DeviceNumber' => 'required|unique:App\Bus,DeviceNumber,'.$id,
                'DriverPhone' => 'required',
                'DriverId' => 'required|unique:App\Bus,DriverId,'.$id
            ];

            $customMessages = [
                'required' => 'The :attribute field is required.',
                'confirmed' => 'The :attribute field must be confirmed',
            ];

            $this->validate($request, $rules, $customMessages);
          //  dd($customMessages);
            $form_data = array(
                'busDriver'       =>   $request->busDriver,
                'busNumber'        =>   $request->busNumber,
                'DeviceNumber'        =>   $request->DeviceNumber,
                'DriverPhone'        =>   $request->DriverPhone,
                'DriverId'        =>   $request->DriverId,
                'status' => $request->status ?? 'off',
                'WifiName' => $request->WifiName ?? 'Code',
                'WifiPass' => $request->WifiPass ?? 'code20208',
                'company_id' => $request->company_id ?? '1',
                'MemoryAdres' => $request->MemoryAdres ?? '25'
            );
        }
        else{
            $rules = [
                'busDriver' => 'required',
                'busNumber' => 'required|unique:App\Bus,busNumber,'.$id,
                'DeviceNumber' => 'required|unique:App\Bus,DeviceNumber,'.$id,
                'DriverPhone' => 'required',
                'password' => 'min:6|confirmed',
                'DriverId' => 'required|unique:App\Bus,DriverId,'.$id
            ];

            $customMessages = [
                'required' => 'The :attribute field is required.',
                'confirmed' => 'The :attribute field must be confirmed',
            ];

            $this->validate($request, $rules, $customMessages);
            $form_data = array(
                'busDriver'       =>   $request->busDriver,
                'busNumber'        =>   $request->busNumber,
                'DeviceNumber'        =>   $request->DeviceNumber,
                'DriverPhone'        =>   $request->DriverPhone,
                'DriverId'        =>   $request->DriverId,
                'WifiName' => $request->WifiName ?? 'Code',
                'WifiPass' => $request->WifiPass ?? 'code20208',
                'password' => Hash::make($request->password),
                'status' => $request->status ?? 'off',
                'company_id' => $request->company_id ?? '1',
                'MemoryAdres' => $request->MemoryAdres ?? '25'
            );
        }



      //  dd($customMessages);

        Bus::whereId($id)->update($form_data);
        toast(__('Bus Updated Successfully'),'success');
        return redirect()->route('bus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Bus::findOrFail($id);
        $data->delete();
        toast(__('Bus Deleted Successfully'),'info');
        return redirect()->route('bus.index');
    }
}
