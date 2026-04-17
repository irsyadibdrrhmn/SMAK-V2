@extends('front.master')

@section('content')

<x-navbar />

<div class="min-h-screen bg-[#FBFBFB] py-12 md:py-20">
    <div class="max-w-5xl mx-auto px-4 lg:px-8">
        <header class="text-center mb-12">
            <div class="flex items-center justify-center gap-3 mb-4">
                <span
                    class="px-3 py-1 bg-[#0D3B66]/10 text-[#0D3B66] text-xs font-bold uppercase tracking-widest rounded-full">
                    Berita Terbaru
                </span>
                <span class="text-gray-400">|</span>
                <p class="text-sm text-gray-500 font-medium">
                    {{ $articleNews->created_at->format('M d, Y') }}
                </p>
            </div>

            <h1
                class="font-extrabold text-3xl sm:text-4xl md:text-5xl leading-[1.2] text-[#0D3B66] max-w-4xl mx-auto tracking-tight">
                {{ $articleNews->name }}
            </h1>

            @if($articleNews->thumbnail)
            <div
                class="mt-10 w-full aspect-video overflow-hidden rounded-[2rem] shadow-2xl shadow-slate-200 border-8 border-white">
                <img src="{{ Storage::url($articleNews->thumbnail) }}"
                    class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700"
                    alt="{{ $articleNews->name }}">
            </div>
            @endif
        </header>

        <section class="mt-16">
            <div class="flex flex-col lg:flex-row gap-12">

                <article class="flex-1 min-w-0">
                    <div class="bg-white p-8 md:p-12 rounded-[2rem] shadow-sm border border-gray-100">
                        <div class="article-content prose prose-slate max-w-none">
                            {!! $articleNews->content !!}
                        </div>
                    </div>
                </article>
            </div>
        </section>

        @if($bannerads)
        <section class="mt-20">
            <div class="relative group">
                <p
                    class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] text-gray-400 uppercase tracking-[0.2em]">
                    Advertisement</p>
                <a href="{{ $bannerads->link }}" class="block w-full">
                    <div
                        class="h-28 md:h-40 border-4 border-white rounded-[2rem] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300">
                        <img src="{{ Storage::url($bannerads->thumbnail) }}" class="w-full h-full object-cover"
                            alt="iklan">
                    </div>
                </a>
            </div>
        </section>
        @endif

    </div>

    <section class="mt-24 border-t border-gray-50 bg-[#F8FAFC] py-24"> <div class="max-w-6xl mx-auto px-4"> <div class="flex items-end justify-between mb-12">
            <div>
                <h2 class="font-extrabold text-3xl md:text-4xl text-[#0D3B66] tracking-tight">
                    Berita Lainnya
                </h2>
                <div class="h-1.5 w-12 bg-blue-600 rounded-full mt-2"></div> </div>
            <a href="#" class="text-sm font-bold text-blue-600 hover:text-[#0D3B66] transition-colors flex items-center gap-1 group">
                Lihat Semua 
                <span class="group-hover:translate-x-1 transition-transform">→</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($articles as $article)
            <a href="{{ route('front.details', $article->slug) }}" class="group block">
                <div class="flex flex-col h-full overflow-hidden transition-all duration-300">
                    
                    <div class="relative aspect-[16/10] rounded-3xl overflow-hidden mb-6 shadow-xl shadow-slate-200/50">
                        <img src="{{ Storage::url($article->thumbnail) }}"
                            class="w-full h-full object-cover group-hover:scale-110 group-hover:rotate-2 transition-transform duration-700"
                            alt="{{ $article->name }}">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>

                    <div class="flex items-center gap-3 mb-3">
                        <span class="px-3 py-1 bg-white text-[#0D3B66] text-[10px] font-bold uppercase tracking-wider rounded-lg shadow-sm">
                            {{ $article->category->name ?? 'Update' }}
                        </span>
                        <span class="text-[11px] text-gray-400 font-medium">
                            {{ $article->created_at->format('M d, Y') }}
                        </span>
                    </div>

                    <h3 class="font-extrabold text-xl text-[#0D3B66] leading-tight group-hover:text-blue-600 transition-colors line-clamp-2">
                        {{ $article->name }}
                    </h3>
                    
                    <p class="text-sm text-gray-500 mt-3 line-clamp-2 leading-relaxed">
                        {{ Str::limit(strip_tags($article->content), 100) }}
                    </p>
                </div>
            </a>
            @empty
            <div class="col-span-full py-20 text-center bg-white rounded-[2rem] border border-gray-100 shadow-sm">
                <p class="text-gray-400 font-medium">Belum ada berita lainnya untuk ditampilkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
</div>

<x-footer />

@endsection

@push('after-styles')
<style>
/* Mengatur spacing antar paragraf di konten artikel */
.article-content {
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
    font-size: 1.125rem;
    line-height: 1.8;
    color: #334155;
}

.article-content p {
    margin-bottom: 1.5rem;
}

.article-content h2 {
    font-size: 1.875rem;
    margin-top: 2.5rem;
    margin-bottom: 1rem;
    font-weight: 800;
    color: #0D3B66;
}

.article-content blockquote {
    background: #f1f5f9;
    padding: 2rem;
    border-left: 6px solid #0D3B66;
    border-radius: 0 1rem 1rem 0;
    font-style: italic;
    margin: 2rem 0;
}

/* Agar gambar di dalam konten juga cantik */
.article-content img {
    border-radius: 1.5rem;
    box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1);
    margin: 2.5rem auto;
}
</style>
@endpush