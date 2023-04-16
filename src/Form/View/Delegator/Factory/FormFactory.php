<?php

declare(strict_types=1);

namespace Limatus\Form\View\Delegator\Factory;

use Limatus\Form\View\Helper\Form;
use Laminas\ServiceManager\Factory\DelegatorFactoryInterface;
use Psr\Container\ContainerInterface;

class FormFactory implements DelegatorFactoryInterface
{
    /** @inheritDoc */
    public function __invoke(
        ContainerInterface $container,
        $name,
        callable $callback,
        ?array $options = null
    ): Form {
        return new Form();
    }
}
