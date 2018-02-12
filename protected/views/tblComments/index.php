<?php
/* @var $this TblCommentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Comments',
);

$this->menu=array(
	array('label'=>'Create TblComments', 'url'=>array('create')),
	array('label'=>'Manage TblComments', 'url'=>array('admin')),
);
?>

<h1>Tbl Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
