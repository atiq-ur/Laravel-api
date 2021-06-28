@extends('layouts.master')

@section('content')

    @if($errors->any()){
    <div class="card">
        <div class="card-body">
            @include('partials.message')
        </div>
    </div>
    @endif
    <div class="card">
        <h3> Edit Contact - {{ $contact['data']['name'] }}</h3>
        <div class="card-body">
            <form action="{{ route('contact.update', $contact['data']['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputname" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $contact['data']['name'] }}" class="form-control" id="exampleInputname" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email"value="{{ $contact['data']['email'] }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputNumber" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" value="{{ $contact['data']['phone_number'] }}" class="form-control" id="exampleInputNumber" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection
