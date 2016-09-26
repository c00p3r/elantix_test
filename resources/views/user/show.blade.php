@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Your Profile</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">E-mail</div>
                            <div class="col-sm-8">{{ $user->email }}</div>
                        </div>
                        @foreach($user['editable'] as $user_field)
                            <div class="row">
                                <div class="col-sm-4">{{ ucfirst(str_replace("_", " ", $user_field)) }}</div>
                                <div class="col-sm-8">{{ $user->$user_field }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-footer">
                        <a href="{{ action('UserController@edit', ['user' => Auth::user()]) }}" class="btn btn-primary">Edit
                            Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
