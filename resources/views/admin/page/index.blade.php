@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Pages CMS</h1>
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
        <h3 class="card-title">View Pages</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped table-admin">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Page Name</th>
              <th>Title</th>
              <th>Content</th>
               <th>Image</th>
              <th>Actions</th>
            </tr>
          </thead>


          <tbody>

            @php($i=0)

            @foreach($pages as $page)

            <tr>
              <td>{{ ++$i; }}</td>
              <td>{{ $page->title }}</td>
              <td>{{ $page->cms_title }}</td>
              <td>{{ substr(strip_tags($page->content),0,100) }}...</td>
  <td>
            <img src="{{ asset('/uploads/pages/' . $page->image) }}" width="100" alt="No Image">
        </td>
              <td>

                <a class="btn btn-primary d-inline-block" href="{{ route('page.edit',$page->id) }}"><i class="fas fa-pencil-alt"></i></a>

                


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