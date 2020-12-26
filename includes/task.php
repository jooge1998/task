<?php

include_once('ddbb.php');

class task extends DB{

  /*   private $title;
    private $description; */

    public function insert(){

        try {

            $query = $this->connect()->prepare('INSERT INTO task(TITLE, DESCRIPTION) VALUES (?,?)');
            $query->execute([$_POST['title'],
                            $_POST['description'] ]);

        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function delete(){
 
        try {

            $query = $this->connect()->prepare('DELETE FROM `task` WHERE ID = ?');
            $query->execute(array($_REQUEST['id']));

        } catch (PDOException $e){
            echo $e->getMessage();
        }

       header('Location: index.php');   
    }

     public function edit(){
 
        try {

            $query = $this->connect()->prepare('UPDATE `task` SET TITLE= ? ,DESCRIPTION= ? WHERE ID = ?');
            $query->execute([$_POST['title'],
                            $_POST['description'],
                            $_REQUEST['id']]);

        } catch (PDOException $e){
            echo $e->getMessage();
        }

    
    } 

    public function muestra($t){

        try {

            $query = $this->connect()->prepare('SELECT * FROM task WHERE ID = ?');
            $query->execute([$_REQUEST['id']]);

            $result = $query->fetchAll(pdo::FETCH_ASSOC);

            foreach ($result as $key) {

                 if (!strcmp($t,"TITLE")) {
                    return $key["TITLE"];
                 } else {
                    return $key["DESCRIPTION"];
                 }

             }  

        }catch(PDOException $e){
            echo $e->getMessage();
         } 
    }

    public function view(){

        try {

            $query = $this->connect()->prepare('SELECT * FROM task');
            $query->execute();

            $result = $query->fetchAll(pdo::FETCH_ASSOC);
            
                foreach ($result as $r ) {
                    echo " <tr>";
                    echo " <th scope='row'> " . $r['ID'] . "</th>";
                    echo "<td> " . $r['TITLE'] . " </td>";
                    echo "<td> " . $r["DESCRIPTION"] . "</td>";
                    echo "<td><a class='btn btn-danger ' href='?delete&id=". $r['ID'] . "'>ELIMINAR</a> 
                     <a class='btn btn-success ' href='?edit&id=". $r['ID'] . "'>EDITAR</a> <td>
                    </tr>";
                    
                }                                      

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    }
    










?>