<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageCrud extends Component
{
    use WithFileUploads;

    public $imagenes;
    protected $listeners = ['imagenes' => 'render', 'imagenesActualizadas' => 'render', 'deleteImage' => 'deleteImage'];

    public function render()
    {
        // Recarga las imágenes al renderizar para confirmar que se actualizan
        $this->imagenes = Image::all();
        return view('livewire.image-crud', ['imagenes' => $this->imagenes]);
    }

    public function editImage($imageId)
    {
        $this->dispatch('editImage', $imageId);
    }

    public function deleteImage($imagenId)
    {
        $image = Image::find($imagenId);
        if ($image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();

            // Emitir los eventos
            $this->dispatch('imageUpdated');
            $this->dispatch('alert', '¡La imagen se ha eliminado exitosamente!');
        }
    }

    public function index()
    {
        $imagenes = Image::all();
        $data = [
            'imagenes' => $imagenes,
            'datos' => 200
        ];

        // Retorna la respuesta en formato JSON
        return response()->json($data, 200);
    }
    public function add(Request $request)
    {
        $this->validate([
            'title' => 'required',
            'path' => 'required|image|max:1024', // Máximo 1MB
        ]);

        // Guardar la imagen en el almacenamiento y obtener la ruta
        $path = $request->file('path')->store('images', 'public');

        $image = Image::create([
            'title' => $request->title,
            'description' => $request->description,
            'path' => $path,
        ]);

        $data = [
            'image' => $image,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
