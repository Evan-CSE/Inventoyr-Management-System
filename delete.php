<?php
include('checkLogin.php');
include('db_config.php');
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $sql = $con->prepare("DELETE FROM Products where id=?");
    $sql->bind_param('s', $id);
    $sql->execute();
    $sql->close();
    header('Location:show_all.php');
}
?>