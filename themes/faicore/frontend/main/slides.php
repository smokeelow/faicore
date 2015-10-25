<?php if(sizeof($model) > 0): ?>
    <script type="text/javascript">
        $(function() {
            $('#home').rhinoslider({
                effect: 'fade',
                showTime: 1000,
                autoPlay: true,
                pauseOnHover: false,
                controlsPlayPause: false,
                captionsFadeTime: 150,
                parts: '2,3',
                showCaptions: 'always',
                showControls: 'always',
                slidePrevDirection: 'toTop',
                slideNextDirection: 'toLeft'
            });
        });
    </script>

    <ul id="home">
        <?php if($model->slide_img1 !== ""): ?>
        <li>
            <a href="<?php echo $model->slide_img1_link; ?>">
                <img width="100%" height="550" src="<?php echo $model->slide_img1; ?>"/>
                <div class="slide-msg">
                    <?php echo $model->slide_img1_txt ?>
                </div>
            </a>
        </li>
        <?php endif;?>

        <?php if($model->slide_img2 !== ""): ?>
        <li>
            <a href="<?php echo $model->slide_img2_link; ?>">
                <img width="100%" height="550" src="<?php echo $model->slide_img2; ?>"/>
                <div class="slide-msg">
                    <?php echo $model->slide_img2_txt ?>
                </div>
            </a>
        </li>
        <?php endif;?>

        <?php if($model->slide_img3 !== ""): ?>
        <li>
            <a href="<?php echo $model->slide_img3_link; ?>">
                <img width="100%" height="550" src="<?php echo $model->slide_img3; ?>"/>
                <div class="slide-msg">
                    <?php echo $model->slide_img3_txt ?>
                </div>
            </a>
        </li>
        <?php endif;?>

        <?php if($model->slide_img4 !== ""): ?>
        <li>
            <a href="<?php echo $model->slide_img4_link; ?>">
                <img width="100%" height="550" src="<?php echo $model->slide_img4; ?>"/>
                <div class="slide-msg">
                    <?php echo $model->slide_img4_txt ?>
                </div>
            </a>
        </li>
        <?php endif;?>

        <?php if($model->slide_img5 !== ""): ?>
        <li>
            <a href="<?php echo $model->slide_img5_link; ?>">
                <img width="100%" height="550" src="<?php echo $model->slide_img5; ?>"/>
                <div class="slide-msg">
                    <?php echo $model->slide_img5_txt ?>
                </div>
            </a>
        </li>
        <?php endif;?>
    </ul>
<?php endif;?>