<?php
/**
 * Formatter.php
 *
 * @package Embera
 * @author  Michael Pratt <pratt@hablarmierda.net>
 * @link    http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
namespace Embera;

/**
 * A formatter that acts as a Decorator for the main library.
 * It outputs the oembed data as a custom string.
 */
class Formatter
{
    /** @var object Instance of \Embera\Embera */
    protected $embera;

    /** @var bool Wether or not to allow offline responses */
    protected $allowOffline;

    /** @var array Fetched errors */
    protected $errors = array();

    /** @var string The template with placeholders to be replaced with the data from an ombed response */
    protected $template;

    /**
     * Constructor
     *
     * @param object $embera Instance of \Embera\Embera
     * @param bool $allowOffline Wether or not to allow offline embera
     * @return void
     */
    public function __construct(\Embera\Embera $embera, $allowOffline = false)
    {
        $this->embera = $embera;
        $this->allowOffline = $allowOffline;
    }

    /**
     * Sets a template with placeholders, that should be
     * replaced by the data from an oembed response.
     *
     *
     * @param string $template
     * @param string|array $body An array or string with Urls
     * @return string
     */
    public function setTemplate($template, $body = null)
    {
        $this->template = $template;

        if (!is_null($body)) {
            return $this->transform($body);
        }

        return '';
    }

    /**
     * This method transforms an array or a string with urls
     * into another string using a specified template.
     *
     * @param string|array $body An array or string with Urls
     * @return string
     */
    public function transform($body = null)
    {
        $providers = array();
        if ($urls = $this->embera->getUrlInfo($body)) {
            foreach ($urls as $url => $data) {
                if (!$this->allowOffline && (int) $data['embera_using_fake'] === 1) {
                    $this->errors[] = 'Using fake oembed response on ' . $url;
                    continue;
                }

                $providers[$url] = str_replace(array_map(function ($name) {
                    return '{' . $name . '}';
                }, array_keys($data)), array_values($data), $this->template);
            }
        }

        if (is_array($body)) {
            $return = implode('', $providers);
        } else {
            $return = str_replace(array_keys($providers), array_values($providers), $body);
        }

        // Remove unchanged placeholders
        return preg_replace('~{([\w\d\-_]+)}~i', '', $return);
    }

    /**
     * Gets the last error found
     *
     * @return string
     */
    public function getLastError()
    {
        $errors = $this->getErrors();
        return end($errors);
    }

    /**
     * Returns an array with all the errors
     *
     * @return array
     */
    public function getErrors()
    {
        return array_merge($this->embera->getErrors(), $this->errors);
    }

    /**
     * Checks if there were errors
     *
     * @return bool
     */
    public function hasErrors()
    {
        return ($this->embera->hasErrors() || !empty($this->errors));
    }

    /**
     * Truly decorate the embera object. With this
     * method Im preserving compatability with the
     * API of the decorated object.
     *
     * @param string $method
     * @param array  $args
     * @return mixed
     *
     * @throws InvalidArgumentException when a method was not found
     */
    public function __call($method, $args)
    {
        if (is_callable(array($this->embera, $method))) {
            return call_user_func_array(array($this->embera, $method), $args);
        }

        throw new \InvalidArgumentException('No method ' . $method . ' was found');
    }
}
?>
