@include('layouts.master')

<div class="container">
    <div class="text-center col-6 offset-3">
        <form action="{{route('password-reset')}}" class="container-xd  foorm" novalidate
              method="post"
        >
            @csrf
            <div class="row c-login__row c-login__row--double-gap">
                <div class="col-12">
                    <div class="c-login__compressor">
                        <label class="c-login__input-label text-right w-100 " for="username">کد
                            بازیابی</label>
                        <div class="c-login__input field">
                            <i class="fas fa-user"></i>
                            <input type="text" inputmode="numeric" pattern="[0-9]*"
                                   class="form-control c-login__input-field" id="username"
                                   name="mobile"
                                   placeholder="موبایل" required>
                        </div>
                        <label class="c-login__input-label text-right mt-2 w-100" for="username">رمز
                            عبور</label>
                        <div class="c-login__input field">
                            <i class="fas fa-lock"></i>
                            <input type="password" class="form-control c-login__input-field"
                                   id="password" name="password" placeholder="رمز عبور" required>
                        </div>
                        <label class="c-login__input-label text-right mt-2 w-100" for="c_password">تکرار
                            رمز عبور</label>
                        <div class="c-login__input field">
                            <i class="fas fa-lock"></i>
                            <input type="password" class="form-control c-login__input-field"
                                   id="c_password" name="c_password" placeholder="رمز عبور" required>
                        </div>
                        <div class="col-12 p-0 jkl text-right mb-4 mt-3">
                            <label class="form-check-label">
                                <div class="mt-2">
                                    <a href="" class="btn-link forgot">
                                        <span>درخواست کد بازیابی</span></a>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden mt-32 mt-46">
                <button type="submit" class="btn btn-sm btn-warning">ثبت</button>
            </div>
        </form>
    </div>
</div>
