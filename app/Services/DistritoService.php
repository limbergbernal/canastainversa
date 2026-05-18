<?php

namespace App\Services;

use App\DTO\DistritoData;
use App\Models\Distrito;

class DistritoService{
    public function getAll(){
        return Distrito::orderBy('distrito','DESC')
                    ->get();
    }

    public function findById(int $id): Distrito{
        return Distrito::findOrFail($id);
    }

    public function store(DistritoData $data): Distrito{
        return Distrito::create(
            $data->toArray()
        );
    }

    public function update(int $id, DistritoData $data): Distrito{
        $distrito = Distrito::findOrFail($id);
        $distrito->update(
            $data->toArray()
        );
        return $distrito;
    }
    public function destroy(int $id): void{
        $distrito = Distrito::findOrFail($id);
        $distrito->delete();
    }
}
