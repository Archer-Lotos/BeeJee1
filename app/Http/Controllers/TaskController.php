<?php


namespace Http\Controllers;

use Configs\AdminConfig;

class TaskController extends Controller
{
    public function postTask()
    {
        $description = $_POST['description'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        if (preg_match("/[A-Za-z0-9\.\+_-]+@[A-Za-z0-9\._-]+\.[a-zA-Z]/", $email)) {
            $this->model->insertData($description, $username, $email);
        } else {
            $_SESSION['Error'] = 'email';
        }
        header('Location: /');
    }

    public function updateTask()
    {
        $isDone = $_POST['isDone'];
        $description = $_POST['description'];
        $id = $_POST['rowId'];
        $this->model->updateData($id, $description,$isDone);
        header('Location: /');
    }

    public function ok(){
        $_SESSION['Error'] = '';
        header('Location: /');
    }

    public function login(){
        $login = $_POST['login'];
        $password = $_POST['password'];
        if(AdminConfig::$admin_login_details['login'] == $login && AdminConfig::$admin_login_details['password'] == $password)
        {
            $_SESSION['isAdmin'] = 1;
        } else {
            $_SESSION['Error'] = 'access_credentials';
        }
        header('Location: /');
    }

    public function logout()
    {
        $_SESSION['isAdmin'] = 0;
        header('Location: /');
    }

    public function render()
    {
        if ($_SESSION['Error'] == 'email')
        {
            $view = \Http\Views\View::create('Error', "email не валиден");
        }
        else if ($_SESSION['Error'] == 'access_credentials') 
        {
            $view = \Http\Views\View::create('Error', "неправильные реквизиты доступа");
        }
        else 
        {
            if ($_SESSION['isAdmin'] == 1) 
            {
                $decorator = \Http\Decorators\Decorator::create('TaskAdmin', $this->model);
            } else {
                $decorator = \Http\Decorators\Decorator::create('Task', $this->model);
            }
            $view = \Http\Views\View::create($this->name, $decorator);
        }
        return $view->render();
    }
}