@include('layouts.master')
<div class="container">
    <div class="text-center">
        <p class="form-panel--hint mb-56 text-center">Enter the 5 digit code which sent to you
            </p>
        <form class="container-xd  foorm" novalidate action="{{route('verifyToken')}}" method="post">
            @csrf
            <div class="row c-login__row c-login__row--double-gap">
                <div class="col-12">
                    <div class="c-login__compressor">
                        <div class="c-login__input field">
                            <input inputmode="numeric" pattern="[0-9]*"
                                   class="c-ui-input__field input__code fer-u" type="text"
                                   placeholder="_ _ _ _ _" maxlength="5" name="code" required
                                   autocomplete="off">
                        </div>
                        <div class="text-center">
                            <label class="form-check-label">
                                @include('auth._errors')
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden mt-32 mt-46">
                <button type="submit" class="btn btn-sm btn-warning">بررسی</button>
            </div>
        </form>

        <div class="mt-2">
            <strong id="timerText">
                ثانیه تا ارسال مجدد کد تایید
            </strong>
            <strong id="timer">60</strong>

            <form action="{{route
                                                    ('sendOTP')}}" method="post">
                @csrf
                <button id="resend" type="submit" class="btn-link
                                                     forgot"
                        style="border: none; text-decoration: none; cursor: pointer"
                >
                    <span>ارسال مجدد کد تایید</span></button>
            </form>
        </div>


    </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>


<script>
    let counter = 60;
    $('#resend').hide();
    let interval = setInterval(function () {
        counter--;
        // Display 'counter' wherever you want to display it.
        if (counter <= 0) {
            clearInterval(interval);
            $('#resend').show();
            $('#timer').hide();
            $('#timerText').hide();
            return;
        } else {
            $('#timer').text(counter);
        }
    }, 1000);


</script>
