@extends('layout.master')
@section('content')
<div class="d-flex flex-wrap mr-auto ml-auto p-4">

        <div class="mr-auto mb-5">
            <h2>
                {{$articles->title}}
            </h2>
            <img src="{{asset('storage/assets/'.$articles->image)}}" alt="" srcset="">
            <div class="text">
                {{$articles->description}}
            </div>
            <button type="button" onclick="window.location='{{url('/')}}'" class="btn btn-dark">Back</button>
        </div>

</div>

@endsection
