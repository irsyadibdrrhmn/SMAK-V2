@extends('front.master')

@section('content')
<div class="font-[Poppins] pb-[72px] bg-[#F8FAFC]">
    <x-navbar/>

    <section class="w-full px-4 md:px-6 mt-12 mb-16">
        <div class="max-w-[1150px] mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-[#0D3B66] tracking-tight">Program Akademik</h1>
                <p class="mt-3 text-lg text-[#516070] max-w-2xl mx-auto line-clamp-2">
                    Jelajahi kurikulum unggulan dan cetak generasi berprestasi bersama SMAK Seminari Yohanes Penginjil Asmat.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($programs as $program)
                    {{-- TAMBAHKAN: cursor-pointer, onclick, dan data-* attributes --}}
                    <article 
                        class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-50 border border-[#E8EBF4] hover:border-[#0D3B66]/20 transition-all duration-300 cursor-pointer"
                        onclick="openProgramModal(this)"
                        data-name="{{ $program->name }}"
                        data-description="{{ $program->description }}"
                        data-cover="{{ $program->cover ? Storage::url($program->cover) : '' }}"
                    >
                        @if($program->cover)
                            <div class="w-full h-52 overflow-hidden relative">
                                <img src="{{ Storage::url($program->cover) }}"
                                     alt="{{ $program->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                            </div>
                        @else
                            {{-- Placeholder jika tidak ada cover --}}
                            <div class="w-full h-52 bg-gradient-to-br from-[#0D3B66] to-[#1a5a8a] flex items-center justify-center relative overflow-hidden">
                                <svg class="w-20 h-20 text-white/20 transform group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <h2 class="font-bold text-xl text-[#0D3B66] group-hover:text-blue-700 transition-colors">{{ $program->name }}</h2>
                            <p class="text-sm text-[#516070] mt-3 line-clamp-2 leading-relaxed">{{ $program->description }}</p>
                            <div class="mt-5 flex items-center text-sm font-bold text-blue-600">
                                Lihat Detail 
                                <span class="ml-1 group-hover:translate-x-1 transition-transform">→</span>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-2xl border-2 border-dashed border-[#E8EBF4]">
                        <p class="text-[#6C7A89] font-medium">Belum ada program akademik aktif saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="w-full px-4 md:px-6 mt-16 pb-16 border-t border-gray-100 bg-white pt-16">
        <div class="max-w-[1150px] mx-auto">
            <h2 class="font-bold text-2xl text-[#0D3B66] mb-6">Pencapaian Terbaru Siswa</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($achievements as $achievement)
                    <article class="bg-white rounded-2xl overflow-hidden border border-[#E8EBF4] shadow-sm hover:shadow-md transition-shadow">
                        @if($achievement->photo)
                            <div class="w-full h-44 overflow-hidden">
                                <img src="{{ Storage::url($achievement->photo) }}"
                                     alt="{{ $achievement->title }}"
                                     class="w-full h-full object-cover" />
                            </div>
                        @else
                            <div class="w-full h-44 bg-gradient-to-br from-amber-50 to-amber-100 flex items-center justify-center">
                                <svg class="w-16 h-16 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="p-6">
                            @if($achievement->level)
                                <span class="text-xs font-bold text-[#0D3B66] uppercase bg-blue-50 px-3 py-1.5 rounded-full tracking-wider">{{ $achievement->level }}</span>
                            @endif
                            <h3 class="font-bold text-lg mt-3 text-slate-800">{{ $achievement->title }}</h3>
                            <p class="text-sm text-[#6C7A89] mt-2 flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $achievement->achievement_date?->format('M d, Y') }}
                            </p>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-12 text-center bg-gray-50 rounded-xl border border-gray-100">
                        <p class="text-[#6C7A89]">Belum ada data pencapaian siswa.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <x-footer />
</div>

{{-- TAMBAHKAN: Struktur Modal di bawah ini --}}
<div id="programModal" class="fixed inset-0 z-[9999] hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        
        <div id="modalBackdrop" class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-70 backdrop-blur-sm opacity-0 duration-300 ease-out" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div id="modalPanel" class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-3xl shadow-2xl sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full opacity-0 translate-y-4 scale-95 duration-300 ease-out">
            
            <button onclick="closeProgramModal()" class="absolute top-5 right-5 z-10 p-2 text-gray-400 bg-white/80 rounded-full backdrop-blur-sm hover:text-gray-600 hover:bg-gray-100 transition-all focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L16 6M6 6l12 12"></path></svg>
            </button>

            <div class="bg-white">
                <div id="modalCoverContainer" class="w-full h-64 overflow-hidden relative hidden">
                    <img id="modalCover" src="" alt="Program Cover" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-white via-white/20 to-transparent"></div>
                </div>

                <div id="modalPlaceholder" class="w-full h-64 bg-gradient-to-br from-[#0D3B66] to-[#1a5a8a] flex items-center justify-center hidden relative overflow-hidden">
                     <svg class="w-24 h-24 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                </div>

                <div class="p-8 sm:p-10 -mt-12 relative z-10 bg-white rounded-t-[3rem]">
                    <h3 id="modalName" class="text-3xl font-extrabold leading-tight text-[#0D3B66] tracking-tight">
                        </h3>
                    <div class="mt-6 prose prose-blue max-w-none text-[#516070] leading-relaxed">
                        <p id="modalDescription">
                            </p>
                    </div>
                </div>
            </div>

            <div class="px-8 pb-8 sm:px-10 sm:pb-10 bg-white text-right">
                <button onclick="closeProgramModal()" class="inline-flex justify-center px-6 py-3 text-sm font-bold text-white bg-[#0D3B66] border border-transparent rounded-full shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    Tutup Detail
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- TAMBAHKAN: Script JavaScript di bawah ini --}}
@push('after-scripts')
<script>
    const modal = document.getElementById('programModal');
    const backdrop = document.getElementById('modalBackdrop');
    const panel = document.getElementById('modalPanel');
    const body = document.body;

    // Elements inside modal to update
    const modalName = document.getElementById('modalName');
    const modalDescription = document.getElementById('modalDescription');
    const modalCover = document.getElementById('modalCover');
    const modalCoverContainer = document.getElementById('modalCoverContainer');
    const modalPlaceholder = document.getElementById('modalPlaceholder');

    function openProgramModal(element) {
        // 1. Get data from clicked element
        const name = element.getAttribute('data-name');
        const description = element.getAttribute('data-description');
        const coverSrc = element.getAttribute('data-cover');

        // 2. Update modal content
        modalName.textContent = name;
        modalDescription.textContent = description;

        if (coverSrc) {
            modalCover.src = coverSrc;
            modalCover.alt = name;
            modalCoverContainer.classList.remove('hidden');
            modalPlaceholder.classList.add('hidden');
        } else {
            modalCoverContainer.classList.add('hidden');
            modalPlaceholder.classList.remove('hidden');
        }

        // 3. Show modal & prevent scrolling on body
        modal.classList.remove('hidden');
        body.classList.add('overflow-hidden'); // Prevent scrolling body

        // 4. Trigger Animations (force reflow)
        requestAnimationFrame(() => {
            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');
            
            panel.classList.remove('opacity-0', 'translate-y-4', 'scale-95');
            panel.classList.add('opacity-100', 'translate-y-0', 'scale-100');
        });
    }

    function closeProgramModal() {
        // 1. Trigger Hide Animations
        backdrop.classList.remove('opacity-100');
        backdrop.classList.add('opacity-0');
        
        panel.classList.remove('opacity-100', 'translate-y-0', 'scale-100');
        panel.classList.add('opacity-0', 'translate-y-4', 'scale-95');

        // 2. Hide modal container after animation finishes
        setTimeout(() => {
            modal.classList.add('hidden');
            body.classList.remove('overflow-hidden'); // Allow scrolling again
            
            // Optional: Reset content to prevent "flash" of old content next open
            modalCover.src = '';
        }, 300); // Match this with duration-300 class
    }

    // Close modal if user clicks on the backdrop
    backdrop.addEventListener('click', closeProgramModal);

    // Close modal if user presses ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeProgramModal();
        }
    });
</script>
@endpush