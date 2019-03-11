<?php

namespace DorsetDigital\Elements;

use SilverStripe\ORM\DataObject;

class FAQ extends DataObject
{
    private static $table_name = 'DDE_FAQ';
    private static $singular_name = 'Question';
    private static $plural_name = 'Questions';
    private static $has_one = [
        'FAQBlock' => FAQElement::class
    ];
    private static $db = [
        'Question' => 'Text',
        'Answer' => 'HTMLText',
        'SortOrder' => 'Int'
    ];
    private static $summary_fields = [
        'Question'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['SortOrder', 'FAQBlockID']);
        return $fields;
    }

    protected function onBeforeWrite()
    {
        if (!$this->SortOrder) {
            $this->SortOrder = self::get()->max('SortOrder') + 1;
        }

        parent::onBeforeWrite();
    }
}