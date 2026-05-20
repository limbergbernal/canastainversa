<?php
namespace App\DTO;
class DistritoData{
    public function __construct(
        public readonly string $distrito,
        public readonly int $numero,
        public readonly string $estado,
    )
    {}

    public static function fromArray(array $data): self{
        return new self(
            distrito: $data['distrito'],
            numero: $data['numero'],
            estado: $data['estado'],
        );
    }
    public function toArray(): array{
        return[
            'distrito' => $this->distrito,
            'numero' => $this->numero,
            'estado' => $this->estado
        ];
    }
}
