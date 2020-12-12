<?php


namespace Http\Decorators;


class TaskDecorator extends Decorator
{
    public $tasks;

    public function __construct($tasks)
    {
        $this->tasks = $tasks;
    }

    public function title()
    {
        return 'Задачи';
    }

    public function navbar()
    {
        return '
        <nav class="navbar navbar-light bg-light justify-content-between">
                <p align="center" class="navbar-brand">Задачи</p>
                <form class="form-inline" action="task/login" method="post">
                <input class="form-control mr-sm-2" type="text" placeholder="Логин" name="login">
                <input class="form-control mr-sm-2" type="password" placeholder="Пароль" name="password">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Войти</button>
            </form>
        </nav>';
    }

    private function tableHeaderRender()
    {
        return "<thead>
                <tr>
                    <th>{$this->tasks->username}</th>
                    <th>{$this->tasks->email}</th>
                    <th>{$this->tasks->description}</th>
                </tr>
                </thead>";
    }

    private function rowRender($row)
    {
        $doneClass = $row['isDone'] ? 'bg-success' : '';
        $modifiedPrefix = $row['isModified'] ? 'изменено админом' : '';
        return "<tr class='{$doneClass}'>
                    <td>{$row['username']}</td>
                    <td>{$row["email"]}</td>
                    <td>{$row["description"]} <span class='badge badge-info'>$modifiedPrefix</span></td>
                </tr>";
    }

    public function content()
    {
        $tableContent = '<table id="tasks" class="table table-striped table-bordered">';
        $tableContent .= $this->tableHeaderRender();
        foreach ($this->tasks->getData() as $task)
        {
            $tableContent .= $this->rowRender($task);
        }
        return $tableContent . '</table>';
    }
}