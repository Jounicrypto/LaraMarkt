@extends('layout')

@section('title', 'Devices')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8">
        <h1>Devices</h1>
    </div>

    <div class="mt-8">
        @if (count($devices) > 0)
            <ul>
                <p>Choose what you like!</p>
                @foreach ($devices as $device)
                    <a style="color: unset !important;" href="{{ route('devices.show', ['device' => $device['id']]) }}">
                        <li>
                            {{ $device['name'] }} is from <strong>{{ $device['origin'] }}</strong>-<strong>${{ $device['price'] }}</strong>
                            @if($device->image_path)
                                <img src="{{ asset($device->image_path) }}" alt="{{ $device['name'] }} Image" style="max-width: 100px;">
                            @else
                                <p>No image available</p>
                            @endif
                        </li>
                    </a>
                @endforeach
            </ul>
        @else
            <p>There are no Devices to display.</p>
        @endif
    </div>
</div>
@endsection

