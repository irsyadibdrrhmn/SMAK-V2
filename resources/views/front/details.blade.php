@extends('front.master')
@section('content')

<body class="font-[Poppins]">
	<x-navbar/>
	<header class="w-full px-4 lg:px-6 mt-[70px]">
		<div id="Headline" class="w-full max-w-[1150px] mx-auto flex flex-col gap-4 items-center">
			<p class="w-fit text-[#A3A6AE]">{{$articleNews->created_at->format('M d, Y')}}</p>
			<h1 id="Title" class="font-bold text-[46px] leading-[60px] text-center two-lines">
                {{$articleNews->name}}
            </h1>
		</div>
		<div class="w-full h-[500px] flex shrink-0 overflow-hidden">
			<img src="{{Storage::url($articleNews->thumbnail)}}" class="object-cover w-full h-full" alt="cover thumbnail">
		</div>
	</header>
	<section id="Article-container" class="w-full px-4 lg:px-6 mt-[50px]">
		<div class="max-w-[1180px] mx-auto flex flex-col lg:flex-row gap-8 lg:gap-12">
			<article id="Content-wrapper" class="flex-1 min-w-0">
				<div class="article-content text-gray-700 leading-relaxed">
					{!! $articleNews->content !!}
				</div>
			</article>
			<div class="side-bar flex flex-col w-full lg:w-[300px] gap-6">
				@if($square_ads_1)
				<div class="ads flex flex-col gap-3 w-full">
					<a href="{{ $square_ads_1->link }}" class="block">
						<img src="{{ Storage::url($square_ads_1->thumbnail) }}" class="w-full h-auto object-contain rounded-lg" alt="ads" />
					</a>
					<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1 items-center">
						Our Advertisement
						<a href="#" class="w-[18px] h-[18px]">
							<img src="{{ asset('assets/images/icons/message-question.svg') }}" alt="icon" />
						</a>
					</p>
				</div>
				@endif
				@if($square_ads_2)
				<div class="ads flex flex-col gap-3 w-full">
					<a href="{{ $square_ads_2->link }}" class="block">
						<img src="{{ Storage::url($square_ads_2->thumbnail) }}" class="w-full h-auto object-contain rounded-lg" alt="ads" />
					</a>
					<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1 items-center">
						Our Advertisement
						<a href="#" class="w-[18px] h-[18px]">
							<img src="{{ asset('assets/images/icons/message-question.svg') }}" alt="icon" />
						</a>
					</p>
				</div>
				@endif
			</div>
		</div>
	</section>
	@if($bannerads)
	<section id="Advertisement" class="w-full px-4 lg:px-6 mt-[70px]">
		<div class="max-w-[1150px] mx-auto flex justify-center">
			<div class="flex flex-col gap-3 shrink-0 w-full lg:w-fit">
			<a href="{{ $bannerads->link }}">
				<div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
					<img src="{{ Storage::url($bannerads->thumbnail) }}" class="object-cover w-full h-full" alt="ads" />
				</div>
			</a>
			<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
				Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
						src="{{ asset('assets/images/icons/message-question.svg') }}" alt="icon" /></a>
			</p>
			</div>
		</div>
	</section>
	@endif
	<section id="Up-to-date" class="w-full mt-[70px] py-[50px] bg-[#F9F9FC]">
		<div class="max-w-[1150px] mx-auto px-4">
			<div class="flex flex-col gap-[30px]">
				<div class="flex justify-between items-center">
					<h2 class="font-bold text-[26px] leading-[39px] text-[#0D3B66]">
						Other News You <br class="sm:hidden" />
						Might Be Interested
					</h2>
				</div>
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px]">
					@forelse($articles as $article)
					<a href="{{ route('front.details', $article->slug) }}" class="block group">
						<div class="flex flex-col gap-4 p-[20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#0D3B66] rounded-[20px] overflow-hidden bg-white h-full">
							<div class="thumbnail-container h-[180px] relative rounded-[16px] overflow-hidden">
								<img src="{{ Storage::url($article->thumbnail) }}" alt="thumbnail photo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
							</div>
							<div class="flex flex-col gap-[6px] flex-1">
								<h3 class="font-bold text-lg leading-[27px] line-clamp-2 text-[#0D3B66] group-hover:text-[#0D3B66]/80">
									{{ $article->name }}
								</h3>
								<p class="text-sm leading-[21px] text-[#A3A6AE] mt-auto">
									{{ $article->created_at->format('M d, Y') }}
								</p>
							</div>
						</div>
					</a>
					@empty
					<div class="col-span-full text-center py-8">
						<p class="text-[#6C7A89]">No other news available.</p>
					</div>
					@endforelse
				</div>
			</div>
		</div>
	</section>

