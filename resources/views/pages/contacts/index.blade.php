@extends('layouts.master')

@section('content')
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputname" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputname" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputNumber" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="exampleInputNumber" aria-describedby="emailHelp">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @include('partials.message')
        </div>
    </div>
    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">Contacts Crud </h1>

                <table id="table_id" class="display">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($contacts['data'] as $contact)
                        <tr>
                            <td>{{ $contact['name'] }}</td>
                            <td>{{ $contact['email'] }}</td>
                            <td>{{ $contact['phone_number'] }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('contact.edit', $contact['id']) }}">Edit</a>
                                <form action="{{ route('contact.destroy', $contact['id']) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{--{{ $contacts['data']->links() }}--}}
                    </tbody>
                </table>
                {{--{!! $contacts->links('pagination::bootstrap-4') !!}--}}
            </div>
        </div>
    </div>
@endsection
