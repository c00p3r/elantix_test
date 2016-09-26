@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Edit Profile</div>
                    {{ Form::model($user, ['action' => ['UserController@update', $user->id], 'method' => 'PUT', 'class' => 'form']) }}
                    {{ method_field('PUT') }}
                    <div class="panel-body">
                        @foreach($user['editable'] as $user_field)
                            <?php $classes = array('form-group') ?>
                            <?php if ($errors->has($user_field)) {
                                $classes[] = 'has-error';
                            } ?>
                            <div class="{{ implode(' ', $classes) }}">
                                {{ Form::label($user_field, ucfirst($user_field)) }}
                                @if($user_field == 'gender')
                                    {{ Form::select($user_field, array('', 'Male', 'Female'), null, ['class' => 'form-control']) }}
                                @else
                                    {{ Form::text($user_field, null, ['class' => 'form-control']) }}
                                @endif
                                {!! $errors->first($user_field, '<div class="help-block form-field-error">:message</div>') !!}
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-footer text-center">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-primary']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')
    <script>

    </script>
@endsection
