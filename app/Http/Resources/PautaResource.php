<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PautaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'detalhes' => $this->detalhes,
            'auto' => $this->autor,
            'status' => $this->status
        ];
    }
}
