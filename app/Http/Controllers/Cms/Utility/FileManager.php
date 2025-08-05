<?php

namespace App\Http\Controllers\Cms\Utility;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileManager extends Controller
{
    public function index($type = 'all'){
        if ($type === 'all') {
            $files = Files::all();
        } else {
            $files = Files::where('type', $type)->get();
        }
        $data = [
            'files' => $files,
            'type' => $type,
        ];

        return view('cms.page.files.index', $data);
    }

    public function destroy(Files $file){
        if(!$file) {
            $notify = NotifyHelper::notFound();
            return redirect()->back()->with('notify', $notify);
        }

        if(!File::exists(public_path('storage/' . $file->path))) {
            $notify = NotifyHelper::notFound();
            return redirect()->back()->with('notify', $notify);
        }
        
        Storage::disk('public')->delete($file->path);
        $file->delete();
        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->back()->with('notify', $notify);
    }

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
                    'name' => $finalName,
                    'path' => 'files/' . $finalName,
                    'extension' => $extension,
                    'type' => $this->getFileType($extension),
                    'size' => $file->getSize(),
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
    
    public function filePicker($type = 'all')
    {
        if($type === 'all') {
            $files = Files::all();
        } else {
            $files = Files::where('type', $type)->get();
        }
        return view('cms.partial.file-picker', compact('files', 'type'));
    }
}