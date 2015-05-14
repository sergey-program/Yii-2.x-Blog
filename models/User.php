<?php

namespace app\models;

use app\models\_extend\AbstractActiveRecord;
use yii\helpers\Url;

/**
 * Class User
 *
 * @package app\models
 *
 * @property int      $id
 * @property string   $username
 * @property string   $password
 * @property string   $email
 * @property int      $timeCreate
 * @property string   $authKey
 * @property int|bool $isConfirmed
 */
class User extends AbstractActiveRecord
{
    const STATUS_ACTIVE = 'active';
    const STATUS_DISABLED = 'disabled';

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['isConfirmed'], 'safe'],
            [['username', 'password', 'email', 'authKey'], 'required'],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'unique'],
            ['email', 'email'],
            [['isConfirmed'], 'default', 'skipOnEmpty' => false, 'value' => null]
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => \Yii::t('', 'Username'),
            'email' => \Yii::t('', 'Email'),
            'timeCreate' => \Yii::t('', 'Time create'),
            'isConfirmed' => \Yii::t('', 'Is confirmed')
        ];
    }

    /**
     * @return bool
     */
    public function beforeDelete()
    {
        \Yii::$app->getAuthManager()->revokeAll($this->id);

        return parent::beforeDelete();
    }

    ### relations

    ### functions
}