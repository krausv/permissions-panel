# permissions-panel

permission-panel is simple bar panel for [Tracy](https://tracy.nette.org/). Permission-panel containt list of roles and resources of [Nette\Security\Permission](https://api.nette.org/2.3.8/Nette.Security.Permission.html)

![Tracy panel screenshot](https://github.com/krausv/permissions-panel/blob/master/permissions.jpg)

## Installation

~~~
$ composer require krausv/permissions-panel
~~~

Register permissions-panel in config.neon

~~~
extensions:
  permissions-panel: Krausv\PermissionsPanel\Nette\DI\PermissionsPanelExtension(%debugMode%)
~~~

and register [Nette\Security\Permission](https://api.nette.org/2.3.8/Nette.Security.Permission.html)

~~~
services:
	authorizator:
	    class: Nette\Security\Permission
	    setup:
	        - addRole('guest')
	        - addRole('admin')
	        - addResource('Users')
	        - addResource('Article')
	        - allow('admin', 'Article', 'view')
	        - allow('guest', 'Users', 'view')
	        - allow('guest', 'Users', 'delete')
