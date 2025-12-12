class CustomFooter extends HTMLElement {
    connectedCallback() {
        const shadow = this.attachShadow({ mode: 'open' });

        // اضافه کردن Tailwind داخل Shadow DOM
        const tailwind = document.createElement("link");
        tailwind.setAttribute("rel", "stylesheet");
        tailwind.setAttribute("href", "https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css");

        // اضافه کردن Feather Icons داخل Shadow DOM
        const featherScript = document.createElement("script");
        featherScript.src = "https://unpkg.com/feather-icons";
        
        // ایجاد container اصلی
        const wrapper = document.createElement("div");
        wrapper.innerHTML = `
            <style>
                .footer-link:hover {
                    color: #3b82f6;
                    transform: translateX(-5px);
                }
                .footer-link {
                    transition: all 0.3s ease;
                }
            </style>

            <footer class="bg-gray-800 text-white pt-12 pb-6">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">

                        <!-- About Us -->
                        <div>
                            <h3 class="text-xl font-bold mb-4 border-b pb-2">درباره بازاربووم</h3>
                            <p class="text-gray-300 mb-4">
                                بازاربووم یک فروشگاه اینترنتی معتبر با سابقه طولانی در فروش محصولات دیجیتال و کالاهای مصرفی است.
                            </p>
                            <div class="flex space-x-4 space-x-reverse">
                                <a href="#" class="text-gray-300 hover:text-white"><i data-feather="instagram"></i></a>
                                <a href="#" class="text-gray-300 hover:text-white"><i data-feather="telegram"></i></a>
                                <a href="#" class="text-gray-300 hover:text-white"><i data-feather="twitter"></i></a>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div>
                            <h3 class="text-xl font-bold mb-4 border-b pb-2">دسترسی سریع</h3>
                            <ul class="space-y-2">
                                <li><a class="footer-link text-gray-300 flex items-center"><i data-feather="chevron-left" class="ml-1"></i>صفحه اصلی</a></li>
                                <li><a class="footer-link text-gray-300 flex items-center"><i data-feather="chevron-left" class="ml-1"></i>محصولات پرفروش</a></li>
                                <li><a class="footer-link text-gray-300 flex items-center"><i data-feather="chevron-left" class="ml-1"></i>تخفیف‌ها و پیشنهادها</a></li>
                                <li><a class="footer-link text-gray-300 flex items-center"><i data-feather="chevron-left" class="ml-1"></i>تماس با ما</a></li>
                                <li><a class="footer-link text-gray-300 flex items-center"><i data-feather="chevron-left" class="ml-1"></i>سوالات متداول</a></li>
                            </ul>
                        </div>

                        <!-- Customer Service -->
                        <div>
                            <h3 class="text-xl font-bold mb-4 border-b pb-2">خدمات مشتریان</h3>
                            <ul class="space-y-2">
                                <li><a class="footer-link text-gray-300 flex items-center"><i data-feather="chevron-left" class="ml-1"></i>رویه بازگرداندن کالا</a></li>
                                <li><a class="footer-link text-gray-300 flex items-center"><i data-feather="chevron-left" class="ml-1"></i>شرایط و ضوابط</a></li>
                                <li><a class="footer-link text-gray-300 flex items-center"><i data-feather="chevron-left" class="ml-1"></i>حریم خصوصی</a></li>
                                <li><a class="footer-link text-gray-300 flex items-center"><i data-feather="chevron-left" class="ml-1"></i>راهنمای خرید</a></li>
                                <li><a class="footer-link text-gray-300 flex items-center"><i data-feather="chevron-left" class="ml-1"></i>پشتیبانی 24/7</a></li>
                            </ul>
                        </div>

                        <!-- Contact -->
                        <div>
                            <h3 class="text-xl font-bold mb-4 border-b pb-2">اطلاعات تماس</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start"><i data-feather="map-pin" class="ml-2"></i>تهران، خیابان آزادی، پلاک 123</li>
                                <li class="flex items-start"><i data-feather="phone" class="ml-2"></i>021-12345678</li>
                                <li class="flex items-start"><i data-feather="mail" class="ml-2"></i>info@bazaarboom.ir</li>
                                <li class="flex items-start"><i data-feather="clock" class="ml-2"></i>پشتیبانی 24 ساعته</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-700 pt-6 mb-6">
                        <h4 class="text-center mb-4 text-gray-300">روش‌های پرداخت</h4>
                        <div class="flex justify-center space-x-4 space-x-reverse">
                            <img src="https://cdn.zarinpal.com/badges/trustLogo/1.svg" class="h-10">
                            <img src="https://asanpardakht.ir/wp-content/uploads/2021/08/asanpardakht-logo.png" class="h-10">
                            <img src="https://pay.ir/frontend-assets/images/logo.svg" class="h-10">
                        </div>
                    </div>

                    <p class="text-center text-gray-400 text-sm">
                        تمامی حقوق این وبسایت متعلق به بازاربووم می‌باشد © 1402
                    </p>
                </div>
            </footer>
        `;

        shadow.appendChild(tailwind);
        shadow.appendChild(featherScript);
        shadow.appendChild(wrapper);

        featherScript.onload = () => {
            feather.replace();
        };
    }
}

customElements.define('custom-footer', CustomFooter);
