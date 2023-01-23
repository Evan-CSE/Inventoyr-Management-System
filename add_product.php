<?php
include('checkLogin.php');
if (isset($_POST['submit-btn'])) {
    include('db_config.php');
    $productName = htmlspecialchars($_POST['productName']);
    $price = htmlspecialchars($_POST['price']);
    $supplier = htmlspecialchars($_POST['supplier']);
    $stock = htmlspecialchars($_POST['stock']);
    $category = htmlspecialchars($_POST['category']);
    $sql = $con->prepare("INSERT INTO Products (productName, price, supplier, stock, category) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("sisis", $productName, $price, $supplier, $stock, $category);
    $sql->execute();
    $result = $sql->get_result();
    if (!$sql->error) {
        echo "<h2 class='text-success'>New record created successfully</h3>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
include('header.php');
?>
<form method="post" action="add_product.php">
    <div class="form-group">
        <label for="productName">Product Name</label>
        <input type="text" class="form-control" name="productName" id="productName" placeholder="Enter Product Name">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price">
    </div>
    <div class="form-group">
        <label for="supplier">Supplier</label>
        <input type="text" class="form-control" name="supplier" id="supplier" placeholder="Enter Supplier">
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="text" class="form-control" name="stock" id="stock" placeholder="Enter Stock">
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control" name="category" id="category" placeholder="Enter Category">
    </div>
    <button type="submit" name='submit-btn' class="btn btn-primary">Submit</button>
</form>


<?php
include('footer.php');
?>