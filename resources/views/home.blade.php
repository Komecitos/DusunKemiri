@extends('layouts.app')

@section('main-padding', 'py-6')
@section('content')

@php
$slides = \App\Models\Carousel::latest()->take(5)->get();
@endphp

<!-- SLIDER DINAMIS -->
<section
    x-data="{
        activeSlide: 0,
        slides: {{ json_encode($slides->map(fn($s) => [
            'bg' => asset('storage/' . $s->image),
            'title' => $s->title,
            'text1' => $s->text,
        ])) }},
        startAutoSlide() {
            setInterval(() => {
                this.activeSlide = (this.activeSlide + 1) % this.slides.length;
            }, 5000);
        }
    }"
    x-init="startAutoSlide()"
    class="relative overflow-hidden min-h-[50vh]">

    <!-- SLIDES -->
    <template x-for="(slide, index) in slides" :key="index">
        <div
            x-show="activeSlide === index"
            x-transition:enter="transition-opacity ease-out duration-700"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute inset-0 w-full h-full bg-cover bg-center bg-no-repeat"
            :style="`background-image: url(${slide.bg})`">
            <div class="flex items-center justify-center text-center h-full bg-black/50">
                <div class="text-white max-w-3xl px-4">
                    <h2 class="text-2xl md:text-4xl font-bold font-serif mb-4" x-text="slide.title"></h2>
                    <p class="text-sm md:text-lg leading-snug" x-text="slide.text1"></p>
                </div>
            </div>
        </div>
    </template>

    <!-- Titik Navigasi -->
    <div class="absolute inset-x-0 bottom-4 flex justify-center space-x-2 z-10">
        <template x-for="(slide, index) in slides" :key="index">
            <button
                class="w-3 h-3 rounded-full border border-kunyit"
                :class="{ 'bg-kunyit': activeSlide === index }"
                @click="activeSlide = index"
                aria-label="Pindah Slide"></button>
        </template>
    </div>
</section>

<!-- NAVIGASI FITUR -->
<section class="py-10 px-4 md:px-16 text-sogan text-center pt-5 pb-0">
    <div class="mb-8 text-center">
        <h1 class="text-2xl md:text-3xl font-medium mb-4">Jelajahi <span class="text-kunyit font-bold font-serif tracking-widest">Dusun Kemiri</span></h1>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
        <a href="{{ url('/berita') }}" class="flex flex-col items-center hover:text-kunyit transition group">
            <img src="{{ asset('images/icons/news.png') }}" alt="Berita"
                class="w-14 h-14 md:w-16 md:h-16 mb-2 transform group-hover:scale-90 transition duration-300 ease-out">
            <span class="font-semibold">Berita</span>
        </a>
        <a href="{{ url('/peta-dusun') }}" class="flex flex-col items-center hover:text-kunyit transition group">
            <img src="{{ asset('images/icons/map.png') }}" alt="Peta"
                class="w-14 h-14 md:w-16 md:h-16 mb-2 transform group-hover:scale-90 transition duration-300 ease-out">
            <span class="font-semibold">Peta</span>
        </a>
        <a href="{{ url('/demografi') }}" class="flex flex-col items-center hover:text-kunyit transition group">
            <img src="{{ asset('images/icons/social.png') }}" alt="Data Warga"
                class="w-14 h-14 md:w-16 md:h-16 mb-2 transform group-hover:scale-90 transition duration-300 ease-out">
            <span class="font-semibold">Data Warga</span>
        </a>
        <a href="{{ url('/jadwal') }}" class="flex flex-col items-center hover:text-kunyit transition group">
            <img src="{{ asset('images/icons/schedule.png') }}" alt="Kegiatan"
                class="w-14 h-14 md:w-16 md:h-16 mb-2 transform group-hover:scale-90 transition duration-300 ease-out">
            <span class="font-semibold">Kegiatan</span>
        </a>
    </div>

</section>

@endsection