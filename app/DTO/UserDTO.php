<?php
namespace App\DTO;

class UserDTO{
    public function __construct(
        public string $name,
        public string $email
    )
    {}
    public static function fromArray(array $data):self{
        return new self(
            $data['name'],
            $data['email']
        );
    }
    public function toArray(): array{
        return [
            'name' => $this->name,
            'email' => $this->email
        ];
    }
}
