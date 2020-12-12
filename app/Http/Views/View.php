<?php
namespace Http\Views;

abstract class View
{
    abstract public function render();


    public static function create($class, $decorator)
    {
        $class =  'Http\\Views\\' . ucfirst($class).'View';
        $object = new $class($decorator);
        return $object;
    }
}