<?php

class Page extends SiteTree
{
    /**
     * @var array
     */
    private static $db = array(
        'ContactInfos' => 'HTMLText'
    );


    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Contact', new HtmlEditorField('ContactInfos', 'Contact Infos'));

        // Use custom grid field edit form for Slices (adds publish permissions support)
        if ($slices = $fields->dataFieldByName('Slices')) {
            $slices->getConfig()
                ->removeComponentsByType('VersionedDataObjectDetailsForm')
                ->addComponent(new VersionedDataObjectDetailsForm());
        }

        return $fields;
    }


    /**
     * Gather all the text content of all the slices for indexing
     *
     * @return string
     */
    public function getSliceContent()
    {
        $fields = array(
            'Identifier',
            'SecondaryIdentifier',
            'TertiaryIdentifier',
            'Title',
            'SubTitle',
            'Teaser',
            'ShortTeaser',
            'Content',
            'SecondaryContent',
            'TertiaryContent',
        );

        $content = '';

        foreach ($this->Slices() as $slice) {
            foreach ($fields as $fieldName) {
                $content .= $slice->$fieldName . ' ';
            }
        }

        return $content;
    }


}

class Page_Controller extends ContentController
{
    /**
     * @var array
     */
    private static $allowed_actions = array(
        'ContactForm'
    );

    /**
     * @return ContactForm
     */
    public function ContactForm()
    {
        return new ContactForm($this);
    }
}
