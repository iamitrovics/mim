<div id="booking-div-wrap">
    <div class="container">
        <div class="booking-div">
            
            <ul class="nav nav-tabs" id="myTab">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="auto-tab" data-toggle="tab" href="#auto">Auto</a>
                </li>
            </ul>
            <!-- /.nav-tabs -->

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home">

                    <?php echo do_shortcode('[contact-form-7 id="2448" title="Home Quote Form"]'); ?>

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane fade" id="auto">
                    
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