<?php
class FilesController extends BackEndController
{
    public function actionIndex()
    {
        $this->pageTitle=Yii::app()->getFConfig('serverName').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Files'). ' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'List of links');

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Files');

        $model = new CActiveDataProvider('Files');

        $this->render('index',array('model'=>$model));
    }

    public function actionCreate()
    {
        $model=new Files;

        $this->performAjaxValidation($model);

        if(isset($_POST['Files']))
        {
            $model->attributes=$_POST['Files'];

            if($this->getFConfig('db_driver') == 'dblib')
            {
                $table = 'FAI_FILES';
                $query="INSERT INTO $table (title,link,description) VALUES(N?,N?,N?)";
                $command=Yii::app()->db->createCommand($query);
                $command->bindParam(1,$_POST['Files']['title'], PDO::PARAM_STR);
                $command->bindParam(2,$_POST['Files']['link'],PDO::PARAM_STR);
                $command->bindParam(3,$_POST['Files']['description'],PDO::PARAM_STR);

                if($model->validate())
                {
                    $command->execute();
                    Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Link')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully created')."");
                    $this->redirect(array('index'));
                }
            }
            else
            {
                if($model->save())
                {
                    Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Link')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully created')."");
                    $this->redirect(array('index'));
                }
            }
        }

        $this->pageTitle=Yii::app()->getFConfig('serverName').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Files'). ' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add link');

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Files').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Add link');

        $this->render('edit',array('model'=>$model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model);

        if(isset($_POST['Files']))
        {
            $model->attributes=$_POST['Files'];

            if($this->getFConfig('db_driver') == 'dblib')
            {
                $table = 'FAI_FILES';
                $query="UPDATE $table SET title=(N?),link=(N?),description=(N?) WHERE id=?";
                $command=Yii::app()->db->createCommand($query);
                $command->bindParam(1,$_POST['Files']['title'], PDO::PARAM_STR);
                $command->bindParam(2,$_POST['Files']['link'],PDO::PARAM_STR);
                $command->bindParam(3,$_POST['Files']['description'],PDO::PARAM_STR);
                $command->bindParam(4,$model->id,PDO::PARAM_STR);

                if($model->validate())
                {
                    $command->execute();
                    Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Link')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully updated')."");
                    $this->redirect(array('index'));
                }
            }
            else
            {
                if($model->save())
                {
                    Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Link')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully updated')."");
                    $this->redirect(array('index'));
                }
                else
                {
                    Yii::app()->user->setFlash('delete', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Files')."</span> #".$id." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not updated').".");
                    $this->redirect(array('index'));
                }
            }
        }

        $this->pageTitle=Yii::app()->getFConfig('serverName').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Files'). ' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Editing');

        $this->pageH1 = Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Files').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Editing').' / '.
            $model->title;

        $this->render('edit',array(
            'model'=>$model,
        ));
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        if(!isset($_GET['ajax']))
        {
            Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Link')." #".$id." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully deleted')."");
            $this->redirect(array('index'));
        }
        else
        {
            Yii::app()->user->setFlash('delete', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Files')."</span> #".$id." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not removed').".");
            $this->redirect(array('index'));
        }
    }

    public function loadModel($id)
    {
        $model=Files::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='files-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}