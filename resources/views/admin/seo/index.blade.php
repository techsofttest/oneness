@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Seo</h1>
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
        <h3 class="card-title">View Seo</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Page Title</th>
              <th>Meta Title</th>
              <th>Actions</th>
            </tr>
          </thead>


          <tbody>

            @php($i=0)

            @foreach($seo as $seo)

            <tr>
              <td>{{ ++$i; }}</td>
              <td>{{ $seo->title }}</td>
              <td>{{ $seo->meta_title }}</td>

              <td>

                <a class="btn btn-primary d-inline-block" href="{{ route('seo.edit',$seo->id) }}"><i class="fas fa-pencil-alt"></i></a>

                


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