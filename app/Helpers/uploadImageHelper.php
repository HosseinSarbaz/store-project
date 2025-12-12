<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class uploadImageHelper
{

    public static function uploadImages(array $files,$folder ,$existing = [] ){

        $fileNames = $existing ?: [];

        foreach($files as $file){
            $name = time(). '_' . uniqid(). '.' . $file->getClientOriginalExtension();

            Storage::disk('public')->putFileAs($folder,$file,$name);
            $fileNames[] = $name;
        }
        return $fileNames;
    }



    public static function uploadImage($file,$folder,$existingFilename = null)
    {
        try
        {
        $filename = time(). '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        Storage::disk('public')->putFileAs($folder, $file, $filename);

        if($existingFilename && Storage::disk('public')->exists($folder . '/' . $existingFilename)){
            Storage::disk('public')->delete($folder . '/' . $existingFilename);
        }

        return $filename;
        }

        catch(\Throwable $e)
        {
            Log::error("Upload Image Failed".$e->getMessage());
            return $existingFilename ?? null;
        }
    }



}

?>
