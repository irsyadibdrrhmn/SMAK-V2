@extends('front.master')

@section('content')

<x-navbar />

<section class="w-full px-4 md:px-6 mt-8">

    <div class="max-w-[1150px] mx-auto">

        <!-- Judul -->
        <h1 class="text-2xl md:text-3xl font-bold text-[#0D3B66]">
            Galeri
        </h1>

        <p class="mt-2 text-sm md:text-base text-[#516070]">
            Dokumentasi kegiatan dan acara sekolah.
        </p>



        <!-- GRID FOTO -->
        <div class="grid 
grid-cols-1 
sm:grid-cols-2 
md:grid-cols-3 
lg:grid-cols-4 
gap-4 
mt-6">

            @forelse($photos as $photo)

            <article class="bg-white 
rounded-2xl 
p-3 
border border-[#E8EBF4] 
hover:border-[#0D3B66] 
hover:shadow-md 
transition-all 
cursor-pointer" onclick="openGalleryModal(
'{{ Storage::url($photo->photo) }}',
'{{ $photo->title }}',
'{{ $photo->event_date?->format('d M Y') }}'
)">

                <div class="w-full h-44 rounded-xl overflow-hidden">

                    <img src="{{ Storage::url($photo->photo) }}"
                        class="w-full h-full object-cover hover:scale-105 transition duration-300"
                        alt="{{ $photo->title }}" />

                </div>

                <h2 class="font-semibold mt-3 text-sm md:text-base line-clamp-2">

                    {{ $photo->title }}

                </h2>

                <p class="text-xs text-[#6C7A89]">

                    {{ $photo->event_date?->format('M d, Y') }}

                </p>

            </article>

            @empty

            <p class="text-[#6C7A89] text-sm">
                Belum ada foto galeri yang dipublikasikan.
            </p>

            @endforelse

        </div>



        <!-- Pagination -->
        <div class="mt-6">

            {{ $photos->links() }}

        </div>

    </div>



    <!-- MODAL POPUP -->
    <div id="galleryModal" class="fixed inset-0 z-50 hidden">

        <!-- Overlay -->
        <div id="galleryOverlay" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>



        <!-- Modal Box -->
        <div class="relative flex items-center justify-center min-h-screen px-4">

            <div class="bg-white 
rounded-2xl 
shadow-xl 
w-full 
max-w-3xl 
max-h-[90vh] 
overflow-hidden 
animate-galleryFade">

                <!-- Close Button -->
                <button onclick="closeGalleryModal()" class="absolute top-3 right-3 
w-10 h-10 
rounded-full 
bg-white shadow 
flex items-center justify-center 
z-10">

                    ✕

                </button>



                <!-- Image -->
                <div class="bg-black">

                    <img id="galleryImage" src="" class="w-full max-h-[60vh] object-contain">

                </div>



                <!-- Info -->
                <div class="p-5 overflow-y-auto max-h-[30vh]">

                    <h3 id="galleryTitle" class="font-bold text-lg text-[#0D3B66]">
                    </h3>

                    <p id="galleryDate" class="text-sm text-[#6C7A89] mt-1">
                    </p>

                </div>

            </div>

        </div>

    </div>



    <!-- STYLE -->
    <style>
    @keyframes galleryFade {

        from {
            opacity: 0;
            transform: scale(0.95);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }

    }

    .animate-galleryFade {
        animation: galleryFade 0.2s ease-out;
    }
    </style>



    <!-- SCRIPT -->
    <script>
    function openGalleryModal(photo, title, date) {

        const modal = document.getElementById('galleryModal');

        document.getElementById('galleryImage').src = photo;
        document.getElementById('galleryTitle').innerText = title;
        document.getElementById('galleryDate').innerText = date;

        modal.classList.remove('hidden');

        document.body.style.overflow = 'hidden';

    }



    function closeGalleryModal() {

        const modal = document.getElementById('galleryModal');

        modal.classList.add('hidden');

        document.body.style.overflow = 'auto';

    }



    // Klik overlay → close
    document.getElementById('galleryOverlay')
        .addEventListener('click', function() {

            closeGalleryModal();

        });



    // ESC → close
    document.addEventListener('keydown', function(e) {

        if (e.key === "Escape") {

            closeGalleryModal();

        }

    });
    </script>

    <x-footer />

    @endsection