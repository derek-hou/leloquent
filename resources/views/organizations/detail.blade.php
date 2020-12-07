@extends('layouts/app')

@section('content')
    <a class="btn btn-primary" href="/home">Back</a>
    <h1>Organization</h1>
    @if (count($data['organization']) > 0)
        <table>
            <tr>
                <th>Organization</th>
                <th>Joined</th>
            </tr>
            @foreach ($data['organization'] as $item)
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
        <table>
            <tr>
                <th>Organization</th>
                <th>Joined</th>
                <th>Status</th>
            </tr>
            @foreach ($data['activeUsers'] as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->status}}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No active users in this Organization.</p>
    @endif

    @if (count($data['inactiveUsers']) > 0)
        <table>
            <tr>
                <th>Organization</th>
                <th>Joined</th>
                <th>Status</th>
            </tr>
            @foreach ($data['inactiveUsers'] as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->status}}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No active users in this Organization.</p>
    @endif
@endsection
