@extends('front.master')
@section('content')
<body class="font-[Poppins] pb-[72px] bg-[#F8FAFC]">
    <x-navbar/>

    <section class="w-full px-4 md:px-6 mt-8">
        <div class="max-w-[1150px] mx-auto grid md:grid-cols-2 gap-8">
            <article class="bg-white rounded-2xl p-8 border border-[#E8EBF4]">
            <h1 class="text-3xl font-bold text-[#0D3B66]">Contact Us</h1>
            <p class="mt-3 text-[#516070]">{{ $schoolProfile?->school_name ?? 'SMAK Seminari Yohanes' }}</p>
            <p class="mt-4 text-[#516070]">{{ $schoolProfile?->address ?? 'Update address from admin panel.' }}</p>
            <p class="mt-2 text-[#516070]">Phone: {{ $schoolProfile?->phone ?? '-' }}</p>
            <p class="mt-2 text-[#516070]">Email: {{ $schoolProfile?->email ?? '-' }}</p>
        </article>

        <article class="bg-white rounded-2xl p-8 border border-[#E8EBF4]">
            <h2 class="font-bold text-xl text-[#0D3B66]">Map</h2>
            @if($schoolProfile?->maps_embed)
                <div class="mt-4 aspect-video rounded-xl overflow-hidden">{!! $schoolProfile->maps_embed !!}</div>
            @else
                <p class="mt-4 text-[#6C7A89]">Add maps embed code in school profile admin page.</p>
            @endif
        </article>
    </section>

        </div>
    </section>

    <x-footer :school-profile="$schoolProfile" />
</body>
@endsection
