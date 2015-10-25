<?php
    if($this->beginCache('ipbPosts' , array(
    'varyByExpression'=>Yii::app()->request->cookies['language']->value.Yii::app()->request->cookies['server']->value,
    'duration'=>$this->getFConfig('ipbCache'),
    'varyByRoute' => false))) {
    $topics = IPB::getLPosts();
?>

<div id="ipb-messages">
    <?php if(sizeof($topics) > 0):?>
        <?php foreach($topics as $topic):?>
            <div class="topic">
                <div class="post-img">
                    <img src="<?php echo $this->getTemplate('core');?>images/email.png" alt="message"/>
                </div>

                <div class="msg">
                    <a title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'View the latest post');?>" href="<?php echo IPB::getLink($topic->tid,$topic->title);?>" target="_blank">
                       <?php echo $topic->title;?>
                    </a>
                </div>

                <div class="date">
                    <?php echo News::getDate(date('d M Y -.H:i',$topic->last_post));?>
                </div>

                <div class="last-poster">
                    <span class="author">
                        <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Author');?>:
                    </span>

                     <span class="r-author">
                        <?php echo $topic->last_poster_name;?>
                     </span>
                </div>
                <div class="clear"></div>
            </div>
        <?php endforeach;?>
    <?php esle:?>

    <?php endif;?>
</div>
<?php $this->endCache(); } ?>