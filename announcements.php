<?php


require_once 'header.php';

if (!$loggedin) die();


echo "<div class='main'><h3>Announcements</h3>";
// Initialize message variable 
$msg = "";
// If upload button is clicked ... 
if (isset($_POST['upload'])) { 
// Get file name
$image = $_FILES['image']['name'];
$audio = $_FILES['audio']['name'];
$video = $_FILES['video']['name'];

// Get text 
$text = $_POST['text'];
// File directory 
$target = "files/images/".basename($image);
$target = "files/audios/".basename($audio);
$target = "files/videos/".basename($video);

$result = queryMysql ("INSERT INTO announcements (image_, text_, audio_, video_) VALUES ('$image', '$text', '$audio', '$video')");

if (move_uploaded_file($_FILES['image']['tmp_name'] && $_FILES['audio']['tmp_name'] && $_FILES['video']['tmp_name'], $target))
{ $msg = "File uploaded successfully"; }

else{ $msg = "Failed to upload post"; }
} 

$result = queryMysql ("SELECT * FROM announcements");

?> 

<!DOCTYPE html> 
<html> 
<head> 
<title>Announcements</title>
<style type="text/css">
    
#content{ 
width: 50%; 
margin: 20px auto; 
/*border: 1px solid #cbcbcb; */
}

form{ 
width: 80%;
margin: 20px auto;}   

form div{ 
margin-top: 5px;}

#img_div{ width: 80%; 
padding: 5px; 
margin: 15px auto; 
border: 1px solid #cbcbcb;}

#img_div:after{ 
content: ""; 
display: block; 
clear: both;}   

img{ float: left;
margin: 5px; 
width: 300px; 
height: 200px;}

</style> 
</head> 
<body> 
<div id="content">

<?php
if($user=="ADMIN")
{
echo <<<_END
<form method="POST" action="announcements.php" enctype="multipart/form-data">
<h1>Create a post:</h1>
<br>
<input type="hidden" name="size" value="1000000"> 
<div> 
Select Image: <input type="file" name="image"> 
</div>
<div> 
Select Audio: 
<input type="file" name="audio"> 
</div>
<div>
Select Video: 
<input type="file" name="video"> 
</div>
<br>
<div> 
<textarea  id="text"
cols="40" 
rows="4" 
accesskey=""
name="text" 
placeholder="Say something about this post...">
</textarea>
</div>
<div>
<button type="submit" name="upload">POST</button>
</div>
</form>
</div>
</body>
</html>

_END;
}
?>    
    
<?php while     
    
($row = mysqli_fetch_array($result)) 
{echo "<div id='img_div'>";
echo "<img src='files/images/".$row['image_']."' >";
//echo "<audio controls>";
echo "<source src='files/audios/".$row['audio_']."' type='audio/mp3'>";
//echo "</audio>";
//echo "<video width='560' height='320' controls>";
echo "<source src='files/videos/".$row['video_']."' type='video/mp4'>";
//echo "/video>";
echo "<p>".$row['text_']."</p>"; 
echo "</div>";
}

?>
    
