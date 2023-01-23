<?php
include('checkLogin.php');
include('header.php');
include('db_config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $con->prepare("SELECT * FROM Products where id=?");
    $sql->bind_param('s', $id);
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "Something went wrong";
    }
}
if (isset($_POST['submit-btn'])) {
    //get form data
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $supplier = $_POST['supplier'];
    $stock = $_POST['stock'];
    $category = $_POST['category'];
    $id = $_POST['id'];
    //create and execute update query
    $sql = $con->prepare("UPDATE Products SET productName=?, price=?, supplier=?, stock=?, category=? WHERE id=?");
    $sql->bind_param('sssssi', $productName, $price, $supplier, $stock, $category, $id);
    $sql->execute();
    print_r($sql);
    //check if query was successful
    if (!$sql->error) {
        echo "Product updated successfully.";
    } else {
        echo "Error updating product: " . mysqli_error($con);
    }
    $sql->close();
}
?>
<div class="container">
    <h1>Edit Product</h1>
    <form action="edit_product.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>" hidden>
        </div>
        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" class="form-control" id="productName" name="productName"
                value="<?php echo $data['productName']; ?>">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo $data['price']; ?>">
        </div>
        <div class="form-group">
            <label for="supplier">Supplier:</label>
            <input type="text" class="form-control" id="supplier" name="supplier"
                value="<?php echo $data['supplier']; ?>">
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $data['stock']; ?>">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" class="form-control" id="category" name="category"
                value="<?php echo $data['category']; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name='submit-btn'>Submit</button>
    </form>
</div>
<?php
include('footer.php');
?>