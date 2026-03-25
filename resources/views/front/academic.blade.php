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
                <article class="bg-white rounded-2xl p-5 border border-[#E8EBF4]">
                    <h2 class="font-bold text-lg">{{ $program->name }}</h2>
                    <p class="text-sm text-[#516070] mt-3">{{ $program->description }}</p>
                </article>
            @empty
                <p class="text-[#6C7A89]">No active programs yet.</p>
            @endforelse
        </div>
    </section>

    <section class="w-full px-4 md:px-6 mt-10">
        <div class="max-w-[1150px] mx-auto">
            <h2 class="font-bold text-2xl text-[#0D3B66] mb-4">Latest Achievements</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @forelse($achievements as $achievement)
                <article class="bg-white rounded-2xl p-5 border border-[#E8EBF4]">
                    <h3 class="font-bold">{{ $achievement->title }}</h3>
                    <p class="text-sm text-[#6C7A89]">{{ $achievement->achievement_date?->format('M d, Y') }}</p>
                </article>
            @empty
                <p class="text-[#6C7A89]">No achievements yet.</p>
            @endforelse
        </div>
    </section>

        </div>
    </section>

    <x-footer />
</body>
@endsection
