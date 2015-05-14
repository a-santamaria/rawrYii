<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Pet".
 *
 * @property string $username
 * @property string $owner_username
 * @property string $name
 * @property string $type
 * @property string $race
 * @property string $birth_date
 * @property string $gender
 *
 * @property Followers[] $followers
 * @property Business[] $usernameBusinesses
 * @property Friends[] $friends
 * @property Friends[] $friends0
 * @property Owner $ownerUsername
 * @property User $username0
 * @property Request[] $requests
 * @property Request[] $requests0
 */
class Pet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Pet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'owner_username'], 'required'],
            [['birth_date'], 'safe'],
            [['username', 'owner_username', 'name', 'type', 'race', 'gender'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'owner_username' => 'Owner Username',
            'name' => 'Name',
            'type' => 'Type',
            'race' => 'Race',
            'birth_date' => 'Birth Date',
            'gender' => 'Gender',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFollowers()
    {
        return $this->hasMany(Followers::className(), ['username_follower' => 'username']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsernameBusinesses()
    {
        return $this->hasMany(Business::className(), ['username' => 'username_business'])->viaTable('Followers', ['username_follower' => 'username']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriends()
    {
        return $this->hasMany(Friends::className(), ['username' => 'username']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriends0()
    {
        return $this->hasMany(Friends::className(), ['username_friend' => 'username']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwnerUsername()
    {
        return $this->hasOne(Owner::className(), ['username' => 'owner_username']);
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
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['username_sender' => 'username']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests0()
    {
        return $this->hasMany(Request::className(), ['username_receiver' => 'username']);
    }
}
