<?php

/**
 * This file is part of the krausv/permissions-panel
 *
 * Copyright (c) 2016 Vaclav Kraus (krauva@gmail.com)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this
 * source code.
 */

namespace Krausv\PermissionsPanel;

use Tracy;
use Nette;

class Panel extends Nette\Object implements Tracy\IBarPanel
{
    private $container, $reflection;

    /**
     * Panel constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;

        if ($this->container->hasService('authorizator')) {
			$this->reflection = new Reflection($this->container->getByType('Nette\Security\Permission'));
        }
    }

    /**
     * Renders HTML code for custom tab.
     * @return string
     */
    function getTab()
    {
        if ($this->container->hasService('authorizator')) {
            ob_start();
            require __DIR__ . '/templates/Panel.tab.phtml';
            return ob_get_clean();
        }
    }

    /**
     * Renders HTML code for custom panel.
     * @return string
     */
    function getPanel()
    {
        if ($this->container->hasService('authorizator')) {
            ob_start();
            $Permission = $this->container->getByType('Nette\Security\Permission');
            $permissions = $this->reflection->getPropertyValue('rules');
            $resources = $Permission->getResources();
            $roles = $Permission->getRoles();

            require __DIR__ . '/templates/Panel.panel.phtml';
            return ob_get_clean();
        }
    }
}