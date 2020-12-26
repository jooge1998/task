<?php

include_once 'includes/task.php';
$task = new task();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <div class="container mt-5 ">

        <div class="row ">
            <div class="p-3 card  col-3">
                <form action="#" method="POST">

                    <h1 class="text-center ">Task</h1>
                    <div class="mb-3 align-self-center">
                        <label for="exampleFormControlInput1" class="form-label">Title task</label>
                        <input type="text" class="form-control" value="<?php echo isset($_REQUEST['edit']) ?  $task->muestra("TITLE") : NULL; ?>" name="title" placeholder="title dask">
                    </div>
                    <div class="mb-3 align-self-center">
                        <label for="exampleFormControlTextarea1" class="form-label">Description Task</label>
                        <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" rows="5"><?php echo isset($_REQUEST['edit']) ?  $task->muestra("DESCRIPTION") : NULL; ?></textarea>
                    </div>

                    <input class="btn btn-primary " name="btn" type="submit" value="Save">
                </form>
            </div>

            <?php

if (isset($_POST['btn'] ) && isset($_REQUEST['edit'])) {
  
    $task->edit();
    header('Location: index.php');   
} else if (isset($_POST['btn'] ) ) {

                $task->insert();
            } 

            ?>

            <div class="col-8">
                <table class="table table-hover">

                    <form action="" method="$_REQUEST">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">Description</th>
                                <th scope="col">OPCION</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $task->view();

                            if (isset($_REQUEST['delete'])) {

                                $task->delete();
                            }

                            ?>

                        </tbody>
                    </form>
                </table>
            </div>


        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>

</html>