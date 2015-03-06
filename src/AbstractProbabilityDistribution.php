<?php

namespace mcordingley\ProbabilityDistribution;

abstract class AbstractProbabilityDistribution
{
    /**
     * getPdf
     * 
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
     * Tells you the probability of getting the test statistic or anything less.
     * 
     * @param float $x
     * @return float
     */
    abstract public function getCdf($x);
    
    /**
     * getSf
     * 
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
    
    abstract public function getPpf($x);
    
    abstract public function getIsf($x);
    
    abstract public function getMean();
    
    abstract public function getVariance();
    
    abstract public function getSkew();
    
    abstract public function getKurtosis();
    
    abstract public function generateRandomVariate();
}