@extends('layout')

@section('title', 'Show Device Details')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
        <h1>Devices</h1>
    </div>

    <div class="mt-8">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $device['name'] }} is from <strong>{{ $device['origin'] }}</strong> - <strong>${{ $device['price'] }}</strong></h3>
                @if($device->image_path)
                    <img src="{{ asset($device->image_path) }}" alt="Device Image" class="img-fluid" style="max-width: 120px !important;">
                @else
                    <p>No image available</p>
                @endif
                <a class="btn btn-primary edit-btn" href="{{ route('devices.edit', $device->id) }}">Edit</a>
                <form method="POST" style="background-color: unset !important;" action="{{ route('devices.destroy', $device->id) }}">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger delete-btn" type="submit" value="Delete">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- @extends('layout')

@section('title', 'Show Device Details')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
        <h1>Devices</h1>
    </div>

    <div class="mt-8">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $device['name'] }} is from <strong>{{ $device['origin'] }}</strong> - <strong>${{ $device['price'] }}</strong></h3>
                <img src="{{ asset($device['image_path']) }}" alt="Device Image">
                <a class="btn btn-primary edit-btn" href="{{ route('devices.edit', $device->id) }}">Edit</a>
                <form method="POST" style="background-color: unset !important;" action="{{ route('devices.destroy', $device->id) }}">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger delete-btn" type="submit" value="delete">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection --}}

