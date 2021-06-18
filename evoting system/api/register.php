<?php

 include("connect.php");
 include('WhatsappAPI.php');
 $name=$_POST['name'];
 $mobile=$_POST['mobile'];
 $password=$_POST['password'];
 $cpassword=$_POST['cpassword'];
 $aadhar=$_POST['aadhar'];
 $address=$_POST['address'];
 $image=$_FILES['photo']['name'];
 $tmp_name=$_FILES['photo']['tmp_name'];
 $role=$_POST['role'];
 $min=111111111111;
 $code=rand($min,$aadhar);
 
 $obj=new WhatsappAPI;
 $check=$obj->send("+".$mobile,"$code");
if($check)
    echo "A Code is sent to your mobile.Don't share it with anyone";
else
{
    echo "error in sending messages";
}
 $insert=mysqli_query($connect,"INSERT INTO user(name,mobile,password,address,aadhar,code,status,votes,photo,role) VALUES('$name','$mobile','$password','$address','$aadhar','$code',0,0,'$image','$role')");
    	if($insert)
    	{
    		echo '<script>
    		alert("Registration Successful");
    		window.location="../verification.html";
    		</script>';
    	}
    	else
    	{
    		echo '<script>
    		alert("Some Error occurred");
    		window.location="../verification.html";
    		</script>';
    	}
    
    ?>
 	