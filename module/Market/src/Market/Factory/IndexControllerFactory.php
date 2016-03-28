<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
