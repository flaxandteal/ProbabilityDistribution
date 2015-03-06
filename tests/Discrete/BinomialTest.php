<?php

use mcordingley\ProbabilityDistribution\Discrete\Binomial;

class BinomialTest extends PHPUnit_Framework_TestCase
{
	private $testObject;

	public function __construct()
    {
		$this->testObject = new Binomial(0.5, 5);
	}

	public function testPdf()
    {
		$this->assertEquals(0.3125, $this->testObject->getPdf(2));
	}

	public function testCdf()
    {
		$this->assertEquals(0.5, $this->testObject->getCdf(2));
	}

	public function testSf()
    {
		$this->assertEquals(0.5, $this->testObject->getSf(2));
	}

	public function testPpf()
    {
		$this->assertEquals(2, $this->testObject->getPpf(0.5));
	}

	public function testIsf()
    {
		$this->assertEquals(2, $this->testObject->getIsf(0.5));
	}
    
    public function testMean()
    {
        $this->assertEquals(2.5, $this->testObject->getMean());
    }
    
    public function testVariance()
    {
		$this->assertEquals(1.25, $this->testObject->getVariance());
    }
    
    public function testSkew()
    {
		$this->assertEquals(0, $this->testObject->getSkew());
    }

	public function testKurtosis()
    {
		$this->assertEquals(-0.4, $this->testObject->getKurtosis());
	}

    /*
     * Unable to run this test at present. Need the ChiSquare distribution.
	public function test_rvs() {
		$variates = 10000;
		$max_tested = 5;
		$expected = array();
		$observed = array();

		for ($i = 0; $i <= $max_tested; $i++) {
			$expected[] = 0;
			$observed[] = 0;
		}
		
		for ($i = 0; $i < $variates; $i++) {
			$variate = $this->testObject->rvs();
			
			if ($variate < $max_tested)
				$observed[$variate]++;
			else
				$observed[$max_tested]++;
		}
		
		for ($i = 0; $i < $max_tested; $i++) {
			$expected[$i] = $variates * $this->testObject->pmf($i);
		}
		$expected[$max_tested] = $variates * $this->testObject->sf($max_tested - 1);
		
		$this->assertGreaterThanOrEqual(0.01, \PHPStats\statisticalTests::chiSquareTest($observed, $expected, $max_tested - 1));
		$this->assertLessThanOrEqual(0.99, \PHPStats\statisticalTests::chiSquareTest($observed, $expected, $max_tested - 1));
	}
    */
}