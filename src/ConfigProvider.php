<?php

declare(strict_types=1);

namespace Limatus;

use Laminas\Form\View\Helper\Factory\FormElementErrorsFactory;
use Laminas\Form\View\Helper\Form;
use Laminas\Form\View\Helper\FormCollection;
use Laminas\Form\View\Helper\FormElement;
use Laminas\Form\View\Helper\FormElementErrors;
use Laminas\Form\View\Helper\FormInput;
use Laminas\Form\View\Helper\FormPassword;
use Laminas\Form\View\Helper\FormRow;
use Laminas\View\Helper\Navigation\Menu;
use Limatus\Form\RenderListenerInterface;
use Limatus\Form\Element;
use Limatus\Form\View;
use Limatus\Form\View\Helper;
use Limatus\Provider\Bootstrap\LayoutMode;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencyConfig(),
            'form_elements' => $this->getFormElementConfig(),
            'view_helpers'  => $this->getViewHelperConfig(),
            'view_helper_config' => $this->getHelperConfig(),
        ];
    }

    public function getDependencyConfig(): array
    {
        return [
            'aliases'   => [
                RenderListenerInterface::class
                    => Provider\Bootstrap\Listener\RenderListener::class,
            ],
            'factories' => [
                Element\Listener\ElementListener::class
                    => Element\Listener\ElementListenerFactory::class,
                Provider\Bootstrap\Listener\RenderListener::class
                    => Provider\Bootstrap\Listener\RenderListenerFactory::class,
            ],
        ];
    }

    /** only new components get aliases */
    public function getViewHelperConfig(): array
    {
        return [
            'delegators' => [
                Form::class               => [
                    Helper\FormDelegatorFactory::class,
                ],
                // FormCollection::class     => [
                //     View\Delegator\Factory\FormCollectionFactory::class,
                // ],
                FormElement::class        => [
                    Helper\FormElementDelegatorFactory::class,
                ],
                FormRow::class            => [
                    Helper\FormRowDelegatorFactory::class,
                ],
            ],
        ];
    }

    public function getHelperConfig(): array
    {
        return [
            static::class => [
                'form_layout_mode' => LayoutMode::Grid, // Override the default form layout
                // set defaults. Values passed via $formHelper mutators will override these values.
                'g'      => '',
                'row'    => '',
                'mb'     => '',
                'col'    => '',
            ],
            'form_element_errors' => [
                'message_open_format'      => '<div%s><ul><li>',
                'message_separator_string' => '</li><li>',
                'message_close_string'     => '</li></ul></div>',
                'attributes'               => [
                    'class' => 'invalid-feedback',
                ],
            ],
        ];
    }

    public function getFormElementConfig(): array
    {
        return [
            'aliases'    => [],
            'factories'  => [
                // Element\Checkbox::class => ElementFactory::class,
                // Element\Text::class     => ElementFactory::class,
            ],
            'delegators' => [
                // Checkbox::class => [
                //     Element\Delegator\Factory\CheckboxFactory::class,
                // ],
                // Text::class     => [
                //     Element\Delegator\Factory\TextFactory::class,
                // ],
            ],
        ];
    }

    public function getNavigationHelperConfig(): array
    {
        return [
            // 'aliases'    => [],
            // 'factories'  => [
            //     Helper\Navigation\Menu::class => InvokableFactory::class,
            // ],
            // 'delegators' => [
            //     Menu::class => [
            //         Helper\Navigation\Delegator\Factory\MenuFactory::class,
            //     ],
            // ],
        ];
    }
}
