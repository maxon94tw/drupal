<?php

namespace Drupal\custom_event\EventSubscriber;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CustomEventSubscriber implements EventSubscriberInterface {

  public function __construct() {
    $this->account = \Drupal::currentUser();
  }

  public function checkAuthStatus(GetResponseEvent $event) {

    if ($this->account->isAnonymous() && \Drupal::routeMatch()->getRouteName() != 'user.login') {

      $route_name = \Drupal::routeMatch()->getRouteName();
      if (strpos($route_name, 'view') === 0 && strpos($route_name, 'rest_') !== FALSE) {
        return;
      }

      $response = new RedirectResponse('/user/login', 301);
      $event->setResponse($response);
      $event->stopPropagation();
    }
  }

  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['checkAuthStatus'];
    return $events;
  }

}
