<?php
    
    class Crud
    {   
    //Properties 
    private $username = "nicole_web_shop_user";
    private $password = "5-W?QM&mEXws%V>";
    private $connectionString = "mysql:host=localhost;dbname=nicole_web_shop_user";
    private $pdo = null;
    private $stmt;

    private function connectDatabase()
    {
        $this -> pdo = new PDO($this -> connectionString, $this -> username, $this -> password);
        $this -> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    private function prepareAndBind($sql, $params)
    {
        $this -> stmt = $this -> pdo-> prepare("$sql"); 
        foreach ($params as $key => $value)
        {
            $this -> stmt -> bindValue($key, $value);
        }
        $this -> stmt -> execute();
    }
    
    public function createRow($sql, $params)
    {
        $this -> connectDatabase();
        $this -> prepareAndBind($sql, $params);
        echo 'Hij komt hier <br>'; var_dump($this -> pdo);
        return $this -> pdo -> lastInsertId();
    }

    public function readOneRow($sql, $params)
    {
        $this -> connectDatabase();
        $this -> prepareAndBind($sql, $params);
        return $this -> stmt -> fetch(PDO::FETCH_OBJ);
    }

    public function readManyRows($sql, $params)
    {
        $this -> connectDatabase();
        $this -> prepareAndBind($sql, $params);
        // een array van objecten teruggeven
        return $this -> stmt -> fetchAll(PDO::FETCH_OBJ);
    }

    public function updateRow($sql, $params)
    {
        $this -> connectDatabase();
        $this -> prepareAndBind($sql, $params);
        //Hoeft niets terug te geven van de opdracht
    }

    public function deleteRow($sql, $params)
    {
        $this -> connectDatabase();
        $this -> prepareAndBind($sql, $params);
        //Hoeft niets terug te geven van de opdracht
    }
}
?>