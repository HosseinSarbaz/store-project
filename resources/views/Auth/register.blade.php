<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token() }}" >
    <title>ثبت‌نام و ورود | پلتفرم ما</title>
    <!-- فونت فارسی Vazir -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css">
    <!-- آیکون‌های Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('AuthAssets/style.css')}}">

    <style>

    </style>
</head>
<body>
    <div class="container">
        <!-- پنل سمت چپ (تصویر و متن) -->
        <div class="side-panel">
            <div class="logo">
                <i class="fas fa-rocket"></i>
                <span> بازاربووم</span>
            </div>
            <h1>به جامعه ما بپیوندید</h1>
            <p>با عضویت در پلتفرم ما، به دنیای بی‌پایان امکانات دسترسی پیدا کنید. تجربه کاربری بی‌نظیر در انتظار شماست.</p>

            <ul class="features">
                <li><i class="fas fa-check"></i> دسترسی به تمامی امکانات پلتفرم</li>
                <li><i class="fas fa-check"></i> پشتیبانی ۲۴ ساعته در ۷ روز هفته</li>
                <li><i class="fas fa-check"></i> امنیت بالا و حریم خصوصی تضمینی</li>
                <li><i class="fas fa-check"></i> بروزرسانی‌های رایگان و دائمی</li>
            </ul>
        </div>

        <!-- پنل سمت راست (فرم‌ها) -->
        <div class="form-panel">
            <div class="form-container">
                <div class="form-header">
                    <h2>خوش آمدید</h2>
                    <p>لطفاً برای ادامه وارد حساب کاربری خود شوید یا یک حساب جدید ایجاد کنید</p>
                </div>

                <!-- دکمه‌های تغییر حالت فرم -->
                <div class="form-toggle">
                    <div class="toggle-indicator" id="toggleIndicator"></div>
                    <button class="toggle-btn toggle-active" id="loginToggle">ورود</button>
                    <button class="toggle-btn" id="registerToggle">ثبت‌نام</button>
                </div>

                <!-- فرم ورود -->
                <form class="form active" id="loginForm">
                    <div class="form-group">
                        <label class="form-label" for="loginEmail">ایمیل </label>
                        <div class="input-with-icon">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" name="email" id="loginEmail" class="form-input" placeholder="example@email.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="loginPassword">رمز عبور</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" name="password" id="loginPassword" class="form-input" placeholder="رمز عبور خود را وارد کنید" required>
                            <button type="button" class="password-toggle" data-target="loginPassword">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox" class="checkbox">
                            <span>مرا به خاطر بسپار</span>
                        </label>
                        <a href="#" class="forgot-password">رمز عبور را فراموش کرده‌اید؟</a>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-sign-in-alt"></i>
                        ورود به حساب
                    </button>

                    <div class="divider">
                        یا با استفاده از
                    </div>

                    <div class="social-login">
                        <button type="button" class="social-btn google-btn">
                            <i class="fab fa-google"></i>
                            گوگل
                        </button>
                        <button type="button" class="social-btn github-btn">
                            <i class="fab fa-github"></i>
                            گیت‌هاب
                        </button>
                    </div>

                    <div class="form-footer">
                        حساب کاربری ندارید؟
                        <a href="#" id="switchToRegister">همین حالا ثبت‌نام کنید</a>
                    </div>
                </form>

                <!-- فرم ثبت‌نام -->
                <form class="form" id="registerForm">
                    <div class="form-group">
                        <label class="form-label" for="registerName">نام کامل</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" id="registerName" name="name" class="form-input" placeholder="نام و نام خانوادگی خود را وارد کنید" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="registerEmail">ایمیل</label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" id="registerEmail" name="email" class="form-input" placeholder="example@email.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="registerUsername">نام کاربری</label>
                        <div class="input-with-icon">
                            <i class="fas fa-at input-icon"></i>
                            <input type="text" id="registerUsername" name="username" class="form-input" placeholder="نام کاربری دلخواه خود را وارد کنید" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="registerPassword">رمز عبور</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="registerPassword" name="password" class="form-input" placeholder="رمز عبور قوی انتخاب کنید" required>
                            <button type="button" class="password-toggle" data-target="registerPassword">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                        <small style="color: var(--gray-color); margin-top: 5px; display: block;">حداقل ۸ کاراکتر شامل حروف بزرگ و کوچک و اعداد</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="registerConfirmPassword">تکرار رمز عبور</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="registerConfirmPassword" name="password_confirmation" class="form-input" placeholder="رمز عبور را مجدداً وارد کنید" required>
                            <button type="button" class="password-toggle" data-target="registerConfirmPassword">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="remember-me">
                            <input type="checkbox" class="checkbox" required>
                            <span>با <a href="#" style="color: var(--primary-color);">قوانین و مقررات</a> موافقم</span>
                        </label>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-user-plus"></i>
                        ایجاد حساب کاربری
                    </button>

                    <div class="divider">
                        یا با استفاده از
                    </div>

                    <div class="social-login">
                        <button type="button" class="social-btn google-btn">
                            <i class="fab fa-google"></i>
                            گوگل
                        </button>
                        <button type="button" class="social-btn github-btn">
                            <i class="fab fa-github"></i>
                            گیت‌هاب
                        </button>
                    </div>

                    <div class="form-footer">
                        قبلاً حساب کاربری دارید؟
                        <a href="#" id="switchToLogin">وارد شوید</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    const REGISTER_URL = "{{ route('Auth.Register') }}";
    </script>

    <script>
    const LOGIN_URL = "{{ route('Auth.login') }}";
    </script>

    <script src="{{asset('AuthAssets/script.js')}}"></script>

    <script>

    </script>
</body>
</html>
