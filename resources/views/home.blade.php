@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($data['userRole'] == 'USER')
                        <h1>Your Organization</h1>
                        <table>
                            <tr>
                                <th>Organization</th>
                                <th>Joined</th>
                            </tr>
                            <tr>
                                <td>
                                    {{$data['organizations']->name}}
                                </td>
                                <td>
                                    {{$data['organizations']->created_at}}
                                </td>
                            </tr>
                        </table>
                    @else                    
                        @if (count($data['organizations']) > 0)
                            <h1>Organizations</h1>
                            <table>
                                <tr>
                                    <th>Organization</th>
                                    <th></th>
                                </tr>
                                @foreach($data['organizations'] as $org)
                                    <tr>
                                        <td>
                                            {{$org->name}}
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="/organizations/{{$org->id}}">details</a></li>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>You are not part of an Organizations.</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
