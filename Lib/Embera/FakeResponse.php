<?php
/**
 * FakeResponse.php
 *
 * @package Embera
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera;

/**
 * This class manages fake oembed responses
 */
class FakeResponse
{
    /** @var array Configuration Array */
    protected $config = array();

    /** @var array Array with default oembed data */
    protected $response = array(
        'version' => '1.0',
        'provider_name' => '',
        'url' => '',
        'title' => '',
        'author_name' => '',
        'author_url' => '',
        'cache_age' => 0,
        'embera_using_fake' => 1
    );

    /**
     * Construct
     *
     * @param array $config
     * @param array $response
     * @return void
     */
    public function __construct(array $config = array(), array $response = array())
    {
        $this->config = array_replace_recursive(array(
            'fake' => array(
                'width' => 420,
                'height' => 315
            ),
            'params' => array(
                'maxwidth' => 0,
                'maxheight' => 0,
            )
        ), $config);

        $this->config['fake']['width']  = max($this->config['fake']['width'], $this->config['params']['maxwidth']);
        $this->config['fake']['height'] = max($this->config['fake']['height'], $this->config['params']['maxheight']);
        unset($this->config['params']);

        $this->response = array_merge($this->response, $this->config['fake'], $response);
    }

    /**
     * Builds the fake response.
     * This replaces placeholders that are present in $config['fake']
     * into the response array
     *
     * @return array
     */
    public function buildResponse()
    {
        $return = array();
        foreach ($this->response as $k => $v)
        {
            $return[$k] = str_replace(array_map(function ($name){
                return '{' . $name . '}';
            }, array_keys($this->config['fake'])), array_values($this->config['fake']), $v);
        }

        return $return;
    }
}

?>
