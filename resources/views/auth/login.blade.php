@include('layouts.master')


        <div id="log-in" class="site-form log-in-form">
            <div id="log-in-head">
                <h1>Log in</h1>
                <div id="logo"><a href="{{url('/')}}"><img src="img/logo.png" alt=""></a></div>
            </div>

            <div class="form-output">
                <form id="loginForm" action="{{url('/login-recaptcha')}}" method="post"  novalidate class="needs-validation foorm">
                    @csrf
                    <div class="form-group label-floating">
                        <label class="control-label">Your Mobile</label>
                        <input type="text" inputmode="numeric" pattern="[0-9]*"
                               class="form-control c-login__input-field" id="username" name="mobile"
                               placeholder="+98**********" required>

                        <div class="invalid-feedback">
                            شماره تماس الزامی است
                        </div>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Your Password</label>
                        <input type="password" class="form-control c-login__input-field"
                               id="password" name="password" placeholder="رمز عبور" required>

                        <div class="invalid-feedback">
                            رمز ورود الزامی است
                        </div>
                    </div>



                    <div class="remember">
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox">
                                Remember Me
                            </label>
                        </div>
                        <a href="{{url('/password/reset')}}" class="forgot">Forgot my Password</a>
                    </div>


                    <!--reCAPTCHA-->
                    <div class="g-recaptcha" data-type="image"
                         data-sitekey={{env('reCAPTCHA_SITE_KEY')}}></div>

                    <button type="submit" class="btn btn-lg btn-primary full-width">Login</button>

                    <div class="or"></div>

                    <a href="{{route('Login-OTP-Index')}}" class="btn btn-lg bg-info full-width btn-icon-left"><i
                            aria-hidden="true"></i>Login
                        with SMS Code</a>


                    <p>Don't you have an account? <a href="{{url('/register')}}">Register Now!</a></p>
                </form>
            </div>
        </div>

{{--reCAPTCHA--}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<script>
    {{--        for validation  --}}
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>
