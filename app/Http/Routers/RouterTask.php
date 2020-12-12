<?php
namespace Http\Routers;

use Http\Controllers\TaskController;

class RouterTask
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function parse()
    {
        $controllerName = $this->path[1];

        if(isset($this->path[2])) 
        {
            $methodName = $this->path[2];
        }

        if(!empty($controllerName)) 
        {
            $className =  'Http\\Controllers\\' . ucfirst($controllerName) . 'Controller';
            $controller = new $className($controllerName);
        } else {
            $controller = new TaskController('Task');
        }

        if(!empty($methodName)) 
        {
            $controller->$methodName();
        }

        echo $controller->render();
    }
}
