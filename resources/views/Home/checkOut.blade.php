<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    @include('Home.header')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تکمیل خرید | بازاربووم</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .checkout-step {
            transition: all 0.3s ease;
        }
        .checkout-step.active {
            background-color: #3b82f6;
            color: white;
        }
        .checkout-step.completed {
            background-color: #10b981;
            color: white;
        }
        .address-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .address-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .address-card.selected {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }
        .cart-item {
            transition: all 0.3s ease;
        }
        .cart-item:hover {
            background-color: #f9fafb;
        }
        input[type="radio"]:checked + label {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Breadcrumb -->
    <nav class="bg-white shadow-sm py-4">
        <div class="container mx-auto px-4">
            <div class="flex items-center space-x-2 space-x-reverse">
                <a href="/" class="text-gray-600 hover:text-blue-600">خانه</a>
                <i data-feather="chevron-left" class="w-4 h-4 text-gray-400"></i>
                <a href="/cart" class="text-gray-600 hover:text-blue-600">سبد خرید</a>
                <i data-feather="chevron-left" class="w-4 h-4 text-gray-400"></i>
                <span class="text-blue-600 font-medium">تکمیل خرید</span>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        <!-- مراحل خرید -->
        <div class="mb-10">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-4 space-x-reverse mb-4 md:mb-0">
                    <div class="checkout-step active w-10 h-10 rounded-full flex items-center justify-center font-bold">
                        ۱
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">انتخاب آدرس</p>
                        <p class="text-sm text-gray-600">آدرس تحویل را انتخاب کنید</p>
                    </div>
                </div>

                <div class="hidden md:block flex-1 h-1 bg-gray-200 mx-4"></div>

                <div class="flex items-center space-x-4 space-x-reverse mb-4 md:mb-0">
                    <div class="checkout-step w-10 h-10 rounded-full flex items-center justify-center font-bold bg-gray-200 text-gray-600">
                        ۲
                    </div>
                    <div>
                        <p class="font-medium text-gray-600">روش ارسال</p>
                        <p class="text-sm text-gray-500">روش ارسال را انتخاب کنید</p>
                    </div>
                </div>

                <div class="hidden md:block flex-1 h-1 bg-gray-200 mx-4"></div>

                <div class="flex items-center space-x-4 space-x-reverse">
                    <div class="checkout-step w-10 h-10 rounded-full flex items-center justify-center font-bold bg-gray-200 text-gray-600">
                        ۳
                    </div>
                    <div>
                        <p class="font-medium text-gray-600">پرداخت</p>
                        <p class="text-sm text-gray-500">روش پرداخت را انتخاب کنید</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- ستون سمت چپ - آدرس و اطلاعات -->
            <div class="lg:col-span-2">
                <!-- انتخاب آدرس -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-800">انتخاب آدرس تحویل</h2>
                        <button class="text-blue-600 hover:text-blue-800 flex items-center">
                            <i data-feather="plus" class="w-4 h-4 ml-1"></i>
                            افزودن آدرس جدید
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- آدرس ۱ -->
                        <div class="address-card selected border-2 border-blue-500 bg-blue-50 rounded-lg p-5">
                            <input type="radio" id="address-1" name="address" value="1" checked class="hidden">
                            <label for="address-1" class="cursor-pointer block">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="flex items-center">
                                        <i data-feather="home" class="w-5 h-5 text-blue-600 ml-2"></i>
                                        <h3 class="font-bold text-gray-800">آدرس منزل</h3>
                                    </div>
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">پیش‌فرض</span>
                                </div>
                                <p class="text-gray-600 mb-2">تهران، منطقه ۵، خیابان آزادی، کوچه ۱۲، پلاک ۳۴، واحد ۲</p>
                                <p class="text-gray-600">کد پستی: ۱۲۳۴۵۶۷۸۹۰</p>
                                <div class="mt-4 flex items-center">
                                    <i data-feather="user" class="w-4 h-4 text-gray-500 ml-2"></i>
                                    <span class="text-gray-600">کاربر نمونه</span>
                                    <i data-feather="phone" class="w-4 h-4 text-gray-500 mr-4 ml-6"></i>
                                    <span class="text-gray-600">۰۹۱۲۳۴۵۶۷۸۹</span>
                                </div>
                            </label>
                        </div>

                        <!-- آدرس ۲ -->
                        <div class="address-card border border-gray-200 rounded-lg p-5 hover:border-blue-300">
                            <input type="radio" id="address-2" name="address" value="2" class="hidden">
                            <label for="address-2" class="cursor-pointer block">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="flex items-center">
                                        <i data-feather="briefcase" class="w-5 h-5 text-gray-600 ml-2"></i>
                                        <h3 class="font-bold text-gray-800">آدرس محل کار</h3>
                                    </div>
                                </div>
                                <p class="text-gray-600 mb-2">تهران، خیابان ولیعصر، پلاک ۱۲۳۴، طبقه ۵، شرکت نمونه</p>
                                <p class="text-gray-600">کد پستی: ۹۸۷۶۵۴۳۲۱</p>
                                <div class="mt-4 flex items-center">
                                    <i data-feather="user" class="w-4 h-4 text-gray-500 ml-2"></i>
                                    <span class="text-gray-600">کاربر نمونه</span>
                                    <i data-feather="phone" class="w-4 h-4 text-gray-500 mr-4 ml-6"></i>
                                    <span class="text-gray-600">۰۹۱۲۳۴۵۶۷۸۹</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- یادداشت برای پیک -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <label for="delivery-note" class="block text-sm font-medium text-gray-700 mb-2">
                            یادداشت برای پیک (اختیاری)
                        </label>
                        <textarea id="delivery-note" rows="3"
                                  class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500"
                                  placeholder="مثلاً: لطفاً قبل از تحویل تماس بگیرید یا در صورت نبودن با همسایه تحویل دهید..."></textarea>
                    </div>
                </div>

                <!-- لیست سبد خرید -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">سبد خرید شما</h2>

                    <div class="space-y-4">
                        <!-- محصول ۱ -->
                        <div class="cart-item flex items-center border-b border-gray-100 pb-4">
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                                 alt="هدفون"
                                 class="w-20 h-20 rounded-lg object-cover ml-4">
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-800">هدفون بی‌سیم حرفه‌ای</h3>
                                <p class="text-gray-600 text-sm mt-1">رنگ: مشکی | گارانتی: ۱۸ ماهه</p>
                                <div class="flex items-center mt-2">
                                    <div class="flex items-center border border-gray-300 rounded-lg">
                                        <button class="px-3 py-1 text-gray-600 hover:text-blue-600">−</button>
                                        <span class="px-3 py-1 border-l border-r border-gray-300">۱</span>
                                        <button class="px-3 py-1 text-gray-600 hover:text-blue-600">+</button>
                                    </div>
                                    <button class="text-red-600 hover:text-red-800 mr-6 flex items-center">
                                        <i data-feather="trash-2" class="w-4 h-4 ml-1"></i>
                                        حذف
                                    </button>
                                </div>
                            </div>
                            <div class="text-left">
                                <p class="font-bold text-gray-800">۲,۴۹۰,۰۰۰ تومان</p>
                                <p class="text-gray-500 text-sm line-through mt-1">۲,۸۰۰,۰۰۰ تومان</p>
                            </div>
                        </div>

                        <!-- محصول ۲ -->
                        <div class="cart-item flex items-center border-b border-gray-100 pb-4">
                            <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                                 alt="ساعت هوشمند"
                                 class="w-20 h-20 rounded-lg object-cover ml-4">
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-800">ساعت هوشمند ورزشی</h3>
                                <p class="text-gray-600 text-sm mt-1">رنگ: نقره‌ای | سایز: متوسط</p>
                                <div class="flex items-center mt-2">
                                    <div class="flex items-center border border-gray-300 rounded-lg">
                                        <button class="px-3 py-1 text-gray-600 hover:text-blue-600">−</button>
                                        <span class="px-3 py-1 border-l border-r border-gray-300">۱</span>
                                        <button class="px-3 py-1 text-gray-600 hover:text-blue-600">+</button>
                                    </div>
                                    <button class="text-red-600 hover:text-red-800 mr-6 flex items-center">
                                        <i data-feather="trash-2" class="w-4 h-4 ml-1"></i>
                                        حذف
                                    </button>
                                </div>
                            </div>
                            <div class="text-left">
                                <p class="font-bold text-gray-800">۳,۷۵۰,۰۰۰ تومان</p>
                            </div>
                        </div>

                        <!-- محصول ۳ -->
                        <div class="cart-item flex items-center">
                            <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                                 alt="دوربین عکاسی"
                                 class="w-20 h-20 rounded-lg object-cover ml-4">
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-800">دوربین عکاسی DSLR</h3>
                                <p class="text-gray-600 text-sm mt-1">لنز ۱۸-۵۵mm | حافظه ۶۴GB</p>
                                <div class="flex items-center mt-2">
                                    <div class="flex items-center border border-gray-300 rounded-lg">
                                        <button class="px-3 py-1 text-gray-600 hover:text-blue-600">−</button>
                                        <span class="px-3 py-1 border-l border-r border-gray-300">۱</span>
                                        <button class="px-3 py-1 text-gray-600 hover:text-blue-600">+</button>
                                    </div>
                                    <button class="text-red-600 hover:text-red-800 mr-6 flex items-center">
                                        <i data-feather="trash-2" class="w-4 h-4 ml-1"></i>
                                        حذف
                                    </button>
                                </div>
                            </div>
                            <div class="text-left">
                                <p class="font-bold text-gray-800">۱۵,۹۰۰,۰۰۰ تومان</p>
                                <p class="text-green-600 text-sm mt-1">شگفت‌انگیز!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ستون سمت راست - خلاصه سفارش -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 sticky top-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">خلاصه سفارش</h2>

                    <!-- جزئیات هزینه -->
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">قیمت کالاها (۳ قلم)</span>
                            <span class="font-medium">۲۲,۱۴۰,۰۰۰ تومان</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">تخفیف کالاها</span>
                            <span class="text-green-600 font-medium">− ۱,۵۰۰,۰۰۰ تومان</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">هزینه ارسال</span>
                            <div>
                                <span class="font-medium">۳۰,۰۰۰ تومان</span>
                                <p class="text-gray-500 text-sm">پست پیشتاز (۲-۳ روز کاری)</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">مالیات ارزش افزوده</span>
                            <span class="font-medium">۳۳۲,۷۰۰ تومان</span>
                        </div>
                    </div>

                    <!-- جمع کل -->
                    <div class="border-t border-gray-200 pt-4 mb-6">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-gray-800">مبلغ قابل پرداخت</span>
                            <div class="text-left">
                                <p class="text-2xl font-bold text-blue-600">۲۱,۰۰۲,۷۰۰ تومان</p>
                                <p class="text-gray-500 text-sm mt-1">شامل مالیات و هزینه ارسال</p>
                            </div>
                        </div>
                    </div>

                    <!-- کوپن تخفیف -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">کد تخفیف</label>
                        <div class="flex">
                            <input type="text"
                                   class="flex-1 p-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500"
                                   placeholder="کد تخفیف خود را وارد کنید">
                            <button class="bg-gray-800 text-white px-4 py-3 rounded-r-lg hover:bg-gray-900 transition">
                                اعمال
                            </button>
                        </div>
                    </div>

                    <!-- روش پرداخت -->
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-800 mb-3">روش پرداخت</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="radio" id="payment-online" name="payment" checked class="text-blue-600">
                                <label for="payment-online" class="mr-2 flex items-center cursor-pointer">
                                    <i data-feather="credit-card" class="w-5 h-5 text-gray-600 ml-2"></i>
                                    پرداخت آنلاین
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="payment-cash" name="payment" class="text-blue-600">
                                <label for="payment-cash" class="mr-2 flex items-center cursor-pointer">
                                    <i data-feather="dollar-sign" class="w-5 h-5 text-gray-600 ml-2"></i>
                                    پرداخت در محل
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="payment-wallet" name="payment" class="text-blue-600">
                                <label for="payment-wallet" class="mr-2 flex items-center cursor-pointer">
                                    <i data-feather="wallet" class="w-5 h-5 text-gray-600 ml-2"></i>
                                    پرداخت از کیف پول
                                    <span class="mr-auto text-gray-600 text-sm">(موجودی: ۲۵۰,۰۰۰ تومان)</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- شرایط و ضوابط -->
                    <div class="mb-6">
                        <div class="flex items-start">
                            <input type="checkbox" id="terms" class="mt-1 text-blue-600">
                            <label for="terms" class="mr-2 text-gray-600 text-sm">
                                <a href="#" class="text-blue-600 hover:text-blue-800">قوانین و شرایط</a>
                                استفاده از سایت را خوانده‌ام و می‌پذیرم. همچنین
                                <a href="#" class="text-blue-600 hover:text-blue-800">حریم خصوصی</a>
                                را مطالعه کرده‌ام.
                            </label>
                        </div>
                    </div>

                    <!-- دکمه نهایی -->
                    <button id="submit-order"
                            class="w-full bg-blue-600 text-white py-4 rounded-lg hover:bg-blue-700 transition font-bold text-lg flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed"
                            disabled>
                        <i data-feather="lock" class="w-5 h-5 ml-2"></i>
                        ثبت و پرداخت سفارش
                    </button>

                    <p class="text-gray-500 text-sm mt-4 text-center">
                        با ثبت سفارش، اطلاعات شما مطابق با
                        <a href="#" class="text-blue-600 hover:text-blue-800">حریم خصوصی</a>
                        محافظت می‌شود.
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // مقداردهی آیکون‌ها
            if (typeof feather !== 'undefined') {
                feather.replace();
            }

            // انتخاب آدرس
            const addressCards = document.querySelectorAll('.address-card');
            addressCards.forEach(card => {
                const radio = card.querySelector('input[type="radio"]');
                const label = card.querySelector('label');

                if (label) {
                    label.addEventListener('click', function() {
                        // حذف انتخاب از همه
                        addressCards.forEach(c => {
                            c.classList.remove('selected', 'border-blue-500', 'bg-blue-50');
                            c.classList.add('border-gray-200');
                        });

                        // انتخاب آدرس جدید
                        card.classList.add('selected', 'border-blue-500', 'bg-blue-50');
                        card.classList.remove('border-gray-200');

                        // انتخاب radio button
                        if (radio) {
                            radio.checked = true;
                        }
                    });
                }
            });

            // مدیریت تعداد محصولات
            document.querySelectorAll('.cart-item').forEach(item => {
                const minusBtn = item.querySelector('button:nth-child(1)');
                const plusBtn = item.querySelector('button:nth-child(3)');
                const quantitySpan = item.querySelector('span');
                const deleteBtn = item.querySelector('.text-red-600');

                if (minusBtn && quantitySpan) {
                    minusBtn.addEventListener('click', function() {
                        let quantity = parseInt(quantitySpan.textContent);
                        if (quantity > 1) {
                            quantitySpan.textContent = quantity - 1;
                            updateOrderSummary();
                        }
                    });
                }

                if (plusBtn && quantitySpan) {
                    plusBtn.addEventListener('click', function() {
                        let quantity = parseInt(quantitySpan.textContent);
                        quantitySpan.textContent = quantity + 1;
                        updateOrderSummary();
                    });
                }

                if (deleteBtn) {
                    deleteBtn.addEventListener('click', function() {
                        if (confirm('آیا از حذف این محصول از سبد خرید اطمینان دارید؟')) {
                            item.remove();
                            updateOrderSummary();
                        }
                    });
                }
            });

            // فعال/غیرفعال کردن دکمه ثبت سفارش
            const termsCheckbox = document.getElementById('terms');
            const submitOrderBtn = document.getElementById('submit-order');

            if (termsCheckbox && submitOrderBtn) {
                termsCheckbox.addEventListener('change', function() {
                    submitOrderBtn.disabled = !this.checked;
                });

                // بررسی اولیه
                submitOrderBtn.disabled = !termsCheckbox.checked;
            }

            // شبیه‌سازی ثبت سفارش
            if (submitOrderBtn) {
                submitOrderBtn.addEventListener('click', function() {
                    if (!this.disabled) {
                        // در حالت واقعی، فرم ارسال می‌شود
                        // اینجا فقط شبیه‌سازی می‌کنیم
                        this.innerHTML = '<i data-feather="loader" class="w-5 h-5 ml-2 animate-spin"></i> در حال پردازش...';
                        this.disabled = true;

                        setTimeout(() => {
                            alert('سفارش شما با موفقیت ثبت شد! شماره پیگیری: ORD-' + Date.now());
                            window.location.href = '/order-success';
                        }, 2000);
                    }
                });
            }

            // تابع به‌روزرسانی خلاصه سفارش (شبیه‌سازی)
            function updateOrderSummary() {
                // در حالت واقعی، این اطلاعات از سرور دریافت می‌شود
                console.log('سبد خرید به‌روزرسانی شد');
            }

            // اعتبارسنجی فرم
            const deliveryNote = document.getElementById('delivery-note');
            if (deliveryNote) {
                deliveryNote.addEventListener('input', function() {
                    if (this.value.length > 500) {
                        this.value = this.value.substring(0, 500);
                    }
                });
            }
        });
    </script>
</body>
</html>
