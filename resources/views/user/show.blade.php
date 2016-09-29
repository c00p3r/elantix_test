@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary profile-info">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title">Your Profile</h3>
                    </div>

                    {{--<div class="panel-body">--}}
                        {{--<dl class="dl-horizontal">--}}
                            {{--<dt>E-mail</dt>--}}
                            {{--<dd>{{ $user->email }}</dd>--}}
                        {{--</dl>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-4">E-mail</div>--}}
                            {{--<div class="col-sm-8">{{ $user->email }}</div>--}}
                        {{--</div>--}}
                        {{--@foreach($user['editable'] as $user_field)--}}
                            {{--<dl class="dl-horizontal">--}}
                                {{--<dt>{{ ucfirst(str_replace("_", " ", $user_field)) }}</dt>--}}
                                {{--<dd>{{ $user->$user_field }}</dd>--}}
                            {{--</dl>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-4">{{ ucfirst(str_replace("_", " ", $user_field)) }}</div>--}}
                                {{--<div class="col-sm-8">{{ $user->$user_field }}</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>E-mail</td>
                            <td>{{ $user->email }}</td>
                        </tr>

                        @foreach($user['editable'] as $user_field)
                        <tr>
                            <td>{{ ucfirst(str_replace("_", " ", $user_field)) }}</td>
                            <td>{{ $user->$user_field }}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="panel-footer text-center">
                        <a href="{{ action('UserController@edit', ['user' => Auth::user()]) }}" class="btn btn-primary">Edit
                            Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
