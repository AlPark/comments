<?php
/* @var $this TblCommentsController */
/* @var $model TblComments */

$this->breadcrumbs=array(
	'Tbl Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblComments', 'url'=>array('index')),
	array('label'=>'Manage TblComments', 'url'=>array('admin')),
);
?>

<h1>Create TblComments</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>