# PHP Helpers: Array Functions

-   Version: v1.0.0
-   Date: May 11 2019
-   [Release notes](https://github.com/pointybeard/helpers-functions-arrays/blob/master/CHANGELOG.md)
-   [GitHub repository](https://github.com/pointybeard/helpers-functions-arrays)

A collection of helpful functions related to arrays and array manipulation

## Installation

This library is installed via [Composer](http://getcomposer.org/). To install, use `composer require pointybeard/helpers-functions-arrays` or add `"pointybeard/helpers-functions-arrays": "~1.0"` to your `composer.json` file.

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update

### Requirements

There are no particuar requirements for this library other than PHP 5.6 or greater.

To include all the [PHP Helpers](https://github.com/pointybeard/helpers) packages on your project, use `composer require pointybeard/helpers` or add `"pointybeard/helpers": "~1.0"` to your composer file.

## Usage

This library is a collection of helpful functions related to arrays and array manipulation. They are included by the vendor autoloader automatically. The functions have a namespace of `pointybeard\Helpers\Functions\Arrays`

The following functions are provided:

-   `array_is_assoc(array $input)`
-   `array_remove_empty(array $input, int $depth=null)`

Example usage:

```php
<?php

include __DIR__ . '/vendor/autoload.php';

use pointybeard\Helpers\Functions\Arrays;

var_dump(Arrays\array_is_assoc(['a' => 1, 'b' => 2]));
// bool(true)

var_dump(Arrays\array_is_assoc([4, 5, 6, 7]));
// bool(false)

print_r(Arrays\array_remove_empty([
    1, 2, 3, 4, '', ['a', 'b', 'c', '', 'e']
]));
// Array
// (
//   [0] => 1
//   [1] => 2
//   [2] => 3
//   [3] => 4
//   [5] => Array
//     (
//       [0] => a
//       [1] => b
//       [2] => c
//       [4] => e
//     )
// )

print_r(Arrays\array_remove_empty([
    "fruit" => [
        "apple",
        "banana",
        ""
    ],
    "cars" => [],
    "ancestors" => [
        "charlie" => "",
        "betty" => [
            "children" => [
                "pete",
                "sarah" => [
                    "children" => [
                        1 => "heidi",
                        2 => "mary",
                        3 => "adam",
                        4 => ""
                    ]
                ],
                "bob" => [
                    "children" => []
                ]
            ]
        ]
    ]
], 3));
// Array
// (
//   [fruit] => Array
//     (
//       [0] => apple
//       [1] => banana
//     )
//   [ancestors] => Array
//     (
//       [betty] => Array
//         (
//           [children] => Array
//             (
//               [0] => pete
//               [sarah] => Array
//                 (
//                   [children] => Array
//                     (
//                       [1] => heidi
//                       [2] => mary
//                       [3] => adam
//                     )
//                 )
//               [bob] => Array
//                 (
//                   [children] => Array
//                     (
//                     )
//                 )
//             )
//         )
//     )
// )

try {
    print_r(Arrays\array_remove_empty([
        "one", "two"
    ], "INVALID_DEPTH_VALUE"));
} catch (\Exception $ex) {
    var_dump($ex->getMessage());
}
// string(46) "depth must be NULL or a positive integer value"

```

## Support

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/pointybeard/helpers-functions-arrays/issues),
or better yet, fork the library and submit a pull request.

## Contributing

We encourage you to contribute to this project. Please check out the [Contributing documentation](https://github.com/pointybeard/helpers-functions-arrays/blob/master/CONTRIBUTING.md) for guidelines about how to get involved.

## License

"PHP Helpers: Array Functions" is released under the [MIT License](http://www.opensource.org/licenses/MIT).
