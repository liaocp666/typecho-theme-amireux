<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="column <?php $thumb = showThumbnail($this);
if (!empty($thumb)): ?>is-9<?php else: ?>is-12<?php endif; ?>">
    <div class="item-text">
        <div class="site-content-item-title">
            <h2 itemprop="name headline"><a itemprop="url"
                                            href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
            </h2>
        </div>
        <div class="site-content-item-meta" itemscope
             itemtype="http://schema.org/Person">
                                        <span><a itemprop="name" href="<?php $this->author->permalink(); ?>"
                                                 rel="author"><?php $this->author(); ?></a></span>
            <span>&nbsp;·&nbsp;</span>
            <span><a href=""><?php $this->category('、'); ?></a></span>
            <span>&nbsp;·&nbsp;</span>
            <span>
                                            <time datetime="<?php $this->date('c'); ?>"
                                                  itemprop="datePublished"><?php $this->date(); ?></time>
                                        </span>
        </div>
        <div class="site-content-item-remark">
            <?php $this->excerpt(70, '…'); ?>
        </div>
    </div>
</div>
<?php $thumb = showThumbnail($this);
if (!empty($thumb)): ?>
    <div class="column is-3">

        <div class="item-image is-hidden-touch">
            <figure class="image is-4by3">
                <a href="<?php $this->permalink() ?>"><img class="lazyload" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="<?php echo $thumb; ?>"></a>
            </figure>
        </div>
    </div>
<?php endif; ?>
