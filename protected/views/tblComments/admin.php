<?php
/* @var $this TblCommentsController */
/* @var $model TblComments */

$this->breadcrumbs=array(
	'Tbl Comments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblComments', 'url'=>array('index')),
	array('label'=>'Create TblComments', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-comments-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Comments</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-comments-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'comment_id',
		'parent_comment_id',
		'user_name',
		'comment_text',
		'create_time',
		'update_time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
