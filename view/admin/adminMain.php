
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
 NAMPILIN 3 menu pilihan buat si admin
 <br>
 
 <br><a href=index.php?menu=editprofile&id=<?php echo $_SESSION['id_user']; ?>> edit profile</a>
   <br>
  <a href=logout.php> logout</a> 
 
 
     <?php 
//intinya dia cuma ganti role user aja sih
//$alluser  ini list semua user yang ada
    //    $user  ini list user yang status nya user biasa
   //     $driver ini list user yang status nya jadi driver
    //    $owner ini list user yang jadi owner
     // tombol aksi nya pake yang edit profile aja, 
?>
</body>
</html>
