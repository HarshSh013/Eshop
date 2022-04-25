<?php
	$Seller_id = $_POST['Seller_id'];
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	$Phone_No = $_POST['Phone_No'];

	// Database connection
	$conn = new mysqli('localhost:3307','root','','ecom');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into seller(Seller_id, Name, Email, Password, Phone_No) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $Seller_id, $Name, $Email, $Password, $Phone_No);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		echo "<a href='sell.html' target='_blank'>Want To Sell</a>";
		echo "<a href='homemain.html' target='_blank'>Return To Home Page</a>";
		$stmt->close();
		$conn->close();
	}
?>