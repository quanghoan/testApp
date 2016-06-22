@extends('layouts.app')

@section('content')

  <div class="row" ng-app="TestApp" ng-controller="TestController">
    <div class="col-md-4">
      <h1 ng-if="isEdit==false">Add new member</h1>
      <h1 ng-if="isEdit==true">Edit Member</h1>

      <div class="form-group">
        {{--<input name="_method" type="hidden" value="PATCH">--}}

        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, array( 'class'=>'form-control', 'ng-model' => 'member.name')) !!}
      </div>
      <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, array( 'class'=>'form-control', 'ng-model'=> 'member.email')) !!}
      </div>
      <div class="form-group">
        {!! Form::label('phone', 'Phone') !!}
        {!! Form::text('phone', null, array( 'class'=>'form-control', 'ng-model' => 'member.phone')) !!}
      </div>
      {!! Form::label('image', 'Upload avatar') !!}
      {!! Form::file('image', null, array( 'class'=>'form-control', 'ng-model' => 'member.image')) !!}

      {!! Form::submit( 'Add Member', array('class'=>'btn', 'ng-click' => 'saveData()', 'ng-if' => 'isEdit==false'))  !!}

      {!! Form::submit( 'Edit Member', array('class'=>'btn', 'ng-click'=> 'saveEditData()' , 'ng-if' => 'isEdit==true'))  !!}
      <% member %>
      <h1><%member.name%></h1>
      <h1><%member.email%></h1>
      <h1><%member.phone%></h1>
      {{--{!! Form::close() !!}--}}
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-5">

    <h1>List All Member</h1>
    <div class="contain" ng-repeat="m in members">

      <img class="avatar" src="<% m.image %>">
      {{--<pre>@{{ m.name }}</pre>--}}

      <pre class="name"><a href="member/<%m.id%> " name="link1" ng-click="Edit()"><%m.name%></a></pre>

      <input type="button" name="<% m.id %>" ng-click="Edit(m.id)" value="Edit <% m.name %>"><br>
      {{--{{ Form::checkbox('attending_lan', 'yes') }}--}}
      
      <input type="button" name="<% m.id %>" ng-click="deleteData(m.id)" value="Delete <% m.name %>"><br>

      <?php echo "<br />"; ?>
    </div>

      <br>

    </div>
    {{--@foreach($members as $member)--}}
    {{--<h1><a href="{{url('/member', $member->id)}}">{{$member -> name}}</a></h1>--}}

    {{--<h3>  {{ Form::image($member->image, '',array('height'=>80, 'width'=> 80)   ) }}--}}
    {{--</h3>--}}
    {{--@endforeach--}}

  </div>
@stop