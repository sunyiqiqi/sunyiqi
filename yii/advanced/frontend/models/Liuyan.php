<?php
namespace frontend\models;

use yii;
class Liuyan extends yii\db\ActiveRecord
{
	public static function tableName(){
		return 'liuyan';
	}
	public function rules(){
	return [
             [['l_id','u_id'], 'integer'],
            [['l_contents'], 'string', 'max' => 100],
        ];
    }
}
?>