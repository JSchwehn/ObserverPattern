Observer Pattern
===============

![Observer Pattern](https://raw.githubusercontent.com/JSchwehn/ObserverPattern/master/src/ObserverPattern/doc/observerPattern.png "Observer Pattern") 

Source: http://en.wikipedia.org/wiki/File:Observer.svg

A simple implementation of the Observer Pattern.

Just a small practice. But maybe it will help someone to understand the pattern.

PHP comes with a example interface in its Standard PHP Library (SPL). http://www.php.net/manual/en/book.spl.php
and the interface can be found at http://www.php.net/manual/en/class.splobserver.php

I will use this interface to do an implementation.

The pattern has two components, a observer and a subject. The subject is the thing we want to
observe. e.g. watch for state changes. We use an observer to observe those state changes.

