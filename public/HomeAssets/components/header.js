class CustomHeader extends HTMLElement {
    connectedCallback() {
        this.attachShadow({ mode: "open" });

        this.shadowRoot.innerHTML =
        `
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

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">

        <header class="bg-white shadow-md sticky top-0 z-50">
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

                        <a href="#" class="text-gray-700 hover:text-blue-500 transition">
                            <i data-feather="user" class="w-5 h-5"></i>
                        </a>

                        <button class="md:hidden text-gray-700 hover:text-blue-500 transition" id="mobile-menu-button">
                            <i data-feather="menu" class="w-6 h-6"></i>
                        </button>
                    </div>
                </div>

                <!-- Mobile search -->
                <div class="md:hidden mb-4">
                    <div class="relative">
                        <input type="text" placeholder="جستجو..."
                        class="search-input w-full bg-gray-100 rounded-full pr-4 pl-10 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300">

                        <button class="absolute left-0 top-0 text-gray-500 p-2 h-full">
                            <i data-feather="search" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex justify-between items-center py-2 border-t border-gray-100">
                    <div class="flex space-x-6 space-x-reverse">
                        <a id="home-link" href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">خانه</a>
                        <a id="admin-link" href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">مدیریت </a>
                        <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">دسته بندی‌ها</a>
                        <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">وبلاگ</a>
                        <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">تماس با ما</a>
                    </div>
                    <div>
                        <a href="#" class="text-blue-500 hover:text-blue-700 transition font-medium">
                            <i data-feather="headphones" class="w-4 h-4 ml-1 inline"></i>
                            پشتیبانی 24 ساعته
                        </a>
                    </div>
                </nav>
            </div>

            <!-- Mobile Menu -->
            <div class="mobile-menu hidden md:hidden bg-white border-t border-gray-200 py-4 px-4" id="mobile-menu">
                <div class="flex flex-col space-y-4">
                    <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">خانه</a>
                    <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">فروش ویژه</a>
                    <a href="#" class="text-gray-700 hover:text-blue-500 transition font-medium">دسته بندی‌ها</a>
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
        `;

        // گرفتن لینک از attribute
        const adminUrl = this.getAttribute("admin-url");
        // پیدا کردن لینک داخل shadow DOM
        const adminLink = this.shadowRoot.getElementById("admin-link");
        // تنظیم آدرس
        if (adminLink && adminUrl) {
            adminLink.setAttribute("href", adminUrl);
        }

         // گرفتن لینک از attribute
        const homeUrl = this.getAttribute("home-url");
        // پیدا کردن لینک داخل shadow DOM
        const homeLink = this.shadowRoot.getElementById("home-link");
        // تنظیم آدرس
        if (homeLink && homeUrl) {
            homeLink.setAttribute("href", homeUrl);
        }

        // Apply feather icons INSIDE shadow DOM
        const script = document.createElement("script");
        script.src = "https://unpkg.com/feather-icons";
        script.onload = () => {
            feather.replace({ container: this.shadowRoot });
        };
        document.head.appendChild(script);

        // Mobile menu toggle
        const mobileMenuButton = this.shadowRoot.getElementById("mobile-menu-button");
        const mobileMenu = this.shadowRoot.getElementById("mobile-menu");

        mobileMenuButton.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
            const icon = mobileMenuButton.querySelector("i");

            if (mobileMenu.classList.contains("hidden")) {
                icon.setAttribute("data-feather", "menu");
            } else {
                icon.setAttribute("data-feather", "x");
            }

            feather.replace({ container: this.shadowRoot });
        });
    }
}

customElements.define("custom-header", CustomHeader);
