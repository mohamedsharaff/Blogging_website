<!doctype html>
<html lang="en">

<head>
    <title>Categories</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.2.0/dist/js/coreui.bundle.min.js"
        integrity="sha384-JdRP5GRWP6APhoVS1OM/pOKMWe7q9q8hpl+J2nhCfVJKoS+yzGtELC5REIYKrymn" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="cat.css">

</head>

<body>



    <?php include 'Header.php' ?>

    <table>
        <tr>
            <td>
                <?php include 'sidebar.php'  ?>
            </td>

            <td width="20px"></td>

            <!-- ADD Categories -->

            <td width="300px" class="addcat">
                <table class="Table">

                    <form>
                        <div class="mb-3">

                            <label for="Categories" class="form-label">Add Categories</label>
                            <input type="text" class="form-control" width="200px">
                            <div id="emailHelp" class="form-text">____</div>
                            
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </table> <br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>

            </td>

            <!-- Categories List -->

            <td width="50px"></td>


            <td>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Categories</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark </td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>

            </td>


        </tr>
    </table>




</body>

</html>