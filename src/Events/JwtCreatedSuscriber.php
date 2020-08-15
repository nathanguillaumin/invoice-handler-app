<?php

namespace App\Events;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

class JwtCreatedSuscriber 
{
    public function updateJwtData(JWTCreatedEvent $event) {
        // 1. Récupérer l'utilisateur (avoir son firstname et lastname)
        $user = $event->getUser();

        // 2.Enrichir les data pour qu'elles contiennent ces données
        $data = $event->getData();
        $data['firstName'] = $user->getFirstName();
        $data['lastName'] = $user->getLastName();

        $event->setData($data);
    }
}