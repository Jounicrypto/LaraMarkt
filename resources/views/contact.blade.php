@extends('layout')

@section('title', 'Contact Us')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="text-center mb-4">Contact Us</h1>
                    <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                             @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                        </ul>
                    </div>
                        @endif
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                        <div class="form-group">
                            <label for="name" class="text-sm">Your Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-sm">Your Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="message" class="text-sm">Message</label>
                            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-secondary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
