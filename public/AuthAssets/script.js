
        // انتخاب المنت‌های مورد نیاز
        const loginToggle = document.getElementById('loginToggle');
        const registerToggle = document.getElementById('registerToggle');
        const toggleIndicator = document.getElementById('toggleIndicator');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const switchToRegister = document.getElementById('switchToRegister');
        const switchToLogin = document.getElementById('switchToLogin');
        const passwordToggles = document.querySelectorAll('.password-toggle');




        // تابع تغییر بین فرم‌ها
        function showLoginForm() {
            loginToggle.classList.add('toggle-active');
            registerToggle.classList.remove('toggle-active');
            toggleIndicator.style.transform = 'translateX(0)';

            loginForm.classList.add('active');
            registerForm.classList.remove('active');
        }

        function showRegisterForm() {
            registerToggle.classList.add('toggle-active');
            loginToggle.classList.remove('toggle-active');
            toggleIndicator.style.transform = 'translateX(-100%)';

            registerForm.classList.add('active');
            loginForm.classList.remove('active');
        }

        // رویدادهای کلیک برای دکمه‌های تغییر فرم
        loginToggle.addEventListener('click', showLoginForm);
        registerToggle.addEventListener('click', showRegisterForm);
        switchToRegister.addEventListener('click', function(e) {
            e.preventDefault();
            showRegisterForm();
        });
        switchToLogin.addEventListener('click', function(e) {
            e.preventDefault();
            showLoginForm();
        });

        // قابلیت نمایش/پنهان کردن رمز عبور
        passwordToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const passwordInput = document.getElementById(targetId);
                const icon = this.querySelector('i');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });

        // اعتبارسنجی فرم ثبت‌نام
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            // اعتبارسنجی اولیه JS
            if (formData.get('password') !== formData.get('password_confirmation')) {
                alert('رمز عبور و تکرار آن مطابقت ندارند!');
                return;
            }
            if (formData.get('password').length < 8) {
                alert('رمز عبور باید حداقل ۸ کاراکتر باشد!');
                return;
            }

            fetch(REGISTER_URL, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'ok') {
                    alert('ثبت‌نام موفق! لطفاً وارد شوید.');
                    showLoginForm();
                } else {
                    // خطاهای validation لاراول
                    let message = data.message || 'مشکلی پیش آمده';
                    if(data.errors) {
                        message = Object.values(data.errors).flat().join("\n");
                    }
                    alert(message);
                }
            })
            .catch(err => {
                console.error(err);
                alert('خطا در ارسال اطلاعات!');
            });
        });

        // اعتبارسنجی فرم ورود
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch(LOGIN_URL, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'ok') {
                    alert('خوش آمدید 🌹');
                    window.location.href = '/'; // یا ریدایرکت
                } else {
                    alert(data.message);
                }
            })
            .catch(err => {
                console.error(err);
                alert('خطا در ورود');
            });
        });


        // شبیه‌سازی ورود با شبکه‌های اجتماعی
        document.querySelectorAll('.social-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const platform = this.classList.contains('google-btn') ? 'گوگل' : 'گیت‌هاب';
                alert(`در حالت واقعی، شما به صفحه احراز هویت ${platform} هدایت می‌شوید.`);
            });
        });

        // مقداردهی اولیه - فرم ورود به عنوان فرم پیش‌فرض
        showLoginForm();
