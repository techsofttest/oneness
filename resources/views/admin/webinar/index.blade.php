@extends('adminlte::page')



@section('title', 'Dashboard')



@section('content_header')

<h1>Webinar</h1>

@stop



@section('content')



<div class="row">



  <div class="col-12">



    <div class="card">

      <div class="card-header">

        <h3 class="card-title">View Webinar</h3>

      </div>

      <!-- /.card-header -->

      <div class="card-body">

        <table id="datatable" class="table table-bordered table-striped">

          <thead>

            <tr>

              <th>Sl No</th>

              <th>Title</th>
             

              <th>Image</th>

              <th>Actions</th>

            </tr>

          </thead>





          <tbody>



            



            @foreach($webinar as $course)

          

            <tr>

            <td>{{ $loop->iteration }}</td>
            <td>{{ $course->title }}</td>
             

              <td> <img src="{{ asset('/uploads/webinar/') }}/{{ $course->image }}" width="100" alt="No Image" ></td>



              <td>



                <a class="btn btn-primary d-inline-block" href="{{ route('webinar.edit',$course->id) }}"><i class="fas fa-pencil-alt"></i></a>


                <form class="d-inline-block" action="{{ route('webinar.destroy', $course->id) }}" method="POST">
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