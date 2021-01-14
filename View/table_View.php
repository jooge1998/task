<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLA</title>
</head>

<body>



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

                        foreach ($guar as $r => $key) {
                            echo " <tr>";
                            echo " <th scope='row'> " . $key['ID'] . "</th>";
                            echo "<td> " . $key['TITLE'] . " </td>";
                            echo "<td> " . $key["DESCRIPTION"] . "</td>";
                            echo "<td><a class='btn btn-danger ' href='?delete&id=". $key['ID'] . "'>ELIMINAR</a> 
                             <a class='btn btn-success ' href='?edit&id=". $key['ID'] . "'>EDITAR</a> <td>
                            </tr>";
                        }
                     
                    ?> 

                </tbody>
            </form>
        </table>
    </div>



</body>

</html>