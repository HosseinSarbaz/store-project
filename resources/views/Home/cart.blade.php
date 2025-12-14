<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سبد خرید | فروشگاه آنلاین</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{asset('HomeAssets/indexstyle.css')}}" >
    <script src="{{asset('HomeAssets/indexscript.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/fonts.css">
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <a href="#" class="text-2xl font-bold flex items-center">
                    <i data-feather="shopping-bag" class="ml-2"></i>
                    بازاربووم
                </a>
                <div class="flex items-center space-x-6 space-x-reverse">
                    <a href="{{route('Home.index')}}" class="hover:text-blue-200 transition">
                        <i data-feather="home"></i>
                    </a>
                    <a href="#" class="hover:text-blue-200 transition">
                        <i data-feather="user"></i>
                    </a>
                    <div class="relative">
                        <a href="{{route('cart.show')}}" class="hover:text-blue-200 transition">
                            <i data-feather="shopping-cart"></i>
                            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Shopping Cart -->
                <div class="md:w-2/3">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <!-- Cart Header -->
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-4">
                            <div class="flex items-center">
                                <i data-feather="shopping-cart" class="ml-2"></i>
                                <h2 class="text-xl font-bold">سبد خرید شما</h2>
                            </div>
                        </div>


                        <!-- Cart Items -->
                        <div class="divide-y divide-gray-200">

                            @if (empty($cart) || count($cart) == 0)
                                <div class="alert alert-info">
                                    سبد شما خالی از محصول میباشد
                                </div>
                            @else


                                <!-- Item 1 -->
                                @foreach ($cart['items'] as $key => $item)
                                    <div class="p-6 flex flex-col sm:flex-row gap-4">

                                        <div class="sm:w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center">
                                            <img src="{{asset('storage/products/' . $item['image'] )}}" alt="Product" class="w-full h-full object-contain">
                                        </div>

                                        <div class="flex-grow">
                                            <div class="flex justify-between">
                                                <h3 class="font-bold text-lg">{{ Str::limit($item['name'],38,'...')  }} </h3>
                                                <h3 class="font-bold text-lg">{{$key}} </h3>

                                                <form action="{{route('cart.remove')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$key}}">
                                                <button class="text-red-500 hover:text-red-700">
                                                    <i data-feather="trash-2"></i>
                                                </button>
                                                </form>
                                            </div>
                                            <p class="text-gray-500 text-sm mt-1">رنگ :  {{$item['color_name'] ?? "نامشخص"}}</p>
                                            <div class="flex items-center mt-4 justify-between">
                                                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                                    <form action="{{route('cart.update',$key )}}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="action" value="increase">
                                                    <button type="submit" class="px-3 py-1 bg-gray-100 hover:bg-gray-200 transition">+</button>
                                                    </form>

                                                    <span class="px-4">{{$item['quantity']}} </span>

                                                    <form action="{{route('cart.update',$key )}}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="action" value="decrease">
                                                    <button type="submit" class="px-3 py-1 bg-gray-100 hover:bg-gray-200 transition">-</button>
                                                    </form>
                                                </div>
                                                <div class="text-left">
                                                    <span class="text-gray-500 line-through text-sm block">{{number_format($item['price']) }} تومان </span>
                                                    <span class="text-blue-600 font-bold">{{number_format($item['price'] * $item['quantity']) }} تومان  </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @endif
                        </div>



                        <!-- Coupon -->
                        <div class="p-6 border-t border-gray-200">
                            <div class="flex flex-col sm:flex-row gap-3">
                                <input type="text" placeholder="کد تخفیف" class="flex-grow border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition flex items-center justify-center">
                                    اعمال کد تخفیف
                                    <i data-feather="tag" class="mr-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="md:w-1/3">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-8">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-4">
                            <div class="flex items-center">
                                <i data-feather="clipboard" class="ml-2"></i>
                                <h2 class="text-xl font-bold">خلاصه سفارش</h2>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex justify-between">
                                    <span>مبلغ کل کالاها (3 عدد)</span>
                                    <span>{{number_format($cart['total_price']) }} تومان </span>
                                </div>
                                <div class="flex justify-between">
                                    <span>تخفیف کالاها</span>
                                    <span class="text-green-500">0 تومان</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>هزینه ارسال</span>
                                    <span>رایگان</span>
                                </div>
                                <div class="border-t border-gray-200 pt-4 flex justify-between font-bold text-lg">
                                    <span>مبلغ قابل پرداخت</span>
                                    <span class="text-blue-600">{{number_format($cart['total_price']) }} تومان  </span>
                                </div>
                            </div>


                            <button class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg mt-6 font-bold transition flex items-center justify-center">
                                ادامه فرآیند خرید
                                <i data-feather="arrow-left" class="mr-2"></i>
                            </button>

                            <div class="mt-6 text-sm text-gray-500">
                                <p class="flex items-start">
                                    <i data-feather="lock" class="ml-2 mt-1 text-blue-500"></i>
                                    اطلاعات پرداخت شما به صورت رمزنگاری شده منتقل می‌شود و نزد ما محفوظ است.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Continue Shopping -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden mt-6">
                        <div class="p-6">
                            <a href="{{route('Home.products')}}" class="flex items-center justify-center text-blue-600 hover:text-blue-800 transition">
                                <i data-feather="arrow-right" class="ml-2"></i>
                                ادامه خرید از فروشگاه
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-lg font-bold mb-4">درباره ما</h3>
                        <p class="text-gray-300">فروشگاه آنلاین بازاربووم با بیش از 10 سال سابقه در زمینه فروش کالاهای دیجیتال و لوازم الکترونیکی فعالیت می‌کند.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">خدمات مشتریان</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-white transition">پرسش‌های متداول</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition">رویه بازگرداندن کالا</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition">شرایط ضمانت</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">تماس با ما</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center text-gray-300">
                                <i data-feather="phone" class="ml-2 w-4 h-4"></i>
                                021-12345678
                            </li>
                            <li class="flex items-center text-gray-300">
                                <i data-feather="mail" class="ml-2 w-4 h-4"></i>
                                info@bazarboom.ir
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">شبکه‌های اجتماعی</h3>
                        <div class="flex space-x-4 space-x-reverse">
                            <a href="#" class="bg-gray-700 hover:bg-gray-600 w-10 h-10 rounded-full flex items-center justify-center transition">
                                <i data-feather="instagram"></i>
                            </a>
                            <a href="#" class="bg-gray-700 hover:bg-gray-600 w-10 h-10 rounded-full flex items-center justify-center transition">
                                <i data-feather="telegram"></i>
                            </a>
                            <a href="#" class="bg-gray-700 hover:bg-gray-600 w-10 h-10 rounded-full flex items-center justify-center transition">
                                <i data-feather="twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                    <p>تمامی حقوق این وبسایت متعلق به فروشگاه آنلاین بازاربووم می‌باشد.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>feather.replace();</script>
    <script src="script.js"></script>
{{-- <script src="https://huggingface.co/deepsite/deepsite-badge.js"></script> --}}
</body>
</html>
