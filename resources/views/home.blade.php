@extends('layouts.app')

@section('content')

<section
    class="py-20 px-4 md:px-10 bg-[url('{{ asset('images/tes/home/desa-1.jpg') }}')] bg-cover bg-center bg-no-repeat">
    <div class="max-w-6xl mx-auto bg-white/80 backdrop-blur-md rounded-xl shadow-xl overflow-hidden">
        <div class="md:flex md:items-center gap-8 p-8 md:p-12">

            {{-- Foto Kepala Dusun --}}
            <div class="md:w-1/3 mb-6 md:mb-0">
                <img src="{{ asset('images/tes/home/kepdes.jpg') }}" alt="Kepala Dusun" class="rounded-xl shadow-md object-cover w-full h-auto">
            </div>

            {{-- Kata Sambutan --}}
            <div class="md:w-2/3">
                <h2 class="text-3xl font-bold text-orangeAccent mb-4 font-sans">Kata Sambutan</h2>
                <p class="text-darkText font-medium text-justify leading-relaxed mb-4 font-sans">
                    Assalamu’alaikum Warahmatullahi Wabarakatuh. Dengan penuh rasa syukur dan kebanggaan, kami menyambut baik hadirnya website resmi Dusun Kemiri ini sebagai media informasi dan komunikasi bagi seluruh warga.
                </p>
                <p class="text-darkText font-medium text-justify leading-relaxed font-sans">
                    Website ini diharapkan menjadi sarana dokumentasi, penyampaian informasi, serta penghubung antara masyarakat dan pemerintah dusun. Terima kasih atas partisipasi seluruh warga Dusun Kemiri.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection