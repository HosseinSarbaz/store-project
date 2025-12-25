
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پروفایل کاربری | بازاربووم</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .profile-card {
            transition: all 0.3s ease;
        }
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .avatar-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .avatar-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- هدر (همون کد قبلی) -->
    @include('Home.header')


    <!-- محتوای صفحه پروفایل -->
    <main class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-700 hover:text-blue-600">خانه</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i data-feather="chevron-left" class="w-4 h-4 text-gray-400"></i>
                        <span class="mr-2 text-blue-600 font-medium">پروفایل کاربری</span>
                    </div>
                </li>
                  <li>
                    <div class="flex items-center">
                        <i data-feather="chevron-left" class="w-4 h-4 text-gray-400"></i>
                        <span class="mr-2 text-blue-600 font-medium">ویرایش آدرس  </span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- سایدبار پروفایل -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 profile-card">
                    <!-- آواتار کاربر -->
                    <div class="text-center mb-6">
                        <div class="relative inline-block mb-4">
                            <img src="https://ui-avatars.com/api/?name=کاربر+نمونه&background=4361ee&color=fff&size=128"
                                 alt="آواتار کاربر"
                                 class="w-32 h-32 rounded-full border-4 border-white shadow-lg mx-auto">
                            <button class="avatar-upload absolute bottom-2 left-1/2 transform -translate-x-1/2 bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 transition">
                                <i data-feather="camera" class="w-4 h-4"></i>
                                <input type="file" accept="image/*" class="hidden">
                            </button>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">{{auth()->user()->name}} </h3>
                        <p class="text-gray-600 text-sm mt-1">عضو از:   {{auth()->user()->jalali()->format(' %B  %Y ') }}</p>
                        <span class="inline-block mt-2 px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">کاربر فعال</span>
                    </div>

                    <!-- آمار سریع -->
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                            <div>
                                <p class="text-sm text-gray-600">تعداد سفارشات</p>
                                <p class="text-2xl font-bold text-blue-600">0</p>
                            </div>
                            <i data-feather="package" class="w-6 h-6 text-blue-500"></i>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-purple-50 rounded-lg">
                            <div>
                                <p class="text-sm text-gray-600">موجودی کیف پول</p>
                                <p class="text-2xl font-bold text-purple-600">0 تومان</p>
                            </div>
                            <i data-feather="credit-card" class="w-6 h-6 text-purple-500"></i>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                            <div>
                                <p class="text-sm text-gray-600">امتیاز کاربری</p>
                                <p class="text-2xl font-bold text-green-600">10</p>
                            </div>
                            <i data-feather="star" class="w-6 h-6 text-green-500"></i>
                        </div>
                    </div>

                    <!-- منوی پروفایل -->

                </div>
            </div>


            <!-- محتوای اصلی -->
            <div class="lg:col-span-3">
            <form action="{{route('Home.Profile.editAddress',$addresses->_id )}}" method="POST">
                @csrf
                @method('PUT')
                <!-- تب اطلاعات حساب (پیش‌فرض فعال) -->
                <div id="profile" class="tab-content active">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-gray-800"> ویرایش کردن آدرس</h2>

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2"> شهر </label>
                                    <input type="text" name="city" value="{{$addresses->city ?: '' }}" id="" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500 " >
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">کد پستی</label>

                                    <input type="text" name="postal_code" value="{{$addresses->postal_code ?: '' }}" id="" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500 " >

                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">آدرس </label>
                                    <input type="text" name="address" value="{{$addresses->address ?: '' }}" id="" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500 " >
                            </div>

                        </div>



                        <!-- دکمه ذخیره -->
                        <div class="mt-8 flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition flex items-center">
                                <i data-feather="save" class="w-4 h-4 ml-2"></i>
                                ذخیره تغییرات آدرس
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            {{-- ------------------------------------------------------------------------------}}



            </div>
        </div>
    </main>

    <!-- فوتر -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <p class="text-gray-400">© ۱۴۰۳ بازاربووم. تمامی حقوق محفوظ است.</p>
                <p class="text-gray-500 text-sm mt-2">صفحه پروفایل کاربری - طراحی شده برای لاراول</p>
            </div>
        </div>
    </footer>

    <!-- جاوااسکریپت -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // مقداردهی آیکون‌ها
            feather.replace();

            // مدیریت تب‌های پروفایل
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');

                    // حذف حالت فعال از همه تب‌ها
                    tabButtons.forEach(btn => {
                        btn.classList.remove('bg-blue-50', 'text-blue-600');
                        btn.classList.add('text-gray-700', 'hover:bg-gray-100');
                    });

                    // مخفی کردن همه محتواها
                    tabContents.forEach(content => {
                        content.classList.remove('active');
                    });

                    // فعال کردن تب انتخاب شده
                    this.classList.remove('text-gray-700', 'hover:bg-gray-100');
                    this.classList.add('bg-blue-50', 'text-blue-600');

                    // نمایش محتوای مربوطه
                    document.getElementById(tabId).classList.add('active');
                });
            });

            // مدیریت آپلود آواتار
            const avatarUpload = document.querySelector('.avatar-upload input[type="file"]');
            if (avatarUpload) {
                avatarUpload.addEventListener('change', function(e) {
                    if (this.files && this.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.querySelector('.avatar-upload').previousElementElement.src = e.target.result;
                        }
                        reader.readAsDataURL(this.files[0]);
                        alert('تصویر با موفقیت انتخاب شد. برای ذخیره، دکمه "ذخیره تغییرات" را بزنید.');
                    }
                });
            }

            // مدیریت منوی موبایل هدر
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    // اینجا منطق منوی موبایل هدر
                });
            }
        });
    </script>
</body>
</html>
