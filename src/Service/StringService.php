<?php
/**
 * Created by PhpStorm.
 * User: walid
 * Date: 11/15/2018
 * Time: 2:47 AM
 */

namespace App\Service;


class StringService
{
    // Code PHP pour vérifier si une chaine de caractère est un palindrome
    // Utilisant strrev()
    function isPalindrome($string){
        if (strrev($string) == $string){
            return true;
        }
        else{
            return false;
        }
    }
}