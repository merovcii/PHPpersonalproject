"CREATE TABLE users (
   id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(50) NOT NULL,
   email VARCHAR(100) UNIQUE NOT NULL,
   password TEXT NOT NULL
);"

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price VARCHAR(10,2) NOT NULL,
    ratings VARCHAR(255) NOT NULL,
);

INSERT INTO products(name, price, image) VALUES
('T-shirt' , 10.00, 'images/tshirt.webp')
('Shoes' , 30.00, 'images/shoes.webp')
('Hat' , 5.00, 'images/hat.avif')