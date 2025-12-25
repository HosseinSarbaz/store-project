
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
    {{-- <header class="bg-white shadow-md sticky top-0 z-50" id="main-header">
        <div class="container mx-auto px-4">
            <!-- Top Bar -->
            <div class="flex justify-between items-center py-4">
                <a href="/" class="text-2xl font-bold text-blue-600">
                    <span class="text-purple-600">بازار</span>بووم
                </a>

                <!-- Search -->
                <div class="hidden md:flex relative w-1/3">
                    <input type="text" placeholder="جستجو در بین هزاران محصول..."
                           class="search-input w-full bg-gray-100 rounded-r-full pr-4 pl-10 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <button class="absolute left-0 top-0 bg-blue-500 text-white p-2 rounded-l-full h-full hover:bg-blue-600 transition">
                        <i data-feather="search" class="w-4 h-4"></i>
                    </button>
                </div>

                <!-- Actions -->
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="#" class="text-gray-700 hover:text-blue-500 transition relative">
                        <i data-feather="heart" class="w-5 h-5"></i>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-blue-500 transition relative">
                        <i data-feather="shopping-cart" class="w-5 h-5"></i>
                        <span class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
                    </a>

                    <!-- دکمه پروفایل کاربر -->
                    <a href="/profile" class="text-gray-700 hover:text-blue-500 transition relative">
                        <i data-feather="user" class="w-5 h-5"></i>
                    </a>

                    <!-- دکمه منوی موبایل -->
                    <button class="md:hidden text-gray-700 hover:text-blue-500 transition" id="mobile-menu-button">
                        <i data-feather="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex justify-between items-center py-2 border-t border-gray-100">
                <div class="flex space-x-6 space-x-reverse">
                    <a href="/" class="text-gray-700 hover:text-blue-500 transition font-medium">خانه</a>
                    <a href="/admin" class="text-gray-700 hover:text-blue-500 transition font-medium">مدیریت</a>
                    <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">دسته‌بندی‌ها</a>
                    <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">وبلاگ</a>
                    <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">تماس با ما</a>
                </div>
                <div>
                    @auth
                        <div class="flex items-center space-x-3 space-x-reverse">
                            <span class="text-gray-600">سلام، {{ Auth::user()->name }}</span>
                            <form method="POST" action="#" class="inline">
                                @csrf
                                <button type="submit" class="text-gray-700 hover:text-blue-500 transition font-medium">
                                    خروج
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">
                            ورود | ثبت‌نام
                        </a>
                    @endauth
                </div>
            </nav>
        </div>
    </header> --}}

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
                    <div class="border-t border-gray-200 pt-4">
                        <nav class="space-y-2">
                            <button data-tab="profile" class="tab-btn flex items-center w-full p-3 text-right rounded-lg hover:bg-blue-50 text-blue-600 bg-blue-50">
                                <i data-feather="user" class="w-5 h-5 ml-2"></i>
                                اطلاعات حساب
                            </button>
                            <button data-tab="orders" class="tab-btn flex items-center w-full p-3 text-right rounded-lg hover:bg-gray-100 text-gray-700">
                                <i data-feather="shopping-bag" class="w-5 h-5 ml-2"></i>
                                سفارشات من
                            </button>
                            <button data-tab="addresses" class="tab-btn flex items-center w-full p-3 text-right rounded-lg hover:bg-gray-100 text-gray-700">
                                <i data-feather="map-pin" class="w-5 h-5 ml-2"></i>
                                آدرس‌ها
                            </button>
                            <button data-tab="wishlist" class="tab-btn flex items-center w-full p-3 text-right rounded-lg hover:bg-gray-100 text-gray-700">
                                <i data-feather="heart" class="w-5 h-5 ml-2"></i>
                                علاقه‌مندی‌ها
                                <span class="mr-auto bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">۵</span>
                            </button>
                            <button data-tab="security" class="tab-btn flex items-center w-full p-3 text-right rounded-lg hover:bg-gray-100 text-gray-700">
                                <i data-feather="lock" class="w-5 h-5 ml-2"></i>
                                امنیت و رمز عبور
                            </button>
                            <button data-tab="notifications" class="tab-btn flex items-center w-full p-3 text-right rounded-lg hover:bg-gray-100 text-gray-700">
                                <i data-feather="bell" class="w-5 h-5 ml-2"></i>
                                تنظیمات اطلاع‌رسانی
                            </button>
                        </nav>
                    </div>
                </div>
            </div>


            <!-- محتوای اصلی -->
            <div class="lg:col-span-3">
            <form action="{{route('Home.Profile.Update')}}" method="POST">
                @csrf
                @method('PUT')
                <!-- تب اطلاعات حساب (پیش‌فرض فعال) -->
                <div id="profile" class="tab-content active">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-gray-800">اطلاعات حساب کاربری</h2>
                            <button class="text-blue-600 hover:text-blue-800 flex items-center">
                                <i data-feather="edit-2" class="w-4 h-4 ml-1"></i>
                                ویرایش اطلاعات
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">نام کامل</label>
                                    <input type="text" name="name" value="{{auth()->user()->name }}" id="" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500 " >
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">ایمیل</label>

                                    <input type="text" name="email" value="{{auth()->user()->email }}" id="" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500 " >
                                    <span class="text-xs text-green-600 mt-1 block">✓ تأیید شده</span>

                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">شماره موبایل</label>
                                    <input type="text" name="phone" value="{{auth()->user()->phone ?: '' }}" id="" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500 " >
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">تاریخ عضویت</label>
                                <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                                    <p class="text-gray-800">{{ auth()->user()->jalali()->format('Y/m/d') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- اطلاعات اضافی -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">اطلاعات تکمیلی</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">جنسیت</label>
                                    <div class="flex space-x-4 space-x-reverse">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="gender" value="male"
                                                {{ auth()->user()->gender == 'male' ? 'checked' : '' }}>
                                            <span class="mr-2">آقا</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="gender" value="female"
                                                {{ auth()->user()->gender == 'female' ? 'checked' : '' }}>
                                            <span class="mr-2">خانم</span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">تاریخ تولد</label>
                                    <input type="text" name="birth_day" class="w-full bg-gray-50 p-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-300"
                                           value="{{auth()->user()->birth_day ?: '' }}">
                                </div>
                            </div>
                        </div>

                        <!-- دکمه ذخیره -->
                        <div class="mt-8 flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition flex items-center">
                                <i data-feather="save" class="w-4 h-4 ml-2"></i>
                                ذخیره تغییرات
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            {{-- ------------------------------------------------------------------------------}}
                <!-- تب سفارشات -->
                <div id="orders" class="tab-content">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">سفارشات من</h2>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="py-3 px-4 text-right">شماره سفارش</th>
                                        <th class="py-3 px-4 text-right">تاریخ</th>
                                        <th class="py-3 px-4 text-right">مبلغ</th>
                                        <th class="py-3 px-4 text-right">وضعیت</th>
                                        <th class="py-3 px-4 text-right">عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- سفارش ۱ -->
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4">#ORD-2024-001</td>
                                        <td class="py-4 px-4">۱۴۰۲/۱۱/۱۵</td>
                                        <td class="py-4 px-4">۲,۴۵۰,۰۰۰ تومان</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">تکمیل شده</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">مشاهده جزئیات</a>
                                        </td>
                                    </tr>
                                    <!-- سفارش ۲ -->
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-4 px-4">#ORD-2024-002</td>
                                        <td class="py-4 px-4">۱۴۰۲/۱۱/۲۰</td>
                                        <td class="py-4 px-4">۱,۸۰۰,۰۰۰ تومان</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">در حال پردازش</span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">پیگیری سفارش</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- تب آدرس‌ها -->
                <div id="addresses" class="tab-content">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-gray-800">آدرس‌های من</h2>
                            <form action="{{route('Home.Profile.addAddressForm') }}" method="GET" >
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center">
                                <i data-feather="plus" class="w-4 h-4 ml-1"></i>
                                افزودن آدرس جدید
                            </button>
                            </form>
                        </div>
                        @if ( $addresses->count() === 0 )

                        <p class="text-gray-500 text-center">
                            هیچ آدرسی ثبت نکرده اید
                        </p>

                        @else

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- آدرس ۱ -->
                            @foreach ($addresses as $address )
                                <div class="border border-gray-200 rounded-lg p-5 hover:border-blue-300 transition">
                                    <div class="flex justify-between items-start mb-3">
                                        <h3 class="font-bold text-gray-800">{{$address->city }} </h3>
                                        <div class="flex space-x-2 space-x-reverse">
                                            <form action="{{route('Home.Profile.editAddressForm')}}" method="get">
                                                <button class="text-blue-600 hover:text-blue-800">
                                                    <i data-feather="edit-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>

                                            <form action="{{route('Home.Profile.deleteAddress',$address->_id )}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:text-red-800">
                                                    <i data-feather="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 mb-2">{{$address->address }}</p>
                                    <p class="text-gray-600">کد پستی: {{$address->postal_code }}</p>
                                    <div class="mt-3">
                                        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">آدرس پیش‌فرض</span>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        @endif
                    </div>
                </div>
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
