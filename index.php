<?php
/**
 * 简洁博客主题
 *
 * @package Amireux
 * @author 暮城留风
 * @version 0.0.1
 * @link https://www.liaocp.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<body itemscope itemtype="https://schema.org/Blog">
<?php $this->need('nav.php'); ?>
<div class="site-content">
    <div class="container is-max-desktop">
        <div class="columns">
            <div class="column is-8">
                <?php while ($this->next()): ?>
                    <article class="item" itemscope itemtype="http://schema.org/BlogPosting">
                        <div class="columns">
                            <div class="column <?php $thumb = showThumbnail($this);
                            if (!empty($thumb)): ?>is-9<?php else: ?>is-12<?php endif; ?>">
                                <div class="item-text">
                                    <div class="site-content-item-title">
                                        <h2 itemprop="name headline"><a itemprop="url"
                                                                        href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                                        </h2>
                                    </div>
                                    <div class="site-content-item-meta" itemscope itemtype="http://schema.org/Person">
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
                                            <a href="<?php $this->permalink() ?>"><img src="<?php echo $thumb; ?>"></a>
                                        </figure>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
                <div class="site-pagination">
                    <div class="nav-links">
                        <span class="page-number">第 <?php if ($this->_currentPage > 1) echo $this->_currentPage; else echo 1; ?>&nbsp;页&nbsp;/&nbsp;共&nbsp;<?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?>&nbsp;页</span>
                        <?php $this->pageLink('上一页'); ?>
                        <?php $this->pageLink('下一页', 'next'); ?>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <?php $this->need('sidebar.php'); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>
</body>
</html>
