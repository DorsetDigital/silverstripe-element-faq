<?php
namespace DorsetDigital\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;


class FAQElement extends BaseElement
{
    private static $singular_name = 'Quotation';
    private static $plural_name = 'Quotations';
    private static $description = 'Adds a simple quotation/testimonial';
    private static $table_name = 'DDE_FAQBlock';
    private static $controller_class = FAQController::class;
    private static $has_many = [
        'Questions' => FAQ::class
    ];
    private static $inline_editable = false;


    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $config = GridFieldConfig_RelationEditor::create()->addComponent(GridFieldOrderableRows::create('SortOrder'));

        $fields->addFieldToTab('Root.Main', GridField::create('Questions', 'Questions', $this->Questions(), $config));

        return $fields;
    }

    public function getType()
    {
        return 'FAQ Block';
    }
}
