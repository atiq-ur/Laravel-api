@extends('layouts.master')

@section('content')
    <!-- Button trigger modal -->

    <!-- Modal -->

    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">Contacts Crud </h1>
                <p class="text-center"> API crud application with Repository Pattern </p>
                <div class="text-center">
                    <a href="{{ route('contact.index') }}" class="btn btn-primary text-center">CRUD APP</a>
                </div>
            </div>
        </div>
    </div>
@endsection
