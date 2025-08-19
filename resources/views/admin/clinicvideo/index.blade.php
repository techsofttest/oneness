@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Clinic Video Testimonial</h1>
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
        <h3 class="card-title">View Clinic Video Testimonial</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped table-admin">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Title</th>
              <th>Video</th>
              <th>Actions</th>
            </tr>
          </thead>


          <tbody>

            @php($i=0)

            @foreach($clinicvideo as $page)

            <tr>
              <td>{{ ++$i; }}</td>
              <td>{{ $page->title }}</td>
              <td>{{ $page->video }}</td>
 
           
              <td>



                <a class="btn btn-primary d-inline-block" href="{{ route('clinicvideo.edit',$page->id) }}"><i class="fas fa-pencil-alt"></i></a>


                <form class="d-inline-block" action="{{ route('clinicvideo.destroy', $page->id) }}" method="POST">
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