<?php
class TicketsController extends BackEndController
{
    public function actionIndex()
    {
		$model = new CActiveDataProvider('FAI_TICKETS');

        $this->render('index',array(
            'model'=>$model,
        ));
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $post  = new FAI_TICKETS_POST;

        $this->performAjaxValidation($post);

        if(isset($_POST['FAI_TICKETS_POST']))
        {
            if($this->getFConfig('db_driver') == 'dblib')
            {
                if($_POST['FAI_TICKETS_POST']['message'] != '')
                {
                    $table = 'FAI_TICKETS_POST';
                    $sender = 1;
                    $query="INSERT INTO $table (message,ticket_id,date,name,photo,ip,sender)
                  VALUES(N?,?,?,N?,N?,N?,?)";
                    $command=Yii::app()->db->createCommand($query);
                    $command->bindParam(1,$_POST['FAI_TICKETS_POST']['message'], PDO::PARAM_STR);
                    $command->bindParam(2,$id,PDO::PARAM_STR);
                    $command->bindParam(3,time(),PDO::PARAM_STR);
                    $command->bindParam(4,Yii::app()->user->rname,PDO::PARAM_STR);
                    $command->bindParam(5,Yii::app()->user->picture,PDO::PARAM_STR);
                    $command->bindParam(6,Yii::app()->request->userHostAddress,PDO::PARAM_STR);
                    $command->bindParam(7,$sender,PDO::PARAM_STR);

                    if($command->execute())
                    {
                        Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'The message was sent'));
                        $this->refresh();
                    }
                }
            }
            else
            {
                $post->message      = $_POST['FAI_TICKETS_POST']['message'];
                $post->ticket_id    = $id;
                $post->date         = time();
                $post->name         = Yii::app()->user->rname;
                $post->photo        = Yii::app()->user->picture;
                $post->ip           = Yii::app()->request->userHostAddress;
                $post->sender       = 1;

                if($post->save())
                {
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'The message was sent'));
                    $this->refresh();
                }
            }
        }

        $this->render('view',array(
            'model'=>$model,
            'post'=>$post
        ));
    }

    public function actionStatus($id)
    {
        $model = $this->loadModel($id);

        if($model->status == 1)
        {
            $model->status = 0;
            Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ticket')." <b>#".$id."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'successfully opened'));
        }
        elseif($model->status == 0)
        {
            $model->status = 1;
            Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ticket')." <b>#".$id."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'successfully closed'));
        }

        if($model->save())
        {
            $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actionEditpost($id)
    {
        $model = $this->loadPostModel($id);

        $this->pageTitle=Yii::app()->getFConfig('serverName') .' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Admin panel').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Tickets').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Edit message');

        $this->pageH1 =  Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Tickets').' / '.
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Edit message');

        $this->performAjaxValidation($model);

        if(isset($_POST['FAI_TICKETS_POST']))
        {
            if($this->getFConfig('db_driver') == 'dblib')
            {
                $table = 'FAI_TICKETS_POST';
                $updType = 1;
                $query="UPDATE $table SET message=(N?),date=?,photo=(N?),ip=(N?),
                  upd_type=? WHERE id=?";
                $command=Yii::app()->db->createCommand($query);
                $command->bindParam(1,$_POST['FAI_TICKETS_POST']['message'], PDO::PARAM_STR);
                $command->bindParam(2,time(),PDO::PARAM_STR);
                $command->bindParam(3,Yii::app()->user->picture,PDO::PARAM_STR);
                $command->bindParam(4,Yii::app()->request->userHostAddress,PDO::PARAM_STR);
                $command->bindParam(5,$updType,PDO::PARAM_STR);
                $command->bindParam(6,$id,PDO::PARAM_STR);

                if($command->execute())
                {
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Message')." ".
                        Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully')." ".
                        Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'updated'));
                    $this->redirect(array('view', 'id'=>$model->ticket_id));
                }
            }
            else
            {
                $model->message     = $_POST['FAI_TICKETS_POST']['message'];
                $model->date        = time();
                $model->photo       = Yii::app()->user->picture;
                $model->ip          = Yii::app()->request->userHostAddress;
                $model->upd_type    = 1;

                if($model->save())
                {
                    Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Message')." ".
                        Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully')." ".
                        Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'updated'));
                    $this->redirect(array('view', 'id'=>$model->ticket_id));
                }
            }
        }

        $this->render('edit',array(
            'model'=>$model
        ));
    }

    public function actionDeletepost($id)
    {
        $model = $this->loadPostModel($id);
        $this->loadPostModel($id)->delete();

        if(!isset($_GET['ajax']))
        {
            Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Message')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been successfully')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'deleted'));
            $this->redirect(array('view', 'id'=>$model->ticket_id));
        }
        else
        {
            Yii::app()->user->setFlash('delete', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'FAI_ABOUT')."</span> #".$id." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not removed').".");
            $this->redirect(array('view', 'id'=>$model->ticket_id));
        }
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        if(!isset($_GET['ajax']))
        {
            Yii::app()->user->setFlash('success', Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Ticket')." <b>#".$id."</b> ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'has been')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'successfully deleted'));
            $this->redirect(array('index'));
        }
        else
        {
            Yii::app()->user->setFlash('delete', "".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'An error has occurred').". <span class='o-h-l'>".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'FAI_ABOUT')."</span> #".$id." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'not removed').".");
            $this->redirect(array('index'));
        }
    }

    public function loadPostModel($id)
    {
        $model = FAI_TICKETS_POST::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function loadModel($id)
    {
        $model = FAI_TICKETS::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='ticket-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}