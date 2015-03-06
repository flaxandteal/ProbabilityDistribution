<?php

use mcordingley\ProbabilityDistribution\Continuous\Uniform;

class ContinuousUniformTest extends PHPUnit_Framework_TestCase
{
    private $testObject;

    public function __construct()
    {
        $this->testObject = new Uniform(1, 10);
    }

    public function test_pdf()
    {
        $this->assertEquals(0.11111, round($this->testObject->getPdf(4), 5));
        $this->assertEquals(0.11111, round($this->testObject->getPdf(8), 5));
    }

    public function test_cdf()
    {
        $this->assertEquals(0.3333, round($this->testObject->getCdf(4), 4));
        $this->assertEquals(0.8889, round($this->testObject->getCdf(9), 4));
    }

    public function test_sf()
    {
        $this->assertEquals(0.66667, round($this->testObject->getSf(4), 5));
        $this->assertEquals(0.1111, round($this->testObject->getSf(9), 4));
    }

    public function test_ppf()
    {
        $this->assertEquals(4, round($this->testObject->getPpf(0.33333), 4));
        $this->assertEquals(9, round($this->testObject->getPpf(0.88889), 4));
    }

    public function test_isf()
    {
        $this->assertEquals(7, round($this->testObject->getIsf(0.33333), 4));
        $this->assertEquals(2, round($this->testObject->getIsf(0.88889), 4));
    }
    
    public function test_mean()
    {
        $this->assertEquals(5.5, round($this->testObject->getMean(), 5));
    }
    
    public function test_variance()
    {
        $this->assertEquals(6.75, round($this->testObject->getVariance(), 5));
    }
    
    public function test_skew()
    {
        $this->assertEquals(0, round($this->testObject->getSkew(), 5));
    }

    public function test_kurtosis()
    {
        $this->assertEquals(-1.2, round($this->testObject->getKurtosis(), 5));
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