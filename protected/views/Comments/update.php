<?php
/* @var $this TblCommentsController */
/* @var $model TblComments */

$this->breadcrumbs=array(
	'Tbl Comments'=>array('index'),
	$model->comment_id=>array('view','id'=>$model->comment_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblComments', 'url'=>array('index')),
	array('label'=>'Create TblComments', 'url'=>array('create')),
	array('label'=>'View TblComments', 'url'=>array('view', 'id'=>$model->comment_id)),
	array('label'=>'Manage TblComments', 'url'=>array('admin')),
);
?>

<h1>Update TblComments <?php echo $model->comment_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>