<?php

namespace Newbees\acf;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Shared {
    /**
     * Get shared fields to reuse in different field groups.
     *
     * @return FieldsBuilder
     */
    public static function getFields(): FieldsBuilder {
        // Create a new FieldsBuilder instance for shared fields
        $sharedFields = new FieldsBuilder('shared_fields');

        $sharedFields
            ->addText('heading', [
                'label' => 'Heading',
                'instructions' => 'Enter a section heading.',
            ])
            ->addWysiwyg('content', [
                'label' => 'Content',
                'instructions' => 'Enter the main content.',
            ])
            ->addImage('image', [
                'label' => 'Image',
                'instructions' => 'Upload an image.',
            ]);

        // Return the complete FieldsBuilder instance
        return $sharedFields;
    }
}
