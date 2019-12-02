<?php
 
use SilverStripe\Forms\HTMLEditor\HTMLEditorConfig;

HTMLEditorConfig::get('cms')->enablePlugins(['textcolor', 'colorpicker']);
HtmlEditorConfig::get('cms')->insertButtonsBefore('formatselect', 'forecolor');
HtmlEditorConfig::get('cms')->insertButtonsBefore('formatselect', 'backcolor');
HtmlEditorConfig::get('cms')->insertButtonsBefore('formatselect', 'fontsizeselect');

HtmlEditorConfig::get('cms')->setOptions([
    'fontsize_formats' => '8pt 10pt 11pt 12pt 14pt 18pt 24pt 36pt'
]);