</body>

@endsection

@push('after-styles')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">

    <style>
        /* Article content styling */
        .article-content {
    font-size: 1.125rem;
    line-height: 1.75;
    color: #374151;
}

        .article-content h1,
        .article-content h2,
        .article-content h3,
        .article-content h4,
        .article-content h5,
        .article-content h6 {
            color: #0D3B66;
            font-weight: 700;
            margin-top: 2em;
            margin-bottom: 1em;
        }

        .article-content h1 { font-size: 2.25em; line-height: 2.5rem; }
        .article-content h2 { font-size: 1.875em; line-height: 2.25rem; }
        .article-content h3 { font-size: 1.5em; line-height: 2rem; }
        .article-content h4 { font-size: 1.25em; line-height: 1.75rem; }

        .article-content p {
            margin-bottom: 1.5em;
        }

        .article-content * {
            max-width: 100%;
        }


        .article-content > * {
    max-width: 100%;
}

        .article-content p,
        .article-content li {
            text-align: left;
        }

        .article-content p:empty {
            display: none;
        }

        .article-content ul,
        .article-content ol {
            margin-bottom: 1.5em;
            padding-left: 1.5em;
        }

        .article-content li {
            margin-bottom: 0.5em;
        }

        .article-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 2em 0;
            display: block;
            float: none !important;
        }

        .article-content figure {
            max-width: 100%;
            margin: 1.5em 0;
            float: none !important;
        }

        .article-content table {
            display: block;
            width: 100%;
            overflow-x: auto;
            margin: 1.5em 0;
        }

        .article-content pre {
            white-space: pre-wrap;
            overflow-x: auto;
            background: #F3F4F6;
            padding: 1rem;
            border-radius: 0.5rem;
        }

        .article-content iframe,
        .article-content video {
            max-width: 100%;
            float: none !important;
        }

        .article-content [style*="float"] {
            float: none !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .article-content p,
        .article-content h1,
        .article-content h2,
        .article-content h3,
        .article-content h4,
        .article-content h5,
        .article-content h6,
        .article-content ul,
        .article-content ol {
            clear: both;
        }

        .article-content table {
            display: block;
            width: 100%;
            overflow-x: auto;
            margin: 1.5em 0;
        }

        .article-content pre {
            white-space: pre-wrap;
            overflow-x: auto;
            background: #F3F4F6;
            padding: 1rem;
            border-radius: 0.5rem;
        }

        .article-content iframe,
        .article-content video {
            max-width: 100%;
        }

        .article-content blockquote {
            border-left: 4px solid #0D3B66;
            padding-left: 1em;
            margin: 2em 0;
            font-style: italic;
            color: #6B7280;
            background-color: #F9FAFB;
            padding: 1em;
            border-radius: 0.375rem;
        }

        .article-content a {
            color: #0D3B66;
            text-decoration: underline;
        }

        .article-content a:hover {
            color: #1e5a8a;
        }

        .article-content strong,
        .article-content b {
            font-weight: 600;
            color: #0D3B66;
        }

        .article-content em,
        .article-content i {
            font-style: italic;
        }

        /* Line clamp utility */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            #Article-container .side-bar {
                order: -1;
                margin-bottom: 2rem;
            }
        }

        @media (max-width: 768px) {
            .article-content { font-size: 1rem; }
            .article-content h1 { font-size: 1.875em; line-height: 2.25rem; }
            .article-content h2 { font-size: 1.5em; line-height: 2rem; }
            .article-content h3 { font-size: 1.25em; line-height: 1.75rem; }
        }
    </style>
@endpush

@push('after-scripts')
    <script src="js/two-lines-text.js"></script>
@endpush
