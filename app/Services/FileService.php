<?php


namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class FileService
{
    /**
     * @param Request $request
     * @return array
     */
    public function getDataForStore(Request $request)
    {
        $file = $request->file('file');

        $name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $hashName = $file->hashName();

        $comment = $request->get('comment');

        $userId = Auth::user()->id;

        $data = [
            'name' => $name,
            'extension' => $extension,
            'size' => $size,
            'hash_name' => $hashName,
            'comment' => $comment,
            'user_id' => $userId,
        ];

        return $data;
    }
}
