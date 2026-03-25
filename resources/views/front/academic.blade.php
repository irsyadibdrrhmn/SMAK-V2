@extends('front.master')
@section('content')
<body class="font-[Poppins] pb-[72px] bg-[#F8FAFC]">
    <x-navbar/>

    <section class="w-full px-4 md:px-6 mt-8">
        <div class="max-w-[1150px] mx-auto">
            <h1 class="text-3xl font-bold text-[#0D3B66]">Academic Programs</h1>
            <p class="mt-2 text-[#516070]">Explore curriculum and featured student achievements.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-6">
                @forelse($programs as $program)
                    <article class="bg-white rounded-2xl overflow-hidden border border-[#E8EBF4] hover:border-[#0D3B66] transition-colors">
                        @if($program->cover)
                            <div class="w-full h-44 overflow-hidden">
                                <img src="{{ Storage::url($program->cover) }}"
                                     alt="{{ $program->name }}"
                                     class="w-full h-full object-cover" />
                            </div>
                        @else
                            <div class="w-full h-44 bg-gradient-to-br from-[#0D3B66] to-[#1a5a8a] flex items-center justify-center">
                                <svg class="w-16 h-16 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="p-5">
                            <h2 class="font-bold text-lg text-[#0D3B66]">{{ $program->name }}</h2>
                            <p class="text-sm text-[#516070] mt-2 line-clamp-3">{{ $program->description }}</p>
                        </div>
                    </article>
                @empty
                    <p class="text-[#6C7A89]">No active programs yet.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="w-full px-4 md:px-6 mt-10">
        <div class="max-w-[1150px] mx-auto">
            <h2 class="font-bold text-2xl text-[#0D3B66] mb-4">Latest Achievements</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @forelse($achievements as $achievement)
                    <article class="bg-white rounded-2xl overflow-hidden border border-[#E8EBF4]">
                        @if($achievement->photo)
                            <div class="w-full h-40 overflow-hidden">
                                <img src="{{ Storage::url($achievement->photo) }}"
                                     alt="{{ $achievement->title }}"
                                     class="w-full h-full object-cover" />
                            </div>
                        @else
                            <div class="w-full h-40 bg-gradient-to-br from-amber-50 to-amber-100 flex items-center justify-center">
                                <svg class="w-12 h-12 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="p-5">
                            @if($achievement->level)
                                <span class="text-xs font-semibold text-[#0D3B66] uppercase bg-blue-50 px-2 py-1 rounded-full">{{ $achievement->level }}</span>
                            @endif
                            <h3 class="font-bold mt-2">{{ $achievement->title }}</h3>
                            <p class="text-sm text-[#6C7A89] mt-1">{{ $achievement->achievement_date?->format('M d, Y') }}</p>
                        </div>
                    </article>
                @empty
                    <p class="text-[#6C7A89]">No achievements yet.</p>
                @endforelse
            </div>
        </div>
    </section>

    <x-footer />
</body>
@endsection