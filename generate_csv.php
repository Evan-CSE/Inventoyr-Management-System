<?php
include('db_config.php');
include('checkLogin.php');
//For generating all data
if (!isset($_GET['info_type'])) {
    $sql = $con->prepare("select * from Products");
}


//For generating data on low stock basis
if (isset($_GET['min_stock'])) {
    $min_stock = htmlspecialchars($_GET['min_stock']);
    $sql = $con->prepare("select * from Products where stock>=?");
    $sql->bind_param('s', $min_stock);
}

//For generating data on sales
if (isset($_GET['by_min_price'])) {
    $min_price = htmlspecialchars($_GET['min_price']);
    $sql = $con->prepare("select * from Products where stock<=?");
    $sql->bind_param('s', $min_price);
}
$sql->execute();
$result = $sql->get_result();
$fileName = "products.csv";
$delimiter = ",";

// Create a file pointer
$file = fopen('products.csv', 'w');

// Set column headers
$columnHeaders = array("Id", "Product Name", "Price", "Supplier", "Stock", "Category");
fputcsv($file, $columnHeaders, $delimiter);

// Output each row of the data
while ($row = $result->fetch_assoc()) {
    fputcsv($file, $row, $delimiter);
}

// Close the file
fclose($file);

// Download the file
header("Content-Type: text/csv; charset=UTF-8");
header("Content-Disposition: attachment; filename=$fileName");
readfile($fileName);

// Delete the file
unlink($fileName);
sleep(3);
// header('Location:show_all.php');

?>