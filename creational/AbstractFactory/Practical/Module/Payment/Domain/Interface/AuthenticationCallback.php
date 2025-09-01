<?php

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Interface;

interface AuthenticationCallback
{
    public function processCallback(): void;
}