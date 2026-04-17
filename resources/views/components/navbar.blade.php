<header class="w-full bg-white shadow-sm sticky top-0 z-50">

    <div class="max-w-[1200px] mx-auto px-4 md:px-6">

        <nav class="flex justify-between items-center py-4">

            <!-- Logo -->
            <a href="{{ route('front.index') }}" class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-full overflow-hidden">
                    <img src="{{ asset('assets/images/logos/Logo.jpg') }}" alt="Logo Sekolah"
                        class="w-full h-full object-cover">
                </div>

                <div class="block max-w-[180px] sm:max-w-none">

                    <p class="font-bold 
              text-[#0D3B66] 
              text-xs sm:text-sm md:text-base 
              leading-tight 
              line-clamp-2">

                        SMAK SEMINARI YOHANES
                        PENGINJIL ASMAT

                    </p>

                    <p class="text-[10px] sm:text-xs text-[#6C7A89]">
                        Website Sekolah & Portal Berita
                    </p>

                </div>

            </a>


            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-2 text-sm font-semibold">

                <a href="{{ route('front.index') }}" class="nav-link">
                    Beranda
                </a>

                <a href="{{ route('front.index') }}#announcements" class="nav-link">
                    Pengumuman
                </a>

                <a href="{{ route('front.index') }}#achievements" class="nav-link">
                    Prestasi
                </a>

                <a href="{{ route('front.index') }}#news" class="nav-link">
                    Berita
                </a>

                <a href="{{ route('front.profile') }}" class="nav-link">
                    Profil
                </a>

                <a href="{{ route('front.academic') }}" class="nav-link">
                    Akademik
                </a>

                <a href="{{ route('front.gallery') }}" class="nav-link">
                    Galeri
                </a>

                <a href="{{ route('front.contact') }}" class="nav-link">
                    Kontak
                </a>

            </div>


            <!-- Hamburger Button -->
            <button id="hamburgerBtn"
                class="lg:hidden flex items-center justify-center w-10 h-10 rounded-lg border border-[#E8EBF4]">

                <!-- Icon -->
                <svg id="hamburgerIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#0D3B66]" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">

                    <path id="iconPath" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />

                </svg>

            </button>

        </nav>


        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden lg:hidden pb-4 transition-all duration-300">

            <div class="flex flex-col gap-2 text-sm font-semibold">

                <a href="{{ route('front.index') }}" class="mobile-link">Beranda</a>

                <a href="{{ route('front.index') }}#announcements" class="mobile-link">
                    Pengumuman
                </a>

                <a href="{{ route('front.index') }}#achievements" class="mobile-link">
                    Prestasi
                </a>

                <a href="{{ route('front.index') }}#news" class="mobile-link">
                    Berita
                </a>

                <a href="{{ route('front.profile') }}" class="mobile-link">
                    Profil
                </a>

                <a href="{{ route('front.academic') }}" class="mobile-link">
                    Akademik
                </a>

                <a href="{{ route('front.gallery') }}" class="mobile-link">
                    Galeri
                </a>

                <a href="{{ route('front.contact') }}" class="mobile-link">
                    Kontak
                </a>

            </div>


            <!-- Search Mobile -->
            <form method="GET" action="{{ route('front.search') }}"
                class="mt-4 flex items-center rounded-full border border-[#E8EBF4] p-[10px_16px] gap-[10px]">

                <button type="submit" class="w-5 h-5">
                    <img src="{{ asset('assets/images/icons/search-normal.svg') }}">
                </button>

                <input type="text" name="keyword" class="outline-none w-full" placeholder="Cari berita sekolah..." />

            </form>

        </div>

    </div>


    <!-- STYLE -->
    <style>
    .nav-link {
        padding: 8px 16px;
        border: 1px solid #EEF0F7;
        border-radius: 999px;
    }

    .nav-link:hover {
        box-shadow: 0 0 0 2px #0D3B66 inset;
    }

    .mobile-link {
        padding: 10px 16px;
        border: 1px solid #EEF0F7;
        border-radius: 10px;
    }
    </style>


    <!-- JAVASCRIPT -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {

        const btn = document.getElementById("hamburgerBtn");
        const menu = document.getElementById("mobileMenu");
        const icon = document.getElementById("iconPath");
        const links = document.querySelectorAll(".mobile-link");

        btn.addEventListener("click", function() {

            menu.classList.toggle("hidden");

            // Toggle icon ☰ → ✕
            if (menu.classList.contains("hidden")) {

                icon.setAttribute(
                    "d",
                    "M4 6h16M4 12h16M4 18h16"
                );

            } else {

                icon.setAttribute(
                    "d",
                    "M6 18L18 6M6 6l12 12"
                );

            }

        });

        // Auto close saat klik menu
        links.forEach(link => {

            link.addEventListener("click", function() {

                menu.classList.add("hidden");

                icon.setAttribute(
                    "d",
                    "M4 6h16M4 12h16M4 18h16"
                );

            });

        });

    });
    </script>

</header>