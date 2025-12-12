<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دیجی‌بازار | نمایش محصولات</title>
    <link rel="icon" type="image/x-icon" href="/static/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/font.css" rel="stylesheet" type="text/css" />
</head>
<body class="font-vazir bg-gray-50">
    <custom-sidebar></custom-sidebar>
    <custom-navbar></custom-navbar>
<main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Product Gallery -->

            <div class="lg:w-1/2">

                <div class="bg-white rounded-xl shadow-md overflow-hidden">


                     @php
                        $firstImage = null;
                        if(is_array($product->images) && count($product->images) >0 )
                        {
                            $firstImage = is_array($product->images[0])
                            ? $product->images[0][0] // اگر خودش آرایه بود
                            : $product->images[0];
                        }

                    @endphp

                    <div class="h-96 bg-gray-100 flex items-center justify-center">
                        <img id="mainImage" src="{{asset('storage/products/' . $firstImage ?? "NoImage.png" )}}" alt="محصول" class="h-full object-contain">
                    </div>
                    <div class="p-4 flex gap-2 overflow-x-auto">
                        @foreach ( $product->images as $img )
                        <img src="{{asset('storage/products/' .$img )}}" alt="تصویر کوچک 1" class="w-20 h-20 object-cover rounded-md cursor-pointer border-2 border-transparent hover:border-blue-500" onclick="changeMainImage(this)">
                        @endforeach
                    </div>
                </div>

            </div>


            <!-- Product Info -->
            <div class="lg:w-1/2">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">{{$product->name}} </h1>
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <i data-feather="star" class="w-5 h-5 fill-current"></i>
                            <i data-feather="star" class="w-5 h-5 fill-current"></i>
                            <i data-feather="star" class="w-5 h-5 fill-current"></i>
                            <i data-feather="star" class="w-5 h-5 fill-current"></i>
                            <i data-feather="star" class="w-5 h-5"></i>
                        </div>
                        <span class="text-gray-500 mr-2">(42 نظر)</span>
                    </div>

                    <div class="mb-6">
                        <span class="text-3xl font-bold text-gray-900">{{ number_format($product->price) }}تومان </span>
                        <span class="text-lg text-gray-500 line-through mr-2">14,990,000 تومان</span>
                        <span class="bg-red-100 text-red-800 text-sm font-medium px-2.5 py-0.5 rounded">13% تخفیف</span>
                    </div>

                    @if (!empty($product->colors) && is_array($product->colors))
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">رنگ‌بندی</h3>
                        @php
                            if($product->colors)
                            $colors = $product->colors ?? [];
                        @endphp
                        <div class="flex gap-3">
                        @foreach ( $colors as $color )
                            <button class="w-10 h-10 rounded-full border cursor-pointer color-option"
                             style="background-color: {{$color}}"
                             data-color="{{$color}}">

                            </button>
                        @endforeach

                        </div>
                    </div>
                    @endif

                    {{-- <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">حافظه داخلی</h3>
                        <div class="flex gap-3">
                            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-blue-50 hover:border-blue-500 focus:bg-blue-50 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">128GB</button>
                            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-blue-50 hover:border-blue-500 focus:bg-blue-50 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">256GB</button>
                        </div>
                    </div> --}}

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">موجودی</h3>
                        <div class="flex items-center text-green-600">
                            <i data-feather="check-circle" class="w-5 h-5 mr-1"></i>
                            <span>موجود در انبار  {{$product->inventory}} عدد</span>
                        </div>
                    </div>

                    <div class="flex gap-3 mb-6">
                        <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                            <button class="px-3 py-2 bg-gray-100 hover:bg-gray-200" onclick="decreaseQuantity()">
                                <i data-feather="minus" class="w-4 h-4"></i>
                            </button>
                            <input type="number" id="quantity" value="1" min="1" class="w-12 text-center border-x border-gray-300 py-2">
                            <button class="px-3 py-2 bg-gray-100 hover:bg-gray-200" onclick="increaseQuantity()">
                                <i data-feather="plus" class="w-4 h-4"></i>
                            </button>
                        </div>
                        <div>

                        </div>

                    </div>

                    <form action="{{route('cart.add')}}" method="POST">
                            @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}" >
                        <input type="hidden" name="color" id="selectedColor">
                        <button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition flex justify-center items-center">
                            <i data-feather="shopping-cart" class="w-4 h-4 ml-1"></i>
                            افزودن به سبد خرید
                        </button>
                    </form>

                    <div class="border-t border-gray-200 pt-4">
                        <h3 class="text-lg font-semibold mb-2">ارسال رایگان</h3>
                        <p class="text-gray-600">ارسال رایگان برای خریدهای بالای 500 هزار تومان</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details -->

        <div class="mt-8 bg-white rounded-xl shadow-md p-6">
            <h2 class="text-xl font-bold mb-4">مشخصات محصول</h2>
            @if (!empty($product->attribiutes) && is_array($product->attribiutes))
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                @foreach ($product->attribiutes as $name => $value )
                <div class="flex border-b border-gray-100 py-3">
                    <span class="text-gray-500 w-1/2">{{$name}}</span>
                    <span class="text-gray-800 font-medium w-1/2">{{$value}} </span>

                </div>
                @endforeach

                {{-- <div class="flex border-b border-gray-100 py-3">
                    <span class="text-gray-500 w-1/2">مدل</span>
                    <span class="text-gray-800 font-medium w-1/2">Redmi Note 11 Pro</span>
                </div>
                <div class="flex border-b border-gray-100 py-3">
                    <span class="text-gray-500 w-1/2">حافظه RAM</span>
                    <span class="text-gray-800 font-medium w-1/2">8 گیگابایت</span>
                </div>
                <div class="flex border-b border-gray-100 py-3">
                    <span class="text-gray-500 w-1/2">حافظه داخلی</span>
                    <span class="text-gray-800 font-medium w-1/2">128 گیگابایت</span>
                </div>
                <div class="flex border-b border-gray-100 py-3">
                    <span class="text-gray-500 w-1/2">پردازنده</span>
                    <span class="text-gray-800 font-medium w-1/2">MediaTek Helio G96</span>
                </div>
                <div class="flex border-b border-gray-100 py-3">
                    <span class="text-gray-500 w-1/2">اندازه صفحه نمایش</span>
                    <span class="text-gray-800 font-medium w-1/2">6.67 اینچ</span>
                </div>
                <div class="flex border-b border-gray-100 py-3">
                    <span class="text-gray-500 w-1/2">رزولوشن دوربین اصلی</span>
                    <span class="text-gray-800 font-medium w-1/2">108 مگاپیکسل</span>
                </div>
                <div class="flex border-b border-gray-100 py-3">
                    <span class="text-gray-500 w-1/2">باتری</span>
                    <span class="text-gray-800 font-medium w-1/2">5000 میلی‌آمپر</span>
                </div> --}}
            </div>
            @endif
        </div>
        <!-- Product Description -->
        <div class="mt-8 bg-white rounded-xl shadow-md p-6">
            <h2 class="text-xl font-bold mb-4">توضیحات محصول</h2>
            <div class="prose max-w-none text-gray-700">
                <p> .{{$product->description }} </p>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="mt-8 bg-white rounded-xl shadow-md p-6">
            <h2 class="text-xl font-bold mb-6">نظرات کاربران</h2>

            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold">نظر خود را ثبت کنید</h3>
                    <div class="flex text-yellow-400">
                        <i data-feather="star" class="w-5 h-5 cursor-pointer hover:fill-current" onclick="rate(1)"></i>
                        <i data-feather="star" class="w-5 h-5 cursor-pointer hover:fill-current" onclick="rate(2)"></i>
                        <i data-feather="star" class="w-5 h-5 cursor-pointer hover:fill-current" onclick="rate(3)"></i>
                        <i data-feather="star" class="w-5 h-5 cursor-pointer hover:fill-current" onclick="rate(4)"></i>
                        <i data-feather="star" class="w-5 h-5 cursor-pointer hover:fill-current" onclick="rate(5)"></i>
                    </div>
                </div>
                <textarea class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="نظر خود را بنویسید..."></textarea>
                <button class="mt-3 bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-lg">ثبت نظر</button>
            </div>

            <div class="space-y-6">
                <!-- Review 1 -->
                <div class="border-b border-gray-200 pb-6">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold">ع</div>
                            <div class="mr-3">
                                <h4 class="font-medium">علی محمدی</h4>
                                <div class="flex text-yellow-400 text-sm">
                                    <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4"></i>
                                </div>
                            </div>
                        </div>
                        <span class="text-gray-500 text-sm">2 روز پیش</span>
                    </div>
                    <p class="text-gray-700">بسیار عالی و با کیفیت. باتری فوق‌العاده‌ای داره و دوربینش واقعا حرفه‌ایه.</p>
                </div>

                <!-- Review 2 -->
                <div class="border-b border-gray-200 pb-6">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold">م</div>
                            <div class="mr-3">
                                <h4 class="font-medium">مریم احمدی</h4>
                                <div class="flex text-yellow-400 text-sm">
                                    <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                    <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                </div>
                            </div>
                        </div>
                        <span class="text-gray-500 text-sm">1 هفته پیش</span>
                    </div>
                    <p class="text-gray-700">بهترین گوشی در این رنج قیمت. صفحه نمایشش واقعا عالیه و سرعت پردازش فوق‌العاده‌ای داره.</p>
                </div>
            </div>
        </div>
</body>


<script>
    document.querySelectorAll(".color-option").forEach(btn => {
        btn.addEventListener("click", function () {
            let color = this.getAttribute("data-color");
            document.getElementById("selectedColor").value = color;

            // highlight selected color
            document.querySelectorAll(".color-option").forEach(x => x.classList.remove("ring-2", "ring-blue-500"));
            this.classList.add("ring-2", "ring-blue-500");
        });
    });
</script>







</html>
