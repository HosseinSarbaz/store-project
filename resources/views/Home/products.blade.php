<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigiStyle - فروشگاه اینترنتی</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <script src="{{asset('HomeAssets/components/header.js')}}"></script>

    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/font.css" rel="stylesheet" type="text/css" />
<style>
    body {
                font-family: Vazirmatn, sans-serif;
            }
            /* Custom styles for Persian e-commerce site */
    .product-card {
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .category-card:hover {
        transform: translateY(-3px);
    }

    .special-offer {
        transition: all 0.3s ease;
    }

    .special-offer:hover {
        transform: translateY(-3px);
    }

    .swiper-container {
        padding: 20px 0;
        overflow: hidden;
    }

    .swiper-wrapper {
        display: flex;
        transition-timing-function: linear;
    }

    .swiper-slide {
        flex-shrink: 0;
        width: 250px;
        margin-right: 16px;
    }

    @media (max-width: 768px) {
        .swiper-slide {
            width: 200px;
        }
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>

    </head>
    <body class="bg-gray-50">
    <custom-header home-url="{{route('Home.index')}}", admin-url="{{route('Admin.index')}}"  ></custom-header>

    <main class="container mx-auto px-4 py-8">
        <!-- Categories Section -->
        {{-- <section class="mb-12">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b-2 border-purple-500 pb-2">دسته بندی محصولات</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <a href="#" class="category-card bg-white rounded-lg shadow-md p-4 text-center hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 mx-auto mb-2 bg-purple-100 rounded-full flex items-center justify-center">
                        <i data-feather="smartphone" class="text-purple-600"></i>
                    </div>
                    <span class="text-gray-700 font-medium">موبایل</span>
                </a>
                <a href="#" class="category-card bg-white rounded-lg shadow-md p-4 text-center hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 mx-auto mb-2 bg-blue-100 rounded-full flex items-center justify-center">
                        <i data-feather="tv" class="text-blue-600"></i>
                    </div>
                    <span class="text-gray-700 font-medium">تلویزیون</span>
                </a>
                <a href="#" class="category-card bg-white rounded-lg shadow-md p-4 text-center hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 mx-auto mb-2 bg-green-100 rounded-full flex items-center justify-center">
                        <i data-feather="headphones" class="text-green-600"></i>
                    </div>
                    <span class="text-gray-700 font-medium">هدفون</span>
                </a>
                <a href="#" class="category-card bg-white rounded-lg shadow-md p-4 text-center hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 mx-auto mb-2 bg-yellow-100 rounded-full flex items-center justify-center">
                        <i data-feather="watch" class="text-yellow-600"></i>
                    </div>
                    <span class="text-gray-700 font-medium">ساعت هوشمند</span>
                </a>
                <a href="#" class="category-card bg-white rounded-lg shadow-md p-4 text-center hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 mx-auto mb-2 bg-red-100 rounded-full flex items-center justify-center">
                        <i data-feather="laptop" class="text-red-600"></i>
                    </div>
                    <span class="text-gray-700 font-medium">لپ تاپ</span>
                </a>
                <a href="#" class="category-card bg-white rounded-lg shadow-md p-4 text-center hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 mx-auto mb-2 bg-indigo-100 rounded-full flex items-center justify-center">
                        <i data-feather="home" class="text-indigo-600"></i>
                    </div>
                    <span class="text-gray-700 font-medium">لوازم خانگی</span>
                </a>
            </div>
        </section> --}}
        <!-- Featured Products -->
        <section class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 border-b-2 border-purple-500 pb-2"> محصولات مربوطه </h2>
                <a href="#" class="text-purple-600 hover:text-purple-800 transition duration-300">مشاهده همه</a>
            </div>
            <div class="product-slider relative">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!-- Product 1 -->
                        @foreach ($products as $product)
                        <a href="{{route('Home.showProduct',['productslug' => $product->productslug]) }}">
                        <div class="swiper-slide">
                            <div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                                <div class="relative">
                                    @php
                                        $firstImage = null;
                                        if(is_array($product->images) && count($product->images) > 0)
                                        {
                                           $firstImage =  is_array($product->images[0])
                                           ? $product->images[0][0]
                                           : $product->images[0];
                                        }

                                    @endphp

                                    <img src="{{asset('storage/products/' . $firstImage ?? "noImage.png" )}}" alt="گوشی موبایل" class="w-full h-48 object-contain">
                                    <div class="absolute top-2 left-2 bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-1 rounded">پرفروش</div>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2"> {{Str::limit($product->name, 55, '...')  }}  </h3>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-yellow-400">
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current text-gray-300"></i>
                                        </div>
                                        <span class="text-gray-500 text-xs mr-1">(42 نظر)</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-purple-600 font-bold" >{{number_format($product->price) }} تومان</span>
                                        <button class="bg-purple-600 text-white px-3 py-1 rounded-md text-sm hover:bg-purple-700 transition duration-300">
                                            <i data-feather="shopping-cart" class="w-4 h-4 inline mr-1"></i>
                                            خرید
                                        </button>
                                    </div>
                                    <div>
                                        <span class="text-gray-400 text-sm line-through">{{number_format($product->price) }} تومان </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </a>
                        @endforeach




                        <!-- Product 2 -->
                        {{-- <div class="swiper-slide">
                            <div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                                <div class="relative">
                                    <img src="http://static.photos/technology/640x360/2" alt="هدفون" class="w-full h-48 object-cover">
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">هدفون بی سیم سونی WH-1000XM4</h3>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-yellow-400">
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                        </div>
                                        <span class="text-gray-500 text-xs mr-1">(87 نظر)</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-purple-600 font-bold">۸,۷۵۰,۰۰۰ تومان</span>
                                        <button class="bg-purple-600 text-white px-3 py-1 rounded-md text-sm hover:bg-purple-700 transition duration-300">
                                            <i data-feather="shopping-cart" class="w-4 h-4 inline mr-1"></i>
                                            خرید
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product 3 -->
                        <div class="swiper-slide">
                            <div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                                <div class="relative">
                                    <img src="http://static.photos/technology/640x360/3" alt="لپ تاپ" class="w-full h-48 object-cover">
                                    <div class="absolute top-2 left-2 bg-green-400 text-green-900 text-xs font-bold px-2 py-1 rounded">جدید</div>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">لپ تاپ اپل مک بوک پرو 13 اینچ</h3>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-yellow-400">
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current text-gray-300"></i>
                                        </div>
                                        <span class="text-gray-500 text-xs mr-1">(23 نظر)</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-purple-600 font-bold">۴۶,۹۹۰,۰۰۰ تومان</span>
                                        <span class="text-gray-400 text-sm line-through">۵۲,۰۰۰,۰۰۰ تومان</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product 4 -->
                        <div class="swiper-slide">
                            <div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                                <div class="relative">
                                    <img src="http://static.photos/technology/640x360/4" alt="ساعت هوشمند" class="w-full h-48 object-cover">
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">ساعت هوشمند اپل واچ سری 7</h3>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-yellow-400">
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current text-gray-300"></i>
                                        </div>
                                        <span class="text-gray-500 text-xs mr-1">(15 نظر)</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-purple-600 font-bold">۱۸,۵۰۰,۰۰۰ تومان</span>
                                        <button class="bg-purple-600 text-white px-3 py-1 rounded-md text-sm hover:bg-purple-700 transition duration-300">
                                            <i data-feather="shopping-cart" class="w-4 h-4 inline mr-1"></i>
                                            خرید
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product 5 -->
                        <div class="swiper-slide">
                            <div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                                <div class="relative">
                                    <img src="http://static.photos/technology/640x360/5" alt="تلویزیون" class="w-full h-48 object-cover">
                                    <div class="absolute top-2 left-2 bg-red-400 text-red-900 text-xs font-bold px-2 py-1 rounded">تخفیف ویژه</div>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">تلویزیون ال جی OLED 55 اینچ</h3>
                                    <div class="flex items-center mb-2">
                                        <div class="flex text-yellow-400">
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                            <i data-feather="star" class="w-4 h-4 fill-current text-gray-300"></i>
                                        </div>
                                        <span class="text-gray-500 text-xs mr-1">(31 نظر)</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-purple-600 font-bold">۵۶,۹۹۰,۰۰۰ تومان</span>
                                        <span class="text-gray-400 text-sm line-through">۶۲,۰۰۰,۰۰۰ تومان</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <button class="swiper-button-prev absolute top-1/2 right-0 transform -translate-y-1/2 bg-white shadow-md rounded-full p-2 z-10 hover:bg-gray-100 transition duration-300">
                    <i data-feather="chevron-right" class="w-6 h-6 text-gray-600"></i>
                </button>
                <button class="swiper-button-next absolute top-1/2 left-0 transform -translate-y-1/2 bg-white shadow-md rounded-full p-2 z-10 hover:bg-gray-100 transition duration-300">
                    <i data-feather="chevron-left" class="w-6 h-6 text-gray-600"></i>
                </button>
            </div>
        </section>

        <!-- New Arrivals -->
        <section class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 border-b-2 border-purple-500 pb-2">جدیدترین محصولات</h2>
                <a href="#" class="text-purple-600 hover:text-purple-800 transition duration-300">مشاهده همه</a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <!-- Product 1 -->
                <div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative">
                        <img src="http://static.photos/technology/640x360/6" alt="گوشی موبایل" class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-green-400 text-green-900 text-xs font-bold px-2 py-1 rounded">جدید</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">گوشی شیائومی 11T Pro</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current text-gray-300"></i>
                            </div>
                            <span class="text-gray-500 text-xs mr-1">(12 نظر)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-purple-600 font-bold">۱۵,۹۹۰,۰۰۰ تومان</span>
                            <button class="bg-purple-600 text-white px-3 py-1 rounded-md text-sm hover:bg-purple-700 transition duration-300">
                                <i data-feather="shopping-cart" class="w-4 h-4 inline mr-1"></i>
                                خرید
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative">
                        <img src="http://static.photos/technology/640x360/7" alt="تبلت" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">تبلت سامسونگ گلکسی تب S8</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                            </div>
                            <span class="text-gray-500 text-xs mr-1">(8 نظر)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-purple-600 font-bold">۲۲,۷۵۰,۰۰۰ تومان</span>
                            <button class="bg-purple-600 text-white px-3 py-1 rounded-md text-sm hover:bg-purple-700 transition duration-300">
                                <i data-feather="shopping-cart" class="w-4 h-4 inline mr-1"></i>
                                خرید
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative">
                        <img src="http://static.photos/technology/640x360/8" alt="هدفون" class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-green-400 text-green-900 text-xs font-bold px-2 py-1 rounded">جدید</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">هدفون بی سیم اپل ایرپادز پرو</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current text-gray-300"></i>
                            </div>
                            <span class="text-gray-500 text-xs mr-1">(19 نظر)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-purple-600 font-bold">۹,۹۹۰,۰۰۰ تومان</span>
                            <button class="bg-purple-600 text-white px-3 py-1 rounded-md text-sm hover:bg-purple-700 transition duration-300">
                                <i data-feather="shopping-cart" class="w-4 h-4 inline mr-1"></i>
                                خرید
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product 4 -->
                <div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative">
                        <img src="http://static.photos/technology/640x360/9" alt="لپ تاپ" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">لپ تاپ ایسوس ویووبوک S14</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current text-gray-300"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current text-gray-300"></i>
                            </div>
                            <span class="text-gray-500 text-xs mr-1">(5 نظر)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-purple-600 font-bold">۲۶,۵۰۰,۰۰۰ تومان</span>
                            <button class="bg-purple-600 text-white px-3 py-1 rounded-md text-sm hover:bg-purple-700 transition duration-300">
                                <i data-feather="shopping-cart" class="w-4 h-4 inline mr-1"></i>
                                خرید
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product 5 -->
                <div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative">
                        <img src="http://static.photos/technology/640x360/10" alt="دوربین" class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2 bg-green-400 text-green-900 text-xs font-bold px-2 py-1 rounded">جدید</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">دوربین کانن EOS R6</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current text-gray-300"></i>
                            </div>
                            <span class="text-gray-500 text-xs mr-1">(7 نظر)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-purple-600 font-bold">۶۸,۹۹۰,۰۰۰ تومان</span>
                            <button class="bg-purple-600 text-white px-3 py-1 rounded-md text-sm hover:bg-purple-700 transition duration-300">
                                <i data-feather="shopping-cart" class="w-4 h-4 inline mr-1"></i>
                                خرید
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Special Offers -->
        <section class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 border-b-2 border-purple-500 pb-2">پیشنهادات ویژه</h2>
                <a href="#" class="text-purple-600 hover:text-purple-800 transition duration-300">مشاهده همه</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="special-offer bg-gradient-to-r from-purple-600 to-indigo-600 rounded-lg shadow-md overflow-hidden">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3 p-6 flex items-center justify-center">
                            <img src="http://static.photos/technology/640x360/11" alt="پیشنهاد ویژه" class="w-full h-auto max-h-48 object-contain">
                        </div>
                        <div class="md:w-2/3 p-6 text-white">
                            <h3 class="text-xl font-bold mb-2">تخفیف 30% روی تمام محصولات شیائومی</h3>
                            <p class="mb-4">تا پایان هفته از تخفیف ویژه محصولات شیائومی بهره مند شوید</p>
                            <div class="flex items-center mb-4">
                                <span class="text-yellow-300 font-bold text-lg mr-2">فقط 2 روز باقی مانده</span>
                                <i data-feather="clock" class="w-5 h-5 text-yellow-300"></i>
                            </div>
                            <a href="#" class="inline-block bg-white text-purple-600 px-4 py-2 rounded-md font-medium hover:bg-gray-100 transition duration-300">
                                مشاهده محصولات
                            </a>
                        </div>
                    </div>
                </div>
                <div class="special-offer bg-gradient-to-r from-blue-500 to-teal-500 rounded-lg shadow-md overflow-hidden">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3 p-6 flex items-center justify-center">
                            <img src="http://static.photos/technology/640x360/12" alt="پیشنهاد ویژه" class="w-full h-auto max-h-48 object-contain">
                        </div>
                        <div class="md:w-2/3 p-6 text-white">
                            <h3 class="text-xl font-bold mb-2">خرید اقساطی بدون پیش پرداخت</h3>
                            <p class="mb-4">خرید محصولات با قیمت بالای 10 میلیون تومان به صورت اقساط 12 ماهه</p>
                            <div class="flex items-center mb-4">
                                <span class="text-yellow-300 font-bold text-lg mr-2">فقط برای 100 نفر اول</span>
                                <i data-feather="alert-circle" class="w-5 h-5 text-yellow-300"></i>
                            </div>
                            <a href="#" class="inline-block bg-white text-blue-600 px-4 py-2 rounded-md font-medium hover:bg-gray-100 transition duration-300">
                                مشاهده شرایط
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <custom-footer></custom-footer>

    <!-- Components -->
    <script src="components/header.js"></script>
    <script src="components/footer.js"></script>
    <script src="script.js"></script>
    <script>
        feather.replace();
    </script>
<script src="https://huggingface.co/deepsite/deepsite-badge.js"></script>

<script>
// Initialize product sliders
document.addEventListener('DOMContentLoaded', function() {
    // Simulate loading products from API
    setTimeout(() => {
        const loadingElements = document.querySelectorAll('.loading');
        loadingElements.forEach(el => el.classList.remove('loading'));
    }, 1000);

    // Simple slider functionality for featured products
    const sliderContainer = document.querySelector('.product-slider .swiper-container');
    const sliderWrapper = document.querySelector('.product-slider .swiper-wrapper');
    const slides = document.querySelectorAll('.product-slider .swiper-slide');
    const prevBtn = document.querySelector('.swiper-button-prev');
    const nextBtn = document.querySelector('.swiper-button-next');

    let currentIndex = 0;
    const slideWidth = slides[0].offsetWidth + 16; // 16px for gap

    function updateSliderPosition() {
        sliderWrapper.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    }

    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateSliderPosition();
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentIndex < slides.length - Math.floor(sliderContainer.offsetWidth / slideWidth)) {
            currentIndex++;
            updateSliderPosition();
        }
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        updateSliderPosition();
    });
});

</script>

<script src="{{asset('HomeAssets/components/footer.js')}}"></script>

</body>
</html>




