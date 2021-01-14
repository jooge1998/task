<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Card task</title>
</head>

<body>

    <div class="p-3 card  col-3">
        <form action="#" method="POST">

            <h1 class="text-center ">Task</h1>
            <div class="mb-3 align-self-center">
                <label for="exampleFormControlInput1" class="form-label">Title task</label>
                <input type="text" class="form-control" value="<?php if(isset($_REQUEST['edit'])) echo $title; ?>" name="title" placeholder="title dask">
            </div>
            <div class="mb-3 align-self-center">
                <label for="exampleFormControlTextarea1" class="form-label">Description Task</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5"><?php if(isset($_REQUEST['edit'])) echo $description; ?></textarea>
            </div>

            <input class="btn btn-primary " name="btn" type="submit" value="Save">
        </form>
    </div>

</body>

</html>