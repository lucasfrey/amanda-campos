<?php

/**
 * Class InternationalEnquiryForm
 */
class ContactForm extends Form
{
    /**
     *
     */
    const SUCCESS = 'contact_form_success';

    /**
     * @param Controller $controller
     */
    public function __construct($controller)
    {
        $fields = new FieldList();
        $fields->push(new TextField('Name'));
        $fields->push(new EmailField('Email'));
        $fields->push(new TextareaField('Comment', 'Your message'));

        $actions = new FieldList();
        $actions->push(new FormAction('submit', 'Send message'));

        $validator = new RequiredFields(
            'Name',
            'Email',
            'Comment'
        );

        parent::__construct($controller, 'ContactForm',  $fields,  $actions, $validator);
    }

    /**
     * @return SS_HTTPResponse
     * @throws ValidationException
     * @throws null
     */
    public function submit($data)
    {
            $submission = new ContactFormEnquiry();
            $this->saveInto($submission);
            $submission->write();
//
//            $confirmation = new ContactFormConfirmationEmail($submission);
//            $confirmation->send();
//
//            $notification = new ContactFormNotificationEmail($submission);
//            $notification->send();

            Session::set(self::SUCCESS, true);

            $redirectUrl = Director::absoluteURL(null) . '?success=1';
            $this->controller->redirect($redirectUrl);
    }
}
