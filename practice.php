<?php
$connection = mysqli_connect("localhost","root","","form");
if($_POST){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$city=$_POST['city'];
$image=$_FILES['fileToUpload']['name'];
$pdfFile=$_FILES['pdfFile']['name'];
$traget="./image_folder/".basename($image);
$destination="./pdf_folder/".$pdfFile;
$sql="insert into practice(fname,lname,gender,age,city,image,pdfFile ) values ('$fname','$lname','$gender','$age','$city','$image','$pdfFile')";
$result=mysqli_query($connection,$sql);
if ($result){
    echo " ";
    header("Location: practice2.php");
}
else
echo "failed";
}
if(move_uploaded_file($_FILES['pdfFile']['tmp_name'],$destination)){
    echo " ";
}
else{
    echo "pdf not uploaded";
}
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$traget)){
    echo " ";
}
else{
    echo "image not uploaded";
}

?>
<html>
<head> 
    <title>
    Practice for test
    </title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- <script src="pscript.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<style>
        .submit {
  background-color: #49900F;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: hand;
  }
</style>
</head>
<body>

<div style="text-align: center">
<br>
<br>
<p></p>
<br>
<br>
<hr>
<h2 style="color:#49900F" > Enter your Details</h2>
<form method="POST" action="<?= $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
<lable>First Name</lable>
<input type="text" placeholder="enter your first name" name="fname"><br>
<lable>Last Name</lable>
<input type="text" placeholder="enter your last name" name="lname"><br>
<lable>Gender</lable><br>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label><br>
<lable>Age</lable>
<input type="number" placeholder="age" name="age"><br>
<lable>City</lable><br>

<input type="radio" id="New York" name="city" value="New york">
<label for="New York">New York</label>

<input type="radio" id="New Jersy" name="city" value="New Jersy">
<label for="New Jersy">New Jersy</label>
<input type="radio" id="Santa Clara" name="city" value="Santa Clara">
<label for="Santa Clara">Santa Clara</label>
<input type="radio" id="other" name="city" value="Other">
<label for="Other">Other</label><br>
<td>
    Select an image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
</td><br>
Upload Resume:
<input type="hidden" name="MAX_FILE_SIZE" value="200000" /> <input
	type="file" name="pdfFile" id="pdfFile" /><br /> 
<br />
<a href="practice.php">
<input class="submit" type="submit" value="submit">
</a>
<hr>
</form>
</div>
</body>
</html>