@extends('layouts/app')

@section('content')
    <a href="/organizations">Back</a>
    <h1>Organizations Detail</h1>
    <p>{{$organization->name}}</p>
@endsection
