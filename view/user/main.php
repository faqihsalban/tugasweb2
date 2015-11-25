
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
 NAMPILIN 3 menu pilihan buat si user
 <br>
 <a href=index.php?menu=deliFood> delifood</a> ||  <a href=index.php?menu=deliLaundry> delilaundry</a> ||  <a href=index.php?menu=deliCopy> delicopy</a>
 <br><a href=index.php?menu=editprofile&id=<?php echo $_SESSION['id_user']; ?>> edit profile</a>
  <br>
  <a href=logout.php> logout</a> 
 
     <?php 


?>
</body>
</html>
