@extends('main')

@section('content')

  <div ng-app="hoandq" ng-controller="quanghoan">
    <div class="col-sm-4">
      @include('common.errors')
      <h1>Add user</h1>

      {!! Form::open([
        'route' => 'user.store','files' => true
      ]) !!}

      <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, array( 'class'=>'form-control', 'ng-model' => 'user.name')) !!}
      </div>

      <div class="form-group">
        {!! Form::label('address', 'Address:', ['class' => 'control-label', 'ng-model' => 'user.name']) !!}
        {!! Form::text('address', null, array( 'class'=>'form-control', 'ng-model' => 'user.address')) !!}
      </div>

      <div class="form-group">
        {!! Form::label('age', 'Age:', ['class' => 'control-label']) !!}
        {!! Form::text('age', null, array( 'class'=>'form-control', 'ng-model' => 'user.age')) !!}
      </div>

      {!! Form::label('photo', 'Photo') !!}
      {!! Form::file('photo', null, array( 'class'=>'form-control')) !!}

      {!! Form::submit('Create user', array('class'=>'btn btn-success', 'ng-click' => 'createUser()')) !!}
      {{--{!! Form::close() !!}--}}
    </div>
    <div class="col-sm-7">
      <h1>List users</h1>
      <table class="table table-bordered">
        <thead>
        <tr>
          <th>Id</th>
          <th>Photo</th>
          <th>
            <button class="test" ng-click="sortBy('name')">Name</button>
            <span ng-show="propertyName === 'name'" ng-class="{reverse: reverse}"></span>
          </th>
          <th><button class="test" ng-click="sortBy('address')">Address</button>
            <span ng-show="propertyName === 'address'" ng-class="{reverse: reverse}"></span></th>
          <th><button class="test" ng-click="sortBy('age')">Age</button>
            <span ng-show="propertyName === 'age'" ng-class="{reverse: reverse}"></span></th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          <tr ng-repeat="user in users | orderBy:propertyName:reverse">
            <td><% user.id %></td>
            <td width="100" height="100"><img src="/avatar/<%user.photo%>" width="100" height="100"></td>
            <td><% user.name %></td>
            <td><% user.address %></td>
            <td><% user.age %></td>
            <td>
              <a href="user/<%user.id%>/edit" class="btn btn-info">Edit</a>
              <input type="button" ng-click="deleteUser(user.id)" value="Delete" class="btn btn-danger">
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.test').click(function(event) {
        event.preventDefault();
      });
    });
  </script>
@stop