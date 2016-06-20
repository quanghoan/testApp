@extends('layouts.app')

@section('content')
  <div id="container">
      <div class="row" >
          <div class="col-md-4">
            {!! Form::model($user, [
              'method' => 'PATCH',
              'route' => ['user.update', $user->id]
            ]) !!}

            <div class="form-group">
              {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
              {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('address', 'Address:', ['class' => 'control-label']) !!}
              {!! Form::text('address', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
              {!! Form::label('age', 'Age:', ['class' => 'control-label']) !!}
              {!! Form::text('age', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Update user', ['class' => 'btn btn-primary']) !!}

          {!! Form::close() !!}
          <a href="{{url('/user')}}">Index</a>
        </div>
      </div>
    </div>
@stop