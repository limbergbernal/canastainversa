<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use UserService;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index(){
        return "index";
    }
    public function store(StoreUserRequest $request){
        $user = $this->userService->create($request->validated());

        return new UserResource($user);
    }
}
