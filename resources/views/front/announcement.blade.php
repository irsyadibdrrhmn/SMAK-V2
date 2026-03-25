@extends('front.master')
@section('content')

<body class="font-[Poppins]">
    <x-navbar/>
    <header class="w-full px-4 lg:px-6 mt-[70px]">
        <div id="Headline" class="w-full max-w-[1150px] mx-auto flex flex-col gap-4 items-center">
            <p class="w-fit text-[#A3A6AE]">{{ $announcement->publish_at?->format('M d, Y') ?? 'Published' }}</p>
            <h1 id="Title" class="font-bold text-[46px] leading-[60px] text-center two-lines">
                {{ $announcement->title }}
            </h1>
        </div>

        @if($announcement->thumbnail)
            <div class="w-full max-w-[1150px] mx-auto h-[400px] mt-6 flex shrink-0 overflow-hidden rounded-2xl">
                <img src="{{ Storage::url($announcement->thumbnail) }}"
                     class="object-cover w-full h-full"
                     alt="{{ $announcement->title }}" />
            </div>
        @endif
    </header>

    <section id="Article-container" class="w-full px-4 lg:px-6 mt-[50px]">
        <div class="max-w-[1180px] mx-auto flex flex-col lg:flex-row gap-8 lg:gap-12">
            <article id="Content-wrapper" class="flex-1">
                <div class="article-content text-gray-700 leading-relaxed">
                    {!! $announcement->content !!}
                </div>
            </article>
            <div class="side-bar flex flex-col w-full lg:w-[300px] gap-6">
                <div class="recent-announcements bg-white rounded-lg p-6 border border-[#E8EBF4]">
                    <h3 class="font-bold text-lg mb-4 text-[#0D3B66]">Recent Announcements</h3>
                    @forelse($announcements as $recent)
                        <a href="{{ route('front.announcement', $recent->slug) }}"
                           class="group block mb-4 pb-4 border-b border-[#E8EBF4] last:border-b-0 last:pb-0 last:mb-0">
                            @if($recent->thumbnail)
                                <div class="w-full h-24 rounded-lg overflow-hidden mb-2">
                                    <img src="{{ Storage::url($recent->thumbnail) }}"
                                         alt="{{ $recent->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                                </div>
                            @endif
                            <p class="text-[#0D3B66] hover:text-[#1e5a8a] font-medium text-sm">{{ $recent->title }}</p>
                            <p class="text-xs text-[#6C7A89] mt-1">{{ $recent->publish_at?->format('M d, Y') }}</p>
                        </a>
                    @empty
                        <p class="text-[#6C7A89]">No other announcements.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <x-footer />
</body>

@push('after-styles')
    <style>
        .article-content {
            font-size: 1.125rem;
            line-height: 1.75;
            color: #374151;
        }


        .article-content * {
            max-width: 100%;
        }

        .article-content > * {
            max-width: 100% !important;
            position: static !important;
            left: auto !important;
            right: auto !important;
            inset: auto !important;
            transform: none !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        .article-content p,
        .article-content li {
            text-align: left;
        }

        .article-content p:empty {
            display: none;
        }
        .article-content h1, .article-content h2, .article-content h3,
        .article-content h4, .article-content h5, .article-content h6 {
            color: #0D3B66; font-weight: 700; margin-top: 2em; margin-bottom: 1em;
        }
        .article-content h1 { font-size: 2.25em; line-height: 2.5rem; }
        .article-content h2 { font-size: 1.875em; line-height: 2.25rem; }
        .article-content h3 { font-size: 1.5em; line-height: 2rem; }
        .article-content h4 { font-size: 1.25em; line-height: 1.75rem; }
        .article-content p { margin-bottom: 1.5em; }
        .article-content ul, .article-content ol { margin-bottom: 1.5em; padding-left: 1.5em; }
        .article-content li { margin-bottom: 0.5em; }
        .article-content img { max-width: 100%; height: auto; border-radius: 0.5rem; margin: 2em 0; display: block; }
        .article-content blockquote {
            border-left: 4px solid #0D3B66; padding: 1em; margin: 2em 0;
            font-style: italic; color: #6B7280; background-color: #F9FAFB; border-radius: 0.375rem;
        }
        .article-content a { color: #0D3B66; text-decoration: underline; }
        .article-content a:hover { color: #1e5a8a; }
        .article-content strong, .article-content b { font-weight: 600; color: #0D3B66; }
        .article-content em, .article-content i { font-style: italic; }
        @media (max-width: 768px) {
            .article-content { font-size: 1rem; }
        }
    </style>
@endpush