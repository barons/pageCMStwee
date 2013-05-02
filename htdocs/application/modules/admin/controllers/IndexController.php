<?php

class Admin_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {
        
    }

    public function addNewsAction()
    {
    }

    public function removeNewsAction()
    {
        // action body
    }

    public function listNewsAction()
    {
        
    }

    public function modNewsAction()
    {
        
    }
    
    
    

    public function addProductsAction()
    {
        $form = new Admin_Form_Producten();
        $this->view->form = $form;
        
        // zorgen dat nieuws in de database raakt
        if ($this->getRequest()->isPost()){
            $postParams = $this->getRequest()->getPost();
            
            // controle, als alles correct is
            if ($this->view->form->isValid($postParams)){
                unset($postParams['send']); // we schrijven de knop niet weg....
                $productModel = new Admin_Model_Producten();
                
                $productModel->addProducts($postParams);
                // vervangen door functies van Zend dus ->
                $this->_redirect($this->view->url(array('controller' => 'Index', 'action' => 'list-products')));
                die ('redirect gelukt');
            }
            
        }
    }

    public function delProductsAction()
    {
        // action body
    }

    public function modProductsAction()
    {
        $id     = $this->_getParam('id'); 
        
        $productModel = new Application_Model_Producten();
        // current, je hebt er maar 1 nodig, al de rest van code weg
        // anders moet je een foreach doen
        $product      = $productModel->find($id)->current(); // SELECT * FROM nieuws WHERE id = $id
        $form        = new Application_Form_Producten();
        // populate, juiste veldjes opvullen met data die je wilt
        $form->populate($product->toArray()); // omzetten in array om het formulier op te vullen
        
        // populate form
        $this->view->form = $form;
        
        // zorgen dat nieuws in de database raakt
        if ($this->getRequest()->isPost()){
            $postParams = $this->getRequest()->getPost();
            
            // controle, als alles correct is
            if ($this->view->form->isValid($postParams)){
                
                unset($postParams['send']);
                
                $productModel->modProducts($postParams, $id);
                $this->_redirect('/producten/overzicht');
                
            }
            
        }
    }

    public function listProductsAction()
    {
        
        $sql                    = "select * from producten";
        
        $result                 = $this->db->query($sql);
        die('in de list functie');
        $producten              = $result->fetchAll(); // haal alles altijd op
        $this->view->producten  = $producten;
    }


}









