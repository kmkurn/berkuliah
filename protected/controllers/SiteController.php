<?php

/**
 * A class representing the /site/ pages in the application.
 */
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// page action renders "static" pages stored under 'protected/views/site/pages'
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'checkDebugMode + dummyLogin, dummyAdminLogin', // check debug mode
		);
	}


	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->render('index', array('model'=>Testimonial::getCurrentTestimonial()));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		Yii::import('application.vendors.CAS.*');

		include_once('CAS/Autoload.php');
		spl_autoload_unregister(array('YiiBase', 'autoload'));
		spl_autoload_register(array('YiiBase', 'autoload'));
		include_once('CAS.php');

		phpCAS::setDebug();
		phpCAS::client(CAS_VERSION_2_0, 'sso.ui.ac.id', 443, 'cas');
		phpCAS::setNoCasServerValidation();
		phpCAS::forceAuthentication();
		phpCAS::checkAuthentication();
		
		$username = phpCAS::getUser();
		$identity = new UserIdentity($username);

		if ($identity->authenticate())
			Yii::app()->user->login($identity);

		$this->redirect(array('home/index'));
	}

	/**
	 * Logs in as a dummy user.
	 */
	public function actionDummyLogin()
	{
		$identity = new DummyUserIdentity(0);

		if ($identity->authenticate())
			Yii::app()->user->login($identity);

		$this->redirect(array('home/index'));
	}

	/**
	 * Logs in as a dummy admin
	 */
	public function actionDummyAdminLogin()
	{
		$identity = new DummyUserIdentity(1);

		if ($identity->authenticate())
			Yii::app()->user->login($identity);

		$this->redirect(array('home/index'));
	}


	/**
	 * Logs out the current user and redirects to homepage.
	 */
	public function actionLogout()
	{
		Yii::import('application.vendors.CAS.*');
		
		include_once('CAS/Autoload.php');
		spl_autoload_unregister(array('YiiBase', 'autoload'));
		spl_autoload_register(array('YiiBase', 'autoload'));
		include_once('CAS.php');

		phpCAS::setDebug();
		phpCAS::client(CAS_VERSION_2_0, 'sso.ui.ac.id', 443, 'cas');
		phpCAS::setNoCasServerValidation();
		phpCAS::logout();
		
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Logs out dummy user.
	 */
	public function actionDummyLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


	/**
	 * A filter to ensure that an action only available in debug mode.
	 * @param  CFilterChain $filterChain the filter chain
	 */
	public function filterCheckDebugMode($filterChain)
	{
		if (! YII_DEBUG)
			throw new CHttpException(404, 'Fitur ini tidak tersedia.');

		$filterChain->run();
	}
}