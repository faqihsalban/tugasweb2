
<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
    <body>
        NAMPILIN 3 menu pilihan buat si driver
        <br>

        <br><a href=index.php?menu=editprofile&id=<?php echo $_SESSION['id_user']; ?>> edit profile</a>
        <br>
        <a href=logout.php> logout</a> 

        tersedia
        <table border='1'>
            <th> id transac <th> id user <th> address <th> status <th> total <th> aksi
                <?php while ($result->valid()) { ?>
                <tr>
                    <td> <?php echo $result->current()->getId_transac(); ?>
                    <td> <?php echo $result->current()->getId_user(); ?>
                    <td> <?php echo $result->current()->getAddress(); ?>
                    <td> <?php echo $result->current()->getStatus(); ?>
                    <td> <?php echo $result->current()->getTotal(); ?>
                    <td><a href="index.php?menu=driver&service=<?php echo $result->current()->getId_transac(); ?>"> pilih</a>
                </tr>
                <?php
                $result->next();
            }
            ?>
        </table>
        <br>
        on proses
        <table border='1'>
            <th> id transac <th> id user <th> address <th> status <th> total <th> aksi
                <?php while ($onproces->valid()) { ?>
                <tr>
                    <td> <?php echo $onproces->current()->getId_transac(); ?>
                    <td> <?php echo $onproces->current()->getId_user(); ?>
                    <td> <?php echo $onproces->current()->getAddress(); ?>
                    <td> <?php echo $onproces->current()->getStatus(); ?>
                    <td> <?php echo $onproces->current()->getTotal(); ?>
                    <td><a href="index.php?menu=driver&service=<?php echo $onproces->current()->getId_transac(); ?>"> pilih</a>
                </tr>
                <?php
                $onproces->next();
            }
            ?>
        </table>
    </body>
</html>
