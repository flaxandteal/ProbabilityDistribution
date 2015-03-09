<?php

use mcordingley\ProbabilityDistribution\Continuous\Pareto;

class ParetoTest extends PHPUnit_Framework_TestCase
{
    private $testObject;

    public function __construct()
    {
        $this->testObject = new Pareto(1, 5);
    }

    public function test_pdf()
    {
        $this->assertEquals(1.67449, round($this->testObject->getPdf(1.2), 5));
        $this->assertEquals(0.29802, round($this->testObject->getPdf(1.6), 5));
    }

    public function test_cdf()
    {
        $this->assertEquals(0.5, round($this->testObject->getCdf(1.1487), 3));
        $this->assertEquals(0.9, round($this->testObject->getCdf(1.58489), 3));
    }

    public function test_sf()
    {
        $this->assertEquals(0.5, round($this->testObject->getSf(1.1487), 3));
        $this->assertEquals(0.1, round($this->testObject->getSf(1.58489), 3));
    }

    public function test_ppf()
    {
        $this->assertEquals(1.1487, round($this->testObject->getPpf(0.5), 4));
        $this->assertEquals(1.58489, round($this->testObject->getPpf(0.9), 5));
    }

    public function test_isf()
    {
        $this->assertEquals(1.1487, round($this->testObject->getIsf(0.5), 4));
        $this->assertEquals(1.58489, round($this->testObject->getIsf(0.1), 5));
    }
    
    public function test_mean()
    {
        $this->assertEquals(1.25, round($this->testObject->getMean(), 2));
    }
    
    public function test_variance()
    {
        $this->assertEquals(0.10417, round($this->testObject->getVariance(), 5));
    }
    
    public function test_skew()
    {
        $this->assertEquals(4.64758, round($this->testObject->getSkew(), 5));
    }

    public function test_stats()
    {
        $this->assertEquals(70.8, round($this->testObject->getKurtosis(), 1));
    }

    /*
     * Depends on the Kolmogorov-Smirnov test.
    public function test_rvs()
    {
        $variates = array();
        for ($i = 0; $i < 10000; $i++) $variates[] = $this->testObject->rvs();
        $this->assertGreaterThanOrEqual(0.01, \PHPStats\StatisticalTests::kolmogorovSmirnov($variates, $this->testObject));
        $this->assertLessThanOrEqual(0.99, \PHPStats\StatisticalTests::kolmogorovSmirnov($variates, $this->testObject));
    }
    */
}