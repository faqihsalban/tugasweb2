<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        ini deskripsi delifood
        
        <?php
        if ($_SESSION['is_logged']) {
            echo '<table border="1">';
            echo '<th> restaurant';
            echo '<th> action';
            while ($hasil->valid()) {

                echo "<tr>";
                echo "<td>" . $hasil->current()->getName();
                echo "<td>";
                ?>  
                <a href="index.php?menu=deliFood&service=<?php echo $hasil->current()->getId_service(); ?>"> show menu</a>
                <?php
                echo "</tr>";
                $hasil->next();
            }
        }
        ?>
    </table>
    <br>
            <?php if (isset($_GET['service'])) { ?>
        <table border="1">
            <th>name <th> price  <th> action
                <?php
                while ($menu->valid()) {
                    echo "<tr>";
                    echo "<td>" . $menu->current()->getName();
                    echo "<td>" . $menu->current()->getPrice();
                    echo "<td>";
                    ?>
                    <input type = 'button' value='pilih' onclick="pilihmenu('<?php echo $menu->current()->getId_menu(); ?>')"/>
                    <?php
                    echo "</tr>";
                    $menu->next();
                }
                ?>

        </table>

<?php } ?>
</body>
</html>
