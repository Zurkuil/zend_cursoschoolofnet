<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Market for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController
{
    public function indexAction()
    {
        $category = $this->params()->fromQuery('category');
        
        return new ViewModel(array('category' => $category));
    }
    
    public function itemAction(){
        
        $category = $this->params()->fromQuery('itemId');
        
        if(!$category){
            $this->flashMessenger()->addErrorMessage('Item not found !');
            $this->redirect()->toUrl('http://onlinemarket.work/');
        }
        
        return new ViewModel(array('category' => $category));
    }
}
