<?php

namespace Ben\PagesBundle\Validator;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class contraintsCheckUrl extends Constraint {

    public $message = 'Le champ contient des liens non valide';

    public function validatedBy()
    {
        return 'validatorCheckUrl';
    }


}