<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function getImages()
{
    $imagePath = public_path('assets');
    $images = [];

    // Verifica se o diretório existe
    if (is_dir($imagePath)) {
        // Lista os arquivos do diretorio
        $files = scandir($imagePath);

        // Itera sobre os arquivos e adicione os em um array
        foreach ($files as $file) {
            if (is_file($imagePath . '/' . $file)) {
                $imageName = pathinfo($file, PATHINFO_FILENAME); 
                $imageName = str_replace('-', ' ', $imageName); 

                $images[] = [
                    'name' => $imageName,
                    'url' => asset('assets/' . $file),
                ];
            }
        }
    }

    return response()->json(['images' => $images]);
}

}
