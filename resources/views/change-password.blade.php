@extends('partials.apps')



@section('meta_title')

    <title>{{ $page_seo['meta_title'] }}</title>

@endsection



@section('meta_desc')

    <meta name="description" content="{{ $page_seo['meta_desc'] }}">

@endsection



@section('meta_key')

    <meta name="keywords" content="{{ $page_seo['meta_key'] }}">

@endsection







@section('content')




  <div class="inner-bannr-sec">
  
  
  <img src="{{asset('assets/img/banner/profile-banner.jpg')}}" alt="" width="100%">
  </div>
  
  
  <div class="ibm-bcrms-main">
	<div class="ibm-bcrms">
 <div class="container">

   <h3>Change Password</h3>
  </div>
</div>
</div>
  <section class="Myaccountsec">
  <div class="container">
    <div class="row">
      
    

    @include('profile-sidebar')


  
    
      <div class="col-lg-9 col-md-8">
     <div id="General" class="tabcontent profile">
          <div class="Address">
            
   

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('change-passwords') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="old_password">Old Password</label>
        <input type="password" name="current_password" required class="form-control">
    </div>

    <div class="form-group">
        <label for="new_password">New Password</label>
        <input type="password" name="password" required class="form-control">
    </div>

    <div class="form-group">
        <label for="new_password_confirmation">Confirm New Password</label>
        <input type="password" name="password_confirmation" required class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Update</button>

</form>

          </div>
          
          
         
        </div>

        
      </div>
    </div>
  </div>
</section>
     
  
 @endsection