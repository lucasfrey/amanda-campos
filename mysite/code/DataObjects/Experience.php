<?php

/**
 * Class ContactFormEnquiry
 */
class Experience extends DataObject
{
    /**
     * @var array
     */
    private static $db = array(
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText'
    );

    private static $has_one = array(
        'Image' => 'Image',
        'Slice' => 'ExperienceSlice'
    );

    /**
     * @var array
     */
    private static $summary_fields = array(
        'Title',
        'Content'
    );
}