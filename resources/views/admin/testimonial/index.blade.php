@extends('adminlte::page')



@section('title', 'Dashboard')



@section('content_header')

<h1>Testimonial</h1>

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

        <h3 class="card-title">View Testimonial</h3>

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



            



            @foreach($testimonial as $course)

          

            <tr>

            <td>{{ $loop->iteration }}</td>
            <td>{{ $course->title }}</td>
             

              <td> <img src="{{ asset('/uploads/testimonial/') }}/{{ $course->image }}" width="100" alt="No Image" ></td>



              <td>



                <a class="btn btn-primary d-inline-block" href="{{ route('testimonial.edit',$course->id) }}"><i class="fas fa-pencil-alt"></i></a>


                <form class="d-inline-block" action="{{ route('testimonial.destroy', $course->id) }}" method="POST">
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