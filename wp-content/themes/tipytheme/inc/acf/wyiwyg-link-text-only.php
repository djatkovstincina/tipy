<?php
/**
 *
 * Add WYSIWYG editor to only have text and link/unlink
 *
 */
add_filter('acf/fields/wysiwyg/toolbars' , function ( $toolbars ) {

    $toolbars['Links Only'] = array();
    $toolbars['Text Based'] = array();

    $toolbars['Links Only'][1] = array('link', 'unlink' );
    $toolbars['Text Based'][1] = array('formatselect', 'bold', 'italic',
        'link', 'unlink', 'bullist', 'numlist' );

    return $toolbars;
} );