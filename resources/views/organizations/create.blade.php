@extends('layouts/app')

@section('content')
    <h1>Add an Organization</h1>
    {!! Form::open(['action' => 'OrganizationsController@store', 'method' => 'POST']) !!}
        <div>
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['placeholder' => 'Name'])}}
        </div>
        {{Form::submit('Submit')}}
    {!! Form::close() !!}
@endsection
