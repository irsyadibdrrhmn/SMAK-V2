@extends('front.master')
@section('content')
<body class="font-[Poppins] pb-[72px] bg-[#F8FAFC]">
    <x-navbar/>

    <section class="w-full px-4 md:px-6 mt-8">
        <div class="max-w-[1150px] mx-auto bg-white border border-[#E8EBF4] rounded-2xl p-8">
            <h1 class="text-3xl font-bold text-[#0D3B66]">School Profile</h1>
            <p class="mt-3 text-[#516070]">{{ $schoolProfile?->tagline ?? 'Please complete school profile data from admin panel.' }}</p>

            <div class="grid md:grid-cols-2 gap-6 mt-8">
                <div>
                    <h2 class="font-bold text-xl text-[#0D3B66]">History</h2>
                    <p class="mt-2 text-[#516070] leading-relaxed">{{ $schoolProfile?->history ?? '-' }}</p>
                </div>
                <div>
                    <h2 class="font-bold text-xl text-[#0D3B66]">Vision</h2>
                    <p class="mt-2 text-[#516070] leading-relaxed">{{ $schoolProfile?->vision ?? '-' }}</p>

                    <h2 class="font-bold text-xl text-[#0D3B66] mt-6">Mission</h2>
                    <p class="mt-2 text-[#516070] leading-relaxed">{{ $schoolProfile?->mission ?? '-' }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full px-4 md:px-6 mt-10">
        <div class="max-w-[1150px] mx-auto">
            <h2 class="font-bold text-2xl text-[#0D3B66] mb-4">School Achievements</h2>
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
                            <p class="mt-2 text-sm text-[#6C7A89]">{{ $achievement->achievement_date?->format('M d, Y') }}</p>
                            <p class="mt-3 text-sm text-[#516070] line-clamp-3">{{ $achievement->description }}</p>
                        </div>
                    </article>
                @empty
                    <p class="text-[#6C7A89]">No achievements yet.</p>
                @endforelse
            </div>

            <div class="mt-6">{{ $achievements->links() }}</div>
        </div>
    </section>

    <x-footer :school-profile="$schoolProfile" />
</body>
@endsection