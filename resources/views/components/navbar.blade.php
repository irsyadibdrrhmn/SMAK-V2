<nav id="Navbar" class="max-w-[1130px] mx-auto flex flex-wrap justify-between items-center gap-4 mt-[30px]">
    <div class="logo-container flex gap-5 items-center">
        <a href="{{ route('front.index') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-[#0D3B66] text-white flex items-center justify-center font-bold">SY</div>
            <div>
                <p class="font-bold text-[#0D3B66] leading-tight">SMAK Seminari Yohanes</p>
                <p class="text-xs text-[#6C7A89]">School Website & News Portal</p>
            </div>
        </a>
    </div>

    <div class="flex flex-wrap items-center gap-2 text-sm font-semibold">
        <a href="{{ route('front.profile') }}" class="rounded-full px-4 py-2 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0D3B66]">Profile</a>
        <a href="{{ route('front.academic') }}" class="rounded-full px-4 py-2 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0D3B66]">Academic</a>
        <a href="{{ route('front.gallery') }}" class="rounded-full px-4 py-2 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0D3B66]">Gallery</a>
        <a href="{{ route('front.contact') }}" class="rounded-full px-4 py-2 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0D3B66]">Contact</a>
    </div>

    <form method="GET" action="{{ route('front.search') }}"
        class="w-full lg:w-[340px] flex items-center rounded-full border border-[#E8EBF4] p-[10px_16px] gap-[10px] focus-within:ring-2 focus-within:ring-[#0D3B66] transition-all duration-300">
        <button type="submit" class="w-5 h-5 flex shrink-0">
            <img src="{{ asset('assets/images/icons/search-normal.svg') }}" alt="icon" />
        </button>
        <input type="text" name="keyword"
            class="appearance-none outline-none w-full font-semibold placeholder:font-normal placeholder:text-[#A3A6AE]"
            placeholder="Search school news..." />
    </form>
</nav>
