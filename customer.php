<?php
	$Customer_id = $_POST['Customer_id'];
	$ID_Proof = $_POST['ID_Proof'];
    $C_Pass = $_POST['C_Pass'];
	$Name = $_POST['Name'];
	$Address = $_POST['Address'];
	$Pincode = $_POST['Pincode'];
    $City = $_POST['City'];
    $Phone_No = $_POST['Phone_No'];
    $Email = $_POST['Email'];
    $Cart_id=$_POST['Cart_id'];
    $product_id=$_POST['product_id'];

	// Database connection
	$conn = new mysqli('localhost:3307','root','','ecom');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into customer(Customer_id, ID_Proof,C_Pass, Name, Address, Pincode,City,Phone_No,Email,Cart_id,product_id ) values(?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");
		$stmt->bind_param("sssssssssss", $Customer_id, $ID_Proof,$C_Pass, $Name, $Address, $Pincode,$City,$Phone_No,$Email,$Cart_id,$product_id);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		echo "<a href='homemain.html' target='_blank'>Return To Home Page</a>";
		$stmt->close();
		$conn->close();
	}
?>