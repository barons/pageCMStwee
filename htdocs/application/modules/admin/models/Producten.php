<?php

class Admin_Model_Producten extends Zend_Db_Table_Abstract
{
    protected $_name    = 'producten';
    protected $_primary = 'id';
    
    /**
     * Add product
     * @param string $titel
     * @param string $omschrijving
     * @param float $prijs
     * @return object $product;
     */
    public function addProducts($params)         
    {   
        // var_dump($params);
        // die;
        $this->insert($params);
    }
    
    
    /**
     * Delete the product by id
     * @param integer $id
     * @return boolean
     */
    public function delProducts($id)
    {
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->delete($where);
    }
    
    /**
     * 
     * @param integer $id
     * @param string $titel
     * @param string $omschrijving
     * @param float $prijs
     */
    public function modProducts($params, $id)
    {
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->update($params, $where);
    }
    
    public function getAllProducts()
    {
        $this->fetchAll();
    }
}