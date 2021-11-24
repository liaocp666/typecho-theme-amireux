<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="sidebar is-hidden-touch">
    <div class="sidebar-item fade-in-bottom-item">
        <div class="sidebar-title">
            <span class="name">我的名片</span>
        </div>
        <div class="author-info">
            <div class="author-image">
                <figure class="image image is-64x64">
                    <img class="is-rounded lazyload" src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=" data-src="<?php echo $this->options->authorImg() . '&time=' . time() ?>">
                </figure>
            </div>
            <div class="author-meta">
                <span class="name">
                    <?php $this->author(); ?>
                </span>
                <span style="color: #4a4a4ab5">
                    <?php $this->options->authorMeta() ?>
                </span>
                <div class="remark" style="color: #4a4a4ab5">
                    <?php $this->options->authorRemark() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-item fade-in-bottom-item">
        <div class="sidebar-title">
            <span class="name">这些标签</span>
        </div>
        <div class="sidebar-tag">
            <div class="columns is-multiline">
                <?php $this->widget('Widget_Metas_Tag_Cloud', 'limit=9')->to($tags); ?>
                <?php if ($tags->have()): ?>
                    <?php while ($tags->next()): ?>
                        <div class="column is-4"><a href="<?php $tags->permalink(); ?>" rel="tag"
                                                    title="<?php $tags->count(); ?> 篇文章"><?php $tags->name(); ?></a>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="column is-4"><a><?php _e('……'); ?></a></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="sidebar-item fade-in-bottom-item">
        <div class="sidebar-title">
            <span class="name">他在说话</span>
        </div>
        <div class="sidebar-comments">
            <ul>
                <?php
                $obj = $this->widget('Widget_Comments_Recent', 'ignoreAuthor=true', 'pageSize=4');
                if ($obj->have()) {
                    while ($obj->next()) {
                        echo '<li><a href="' . $obj->permalink . '"><span class="name">' . $obj->author . '</span>：' . $obj->text . '</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <?php if ($this->is('index')) : ?>
    <div class="sidebar-item fade-in-bottom-item">
        <div class="sidebar-title">
            <span class="name">走走逛逛</span>
        </div>
        <div class="sidebar-tag">
            <div class="columns is-multiline">
                <?php
                links();
                ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
