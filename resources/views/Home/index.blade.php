
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BazaarBoom | فروشگاه آنلاین</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    {{-- <script src="https://unpkg.com/feather-icons"></script> --}}
    <link rel="stylesheet" href="{{asset('HomeAssets/indexstyle.css')}}">
    <!-- Persian Font -->
    <script>
        window.AUTH = {
            loggedIn: {{ auth()->check() ? 'true' : 'false' }}
        };
    </script>

    @include('Home.header')

    <main class="container mx-auto px-4 py-8">
        @auth
            <h1 class="text-3xl font-bold">   @php
               echo(auth()->user()->name);
            @endphp  عزیز به بازاربووم خوش آمدید! </h1>
        @endauth

        @guest
            <h1 class="text-3xl font-bold">به بازاربووم خوش آمدید!  </h1>
        @endguest

        <!-- ... -->
    </main>     

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts.css">
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">

    <script>
        window.AUTH = {
            loggedIn: {{ auth()->check() ? 'true' : 'false' }},
            userName: "{{ auth()->check() ? auth()->user()->username : '' }}"
        };
    </script>


    <!-- Header Component -->
    <custom-header
     home-url="{{route('Home.index')}}",
     admin-url="{{route('Admin.index')}}",
     register-url="{{route('Auth.RegisterForm')}}" ,
     logout-url="{{route('Auth.logout')}}"


                                                >

    </custom-header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-6">
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl p-8 mb-8 text-white">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-6 md:mb-0">
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">به بازاربووم خوش آمدید!</h1>
                    <p class="text-lg mb-6">خرید آسان و مطمئن با بهترین قیمت‌ها در ایران</p>
                    <a href="#products" class="bg-white text-blue-600 px-6 py-2 rounded-full font-bold hover:bg-gray-100 transition">مشاهده محصولات</a>
                </div>
                <div class="md:w-1/2">
                    <img src="http://static.photos/retail/1200x630/5" alt="Hero Image" class="rounded-lg shadow-xl">
                </div>
            </div>
        </section>

        <!-- Categories -->

        <section class="mb-12">
            <h2 class="text-2xl font-bold mb-6 border-b pb-2">دسته‌بندی‌ها</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach ($category as $cat)
                <a href="{{route('Home.showCategory',['categoryslug' => $cat->categoryslug ])}}" class="category-card bg-white rounded-lg shadow p-4 text-center hover:shadow-md transition">
                    <i data-feather="{{$cat->icon }}" class="w-8 h-8 mx-auto text-{{$cat->icon_color}}-500 mb-2"></i>
                    <span class="font-medium"> {{$cat->name }} </span>
                </a>
                @endforeach
                {{-- <a href="#" class="category-card bg-white rounded-lg shadow p-4 text-center hover:shadow-md transition">
                    <i data-feather="tv" class="w-8 h-8 mx-auto text-purple-500 mb-2"></i>
                    <span class="font-medium"> کالای دیجیتال </span>
                </a>
                <a href="#" class="category-card bg-white rounded-lg shadow p-4 text-center hover:shadow-md transition">
                    <i data-feather="monitor" class="w-8 h-8 mx-auto text-green-500 mb-2"></i>
                    <span class="font-medium">لپ‌تاپ و کامپیوتر</span>
                </a>
                <a href="#" class="category-card bg-white rounded-lg shadow p-4 text-center hover:shadow-md transition">
                    <i data-feather="home" class="w-8 h-8 mx-auto text-yellow-500 mb-2"></i>
                    <span class="font-medium"> لوازم خانگی برقی </span>
                </a>
                <a href="#" class="category-card bg-white rounded-lg shadow p-4 text-center hover:shadow-md transition">
                    <i data-feather="watch" class="w-8 h-8 mx-auto text-red-500 mb-2"></i>
                    <span class="font-medium"> مد و زیبایی </span>
                </a>
                <a href="#" class="category-card bg-white rounded-lg shadow p-4 text-center hover:shadow-md transition">
                    <i data-feather="tool" class="w-8 h-8 mx-auto text-indigo-500 mb-2"></i>
                    <span class="font-medium"> ابزارآلات  </span>
                </a> --}}

            </div>

        </section>


        <!-- Featured Products -->
        <section id="products" class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold border-b pb-2">جدید ترین ها</h2>
                <a href="#" class="text-blue-600 hover:text-blue-800 flex items-center">
                    مشاهده همه
                    <i data-feather="chevron-left" class="mr-1"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Product 1 -->

                @foreach ($products as $product)
                <a href={{route('Home.showProduct',['productslug' => $product->productslug ])}}>
                <div class="product-card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="relative">

                        @php
                            $firstImage = null;
                            if(is_array($product->images) && count($product->images) > 0 )
                            {
                                $firstImage = is_array($product->images[0])
                                ? $product->images[0][0]
                                : $product->images[0];
                            }
                        @endphp

                        <img src="{{asset('storage/products/'. $firstImage ?? "noimage.png" )}}" alt="Product" class="w-full h-48 object-contain bg-gray-100">
                        <div class="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded">30%</div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2"> {{ Str::limit($product->name, 65, '...')  }} </h3>
                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <span class="text-gray-500 line-through text-sm">{{number_format($product->price)}} تومان </span>
                                <span class="text-red-500 font-bold block">{{number_format($product->price)}} تومان </span>
                            </div>
                            <span class="text-yellow-400 flex">
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <span class="text-gray-700 mr-1">4.5</span>
                            </span>
                        </div>
                        <button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition flex justify-center items-center">
                            <i data-feather="shopping-cart" class="w-4 h-4 ml-1"></i>
                            افزودن به سبد خرید
                        </button>

                    </div>
                </div>
                </a>
                @endforeach
                 <!-- Product 2 -->
                {{--<div class="product-card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="relative">
                        <img src="http://static.photos/technology/640x360/2" alt="Product" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">هدفون بیسیم سامسونگ مدل Galaxy Buds 2</h3>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-800 font-bold">3,450,000 تومان</span>
                            <span class="text-yellow-400 flex">
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <span class="text-gray-700 mr-1">4.2</span>
                            </span>
                        </div>
                        <button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition flex justify-center items-center">
                            <i data-feather="shopping-cart" class="w-4 h-4 ml-1"></i>
                            افزودن به سبد خرید
                        </button>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="relative">
                        <img src="http://static.photos/technology/640x360/3" alt="Product" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-blue-500 text-white text-xs px-2 py-1 rounded">جدید</div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">تلویزیون ال جی مدل 55NANO75 55 اینچ</h3>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-800 font-bold">32,900,000 تومان</span>
                            <span class="text-yellow-400 flex">
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <span class="text-gray-700 mr-1">4.7</span>
                            </span>
                        </div>
                        <button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition flex justify-center items-center">
                            <i data-feather="shopping-cart" class="w-4 h-4 ml-1"></i>
                            افزودن به سبد خرید
                        </button>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="product-card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="relative">
                        <img src="http://static.photos/technology/640x360/4" alt="Product" class="w-full h-48 object-cover">
                        <div class="absolute top-2 left-2 bg-green-500 text-white text-xs px-2 py-1 rounded">ارسال رایگان</div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">ماشین لباسشویی ال جی مدل F4J9JSP2T ظرفیت 9 کیلوگرم</h3>
                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <span class="text-gray-500 line-through text-sm">28,500,000 تومان</span>
                                <span class="text-red-500 font-bold block">26,900,000 تومان</span>
                            </div>
                            <span class="text-yellow-400 flex">
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <span class="text-gray-700 mr-1">4.8</span>
                            </span>
                        </div>
                        <button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition flex justify-center items-center">
                            <i data-feather="shopping-cart" class="w-4 h-4 ml-1"></i>
                            افزودن به سبد خرید
                        </button>
                    </div>
                </div> --}}
            </div>

        </section>

        <!-- Special Offers -->
        <section class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold border-b pb-2">پیشنهادهای ویژه</h2>
                <a href="#" class="text-blue-600 hover:text-blue-800 flex items-center">
                    مشاهده همه
                    <i data-feather="chevron-left" class="mr-1"></i>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gradient-to-r from-orange-400 to-pink-500 rounded-xl p-6 text-white flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 mb-4 md:mb-0">
                        <h3 class="text-xl font-bold mb-2">تخفیف ویژه آخر فصل</h3>
                        <p class="mb-4">تا 50% تخفیف برای محصولات منتخب</p>
                        <a href="#" class="bg-white text-orange-500 px-4 py-2 rounded-full font-bold hover:bg-gray-100 transition inline-block">همین حالا ببینید</a>
                    </div>
                    <div class="md:w-1/2">
                        <img src="http://static.photos/sale/640x360/1" alt="Special Offer" class="rounded-lg">
                    </div>
                </div>
                <div class="bg-gradient-to-r from-green-400 to-blue-500 rounded-xl p-6 text-white flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 mb-4 md:mb-0">
                        <h3 class="text-xl font-bold mb-2">فروش ویژه ساعت‌های هوشمند</h3>
                        <p class="mb-4">شروع قیمت از 2,500,000 تومان</p>
                        <a href="#" class="bg-white text-green-600 px-4 py-2 rounded-full font-bold hover:bg-gray-100 transition inline-block">خرید کنید</a>
                    </div>
                    <div class="md:w-1/2">
                        <img src="http://static.photos/sale/640x360/2" alt="Special Offer" class="rounded-lg">
                    </div>
                </div>
            </div>
        </section>

        <!-- Brands -->
        <section class="mb-12">
            <h2 class="text-2xl font-bold mb-6 border-b pb-2">برندهای برتر</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <div class="bg-white p-4 rounded-lg shadow flex justify-center items-center h-24">
                    <img src="https://logo.clearbit.com/samsung.com" alt="Samsung" class="h-12 object-contain">
                </div>
                <div class="bg-white p-4 rounded-lg shadow flex justify-center items-center h-24">
                    <img src="https://logo.clearbit.com/apple.com" alt="Apple" class="h-12 object-contain">
                </div>
                <div class="bg-white p-4 rounded-lg shadow flex justify-center items-center h-24">
                    <img src="https://logo.clearbit.com/xiaomi.com" alt="Xiaomi" class="h-12 object-contain">
                </div>
                <div class="bg-white p-4 rounded-lg shadow flex justify-center items-center h-24">
                    <img src="https://logo.clearbit.com/lg.com" alt="LG" class="h-12 object-contain">
                </div>
                <div class="bg-white p-4 rounded-lg shadow flex justify-center items-center h-24">
                    <img src="https://logo.clearbit.com/sony.com" alt="Sony" class="h-12 object-contain">
                </div>
                <div class="bg-white p-4 rounded-lg shadow flex justify-center items-center h-24">
                    <img src="https://logo.clearbit.com/huawei.com" alt="Huawei" class="h-12 object-contain">
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Component -->
    <custom-footer></custom-footer>

    <!-- Components -->
    <script src="{{asset('HomeAssets/components/footer.js')}}"></script>
    <script src="{{asset('HomeAssets/indexscript.js')}}"></script>
    <script>feather.replace();</script>
{{-- <script src="https://huggingface.co/deepsite/deepsite-badge.js"></script> --}}

<script src="https://unpkg.com/feather-icons"></script>

</body>
</html>
