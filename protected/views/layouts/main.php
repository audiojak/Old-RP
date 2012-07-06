<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<!-- include shortcut javascript -->
	<script type="text/javascript" src="/js/shortcut.js"></script>
	<script type="text/javascript" src="/js/custom-shortcuts.js"></script>

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?> <?php echo (isset(Yii::app()->session['compName'])) ? ' - '.Yii::app()->session['compName'] : ((Yii::app()->user->isGuest) ? '' : ' - Please choose a competition'); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Competitors', 'url'=>array('/competitors/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Events', 'url'=>array('/events/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Judges', 'url'=>array('/judges/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Competitions', 'url'=>array('/competitions/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'),'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Contact', 'url'=>array('/site/contact'),'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/user/auth'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Evelops.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>