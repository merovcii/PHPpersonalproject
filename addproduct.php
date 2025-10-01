<?php	

//Including config.php file for connection with database 
	include_once('config.php');

//If the button Add Movie in movies.php is pressed, we will get datas that users added into the form, and insert them into database :
	if(isset($_POST['submit']))
	{

		$products_name = $_POST['products__name'];
		$products__desc = $_POST['products__desc'];
		$products__quality = $_POST['products__quality'];
		$products__rating = $_POST['products__rating'];
		$products__image = $_POST['products__image'];
	

		$sql = "INSERT INTO products(products_name, products_desc, products_quality,products_rating)";

		
		$insertProduct = $conn->prepare($sql);
		$insertProduct->bindParam(':id',$id);
		$insertProduct->bindParam(':products_name',$products_name);
		$insertProduct->bindParam(':products_desc',$products_desc);
		$insertProduct->bindParam(':products_quality',$products_quality);
		$insertProduct->bindParam(':products_rating',$products_rating);

		$insertProduct->execute();

		// Set success message
		session_start();
		$_SESSION['success_message'] = "Movie added successfully!";

		// Redirect to dashboard
		header("Location: dashboard.php");
		exit;
	}
?>