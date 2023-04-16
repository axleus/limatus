<?php

declare(strict_types=1);

namespace Limatus\Form\View\Delegator\Factory;

use Limatus\Form\View\Helper\FormElement;
use Laminas\ServiceManager\Factory\DelegatorFactoryInterface;
use Psr\Container\ContainerInterface;

class FormElementFactory implements DelegatorFactoryInterface
{
    /** @inheritDoc */
    public function __invoke(
        ContainerInterface $container,
        $name,
        callable $callback,
        ?array $options = null
    ): FormElement {
        return new FormElement();
    }
}
