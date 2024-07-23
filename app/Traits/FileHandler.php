<?php

namespace App\Traits;

trait FileHandler
{
    public function fileUpload($image, $directory)
    {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move($directory, $imageName);
        return $directory . '/' . $imageName;
    }
}
