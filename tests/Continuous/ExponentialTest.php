<?php

use mcordingley\ProbabilityDistribution\Continuous\Exponential;

class ExponentialTest extends PHPUnit_Framework_TestCase
{
	private $testObject;

	public function __construct()
    {
		$this->testObject = new Exponential(10);
	}

	public function test_pdf()
    {
		$this->assertEquals(0.06738, round($this->testObject->getPdf(0.5), 5));
		$this->assertEquals(0.82085, round($this->testObject->getPdf(0.25), 5));
	}

	public function test_cdf()
    {
		$this->assertEquals(0.5, round($this->testObject->getCdf(0.06931), 4));
		$this->assertEquals(0.9, round($this->testObject->getCdf(0.23026), 5));
	}

	public function test_sf()
    {
		$this->assertEquals(0.5, round($this->testObject->getSf(0.06931), 4));
		$this->assertEquals(0.1, round($this->testObject->getSf(0.23026), 5));
	}

	public function test_ppf()
    {
		$this->assertEquals(0.06931, round($this->testObject->getPpf(0.5), 5));
		$this->assertEquals(0.23026, round($this->testObject->getPpf(0.9), 5));
	}

	public function test_isf()
    {
		$this->assertEquals(0.06931, round($this->testObject->getIsf(0.5), 5));
		$this->assertEquals(0.23026, round($this->testObject->getIsf(0.1), 5));
	}
    
    public function test_mean()
    {
		$this->assertEquals(0.1, round($this->testObject->getMean(), 5));
    }
    
    public function test_variance()
    {
		$this->assertEquals(0.01, round($this->testObject->getVariance(), 5));
    }
    
    public function test_skew()
    {
		$this->assertEquals(2, round($this->testObject->getSkew(), 5));
    }

    public function test_kurtosis()
    {
		$this->assertEquals(6, round($this->testObject->getKurtosis(), 5));
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