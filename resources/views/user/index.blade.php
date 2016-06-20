@extends('layouts.app')

@section('content')
  <div class="col-sm-4">
      @include('common.errors')
      <!-- New user Form -->
      <!-- <form action="/user" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">

          <h1>Add new user</h1>

          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" id="user-name" class="form-control">
          </div>

          <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" id="user-address" class="form-control">
          </div>

          <div class="form-group">
            <label>Age</label>
            <input type="text" name="age" id="user-age" class="form-control">
          </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">
              Add user
            </button>
        </div>
      </form> -->
      <h1>Add new user</h1>
      {!! Form::open([
        'route' => 'user.store','files' => true
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

      {!! Form::label('photo', 'Photo') !!}
      {!! Form::file('photo', null, array( 'class'=>'form-control')) !!}

      {!! Form::submit('Create user', ['class' => 'btn btn-primary']) !!}

      {!! Form::close() !!}
    </div> 
    <!-- Current users -->
    @if (count($users) > 0)
      <div class="col-sm-7">
        <h1>List of users</h1>

        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <th>Id</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Address</th>
              <th>Age</th>
              <th>Action</th>
            </thead>

            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td class="table-text">
                    <div>{{ $user->id }}</div>
                  </td>
                  <!-- user Name -->
                  <td width="100" height="100"><img src="avatar/{{ $user->photo }}" width="100" height="100"></td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->address }}</td>
                  <td>{{ $user->age }}</td>

                  <!-- Delete Button -->
                  <td>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info">Edit</a>
                    <form action="/user/{{ $user->id }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div> 
    @endif  
  </div>  
@endsection