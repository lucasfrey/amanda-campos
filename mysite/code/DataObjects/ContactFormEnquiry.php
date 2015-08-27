<?php

/**
 * Class ContactFormEnquiry
 */
class ContactFormEnquiry extends DataObject
{
    /**
     * @var array
     */
    private static $db = array(
        'Name' => 'Varchar(255)',
        'Email' => 'Varchar(255)',
        'Comment' => 'Text'
    );

    /**
     * @var array
     */
    private static $summary_fields = array(
        'Name',
        'Email'
    );

    /**
     * @return FieldList
     */
    public function getCMSfields()
    {
        return parent::getCMSFields()->transform(new ReadonlyTransformation());
    }
} 