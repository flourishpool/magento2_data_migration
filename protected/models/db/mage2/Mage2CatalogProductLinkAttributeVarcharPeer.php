<?php

/**
 * This is the model class for table "catalog_product_link_attribute_varchar".
 *
 * The followings are the available columns in table 'catalog_product_link_attribute_varchar':
 * @property string $value_id
 * @property integer $product_link_attribute_id
 * @property string $link_id
 * @property string $value
 *
 * The followings are the available model relations:
 * @property CatalogProductLink $link
 * @property CatalogProductLinkAttribute $productLinkAttribute
 */
class Mage2CatalogProductLinkAttributeVarcharPeer extends Mage2ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{catalog_product_link_attribute_varchar}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('link_id', 'required'),
			array('product_link_attribute_id', 'numerical', 'integerOnly'=>true),
			array('link_id', 'length', 'max'=>10),
			array('value', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('value_id, product_link_attribute_id, link_id, value', 'safe', 'on'=>'search'),
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
			'link' => array(self::BELONGS_TO, 'CatalogProductLink', 'link_id'),
			'productLinkAttribute' => array(self::BELONGS_TO, 'CatalogProductLinkAttribute', 'product_link_attribute_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'value_id' => 'Value',
			'product_link_attribute_id' => 'Product Link Attribute',
			'link_id' => 'Link',
			'value' => 'Value',
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

		$criteria->compare('value_id',$this->value_id,true);
		$criteria->compare('product_link_attribute_id',$this->product_link_attribute_id);
		$criteria->compare('link_id',$this->link_id,true);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->mage2;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mage2CatalogProductLinkAttributeVarcharPeer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
