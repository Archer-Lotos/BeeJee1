<?php
namespace Http\Decorators;

abstract class Decorator
{
    public static function create($className,$model)
    {
        $className = 'Http\\Decorators\\' . ucfirst($className) . 'Decorator';
        return new $className($model);

    }

    abstract public function title();
    abstract public function content();
}