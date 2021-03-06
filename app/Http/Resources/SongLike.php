<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SongLike extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'likes' => $this->likes,
            'song_path' => url('storage/songs/' . $this->song_path),
            'duration' => $this->duration,
            'artist' => $this->artist,
            'playlist' => $this->playlist
        ];
    }
} // END OF RESOURCE
