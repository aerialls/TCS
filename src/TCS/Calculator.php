<?php

/*
 * This file is part of the TCS website.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TCS;

/**
 * Calculator
 */
class Calculator
{
    /**
     * Data
     *
     * @var Array
     */
    private $data;

    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->data = array();
    }

    /**
     * Adds a value to a section
     *
     * @param string $section The section
     * @param string $value   The value to add
     */
    public function add($section, $value)
    {
        $old = isset($this->data[$section]) ? $this->data[$section] : 0;
        $this->data[$section] = $old + $value;
    }

    /**
     * Gets the value of a section
     *
     * @param string $section The section
     *
     * @return string The value
     */
    public function get($section)
    {
        return isset($this->data[$section]) ? $this->data[$section] : 0;
    }

    /**
     * Sums several sections
     *
     * @param array $sections
     *
     * @return integer The value
     */
    public function sum($sections)
    {
        $total = 0;
        $sections = (array) $sections;
        foreach ($sections as $section) {
            $total += $this->get($section);
        }

        return $total;
    }
}
