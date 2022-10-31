<div id="booking-div-wrap">
    <div class="container">
        <div class="booking-div">
            
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="auto-tab" data-toggle="tab" href="#auto" role="tab" aria-controls="auto" aria-selected="false">Auto</a>
                </li>
            </ul>
            <!-- /.nav-tabs -->

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <?php echo do_shortcode('[contact-form-7 id="2448" title="Home Quote Form"]'); ?>

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane fade" id="auto" role="tabpanel" aria-labelledby="auto-tab">
                    
                    <?php echo do_shortcode('[contact-form-7 id="2451" title="Car Quote Form"]'); ?>

                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.booking-div-in -->
    </div>
    <!-- /.container -->
</div>
<!-- /#booking-div-wrap -->