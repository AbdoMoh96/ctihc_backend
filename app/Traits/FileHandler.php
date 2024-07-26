<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;

trait FileHandler
{
    public function fileUpload($image, $directory)
    {
      $imageName = time() . '_' . $image->getClientOriginalName();
      $path = $image->storeAs($directory, $imageName, 'public');
      return $path;
    }
}
