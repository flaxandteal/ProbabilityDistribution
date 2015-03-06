<?php

namespace mcordingley\ProbabilityDistribution;

abstract class AbstractProbabilityDistribution
{
    /**
     * getPdf
     * 
     * Probability Density Function
     * In the case of a discrete distribution, tells you the probability of
     * getting exactly the stated value. In the case of a continuous
     * distribution, this value is the simply the derivative of the CDF.
     * 
     * @param float $x
     * @return float
     */
    abstract public function getPdf($x);

    /**
     * getCdf
     * 
     * Cumulative Density Function
     * Tells you the probability of getting the test statistic or anything less.
     * 
     * @param float $x
     * @return float
     */
    abstract public function getCdf($x);
    
    /**
     * getSf
     * 
     * Survival Function
     * Also known as the "Complementary Cumulative Distribution Function" or as
     * the "Reliability Function". Whereas the CDF tells you the probability of
     * getting the test statistic or anything less, this tells you the
     * probability of getting a value more extreme than the test statistic.
     * 
     * If you're looking to do a one-tailed test, this is your function.
     * 
     * @param float $x
     * @return float
     */
    public function getSf($x)
    {
        return 1 - $this->getCdf($x);
    }
    
    /**
     * getPpf
     * 
     * Percent Point Function
     * Also known as the "Quantile Function", this function is the inverse of
     * the CDF. It tells you what value exists at the $x percentile for the
     * distribution.
     * 
     * @param float $x
     * @return float
     */
    abstract public function getPpf($x);
	
    /**
     * getIsf
     * 
     * Inverse Survival Function
     * 
     * Tells you what value exists a the 1 - $x percentile for the distribution.
     * 
     * @param float $x
     * @return float
     */
	public function getIsf($x)
    {
		return $this->getPpf(1.0 - $x);
	}
    
    abstract public function getMean();
    
    abstract public function getVariance();
    
    abstract public function getSkew();
    
    abstract public function getKurtosis();
    
    abstract public function generateRandomVariate();
}