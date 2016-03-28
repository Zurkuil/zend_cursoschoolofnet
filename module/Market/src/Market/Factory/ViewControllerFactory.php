<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;

class ViewControllerFactory implements FactoryInterface {

    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $controllerManager) {

        $allServices = $controllerManager->getServiceLocator();
        $sm = $allServices->get('ServiceManager');

        $viewController = new \Market\Controller\ViewController();
        $viewController->setListingsTable($sm->get('listings-table'));
      
        return $viewController;
    }

}
