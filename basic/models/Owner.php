<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Owner".
 *
 * @property string $username
 * @property string $name
 * @property string $lastname
 * @property string $address
 * @property integer $idLocation
 * @property string $email
 * @property string $birth_date
 * @property string $gender
 *
 * @property Location $idLocation0
 * @property User $username0
 * @property Pet[] $pets
 */
class Owner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Owner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['idLocation'], 'integer'],
            [['birth_date'], 'safe'],
            [['username', 'email', 'gender'], 'string', 'max' => 45],
            [['name', 'lastname'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'address' => 'Address',
            'idLocation' => 'Id Location',
            'email' => 'Email',
            'birth_date' => 'Birth Date',
            'gender' => 'Gender',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocation0()
    {
        return $this->hasOne(Location::className(), ['idLocation' => 'idLocation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsername0()
    {
        return $this->hasOne(User::className(), ['username' => 'username']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPets()
    {
        return $this->hasMany(Pet::className(), ['owner_username' => 'username']);
    }
}
