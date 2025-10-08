<?php 
 /*
  We will include config.php for connection with database.
  We will fetch all datas from movies in database and show them.
  */
	
   include_once('config.php');

   
   $sql = "SELECT * FROM products";
   $selectproducts = $conn->prepare($sql);
   $selectproducts->execute();
   $products_data = $selectproducts->fetchAll();




 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Home</title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
  	<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
	<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
	<meta name="theme-color" content="#7952b3">
 </head>
 <body>

 	<header>

  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Products</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <a href="dashboard.php"><span class="navbar-toggler-icon"></span></a>
      </button>
    </div>
  </div>
</header>
 
 	<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">


  


 </body>
 </html>
 <style>

   .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
    }

    .product-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      text-align: center;
      transition: transform 0.2s ease;
    }

    .product-card:hover {
      transform: scale(1.02);
    }

    .product-card img {
      width: 100%;
      height: auto;
    }

    .product-info {
      padding: 15px;
    }

    .product-title {
      font-size: 1.1em;
      margin: 0 0 10px;
    }

    .product-price {
      color: #28a745;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <h1>Our Products</h1>
  <div class="product-grid">
    <div class="product-card">
      <div class="product-info">
        <div class="product-title">White T-shirt</div>
        <img src="images/product1.webp" alt="Product 1">
        <div class="product-price">$19.99</div>
      </div>
    </div>
    
    <div class="product-card">
      <div class="product-info">
        <div class="product-title">White shoes</div>
        <img src="images/product2.webp" alt="Product 2">
        <div class="product-price">$29.99</div>
      </div>
    </div>

        <div class="product-card">
      <div class="product-info">
        <div class="product-title">Black Hat</div>
        <img src="images/product3.avif" alt="Product 3">
        <div class="product-price">$15.99</div>
      </div>
    </div>


        <div class="product-card">
      <div class="product-info">
        <div class="product-title">Brown scarf for the winter</div>
        <img src="images/product4.webp" alt="Product 2">
        <div class="product-price">$9.99</div>
      </div>
    </div>


        <div class="product-card">
      <div class="product-info">
        <div class="product-title">Hoodies</div>
        <img src="images/product5.jpg" alt="Product 2">
        <div class="product-price">$7.99</div>
      </div>
    </div>


    <!-- Add more products here -->
  </div>

</body>
</html>