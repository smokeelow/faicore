<?php echo $this->renderPartial('html/messages');?>
<?php if($model->cLevel < $this->getFConfig('resetLevel')): ?>
<div class="tp-msg">
    <h3><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset is only available from')." ".$this->getFConfig('resetLevel')." ".Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'level ');?></h3>
    <div class="status">
        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Need more');?>
        <?php $lvl = $this->getFConfig('resetLevel') - $model->cLevel;
        echo Character::getRCount($lvl, array(Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'level'),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'level '),
            Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'levels'))); ?>
    </div>
</div>
<?php else: ?>
    <?php echo CHtml::form('','post',array('id'=>'action-form'));?>
        <div class="a-line">
            <div class="p-line">
                <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Current reset');?>:</span>
                                        <span class="r-entity">
                                            <?php $reset = $this->getFConfig('reset_col'); echo $model->$reset;?>
                                        </span>
                <div class="clear"></div>
            </div>

            <div class="p-line">
                <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Next reset');?>:</span>
                                        <span class="r-entity">
                                            <?php echo $model->$reset + 1;?>
                                        </span>
                <div class="clear"></div>
            </div>

            <?php if($this->getFConfig('resetPayType') == 1): ?>
            <div class="p-line">
                <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Price for reset');?>:</span>
                                            <span class="r-entity">
                                                <?php echo number_format($this->getFConfig('resetPayDynamic'));?> zen
                                            </span>
                <div class="clear"></div>
            </div>
            <?php endif;?>

            <div class="p-line">
                <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Clean inventory');?>:</span>
                                        <span class="r-entity">
                                            <?php echo Character::getRConfig('resetInvType');?>
                                        </span>
                <div class="clear"></div>
            </div>

            <div class="p-line">
                <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Clean magic list');?>:</span>
                                        <span class="r-entity">
                                            <?php echo Character::getRConfig('resetMlType');?>
                                        </span>
                <div class="clear"></div>
            </div>

            <div class="p-line">
                <span><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset points');?>:</span>
                                        <span class="r-entity">
                                            <?php echo Character::getRConfig('resetPtType');?>
                                        </span>
                <div class="clear"></div>
            </div>


            <div class="r-price">
                <?php if($this->getFConfig('resetPayType') == 1):?>
                <div class="point-line">
                    <div class="cl-count">
                        <span class="cur-reset"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset');?> </span>
                        <b>*</b>
                        <span class="tp-price"> <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Price');?></span>
                    </div>
                    <div class="summ">=</div>
                </div>

                <div class="count-points">
                    <div class="total-price"><?php
                        if($model->$reset == 0)
                        {
                            $model->$reset = 1;
                        }
                        else
                        {
                            $model->$reset = $model->$reset;
                        }

                        $price = $this->getFConfig('resetPayDynamic') * ($model->$reset+1);
                        echo number_format($price);?> zen
                    </div>
                </div>
                <?php else:?>
                <div class="total-price">
                    <?php echo $this->getFConfig('resetPayFixed');?> zen
                </div>
                <?php endif;?>
            </div>

            <div class="row buttons">
                <input type="hidden" name="reset" id="reset" value="ok"/>
                <div class="action-buttons">
                    <button href="#" class="fai-button" onclick="getAjaxForm(jQuery('#action-form'),'#action',true); return false;">
                        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Reset')?>
                    </button>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        </div>
        <?php echo $this->renderPartial('html/coreJs');?>
    <?php echo CHtml::endForm();?>
<?php endif; ?>