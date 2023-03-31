<?php

namespace App\Services;

class HateoasLinks
{
    /**
     * Stores HATEOAS links 
     *
     * @var array
     */
    private array $links = [];

    /**
     * Add HATEOAS link
     *
     * @param string $type
     * @param string $url
     * @param string $rel
     * @return void
     */
    private function add(string $type, string $url, string $rel) : void
    {
        $this->links[] = [
            'type' => $type, 
            'url' => $url, 
            'rel' => $rel
        ];
    }

    /**
     * Add GET type HATEOAS link
     *
     * @param string $url
     * @param string $rel
     * @return void
     */
    public function get(string $url, string $rel) : void
    {
        $this->add('GET', $url, $rel);
    }

    /**
     * Add POST type HATEOAS link
     *
     * @param string $url
     * @param string $rel
     * @return void
     */
    public function post(string $url, string $rel) : void
    {
        $this->add('POST', $url, $rel);
    }

    /**
     * Add PUT type HATEOAS link
     *
     * @param string $url
     * @param string $rel
     * @return void
     */
    public function put(string $url, string $rel) : void
    {
        $this->add('PUT', $url, $rel);
    }

    /**
     * Add PATCH type HATEOAS link
     *
     * @param string $url
     * @param string $rel
     * @return void
     */
    public function patch(string $url, string $rel) : void
    {
        $this->add('PATCH', $url, $rel);
    }

    /**
     * Add DELETE type HATEOAS link
     *
     * @param string $url
     * @param string $rel
     * @return void
     */
    public function delete(string $url, string $rel) : void
    {
        $this->add('DELETE', $url, $rel);
    }

    /**
     * Return HATEOAS links array
     *
     * @return array
     */
    public function toArray() : array
    {
        return $this->links;
    }
}