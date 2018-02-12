<?php

class CommentsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','create'),
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TblComments;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblComments']))
		{
			$model->attributes=$_POST['TblComments'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->comment_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $criteria=new CDbCriteria(array(
            'order'=>'create_time desc',
            'condition'=>'parent_comment_id=0',
        ));

		$dataProvider=new CActiveDataProvider('TblComments', [
            'criteria'=>$criteria,
        ]);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TblComments the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TblComments::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TblComments $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-comments-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /**
     * ajax comment load
     */
    public function actionAjaxShow()
    {
        $parent_id = Yii::app()->request->getPost('parent_id');

        $data = TblComments::model()->findAll('parent_comment_id=:parent_comment_id', array(':parent_comment_id'=>$parent_id));

        if(count($data) > 0) {
            $this->renderPartial('indexAjax', ['data' => $data], false, true);
        }
        else echo "-1";
    }


    /**
     * add comment via ajax
     */
    public function actionAjaxComment()
    {
        $data['parent_comment_id'] = Yii::app()->request->getPost('parent_id');
        $data['comment_text'] = Yii::app()->request->getPost('message');

        $model = new TblComments();
        $model->setAttributes($data);
        if($model->save()){
            $this->renderPartial('indexAjax', ['data' => [$model]], false, true);
        }
        else {
            echo "-1";
        }
    }
}
