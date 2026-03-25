@extends('front.master')
@section('content')
<body class="font-[Poppins] pb-[83px]">
	<x-navbar/>
	<section class="w-full px-4 md:px-6 mt-[70px] text-center">
		<div class="max-w-[1150px] mx-auto">
		<h1 class="text-4xl font-bold">Category page disabled</h1>
		<p class="mt-4 text-gray-600">Category browsing was removed from the site per your request.</p>
		<a href="{{ route('front.index') }}" class="mt-6 inline-block px-6 py-3 rounded-full bg-[#0D3B66] text-white font-semibold">Back to Home</a>
		</div>
	</section>
</body>
@endsection
