<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait HandlesFiles
{
    /**
     * Upload file to public/uploads/{directory}
     */
    public function uploadFile(UploadedFile $file, string $directory, ?string $filename = null): string
    {
        $extension = strtolower($file->getClientOriginalExtension());

        $name = $filename ? $filename . '.' . $extension : Str::ulid() . '.' . $extension;

        $uploadPath = public_path('uploads/' . trim($directory, '/'));

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        $file->move($uploadPath, $name);

        return 'uploads/' . trim($directory, '/') . '/' . $name;
    }

    /**
     * Delete file
     */
    public function deleteFile(?string $path): bool
    {
        if (empty($path)) {
            return false;
        }

        $fullPath = public_path(ltrim($path, '/'));

        if (File::exists($fullPath)) {
            return File::delete($fullPath);
        }

        return false;
    }

    /**
     * Replace existing file safely
     */
    public function replaceFile(?UploadedFile $newFile, ?string $oldPath, string $directory): ?string
    {
        if (!$newFile) {
            return $oldPath;
        }

        // First upload new file
        $newPath = $this->uploadFile($newFile, $directory);

        // Only after successful upload,
        // delete old file
        if ($oldPath && $newPath !== $oldPath) {
            $this->deleteFile($oldPath);
        }

        return $newPath;
    }

    /**
     * Generate public URL
     */
    public function fileUrl(?string $path, ?string $fallback = null): ?string
    {
        if (empty($path)) {
            return $fallback;
        }

        return asset(ltrim($path, '/'));
    }

    /**
     * Format file size
     */
    public function formatFileSize(?int $bytes): string
    {
        if (!$bytes) {
            return '0 KB';
        }

        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        }

        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }

        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        }

        return $bytes . ' Bytes';
    }
}