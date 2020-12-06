@extends('layouts/app')

@section('content')
    <h1>Organizations</h1>
    @if(count($organizations) > 1)
        <ul>
            @foreach ($organizations as $org)
                <li>{{$org->name}} {{$org->user_id}} <a href="/organizations/{{$org->id}}">details</a></li>
            @endforeach
        </ul>
    @else
        <p>No Organizations found!</p>
    @endif
@endsection
