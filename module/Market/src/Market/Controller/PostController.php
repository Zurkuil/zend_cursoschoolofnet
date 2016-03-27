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
    public $postForm;


    public function indexAction()
    {
        $data = $this->params()->fromPost();
        
        $viewModel = new ViewModel(array('postForm' => $this->postForm, 'data' => $data));
        $viewModel->setTemplate('market/post/index.phtml');
        
        if($this->getRequest()->isPost()){
            
           $this->postForm->setData($data);
           if($this->postForm->isValid()){
               
               $this->flashMessenger()->addSuccessMessage('Posting Success !');
               $this->redirect()->toRoute('home');
           } else {
           $this->flashMessenger()->addErrorMessage('Posting Fail !');
           $invalidView = new ViewModel();
           $invalidView->setTemplate('market/post/invalid.phtml');
           $invalidView->addChild($viewModel, 'main');
           return $invalidView;
           }
        }
        
                
       // $viewModel->setTemplate('Market/post/invalid.phtml');        
        
        return $viewModel;
    }
    
    public function setCategories($categories){
        
        $this->categories = $categories;
    }
    
    public function setPostForm($form){
        
        $this->postForm = $form;
    }
    
    

}
