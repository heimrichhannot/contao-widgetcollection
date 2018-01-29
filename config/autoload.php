<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2018 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces([
    'HeimrichHannot',
]);


/**
 * Register the classes
 */
ClassLoader::addClasses([
    // Src
    'HeimrichHannot\WidgetCollection\Validator\IbanValidator'           => 'system/modules/widgetcollection/src/Validator/IbanValidator.php',
    'HeimrichHannot\WidgetCollection\FrontendWidget\IbanFrontendWidget' => 'system/modules/widgetcollection/src/FrontendWidget/IbanFrontendWidget.php',
    'HeimrichHannot\WidgetCollection\Widget\IbanWidget'                 => 'system/modules/widgetcollection/src/Widget/IbanWidget.php',
]);


/**
 * Register the templates
 */
TemplateLoader::addFiles([
    'iban_frontend_widget' => 'system/modules/widgetcollection/templates/frontendwidget',
]);
