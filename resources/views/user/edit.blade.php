@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Edit Profile</div>
                    {{ Form::model($user, ['action' => ['UserController@update', $user->id], 'method' => 'PUT', 'class' => 'form']) }}
                    <div class="panel-body">
                        @foreach($user['editable'] as $user_field)
                            <?php $classes = array('form-group') ?>
                            <?php if ($errors->has($user_field)) {
                                $classes[] = 'has-error';
                            } ?>
                            <div class="{{ implode(' ', $classes) }}">
                                {{ Form::label($user_field, ucfirst(str_replace("_", " ", $user_field))) }}
                                @if($user_field == 'gender')
                                    <?php $list = array('', 'Male', 'Female') ?>
                                    {{ Form::select($user_field, $list, array_search($user->$user_field, $list), ['class' => 'form-control']) }}
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
    <script src="/js/core.js"></script>
    <script>
        $(function () {
            $('form').on('submit', function (e) {
                e.preventDefault();
                core.updateUser('{{ action('UserController@update', $user->id) }}', $(this).serialize());
            });
        });
    </script>
@endsection
