<?php

namespace Market\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;

class PostForm extends Form {

    protected $categories;

    public function buildForm() {

        $this->setAttribute('method', 'post');

        $this->add((new Select())->setName('category')
                        ->setOptions(
                                array('value_options' =>
                                    array_combine($this->categories, $this->categories)))
        );
        $this->add((new Text('title'))
                ->setLabel('Title:')
                ->setAttributes(array('size' => '30',
                    'maxLegth' => '100')));

        $this->add((new Submit('Submit'))
                ->setAttribute('value', 'Post'));
    }

    public function setCategories(array $categories) {
        
        $this->categories = $categories;
    }

}
