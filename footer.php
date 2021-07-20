<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer>
    <section class="container">
        <div class="site-footer">
            <span class="site-footer-info">
                © 2021 Chunping.Liao.  All rights reserved.
            </span>
            <span class="site-footer-powered is-hidden-touch">
                Powered by Typecho · Designed by 暮城留风
            </span>

        </div>
    </section>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simplelightbox@2.8.0/dist/simple-lightbox.min.js"></script>
<script type="text/javascript">
    var lightbox = new SimpleLightbox('.site-post-content a', { /* options */});
    $(document).ready(function () {
        $(".navbar-burger").click(function () {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
    });

    $(document).ready(function () {
        $(".navbar-burger").click(function () {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
    });

</script>