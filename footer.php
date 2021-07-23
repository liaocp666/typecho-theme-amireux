<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
    <footer class="site-content">
        <section class="container">
            <div class="columns">
                <div class="column is-12">
                    <div class="site-footer">
                        <span class="site-footer-info">
                            © 2021 Chunping.Liao.  All rights reserved.
                        </span>
                        <span class="site-footer-powered is-hidden-touch">
                            Powered by Typecho · Designed by 暮城留风
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simplelightbox@2.8.0/dist/simple-lightbox.min.js"></script>
    <script type="text/javascript">
        var lightbox = new SimpleLightbox('.site-post-content a', {
            captionPosition: 'outside'
        });
        $(document).ready(function () {
            $(".navbar-burger").click(function () {
                $(".navbar-burger").toggleClass("is-active");
                $(".navbar-menu").toggleClass("is-active");
            });
        });
    </script>
    <script type="text/javascript">
        <?php $this->options->customJS() ?>
    </script>
<?php $this->footer(); ?>