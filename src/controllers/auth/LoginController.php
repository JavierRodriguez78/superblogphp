<?php
namespace App\controllers\auth;
use App\controllers\Controller;
use App\DoctrineManager;
use App\models\entities\User;


class LoginController extends Controller
{

    private $error;
 
    public function index(){

        $this->error = null;
        $this->viewManager->renderTemplate('\auth\login.view.html');
    }
    
    public function login(DoctrineManager $doctrine){
        $email = $_POST['email'];
        $password = $_POST['passwd'];
        $repository=$doctrine->em->getRepository(User::class);
        $user = $repository->findOneByEmail($email);
        if(!$user){
            $this->error="El usuario no existe";
           return  $this->viewManager->renderTemplate('\auth\login.view.html',['error'=>$this->error]);
        }
        if($user->password !== sha1($password)) {
            $this->error="El usuario o password es incorrecto";
            return  $this->viewManager->renderTemplate('\auth\login.view.html',['error'=>$this->error]);
        }
        $this->sessionManager->put('user',$user->id);
        $this->redirectTo('dashboard');
    }
}