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
            <div class="flex items-center justify-center text-center h-full bg-gradient-to-t from-black/30 to-transparent">
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
    <div class="mb-8 text-center pt-10">
        <h1 class="text-2xl md:text-3xl font-medium mb-4">Jelajahi <span class="text-orange-700 font-bold font-serif tracking-widest">Dusun Kemiri</span></h1>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-6 max-w-4xl mx-auto">
        <a href="{{ url('/profil') }}" class="flex flex-col items-center hover:text-kunyit transition group">
            <i class="fas fa-id-badge text-4xl md:text-5xl mb-2 transform group-hover:scale-90 transition duration-300 ease-out"></i>
            <span class="font-semibold">Profil</span>
        </a>
        <a href="{{ url('/berita') }}" class="flex flex-col items-center hover:text-kunyit transition group">
            <i class="fab fa-readme text-4xl md:text-5xl mb-2 transform group-hover:scale-90 transition duration-300 ease-out"></i>
            <span class="font-semibold">Berita</span>
        </a>
        <a href="{{ url('/peta-dusun') }}" class="flex flex-col items-center hover:text-kunyit transition group">
            <i class="fas fa-map-marked-alt text-4xl md:text-5xl mb-2 transform group-hover:scale-90 transition duration-300 ease-out"></i>
            <span class="font-semibold">Peta</span>
        </a>
        <a href="{{ url('/demografi') }}" class="flex flex-col items-center hover:text-kunyit transition group">
            <i class="fas fa-users text-4xl md:text-5xl mb-2 transform group-hover:scale-90 transition duration-300 ease-out"></i>
            <span class="font-semibold">Warga</span>
        </a>
        <a href="{{ url('/jadwal') }}" class="flex flex-col items-center hover:text-kunyit transition group">
            <i class="fas fa-calendar-alt text-4xl md:text-5xl mb-2 transform group-hover:scale-90 transition duration-300 ease-out"></i>
            <span class="font-semibold">Kegiatan</span>
        </a>
    </div>

</section>

@endsection