<?php


namespace app\models;
//use yii\base\Model;

//class TestForm extends Model
use yii\db\ActiveRecord;

class TestForm extends ActiveRecord
{
//    public $name;
//    public $email;
//    public $password;
//    public $text;
    public static function tableName()
    {
        return 'posts';
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'password' => 'Пароль',
            'text' => 'Текст',

        ]; // TODO: Change the autogenerated stub
    }

    public function rules()
    {
        return [
            [ ['name', 'email'], 'required'],
            [ 'email', 'email'],
            [ 'email', 'safe'],
            [ 'name', 'string', 'min'=>2, 'tooShort'=>"Мало"],
            [ 'name', 'string', 'max'=>10, 'tooLong'=>"много"],
            [ 'text', 'trim'],
        ];
    }
}
?>
<style>

    .help-block {
        color: red;
    }
</style>