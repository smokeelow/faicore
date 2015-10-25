<?php
class AboutController extends BackEndController
{
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        $model=new FAI_ABOUT;

        $this->performAjaxValidation($model);

        if(isset($_POST['FAI_ABOUT']))
        {
            $table = 'FAI_'.Yii::app()->request->cookies['language']->value.'_ABOUT';

            if($_POST['FAI_ABOUT']['onmpage'] == 1)
            {
                $sql="UPDATE $table SET onmpage='0' WHERE onmpage='1'";
                $cmd = Yii::app()->db->createCommand($sql);
                $cmd->execute();
            }

            $model->attributes=$_POST['FAI_ABOUT'];

            if($this->getFConfig('db_driver') == 'dblib')
            {
                $query="INSERT INTO $table (title,description,meta_key,meta_desc,date,status,onmpage)
                  VALUES(N?,N?,N?,N?,?,?,?)";
                $command=Yii::app()->db->createCommand($query);
                $command->bindParam(1,$_POST['FAI_ABOUT']['title'], PDO::PARAM_STR);
                $command->bindParam(2,$_POST['FAI_ABOUT']['description'],PDO::PARAM_STR);
                $command->bindParam(3,$_POST['FAI_ABOUT']['meta_desc'],PDO::PARAM_STR);
                $command->bindParam(4,$_POST['FAI_ABOUT']['meta_key'],PDO::PARAM_STR);
                $command->bindParam(5,time(),PDO::PARAM_STR);
                $command->bindParam(6,$_POST['FAI_ABOUT']['status'],PDO::PARAM_STR);
                $command->bindParam(7,$_POST['FAI_ABOUT']['onmpage'],PDO::PARAM_STR);

                if($model->validate())
                {
                    $command->execute();
                    Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Record')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully created')."");
                    $this->redirect(array('index'));
                }
            }
            else
            {
                if($_POST['FAI_ABOUT']['onmpage'] == 1)
                {
                    $table = "FAI_".Yii::app()->request->cookies['language']->value."_ABOUT";
                    $query="UPDATE $table SET onmpage='0' WHERE onmpage='1'";
                    $command = Yii::app()->db->createCommand($query);
                    $command->execute();
                }

                $model->date = time();

                if($model->save())
                {
                    Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Record')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully created')."");
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

        if(isset($_POST['FAI_ABOUT']))
        {
            $table = "FAI_".Yii::app()->request->cookies['language']->value."_ABOUT";

            if($_POST['FAI_ABOUT']['onmpage'] == 1)
            {
                $query="UPDATE $table SET onmpage='0' WHERE onmpage=1";
                $command = Yii::app()->db->createCommand($query);
                $command->execute();
            }

            $model->attributes=$_POST['FAI_ABOUT'];

            if($this->getFConfig('db_driver') == 'dblib')
            {
                $query="UPDATE $table SET title=(N?),description=(N?),meta_desc=(N?),meta_key=(N?),
                  date=?,status=?,onmpage=? WHERE id=?";
                $command=Yii::app()->db->createCommand($query);
                $command->bindParam(1,$_POST['FAI_ABOUT']['title'], PDO::PARAM_STR);
                $command->bindParam(2,$_POST['FAI_ABOUT']['description'],PDO::PARAM_STR);
                $command->bindParam(3,$_POST['FAI_ABOUT']['meta_desc'],PDO::PARAM_STR);
                $command->bindParam(4,$_POST['FAI_ABOUT']['meta_key'],PDO::PARAM_STR);
                $command->bindParam(5,time(),PDO::PARAM_STR);
                $command->bindParam(6,$_POST['FAI_ABOUT']['status'],PDO::PARAM_STR);
                $command->bindParam(7,$_POST['FAI_ABOUT']['onmpage'],PDO::PARAM_STR);
                $command->bindParam(8,$model->id,PDO::PARAM_STR);

                if($model->validate())
                {
                    $command->execute();
                    Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Page')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully updated')."");
                    $this->redirect(array('index'));
                }
            }
            else
            {
                if($model->save())
                {
                    Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Page')." ".$model->title." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully updated')."");
                    $this->redirect(array('index'));
                }
                else
                {
                    Yii::app()->user->setFlash('delete', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'FAI_ABOUT')."</span> #".$id." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not updated').".");
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        if(!isset($_GET['ajax']))
        {
            Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Record')." #".$id." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully deleted')."");
            $this->redirect(array('index'));
        }
        else
        {
            Yii::app()->user->setFlash('delete', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'FAI_ABOUT')."</span> #".$id." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not removed').".");
            $this->redirect(array('index'));
        }
    }

    public function actionMpage($id)
    {
        $model = $this->loadModel($id);
        $table = "FAI_".Yii::app()->request->cookies['language']->value."_ABOUT";

        if($_POST['main'] == 1)
        {
            $query="UPDATE $table SET onmpage='0' WHERE onmpage='1'";
            $command = Yii::app()->db->createCommand($query);
            $command->execute();
        }

        if($this->getFConfig('db_driver') == 'dblib')
        {
            $query="UPDATE $table SET onmpage=? WHERE id=?";
            $command=Yii::app()->db->createCommand($query);
            $command->bindParam(1,$_POST['main'], PDO::PARAM_STR);
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
            $model->onmpage = $_POST['main'];

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

    public function actionStatus($id)
    {
        $model = $this->loadModel($id);
        $table = "FAI_".Yii::app()->request->cookies['language']->value."_ABOUT";

        if($this->getFConfig('db_driver') == 'dblib')
        {
            $query="UPDATE $table SET status=? WHERE id=?";
            $command=Yii::app()->db->createCommand($query);
            $command->bindParam(1,$_POST['status'], PDO::PARAM_STR);
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
            $model->status = $_POST['status'];

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

    public function actionIndex()
    {
        $model = new FAI_ABOUT;

        $model->unsetAttributes();

        if(isset($_GET['FAI_ABOUT']))
        {
            $model->attributes=$_GET['FAI_ABOUT'];
        }

        $this->render('index',array('model'=>$model));
    }

    public function loadModel($id)
    {
        $model=FAI_ABOUT::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='about-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
