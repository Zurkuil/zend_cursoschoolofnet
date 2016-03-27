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

class PostController extends AbstractActionController
{
    public $categories;
    
    public function indexAction()
    {
        $viewModel = new ViewModel(array('category' => $this->categories));
       // $viewModel->setTemplate('Market/post/invalid.phtml');
        return $viewModel;
    }
    
    public function setCategories($categories){
        
        $this->categories = $categories;
    }
    
    

}
