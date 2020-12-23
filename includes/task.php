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
            $query->execute(array($_REQUEST['delete']));

        } catch (PDOException $e){
            echo $e->getMessage();
            
        }

        header('Location: index.php');

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
                    echo "<td> <input class='btn btn-danger' name='delete' type='submit' value=" . $r["ID"] . "> </td>
                    </tr>";
                }               
                           

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    }
    










?>