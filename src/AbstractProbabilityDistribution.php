<?php

namespace mcordingley\ProbabilityDistribution;

abstract class AbstractProbabilityDistribution
{
    abstract public function getPdf($x);

    abstract public function getCdf($x);
    
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