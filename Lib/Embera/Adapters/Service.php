<?php
/**
 * Service.php
 *
 * @package Adapters
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Adapters;

/**
 * This is an abstract class and all Service/Providers should extend it.
 */
abstract class Service
{
    /** @var object Instance of \Embera\Url */
    protected $url;

    /** @var object Instance of \Embera\Oembed */
    protected $oembed = null;

    /** @var array Associative array with config/parameters to be sent to the oembed provider */
    protected $config = array();

    /** @var array Array with all the errors */
    protected $errors = array();

    /** @var string The api url for the current service */
    protected $apiUrl = null;

    /**
     * Validates that the url belongs to this service.
     * Should be implemented on all children and must
     * return a boolean.
     *
     * The current url is made available via $this->url
     *
     * @return bool
     */
    abstract protected function validateUrl();

    /**
     * Construct
     *
     * @param string $url
     * @param array  $config
     * @param object $oembed
     * @return void
     *
     * @throws InvalidArgumentException when the given url doesnt match the current service
     */
    public function __construct($url, array $config = array(), \Embera\Oembed $oembed)
    {
        $this->url = new \Embera\Url($url);
        $this->normalizeUrl();

        if (!$this->validateUrl())
            throw new \InvalidArgumentException('Url ' . $this->url . ' seems to be invalid for the ' . get_class($this) . ' service');

        $this->config = array_replace_recursive(array(
            'params' => array(
                'maxwidth' => 0,
                'maxheight' => 0,
            )
        ), $config);

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

            if ($response = $this->oembed->getResourceInfo($this->apiUrl, (string) $this->url, $this->config['params']))
                return $this->modifyResponse($response);

        } catch (\Exception $e) { $this->errors[] = $e->getMessage(); }

        if ($response = $this->fakeResponse())
        {
            $fakeResponse = new \Embera\FakeResponse($this->config, $response);
            return $this->modifyResponse($fakeResponse->buildResponse());
        }

        return array();
    }

    /**
     * Appends custom parameters for the oembed request
     *
     * @param array $params
     * @return void
     */
    public function appendParams(array $params = array()) { $this->config['params'] = array_merge($this->config['params'], $params); }

    /**
     * Returns the url
     *
     * @return string
     */
    public function getUrl() { return (string) $this->url; }

    /**
     * Returns an array with all the parameters for the oembed request
     *
     * @return array
     */
    public function getParams() { return $this->config['params']; }

    /**
     * Returns an array with found errors
     *
     * @return array
     */
    public function getErrors() { return $this->errors; }

    /**
     * This method fakes a Oembed response.
     *
     * It should be overwritten by the service
     * itself if the service is capable to determine
     * an html embed code based on the url or by other methods.
     *
     * @return array with data that the oembed response should have
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
     */
    protected function normalizeUrl() {}

    /**
     * Gives the hability to modify the response/fake-response array
     * from an oembed provider.
     *
     * It should be overwritten by the service when needed
     *
     * @param array $response
     * @return array
     */
    protected function modifyResponse(array $response = array()) { return $response; }
}

?>
