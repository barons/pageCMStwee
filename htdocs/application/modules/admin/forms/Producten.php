<?php

class Admin_Form_Producten extends Zend_Form
{

    public function init()
    {
        $locale     = Zend_Registry::get('Zend_Locale');
        $url        = '/' .$locale .'/login';
        
        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
        
        $this->addElement(new Zend_Form_Element_Text('titel', array(
            'label'     => 'titel',
            'filters'   => array('stringTrim'),
            'required'  => true
        )));
        
        $this->addElement(new Zend_Form_Element_TextArea('omschrijving', array(
            'label'     => 'omschrijving',
            'filters'   => array('stringTrim'),
            'required'  => true
        )));
        
        $this->addElement(new Zend_Form_Element_Text('prijs', array(
            'label'     => 'prijs',
            'filters'   => array('stringTrim'),
            'required'  => true
        )));
        
        $btn = new Zend_Form_Element_Button('send', array(
            'type'      => 'submit',
            'value'     => 'submit_lbl',
            'required'  => false,
            'ignore'    => true
        ));
        
        $this->addElement($btn);
    }


}

