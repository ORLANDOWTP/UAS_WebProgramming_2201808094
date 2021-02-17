@extends('layout.master')
@section('content')
    @if (auth()->check())
        <div class="mr-auto ml-auto p-4">
            <h2>Welcome, {{ auth()->user()->name }}</h2>

        </div>
    @endif
    <div class="d-flex flex-wrap mr-auto ml-auto p-4">

        @foreach ($articles as $a)
            <div class="mr-auto mb-5">
                <h2>
                    {{ $a->title }}
                </h2>
                <div class="text">
                    {{ $a->description }}
                </div>
                <div>Category : {{ $a->category->name }}</div>
                <button type="button" onclick="window.location='{{ url('/article/' . $a->id) }}'"
                    class="btn btn-dark">View
                    Detail</button>
            </div>
        @endforeach


    </div>

@endsection
