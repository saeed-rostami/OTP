@include('layouts.master')

<div class="container">
    <div class="text-center col-6 offset-3">
        <form action="{{route('retrieve-password')}}"
              method="post"
              class="container-xd needs-validation foorm" novalidate>
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

            {{--  VALIDATION ERROR--}}
            @include('auth._errors')

            <div class="overflow-hidden mt-32 mt-46">
                <button type="submit" class="btn btn-sm btn-warning mt-3">ارسال کد</button>
            </div>
        </form>
    </div>
</div>
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
