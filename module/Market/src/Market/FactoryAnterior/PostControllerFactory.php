<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;

class PostControllerFactory implements FactoryInterface {

    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $controllerManager) {

        $allServices = $controllerManager->getServiceLocator();
        $sm = $allServices->get('ServiceManager');
        $categories = $sm->get("categories");

        $posController = new \Market\Controller\PostController();
        $posController->setCategories($categories);
        $posController->setPostForm($sm->get('market-post-form'));
      
        return $posController;
    }

}
