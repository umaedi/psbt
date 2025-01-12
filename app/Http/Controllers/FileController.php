<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $filename, $year)
    {
       // Cegah akses file berbahaya
       $extension = pathinfo($filename, PATHINFO_EXTENSION);
       if ($extension !== 'pdf') {
           abort(404);
       }

       // Path file di MinIO
       $path = "berita/thumbnail/{$type}/{$year}/{$filename}";

       // Periksa apakah file ada di MinIO
       if (!Storage::disk('s3')->exists($path)) {
           // abort(404);
           $path = public_path('assets/img/thumbnail.jpg');
           return response()->file($path);
       }

       // Dapatkan MIME type
       $mimeType = Storage::disk('s3')->mimeType($path);

       // Stream file
       return response()->stream(function () use ($path) {
           $stream = Storage::disk('s3')->readStream($path);
           while (!feof($stream)) {
               echo fread($stream, 1024 * 8); // Membaca file dalam blok 8 KB
           }
           fclose($stream);
       }, 200, [
           'Content-Type' => $mimeType,
           'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
       ]);
    }
}
