<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Market\Form\PostForm;

class PostFormFactory implements FactoryInterface {

    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceManager) {

        $categories = $serviceManager->get("categories");
    
        $form = new PostForm();
        $form->setCategories($categories);
        $form->buildForm();
        $form->setInputFilter($serviceManager->get('market-post-filter'));
      
        return $form;
    }

}
