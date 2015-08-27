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
        $this->setTemplate('ContactFormConfirmationEmail');
        $this->populateTemplate(array(
            'Submission' => $submission
        ));

        parent::__construct(
            'amanda.camposa@gmail.com',
            $submission->Email,
            'Thank you for your email'
        );
    }
} 