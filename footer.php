<footer class="footer-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 hidden-sm hidden-xs no-padding--right">
                    <p class="footer-bar__copyright">
                        &copy;Copyright <a href="<?php echo home_url(); ?>" class="common__link">NAG</a> 2017
                    </p>
                </div>
                <div class="col-lg-6 col-sm-9 col-xs-10 font-centered lefted--tablet">
                    <?php echo get_rrss('white'); ?>
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-2 font-righted">
                    <ul class="icons-box__list icons-box__list--right">
                        <li class="icons-box__item icons-box__item--circled">
                            <a href="#main" class="icons-box__link fa fa-angle-up"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>