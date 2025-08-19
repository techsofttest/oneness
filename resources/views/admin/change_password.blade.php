@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Account Settings</h1>
@stop

@section('content')


<div class="card card-info">


<div class="card-header">
<h3 class="card-title">Change Password</h3>
</div>



<form name="change_pass" action="{{ route('update-password') }}" onsubmit="return validateForm()" method="POST">
@csrf
@method('POST')

<div class="card-body">

      

            <div class="form-group row">

                <label class="col-sm-2 col-form-label">New Password</label>

                <div class="col-sm-10">
                <input type="password" id="pass1" name="new_password" class="form-control" value="" placeholder="" required>
                </div>

            </div>


            <div class="form-group row">

            <label class="col-sm-2 col-form-label">Confirm Password</label>

            <div class="col-sm-10">
            <input type="password" id="pass2" name="confirm-password" class="form-control" value="" placeholder="" required>
            </div>

            </div>

    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </div>

</form>

</div>


@stop


@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->

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

        alertify .ajs-commands button.ajs-close {
    background-color: #854361;
}

            .alertify .ajs-dialog {
            
            height: 78px;
            min-height: unset;
            padding: 24px 24px 24px 24px;

            }

        .alertify .ajs-body .ajs-content {
            padding: 16px 24px 10px 16px;
            }
    </style>
@stop

@section('js')

<script src="{{asset('js/alertify.min.js')}}"></script> 

    @if(session()->has('success'))
    <script>
       // alertify.success('Banner Updated Successfully'); 
       alertify.alert(' Password Changed Successfully').set('basic', true);    </script>
    @endif

    @if(session()->has('error'))
    <script>
        alertify.error('Password Updation Failed '); 
    </script>
    @endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

function validateForm() {

    let p1 = document.forms["change_pass"]["new_password"].value;

    let p2 = document.forms["change_pass"]["confirm-password"].value;

    if (p1 != p2) {
      
      alertify.error('Passwords do not match').delay(8).dismissOthers();

      return false;
    }

  }

</script>

@stop

