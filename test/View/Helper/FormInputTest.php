<?php

declare(strict_types=1);

namespace LimatusTest\Form\View\Helper;

use Limatus\Form\View\Helper;
use LimatusTest\Form\View\Helper\AbstractCommonTestCase;
use Laminas\Form\View\Helper\FormInput;

class FormInputTest extends AbstractCommonTestCase
{
    protected function setUp(): void
    {
        $this->helper = new Helper\FormInput(new FormInput());
        parent::setUp();
    }

    public function testFormInputIsDelegated(): void
    {
        self::assertInstanceOf(
            Helper\FormInput::class,
            $this->renderer->plugin('forminput'),
            'FormInput has not been properly delegated.'
        );
    }
}
