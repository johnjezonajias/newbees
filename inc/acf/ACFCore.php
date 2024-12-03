<?php

namespace Newbees\acf;

class ACFCore {

    /**
     * Register all ACF field groups.
     */
    public static function registerFieldGroups() {
        // Ensure ACF Builder is available.
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        // Register individual field groups.
        ContactPage::register();
    }
}
