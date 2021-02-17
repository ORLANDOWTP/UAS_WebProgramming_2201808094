@extends('layout.master')
@section('content')
    <div class="container mt-3">
        <form action="{{ url(url()->current()) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title"
                    placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="sel1">Category:</label>
                <select class="form-control" id="category" name="category">
                    @foreach ($categories as $c)
                        <option>{{ $c->name }}</option>

                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Photo:</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Story:</label>
                <textarea class="form-control" id="desc" rows="3" name="desc"></textarea>
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
            <button type="submit" class="btn btn-dark">Create</button>

        </form>
    </div>

@endsection
