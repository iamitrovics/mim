<div id="form-wrapper">
    <div class="container">
        <div class="form-block">

            <div class="form-title">
                <span class="title"><?php the_field('form_title_quote', 'options'); ?></span>
            </div>
            <!-- // title  -->

            <div class="form-quote">
                <?php
                if ( get_field('form_code_quote', 'options') ) {
                    echo do_shortcode( get_field('form_code_quote', 'options') );
                }
                ?>
            </div>
            <!-- // quote  -->

        </div>
        <!-- // block  -->
    </div>
</div>  
<!-- // form wrapper    -->