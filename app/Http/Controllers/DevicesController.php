<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Storage;

class DevicesController extends Controller
{
    //Array of Static Data
    // private static function getData(){
    //     return[
    //         ['id' => 1, 'name' => 'LG', 'origin' => 'Koria'],
    //         ['id' => 2, 'name' => 'HP', 'origin' => 'USA'],
    //         ['id' => 3, 'name' => 'Siemens', 'origin' => 'Germany'],
    //         ['id' => 4, 'name' => 'Lenovo', 'origin' => 'France'],
    //     ];
    // }

    public function index(){
        return view('devices.index', [
            'devices' => Device::all()
        ]);
    }


    public function create()
    {
        return view('devices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'deviceName' => 'required',
            'deviceOrigin' => 'required',
            'devicePrice' => ['required','integer'],
            'deviceImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        ]);

        $device = new Device();

        $device->name = strip_tags($request->input('deviceName'));
        $device->origin = strip_tags($request->input('deviceOrigin'));
        $device->price = strip_tags($request->input('devicePrice'));

        // Handle image upload
        if ($request->hasFile('deviceImage')) {
            $image = $request->file('deviceImage');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $device->image_path = 'storage/images/'.$imageName; // Store image path in database
        }

        $device->save();

        return redirect()->route('devices.index');
    }

    public function edit($id)
{
    $device = Device::findOrFail($id);
    return view('devices.edit', compact('device'));
}


public function update(Request $request, $device)
{
    $request->validate([
        'deviceName' => 'required',
        'deviceOrigin' => 'required',
        'devicePrice' => ['required', 'integer'],
        'deviceImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
    ]);

    $to_update = Device::findOrFail($device);

    $to_update->name = strip_tags($request->input('deviceName'));
    $to_update->origin = strip_tags($request->input('deviceOrigin'));
    $to_update->price = strip_tags($request->input('devicePrice'));

    // Handle image update
    if ($request->hasFile('deviceImage')) {
        // Delete old image
        Storage::delete('public/images/'.basename($to_update->image_path));

        $image = $request->file('deviceImage');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        $to_update->image_path = 'storage/images/'.$imageName; // Update image path in database
    }

    $to_update->save();

    return redirect()->route('devices.show', $device);
}


    public function show($id)
{
    $device = Device::findOrFail($id);
    return view('devices.show', compact('device'));
}


    public function destroy($device)
    {
        $to_delete = Device::findOrFail($device);
        $to_delete->delete();
        return redirect()->route('devices.index');
    }
}
