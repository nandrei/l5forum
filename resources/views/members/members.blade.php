@extends('default')

@section('content')

    <div class="border">
        <div class="blue_bg">
            <div class="members" style="margin-left: 50px">
                @foreach($users as $user)
                    <li><b>Id: </b>{{ $user['id'] }}, <b>Name: </b>{{ $user['name'] }},
                        <b>Email: </b>{{ $user['email'] }}</li><br>
                @endforeach
            </div>
        </div>
    </div>

@endsection