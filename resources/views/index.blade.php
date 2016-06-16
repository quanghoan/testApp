@extends('layouts.app')

@section('content')
  <div class="col-md-6">
    <!-- Create user Form... -->
    <div class="panel-body">
      <!-- Display Validation Errors -->
      @include('common.errors')

      <!-- New user Form -->
      <form action="/user" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- user Name -->
        <div class="form-group">
          <label for="user" class="col-sm-3 control-label">Add new user</label>

          <div class="col-sm-6">
            <label>Name</label>
            <input type="text" name="name" id="user-name" class="form-control">
          </div>

          <div class="col-sm-6">
            <label>Address</label>
            <input type="text" name="address" id="user-address" class="form-control">
          </div>

          <div class="col-sm-6">
            <label>Age</label>
            <input type="text" name="age" id="user-age" class="form-control">
          </div>
        </div>

        <!-- Add user Button -->
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-plus"></i> Add user
            </button>
          </div>
        </div>
      </form>
    </div>
    <!-- Current users -->
    @if (count($users) > 0)
      <div class="col-md-5">
        <div class="panel-heading">
          List of users
        </div>

        <div class="panel-body">
          <table class="table table-bordered">

            <!-- Table Headings -->
            <thead>
              <th>Id</th>
              <th>Name</th>
              <th>Address</th>
              <th>Age</th>
              <th>Action</th>
            </thead>

            <!-- Table Body -->
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td class="table-text">
                    <div>{{ $user->id }}</div>
                  </td>
                  <!-- user Name -->
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->address }}</td>
                  <td>{{ $user->age }}</td>

                  <!-- Delete Button -->
                  <td>
                    <form action="/user/{{ $user->id }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}

                      <button>Delete</button>
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