<?php
namespace Http\Models;

class TaskModel extends Model
{
    public $username = 'имя пользователя';
    public $description = 'суть задачи';
    public $email = 'email';
    public $isDone = 'выполнено';
    public $isModified = 'изменено админом';


    function getData()
    {
        return $this->db->query('SELECT * FROM tasks')->fetchAll();
    }

    function insertData($description, $username="anonymous", $email=null)
    {
        $statement = $this->db->prepare('INSERT INTO tasks (username, email, description) VALUES
                    (?,?,?)');
            return $statement->execute([$username,$email,$description]);
    }

    function updateData($id, $description, $isDone)
    {
        $statement = $this->db->prepare('UPDATE tasks SET description=?, isModified=1, isDone=? WHERE id=?');
        return $statement->execute([$description,$isDone,$id]);
    }
}