@extends('front.master')
@section('content')
<body class="font-[Poppins] pb-[72px] bg-[#F8FAFC]">
    <x-navbar/>

    <section class="w-full px-4 md:px-6 mt-8">
        <div class="max-w-[1150px] mx-auto">
            <h1 class="text-3xl font-bold text-[#0D3B66]">Gallery</h1>
        <p class="mt-2 text-[#516070]">School activities and events documentation.</p>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
            @forelse($photos as $photo)
                <article class="bg-white rounded-2xl p-3 border border-[#E8EBF4] hover:border-[#0D3B66] transition-colors cursor-pointer">
                    <a href="{{ Storage::url($photo->photo) }}" target="_blank" class="block">
                        <div class="w-full h-44 rounded-xl overflow-hidden">
                            <img src="{{ Storage::url($photo->photo) }}" class="w-full h-full object-cover" alt="{{ $photo->title }}" />
                        </div>
                        <h2 class="font-semibold mt-3">{{ $photo->title }}</h2>
                        <p class="text-xs text-[#6C7A89]">{{ $photo->event_date?->format('M d, Y') }}</p>
                    </a>
                </article>
            @empty
                <p class="text-[#6C7A89]">No published gallery photos yet.</p>
            @endforelse
        </div>

        <div class="mt-6">{{ $photos->links() }}</div>
        </div>
    </section>

    <x-footer />
</body>
@endsection
