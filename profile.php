<?php
require_once 'header.php';

if (!$loggedin) die();
  
echo "<div class='main'><h3>Your Profile</h3>";

$result = queryMysql ("SELECT * FROM members WHERE username='$user'");

$rows = $result->num_rows;

for ($j = 0 ; $j < $rows ; ++$j)
{
$result->data_seek($j);
echo 'Name: '   . $result->fetch_assoc()['MemberName']   . '<br>';
$result->data_seek($j);
echo 'Username: '    . $result->fetch_assoc()['Username']    . '<br>';
$result->data_seek($j);
echo 'Password: ' . $result->fetch_assoc()['UsernamePassword'] . '<br>';
$result->data_seek($j);
echo 'Contact No: '     . $result->fetch_assoc()['ContactNumber']     . '<br>';
$result->data_seek($j);
echo 'Address: '     . $result->fetch_assoc()['Address']     . '<br>';
$result->data_seek($j);
echo 'Next Of Kin: '   . $result->fetch_assoc()['NextOfKin']   . '<br>';
$result->data_seek($j);
echo 'Sex: '    . $result->fetch_assoc()['Sex']    . '<br>';
$result->data_seek($j);
echo 'Date Of Birth: ' . $result->fetch_assoc()['DateOfBirth'] . '<br>';
$result->data_seek($j);
echo 'Membership: '     . $result->fetch_assoc()['Membership']     . '<br>';
$result->data_seek($j);
echo 'Personal Trainer: '     . $result->fetch_assoc()['PersonalTrainer']     . '<br>';
$result->data_seek($j);
echo 'Time Selected: '     . $result->fetch_assoc()['TimeSelected']     . '<br>';
}
  
echo <<<_END
<form action="updateprofile.php" method="POST"><pre>
<h1>Please enter characters in caps.</h1>
Name: <input type="text" name="membername" placeholder="First & Last name">
Username: <input type="text" name="username" required="required">
Password: <input type="text" name="usernamepassword">
Contact Number: <input type="text" name="contactnumber" placeholder="01234789" maxlength="10">
Address: <input type="text" name="address" placeholder="No. Street, Suburb & City">
Next Of Kin: <input type="text" name="nextofkin" placeholder="First & Last name">
Sex:
<select name="sex" size="1">
  <option value="FEMALE">FEMALE</option>
  <option value="MALE">MALE</option>
</select>
Date Of Birth: <input type="text" name="dateofbirth" placeholder="YYYY-MM-DD">
Membership:
<select name="membership" size="1">
  <option value="JUNIOR">JUNIOR</option>
  <option value="BEGINNER">BEGINNER</option>
  <option value="ADVANCED">ADVANCED</option>
  <option value="PROFESSIONAL">PROFESSIONAL</option>
</select>
Personal Trainer:
<select name="personaltrainer" size="1">
  <option value="NO">NO</option>
  <option value="YES">YES</option>
</select>
Time Selected: <input type="text" name="timeselected" placeholder="HH:SS"><br>
<input type="submit" value="Update Profile">
</pre></form>
_END;
  
?>