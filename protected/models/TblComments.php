<?php

/**
 * This is the model class for table "tbl_comments".
 *
 * The followings are the available columns in table 'tbl_comments':
 * @property integer $comment_id
 * @property integer $parent_comment_id
 * @property string $user_name
 * @property string $comment_text
 * @property integer $create_time
 * @property integer $update_time
 */
class TblComments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_comment_id', 'numerical', 'integerOnly'=>true),
			array('user_name', 'length', 'max'=>128),
			array('comment_text', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('comment_id, parent_comment_id, user_name, comment_text, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'comment_id' => '#',
			'parent_comment_id' => 'Parent Comment',
			'user_name' => 'user',
			'comment_text' => 'said',
			'create_time' => 'time',
			'update_time' => 'Update Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('comment_id',$this->comment_id);
		$criteria->compare('parent_comment_id',$this->parent_comment_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('comment_text',$this->comment_text,true);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblComments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    /**
     * @return mixed add some data
     */
    protected function beforeSave()
    {
        $this->user_name = "AD";
        $this->create_time = date('Y-m-d H:i:s');
        return parent::beforeSave();
    }
}
