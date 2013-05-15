<?php
/**
 * Service.php
 * An abstract class that every provider should extend
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Adapters;

abstract class Service
{
    protected $url;
    protected $config;
    protected $oembed;
    protected $errors = array();
    protected $apiUrl = null;
    protected $fakeWidth = '420';
    protected $fakeHeight = '315';

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
     * @param string $url
     * @param array  $parsed The Parsed Url
     * @return void
     *
     * @throws InvalidArgumentException when the given url doesnt match the current service
     */
    public function __construct($url, array $config = array(), \Embera\Oembed $oembed)
    {
        $this->url = $url;
        $this->normalizeUrl();

        if (!$this->validateUrl())
            throw new \InvalidArgumentException('Url ' . $this->url . ' seems to be invalid for this service');

        $this->config = $config;
        $this->oembed = $oembed;
    }

    /**
     * Gets the information from an Oembed provider
     * when this fails, it tries to provide a fakeResponse.
     * Returns an associative array with a (common) Oembed response.
     *
     * @return array
     */
    public function getInfo()
    {
        try {
            if ($response = $this->oembed->getResourceInfo($this->apiUrl, $this->url, $this->config))
                return $response;
        } catch (\Exception $e) { $this->errors[] = $e->getMessage(); }

        return $this->fakeResponse();
    }

    /**
     * Returns the url
     *
     * @return string
     */
    public function getUrl() { return $this->url; }

    /**
     * Returns an array with found errors
     *
     * @return array
     */
    public function getErrors() { return $this->errors; }

    /**
     * This method fakes a Oembed response.
     * It should be overwritten by the service
     * itself if the service is capable to determine
     * an html embed code based on the url or other methods.
     *
     * @return array
     * @codeCoverageIgnore
     */
     public function fakeResponse() { return array(); }

    /**
     * Normalizes a url.
     * This method should be overwritten by the
     * service itself, if needed.
     *
     * Use the $this->url property to do the job
     *
     * @return void
     * @codeCoverageIgnore
     */
    protected function normalizeUrl() {}

    /**
     * A Utility method to be used in conjuction
     * with the fakeResponse method. Returns
     * a valid width.
     *
     * @return int
     */
    protected function getWidth()
    {
        if (!empty($this->config['maxwidth']))
            return $this->config['maxwidth'];

        return (!empty($this->config['width']) ? $this->config['width'] : $this->fakeWidth);
    }

    /**
     * A Utility method to be used in conjuction
     * with the fakeResponse method. Returns
     * a valid height.
     *
     * @return int
     */
    protected function getHeight()
    {
        if (!empty($this->config['maxheight']))
            return $this->config['maxheight'];

        return (!empty($this->config['height']) ? $this->config['height'] : $this->fakeHeight);
    }
}
?>
