<?php

// EventListener/JWTCreatedListener.php

declare(strict_types=1);

namespace App\EventListener;

use App\Controller\Authentication\GetDocumentFileToken;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

/**
 * Class JWTCreatedListener
 */
class JWTCreatedListener
{
    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event): void
    {
        $payload = $event->getData();

        if (($payload['scope'] ?? '') === 'fileScope') {
            $expiration = new \DateTime('+1 minute');
            $payload['exp'] = $expiration->getTimestamp();
        }

        $event->setData($payload);
    }
}