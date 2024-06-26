<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BlogsResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'publish_datetime' => optional($this->publish_datetime)->format('d/m/Y h:i A'),
            'content' => $this->content,
            'source' => $this->source,
            'political_spectrum' => $this->political_spectrum,
            'meta_title' => $this->meta_title,
            'cannonical_link' => $this->cannonical_link,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'status' => $this->status,
            'display_status' => $this->display_status,
            'created_at' => optional($this->created_at)->toDateString(),
            'created_by' => optional($this->owner)->full_name,
            'updated_at' => optional($this->updated_at)->toDateTimeString(),
            'updated_by' => optional($this->updater)->full_name,
        ];
    }
}
