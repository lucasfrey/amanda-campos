<?php

/**
 * Class ContactFormConfirmationEmail
 */
class ContactFormConfirmationEmail extends Email
{
    /**
     * @param ContactFormConfirmationEmail $submission
     */
    public function __construct(ContactFormConfirmationEmail $submission)
    {
        $config = SiteConfig::current_site_config();

        $this->setTemplate('ContactFormConfirmationEmail');
        $this->populateTemplate(array(
            'Submission' => $submission
        ));

        parent::__construct(
            $config->EmailAddress,
            $submission->Email,
            'Thank you for your email'
        );
    }
} 