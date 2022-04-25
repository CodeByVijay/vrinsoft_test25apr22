@extends('layouts.app')
@section('title','Admin Sign In')
@section('containt')
<!-- Sing in  Form -->
<section class="sign-in">
    <div class="container">
        <div class="signin-content">

            <div class="signin-image">
                <figure><img src="{{asset('images/signin-image.jpg')}}" alt="sing up image"></figure>
                <!-- <a href="{{url('/')}}" class="signup-image-link">Create an account</a> -->
            </div>

            <div class="signin-form">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                @elseif(Session::has('failed'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('failed')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                </div>
                @endif



                <h2 class="form-title">Admin Sign In</h2>
                <form method="POST" class="register-form" action="{{route('admin.login')}}" id="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-email material-icons-name"></i></label>
                        <input type="email" name="email" id="email" placeholder="Username" required />
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Password" required />
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection