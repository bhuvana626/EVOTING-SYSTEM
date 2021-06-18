<?php
include('WhatsappAPI.php');
$obj=new WhatsappAPI;
$check=$obj->send("+916302451188",$code is your code to vote);
if($check)
    echo "A Code is sent to your mobile.Don't share it with anyone";
else
{
	echo "error in sending messages";
}
?>
