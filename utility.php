<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utility
 *
 * @author PRG1
 */
class Utility {

//put your code here
    private static $menu_after = Array("Organize Book" => "book", "Organize Category" => "category", "Logout" => "logout");
    private static $menu_before = Array("Login" => "login", "View Book" => "book", "View Category" => "category");

    public static function makemenu($sesi) {
        if ($sesi) {
            $menu = self::$menu_after;
        } else {
            $menu = self::$menu_before;
        }

        foreach ($menu as $key => $value) {
            echo "<a href='index.php?menu=" . $value . "'>" . $key . "</a> &nbsp; | &nbsp";
        }
        echo "<br></br>";
    }

}
