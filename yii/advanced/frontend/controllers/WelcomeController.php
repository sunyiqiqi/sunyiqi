<?php
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
use frontend\models\Liuyan;
use yii\data\Pagination;


class WelcomeController extends Controller
{
public $enableCsrfValidation = false;
/*public function actionIndex(){
	header("content-type:text/html;charset=utf8");
	$model=Liuyan::find()->where(["u_id"=>1])->asarray()->all();
	//print_r($arr);die;
	return $this->render('index', [
            'model' => $model,
        ]);
}*/
public function actionIndex(){
header("content-type:text/html;charset=utf8");
	  $query = Liuyan::find()->where(['u_id' => 1]);
    $countQuery = clone $query;
    $pages = new Pagination(['totalCount' => $countQuery->count(),'pagesize'=>'2']);
    $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();

    return $this->render('index', [
         'models' => $models,
         'pages' => $pages,
    ]);
}
public function actionDel(){
	$l_id=Yii::$app->request->get('l_id');
	$connection  = \Yii::$app->db;
	$re=$connection->createCommand()->delete('liuyan', 'l_id ='.$l_id)->execute();

	if($re){
	$this->redirect(['welcome/index']);
	}
}
public function actionAdds(){
	
	$u_id=Yii::$app->request->get('u_id');
	$liuyan=Yii::$app->request->get('liuyan');
	$connection  = \Yii::$app->db;
	$re=$connection->createCommand()->insert('liuyan', [
    'u_id' => $u_id,
    'l_contents' => "$liuyan",
])->execute();
	if($re){
		$this->redirect(['welcome/index']);
	}
}
/*public function actionUpda(){
$l_id=Yii::$app->request->get('l_id');

}*/
}
?>