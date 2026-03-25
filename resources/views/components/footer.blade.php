@props(['schoolProfile' => null])
<footer class="max-w-[1130px] mx-auto mt-16 border-t border-[#E8EBF4] pt-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
        <div>
            <h4 class="font-bold text-[#0D3B66]">{{ $schoolProfile?->school_name ?? 'SMAK Seminari Yohanes' }}</h4>
            <p class="text-[#6C7A89] mt-2">{{ $schoolProfile?->tagline ?? 'Building character, faith, and excellence.' }}</p>
        </div>
        <div>
            <h4 class="font-bold text-[#0D3B66]">Contact</h4>
            <p class="text-[#6C7A89] mt-2">{{ $schoolProfile?->address ?? 'Please update school address in admin panel.' }}</p>
            <p class="text-[#6C7A89]">{{ $schoolProfile?->phone ?? '-' }}</p>
            <p class="text-[#6C7A89]">{{ $schoolProfile?->email ?? '-' }}</p>
        </div>
        <div>
            <h4 class="font-bold text-[#0D3B66]">Quick Links</h4>
            <ul class="mt-2 space-y-1 text-[#6C7A89]">
                <li><a href="{{ route('front.profile') }}" class="hover:underline">Profile</a></li>
                <li><a href="{{ route('front.academic') }}" class="hover:underline">Academic</a></li>
                <li><a href="{{ route('front.gallery') }}" class="hover:underline">Gallery</a></li>
                <li><a href="{{ route('front.contact') }}" class="hover:underline">Contact</a></li>
            </ul>
        </div>
    </div>
</footer>
