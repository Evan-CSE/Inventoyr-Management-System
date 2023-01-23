<?php
session_start();
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


    //check if user exists
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['loggedIn'] = 'loggedIn';
        echo "Login success";
        header('Location:index.php');
    }
}
?>
<?php
include('header.php')
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form action="login.php" method='post'>
                <h1 class="text-center">Login</h1>
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
        don't have an account? Register <a href='register.php'>here</a>
    </p>
</div>
<?php
include('footer.php')
    ?>