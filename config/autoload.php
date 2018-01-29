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
ClassLoader::addNamespaces(array
(
	'HeimrichHannot',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Src
	'HeimrichHannot\WidgetCollection\Validator\IbanValidator'               => 'system/modules/widgetcollection/src/Validator/IbanValidator.php',
	'HeimrichHannot\WidgetCollection\Validator\ValidatorInterface'          => 'system/modules/widgetcollection/src/Validator/ValidatorInterface.php',
	'HeimrichHannot\WidgetCollection\Validator\BirthdayValidator'           => 'system/modules/widgetcollection/src/Validator/BirthdayValidator.php',
	'HeimrichHannot\WidgetCollection\Validator\ZipCodeValidator'            => 'system/modules/widgetcollection/src/Validator/ZipCodeValidator.php',
	'HeimrichHannot\WidgetCollection\Validator\BicValidator'                => 'system/modules/widgetcollection/src/Validator/BicValidator.php',
	'HeimrichHannot\WidgetCollection\FrontendWidget\IbanFrontendWidget'     => 'system/modules/widgetcollection/src/FrontendWidget/IbanFrontendWidget.php',
	'HeimrichHannot\WidgetCollection\FrontendWidget\BirthdayFrontendWidget' => 'system/modules/widgetcollection/src/FrontendWidget/BirthdayFrontendWidget.php',
	'HeimrichHannot\WidgetCollection\FrontendWidget\ZipCodeFrontendWidget'  => 'system/modules/widgetcollection/src/FrontendWidget/ZipCodeFrontendWidget.php',
	'HeimrichHannot\WidgetCollection\FrontendWidget\BicFrontendWidget'      => 'system/modules/widgetcollection/src/FrontendWidget/BicFrontendWidget.php',
	'HeimrichHannot\WidgetCollection\Widget\BicWidget'                      => 'system/modules/widgetcollection/src/Widget/BicWidget.php',
	'HeimrichHannot\WidgetCollection\Widget\ZipCodeWidget'                  => 'system/modules/widgetcollection/src/Widget/ZipCodeWidget.php',
	'HeimrichHannot\WidgetCollection\Widget\IbanWidget'                     => 'system/modules/widgetcollection/src/Widget/IbanWidget.php',
	'HeimrichHannot\WidgetCollection\Widget\BirthdayWidget'                 => 'system/modules/widgetcollection/src/Widget/BirthdayWidget.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'iban_frontend_widget' => 'system/modules/widgetcollection/templates/frontendwidget',
));
