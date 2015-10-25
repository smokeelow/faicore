<?php
class StaffController extends BackEndController
{
    protected $salt = "8xR%9_@03g4@%!_$:%)&sER*W+WQeWk:As*dL.?)-:LRW{p;>?@ZD*k#+%@";

    public function actionIndex()
    {
        $model = new AdminGroup();

        $model->unsetAttributes();

        if(isset($_GET['AdminGroup']))
        {
            $model->attributes=$_GET['AdminGroup'];
        }

        $this->pageTitle=Yii::app()->getFConfig('serverName') .' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Staff').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'User list');

        $this->pageH1 =  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Staff');

        $this->render('index', array(
            'model'=>$model
        ));
    }

    public function actionCreate()
    {
        $model = new AdminGroup;

        $this->performAjaxValidation($model);

        if(isset($_POST['AdminGroup']))
        {
            $model->attributes=$_POST['AdminGroup'];

            if($this->getFConfig('db_driver') == 'dblib')
            {
                $table = 'FAI_ADM_GROUP';
                $query="INSERT INTO $table (name,password,photo,status,access,rname)
                  VALUES (N?,N?,N?,N?,?,N?)";
                $command=Yii::app()->db->createCommand($query);
                $command->bindParam(1,$_POST['AdminGroup']['name'], PDO::PARAM_STR);
                $command->bindParam(2,md5($_POST['AdminGroup']['password'].$this->salt),PDO::PARAM_STR);
                $command->bindParam(3,$_POST['AdminGroup']['photo'],PDO::PARAM_STR);
                $command->bindParam(4,$_POST['AdminGroup']['status'],PDO::PARAM_STR);
                $command->bindParam(5,$_POST['AdminGroup']['access'],PDO::PARAM_STR);
                $command->bindParam(6,$_POST['AdminGroup']['rname'],PDO::PARAM_STR);

                if($model->validate())
                {
                    $command->execute();
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Information')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'of user')." <b>".$model->name."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully updated'));
                    $this->redirect(array('index'));
                }
            }
            else
            {
                $model->password = md5($_POST['AdminGroup']['password'].$this->salt);
                if($model->save())
                {
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Information')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'of user')." <b>".$model->name."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully updated'));
                    $this->redirect(array('index'));
                }
            }
        }

        $this->pageTitle=Yii::app()->getFConfig('serverName') .' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Staff').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'New user').' / '.
            Yii::app()->user->username;

        $this->pageH1 =  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Staff').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'New user');

        $this->render('edit', array(
            'model'=>$model
        ));
    }

    public function actionEdit($alias)
    {
        $model = $this->loadModel($alias);

        $this->performAjaxValidation($model);

        if(isset($_POST['AdminGroup']))
        {
            $model->attributes=$_POST['AdminGroup'];

            if($_POST['AdminGroup']['name'] != Yii::app()->user->username && $model->name == Yii::app()->user->username)
            {
                Yii::app()->user->setState('username',$_POST['AdminGroup']['name']);
            }

            if($_POST['AdminGroup']['access'] == 0 && $model->name == Yii::app()->user->username)
            {
                Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'This action cannot be applied to itself')."");
                $this->refresh();
            }
            elseif($_POST['AdminGroup']['status'] != Yii::app()->user->role && $model->name == Yii::app()->user->username)
            {
                Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'This action cannot be applied to itself')."");
                $this->refresh();
            }

            if($this->getFConfig('db_driver') == 'dblib')
            {
                $table='FAI_ADM_GROUP';
                $query="UPDATE $table SET name=(N?),password=(N?),photo=(N?),status=(N?),
                  access=?,rname=(N?) WHERE name=?";
                $command=Yii::app()->db->createCommand($query);
                $command->bindParam(1,$_POST['AdminGroup']['name'], PDO::PARAM_STR);

                if($_POST['AdminGroup']['newPass'] != '')
                    $command->bindParam(2,md5($_POST['AdminGroup']['newPass'].$this->salt),PDO::PARAM_STR);
                else
                    $command->bindParam(2,$model->password,PDO::PARAM_STR);

                $command->bindParam(3,$_POST['AdminGroup']['photo'],PDO::PARAM_STR);
                $command->bindParam(4,$_POST['AdminGroup']['status'],PDO::PARAM_STR);
                $command->bindParam(5,$_POST['AdminGroup']['access'],PDO::PARAM_STR);
                $command->bindParam(6,$_POST['AdminGroup']['rname'],PDO::PARAM_STR);
                $command->bindParam(7,$alias,PDO::PARAM_STR);

                if($model->validate())
                {
                    $command->execute();
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Information')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'of user')." <b>".$model->name."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully updated'));
                    $this->redirect(array('index'));
                }
            }
            else
            {
                if($model->newPass != '')
                    $model->password = md5($_POST['AdminGroup']['newPass'].$this->salt);
                else
                    $model->password = $model->password;

                if($model->save())
                {
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Information')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'of user')." <b>".$model->name."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully updated'));
                    $this->redirect(array('index'));
                }
            }
        }

        $this->pageTitle=Yii::app()->getFConfig('serverName') .' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Staff').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Editing').' / '.
            Yii::app()->user->username;

        $this->pageH1 =  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Staff').' / '.
            Yii::app()->user->username;

        $this->render('edit', array(
            'model'=>$model
        ));
    }

    public function actionDelete($alias)
    {
        $model = $this->loadModel($alias);


        if($model->name == Yii::app()->user->username)
        {
            Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'This action cannot be applied to itself')."");
            $this->redirect(array('index'));
        }
        else
        {
            $this->loadModel($alias)->delete();

            if(!isset($_GET['ajax']))
            {
                Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'User')." <b>".$model->name."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'successfully deleted')."");
                $this->redirect(array('index'));
            }
            else
            {
                Yii::app()->user->setFlash('delete', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'news')."</span> <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not removed').".");
                $this->redirect(array('index'));
            }
        }


    }

    public function loadModel($name)
    {
        $model=AdminGroup::model()->findByAttributes(array('name'=>$name));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='staff-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
