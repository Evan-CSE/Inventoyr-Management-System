<?php
if (isset($_SESSION['loggedIn'])) {
    header('Location:index.php');
    exit;
}

// Import $con for connection object
include('db_config.php');
if (isset($_POST['submit-btn'])) {

    // filter inputs 
    $user = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars(
        $_POST['password']
    );


    //check if username already exists
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        echo "<script>
            alert('Username already taken.Try another');
        </script>";
    } else {


        //now make sql query
        $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
        $con->query($sql);
        // print_r($con);
        if (!$con->errno)
            echo "Account created.Please login with the new account.";
        sleep(3);
        header('Location:login.php');
    }
}
?>
<?php
include('header.php')
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form action="register.php" method='post'>
                <h1 class="text-center">Registration</h1>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter your username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name='submit-btn'>Submit</button>
            </form>
        </div>
    </div>
    <p>
        Have an account? Login <a href='login.php'>here</a>
    </p>
</div>
<?php
include('footer.php')
    ?>