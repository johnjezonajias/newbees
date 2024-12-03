<?php

namespace Newbees\acf;

use StoutLogic\AcfBuilder\FieldsBuilder;

class ContactPage {

    /**
     * Register Contact Us fields.
     */
    public static function register() {
        $sharedFields = Shared::getFields();

        $contactUsFields = new FieldsBuilder('contact_us', [
            'title' => 'Contact Us Fields',
            'position' => 'acf_after_title',
        ]);

        $contactUsFields
            ->addFields($sharedFields) // Reuse shared fields
            ->addText('phone_number', [
                'label' => 'Phone Number',
                'instructions' => 'Enter the contact phone number.',
            ])
            ->addText('email_address', [
                'label' => 'Email Address',
                'instructions' => 'Enter the contact email address.',
            ])
            ->addGoogleMap('location', [
                'label' => 'Location',
                'instructions' => 'Add a Google Map location.',
            ])
            ->setLocation('page_template', '==', 'page-contact-us.php');

        acf_add_local_field_group($contactUsFields->build());
    }
}