<?php
class NewsController extends BackEndController
{
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        $model=new News;

        $this->performAjaxValidation($model);

        if(isset($_POST['News']))
        {
            $model->attributes = $_POST['News'];

            if($this->getFConfig('db_driver') == 'dblib')
            {
                $table = 'FAI_'.Yii::app()->request->cookies['language']->value.'_NEWS';
                $query="INSERT INTO $table (title,meta_desc,meta_key,img,url,s_desc,f_desc,date,author,active)
                  VALUES(N?,N?,N?,N?,N?,N?,N?,N?,N?,N?)";
                $command=Yii::app()->db->createCommand($query);
                $command->bindParam(1,$_POST['News']['title'], PDO::PARAM_STR);
                $command->bindParam(2,$_POST['News']['meta_desc'],PDO::PARAM_STR);
                $command->bindParam(3,$_POST['News']['meta_key'],PDO::PARAM_STR);
                $command->bindParam(4,$_POST['News']['img'],PDO::PARAM_STR);
                $command->bindParam(5,News::getTranslit($_POST['News']['url']),PDO::PARAM_STR);
                $command->bindParam(6,$_POST['News']['s_desc'],PDO::PARAM_STR);
                $command->bindParam(7,$_POST['News']['f_desc'],PDO::PARAM_STR);
                $command->bindParam(8,time(),PDO::PARAM_STR);
                $command->bindParam(9,Yii::app()->user->name,PDO::PARAM_STR);
                $command->bindParam(10,$_POST['News']['active'],PDO::PARAM_STR);

                if($model->validate())
                {
                    $command->execute();
                    Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'news')." <b>".$_POST['News']['title']."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully created')."");
                    $this->redirect(array('index'));
                }
            }
            else
            {
                $model->url = News::getTranslit($_POST['News']['url']);
                $model->author = Yii::app()->user->name;
                $model->date = time();

                if($model->save())
                {
                    Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'news')." <b>".$_POST['News']['title']."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully created')."");
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $this->performAjaxValidation($model);

        if(isset($_POST['News']))
        {
            $model->attributes=$_POST['News'];

            if($this->getFConfig('db_driver') == 'dblib')
            {
                $table = 'FAI_'.Yii::app()->request->cookies['language']->value.'_NEWS';
                $query="UPDATE $table SET title=(N?),meta_desc=(N?),meta_key=(N?),img=(N?),
                  url=(N?),s_desc=(N?),f_desc=(N?),date=?,author=(N?),active=? WHERE id=?";
                $command=Yii::app()->db->createCommand($query);
                $command->bindParam(1,$_POST['News']['title'], PDO::PARAM_STR);
                $command->bindParam(2,$_POST['News']['meta_desc'],PDO::PARAM_STR);
                $command->bindParam(3,$_POST['News']['meta_key'],PDO::PARAM_STR);
                $command->bindParam(4,$_POST['News']['img'],PDO::PARAM_STR);
                $command->bindParam(5,News::getTranslit($_POST['News']['url']),PDO::PARAM_STR);
                $command->bindParam(6,$_POST['News']['s_desc'],PDO::PARAM_STR);
                $command->bindParam(7,$_POST['News']['f_desc'],PDO::PARAM_STR);
                $command->bindParam(8,time(),PDO::PARAM_STR);
                $command->bindParam(9,Yii::app()->user->name,PDO::PARAM_STR);
                $command->bindParam(10,$_POST['News']['active'],PDO::PARAM_STR);
                $command->bindParam(11,$model->id,PDO::PARAM_STR);

                if($model->validate() && $command->execute())
                {
                    Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'news')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully updated')."");
                    $this->redirect(array('index'));
                }
            }
            else
            {
                $model->url = News::getTranslit($_POST['News']['url']);
                $model->author = Yii::app()->user->name;
                $model->date = time();

                if($model->save())
                {
                    Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'news')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully updated')."");
                    $this->redirect(array('index'));
                }
                else
                {
                    Yii::app()->user->setFlash('delete', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'news')."</span> <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not updated').".");
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    public function actionStatus($id)
    {
        $model = $this->loadModel($id);

        if($this->getFConfig('db_driver') == 'dblib')
        {
            $table = 'FAI_'.Yii::app()->request->cookies['language']->value.'_NEWS';
            $query="UPDATE $table SET active=? WHERE id=?";
            $command=Yii::app()->db->createCommand($query);
            $command->bindParam(1,$_POST['active'], PDO::PARAM_STR);
            $command->bindParam(2,$model->id,PDO::PARAM_STR);

            if($command->execute())
            {
                Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Page')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully updated')."");
                $this->redirect(array('index'));
            }
            else
            {
                Yii::app()->user->setFlash('delete', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'category')."</span> <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not updated').".");
                $this->redirect(array('index'));
            }
        }
        else
        {
            $model->active = $_POST['active'];

            if($model->save())
            {
                Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Page')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully updated')."");
                $this->redirect(array('index'));
            }
            else
            {
                Yii::app()->user->setFlash('delete', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'category')."</span> <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not updated').".");
                $this->redirect(array('index'));
            }
        }
    }

    public function actionDelete($id)
    {
        $model = $this->loadModel($id);
        $this->loadModel($id)->delete();

        if(!isset($_GET['ajax']))
        {
            Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'news')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully deleted')."");
            $this->redirect(array('index'));
        }
        else
        {
            Yii::app()->user->setFlash('delete', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'news')."</span> <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not removed').".");
            $this->redirect(array('index'));
        }
    }

    public function actionIndex()
    {
        $model = new News;

        $model->unsetAttributes();

        if(isset($_GET['News']))
        {
            $model->attributes=$_GET['News'];
        }

        $this->render('index',array('model'=>$model));
    }

    public function loadModel($id)
    {
        $model=News::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
