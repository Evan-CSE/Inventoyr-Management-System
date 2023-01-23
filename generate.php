<?php
include('header.php');
include('checkLogin.php'); ?>
<div class='text-center'>
    <form action='generate_csv.php'>
        <input type='text' placeholder="Type minimum stock" name='min_stock'>
        <input type='text' name='info_type' value='defined' hidden>
        <input type='submit' value='Submit'>
    </form>
    <form action='generate_csv.php'>
        <input type='text' placeholder="Type minimum price" name='by_min_price'>
        <input type='text' name='info_type' value='defined' hidden>

        <input type='submit' value='Submit'>
    </form>
</div>
<?php
include('footer.php')
    ?>