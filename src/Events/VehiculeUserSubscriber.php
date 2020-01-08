<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 19/12/2019
 * Time: 18:37
 */

namespace App\Events;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Vehicule;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Security;

class VehiculeUserSubscriber implements EventSubscriberInterface
{

    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return[
            KernelEvents::VIEW =>['setUserForVehicule', EventPriorities::PRE_VALIDATE]
        ];
        // TODO: Implement getSubscribedEvents() method.
    }

    public function  setUserForVehicule(GetResponseForControllerResultEvent $event){
        $vehicule = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if ($vehicule instanceof Vehicule && $method ==="POST"){
           $user= $this->security->getUser();
           $vehicule->setUsers($user);

        }
    }
}