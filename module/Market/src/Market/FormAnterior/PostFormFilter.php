<?php

namespace Market\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Validator\Regex;

class PostFormFilter extends InputFilter {

    protected $categories;

    public function buildFilter() {

        $category = new Input('category');
        $category->getFilterChain()
                ->attachByName('StringTrim')
                ->attachByName('StripTags')
                ->attachByName('StringToLower');
        $category->getValidatorChain()
                ->attachByName('InArray', array('haystack' => $this->categories));
        $this->add($category);

        $titleRegex = new Regex(array('pattern' => '/^[a-zA-Z0-9 ]*$/'));
        $titleRegex->setMessage("Title should only contain numbers, letters or space");
        $title = new Input('title');
        $title->getFilterChain()
                ->attachByName('StringTrim')
                ->attachByName('StripTags')
                ->attachByName('StringToLower');
        $title->getValidatorChain()
                ->attach($titleRegex)
                ->attachByName('StringLength', array('min' => 1, 'max' => 100));
        $this->add($title);
    }

    public function setCategories(array $categories) {

        $this->categories = $categories;
    }

}
