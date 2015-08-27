<?php

/**
 * Class ContactFormEnquiry
 */
class ContactFormEnquiryAdmin extends ModelAdmin
{
    private static $managed_models = array(
        'ContactFormEnquiry'
    );

    private static $url_segment = 'Contacts';

    private static $menu_title = 'Contacts';
}