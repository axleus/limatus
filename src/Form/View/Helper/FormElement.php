<?php

declare(strict_types=1);

namespace Bootstrap\Form\View\Helper;

use Bootstrap\BootstrapInterface;
use Bootstrap\Form\View\Helper;
use Laminas\Form\Element;
use Laminas\Form\ElementInterface;
use Laminas\Form\View\Helper\FormElement as BaseHelper;
use Laminas\View\Renderer\PhpRenderer;

final class FormElement extends BaseHelper
{
    use Helper\FormHelperTrait;

    protected $bsTypeMap = [];

    public function __invoke(
        ?ElementInterface $element = null,
        ?string $mode = BootstrapInterface::MODE_DEFAULT
    ) {
        if (! $element) {
            return $this;
        }

        if ($element instanceof BootstrapInterface || $this->classCheck($element)) {
            return $this->render($element);
        }

        return parent::render($element);
    }
}
