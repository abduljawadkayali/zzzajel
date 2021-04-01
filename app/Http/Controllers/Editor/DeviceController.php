<?php

namespace App\Http\Controllers\Editor;

use App\Device;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeviceController extends Controller
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
        return view('/Editor/pages/device.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Editor/pages/device/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'SalerName' => 'required',
            'DeviceNumber' => 'required|unique:App\Device,DeviceNumber',
            'SalerPhone' => 'required|unique:App\Device,SalerPhone',
            'password' => 'required|min:6|confirmed'
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.',
            'confirmed' => 'The :attribute field must be confirmed',
        ];

        $this->validate($request, $rules, $customMessages);


        $form_data = array(
            'SalerName' => $request->SalerName,
            'DeviceNumber' => $request->DeviceNumber,
            'Adres' => $request->Adres ?? '',
            'SalerPhone' => $request->SalerPhone,
            'password' => Hash::make($request->password),
            'WifiName' => $request->WifiName ?? 'Code',
            'WifiPass' => $request->WifiPass ?? 'code20208',
            'status' => $request->status ?? 'off',
            'MemoryAdres' => $request->MemoryAdres ?? '25'
        );

        Device::create($form_data);
        toast(__('Device Added Successfully'), 'success');
        return redirect()->route('device.index');
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
        $data = Device::findOrFail($id);
        return view('/Editor/pages/device/edit', compact('data'));
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
        if ($request->password == null)
        {
            $rules = [
                'SalerName' => 'required',
                'DeviceNumber' => 'required|unique:App\Device,DeviceNumber,'.$id,
                'SalerPhone' => 'required|unique:App\Device,SalerPhone,'.$id
            ];

            $customMessages = [
                'required' => 'The :attribute field is required.',
                'confirmed' => 'The :attribute field must be confirmed',
            ];

            $this->validate($request, $rules, $customMessages);
            //  dd($customMessages);
            $form_data = array(
                'SalerName' => $request->SalerName,
                'DeviceNumber' => $request->DeviceNumber,
                'Adres' => $request->Adres ?? '',
                'SalerPhone' => $request->SalerPhone,
                'WifiName' => $request->WifiName ?? 'Code',
                'WifiPass' => $request->WifiPass ?? 'code20208',
                'status' => $request->status ?? 'off',
                'MemoryAdres' => $request->MemoryAdres ?? '25'
            );
        }
        else{
            $rules = [
                'SalerName' => 'required',
                'DeviceNumber' => 'required|unique:App\Device,DeviceNumber,'.$id,
                'SalerPhone' => 'required|unique:App\Device,SalerPhone,'.$id,
                'password' => 'min:6|confirmed'
            ];

            $customMessages = [
                'required' => 'The :attribute field is required.',
                'confirmed' => 'The :attribute field must be confirmed',
            ];

            $this->validate($request, $rules, $customMessages);
            $form_data = array(
                'SalerName' => $request->SalerName,
                'DeviceNumber' => $request->DeviceNumber,
                'Adres' => $request->Adres ?? '',
                'SalerPhone' => $request->SalerPhone,
                'password' => Hash::make($request->password),
                'WifiName' => $request->WifiName ?? 'Code',
                'WifiPass' => $request->WifiPass ?? 'code20208',
                'status' => $request->status ?? 'off',
                'MemoryAdres' => $request->MemoryAdres ?? '25'
            );
        }



        //  dd($customMessages);

        Device::whereId($id)->update($form_data);
        toast(__('Device Updated Successfully'),'success');
        return redirect()->route('device.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Device::findOrFail($id);
        $data->delete();
        toast(__('Device Deleted Successfully'),'info');
        return redirect()->route('device.index');
    }
}
