<?php

use mcordingley\ProbabilityDistribution\Discrete\Hypergeometric;

class HypergeometricTest extends PHPUnit_Framework_TestCase
{
    private $testObject;

    public function __construct()
    {
        $this->testObject = new Hypergeometric(10, 5, 5);
    }

    public function test_pmf()
    {
        $this->assertEquals(0.39683, round($this->testObject->getPdf(2), 5));
    }

    public function test_cdf()
    {
        $this->assertEquals(0.5, $this->testObject->getCdf(2));
    }

    public function test_sf()
    {
        $this->assertEquals(0.5, $this->testObject->getSf(2));
    }

    public function test_ppf()
    {
        $this->assertEquals(2, $this->testObject->getPpf(0.5));
    }

    public function test_isf()
    {
        $this->assertEquals(2, $this->testObject->getIsf(0.5));
    }
    
    public function test_mean()
    {
        $this->assertEquals(2.5, $this->testObject->getMean());
    }
    
    public function test_variance()
    {
        $this->assertEquals(0.69444, round($this->testObject->getVariance(), 5));
    }
    
    public function test_skew()
    {
        $this->assertEquals(0, round($this->testObject->getSkew(), 5));
    }

    public function test_kurtosis()
    {
        $this->assertEquals(-0.17143, round($this->testObject->getKurtosis(), 5));
    }

    /*
     * Depends on Chi-square
    public function test_rvs()
    {
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