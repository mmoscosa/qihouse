<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */

	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/nosotros', array('controller' => 'pages', 'action' => 'nosotros'));
	Router::connect('/club', array('controller' => 'pages', 'action' => 'club'));
	Router::connect('/bazar/*', array('controller' => 'products', 'action' => 'tes'));
	Router::connect('/membresia', array('controller' => 'usuarios', 'action' => 'landing'));
	Router::connect('/contacto', array('controller' => 'pages', 'action' => 'contacto'));
	Router::connect('/checkout', array('controller' => 'products', 'action' => 'checkout'));
	Router::connect('/paypalsuccess', array('controller' => 'products', 'action' => 'paypalsuccess'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
