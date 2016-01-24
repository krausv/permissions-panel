<?php

/**
 * This file is part of the krausv/permissions-panel
 *
 * Copyright (c) 2016 Vaclav Kraus (krauva@gmail.com)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this
 * source code.
 */

namespace Krausv\PermissionsPanel\Nette\DI;

use Nette;

class PermissionsPanelExtension extends Nette\DI\CompilerExtension
{
    private $debugMode;

    public function __construct($debugMode)
    {
        $this->debugMode = $debugMode;
    }

    public function loadConfiguration()
    {
        if ($this->debugMode) {

            $container = $this->getContainerBuilder();
            $container->getDefinition('tracy.bar')
                ->addSetup('addPanel', [
                    new Nette\Di\Statement('Krausv\PermissionsPanel\Panel', [$container])
                ]);
        }
    }
}