<?php

include_once('ddbb.php');

class task extends DB{

    private $title;
    private $description;

    public function insert(){

        try {

            $query = $this->connect()->prepare('INSERT INTO datos(TITLE, DESCRIPTION) VALUES (?,?)');
            $query->execute([$_POST['title'],
                            $_POST['description'] ]);

        } catch (PDOException $e){
            echo $e->getMessage();
        }


    }
    




}





?>