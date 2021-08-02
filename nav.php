<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<header class="site-header">
    <section class="container">
        <nav class="navbar fade-in-top" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <h1 class="navbar-item site-title" href="<?php $this->options->siteUrl(); ?>" itemprop="name">
                    <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
                </h1>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                   data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
                    <?php while ($categorys->next()) : ?>
                        <a class="navbar-item site-navbar-item" href="<?php $categorys->permalink(); ?>">
                            <span
                                <?php if ($this->is('category', $categorys->slug)) : ?>class="is-active"<?php endif; ?>><?php $categorys->name(); ?></span>
                        </a>
                    <?php endwhile; ?>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while ($pages->next()): ?>
                        <a class="navbar-item site-navbar-item" href="<?php $pages->permalink(); ?>">
                            <span
                                <?php if ($this->is('page', $pages->slug)): ?>class="is-active"<?php endif; ?>><?php $pages->title(); ?></span>
                        </a>
                    <?php endwhile; ?>
                </div>

                <div class="navbar-end is-hidden-touch">
                    <div class="navbar-item">
                        <form id="search" method="post" action="<?php /*$this->options->siteUrl(); */?>" role="search">
                            <label for="searchInput" class="search-wrap">
                            <a class="icon" style="color: #000;">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"/>
                                </svg>
                            </a>
                            <input type="text" id="searchInput" name="s" class="search-input"
                                   autocomplete="off"
                                   placeholder="<?php _e('输入关键字搜索'); ?>" required/>
                            </label>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </section>
</header>