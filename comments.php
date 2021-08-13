<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options)
{
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    }
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
    ?>
    <article class="media">
        <figure class="media-left">
            <p class="image is-48x48">
                <?php $comments->gravatar('128', ''); ?>
            </p>
        </figure>
        <div class="media-content">
            <div class="content comment-body<?php
            if ($comments->_levels > 0) {
                echo ' comment-child';
                $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
            } else {
                echo ' comment-parent';
            }
            $comments->alt(' comment-odd', ' comment-even');
            echo $commentClass;
            ?>" id="<?php $comments->theId(); ?>">
                <p>
                    <strong><?php $comments->author(); ?></strong>
                    <br>
                    <?php $comments->content(); ?>
                    <small class="comment-reply"><?php $comments->reply(); ?> · <?php $comments->date('Y-m-d H:i'); ?></small>
                </p>
            </div>
            <?php if ($comments->children) { ?>
            <article class="comment-children">
                <?php $comments->threadedComments($options); ?>
            </article>
            <?php } ?>
        </div>
    </article>
<?php } ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($this->allow('comment')): ?>
    <h6 id="response"><?php _e('添加新评论'); ?></h6>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>
            <div class="comments-form">
                <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                    <div class="columns is-multiline is-gapless">
                        <?php if ($this->user->hasLogin()): ?>
                            <div class="column is-12">
                                <p style="padding: 1em .4111em;" class="comments-current"><?php _e('登录身份: '); ?>
                                    <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>.
                                    <a href="<?php $this->options->logoutUrl(); ?>"
                                       title="Logout"><?php _e('退出'); ?>&raquo;</a>
                                </p>
                            </div>
                        <?php else: ?>
                            <div class="column is-4">
                                <input placeholder="昵称" type="text" name="author" id="author" class="text"
                                       value="<?php $this->remember('author'); ?>" required/>
                            </div>
                            <div class="column is-4">
                                <input placeholder="邮箱" type="email" name="mail" id="mail" class="text"
                                       value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                            </div>
                            <div class="column is-4">
                                <input type="url" name="url" id="url" class="text"
                                       placeholder="<?php _e('http://'); ?>"
                                       value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                            </div>
                        <?php endif; ?>
                        <div class="column is-12">
                        <textarea placeholder="评论内容" rows="8" cols="50" name="text" id="textarea" class="textarea"
                                  required><?php $this->remember('text'); ?></textarea>
                        </div>
                        <div class="column is-12 has-text-right">
                            <button type="submit" class="button is-small submit" style="margin-bottom: 10px"><?php _e('提交评论'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php else: ?>
        <h6>评论已关闭</h6>
    <?php endif; ?>
    <?php if ($comments->have()): ?>
        <h6><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h6>

        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

    <?php endif; ?>
</div>
