@extends('layouts.app')
@section('title','Sign Up')
@section('containt')
<!-- Sign up form -->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form method="POST" class="register-form" id="register-form">
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="name" placeholder="Your Name" required/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email" required/>
                    </div>
                    <div class="form-group">
                        <label for="mobile"><i class="zmdi zmdi-phone"></i></label>
                        <input type="text" name="mobile" id="mobile" placeholder="Your Mobile" maxlength="10" required/>
                    </div>
                    <div class="form-group">
                        <label for="add1"><i class="zmdi zmdi-receipt"></i></label>
                        <input type="text" name="add1" id="add1" placeholder="Address Line 1" required/>
                    </div>
                    <div class="form-group">
                        <label for="add2"><i class="zmdi zmdi-receipt"></i></label>
                        <input type="text" name="add2" id="add2" placeholder="Address Line 2" />
                    </div>
                    <div class="form-group">
                        <label for="pincode"><i class="zmdi zmdi-receipt"></i></label>
                        <input type="text" name="pincode" id="pincode" placeholder="Pincode" maxlength="6" required/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required/>
                    </div>
                    <div class="form-group">
                        <label for="image"><i class="zmdi zmdi-account-calendar"></i></label>
                        <input type="file" name="image" id="image" required/>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{asset('images/signup-image.jpg')}}" alt="sing up image"></figure>
                <a href="{{url('login')}}" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>
@endsection