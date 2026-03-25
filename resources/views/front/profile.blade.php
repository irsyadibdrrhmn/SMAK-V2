@extends('front.master')
@section('content')
<body class="font-[Poppins] pb-[72px] bg-[#F8FAFC]">
    <x-navbar/>

    <section class="max-w-[1130px] mx-auto mt-8 bg-white border border-[#E8EBF4] rounded-2xl p-8">
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
    </section>

    <section class="max-w-[1130px] mx-auto mt-10">
        <h2 class="font-bold text-2xl text-[#0D3B66] mb-4">School Achievements</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @forelse($achievements as $achievement)
            <article class="bg-white rounded-2xl p-5 border border-[#E8EBF4]">
                <p class="text-xs font-semibold text-[#0D3B66] uppercase">{{ $achievement->level ?? 'Achievement' }}</p>
                <h3 class="font-bold mt-2">{{ $achievement->title }}</h3>
                <p class="mt-2 text-sm text-[#6C7A89]">{{ $achievement->achievement_date?->format('M d, Y') }}</p>
                <p class="mt-3 text-sm text-[#516070] line-clamp-3">{{ $achievement->description }}</p>
            </article>
            @empty
            <p class="text-[#6C7A89]">No achievements yet.</p>
            @endforelse
        </div>

        <div class="mt-6">{{ $achievements->links() }}</div>
    </section>

    <x-footer :school-profile="$schoolProfile" />
</body>
@endsection
