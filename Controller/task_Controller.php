<?php

/* MODELO */

require_once 'Model/task_Model.php';

$task = new task();
$guar = $task->view();


if ( isset($_REQUEST['edit'])) {
  $title = $task->muestra("TITLE");
  $description = $task->muestra("DESCRIPTION");

}else if(isset($_REQUEST['delete'])) {

    $task->delete();
}

if (isset($_POST['btn'] ) && isset($_REQUEST['edit'])) {
  
    $task->edit();
    header('Location: index.php');   
} else if (isset($_POST['btn'] ) ) {

      $task->insert();
      header('Location: index.php');
}  

/* VIEW */

require_once "View/card_View.php";
require_once "View/table_View.php"; 





?>