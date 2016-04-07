<?php

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;

class IndexControllerFactory implements FactoryInterface {

    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $controllerManager) {

        $allServices = $controllerManager->getServiceLocator();
        $sm = $allServices->get('ServiceManager');

        $indexController = new \Market\Controller\IndexController();
        $indexController->setListingsTable($sm->get('listings-table'));
      
        return $indexController;
    }

}
