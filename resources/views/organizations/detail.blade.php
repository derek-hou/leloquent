@extends('layouts/app')

@section('content')
    <a href="/organizations">Back</a>
    <h1>Organizations Detail</h1>
    <p>{{$organization->name}} {{$organization->user_id}}</p>
    <a href="/organizations/{{$organization->id}}/edit">edit</a>

    {!! Form::open(['action' => ['OrganizationsController@destroy', $organization->id], 'method' => 'POST']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete')}}
    {!! Form::close() !!}
@endsection
