<?php
include('checkLogin.php');
include('header.php');
include('db_config.php');
?>
<a style="text-decoration: none;" href='generate_csv.php'> Generate whole data into CSV File </a>
<table class='table'>
    <thead class='thead-dark'>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Supplier</th>
            <th>Stock</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch all products from the products table
        $query = "SELECT * FROM Products";
        $result = mysqli_query($con, $query);

        // Iterate through each product and create a table row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['productName'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['supplier'] . "</td>";
            echo "<td>" . $row['stock'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>";
            echo "<a href='edit_product.php?id=" . $row['id'] . "'>Edit</a> | ";
            echo "<a href='delete.php?id=" . $row['id'] . "'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<?php
include('footer.php');
?>