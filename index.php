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
<div class="site-content fade-in-bottom">
    <div class="container is-max-widescreen">
        <div class="columns">
            <div class="column is-8">
                <?php while ($this->next()): ?>
                    <article class="item" itemscope itemtype="http://schema.org/BlogPosting">
                        <div class="columns">
                            <?php if ($this->fields->type != null && $this->fields->type == 'notice'): ?>
                                <?php $this->need('noticeType.php'); ?>
                            <?php else: ?>
                                <?php $this->need('postType.php'); ?>
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
