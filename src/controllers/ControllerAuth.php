<?php
namespace App\controllers;
use App\ViewManager;
use App\LogManager;
use App\SessionManager;
use App\services\UsersService;
use DI\Container;
use App\DoctrineManager;
use Kint;
abstract class ControllerAuth
{

    protected $container;
    protected $viewManager;
    protected $sessionManager;
    protected $logger;
    protected $user;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->viewManager = $this->container->get(ViewManager::class);
        $this->logger = $this->container->get(LogManager::class);
        $this->logger->info("Clase ".get_class($this)." cargada");
        $this->sessionManager = $this->container->get(SessionManager::class);
        if ($this->sessionManager->get('user'))  $this->auth();
    }

    public abstract function index();

    public function redirectTo(string $page)
    {
        $host= $_SERVER['HTTP_HOST'];
        $uri= rtrim(dirname($_SERVER['PHP_SELF'],'/\\'));
        header("Location: http://$host$uri/$page");
    }

    public function auth()
    {
     $usersService = $this->container->get(UsersService::class);
     $this->user= $this->sessionManager->get('user');
    
     if(!$this->user) return $this->redirectTo('login');
    }
}