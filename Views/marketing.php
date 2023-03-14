<?php //home donde ya estaria logeado
session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['nombreUsuario']) && isset($_SESSION['nombreCompleto']) ){
        $nombreCompleto = $_SESSION['nombreCompleto'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketing Dashboard</title>
    <!-- Add external stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="./CSS/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h1>Welcome Marketing <?php echo $nombreCompleto;?></h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
                <li>
                    <a href="../Controllers/CerrarSesion.php">Cerrar Sesion</a>

                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h2>Revenue</h2>
                <p>$45,000</p>
            </div>
            <div class="col-md-4">
                <h2>Visitors</h2>
                <p>1,000,000</p>
            </div>
            <div class="col-md-4">
                <h2>Conversion Rate</h2>
                <p>2.5%</p>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <h2>Top Products</h2>
                <table id="topProductsTable" class="table table-striped responsive display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Sales</th>
                            <th>Revenue</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Product A</td>
                            <td>1,200</td>
                            <td>$24,000</td>
                        </tr>
                        <tr>
                            <td>Product B</td>
                            <td>900</td>
                            <td>$18,000</td>
                        </tr>
                        <tr>
                            <td>Product C</td>
                            <td>700</td>
                            <td>$14,000</td>
                        </tr>
                        <tr>
                            <td>Product D</td>
                            <td>600</td>
                            <td>$12,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
               

        
</body>
</html>

<?php } else{
    header('location: ../login.php');
    }?>