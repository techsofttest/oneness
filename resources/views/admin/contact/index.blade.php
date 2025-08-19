@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Contact</h1>
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
                <h3 class="card-title">View Contact</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Whatsapp</th>
                    <th>Actions</th>
                  </tr>
                  </thead>


                  <tbody>

                  @php($i=0)

                  @foreach($contact as $con)

                  <tr>
                    <td>{{ ++$i; }}</td>
                    <td>{!! $con->address !!}</td>
                    <td>{{ $con->phone }}</td>
                    <td>{{ $con->email }}</td>
                    <td>{{ $con->whatsapp }}</td>

                    <td> <a class="btn btn-primary d-inline-block" href="{{ route('contact.edit',$con->id) }}"><i class="fas fa-pencil-alt"></i></a></td>
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

      
