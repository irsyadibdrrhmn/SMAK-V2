@extends('front.master')
@section('content')
<body class="font-[Poppins] pb-[72px] bg-[#F8FAFC]">
    <x-navbar/>

    <section class="max-w-[1130px] mx-auto mt-8">
        <div class="bg-[#0D3B66] rounded-3xl p-10 text-white">
            <p class="text-sm uppercase tracking-wider">Welcome to</p>
            <h1 class="text-4xl font-bold mt-2">{{ $schoolProfile?->school_name ?? 'SMAK Seminari Yohanes' }}</h1>
            <p class="mt-3 text-white/90 max-w-2xl">{{ $schoolProfile?->tagline ?? 'A school website with integrated news portal for students, parents, and community.' }}</p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('front.profile') }}" class="rounded-full bg-white text-[#0D3B66] px-5 py-2 font-semibold">School Profile</a>
                <a href="{{ route('front.academic') }}" class="rounded-full border border-white px-5 py-2 font-semibold">Academic Programs</a>
            </div>
        </div>
    </section>

    <section class="max-w-[1130px] mx-auto mt-10 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded-2xl p-6 border border-[#E8EBF4]">
            <h2 class="font-bold text-2xl text-[#0D3B66]">Principal's Greeting</h2>
            <p class="mt-3 text-[#516070] leading-relaxed">
                {{ $schoolProfile?->history ?? 'Please update school profile content in Filament admin: history, vision, mission, and principal message.' }}
            </p>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-[#E8EBF4]">
            <h2 class="font-bold text-xl text-[#0D3B66]">Latest Announcements</h2>
            <div class="mt-4 space-y-3">
                @forelse($announcements as $announcement)
                    <div class="border border-[#E8EBF4] rounded-xl p-3">
                        <p class="font-semibold">{{ $announcement->title }}</p>
                        <p class="text-xs text-[#6C7A89]">{{ optional($announcement->publish_at)->format('M d, Y H:i') ?? 'Draft Date' }}</p>
                    </div>
                @empty
                    <p class="text-[#6C7A89]">No announcements yet.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="max-w-[1130px] mx-auto mt-10">
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-bold text-2xl text-[#0D3B66]">Featured Achievements</h2>
            <a href="{{ route('front.academic') }}" class="text-sm font-semibold text-[#0D3B66]">View all</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @forelse($featuredAchievements as $achievement)
                <article class="bg-white rounded-2xl p-5 border border-[#E8EBF4]">
                    <p class="text-xs font-semibold text-[#0D3B66] uppercase">{{ $achievement->level ?? 'Achievement' }}</p>
                    <h3 class="font-bold mt-2">{{ $achievement->title }}</h3>
                    <p class="mt-2 text-sm text-[#6C7A89]">{{ $achievement->achievement_date?->format('M d, Y') }}</p>
                    <p class="mt-3 text-sm text-[#516070] line-clamp-3">{{ $achievement->description }}</p>
                </article>
            @empty
                <p class="text-[#6C7A89]">No featured achievements yet.</p>
            @endforelse
        </div>
    </section>

    <section class="max-w-[1130px] mx-auto mt-12">
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-bold text-2xl text-[#0D3B66]">School News Portal</h2>
        </div>

        <nav class="flex flex-wrap items-center gap-3 mb-6">
            @foreach($categories as $category)
                <a href="{{ route('front.category', $category->slug) }}" class="rounded-full p-[10px_18px] flex gap-[8px] text-sm font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0D3B66] bg-white">
                    @if($category->icon)
                        <div class="w-5 h-5 flex shrink-0">
                            <img src="{{ Storage::url($category->icon) }}" alt="icon" class="w-full h-full object-contain" />
                        </div>
                    @endif
                    <span>{{ $category->name }}</span>
                </a>
            @endforeach
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($articles as $article)
                <a href="{{ route('front.details', $article->slug) }}" class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[18px] flex flex-col gap-4 hover:ring-2 hover:ring-[#0D3B66] transition-all duration-300 bg-white">
                    <div class="thumbnail-container w-full h-[180px] rounded-[16px] flex shrink-0 overflow-hidden relative">
                        <p class="absolute top-3 left-3 rounded-full p-[6px_12px] bg-white font-bold text-xs">{{ $article->category->name }}</p>
                        <img src="{{ Storage::url($article->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnail" />
                    </div>
                    <div class="card-info flex flex-col gap-[6px]">
                        <h3 class="font-bold text-lg leading-[27px] line-clamp-2">{{ $article->name }}</h3>
                        <p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $article->created_at->format('M d, Y') }}</p>
                    </div>
                </a>
            @empty
                <p class="text-[#6C7A89]">No news available.</p>
            @endforelse
        </div>
    </section>

    @if($bannerads)
    <section class="max-w-[1130px] mx-auto flex justify-center mt-[70px]">
        <div class="flex flex-col gap-3 shrink-0 w-fit">
            <a href="{{ $bannerads->link }}">
                <div class="w-[900px] max-w-full h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
                    <img src="{{ Storage::url($bannerads->thumbnail) }}" class="object-cover w-full h-full" alt="ads" />
                </div>
            </a>
        </div>
    </section>
    @endif

    <x-footer :school-profile="$schoolProfile" />
</body>
@endsection
