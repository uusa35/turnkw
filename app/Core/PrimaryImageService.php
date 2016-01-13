<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 9/1/15
 * Time: 12:09 PM
 */

namespace App\Core;


use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class PrimaryImageService
{

    public function CreateImage($currentImage)
    {

        $fileName = $currentImage->getClientOriginalName();

        $fileName = Carbon::now()->toDateString() . '-' . $fileName;

        Image::make(public_path('images/uploads/' . $fileName));

        return $fileName;

    }

}