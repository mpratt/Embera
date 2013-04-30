<?php
/**
 * Service.php
 * An abstract class that every provider should extend
 *
 * @author  Michael Pratt <pratt@hablarmierda.net>
 * @link    http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Embera\Adapters;

abstract class Service
{
    protected $url;
    protected $oEmbedUrl = null;
    protected $oEmbedFormat = 'json';

    /**
     * Validates that the url belongs to this service
     * Should be implemented on all children and must
     * return a boolean.
     *
     * @return bool
     */
    abstract protected function validateUrl();

    /**
     * Construct
     *
     * @param object $url Instance of the \Embera\Url class
     * @return void
     *
     * @throws InvalidArgumentException when the given url doesnt match the current service
     */
    public function __construct(\Embera\Url $url)
    {
        $this->url = $url;
        if (!$this->validateUrl())
            throw new \InvalidArgumentException('Url ' . $this->url->original . ' seems to be invalid for this service');
    }

    /**
     * This method fakes a Oembed response.
     * It should be overwritten by the service
     * itself.
     *
     * @return array
     */
     public function fakeOembedResponse() { return array(); }

    /**
     * Returns the original url
     *
     * @return string
     */
    public function getOriginalUrl() { return $this->url->original; }

    /**
     * Magic method that allows access to properties directly
     *
     * @param string $property
     * @param mixed
     */
    public function __get($property){ return $this->{$property}; }

    /**
     * Checks if a property is set
     *
     * @param string $property
     * @return bool
     */
    public function __isset($property) { return isset($this->{$property}); }
}
?>
