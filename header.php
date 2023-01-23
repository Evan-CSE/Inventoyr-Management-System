<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <?php
                    if (!isset($_SESSION['loggedIn'])) {
                        echo '<li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    ';
                    } else
                        echo '

                    <li class="nav-item">
                    <a class="nav-link" href="generate.php">Generate CSV</a>
                </li>
                        <li class="nav-item">
                        <a class="nav-link" href="add_product.php">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="show_all.php">All Product</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
                
                ';
                    ?>
                </ul>
            </div>
        </div>
    </nav>