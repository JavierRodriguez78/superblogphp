<?php
namespace App\controllers;
use App\services\UsersService;

class PostController extends ControllerAuth
{

 public function index(){
    // $usersService = $this->container->get(UsersService::class);
     //$id= $this->sessionManager->get('user');
     //$user = $usersService->getUserById($id);
    // if(!$user) return $this->redirectTo('login');
     $this->viewManager->renderTemplate('form-post.view.html', ['user'=>$this->user->email]);
 }
}