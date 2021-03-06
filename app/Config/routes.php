<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/',array('controller'=>'books','action'=>'index'));
	Router::connect('/sach-moi',array('controller'=>'books','action'=>'latest_books'));
	Router::connect('/tac-gia',array('controller'=>'writers','action'=>'index'));
	//Router::connect('/tac-gia/:name',array('controller'=>'writers','action'=>'view'),array('pass'=>array('name')));
	//Router::connect('/tac-gia/*',array('controller'=>'writers','action'=>'view'));
	//Router::connect('/:book_title',array('controller'=>'books','action'=>'view'),array('pass'=>array('book_title')));
	//Router::connect('com',array('controller'=>'books','action'=>'view'),array('pass'=>array('book_title')));
	//Router::connect('/danh-muc/:name',array('controller'=>'categories','action'=>'view'),array('pass'=>array('name')));
	//Router::connect('/danh-muc/*',array('controller'=>'categories','action'=>'view'));
	//////////////////////////////////////////////////////////////////////////////////
	Router::connect('/lienhe', array('controller'=>'books', 'action'=> 'lienhe'));
	Router::connect('/gio-hang', array('controller'=>'books', 'action'=> 'view_cart'));
	Router::connect('/dang-ky-tai-khoan',array('controller' =>'users','action'=>'add'));
    Router::connect('/gio-hang',array('controller' =>'books','action'=>'view_cart'));
    Router::connect('quen-mat-khau',array('controller' =>'users','action'=>'forgot_password'));
    Router::connect('thay-doi-thong-tin',array('controller' =>'users','action'=>'edit'));
    Router::connect('thay-doi-mat-khau',array('controller' =>'users','action'=>'change_password'));
    Router::connect('/',array('controller' =>'books','action'=>'index'));
    Router::connect('/dang-nhap',array('controller' =>'users','action'=>'login'));
    Router::connect('/dang-xuat',array('controller' =>'users','action'=>'logout'));
    Router::connect('/sach-moi',array('controller'=>'books','action'=>'latest_books'));
    Router::connect('/tac-gia',array('controller'=>'writers','action'=>'index'));
    //Router::connect('/tac-gia/*',array('controller'=>'writers','action'=>'view'));
    Router::connect('/tac-gia/:slug',array('controller'=>'writers','action'=>'view'),array('pass'=>array('slug'))); 
    Router::connect('/danh-muc',array('controller'=>'categories','action'=>'index'));
    Router::connect('/danh-muc/:slug',array('controller'=>'categories','action'=>'view'),array('pass'=>array('slug'))); 
    Router::connect('/:book_title',array('controller'=>'books','action'=>'view'),array('pass'=>array('book_title')));
	
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

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
