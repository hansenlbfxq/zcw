<?php

namespace app\controllers;

use Yii;
use common\models\DataUser;
use common\models\DataUserHistory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use common\services\UserServices;

/**
 * MemberController implements the CRUD actions for DataMember model.
 */
class UsersController extends Controller
{
    /**
     * Lists all DataMember models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query=\Yii::$app->request->get("serach");
        $obj=DataUser::find()->where(['!=','status','9']);

        if(@$query['email']){
            $obj=$obj->andwhere(['email'=>$query['email']]);
        }
        if(@$query['name']){
            $obj=$obj->andwhere("name like '%".$query['name']."%'");
        }
    

        $totalCount = $obj->count();
        $pages = new Pagination(['totalCount' =>$totalCount, 'pageSize' => 20]);
        $data=$obj->orderBy("created desc")->offset($pages->offset)->limit($pages->limit)->all();
        
        return $this->render('index', [
            'data' => $data,'pages'=>$pages,'menu1'=>'pass','menu2'=>'dekaron'
        ]);
    }

   
    /**
     * Updates an existing DataMember model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->request->isPost){
            $postdata=Yii::$app->request->post('postdata');
            $model->setAttributes($postdata,false);
            if($model->save()){
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
                'model' => $model,
            ]);
    }

    /**
     * Deletes an existing DataMember model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status= 9;
        $model->update();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DataMember model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataMember the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}