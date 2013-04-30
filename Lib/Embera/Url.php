<?php
/**
 * Url.php
 *
 * @author  Michael Pratt <pratt@hablarmierda.net>
 * @link    http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Embera;

class Url
{
    protected $data = array();

    /**
     * Construct
     *
     * @param string $url
     * @return void
     *
     * @throws InvalidArgumentException when the url seems to be invalid
     */
    public function __construct($url)
    {
        if (strlen($url) < 3 || !filter_var($url, FILTER_VALIDATE_URL))
            throw new \InvalidArgumentException('Invalid Url Given');

        $data = parse_url($url);
        if (empty($data['host']) || count(explode('.', $data['host'])) <= 1)
            throw new \InvalidArgumentException('Invalid Url Given');

        $data['host'] = preg_replace('~^www\.~', '', strtolower($data['host']));
        $this->data = array_merge(array('original' => $url,
                                        'scheme' => 'http',
                                        'host' => '',
                                        'path' => '/',
                                        'fragment' => '',
                                        'query' => ''), $data);
    }

    /**
     * Getter Method
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property) { return $this->data[$property]; }

    /**
     * Setter Method
     *
     * @param string $property
     * @param mixed  $value
     * @return void
     */
    public function __set($property, $value) { $this->data[$property] = $value; }

    /**
     * Check if a property is set
     *
     * @param string $property
     * @return bool
     */
    public function __isset($property) { return isset($this->data[$property]); }

    /**
     * Constructs the url based on the
     * data collected
     *
     * @return string
     */
    public function __toString()
    {
        $url = $this->data['scheme'] . '://' . $this->data['host'];
        if (!empty($this->data['path']))
            $url .= $this->data['path'];

        if (!empty($this->data['query']))
        {
            $query = array();
            parse_str($this->data['query'], $query);
            $url .= '?' . http_build_query($query);
        }

        return $url;
    }
}
?>
