 <div class="col-lg-3 col-md-4">
  <div class="mainlinkall">
    <div>
      <div class="proimageemp">
        <img src="{{ asset('assets/img/user.jpg') }}">
      </div>
      <p>{{ auth()->user()->name ?? 'User Name' }}</p>
    </div>

    <ul class="tab">
      <li><a class="tablinks {{ Request::is('my-account') ? 'active' : '' }}" href="{{ url('/my-account')}}"><i class="fa fa-cog"></i> Dashboard</a></li>
      <li><a class="tablinks {{ Request::is('course-videos') ? 'active' : '' }}" href="{{ url('course-videos') }}"><i class="fa fa-video"></i> Course Videos</a></li>
      <li><a class="tablinks {{ Request::is('change-password') ? 'active' : '' }}" href="{{ url('/change-password') }}"><i class="fa fa-key"></i> Change Password</a></li>
      <li><a class="tablinks" href="{{url('/')}}"><i class="fa fa-file"></i> Logout</a></li>
    </ul>

  </div>
</div>