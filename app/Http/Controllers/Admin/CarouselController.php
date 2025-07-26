<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::latest()->get();
        return view('admin.carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        // Ambil data kecuali gambar
        $data = $request->except('image');

        try {
            // Upload dan simpan gambar
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('carousel', $filename, 'public');

                $absolutePath = storage_path("app/public/{$path}");

                // Optimasi gambar
                $optimizerChain = OptimizerChainFactory::create();
                $optimizerChain->optimize($absolutePath);

                $data['image'] = $path;

                Log::info("Gambar carousel berhasil diunggah & dikompres: {$path}");
            }

            // Simpan data ke database
            Carousel::create($data);

            return redirect()->route('admin.carousel.index')->with('success', 'Slide berhasil ditambahkan.');
        } catch (\Throwable $e) {
            Log::error('Gagal menyimpan slide carousel: ' . $e->getMessage());
            return redirect()->back()->withErrors(['msg' => 'Terjadi kesalahan saat menyimpan slide.']);
        }
    }


    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->only(['title', 'text']);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($carousel->image);
            $data['image'] = $request->file('image')->store('carousels', 'public');
        }

        $carousel->update($data);

        return redirect()->route('admin.carousel.index')->with('success', 'Slide berhasil diperbarui');
    }

    public function destroy(Carousel $carousel)
    {
        Storage::disk('public')->delete($carousel->image);
        $carousel->delete();

        return redirect()->back()->with('success', 'Slide dihapus');
    }
}
