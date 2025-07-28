<?php

namespace App\Http\Controllers\Cms\Utility;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class FileManager extends Controller
{
    public function uploadFile(Request $request) 
    {
        $urls = [];

        if (request()->hasFile('files')) {
            foreach (request()->file('files') as $file) {
                $originalName = $file->getClientOriginalName();
                $filename = Str::slug(pathinfo($originalName, PATHINFO_FILENAME));
                $extension = $file->getClientOriginalExtension();
                $finalName = $filename . '.' . $extension;

                $i = 1;
                while (File::exists(public_path("storage/files/$finalName"))) {
                    $finalName = $filename . '-' . $i . '.' . $extension;
                    $i++;
                }

                $file->storeAs('files', $finalName, 'public');
                $urls[] = asset('storage/files/' . $finalName);

                // Simpan informasi file ke database
                Files::create([
                    'name' => $originalName,
                    'path' => 'files/' . $finalName,
                    'extension' => $extension,
                    'type' => $this->getFileType($extension),
                ]);
            }

            return response()->json(['urls' => $urls]);
        }

        return response()->json(['error' => 'No files uploaded'], 400);
    }

    private function getFileType($extension)
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];
        $videoExtensions = ['mp4', 'avi', 'mov', 'mkv', 'flv', 'wmv'];
        $documentExtensions = ['pdf', 'doc', 'docx', 'txt', 'xls', 'xlsx', 'ppt', 'pptx'];
        $compressedExtensions = ['zip', 'rar', 'tar', 'gz', '7z'];

        if (in_array($extension, $imageExtensions)) {
            return 'image';
        } elseif (in_array($extension, $videoExtensions)) {
            return 'video';
        } elseif (in_array($extension, $documentExtensions)) {
            return 'document';
        } elseif (in_array($extension, $compressedExtensions)) {
            return 'compressed';
        }

        return 'other';
    }   
}