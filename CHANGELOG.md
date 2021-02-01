# Changelog

All notable changes to `casts` will be documented in this file

## 0.1.0 - 2020-08-14
- initial release


## 0.2.0 - 2020-10-07
- add support for php 7.0 & 7.1
- fix vkovic/laravel-custom-casts version requirement


## 0.2.1 - 2020-10-07
- decrease nesbot/carbon min version to 1.0


## 0.2.2 - 2020-11-30
- fix phpunit min version


## 0.3.0 - 2020-11-30
- replace sfneal/laravel-custom-casts dependency with sfneal/laravel-custom-casts


## 0.3.1 - 2020-11-30
- bump sfneal/laravel-custom-casts min version


## 0.3.2 - 2020-11-30
- fix use of namespaces


## 0.4.0 - 2020-12-07
- cut support for php7.0


## 0.5.0 - 2021-02-01
- add orchestra/testbench to dev requirements
- add use of Casts to People test model, Factory & migration
- add individual tests for each Cast class
- cut support for php7.2 & below
- add test suite from sfneal/builders


## 1.0.0 - 2021-02-01
- initial production release
- add improved type hinting to Cast classes
- fix issues with return type hinting not being nullable in Cast classes
- add CastsAreNullableTest for testing that each 'castable' attribute can be set to null
- update documentation
