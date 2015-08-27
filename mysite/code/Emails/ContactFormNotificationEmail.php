<?php

/**
 * Class ContactFormNotificationEmail
 */
class ContactFormNotificationEmail extends Email
{
    /**
     * @param ContactFormNotificationEmail $submission
     */
    public function __construct(ContactFormNotificationEmail $submission)
    {
        $this->setTemplate('ContactFormNotificationEmail');
        $this->populateTemplate(array(
            'Submission' => $submission
        ));

        parent::__construct(
            'amanda.camposa@gmail.com',
            $submission->Email,
            'New contact from the website'
        );
    }
} 