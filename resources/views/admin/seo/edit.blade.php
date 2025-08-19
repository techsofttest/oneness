@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Seo </h1>
@stop

@section('content')

<style>
    a.brand-link img {
    display: none;
}
</style>

<div class="card card-info">


    <div class="card-header">
        <h3 class="card-title">Edit Page</h3>
    </div>

    <form class="form-horizontal" action="{{route('seo.update', $seo->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="card-body">





            <div class="form-group row">

                <label for="" class="col-sm-2 col-form-label">Title</label>

                <div class="col-sm-10">
                    <input type="text"  class="form-control" name="title" value="{{$seo->title}}" required>
                </div>

            </div>

            <div class="form-group row">

                <label for="" class="col-sm-2 col-form-label">Meta Title</label>

                <div class="col-sm-10">
                    <input type="text" name="meta_title" class="form-control" value="{{$seo->meta_title}}"  required>
                </div>

            </div>




            <div class="form-group row">

                <label for="" class="col-sm-2 col-form-label">Meta Key</label>

                <div class="col-sm-10">
                    <input type="text" name="meta_key" class="form-control" value="{{$seo->meta_key}}"  required>
                </div>

            </div>

            
            <div class="form-group row">

                <label for="" class="col-sm-2 col-form-label">Meta Desc</label>

                <div class="col-sm-10">
                    <textarea id="" class="form-control" style="height:150px" name="meta_desc" >{!! $seo->meta_desc !!}</textarea>

                </div>

            </div>


           





        </div>
        <!-- /.card-body -->


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
        </div>

</div>



</form>


</div>








@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{asset('css/alertify.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/default.min.css')}}">

    <style>
        .ajs-content {
            background-color: #17a2b8;
            color: white;
            text-align: center;
            font-weight : bold;
            height : 50px;
            margin-top: -10px;
        }

        .alertify .ajs-header {
            
            display: none;
        }

        /* .alertify .ajs-modal {
    
                height : 100px;
            } */

            .alertify .ajs-dialog {
   
                height: 78px;
                min-height: unset;
                padding: 24px 24px 24px 24px;
   
            }

            .alertify .ajs-commands button.ajs-close {
    background-color: #854361;
}

        .alertify .ajs-body .ajs-content {
            padding: 16px 24px 10px 16px;
}
    </style>
@stop

@section('js')
    
    <!-- Include CKEditor script -->
 
    <script src="{{asset('js/alertify.min.js')}}"></script> 

    @if(session()->has('success'))
    <script>
       // alertify.success('Banner Updated Successfully'); 
       alertify.alert('Seo Updated Successfully').set('basic', true);    </script>
    @endif

    @if(session()->has('error'))
    <script>
        alertify.error('Updating Seo Failed '); 
    </script>
    @endif

    <script>
        $(document).ready(function() {
            // Initialize CKEditor on the textarea with id 'editor'
            CKEDITOR.replace('editor', {
        // Add configuration options here if needed
        on: {
            instanceReady: function(evt) {
                // Example: Hiding specific elements if necessary
                var editor = evt.editor;
                editor.on('contentDom', function() {
                    var doc = editor.document;
                    var warnings = doc.find('.cke_warning'); // Example class name
                    warnings.forEach(function(el) {
                        el.hide();
                    });
                });
            }
        }
    });
        });
    </script>



@stop
