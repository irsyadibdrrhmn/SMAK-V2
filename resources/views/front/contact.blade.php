@extends('front.master')
@section('content')

<body class="font-[Poppins] pb-[72px] bg-[#F8FAFC]">
<x-navbar/>

<section class="w-full px-4 md:px-6 mt-6 md:mt-8">

    <div class="max-w-[1150px] mx-auto 
                grid grid-cols-1 
                lg:grid-cols-2 
                gap-6 md:gap-8">

        <!-- Informasi Kontak -->
        <article class="bg-white 
                        rounded-2xl 
                        p-6 md:p-8 
                        border border-[#E8EBF4] 
                        shadow-sm">

            <h1 class="text-2xl md:text-3xl 
                       font-bold 
                       text-[#0D3B66]">

                Kontak Kami
            </h1>

            <p class="mt-3 text-sm md:text-base text-[#516070]">
                <span class="font-semibold">Nama Sekolah:</span> 
                {{ $schoolProfile?->school_name ?? 'SMAK Seminari Yohanes' }}
            </p>

            <p class="mt-4 text-sm md:text-base text-[#516070] leading-relaxed">
                <span class="font-semibold">Alamat:</span> 
                {{ $schoolProfile?->address ?? 'Silakan update alamat dari panel admin.' }}
            </p> 

            <p class="mt-3 text-sm md:text-base text-[#516070]">
                <span class="font-semibold">Telepon:</span> 
                {{ $schoolProfile?->telepon ?? '-' }}
            </p>

            <p class="mt-2 text-sm md:text-base text-[#516070]">
                <span class="font-semibold">Email:</span> 
                {{ $schoolProfile?->email ?? '-' }}
            </p>

        </article>


        <!-- Google Maps -->
        <article class="bg-white 
                        rounded-2xl 
                        p-6 md:p-8 
                        border border-[#E8EBF4] 
                        shadow-sm">

            <h2 class="font-bold 
                       text-lg md:text-xl 
                       text-[#0D3B66]">

                Lokasi Sekolah (Google Maps)
            </h2>

            @if($schoolProfile?->maps_embed)

                <!-- Map Responsive -->
                <div class="mt-4 
                            w-full 
                            h-[250px] 
                            md:h-[320px] 
                            lg:h-[360px] 
                            rounded-xl 
                            overflow-hidden">

                    {!! $schoolProfile->maps_embed !!}

                </div>

                <!-- Tombol Buka Maps -->
                <a href="{{ $schoolProfile?->maps_link ?? '#' }}"
                   target="_blank"
                   class="inline-block 
                          mt-4 
                          px-4 py-2 
                          text-sm md:text-base
                          bg-[#0D3B66] 
                          text-white 
                          rounded-lg 
                          hover:bg-[#0b3154] 
                          transition">

                    Buka di Google Maps
                </a>

            @else

                <p class="mt-4 text-sm text-[#6C7A89]">
                    Silakan tambahkan kode Google Maps di halaman profil sekolah (admin).
                </p>

            @endif

        </article>

    </div>

</section>

<x-footer :school-profile="$schoolProfile" />

</body>
@endsection