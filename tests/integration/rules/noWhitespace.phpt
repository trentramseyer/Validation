--CREDITS--
Danilo Benevides <danilobenevides01@gmail.com>
--FILE--
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Exceptions\NoWhitespaceException;
use Respect\Validation\Validator as v;

try {
    v::noWhitespace()->check('w poiur');
} catch (NoWhitespaceException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    v::not(v::noWhitespace())->check('wpoiur');
} catch (NoWhitespaceException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    v::noWhitespace()->assert('w poiur');
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

try {
    v::not(v::noWhitespace())->assert('wpoiur');
} catch (NestedValidationException $exception) {
    echo $exception->getFullMessage() . PHP_EOL;
}

?>
--EXPECT--
"w poiur" must not contain whitespace
"wpoiur" must contain whitespace
- "w poiur" must not contain whitespace
- "wpoiur" must contain whitespace
