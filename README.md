[![Build Status](https://travis-ci.org/devhelp/normalizer.png)](https://travis-ci.org/devhelp/normalizer) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/xxxxxx/mini.png)](https://insight.sensiolabs.com/projects/xxxxxx)

## Installation

Composer is preferred to install Normalizer component, please check [composer website](http://getcomposer.org) for more information.

```
$ composer require 'devhelp/normalizer:dev-master'
```

## Purpose

Normalizer lets you to unify creation of objects using different data sources. For example, if you are creating an object
using data from API in one case and using data from CSV file in the other then normalizer can be useful.

## Usage

```

$filterA1 = new MyFilterA1();
$filterA2 = new MyFilterA2();
$filterB1 = new MyFilterB1();
$filterB2 = new MyFilterB2();

$filterChainA = new FilterChain();
$filterChainA
    ->addFilter($filterA1)
    ->addFilter($filterA2);

$filterChainB = new FilterChain();
$filterChainB
    ->addFilter($filterB1)
    ->addFilter($filterB2);


```

## Credits

Brought to you by : Devhelp.pl (http://devhelp.pl)
