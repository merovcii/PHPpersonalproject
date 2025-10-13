<?php 

	include_once('config.php');
	


	if (isset($_POST['submit1'])) {
		$id = $_POST['id'];
		$products_name = $_POST['products_name'];
		$products_desc = $_POST['products_desc'];
		$products_quality = $_POST['products_quality'];
		 $products_rating=$_POST['products_rating'];
		

		$sql = "UPDATE products SET id=:id,  products_name=:products_name, products_desc=:movie_desc, products_quality=:products_quality,products_rating=:products_rating WHERE id=:id";

		$prep = $conn->prepare($sql);
		$prep->bindParam(':id',$id);
		$prep->bindParam(':products_name',$products_name);
		$prep->bindParam(':products_desc',$products_desc);
		$prep->bindParam(':products_quality',$products_quality);
		$prep->bindParam(':products_rating',$products_rating);
		
		$prep->execute();
		header("Location: dashboard.php");
	}
 ?>