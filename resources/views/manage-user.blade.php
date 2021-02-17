@extends('layout.master')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <form action="{{url('/admin/user/delete/'.$u->id)}}" method="post">
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
