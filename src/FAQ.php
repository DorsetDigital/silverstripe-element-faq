<?php

namespace DorsetDigital\Elements;

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;
use SilverStripe\Security\Permission;
use SilverStripe\Security\PermissionProvider;
use SilverStripe\Security\Security;

class FAQ extends DataObject implements PermissionProvider
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

    public function providePermissions()
    {
        return [
            'CAN_ACCESS_FAQS' => _t(__CLASS__.'.permshint', 'View create and edit FAQs in FAQ block'),
        ];
    }

    public function canView($member = null, $context = [])
    {
        $member = Security::getCurrentUser();
        return Permission::check('CAN_ACCESS_FAQS', 'any', $member);
    }

    public function canCreate($member = null, $context = [])
    {
        $member = Security::getCurrentUser();
        return Permission::check('CAN_ACCESS_FAQS', 'any', $member);
    }

    public function canEdit($member = null, $context = [])
    {
        $member = Security::getCurrentUser();
        return Permission::check('CAN_ACCESS_FAQS', 'any', $member);
    }

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
