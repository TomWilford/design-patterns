<?php

namespace creational\Singleton\Practical\Application\FeatureFlag\AbstractFactory\Practical\Module\Payment\Domain\Interface;

interface AuthenticationRedirect
{
    public function redirect(): string;
}