@extends('layouts/app')

@section('content')
    <h1>Add an Organization</h1>
    {!! Form::open(['action' => ['OrganizationsController@update', $organization->id], 'method' => 'POST']) !!}
        <div>
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $organization->name, ['placeholder' => 'Name'])}}
        </div>
        <div>
            {{Form::label('user_id', 'Employee')}}
            {{Form::text('user_id', $organization->user_id, ['placeholder' => 'Employee ID'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit')}}
    {!! Form::close() !!}
@endsection
