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
                            Powered by Typecho · Theme Designed by <a href="https://github.com/LeacHar/typecho-theme-amireux" target="_blank">Amireux</a>
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <script src="<?php $this->options->themeUrl('static/js/amireux.js'); ?>"></script>
    <!--为了自定义时方便写jq相关代码，所以引入，主题未使用-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simplelightbox@2.8.0/dist/simple-lightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script type="text/javascript">
        <?php $this->options->customJS() ?>
    </script>
<?php $this->footer(); ?>
