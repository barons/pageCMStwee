<?php

class Admin_Model_WebserviceProducten
{
    protected function _getProductModel(){
        $this->_model   = new Admin_Model_Producten();
        return _model;
    }
    
    public function addProductService($title, $omschrijving, $prijs){
        //return this->_getModel;
    }

}

