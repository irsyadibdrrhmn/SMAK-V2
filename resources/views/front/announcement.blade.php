@extends('front.master')
@section('content')

<body class="font-[Poppins] bg-[#F8FAFC]">

    <x-navbar />

    <!-- HEADER -->
    <header class="w-full px-4 lg:px-6 mt-6 md:mt-[70px]">

        <div class="w-full max-w-[900px] mx-auto text-center">

            <!-- Date -->
            <p class="text-xs md:text-sm text-[#6C7A89]">

                {{ $announcement->publish_at?->format('M d, Y') ?? 'Dipublikasikan' }}

            </p>

            <!-- Title -->
            <h1 class="font-bold 
text-2xl 
sm:text-3xl 
md:text-[42px] 
leading-snug 
md:leading-[55px] 
mt-2 
text-[#0D3B66]">

                {{ $announcement->title }}

            </h1>

        </div>


        @if($announcement->thumbnail)

        <div class="w-full 
max-w-[1000px] 
mx-auto 
h-[220px] 
sm:h-[300px] 
md:h-[400px] 
mt-5 
overflow-hidden 
rounded-xl md:rounded-2xl shadow-sm">

            <img src="{{ Storage::url($announcement->thumbnail) }}" class="object-cover w-full h-full"
                alt="{{ $announcement->title }}" />

        </div>

        @endif

    </header>



    <!-- CONTENT -->
    <section class="w-full px-4 lg:px-6 mt-8 md:mt-[50px]">

        <div class="max-w-[1180px] mx-auto 
flex flex-col 
lg:flex-row 
gap-8 lg:gap-12">


            <!-- ARTICLE -->
            <article class="flex-1">

                <div class="article-content 
bg-white 
p-5 md:p-8 
rounded-xl 
md:rounded-2xl 
border border-[#E8EBF4] 
shadow-sm">

                    {!! $announcement->content !!}

                </div>

            </article>



            <!-- SIDEBAR -->
            <div class="w-full lg:w-[300px]">

                <div class="bg-white 
rounded-xl 
p-5 md:p-6 
border border-[#E8EBF4] 
shadow-sm">

                    <h3 class="font-bold 
text-base md:text-lg 
mb-4 
text-[#0D3B66]">

                        Pengumuman Terbaru

                    </h3>

                    @forelse($announcements as $recent)

                    <a href="{{ route('front.announcement', $recent->slug) }}"
                        class="group block mb-4 pb-4 border-b border-[#E8EBF4] last:border-b-0">

                        @if($recent->thumbnail)

                        <div class="w-full 
h-20 
md:h-24 
rounded-lg 
overflow-hidden 
mb-2">

                            <img src="{{ Storage::url($recent->thumbnail) }}" alt="{{ $recent->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-300" />

                        </div>

                        @endif

                        <p class="text-sm 
font-medium 
text-[#0D3B66] 
group-hover:text-[#1e5a8a] 
line-clamp-2">

                            {{ $recent->title }}

                        </p>

                        <p class="text-xs text-[#6C7A89] mt-1">

                            {{ $recent->publish_at?->format('M d, Y') }}

                        </p>

                    </a>

                    @empty

                    <p class="text-[#6C7A89] text-sm">
                        Tidak ada pengumuman lainnya.
                    </p>

                    @endforelse

                </div>

            </div>

        </div>

    </section>

   <x-footer :school-profile="$schoolProfile" />

</body>



@push('after-styles')

<style>
/* ARTICLE TYPOGRAPHY */

.article-content {
    font-size: 1rem;
    line-height: 1.8;
    color: #374151;
}

@media (min-width: 768px) {

    .article-content {
        font-size: 1.125rem;
    }

}

.article-content h1,
.article-content h2,
.article-content h3,
.article-content h4 {

    color: #0D3B66;
    font-weight: 700;
    margin-top: 2em;
    margin-bottom: 1em;

}

.article-content h1 {
    font-size: 1.8em;
}

.article-content h2 {
    font-size: 1.5em;
}

.article-content h3 {
    font-size: 1.3em;
}

.article-content p {
    margin-bottom: 1.4em;
}

.article-content ul,
.article-content ol {

    margin-bottom: 1.4em;
    padding-left: 1.5em;

}

.article-content img {

    max-width: 100%;
    height: auto;
    border-radius: 12px;
    margin: 1.5em 0;

}

.article-content blockquote {

    border-left: 4px solid #0D3B66;
    padding: 1em;
    margin: 1.5em 0;
    font-style: italic;
    background: #F9FAFB;
    border-radius: 8px;

}


/* MOBILE IMPROVEMENT */

@media (max-width: 640px) {

    .article-content {

        font-size: 0.95rem;
        line-height: 1.75;

    }

}
</style>

@endpush