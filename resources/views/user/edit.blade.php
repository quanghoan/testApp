@extends('layouts.app')

@section('content')
    <div id="container">
        <div class="row" >
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <h1>Edit {!! $user->name !!} Here</h1>

                {{--                {!! Form::open(array('action'=>'usersController@store', 'files'=>true)) !!}--}}

                {{--                {!! Form::model($article, ['method' => 'PATCH', 'action' =>['ArticlesController@update', $article->id]]) !!}--}}

                {!! Form::model($user, ['method' => 'PATCH', 'files'=>true, 'action' =>['usersController@update', $user->id]]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', $user->name, array( 'class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address', 'address') !!}
                    {!! Form::text('address', $user->address, array( 'class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('age', 'age') !!}
                    {!! Form::text('age', $user->age, array( 'class'=>'form-control')) !!}
                </div>
                {!! Form::label('image', 'Upload avatar') !!}
                {!! Form::file('image', null, array( 'class'=>'form-control')) !!}


                {!! Form::submit( 'Edit user', array('class'=>'btn'))  !!}
                {!! Form::close() !!}


                {!! Form::open(['method' => 'DELETE','route' =>['user.destroy',$user->id]]) !!}
                <div class ="form-group">
                    {!! Form::submit('Delete user', ['class'=>'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
@stop