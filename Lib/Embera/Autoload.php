<?php
/**
 * Autoload.php
 * The Embera Autoloader, to be used when there is no composer around.
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (function_exists('spl_autoload_register'))
{
    spl_autoload_register(function ($class) {
        $class = __DIR__ . '/' . str_replace('\\', DIRECTORY_SEPARATOR, str_replace('Embera\\', '', $class)) . '.php';
        if (file_exists($class))
            require $class;
    });
}

?>
