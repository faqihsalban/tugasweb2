<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <table align="center">
                <tr>
                    <td width="100">id user</td>
                    <td><?php echo $user->getId_user(); ?></td>
                </tr>
                <tr>
                    <td>nama</td>
                    <td><input type="text" name="name" placeholder="nama" value="<?php echo $user->getName(); ?>"/></td>
                </tr>
                <tr>
                    <td>username</td>
                    <td><?php echo $user->getUsername(); ?></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><input type="text" name="password" placeholder="password" value=""/></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td><input type="text" name="email" placeholder="email" value="<?php echo $user->getEmail(); ?>"/></td>
                </tr>
                <tr>
                    <td>phone</td>
                    <td><input type="text" name="phone" placeholder="phone" value="<?php echo $user->getPhone(); ?>"/></td>
                </tr>
                <tr>
                    <td>role</td>
                    <td><?php echo $user->getRole(); ?></td>
                </tr>
                <tr>
                    <td>date join</td>
                    <td><?php echo $user->getDate_join(); ?></td>
                </tr>


                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update" name="btn_update"/>
                    </td>
                </tr>
            </table>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
