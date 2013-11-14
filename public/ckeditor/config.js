/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {

    // Define changes to default configuration here. For example:
    config.language = 'en';
    //config.uiColor = '#2a323a';

    config.resize_enabled = true;

    // Toolbar groups configuration.
    config.toolbarGroups = [
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
        { name: 'forms' },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
        { name: 'links' },
        { name: 'insert' },
        '/',
        { name: 'styles' },
        { name: 'colors' },
        { name: 'tools' },
        { name: 'others' },
        { name: 'about' },
        { name: 'pbckcode' }
    ];

    config.extraPlugins = 'pbckcode';
    config.pbckcode = {

        modes: [
            ['HTML', 'html'],
            ['CSS', 'css'],
            ['JS', 'javascript'],
            ['PHP', 'php'],
            ['C#', 'csharp'],
            ['XML', 'xml'],
            ['SQL', 'sql']
        ],
        highlighter: "PRETTIFY"
    };
};
