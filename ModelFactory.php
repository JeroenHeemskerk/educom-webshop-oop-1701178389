<?php

class Factory 
{
    //Properties
    
    //Methods
    public static function createCrud($name)
    {
        return (new ($name)Crud);
    }
    public static function createModel($name);
    {
        return (new ($name)Model);
    }
}
?>