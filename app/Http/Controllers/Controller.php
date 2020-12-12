<?php
namespace Http\Controllers;

abstract class Controller
{
    public $model;
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
        $modelClass = 'Http\\Models\\'.ucfirst($name).'Model';
        $this->model = new $modelClass;
    }

    public function render()
    {
        $decorator = \Http\Decorators\Decorator::create($this->name, $this->model);
        $view = \Http\Views\View::create($this->name, $decorator);
        return $view->render();
    }
}