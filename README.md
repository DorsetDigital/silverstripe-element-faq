# silverstripe-element-faq
Adds a collapsing FAQ block to a page

[![License](https://img.shields.io/badge/License-BSD%203--Clause-blue.svg)](LICENSE.md)

# Requirements
* Silverstripe 4.x
* Silverstripe Elemental

# Installation
* Install the code with `composer require dorsetdigital/silverstripe-element-faq`
* Run a `dev/build?flush` to update your project

# Usage
Once installed, the FAQ block will be selectable as an Elemental block.

The module provides minimal markup with some basic accessibility.  Default CSS and Javascript is also included for the basic functionality (expand/collapse of questions).

If required the module can be instructed not to add the default CSS and Javascript by setting the following configuration variables in your site's XML:

```
DorsetDigital\Elements\FAQElement:
  add_default_css: false
  add_default_javascript: false
```