# permissions-panel

permission-panel is simple bar panel for [Tracy](https://tracy.nette.org/). Permission-panel containt list of roles and resources of [Nette\Security\Permission](https://api.nette.org/2.3.8/Nette.Security.Permission.html)

![Tracy panel screenshot](https://github.com/krausv/permissions-panel/blob/master/permissions.jpg)

## Installation

~~~
$ composer require krausv/permissions-panel
~~~

and register permissions-panel in config.neon

~~~
extensions:
  permissions-panel: Krausv\PermissionsPanel\Nette\DI\PermissionsPanelExtension(%debugMode%)
