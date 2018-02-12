<?php
/* @var $this TblCommentsController */
/* @var $model TblComments */

$this->breadcrumbs=array(
	'Tbl Comments'=>array('index'),
	$model->comment_id,
);

$this->menu=array(
	array('label'=>'List TblComments', 'url'=>array('index')),
	array('label'=>'Create TblComments', 'url'=>array('create')),
	array('label'=>'Update TblComments', 'url'=>array('update', 'id'=>$model->comment_id)),
	array('label'=>'Delete TblComments', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->comment_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblComments', 'url'=>array('admin')),
);
?>

<h1>View TblComments #<?php echo $model->comment_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'comment_id',
		'parent_comment_id',
		'user_name',
		'comment_text',
		'create_time',
		'update_time',
	),
)); ?>
