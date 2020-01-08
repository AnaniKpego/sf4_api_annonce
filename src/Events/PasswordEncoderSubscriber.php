<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 19/12/2019
 * Time: 16:45
 */

namespace App\Events;


use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PasswordEncoderSubscriber implements EventSubscriberInterface
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW =>['encoderPassword', EventPriorities::PRE_WRITE]
        ];

    }

    /**
     * @param GetResponseForControllerResultEvent $event
     */
    public function encoderPassword(GetResponseForControllerResultEvent $event)
    {
       $user =  $event->getControllerResult();

       $method = $event->getRequest()->getMethod();

       if ($user instanceof User && $method === "POST"){
           $hash = $this->encoder->encodePassword($user, $user->getPassword());
           $user->setPassword($hash);
       }
        //dd($user);

    }

}