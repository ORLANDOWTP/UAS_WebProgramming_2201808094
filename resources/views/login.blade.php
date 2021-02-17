@extends('layout.master')
@section('content')
<div class="container mt-3">
    <form action="{{url('/login')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="sel1">Login as</label>
            <select class="form-control" id="role" name="role">
                <option>User</option>
                <option>Admin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email"
                aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
        <button type="submit" class="btn btn-dark">Login</button>

    </form>
</div>

@endsection
