<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $realname
 * @property string $username
 * @property string $password
 * @property string $security_code
 * @property string $email
 * @property string $birthdate
 * @property integer $security_question
 * @property string $security_question_custom
 * @property string $security_answer
 * @property string $ecurrency
 * @property string $ecurrency_purse
 * @property string $language
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Visits $visits
 */
class User extends CActiveRecord
{
	/**
	 * @static
	 * @param string $className
	 * @return User|CActiveRecord
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('realname, username, password, security_code, email, birthdate, security_question, security_answer, ecurrency_purse', 'required'),
			array('security_question', 'numerical', 'integerOnly'=>true),
			array('realname, security_question_custom, security_answer', 'length', 'max'=>255),
			array('username, security_code', 'length', 'max'=>20),
			array('password', 'length', 'max'=>32),
			array('email', 'length', 'max'=>100),
			array('ecurrency, language', 'length', 'max'=>2),
			array('ecurrency_purse', 'length', 'max'=>15),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, realname, username, password, security_code, email, birthdate, security_question, security_question_custom, security_answer, ecurrency, ecurrency_purse, language, status', 'safe', 'on'=>'search'),
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
			'visits' => array(self::BELONGS_TO, 'Visit', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'realname' => 'Realname',
			'username' => 'Username',
			'password' => 'Password',
			'security_code' => 'Security Code',
			'email' => 'Email',
			'birthdate' => 'Birthdate',
			'security_question' => 'Security Question',
			'security_question_custom' => 'Security Question Custom',
			'security_answer' => 'Security Answer',
			'ecurrency' => 'Ecurrency',
			'ecurrency_purse' => 'Ecurrency Purse',
			'language' => 'Language',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('realname',$this->realname,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('security_code',$this->security_code,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('security_question',$this->security_question);
		$criteria->compare('security_question_custom',$this->security_question_custom,true);
		$criteria->compare('security_answer',$this->security_answer,true);
		$criteria->compare('ecurrency',$this->ecurrency,true);
		$criteria->compare('ecurrency_purse',$this->ecurrency_purse,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}