# Contao Widget Collection

> This module is currently only used in a single project and not generally tested. Feedback is welcome.

This module is a collection of contao widgets. They are designed to use with [Formhybrid](https://github.com/heimrichhannot/contao-formhybrid) module. 


## Install

With composer:

```
composer require heimrichhannot/contao-widgetcollection
```


## Widgets


### IBAN `ibanWidget`

Validates an IBAN number.

Uses [IsoCodes](https://github.com/ronanguilloux/IsoCodes) for validation.

#### Usage

```
'inputType' => 'ibanWidget',
```


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
    'minAge' => 18, // Set a min age. Set 0 for no min date
    'format' => 'd.m.Y' // The format of the input date
   
]
```


### Postal code `postalWidget`

Validate a postal code.

Uses [IsoCodes](https://github.com/ronanguilloux/IsoCodes) for validation.

#### Usage

```
'inputType' => 'postalWidget',
'eval'      => [
    'country' => ['DE', 'AT'] // Array with country codes
]
```