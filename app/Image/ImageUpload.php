<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/1/2019
 * Time: 5:23 PM
 */

namespace App\Image;

use File;
use Intervention\Image\Facades\Image;

class ImageUpload
{

    public function pictureUploadWithOutThumb($file, $folderPath, $imageName, $mainHeight = null)
    {
        $mainFile = $file;

        if (!File::exists(public_path($folderPath))) {
            File::makeDirectory(public_path() . '/' . $folderPath, 0777, true, true);
        }

//        main file saving
        if ($mainHeight) {
            Image::make($mainFile)->resize(null, $mainHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($folderPath . '/' . $imageName));
        } else {
            Image::make($mainFile)->save(public_path($folderPath . '/' . $imageName));
        }

        return [
            'file_name' => $imageName,
        ];

    }

    public function pictureUploadWithThumb($file, $folderPath, $imageName, $mainHeight = false, $thumbHeight = false)
    {

        $mainFile = $file;

        if (!File::exists(public_path($folderPath))) {
            File::makeDirectory(public_path() . '/' . $folderPath, 0777, true, true);
        }

        // main file saving
        if ($mainHeight) {
            Image::make($mainFile)->resize(null, $mainHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($folderPath . '/' . $imageName));
        } else {
            Image::make($mainFile)->save(public_path($folderPath . '/' . $imageName));
        }

        // thumb file saving
        Image::make($file)->resize(null, $thumbHeight, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path($folderPath . '/thumbs/' . $imageName));

        return [
            'file_name' => $imageName
        ];

    }

    public function pictureUploadWithMultipleFolder($file, $folderPath, $imageName, $mainHeight = false, $mediumHeight = false, $thumbHeight = false)
    {
        $mainFile = $file;

        if (!File::exists(public_path($folderPath))) {
            File::makeDirectory(public_path() . '/' . $folderPath, 0777, true, true);
        }

        // main file saving
        if ($mainHeight) {
            Image::make($mainFile)->resize(null, $mainHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($folderPath . '/' . $imageName));
        } else {
            Image::make($mainFile)->save(public_path($folderPath . '/' . $imageName));
        }

        $mediumFolderPath = $folderPath . 'resized/';
        if (!File::exists(public_path($mediumFolderPath))) {
            File::makeDirectory(public_path() . '/' . $mediumFolderPath, 0777, true, true);
        }

        // medium file saving
        Image::make($file)->resize(null, $mediumHeight, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path($mediumFolderPath . '/' . $imageName));


        $thumbFolderPath = $folderPath . 'thumbs/';
        if (!File::exists(public_path($thumbFolderPath))) {
            File::makeDirectory(public_path() . '/' . $thumbFolderPath, 0777, true, true);
        }

        // medium file saving
        Image::make($file)->resize(null, $thumbHeight, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path($thumbFolderPath . '/' . $imageName));

        return [
            'file_name' => $imageName
        ];
    }

}