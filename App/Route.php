<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'IndexController',
			'action' => 'index'
		);
		$routes['sign_up'] = array(
			'route' => '/sign_up',
			'controller' => 'IndexController',
			'action' => 'signUp'
		);
		$routes['register'] = array(
			'route' => '/register',
			'controller' => 'IndexController',
			'action' => 'register'
		);
		$routes['authenticate'] = array(
			'route' => '/authenticate',
			'controller' => 'AuthController',
			'action' => 'authenticate'
		);
		$routes['sign_out'] = array(
			'route' => '/sign_out',
			'controller' => 'AuthController',
			'action' => 'signOut'
		);
		$routes['forgot_password'] = array(
			'route' => '/forgot_password',
			'controller' => 'IndexController',
			'action' => 'forgotPassword'
		);
		$routes['update_password'] = array(
			'route' => '/update_password',
			'controller' => 'IndexController',
			'action' => 'updatePassword'
		);
		$routes['my_profile'] = array(
			'route' => '/my_profile',
			'controller' => 'UserProfileController',
			'action' => 'myProfile'
		);
		$routes['update_profile'] = array(
			'route' => '/update_profile',
			'controller' => 'UserProfileController',
			'action' => 'updateProfile'
		);
		$routes['dashboard'] = array(
			'route' => '/dashboard',
			'controller' => 'DashboardController',
			'action' => 'dashboard'
		);
		$routes['orders'] = array(
			'route' => '/orders',
			'controller' => 'OrdersController',
			'action' => 'orders'
		);
		$routes['export_orders'] = array(
			'route' => '/export_orders',
			'controller' => 'OrdersController',
			'action' => 'exportOrders'
		);
		$routes['register_orders'] = array(
			'route' => '/register_orders',
			'controller' => 'OrdersController',
			'action' => 'registerOrders'
		);
		$routes['edit_orders'] = array(
			'route' => '/edit_orders',
			'controller' => 'OrdersController',
			'action' => 'editOrders'
		);
		$routes['update_orders'] = array(
			'route' => '/update_orders',
			'controller' => 'OrdersController',
			'action' => 'updateOrders'
		);
		$routes['remove_orders'] = array(
			'route' => '/remove_orders',
			'controller' => 'OrdersController',
			'action' => 'removeOrders'
		);
		$routes['delete_orders'] = array(
			'route' => '/delete_orders',
			'controller' => 'OrdersController',
			'action' => 'deleteOrders'
		);
		$routes['residents'] = array(
			'route' => '/residents',
			'controller' => 'ResidentsController',
			'action' => 'residents'
		);
		$routes['export_residents'] = array(
			'route' => '/export_residents',
			'controller' => 'ResidentsController',
			'action' => 'exportResidents'
		);
		$routes['register_residents'] = array(
			'route' => '/register_residents',
			'controller' => 'ResidentsController',
			'action' => 'registerResidents'
		);
		$routes['edit_residents'] = array(
			'route' => '/edit_residents',
			'controller' => 'ResidentsController',
			'action' => 'editResidents'
		);
		$routes['update_residents'] = array(
			'route' => '/update_residents',
			'controller' => 'ResidentsController',
			'action' => 'updateResidents'
		);
		$routes['remove_residents'] = array(
			'route' => '/remove_residents',
			'controller' => 'ResidentsController',
			'action' => 'removeResidents'
		);
		$routes['delete_residents'] = array(
			'route' => '/delete_residents',
			'controller' => 'ResidentsController',
			'action' => 'deleteResidents'
		);

		$routes['visitors'] = array(
			'route' => '/visitors',
			'controller' => 'VisitorsController',
			'action' => 'visitors'
		);

		$routes['export_visitors'] = array(
			'route' => '/export_visitors',
			'controller' => 'VisitorsController',
			'action' => 'exportVisitors'
		);

		$routes['register_visitor'] = array(
			'route' => '/register_visitor',
			'controller' => 'VisitorsController',
			'action' => 'registerVisitor'
		);
		$routes['register_entry_visitor'] = array(
			'route' => '/register_entry_visitor',
			'controller' => 'VisitorsController',
			'action' => 'registerEntry'
		);
		$routes['register_exit_visitor'] = array(
			'route' => '/register_exit_visitor',
			'controller' => 'VisitorsController',
			'action' => 'registerExit'
		);
		$routes['edit_visitor'] = array(
			'route' => '/edit_visitor',
			'controller' => 'VisitorsController',
			'action' => 'editVisitor'
		);
		$routes['update_visitor'] = array(
			'route' => '/update_visitor',
			'controller' => 'VisitorsController',
			'action' => 'updateVisitor'
		);
		$routes['edit_visitor_entry'] = array(
			'route' => '/edit_visitor_entry',
			'controller' => 'VisitorsController',
			'action' => 'editVisitorEntry'
		);
		$routes['update_visitor_entry'] = array(
			'route' => '/update_visitor_entry',
			'controller' => 'VisitorsController',
			'action' => 'updateVisitorEntry'
		);
		$routes['remove_visitor'] = array(
			'route' => '/remove_visitor',
			'controller' => 'VisitorsController',
			'action' => 'removeVisitor'
		);
		$routes['delete_visitor'] = array(
			'route' => '/delete_visitor',
			'controller' => 'VisitorsController',
			'action' => 'deleteVisitor'
		);
		$routes['remove_visitor'] = array(
			'route' => '/remove_visitor',
			'controller' => 'VisitorsController',
			'action' => 'removeVisitor'
		);
		$routes['delete_visitor'] = array(
			'route' => '/delete_visitor',
			'controller' => 'VisitorsController',
			'action' => 'deleteVisitor'
		);
		$routes['remove_visitor_entry'] = array(
			'route' => '/remove_visitor_entry',
			'controller' => 'VisitorsController',
			'action' => 'removeVisitorEntry'
		);
		$routes['delete_visitor_entry'] = array(
			'route' => '/delete_visitor_entry',
			'controller' => 'VisitorsController',
			'action' => 'deleteVisitorEntry'
		);





		$routes['service_providers'] = array(
			'route' => '/service_providers',
			'controller' => 'ServiceProvidersController',
			'action' => 'serviceProviders'
		);
		$routes['export_service_providers'] = array(
			'route' => '/export_service_providers',
			'controller' => 'ServiceProvidersController',
			'action' => 'exportServiceProviders'
		);
		$routes['register_service_providers'] = array(
			'route' => '/register_service_providers',
			'controller' => 'ServiceProvidersController',
			'action' => 'registerServiceProviders'
		);
		$routes['register_exit_service_providers'] = array(
			'route' => '/register_exit_service_providers',
			'controller' => 'ServiceProvidersController',
			'action' => 'registerExit'
		);
		$routes['edit_service_providers'] = array(
			'route' => '/edit_service_providers',
			'controller' => 'ServiceProvidersController',
			'action' => 'editServiceProviders'
		);
		$routes['update_service_providers'] = array(
			'route' => '/update_service_providers',
			'controller' => 'ServiceProvidersController',
			'action' => 'updateServiceProviders'
		);
		$routes['remove_service_providers'] = array(
			'route' => '/remove_service_providers',
			'controller' => 'ServiceProvidersController',
			'action' => 'removeServiceProviders'
		);
		$routes['delete_service_providers'] = array(
			'route' => '/delete_service_providers',
			'controller' => 'ServiceProvidersController',
			'action' => 'deleteServiceProviders'
		);
		$routes['leisure_areas'] = array(
			'route' => '/leisure_areas',
			'controller' => 'LeisureAreasController',
			'action' => 'leisureAreas'
		);
		$routes['register_event'] = array(
			'route' => '/register_event',
			'controller' => 'LeisureAreasController',
			'action' => 'registerEvent'
		);
		$routes['view_event'] = array(
			'route' => '/view_event',
			'controller' => 'LeisureAreasController',
			'action' => 'Events'
		);
		$routes['update_event'] = array(
			'route' => '/update_event',
			'controller' => 'LeisureAreasController',
			'action' => 'updateEvents'
		);
		$routes['delete_event'] = array(
			'route' => '/delete_event',
			'controller' => 'LeisureAreasController',
			'action' => 'deleteEvents'
		);
	

		
		

		$this->setRoutes($routes);
	}

}

?>