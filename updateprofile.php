<?php
require_once 'header.php';
require_once 'functions.php';

if (!$loggedin) die();

echo "<div class='main'><h3>Profile Update</h3>";

if(isset($_POST['membername']) && $_POST['membername'] != NULL) $MemberName = sanitizeString($_POST['membername']);
else {echo "Please enter \"Name\". Click on \"Profile\" to continue."; exit(0) ; }
if(isset($_POST['username']) && $_POST['username'] != NUll)$Username = sanitizeString($_POST['username']);
else {echo "Please enter \"Username\". Click on \"Profile\" to continue."; exit(0) ; }
if(isset($_POST['usernamepassword']) && $_POST['usernamepassword'] != NULL)$UsernamePassword = sanitizeString($_POST['usernamepassword']);
else {echo "Please enter \"Password\". Click on \"Profile\" to continue."; exit(0) ; }
if(isset($_POST['contactnumber']) && $_POST['contactnumber'] != NULL)$ContactNumber = sanitizeString($_POST['contactnumber']);
else {echo "Please enter \"Contact Number\". Click on \"Profile\" to continue."; exit(0) ; }
if(isset($_POST['address']) && $_POST['address'] != NULL)$Address= sanitizeString($_POST['address']);
else {echo "Please enter \"Address\". Click on \"Profile\" to continue."; exit(0) ; }
if(isset($_POST['nextofkin']) && $_POST['nextofkin'] != NULL)$NextOfKin = sanitizeString($_POST['nextofkin']);
else {echo "Please enter \"Next Of Kin\". Click on \"Profile\" to continue."; exit(0) ; }
if(isset($_POST['sex']) && $_POST['sex'] != NULL)$Sex = sanitizeString($_POST['sex']);
else {echo "Please enter \"Sex\". Click on \"Profile\" to continue."; exit(0) ; }
if(isset($_POST['dateofbirth']) && $_POST['dateofbirth'] != NULL)$DateOfBirth = sanitizeString($_POST['dateofbirth']);
else {echo "Please enter \"Date Of Birth\". Click on \"Profile\" to continue."; exit(0) ; }
if(isset($_POST['membership']) && $_POST['membership'] != NULL)$Membership = sanitizeString($_POST['membership']);
else {echo "Please enter \"Membership\". Click on \"Profile\" to continue."; exit(0) ; }
if(isset($_POST['personaltrainer']) && $_POST['personaltrainer'] != NULL)$PersonalTrainer = sanitizeString($_POST['personaltrainer']);
else {echo "Please enter \"Personal Trainer\". Click on \"Profile\" to continue."; exit(0) ; }
if(isset($_POST['timeselected']) && $_POST['personaltrainer'] = "YES" && $_POST['timeselected'] != NULL)$TimeSelected = sanitizeString($_POST['timeselected']);
else {echo "Please enter \"Time Selected\". Click on \"Profile\" to continue."; exit(0) ; }

$result = queryMysql("UPDATE members SET MemberName = '$MemberName' , Username = '$Username' , UsernamePassword = '$UsernamePassword' , ContactNumber = '$ContactNumber' , Address = '$Address' , NextOfKin = '$NextOfKin' , Sex = '$Sex' , DateOfBirth = '$DateOfBirth' , Membership = '$Membership' , PersonalTrainer = '$PersonalTrainer' , TimeSelected = '$TimeSelected' WHERE Username = '$Username' ");

echo <<<_END
<form action="profile.php" method="POST"><pre>
Your profile has been updated successfully.
<br>
<input type="submit" value="View Profile">
_END;

?>

