@extends('layout.master')
@section('content')
    <div class="container mt-3">
        <form action="{{ url('/user/update-profile') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="{{auth()->user()->name}}" name="name"
                    placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" value="{{auth()->user()->email}}" name="email"
                    aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="number" class="form-control" id="phone" value="{{auth()->user()->phone}}" name="phone"
                    placeholder="Enter phone">
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <button type="submit" class="btn btn-dark">Update</button>

        </form>
    </div>

@endsection
