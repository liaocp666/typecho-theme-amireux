<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<body itemscope itemtype="https://schema.org/Blog">
<?php $this->need('nav.php'); ?>
<div class="site-content content">
    <div class="container is-max-widescreen">
        <div class="columns">
            <div class="column is-8">
                <div class="item">
                    <div class="columns">
                        <div class="column is-12">
                            <article class="item-text" itemscope itemtype="http://schema.org/BlogPosting">
                                <div class="site-post-title">
                                    <h1 itemprop="name headline"><?php $this->title() ?></h1>
                                </div>
                                <div class="site-post-meta site-content-item-meta">
                                    <span itemprop="author" itemscope itemtype="http://schema.org/Person"><a
                                                itemprop="name" href="<?php $this->author->permalink(); ?>"
                                                rel="author"><?php $this->author(); ?></a></span>
                                    <span>&nbsp;·&nbsp;</span>
                                    <?php if ($this->is('post')) : ?>
                                        <span><?php $this->category('、'); ?></span>
                                        <span>&nbsp;·&nbsp;</span>
                                    <?php endif; ?>
                                    <span>
                                        <time datetime="<?php $this->date('c'); ?>"
                                              itemprop="datePublished"><?php $this->date(); ?></time>
                                    </span>
                                </div>
                                <div class="site-post-content" itemprop="articleBody">
                                    <?php
                                    $pattern = '/\<img.*?src\=\"(.*?)\".*?alt\=\"(.*?)\"[^>]*>/i';
                                    $replacement = '<a href="$1"/><img src="$1" alt="$2" title="$2"></a>';
                                    $content = preg_replace($pattern, $replacement, $this->content);
                                    echo $content;
                                    ?>
                                </div>
                                <?php if ($this->is('post')) : ?>
                                    <div class="site-post-meta site-content-item-meta site-post-content-tag">
                                        <div class="columns">
                                            <div class="column is-12">
                                            <span>
                                                <svg style="width:24px;height:24px;vertical-align: baseline;transform: translateY(calc(50% - .35em));" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                          d="M6.5 10C7.3 10 8 9.3 8 8.5S7.3 7 6.5 7 5 7.7 5 8.5 5.7 10 6.5 10M9 6L16 13L11 18L4 11V6H9M9 4H4C2.9 4 2 4.9 2 6V11C2 11.6 2.2 12.1 2.6 12.4L9.6 19.4C9.9 19.8 10.4 20 11 20S12.1 19.8 12.4 19.4L17.4 14.4C17.8 14 18 13.5 18 13C18 12.4 17.8 11.9 17.4 11.6L10.4 4.6C10.1 4.2 9.6 4 9 4M13.5 5.7L14.5 4.7L21.4 11.6C21.8 12 22 12.5 22 13S21.8 14.1 21.4 14.4L16 19.8L15 18.8L20.7 13L13.5 5.7Z"/>
                                                </svg>
                                            </span>
                                                <span><?php $this->tags('、', true, ''); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="site-post-pagination site-post-meta site-content-item-meta">
                                        <div class="columns">
                                            <?php $this->thePrev('<div class="column is-6 has-text-left text-ellipsis"><span>上一篇：%s</div>', '<div class="column is-6"></div>'); ?>
                                            <?php $this->theNext('<div class="column is-6 has-text-right text-ellipsis"><span>下一篇：%s</div>', '<div class="column is-6"></div>'); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php $this->need('comments.php'); ?>
                            </article>
                        </div>
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
