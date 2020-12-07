@extends('layouts/app')

@section('content')
    <a class="btn btn-primary" href="/home">Back</a>
    <h1>Organization</h1> 
    
    @if (count($data['allUsers']) > 0)
        <h3>All Users</h3>
        <p>
            {!! Form::open(['action' => ['OrganizationsController@update', $data['organization']->id], 'method' => 'POST']) !!}
                {{Form::hidden('type', 'DEACTIVATE')}}
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Deactivate All')}}
            {!! Form::close() !!}
        </p>
        <table>
            <tr>
                <th>Organization</th>
                <th>Joined</th>
            </tr>
            @foreach ($data['allUsers'] as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                    
                </tr>
            @endforeach
        </table>
    @else
        <p>No users in this Organization.</p>
    @endif

    @if (count($data['activeUsers']) > 0)
        <h3>Active Users</h3>
        <table>
            <tr>
                <th>Organization</th>
                <th>Joined</th>
                <th>Status</th>
                <th></th>
            </tr>
            @foreach ($data['activeUsers'] as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        {!! Form::open(['action' => ['OrganizationsController@destroy', $item->id], 'method' => 'POST']) !!}
                            {{Form::hidden('type', 'ACTIVE')}}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Disable')}}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No active users in this Organization.</p>
    @endif

    @if (count($data['inactiveUsers']) > 0)
        <h3>Most Recent Inactive User</h3>
        <table>
            <tr>
                <th>Organization</th>
                <th>Joined</th>
                <th>Status</th>
            </tr>
            @foreach ($data['mostRecentInactiveUser'] as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->status}}</td>
                </tr>
            @endforeach
            <tr>
                <th>Inactive Users</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($data['inactiveUsers'] as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->status}}</td>
                </tr>
            @endforeach
            <tr>
                <td>
                    {!! Form::open(['action' => ['OrganizationsController@destroy', $item->id], 'method' => 'POST']) !!}
                        {{Form::hidden('type', 'INACTIVE')}}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete')}}
                    {!! Form::close() !!}
                </td>
            </tr>
        </table>
    @else
        <p>No inactive users in this Organization.</p>
    @endif
@endsection
