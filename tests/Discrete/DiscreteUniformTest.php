<?php

use mcordingley\ProbabilityDistribution\Discrete\Uniform;

class DiscreteUniformTest extends PHPUnit_Framework_TestCase {
	private $testObject;

	public function __construct()
    {
		$this->testObject = new Uniform(1, 10);
	}

	public function test_pdf()
    {
		$this->assertEquals(0.1, $this->testObject->getPdf(4));
	}

	public function test_cdf()
    {
		$this->assertEquals(0.4, $this->testObject->getCdf(4));
	}

	public function test_sf()
    {
		$this->assertEquals(0.6, $this->testObject->getSf(4));
	}

	public function test_ppf()
    {
		$this->assertEquals(2, $this->testObject->getPpf(0.2));
	}

	public function test_isf()
    {
		$this->assertEquals(9, $this->testObject->getIsf(0.2));
	}
    
    public function test_mean()
    {
		$this->assertEquals(5.5, $this->testObject->getMean());
    }
    
    public function test_variance()
    {
		$this->assertEquals(8.33333, round($this->testObject->getVariance(), 5));
    }
    
    public function test_skew()
    {
		$this->assertEquals(0, $this->testObject->getSkew());
    }

	public function test_kurtosis()
    {
		$this->assertEquals(-1.22424, round($this->testObject->getKurtosis(), 5));
	}

    /*
     * Requires the chi-squared test to test
	public function test_rvs()
    {
		$variates = 10000;
		$max_tested = 10;
		$expected = array();
		$observed = array();

		for ($i = 0; $i <= $max_tested; $i++) {
			$expected[] = 0;
			$observed[] = 0;
		}
		
		for ($i = 1; $i < $variates; $i++) {
			$variate = $this->testObject->rvs();
			
			if ($variate < $max_tested)
				$observed[$variate]++;
			else
				$observed[$max_tested]++;
		}
		
		for ($i = 1; $i < $max_tested; $i++) {
			$expected[$i] = $variates * $this->testObject->pmf($i);
		}
		$expected[$max_tested] = $variates * $this->testObject->sf($max_tested - 1);
		
		$this->assertGreaterThanOrEqual(0.01, \PHPStats\statisticalTests::chiSquareTest($observed, $expected, $max_tested - 1));
		$this->assertLessThanOrEqual(0.99, \PHPStats\statisticalTests::chiSquareTest($observed, $expected, $max_tested - 1));
	}
    */
}