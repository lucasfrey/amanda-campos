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
        $config = SiteConfig::current_site_config();

        $this->setTemplate('ContactFormNotificationEmail');
        $this->populateTemplate(array(
            'Submission' => $submission
        ));

        parent::__construct(
            $config->EmailAddress,
            $submission->Email,
            'New contact from the website'
        );
    }
} 