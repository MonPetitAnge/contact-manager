<?php
/**
 * Created by PhpStorm.
 * User: walid
 * Date: 11/15/2018
 * Time: 2:53 AM
 */

namespace App\Validator\Constraints;


use Symfony\Component\Validator\Constraint;

class ContainsPalindrome extends Constraint
{
    public $message = 'Le nom {{ string }} est un palindrome. Veuillez le modifier svp';
}