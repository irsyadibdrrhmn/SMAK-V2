@extends('front.master')
@section('content')

<body class="font-[Poppins] pb-[72px] bg-[#F8FAFC]">
    <x-navbar />

    <!-- Image Slider -->
    <section class="w-full px-0 mt-4 md:mt-8">
        <x-slider :slides="$featured_articles" />
    </section>

    <!-- Hero Section -->
    <section class="w-full px-4 md:px-6 mt-6 md:mt-8">
        <div class="max-w-[1150px] mx-auto 
                bg-[#0D3B66] 
                rounded-2xl md:rounded-3xl 
                p-6 md:p-10 
                text-white">

            <p class="text-xs md:text-sm uppercase tracking-wider">
                Selamat Datang di
            </p>

            <h1 class="text-2xl sm:text-3xl md:text-4xl 
                   font-bold mt-2 leading-tight">

                {{ $schoolProfile?->school_name ?? 'SMAK Seminari Yohanes' }}
            </h1>

            <p class="mt-3 text-white/90 
                  text-sm md:text-base 
                  max-w-2xl">

                {{ $schoolProfile?->tagline ?? 'Website sekolah dengan portal berita terintegrasi untuk siswa, orang tua, dan masyarakat.' }}
            </p>

            <div class="mt-5 flex flex-wrap gap-3">

                <a href="{{ route('front.profile') }}" class="rounded-full 
                      bg-white 
                      text-[#0D3B66] 
                      px-4 md:px-5 
                      py-2 
                      text-sm md:text-base
                      font-semibold">

                    Profil Sekolah
                </a>

                <a href="{{ route('front.academic') }}" class="rounded-full 
                      border border-white 
                      px-4 md:px-5 
                      py-2 
                      text-sm md:text-base
                      font-semibold">

                    Program Akademik
                </a>

            </div>
        </div>
    </section>

    <!-- Sambutan + Pengumuman -->
    <section id="announcements" class="w-full px-4 md:px-6 mt-8 md:mt-10">

        <div class="max-w-[1150px] mx-auto 
            grid grid-cols-1 
            lg:grid-cols-3 
            gap-6">

            <!-- Sambutan -->
            <div class="lg:col-span-2 
                bg-white 
                rounded-2xl 
                p-5 md:p-6 
                border border-[#E8EBF4]">

                <h2 class="font-bold 
                   text-xl md:text-2xl 
                   text-[#0D3B66]">

                    Sambutan Kepala Sekolah
                </h2>

                <p class="mt-3 
                  text-sm md:text-base 
                  text-[#516070] 
                  leading-relaxed">

                    {{ $schoolProfile?->history ?? 'Silakan perbarui konten profil sekolah di admin Filament.' }}

                </p>

            </div>

            <!-- Pengumuman -->
            <div class="bg-white 
                rounded-2xl 
                p-5 md:p-6 
                border border-[#E8EBF4]">

                <h2 class="font-bold 
                   text-lg md:text-xl 
                   text-[#0D3B66]">

                    Pengumuman Terbaru
                </h2>

                <div class="mt-4 space-y-3">

                    @forelse($announcements as $announcement)

                    <a href="{{ route('front.announcement', $announcement->slug) }}" class="block 
                  border border-[#E8EBF4] 
                  rounded-xl 
                  overflow-hidden 
                  hover:border-[#0D3B66] 
                  transition">

                        @if($announcement->thumbnail)

                        <div class="w-full h-24 md:h-28 overflow-hidden">
                            <img src="{{ Storage::url($announcement->thumbnail) }}"
                                class="w-full h-full object-cover" />
                        </div>

                        @endif

                        <div class="p-3">

                            <p class="font-semibold text-sm line-clamp-2">
                                {{ $announcement->title }}
                            </p>

                            <p class="text-xs text-[#6C7A89] mt-1">
                                {{ optional($announcement->publish_at)->format('M d, Y H:i') ?? 'Draft' }}
                            </p>

                        </div>

                    </a>

                    @empty
                    <p class="text-[#6C7A89] text-sm">
                        Belum ada pengumuman.
                    </p>
                    @endforelse

                </div>

            </div>

        </div>

    </section>

    <!-- Prestasi + Modal Popup Modern -->
    <section id="achievements" class="w-full px-4 md:px-6 mt-8 md:mt-10">

        <div class="max-w-[1150px] mx-auto">

            <div class="flex justify-between items-center mb-4">

                <h2 class="font-bold text-xl md:text-2xl text-[#0D3B66]">
                    Prestasi Unggulan
                </h2>

                <a href="{{ route('front.academic') }}" class="text-sm font-semibold text-[#0D3B66]">
                    Lihat Semua
                </a>

            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

                @forelse($featuredAchievements as $achievement)

                <article class="bg-white rounded-2xl overflow-hidden border border-[#E8EBF4] 
cursor-pointer hover:shadow-lg hover:-translate-y-1 transition-all duration-300" onclick="openAchievementModal(
'{{ Storage::url($achievement->photo) }}',
'{{ $achievement->title }}',
'{{ $achievement->level }}',
'{{ $achievement->achievement_date?->format('d M Y') }}',
`{{ $achievement->description }}`
)">

                    @if($achievement->photo)

                    <div class="w-full h-36 md:h-40 overflow-hidden">
                        <img src="{{ Storage::url($achievement->photo) }}" class="w-full h-full object-cover" />
                    </div>

                    @endif

                    <div class="p-4 md:p-5">

                        <p class="text-xs font-semibold text-[#0D3B66] uppercase">
                            {{ $achievement->level ?? 'Prestasi' }}
                        </p>

                        <h3 class="font-bold mt-2 text-sm md:text-base">
                            {{ $achievement->title }}
                        </h3>

                        <p class="mt-2 text-xs md:text-sm text-[#6C7A89]">
                            {{ $achievement->achievement_date?->format('M d, Y') }}
                        </p>

                        <p class="mt-3 text-sm text-[#516070] line-clamp-3">
                            {{ $achievement->description }}
                        </p>

                    </div>

                </article>

                @empty

                <p class="text-[#6C7A89] text-sm">
                    Belum ada prestasi unggulan.
                </p>

                @endforelse

            </div>

        </div>



        <!-- MODAL -->
        <div id="achievementModal" class="fixed inset-0 z-50 hidden">

            <!-- Overlay -->
            <div id="modalOverlay" class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>


            <!-- Modal Box -->
            <div class="relative flex items-center justify-center min-h-screen px-4">

                <div class="bg-white rounded-2xl shadow-xl 
            w-full max-w-md md:max-w-lg 
            max-h-[85vh] overflow-hidden 
            animate-modalFade">

                    <!-- Image -->
                    <div class="relative">

                        <img id="modalImage" src="" class="w-full h-40 md:h-48 object-cover">

                        <button onclick="closeAchievementModal()" class="absolute top-3 right-3 
               w-9 h-9 rounded-full 
               bg-white shadow 
               flex items-center justify-center">

                            ✕

                        </button>

                    </div>


                    <!-- Scroll Content -->
                    <div class="p-5 overflow-y-auto max-h-[60vh]">

                        <p id="modalLevel" class="text-xs font-semibold text-[#0D3B66] uppercase">
                        </p>

                        <h3 id="modalTitle" class="font-bold text-lg md:text-xl mt-2">
                        </h3>

                        <p id="modalDate" class="text-sm text-[#6C7A89] mt-1">
                        </p>

                        <p id="modalDescription"
                            class="text-sm text-[#516070] mt-4 leading-relaxed whitespace-pre-line">
                        </p>

                    </div>

                </div>

            </div>

        </div>



        <!-- STYLE + SCRIPT -->
        <style>
        @keyframes modalFade {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-modalFade {
            animation: modalFade 0.2s ease-out;
        }
        </style>


        <script>
        function openAchievementModal(photo, title, level, date, description) {

            const modal = document.getElementById('achievementModal');

            document.getElementById('modalImage').src = photo;
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalLevel').innerText = level;
            document.getElementById('modalDate').innerText = date;
            document.getElementById('modalDescription').innerText = description;

            modal.classList.remove('hidden');

            document.body.style.overflow = 'hidden';

        }


        function closeAchievementModal() {

            const modal = document.getElementById('achievementModal');

            modal.classList.add('hidden');

            document.body.style.overflow = 'auto';

        }


        // Klik overlay untuk close
        document.getElementById('modalOverlay')
            .addEventListener('click', function() {

                closeAchievementModal();

            });


        // Tekan ESC untuk close
        document.addEventListener('keydown', function(e) {

            if (e.key === "Escape") {

                closeAchievementModal();

            }

        });
        </script>

    </section>



    <!-- Berita -->
    <section id="news" class="w-full px-4 md:px-6 mt-10 md:mt-12">

        <div class="max-w-[1150px] mx-auto">

            <h2 class="font-bold text-xl md:text-2xl text-[#0D3B66] mb-4">
                Portal Berita Sekolah
            </h2>

            <div class="grid 
            grid-cols-1 
            sm:grid-cols-2 
            md:grid-cols-3 
            gap-6">

                @forelse($articles as $article)

                <a href="{{ route('front.details', $article->slug) }}" class="rounded-[20px] 
          ring-1 ring-[#EEF0F7] 
          p-[14px] md:p-[18px] 
          flex flex-col gap-4 
          hover:ring-2 hover:ring-[#0D3B66] 
          transition bg-white">

                    <div class="w-full 
            h-[160px] md:h-[180px] 
            rounded-[16px] 
            overflow-hidden">

                        <img src="{{ Storage::url($article->thumbnail) }}" class="object-cover w-full h-full" />

                    </div>

                    <div>

                        <h3 class="font-bold 
           text-base md:text-lg 
           line-clamp-2">

                            {{ $article->name }}

                        </h3>

                        <p class="text-xs md:text-sm text-[#A3A6AE] mt-1">
                            {{ $article->created_at->format('M d, Y') }}
                        </p>

                    </div>

                </a>

                @empty
                <p class="text-[#6C7A89] text-sm">
                    Belum ada berita.
                </p>
                @endforelse

            </div>

        </div>

    </section>

    <!-- Banner Ads -->
    @if($bannerads)

    <section class="w-full px-4 md:px-6 mt-10 md:mt-[70px]">

        <div class="max-w-[1150px] mx-auto flex justify-center">

            <a href="{{ $bannerads->link }}" class="w-full">

                <div class="w-full 
            h-[90px] md:h-[120px] 
            border border-[#EEF0F7] 
            rounded-2xl 
            overflow-hidden">

                    <img src="{{ Storage::url($bannerads->thumbnail) }}" class="object-cover w-full h-full" />

                </div>

            </a>

        </div>

    </section>

    @endif

    <x-footer :school-profile="$schoolProfile" />

</body>
@endsection