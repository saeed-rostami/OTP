@include('layouts.master')

<!--======= log_in_page =======-->
<div id="log-in" class="site-form log-in-form">

    <div id="log-in-head">
        <h1>Sing Up</h1>
        <div id="logo"><a href="01-home.html"><img src="img/logo.png" alt=""></a></div>
    </div>

    <div class="form-output">
        <form action="{{route('register-recaptcha')}}"
              class="container-xd needs-validation foorm"
              method="post"
              novalidate>
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
                <input type="text" inputmode="numeric" pattern="[0-9]*"
                       class="form-control c-login__input-field" id="password" name="password"
                       placeholder="موبایل" required>


                <div class="invalid-feedback">
                    رمز ورود الزامی است
                </div>
            </div>

            <div class="remember">
                <div class="checkbox">
                    <label>
                        <input name="terms" type="checkbox">
                        I accept the <a href="#">Terms and Conditions</a> of the website
                    </label>
                </div>
            </div>

            <!--reCAPTCHA-->
            <div class="g-recaptcha" data-type="image"
                 data-sitekey={{env('reCAPTCHA_SITE_KEY')}}></div>

            <button type="submit" class="btn btn-lg btn-primary full-width">Complete sign up !</button>

            <div class="or"></div>


            <p>you have an account? <a href="{{url('/login')}}"> Sing in !</a> </p>
        </form>
    </div>
</div>
<!--======= // log_in_page =======-->


{{--reCAPTCHA--}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<script src="{{asset('js/validation.js')}}"></script>
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
