# Contao Widget Collection

[![Latest Stable Version](https://poser.pugx.org/heimrichhannot/contao-widgetcollection/v/stable)](https://packagist.org/packages/heimrichhannot/contao-widgetcollection)
[![Total Downloads](https://poser.pugx.org/heimrichhannot/contao-widgetcollection/downloads)](https://packagist.org/packages/heimrichhannot/contao-widgetcollection)

> This module is currently only used in a single Contao 3 project and not generally tested. Feedback is welcome.

This module is a collection of contao widgets that add some advanced (backend) validation to the input fields. They are designed to use with [Formhybrid](https://github.com/heimrichhannot/contao-formhybrid) module. 


## Install

With composer:

```
composer require heimrichhannot/contao-widgetcollection
```


## Widgets


### BIC (Swift) `bicWidget`

Validates a BIC/SWIFT-Adress.

Uses [IsoCodes](https://github.com/ronanguilloux/IsoCodes) for validation.

#### Usage

```
'inputType' => 'bicWidget',
```


### Birthday `birthdayWidget`

Validates a birthday.

#### Usage

```
'inputType' => 'birthdayWidget',
'eval'      => [
    'minAge' => 18, // Set a min age. Set 0 to disable
    'maxAge' => 0, // Set a max age. Set 0 to disable
    'format' => 'd.m.Y' // The format of the input date
   
]
```


### IBAN `ibanWidget`

Validates an IBAN number.

Uses [IsoCodes](https://github.com/ronanguilloux/IsoCodes) for validation.

#### Usage

```
'inputType' => 'ibanWidget',
'eval' => [
    'fields' => 22, // Number of input fields. Default is 22. 
    'prefill' => '' // A optional prefilled value, for example to set the typical country (example: "DE").
]
```


### Phone `phoneWidget`

Validates a phone number.

Uses [IsoCodes](https://github.com/ronanguilloux/IsoCodes) for validation.

#### Usage

```
'inputType' => 'phoneWidget',
'eval' => [
    'countries' => ['DE', 'AT'] // Array with country codes
]
```


### Postal code `postalWidget`

Validate a postal code.

Uses [IsoCodes](https://github.com/ronanguilloux/IsoCodes) for validation.

#### Usage

```
'inputType' => 'postalWidget',
'eval'      => [
    'countries' => ['DE', 'AT'] // Array with country codes
]
```