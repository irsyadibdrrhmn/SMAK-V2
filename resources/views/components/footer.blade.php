@props(['schoolProfile' => null])
<footer class="w-full px-4 md:px-6 mt-16">
    <div class="max-w-[1150px] mx-auto border-t border-[#E8EBF4] pt-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
            
            <!-- Informasi Sekolah -->
            <div>
                <h4 class="font-bold text-[#0D3B66]">
                    {{ $schoolProfile?->school_name ?? 'SMAK Seminari Yohanes' }}
                </h4>
                <p class="text-[#6C7A89] mt-2">
                    {{ $schoolProfile?->tagline ?? 'Membangun karakter, iman, dan prestasi.' }}
                </p>
            </div>

            <!-- Kontak -->
            <div>
                <h4 class="font-bold text-[#0D3B66]">Kontak</h4>
                <p class="text-[#6C7A89] mt-2">
                    {{ $schoolProfile?->address ?? 'Silakan perbarui alamat sekolah di panel admin.' }}
                </p>
                <p class="text-[#6C7A89]">
                    {{ $schoolProfile?->phone ?? '-' }}
                </p>
                <p class="text-[#6C7A89]">
                    {{ $schoolProfile?->email ?? '-' }}
                </p>
            </div>

            <!-- Tautan Cepat -->
            <div>
                <h4 class="font-bold text-[#0D3B66]">Tautan Cepat</h4>
                <ul class="mt-2 space-y-1 text-[#6C7A89]">
                    <li>
                        <a href="{{ route('front.profile') }}" class="hover:underline">
                            Profil
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('front.academic') }}" class="hover:underline">
                            Akademik
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('front.gallery') }}" class="hover:underline">
                            Galeri
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('front.contact') }}" class="hover:underline">
                            Kontak
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</footer>