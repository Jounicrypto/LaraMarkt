@extends('layout')

@section('title', 'Create New Device')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="text-center mb-4">Add A New Device</h1>
                    <form action="{{ route('devices.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="deviceName" class="text-sm">Device Name</label>
                            <input name="deviceName" id="deviceName" value="{{old('deviceName')}}" type="text"
                                class="form-control">
                            @error('deviceName')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deviceOrigin" class="text-sm">Device Origin</label>
                            <input name="deviceOrigin" id="deviceOrigin" value="{{old('deviceOrigin')}}" type="text"
                                class="form-control">
                            @error('deviceOrigin')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="devicePrice" class="text-sm">Device Price</label>
                            <input name="devicePrice" id="devicePrice" value="{{old('devicePrice')}}" type="text"
                                class="form-control">
                            @error('devicePrice')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- File Input for Image -->
                        <div class="form-group">
                            <label for="deviceImage" class="text-sm">Device Image</label>
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

