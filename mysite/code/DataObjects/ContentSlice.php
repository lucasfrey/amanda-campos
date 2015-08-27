<?php

class ContentSlice extends Slice
{
    private static $singular_name = 'Slice';

    private static $db = array(
        'TertiaryContent' => 'HTMLText',
        'BackgroundColour' => 'Varchar(255)',
        'ForegroundColour' => 'Varchar(255)',
    );

    private static $has_one = array(
        'LinkedPage' => 'Page',
        'TertiaryImage' => 'Image',
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // Use optional tree dropdowns for page relations
//        $fields->replaceField('LinkedPageID', new OptionalTreeDropdownField('LinkedPageID', null, 'SiteTree'));

        // Load colour options into colour pickers
        $colours = Config::inst()->forClass('Page')->colours;
        $fields->replaceField('BackgroundColour', new ColorPaletteField('BackgroundColour', null, $colours['Background']));
        $fields->replaceField('ForegroundColour', new ColorPaletteField('ForegroundColour', null, $colours['Text']));

        // Ensure labels and help are set per config after changing fields
        // This reapplies changes from Slice::getCMSFields that were messed up by customisations
        $this->configureFieldsFromConfig($fields, $this->getCurrentTemplateConfig());

        $fields->dataFieldByName('Template')->addExtraClass('autosave');

        return $fields;
    }

    /**
    * Handle the custom "publish pages" permission from Page, rejecting users without the permission
    *
    * This is handled with custom logic in Airways\Forms\VersionedDataObjectDetailsForm_ItemRequest
    * as Versioned / VersionedDataObject doesn't have a publish permission check built in.
    *
    * @param Member $member
    * @return bool
    */
    public function canPublish($member = null)
    {
        if(!$member instanceof Member) {
        $member = Member::currentUser();
    }

        if (!Permission::checkMember($member, 'SITETREE_PUBLISH')) {
            return false;
        }

        return true;
    }

    /**
    * Use ContentSlice as the base slice, instead of Slice
    * @return string
    */
    protected function getBaseSliceClass()
    {
        return __CLASS__;
    }

    protected function setUploadFolderByTemplate(FieldList $fields, $fieldName)
    {
        $field = $fields->dataFieldByName($fieldName);

        if ($field instanceof FileField) {
            $field->setFolderName('Images/Slices/' . $this->Template);
        }
    }
}