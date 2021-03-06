<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class Playlist extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'likes' => $this->likes,
            'image' => $this->image_path,
            'description' => $this->description,
            'songs' => \App\Http\Resources\Song::collection($this->uploadedSongs),
            'category_id' => $this->category_id,
            'total_duration' => $this->uploadedSongs()->sum('duration'),
            'artist' => $this->artist,
            'is_liked' => Auth::check() && Auth::user()->playlistLikes()->where('playlist_id', $this->id)->exists() ? true : false,
        ];
    }
} // END OF RESOURCE
