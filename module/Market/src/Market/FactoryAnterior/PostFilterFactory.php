<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Market\Form\PostFormFilter;

class PostFilterFactory implements FactoryInterface {

    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceManager) {

        $categories = $serviceManager->get("categories");
    
        $filter = new PostFormFilter();
        $filter->setCategories($categories);
        $filter->buildFilter();
      
        return $filter;
    }

}
