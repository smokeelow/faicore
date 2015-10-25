<?php
class UsercpController extends BackEndController
{
    public function actionIndex()
    {
        $model = new FAI_CPHOME;

        $model->unsetAttributes();

        if(isset($_GET['FAI_CPHOME']))
        {
            $model->attributes=$_GET['FAI_CPHOME'];
        }

        $this->render('index',array(
            'model'=>$model
        ));
    }

    public function actionCreate()
    {
        $model = new FAI_CPHOME;

        if(isset($_POST['FAI_CPHOME']))
        {
            $model->attributes=$_POST['FAI_CPHOME'];
            if($this->getFConfig('db_driver') == 'dblib')
            {
                $table = 'FAI_'.Yii::app()->request->cookies['language']->value.'_CP_HOME';
                $query="INSERT INTO $table (title,img,description,s_desc,date,author,status)
                  VALUES(N?,N?,N?,N?,?,N?,?)";
                $command=Yii::app()->db->createCommand($query);
                $command->bindParam(1,$_POST['FAI_CPHOME']['title'], PDO::PARAM_STR);
                $command->bindParam(2,$_POST['FAI_CPHOME']['img'],PDO::PARAM_STR);
                $command->bindParam(3,$_POST['FAI_CPHOME']['description'],PDO::PARAM_STR);
                $command->bindParam(4,$_POST['FAI_CPHOME']['s_desc'],PDO::PARAM_STR);
                $command->bindParam(5,time(),PDO::PARAM_STR);
                $command->bindParam(6,Yii::app()->user->name,PDO::PARAM_STR);
                $command->bindParam(7,$_POST['FAI_CPHOME']['status'],PDO::PARAM_STR);

                if($model->validate())
                {
                    $command->execute();
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Notice')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'created'));
                    $this->redirect(array('index'));
                }
            }
            else
            {
                $model->date        = time();
                $model->author      = Yii::app()->user->username;

                if($_POST['FAI_CPHOME']['onmpage'] == 1)
                {
                    $table = "FAI_".Yii::app()->request->cookies['language']->value."_CP_HOME";

                    $query="UPDATE $table SET onmpage='0' WHERE onmpage='1'";
                    $command = Yii::app()->db->createCommand($query);
                    $command->execute();
                }

                if($model->save())
                {
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Notice')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'created'));
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('create',array(
           'model'=>$model
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if(isset($_POST['FAI_CPHOME']))
        {
            $model->attributes  = $_POST['FAI_CPHOME'];

            if($this->getFConfig('db_driver') == 'dblib')
            {
                $table = 'FAI_'.Yii::app()->request->cookies['language']->value.'_CP_HOME';
                $query="UPDATE $table SET title=(N?),img=(N?),description=(N?),s_desc=(N?),
                  date=?,author=(N?),status=(N?) WHERE id=?";
                $command=Yii::app()->db->createCommand($query);
                $command->bindParam(1,$_POST['FAI_CPHOME']['title'], PDO::PARAM_STR);
                $command->bindParam(2,$_POST['FAI_CPHOME']['img'],PDO::PARAM_STR);
                $command->bindParam(3,$_POST['FAI_CPHOME']['description'],PDO::PARAM_STR);
                $command->bindParam(4,$_POST['FAI_CPHOME']['s_desc'],PDO::PARAM_STR);
                $command->bindParam(5,time(),PDO::PARAM_STR);
                $command->bindParam(6,Yii::app()->user->name,PDO::PARAM_STR);
                $command->bindParam(7,$_POST['FAI_CPHOME']['status'],PDO::PARAM_STR);
                $command->bindParam(8,$model->id,PDO::PARAM_STR);

                if($model->validate())
                {
                    $command->execute();
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Notice')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'updated'));
                    $this->redirect(array('index'));
                }
            }
            else
            {
                if($model->save())
                {
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Notice')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'updated'));
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('update',array(
            'model'=>$model
        ));
    }

    public function actionDelete($id)
    {
        $model= $this->loadModel($id);
        $model->delete();

        if(!isset($_GET['ajax']))
        {
            Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Notice')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'deleted'));
            $this->redirect(array('index'));
        }
        else
        {
            Yii::app()->user->setFlash('delete', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'FAI_ABOUT')."</span> #".$id." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not removed'));
            $this->redirect(array('index'));
        }
    }

    public function actionStatus($id)
    {
        $model = $this->loadModel($id);

        if($this->getFConfig('db_driver') == 'dblib')
        {
            $table = 'FAI_'.Yii::app()->request->cookies['language']->value.'_CP_HOME';
            $query="UPDATE $table SET status=? WHERE id=?";
            $command=Yii::app()->db->createCommand($query);
            $command->bindParam(1,$_POST['status'],PDO::PARAM_STR);
            $command->bindParam(2,$model->id,PDO::PARAM_STR);

            if($command->execute())
            {
                Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Notice')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'updated'));
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
                Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Notice')." <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'updated'));
                $this->redirect(array('index'));
            }
            else
            {
                Yii::app()->user->setFlash('delete', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'category')."</span> <b>".$model->title."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not updated').".");
                $this->redirect(array('index'));
            }
        }
    }

    public function actionCharacters()
    {
        $fconfig = new FConfig();

        $this->performAjaxValidation($fconfig);

        if(isset($_POST['FConfig']))
        {
            $this->updateINI($_POST['FConfig'], $fconfig);
        }

        $this->render('config', array('fconfig'=>$fconfig));
    }

    public function loadModel($id)
    {
        $model=FAI_CPHOME::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function updateINI($params,$model)
    {
        $model->attributes=$params;

        if($model->validate())
        {
            $oldconf = $this->getFConfig();

            if(file_exists('protected/core_conf/'.Yii::app()->request->cookies['server']->value.'_server_db_'.Yii::app()->request->cookies['language']->value.'.ini'))
                unlink('protected/core_conf/'.Yii::app()->request->cookies['server']->value.'_server_db_'.Yii::app()->request->cookies['language']->value.'.ini');

            $config = array_merge($oldconf, $params);
            $find = array(';','|');
            $replace = "";

            foreach($config as $key => $item)
            {
                $line = $this->checkBTheme($key, str_replace($find,$replace,$item));
                file_put_contents('protected/core_conf/'.Yii::app()->request->cookies['server']->value.'_server_db_'.Yii::app()->request->cookies['language']->value.'.ini', $line, FILE_APPEND);
            }

            $update = ";".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Updated')." ".Yii::app()->user->name." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'in')." ".date('d.m.Y H:i:s');
            file_put_contents('protected/core_conf/'.Yii::app()->request->cookies['server']->value.'_server_db_'.Yii::app()->request->cookies['language']->value.'.ini', "\n\n".$update, FILE_APPEND);

            Yii::app()->user->setFlash('success', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Setting has been successfully saved')."");
            $this->refresh();
        }
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='config-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function checkBTheme($key, $item)
    {
        if($key == "f_theme" && $item == "")
        {

            Yii::app()->user->setFlash('warn', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'You do not enter theme name for frotntend, so Faicore set the default theme')."");
            return $line = $key ." = faicore;\n";
        }
        elseif($key == "f_theme" && $item != "")
        {
            foreach(scandir('skin/frontend') as $dir)
            {
                if($item == $dir)
                {
                    $skin = true;
                }
            }

            foreach(scandir('themes') as $dir)
            {
                if($item == $dir)
                {
                    $theme = true;
                }
            }

            if($skin && $theme)
            {
                return $line = $key ." = ". $item.";\n";
            }
            else
            {
                Yii::app()->user->setFlash('warn', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Theme does not exist for frontend, so Faicore set the default theme')."");
                return $line = $key ." = faicore;\n";
            }
        }


        if($key == "b_theme" && $item == "")
        {

            Yii::app()->user->setFlash('warn_1', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'You do not enter theme name for backend, so Faicore set the default theme')."");
            return $line = $key ." = faicore;\n";
        }
        elseif($key == "b_theme" && $item != "")
        {
            foreach(scandir('skin/backend') as $dir)
            {
                if($key != $dir)
                {
                    $skin = true;
                }
            }

            foreach(scandir('themes') as $dir)
            {
                if($item == $dir)
                {
                    $theme = true;
                }
            }

            if($skin && $theme)
            {
                return $line = $key ." = ". $item.";\n";
            }
            else
            {
                Yii::app()->user->setFlash('warn_1', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Theme does not exist for backend, so Faicore set the default theme')."");
                return $line = $key ." = faicore;\n";
            }
        }
        else
        {
            return $line = $key ." = ". $item.";\n";
        }
    }
}
