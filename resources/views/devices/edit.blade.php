@extends('layout')

@section('title', 'Edit Device Details')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="text-center mb-4">Edit Device Details</h1>
                    <form action="{{ route('devices.update', ['device' => $device->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="deviceName" class="text-sm">Device Name</label>
                            <input name="deviceName" id="deviceName" value="{{ $device->name }}" type="text"
                                class="form-control">
                            @error('deviceName')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deviceOrigin" class="text-sm">Device Origin</label>
                            <input name="deviceOrigin" id="deviceOrigin" value="{{ $device->origin }}" type="text"
                                class="form-control">
                            @error('deviceOrigin')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="devicePrice" class="text-sm">Device Price</label>
                            <input name="devicePrice" id="devicePrice" value="{{ $device->price }}" type="text"
                                class="form-control">
                            @error('devicePrice')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deviceImage" class="text-sm">Current Device Image</label>
                            <div>
                                @if($device->image_path)
                                    <img src="{{ asset($device->image_path) }}" alt="{{ $device['name'] }} Image" style="max-width: 200px;">
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deviceImage" class="text-sm">Upload New Device Image</label>
                            <input type="file" name="deviceImage" id="deviceImage" class="form-control-file">
                            @error('deviceImage')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
