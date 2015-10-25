<?php if(sizeof($model) > 0): ?>
<div id="rand-wrap">
    <div id="r-wrap">
        <div id="r-proj" class="rand-projects">
            <div class="title">
                <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Random projects'); ?>

                <div class="a-nav">
                    <button class="r-upd"><?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Refresh'); ?></button>
                </div>
            </div>

            <ul id="fr-proj">
                <?php foreach($model as $item): ?>
                    <?php foreach($item->category as $cat):?>
                        <li>
                            <div class="r-img">
                                <img width="200" height="120" src="<?php echo $item->img; ?>" alt="<?php echo $item->title ?>" title="<?php echo $item->title ?>"/>
                            </div>

                            <div class="r-cont">
                                <span class="r-title"><?php echo $item->title ?>:</span>
                                <?php echo Pages::strCut($item->s_desc);?>
                            </div>

                            <div class="r-url">
                                <a href="/projects/<?php echo Yii::app()->request->cookies['language']->value.'/'.$cat->url.'/'.$item->alias ?>" title="<?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'more info').' '.$item->title ?>">
                                   <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'more info'); ?>
                                </a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<div id="ajax-loader"><img src="/skin/faicore/frontend/images/ajax.gif" alt="ajax loader" /></div>
</div>
<?php endif; ?>