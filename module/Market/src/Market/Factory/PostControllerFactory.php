<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;

class PostControllerFactory implements FactoryInterface{
    
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        
        $categories = $serviceLocator->getServiceLocator()->get("categories");
        
        $posController = new \Market\Controller\PostController();
        $posController->setCategories($categories);
     
        return $posController;
    }

//put your code here
}
