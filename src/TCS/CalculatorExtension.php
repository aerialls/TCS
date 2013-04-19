<?php

/*
 * This file is part of the TCS website.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TCS;

/**
 * Twig Calculator extension
 */
class CalculatorExtension extends \Twig_Extension
{
    private $calculator;

    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->calculator = new Calculator();
    }

    public function getFunctions()
    {
        return array(
            'calc_add' => new \Twig_Function_Method($this, 'addCalculator', array('is_safe' => array('html'))),
            'calc_get' => new \Twig_Function_Method($this, 'getCalculator', array('is_safe' => array('html'))),
            'calc_sum' => new \Twig_Function_Method($this, 'sumCalculator', array('is_safe' => array('html'))),
        );
    }

    public function addCalculator($section, $value)
    {
        $this->calculator->add($section, $value);

        return number_format($value, 2, ',', ' ').' &euro;';
    }

    public function getCalculator($section)
    {
        return number_format($this->calculator->get($section), 2, ',', ' ').' &euro;';
    }

    public function sumCalculator($sections)
    {
        return number_format($this->calculator->sum($sections), 2, ',', ' ').' &euro;';
    }

    public function getName()
    {
        return 'calculator';
    }
}