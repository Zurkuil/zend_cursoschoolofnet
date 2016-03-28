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
    use ListingsTableTrait;
    
    public function indexAction()
    {
        $category = $this->params()->fromRoute('category');
        
        $listings = $this->listingsTable->getListingsByCategory($category);
      
        return new ViewModel(array('category' => $category, 'listings' => $listings));
    }
    
    public function itemAction(){
        
        $itemId = $this->params()->fromRoute('itemId');
       
        $item = $this->listingsTable->getListingsById($itemId);
        
        if(!$itemId){
            $this->flashMessenger()->addErrorMessage('Item not found !');
            $this->redirect()->toUrl('market');
        }
        
        return new ViewModel(array('item' => $item));
    }
    
    
}
