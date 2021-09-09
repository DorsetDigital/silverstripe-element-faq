<?php

namespace DorsetDigital\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Core\Config\Configurable;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;


class FAQElement extends BaseElement
{
    use Configurable;

    /**
     * @config
     * @var bool
     */
    private static $add_default_css = true;

    /**
     * @config
     * @var bool
     */
    private static $add_default_javascript = true;

    private static $singular_name = 'FAQ';
    private static $plural_name = 'FAQs';
    private static $description = 'Adds a simple FAQ block';
    private static $table_name = 'DDE_FAQBlock';
    private static $controller_class = FAQController::class;
    private static $icon = 'font-icon-list';
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
        return _t(__CLASS__ . '.BlockType', 'FAQ');
    }
}
