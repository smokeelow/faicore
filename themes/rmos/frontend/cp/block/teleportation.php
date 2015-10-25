<?php echo $this->renderPartial('html/messages');?>
<?php if($char->cLevel < 10):?>
<div class="tp-msg">
    <h3><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Teleportation is only available from level 10');?></h3>
    <div class="status">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Need more');?>
        <?php $lvl = 10 - $char->cLevel;
        echo Character::getRCount($lvl, array(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'level'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'level '),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'levels'))); ?>
    </div>
</div>
<?php else:?>
    <?php echo CHtml::form('','post',array('id'=>'action-form'));?>
            <div class="a-line">
                <?php if($this->getFConfig('tp_status') != 0):?>
                <div class="p-line">
                    <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset');?>:</span>
                                <span class="r-entity">
                                    <?php $reset = $this->getFConfig('reset_col'); echo $char->$reset;?>
                                </span>
                    <div class="clear"></div>
                </div>

                <div class="p-line">
                    <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Level');?>:</span>
                                <span class="r-entity">
                                    <?php echo $char->cLevel;?>
                                </span>
                    <div class="clear"></div>
                </div>
                <?php endif;?>

                <div class="p-line">
                    <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Price for teleport');?>:</span>
                            <span class="r-entity">
                                <?php if($this->getFConfig('tp_status') == 1):?>
                                    <?php echo $this->getFConfig('tp_price');?>
                                <?php else:?>
                                    <?php echo $this->getFConfig('tp_priceFix');?>
                                <?php endif;?>
                            </span>
                    <div class="clear"></div>
                </div>

                <div class="p-line">
                    <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Current map');?>:</span>
                            <span class="r-entity">
                                <?php echo $model->getCMap();?>
                            </span>
                    <div class="clear"></div>
                </div>

                <div class="p-line">
                    <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Teleport to');?>:</span>
                            <span class="r-entity">
                                <?php
                                echo CHtml::dropDownList('map', '',Character::getTLMap(),
                                    array(
                                        'empty'=>Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Select a map'),
                                    ));
                                ?>
                            </span>
                    <div class="clear"></div>
                </div>


            <div class="r-price">
                <?php if($this->getFConfig('tp_status') != 0):?>
                    <div class="point-line">
                        <div class="cl-count">
                            <span class="cur-reset"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset');?> </span>
                            <b>*</b>
                            <span class="cur-lvl"> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Level');?> </span>
                            <b>*</b>
                            <span class="tp-price"> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Price');?></span>
                        </div>
                        <div class="summ">=</div>
                    </div>

                    <div class="count-points">
                        <div class="total-price"><?php
                            if($char->$reset == 0)
                            {
                                $char->$reset = 1;
                            }
                            else
                            {
                                $char->$reset = $char->$reset;
                            }

                            $price = intval($this->getFConfig('tp_price') * $char->$reset * $char->cLevel);
                            echo number_format($price);?> zen
                        </div>
                    </div>
                <?php else:?>
                    <div class="total-price">
                        <?php echo $this->getFConfig('tp_priceFix');?> zen
                    </div>
                <?php endif;?>
            </div>
            <div class="row buttons">
                <div class="action-buttons">
                    <button href="#" class="fai-button" onclick="getAjaxForm(jQuery('#action-form'),'#action',true); return false;">
                       <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Teleport')?>
                    </button>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <?php echo $this->renderPartial('html/coreJs');?>
    <?php echo CHtml::endForm();?>
<?php endif;?>