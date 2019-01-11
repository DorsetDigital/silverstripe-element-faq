<?php
namespace DorsetDigital\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

class Quotation extends BaseElement
{
    private static $singular_name = 'Quotation';
    private static $plural_name = 'Quotations';
    private static $description = 'Adds a simple quotation/testimonial';
    private static $table_name = 'App_Elements_Quotation';
    private static $db = [
        'Attribution' => 'Varchar(255)'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('TitleAndDisplayed');
        $fields->addFieldToTab('Root.Main', TextareaField::create('Title')->setTitle('Content'));
        $fields->addFieldToTab('Root.Main', TextField::create('Attribution')->setDescription('Optional'));
        return $fields;
    }

    public function getType()
    {
        return 'Quotation';
    }
}
