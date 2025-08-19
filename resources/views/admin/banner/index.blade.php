@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Banner CMS</h1>
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
                <h3 class="card-title">View Banner CMS</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                     <th>Image</th>
                      <th>Image</th>
                    <th>Image</th>
                    <th>Actions</th>
                  </tr>
                  </thead>


                  <tbody>


                  @foreach($banner as $ban)

                  <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $ban->title }}</td>
                      <td>{{ substr(strip_tags($ban->content),0,100) }}...</td>
                    <td> @if($ban->image != null)<img src="{{ asset('/uploads/banner/') }}/{{ $ban->image }}" width="100px">@else <label>No Image Found</label>@endif</td>
                    <td> <a class="btn btn-primary d-inline-block" href="{{ route('banner.edit',$ban->id) }}"><i class="fas fa-pencil-alt"></i></a>
                    <form class="d-inline-block" action="{{ route('banner.destroy', $ban->id) }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
                  </td>

                    
                  </tr>

                  @endforeach

                  </tbody>


                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>


@stop

@section('css')
   
@stop

@section('js')
    
@stop

      
