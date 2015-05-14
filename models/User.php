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
 * @property string   $confirmHash
 *
 * @property Store[]  $stores
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
            [['isConfirmed', 'confirmHash'], 'safe'],
            [['username', 'password', 'email', 'authKey'], 'required'],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'unique'],
            ['email', 'email'],
            [['isConfirmed', 'confirmHash'], 'default', 'skipOnEmpty' => false, 'value' => null]
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
    public function beforeValidate()
    {
        if ($this->getIsNewRecord()) {
            $this->timeCreate = time();
        }

        return parent::beforeValidate();
    }

    /**
     * @param bool $insert
     *
     * @return bool|void
     */
    public function beforeSave($insert)
    {
        if ($this->isAttributeChanged('isConfirmed') && $this->isConfirmed) {
            $this->confirmHash = null;
        }

        return parent::beforeSave($insert);
    }

    /**
     * @return bool
     */
    public function beforeDelete()
    {
        \Yii::$app->getAuthManager()->revokeAll($this->id);

        if ($this->stores) {
            foreach ($this->stores as $mStore) {
                $mStore->delete();
            }
        }

        return parent::beforeDelete();
    }

    ### relations

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasMany(Store::className(), ['userID' => 'id']);
    }

    ### functions

    /**
     * @param bool $bAbsolute
     *
     * @return string
     */
    public function getConfirmUrl($bAbsolute = false)
    {
        return Url::to(['/auth/register-confirm', 'hash' => $this->confirmHash], $bAbsolute);
    }
}