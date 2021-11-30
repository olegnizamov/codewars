<?php


/**
 * @param string $mystery
 * @throws MysterySolvedException
 */
function solveTheMystery(string $mystery)
{
    $oReflectionClass = new ReflectionClass($mystery);
    $object = $oReflectionClass->isAbstract() ? null : $oReflectionClass->newInstanceWithoutConstructor();
    $props = $oReflectionClass->getProperties();
    foreach ($props as $prop) {
        if (strpos($prop->getDocComment(), '@condition') !== false) {
            $prop->setAccessible(true);
            $prop->setValue($object, true);
        }
    }

    foreach ($oReflectionClass->getMethods() as $method) {
        if (strpos($method->getDocComment(), '@here') !== false) {
            $method->setAccessible(true);
            try {
                throw $method->invoke($object,true);
            } catch (Exception $exception) {

                while (!($exception instanceof MysterySolvedException) && $exception->getPrevious()) {
                    $exception = $exception->getPrevious();
                }

                if ($exception instanceof MysterySolvedException) {
                    throw $exception;
                }
            }
        }
    }
}