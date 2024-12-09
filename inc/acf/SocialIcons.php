<?php

namespace Newbees\acf;

use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Class SocialIcons
 *
 * Registers the ACF field group for managing social icons.
 * This class provides a field group that can be added to the "Social Accounts" options page.
 *
 * @package Newbees\acf
 */
class SocialIcons {

    /**
     * Registers the ACF field group for social icons.
     *
     * This method creates a repeater field for social icons, where each icon consists of a label, URL, and an SVG icon.
     * The field group is added to the "Social Accounts" options page.
     *
     * @return void
     */
    public static function register(): void {
        // Create a new FieldsBuilder instance for the social icons field group.
        $socialIcons = new FieldsBuilder( 'social_icons', [
            'title'      => 'Social Icons',
            'position'   => 'acf_after_title',
            'menu_order' => 0,
            'style'      => 'default'
        ] );

        // Set location rule to associate this field group with the "Social Accounts" options page.
        $socialIcons
            ->setLocation( 'options_page', '==', 'theme-options-social-accounts' )
            ->addRepeater( 'social_links', [
                'label'        => 'Social Links',
                'button_label' => 'Add Social Icon',
                'min'          => 0,
                'max'          => 10
            ] )
                ->addText( 'link_text', [
                    'label'        => 'Text',
                    'instructions' => 'Provide a label for the social icon (e.g., Facebook, Twitter).',
                    'required'     => 1
                ] )
                ->addUrl( 'link_url', [
                    'label'        => 'URL',
                    'instructions' => 'Provide the URL for the social icon.',
                    'required'     => 1
                ] )
                ->addFile( 'link_icon', [
                    'label'         => 'SVG Icon',
                    'instructions'  => 'Upload an SVG icon for the social link.',
                    'required'      => 1,
                    'return_format' => 'url',
                    'mime_types'    => 'svg'
                ] )
            ->endRepeater();

        acf_add_local_field_group( $socialIcons->build() );
    }
}
