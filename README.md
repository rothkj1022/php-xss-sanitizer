# php-xss-sanitizer

PHP XSS Sanitizer uses HTMLPurifier to recursively clean up get, post, and files arrays to protect your application.

### Features:

* Recursively sanitizes $\_GET, $\_POST, $\_FILES, or any other php array
* Option to sanitize file names if passing the $\_FILES array
* Set any HTMLPurifier config parameters you want to use

Written by: Kevin Roth - [https://kevinroth.com](https://kevinroth.com)

### License
Released under the MIT license - http://opensource.org/licenses/MIT

## Requirements

* PHP >= 5.4

## Installation
Run the following command in your command line shell in your php project

```sh
$ composer require rothkj1022/php-xss-sanitizer
```

Done.

## Getting started

### Example usage with composer
```php
require('vendor/autoload.php');
use rothkj1022\Sanitizer;

$sanitizer = new Sanitizer\Sanitizer();
```

### Example usage without composer
```php
require('src/Sanitizer.php');
use rothkj1022\Sanitizer;

$sanitizer = new Sanitizer\Sanitizer();
```

See example.php


## Changelog

### Version 1.0.0

* Initial version

