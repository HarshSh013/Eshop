<?php
	$Product_id = $_POST['Product_id'];
	$product_name = $_POST['product_name'];
    $Rating = $_POST['Rating'];
	$Type = $_POST['Type'];
	$Colour = $_POST['Colour'];
	$Age_grp = $_POST['Age_grp'];
    $Size = $_POST['Size'];
    $Reviews = $_POST['Reviews'];
    $Gender = $_POST['Gender'];
    $Commission=$_POST['Commission'];
    $Cost=$_POST['Cost'];
    $Quantity=$_POST['Quantity'];
    $Seller_id=$_POST['Seller_id'];

	// Database connection
	$conn = new mysqli('localhost:3307','root','','ecom');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into product(Product_id, product_name,Rating, Type, Colour, Age_grp,Size,Reviews,Gender,Commission,Cost ,Quantity,Seller_id) values(?, ?, ?, ?, ?, ?, ?,?,?, ?, ?,?,?)");
		$stmt->bind_param("sssssssssssss", $Product_id, $product_name,$Rating, $Type, $Colour, $Age_grp,$Size,$Reviews,$Gender,$Commission,$Cost ,$Quantity,$Seller_id);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		echo "<a href='homemain.html' target='_blank'>Return To Home Page</a>";
		$stmt->close();
		$conn->close();
	}
?>