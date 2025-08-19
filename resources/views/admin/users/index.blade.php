@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Manage Users</h1>
@stop

@section('content')

<style>
    a.brand-link img {
    display: none;
}
</style>

<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-header">
        <h3 class="card-title">User List</h3>
      </div>

      <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

       <table id="datatable" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Sl No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Status</th>
      <th>Actions</th> 
    </tr>
  </thead>

  <tbody>
    @foreach ($users as $user)

    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>

      <td>
      @if ($user->status == 'active')
          <a href="{{url('admin/users/update-status/'.$user->id.'')}}" onclick="return confirm('Update user status?')" class="btn btn-success">Active</a>
      @elseif ($user->status == 'inactive')
          <a href="{{url('admin/users/update-status/'.$user->id.'')}}" onclick="return confirm('Update user status?')" class="btn btn-danger">Inactive</a>
      @endif
      </td>


      <td>
      <a onclick="return confirm('Reset user device?')" class="btn btn-warning" href="{{url('admin/users/reset-device/'.$user->id.'')}}">
          <i class="fas fa-clock"></i> Reset Device
      </a>
      </td>
      
      
      @php /*
      <td>

        <a class="btn btn-primary" href="{{ route('users.viewusers', $user->id) }}">
          <i class="fas fa-eye"></i>
        </a>

        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this user?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i>
          </button>
        </form>
      </td>

        */ @endphp


    </tr>
    @endforeach
  </tbody>
</table>


        <div class="mt-3">
          {{ $users->links() }}
        </div>

      </div>
    </div>
  </div>
</div>

@stop

@section('css')

<style>
.blinking {
  animation: blinkingText 1s infinite;
}

@keyframes blinkingText {
  0% { opacity: 1; }
  50% { opacity: 0; }
  100% { opacity: 1; }
}
</style>
    <!-- DataTables CSS (optional) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <!-- DataTables JS (optional) -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(function () {
          $('#datatable').DataTable();
      });
    </script>
@stop
