<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usertbl;
use App\Traits\ApiResponser;
use Illuminate\Http\Response; 
use App\Services\User1Service; 

Class User1Controller extends Controller {

    private $request;

    use ApiResponser;

    /**
    * The service to consume the User1 Microservice
    * @var User1Service
    */
    public $user1Service;
    
    /**
    * Create a new controller instance
    * @return void
    */
    public function __construct(User1Service $user1Service) {
        $this->user1Service = $user1Service;
    }

    /**
    * Return the list of users
    * @return Illuminate\Http\Response
    */
    public function index() {
        return $this->successResponse($this->user1Service->obtainUsers1());
    }

    public function add(Request $request ){
        return $this->successResponse($this->user1Service->createUser1($request->all(),Response::HTTP_CREATED));
    }

    /**
    * Obtains and show one user
    * @return Illuminate\Http\Response
    */
    public function show($id){
        return $this->successResponse($this->user1Service->obtainUser1($id));
    }

    /**
    * Update an existing author
    * @return Illuminate\Http\Response
    */
    public function update(Request $request,$id){
        return $this->successResponse($this->user1Service->editUser1($request->all(),$id));
    }

    /**
    * Remove an existing user
    * @return Illuminate\Http\Response
    */
    public function delete($id){
        return $this->successResponse($this->user1Service->deleteUser1($id));
    }
}