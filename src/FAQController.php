<?php

namespace DorsetDigital\Elements;

use DNADesign\Elemental\Controllers\ElementController;
use SilverStripe\Core\Config\Config;
use SilverStripe\View\Requirements;

class FAQController extends ElementController
{
    public function init()
    {
        parent::init();

        if (FAQElement::config()->get('add_default_javascript') === true) {
            Requirements::javascript('dorsetdigital/silverstripe-element-faq:client/dist/javascript/faq.js');
        }

        if (FAQElement::config()->get('add_default_css') === true) {
            Requirements::css('dorsetdigital/silverstripe-element-faq:client/dist/css/faq.css');
        }
    }
}