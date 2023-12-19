<?php
class AjaxView{

    //Properties
    private $model;

    //Methods
    public function __construct($model)
    {
        $this -> model = $model;
    }

    public function show()
    {
        echo json_encode($this -> model -> output);
    }
}

?>