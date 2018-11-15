<?php
/**
 * Created by PhpStorm.
 * User: walid
 * Date: 11/15/2018
 * Time: 2:57 AM
 */

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\CardSchemeValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class ContainsPalaindromeValidator extends CardSchemeValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof ContainsPalindrome) {
            throw new UnexpectedTypeException($constraint, ContainsPalindrome::class);
        }

        // Les contraintes customisés doivent ignorer les chaines vide etc..
        // pour que les autres contraintes (NotBlank, NotNull, etc.) puissent s'en occuper
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedTypeException($value, 'string');
        }

        if (strrev($value) == $value){
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}