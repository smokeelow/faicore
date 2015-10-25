<?php
class AjaxController extends FrontEndController
{
    public function filters()
    {
        return array(
            'ajaxOnly + index',
        );
    }

    public function actionIndex($id)
    {
        switch($id)
        {
            case 'ipbTopics' :   $result = $this->getIpbTopics();    break;
        }

        return $result;
    }

    public function getIpbTopics()
    {
        $this->renderPartial('ipb/topics_3_3_4');
    }
}