<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Appoinment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => strtoupper($this->reason),
            'desc' => strtoupper($this->desc),
            'start' => $this->begin,
            'end' => $this->end,
            'end' => $this->end,
            'session' => $this->session,
            'date_at'=> $this->date_at,
            'date_end'=> $this->date_end,
            'hour'=> $this->hour,
            'hour_end'=> $this->hour_end,
            'color' => $this->color,
            'textColor' => $this->textColor,
        ];
    }
}
