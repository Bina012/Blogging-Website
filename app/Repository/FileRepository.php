<?php

namespace App\Repository;

use File;
class FileRepository
{
    public function saveFile($request,$path)
    {
        if ($request->hasFile('file')) {
            $this->createDirectory($path);
            $file = $request['file'];
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->filePath, $filename);
            return $filename;
        }
    }

    public function createDirectory($path)
    {
        $paths = [
            'file_path' =>"uploads/files/".$path."/",
        ];
        foreach ($paths as $path) {
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 077, true, true);
            }
            $this->filePath = $paths['file_path'];
        }
    }

    public function removefile($file,$path)
    {
        $paths = [
            'file_path' =>"uploads/files/".$path."/",
        ];

        foreach ($paths as $path) {
            if (file_exists($path . $file['file'])) {
                unlink($path . $file['file']);
            }
        }

    }

}