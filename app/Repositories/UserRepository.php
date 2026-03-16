<?php

use App\DTO\UserDTO;
use App\Models\User;

class UserRespository{
    public function paginate($search = null){
        return User::when($search, function($q) use ($search){
            $q->where('name','like',"%$search%");
        })->paginate(10);
    }
    public function create(UserDTO $dto): User{
        return User::create($dto->toArray());
    }

    public function update(User $user, userDTO $dto): User{
        $user->update($dto->toArray());

        return $user;
    }

    public function delete(User $user): void{
        $user->delete();
    }
}
