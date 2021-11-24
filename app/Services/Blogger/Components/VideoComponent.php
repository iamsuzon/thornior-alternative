<?php

namespace App\Services\Blogger\Components;

use App\Models\AllMedia;

class VideoComponent{
    public static function createFunction($id, $type, $name, $number, $mime, $address)
    {
        AllMedia::create([
            'video_id' => $id,
            'post_type' => $type,
            'name' => $name,
            'number' => $number,
            'mime_type' => $mime,
            'address' => $address
        ]);
    }

    public static function updateFunction($id, $type, $number, $name, $mime, $address)
    {
        AllMedia::where('video_id', $id)
            ->where('post_type', $type)
            ->where('number', $number)
            ->update([
                'name' => $name,
                'number' => $number,
                'mime_type' => $mime,
                'address' => $address
            ]);
    }
}
