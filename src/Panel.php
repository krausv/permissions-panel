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

    /** @var string */
    private $error;
    /** @var string */
    private $dir;

    private $container;

    public function __construct($container)
    {
       $this->container = $container;
    }

    /**
     * Renders HTML code for custom tab.
     * @return string
     */
    function getTab()
    {
        ob_start();
        require __DIR__ . '/templates/Panel.tab.phtml';
        return ob_get_clean();
    }

    /**
     * Renders HTML code for custom panel.
     * @return string
     */
    function getPanel()
    {
        ob_start();
        $error = $this->error;

        if ($this->error === NULL) {
            $permissions = $this->container->getByType('Nette\Security\Permission');
        }

        require __DIR__ . '/templates/Panel.panel.phtml';
        return ob_get_clean();
    }
}