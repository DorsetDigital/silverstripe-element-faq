<?php
namespace DorsetDigital\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\TextField;


class IframeElement extends BaseElement
{

    private static $singular_name = 'Iframe Block';
    private static $plural_name = 'Iframe Blocks';
    private static $description = 'Embeds an Iframe into the page';
    private static $table_name = 'DorsetDigital_Elements_Iframe';
    private static $db = [        
        'EmbedLink' => 'Varchar(1024)'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', TextField::create('EmbedLink')->setTitle('Iframe link')->setDescription('The full Iframe code as supplied by the site to be embedded.'));
        return $fields;
    }

    public function getType()
    {
        return 'Iframe block';
    }
}
