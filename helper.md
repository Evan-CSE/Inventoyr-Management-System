Check login status => $_SESSION['loggedIn']

## table used:
### users table schema():
users(id,username,password)
query =>{
    CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username TEXT NOT NULL,
    password TEXT NOT NULL
);
}

### Products table schema():
Products(id,productName,price,supplier,stock,category) 
query=>{
    CREATE TABLE Products (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(255) NOT NULL,
price DECIMAL(10,2) NOT NULL,
supplier VARCHAR(255) NOT NULL,
stock INT(11) NOT NULL,
category VARCHAR(255) NOT NULL
);
}