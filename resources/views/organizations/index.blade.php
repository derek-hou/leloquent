@extends('layouts/app')

@section('content')
    <h1>Organizations</h1>
    @if(count($organizations) > 0)
        <ul>
            @foreach ($organizations as $org)
                <li>{{$org->name}}
            @endforeach
        </ul>
    @else
        <p>No Organizations found!</p>
    @endif
@endsection
