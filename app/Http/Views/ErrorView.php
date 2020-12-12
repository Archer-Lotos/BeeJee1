<?php
namespace Http\Views;

class ErrorView extends View
{
    const TEMPLATE = '
<!DOCTYPE html>
<html lang="ru">
    <head>
    <title>{{title}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <meta charset="utf-8"> 
</head>
<body>
    <div class="container" align="center">
        <h2>
            <font color="red">
                Error: {{error_message}}
            </font>
        </h2>
        <h1>
            <font color="red">
                <a href="task/ok">Ok</a>
            </font>
        </h1>
    </div>
</body>
</html>';

    protected $templateReplacements;

    public function __construct($error_message)
    {
        $this->templateReplacements = [
            '{{title}}' => "Error",
            '{{error_message}}' => $error_message
        ];
    }

    public function render()
    {
        return str_replace(
            array_keys($this->templateReplacements),
            array_values($this->templateReplacements),
            $this::TEMPLATE);
    }
}