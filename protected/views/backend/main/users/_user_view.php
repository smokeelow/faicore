<tr>
    <td align="center">
        <?php echo $data->id;?>
    </td>

    <td align="center">
        <img width="37" height="36" src="<?php echo $data->picture; ?>" alt="<?php echo $data->rname; ?>" />
    </td>

    <td>
        <?php echo $this->getNameLang($data->rname); ?>
    </td>

    <td>
        <?php echo $data->adm_name; ?>
    </td>

    <td>
       <?php echo $this->getUserWrapper($data->role,0); ?>
    </td>

    <td class="ft-actions">
        <?php echo CHtml::link('<img src="/skin/backend/faicore/images/edit.png"/>',  array('updateuser',  'login'=>$data->adm_name), array('class' => 's-button', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Edit'))); ?>
        <?php echo CHtml::link('<img src="/skin/backend/faicore/images/close.png"/>', array('deleteuser', 'login'=>$data->adm_name), array('class' => 's-button', 'title'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Delete'))); ?>
    </td>
</tr>
