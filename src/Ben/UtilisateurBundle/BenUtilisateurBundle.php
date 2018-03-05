<?php

namespace Ben\UtilisateurBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BenUtilisateurBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
