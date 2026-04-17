@props(['slides' => []])

<div class="relative w-full h-[500px] md:h-[600px] bg-gray-800 overflow-hidden rounded-2xl group">
    <!-- Slides Container -->
    <div class="slider-container relative w-full h-full">
        @forelse($slides as $index => $slide)
            <div class="slider-slide absolute inset-0 transition-opacity duration-500 ease-in-out opacity-0"
                 data-slide-index="{{ $index }}">
                <img src="{{ Storage::url($slide->thumbnail) }}" 
                     alt="{{ $slide->title ?? $slide->name ?? 'Slide ' . ($index + 1) }}"
                     class="w-full h-full object-cover">
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/40"></div>
                
                <!-- Content -->
                <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white px-4 md:px-8">
                    @php
                        $slideDescription = $slide->description
                            ?? (\Illuminate\Support\Str::limit(strip_tags($slide->content ?? ''), 140) ?: 'Unggul dalam akademik, berkarakter Injili, toleran dan kreatif');
                    @endphp
                    <h2 class="text-3xl md:text-5xl font-bold mb-3 drop-shadow-lg">
                        {{ $slide->title ?? $slide->name ?? 'Selamat Datang di SMAK Seminari Yohanes' }}
                    </h2>
                    <p class="text-lg md:text-xl mb-6 max-w-2xl drop-shadow-lg">
                        {{ $slideDescription }}
                    </p>
                    @if($slide->link || $slide->slug)
                        <a href="{{ $slide->link ?? route('front.details', $slide->slug) }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg transition-colors duration-300 drop-shadow-lg">
                            {{ $slide->link ? 'Tentang Sekolah' : 'Baca Selengkapnya' }}
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="absolute inset-0 bg-gradient-to-r from-[#0D3B66] to-[#1a5a8a] flex items-center justify-center">
                <p class="text-white text-2xl">Tidak ada slide tersedia</p>
            </div>
        @endforelse
    </div>

    @if(count($slides) > 1)
        <!-- Navigation Arrows -->
        <button class="slider-prev absolute left-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/60 text-white p-3 rounded-full transition-all duration-300 z-10"
                aria-label="Slide sebelumnya">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <button class="slider-next absolute right-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/60 text-white p-3 rounded-full transition-all duration-300 z-10"
                aria-label="Slide berikutnya">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Dots Navigation -->
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-3 z-10">
            @foreach($slides as $index => $slide)
                <button class="slider-dot w-3 h-3 rounded-full transition-all duration-300 bg-white/50 hover:bg-white"
                        data-slide-index="{{ $index }}"
                        aria-label="Ke slide {{ $index + 1 }}"
                        @if($index === 0) class="slider-dot w-3 h-3 rounded-full transition-all duration-300 bg-white" @endif>
                </button>
            @endforeach
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sliderContainer = document.querySelector('.slider-container');
        if (!sliderContainer) return;

        const slides = sliderContainer.querySelectorAll('.slider-slide');
        const dots = document.querySelectorAll('.slider-dot');
        const prevBtn = document.querySelector('.slider-prev');
        const nextBtn = document.querySelector('.slider-next');

        if (slides.length === 0) return;

        let currentSlide = 0;
        let autoSlideTimer;

        function showSlide(n) {
            slides.forEach((slide, index) => {
                slide.classList.toggle('opacity-0', index !== n);
                slide.classList.toggle('opacity-100', index === n);
            });

            dots.forEach((dot, index) => {
                if (index === n) {
                    dot.classList.remove('bg-white/50');
                    dot.classList.add('bg-white');
                } else {
                    dot.classList.add('bg-white/50');
                    dot.classList.remove('bg-white');
                }
            });

            currentSlide = n;
        }

        function nextSlide() {
            showSlide((currentSlide + 1) % slides.length);
            resetAutoSlide();
        }

        function prevSlide() {
            showSlide((currentSlide - 1 + slides.length) % slides.length);
            resetAutoSlide();
        }

        function resetAutoSlide() {
            clearInterval(autoSlideTimer);
            startAutoSlide();
        }

        function startAutoSlide() {
            autoSlideTimer = setInterval(() => {
                showSlide((currentSlide + 1) % slides.length);
            }, 5000);
        }

        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
                resetAutoSlide();
            });
        });

        showSlide(0);
        startAutoSlide();

        sliderContainer.addEventListener('mouseenter', () => clearInterval(autoSlideTimer));
        sliderContainer.addEventListener('mouseleave', startAutoSlide);
    });
</script>

<style>
    .slider-slide {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
</style>