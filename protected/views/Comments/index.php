<?php
/* @var $this TblCommentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comments Live',
);

?>

<h1>Comments Live</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'sortableAttributes'=>array(
        'create_time',
    ),
)); ?>


<?php Yii::app()->clientScript->registerScriptFile("/js/comment.js"); ?>

