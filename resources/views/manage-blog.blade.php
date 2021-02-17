@extends('layout.master')
@section('content')
    <div class="container">
        <button type="submit" onclick="window.location='{{url(url()->current().'/create')}}'" class="btn btn-dark mt-3 mb-3">
            + Create blog
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $a)
                    <tr>
                        <td>{{$a->title}}</td>
                        <form action="{{url(url()->current().'/delete/'.$a->id)}}" method="post">
                            @csrf
                            <td>
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </td>

                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
