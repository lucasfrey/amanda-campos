<?php
class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'FacebookURL' => 'Text',
        'TwitterURL' => 'Text',
        'YoutubeURL' => 'Text',
        'LinkedinURL' => 'Text',
        'Phone' => 'Varchar(255)',
        'Fax' => 'Varchar(255)',
        'Email' => 'Varchar(255)',
        'EmailAddress' => 'Varchar(255)',
        'Address' => 'Text'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab('Root.SocialMedia', [
            new TextField('FacebookURL', 'Facebook URL'),
            new TextField('TwitterURL', 'Twitter URL'),
            new TextField('YoutubeURL', 'Youtube URL'),
            new TextField('LinkedinURL', 'Linkedin URL')
        ]);

        $fields->addFieldsToTab('Root.Contact', [
            new TextField('EmailAddress', 'Email Address'),
            new TextField('Phone', 'Phone'),
            new TextField('Fax', 'Fax'),
            new TextField('Email', 'Email'),
            new TextareaField('Address', 'Address')
        ]);
    }
}