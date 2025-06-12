@extends('layouts.app')

@section('content')
<section class="mb-4">
    <div
        x-data="{
        images: [
            '{{ asset('images/tes/home/desa-1.jpg') }}',
            '{{ asset('images/tes/home/desa-2.jpg') }}',
            
        ],
        activeIndex: 0,
        startCarousel() {
            setInterval(() => {
                this.activeIndex = (this.activeIndex + 1) % this.images.length;
            }, 4000); // ganti setiap 4 detik
        }
    }"
        x-init="startCarousel"
        class="relative w-full h-64 overflow-hidden rounded-lg shadow-md">
        <template x-for="(image, index) in images" :key="index">
            <div
                x-show="activeIndex === index"
                class="absolute inset-0 transition-opacity duration-700"
                x-transition:enter="opacity-0"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="opacity-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <img :src="image" alt="" class="w-full h-full object-cover">
            </div>
        </template>
    </div>
</section>

<section class="my-10 bg-white rounded-lg shadow-md p-6" name="sambutan">
    <div class="md:flex md:items-start md:space-x-6">
        {{-- Foto Pak Dukuh --}}
        <div class="md:w-1/3 mb-4 md:mb-0">
            <img src="{{ asset('images/tes/home/kepdes.jpg') }}" alt="Pak Dukuh" class="rounded-lg shadow w-full h-auto object-cover">
        </div>

        {{-- Sambutan --}}
        <div class="md:w-2/3">
            <h2 class="text-xl font-semibold text-green-700 mb-2">Sambutan Kepala Dusun</h2>
            <p class="text-gray-700 mb-3 text-justify">
                Assalamu’alaikum Warahmatullahi Wabarakatuh.
                Dengan penuh rasa syukur dan kebanggaan, kami menyambut baik hadirnya website resmi Dusun Kemiri ini sebagai media informasi dan komunikasi bagi seluruh warga. Harapan kami, kehadiran platform ini dapat menjadi jembatan antara pemerintah dusun dan masyarakat dalam penyampaian informasi secara cepat, transparan, dan akurat.
            </p>
            <p class="text-gray-700 text-justify">
                Website ini juga diharapkan menjadi media dokumentasi kegiatan, data masyarakat, serta perkembangan pembangunan dusun ke depan. Mari kita manfaatkan teknologi ini secara bijak dan produktif untuk kemajuan bersama. Terima kasih atas dukungan dan partisipasi seluruh warga Dusun Kemiri.
            </p>
        </div>
    </div>
</section>

<section>
    <h3 class="text-md font-semibold">Berita Terbaru</h3>
    <p>Belum ada berita.</p>
</section>
@endsection