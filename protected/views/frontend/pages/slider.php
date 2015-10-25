<script src="/skin/faicore/frontend/js/slider.js" type="text/javascript"></script>

<link href="/skin/faicore/frontend/css/slider.css" type="text/css" rel="stylesheet" />
<link href="/skin/faicore/frontend/css/slider_defSkin.css" type="text/css" rel="stylesheet" />
<link href="/skin/faicore/frontend/css/iskin.css" type="text/css" rel="stylesheet" />

<script src="/skin/faicore/frontend/js/glisse.js" type="text/javascript"></script>
<link href="/skin/faicore/frontend/css/glisse.css" type="text/css" rel="stylesheet" />
<link href="/skin/faicore/frontend/css/api.css" type="text/css" rel="stylesheet" />


<script>
    jQuery(function() {

        jQuery(".open-apps").bind('click',function(){
            if(jQuery("#slides-top-nav").css('top') == ('-339px'))
            {
                jQuery("#slides-top-nav").animate({top: '0px'},400);
                jQuery(this).addClass("active-apps");
            }
            else
            {
                jQuery("#slides-top-nav").animate({top: '-339px'},400);
                jQuery(this).removeClass("active-apps");
            }

            jQuery(".sh-set").bind('click',function(){
               var slides_set = jQuery(this).attr("data");
               jQuery(".royalSlider").css('display', 'none');
               jQuery(slides_set).fadeIn(200);

               if(jQuery(slides_set).css('display') == ("block"))
               {
                   jQuery(".sh-set").removeClass('active');
                   jQuery(this).addClass('active');
                   jQuery("#slides-top-nav").animate({top: '-339px'},400);
               }
                return false;
            });
        });


    });
</script>

<div id="slider-main-wrapper">
    <div id="slides-top-nav">
        <div id="slides-top-content">
            <div id="left-nav">
                <div class="title">
                    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Visualisation'); ?>:
                </div>
                <ul>
                    <?php foreach(Slides::getVisualProj($model) as $item): ?>
                        <li>
                            <a href="#" data="#<?php echo Pages::getTranslit($item->title); ?>" class="sh-set"><?php echo $item->title; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div id="right-nav">
                <div class="title">
                    <?php echo Yii::t(''.Yii::app()->request->cookies['language']->value.'', 'Completed projects'); ?>:
                </div>
                <ul>
                    <?php foreach(Slides::getCompletedProj($model) as $item): ?>
                        <li>
                            <a href="#" data="#<?php echo Pages::getTranslit($item->title); ?>" class="sh-set"><?php echo $item->title; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <?php $count = 0; ?>
    <?php foreach($model->slides as $item): ?>
        <?php $count++; ?>

        <script>
            jQuery(function() {
                jQuery('.<?php echo Pages::getTranslit($item->title)."-".$count?>').glisse({speed: 500, changeSpeed: 550, effect:'fade', fullscreen: false});

                royalSliderInstance = $('#<?php echo Pages::getTranslit($item->title);?>').royalSlider({
                    captionShowEffects:["fade"],
                    controlNavThumbs:true,
                    imageAlignCenter:true,
                    directionNavEnabled: true,
                    welcomeScreenEnabled:false,
                    hideArrowOnLastSlide:true,
                    keyboardNavEnabled:false
                }).data('royalSlider');

                jQuery("#<?php echo Pages::getTranslit($item->title);?> .thumbsAndArrowsContainer").appendTo("#<?php echo Pages::getTranslit($item->title);?> .thumb-nav");
            });
        </script>

        <div id="<?php echo Pages::getTranslit($item->title);?>" class="royalSlider default with-thumbs">
            <ul class="royalSlidesContainer dragme grab-cursor">

                <?php for($i = 1; $i < 16; $i++) : ?>
                    <?php $slide = "slide_".$i.""; if($item->$slide !== ""): ?>
                            <li class="royalSlide <?php echo Pages::getTranslit($item->title)."-".$count?>" rel="<?php echo "group".$count; ?>" data-glisse-big="<?php echo $item->$slide ?>" src="<?php echo $item->$slide ?>"  data-thumb="<?php echo $item->$slide ?>" data-src="<?php echo $item->$slide ?>"></li>
                    <?php endif; ?>
                <?php endfor; ?>

            </ul>
            <div class="thumb-nav">
                <span class="open-apps"></span>
            </div>
        </div>
    <?php endforeach; ?>
</div>

