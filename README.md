Probability Distribution
========================

[![Build Status](https://api.travis-ci.org/repositories/mcordingley/ProbabilityDistribution.svg)](https://travis-ci.org/mcordingley/ProbabilityDistribution)

In-progress split of the probability distributions from PHPStats into their own
project.

## Installation

Add this to your composer.json and update:

    "mcordingley/probability-distribution": "dev-master"

This will eventually switch over to using semantic versioning,
but it makes little sense to do so while this is in early
development.

## Help This Project!

The biggest blocker to getting good statistical software working in PHP is the
lack of the special mathematical functions in PHP. We need things like `gamma`,
`digamma`, `beta`, et al to be able to implement a number of the distributions
here. Commonly-used distributions, like the F distribution and Student's t
distribution absolutely require these functions to be able to work.

The old PHPStats library does have implementations of these, but I cannot
account for their accuracy. What this project needs to succeed are new
implementations in a separate PHP package that are of high quality. Making this
happen is beyond my ability. I have set up
[ExtendedMath](https://github.com/mcordingley/ExtendedMath) as a place where
these functions can be gathered, but cannot fill it myself.