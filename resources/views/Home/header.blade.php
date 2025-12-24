<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت بازاربووم</title>
    <!-- لینک به Tailwind CSS از CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <!-- لینک برای آیکون‌های Feather -->
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .mobile-menu {
            transition: all 0.3s ease;
        }
        .search-input {
            transition: all 0.3s ease;
        }
        .search-input:focus {
            width: 250px;
        }
        @media (max-width: 768px) {
            .search-input {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- این تکه کد، هدر اصلی شماست -->
    <header class="bg-white shadow-md sticky top-0 z-50" id="main-header">
        <div class="container mx-auto px-4">
            <!-- Top Bar -->
            <div class="flex justify-between items-center py-4">
                <a href="/" class="text-2xl font-bold text-blue-600">
                    <span class="text-purple-600">بازار</span>بووم
                </a>

                <!-- Search (در دسکتاپ نمایش داده می‌شود) -->
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

                    <a href="{{route('Home.Profile')}}" class="text-gray-700 hover:text-blue-500 transition relative">
                        <i data-feather="user" class="w-5 h-5"></i>
                        {{-- <span class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center"></span> --}}
                    </a>

                    <!-- دکمه منوی موبایل -->
                    <button class="md:hidden text-gray-700 hover:text-blue-500 transition" id="mobile-menu-button">
                        <i data-feather="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile search (فقط در موبایل نمایش داده می‌شود) -->
            <div class="md:hidden mb-4">
                <div class="relative">
                    <input type="text" placeholder="جستجو..."
                           class="search-input w-full bg-gray-100 rounded-full pr-4 pl-10 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <button class="absolute left-0 top-0 text-gray-500 p-2 h-full">
                        <i data-feather="search" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>

            <!-- Navigation (منوی اصلی) -->
            <nav class="hidden md:flex justify-between items-center py-2 border-t border-gray-100">
                <div class="flex space-x-6 space-x-reverse">
                    <!-- آدرس این لینک‌ها را می‌توانی از طریق لاراول تنظیم کنی -->
                    <a href="{{route('Home.index')}}" class="text-gray-700 hover:text-blue-500 transition font-medium">خانه</a>
                    @if (auth()->check() && auth()->user()->role !== 'user' )
                        <a href="{{route('Admin.index')}}"
                        class="text-gray-700 hover:text-blue-500 transition font-medium">مدیریت</a>
                    @endif
                    <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">دسته‌بندی‌ها</a>
                    <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">وبلاگ</a>
                    <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">تماس با ما</a>
                </div>
                <div>
                    <!-- این لینک وضعیت لاگین کاربر رو نشون می‌ده -->
                    @guest
                        <a  href="{{route('Auth.RegisterForm')}}"
                            class="text-gray-700 hover:text-blue-500 transition font-medium">
                            ورود | ثبت‌نام
                        </a>
                    @endguest

                    @auth
                        <form action="{{route('Auth.logout')}}" method="post">
                            @csrf
                            <button type="submit"
                                class="text-red-600 hover:text-red-800 transition font-medium">
                                خروج
                            </button>
                        </form>
                    @endauth

                </div>
            </nav>
        </div>

        <!-- Mobile Menu (منوی موبایل که در ابتدا مخفی است) -->
        <div class="mobile-menu hidden md:hidden bg-white border-t border-gray-200 py-4 px-4" id="mobile-menu">
            <div class="flex flex-col space-y-4">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-500 transition font-medium">خانه</a>
                <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">فروش ویژه</a>
                <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">دسته‌بندی‌ها</a>
                <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">وبلاگ</a>
                <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">تماس با ما</a>
                <div class="pt-2 border-t border-gray-200">
                    <a href="#" class="text-blue-500 hover:text-blue-700 transition font-medium inline-flex items-center">
                        <i data-feather="headphones" class="w-4 h-4 ml-1"></i>
                        پشتیبانی 24 ساعته
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- محتوای اصلی صفحه شما اینجا قرار می‌گیرد -->
    {{-- <main class="container mx-auto px-4 py-8">
        @auth
            <h1 class="text-3xl font-bold">   @php
               echo(auth()->user()->name);
            @endphp  عزیز به بازاربووم خوش آمدید! </h1>
        @endauth

        @guest
            <h1 class="text-3xl font-bold">به بازاربووم خوش آمدید!  </h1>
        @endguest

        <!-- ... -->
    </main> --}}

    <script>
        // این تکه کد باید بعد از لود شدن المان‌های HTML اجرا شود
        // document.addEventListener('DOMContentLoaded', function() {
        //     // مقداردهی اولیه آیکون‌های Feather
        //     feather.replace();

        //     // ===== مدیریت وضعیت کاربر (Auth Logic) =====
        //     // این بخش را می‌توانی با منطق لاراولت جایگزین کنی
        //     const authButton = document.getElementById('auth-button');
        //     const isLoggedIn = false; // این مقدار را از سشن لاراول بگیر

        //     if (isLoggedIn) {
        //         authButton.textContent = "خروج";
        //         authButton.href = "{{ url('/logout') }}"; // آدرس خروج در لاراول
        //     } else {
        //         authButton.textContent = "ورود | ثبت‌نام";
        //         authButton.href = "{{ url('/register') }}"; // آدرس ثبت‌نام در لاراول
        //     }
            // ===== پایان منطق کاربر =====

            // ===== مدیریت منوی موبایل =====
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', function() {
                // نمایش یا مخفی کردن منو
                mobileMenu.classList.toggle('hidden');

                // تغییر آیکون دکمه
                const icon = mobileMenuButton.querySelector('i');
                if (mobileMenu.classList.contains('hidden')) {
                    feather.replace(icon.setAttribute('data-feather', 'menu'));
                } else {
                    feather.replace(icon.setAttribute('data-feather', 'x'));
                }
                feather.replace(); // آپدیت آیکون‌ها پس از تغییر
            });
        // });
    </script>
</body>
</html>
