<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

// 获取缩略图
function showThumbnail($widget)
{
    $cai = '';
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';


    if ($attach && $attach->isImage) {

        $ctu = $attach->url . $cai;
    } //调用第一个图片附件
    else
        //下面是调用文章第一个图片
        if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
            $ctu = $thumbUrl[1][0] . $cai;
        } //如果是内联式markdown格式的图片
        else if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
            $ctu = $thumbUrl[1][0] . $cai;
        } //如果是脚注式markdown格式的图片
        else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
            $ctu = $thumbUrl[1][0] . $cai;
        }
    return $ctu;
}

function themeConfig($form)
{
    $authorImg = new Typecho_Widget_Helper_Form_Element_Text(
        'authorImg',
        NULL,
        NULL,
        _t('侧边栏/我的名片/头像'),
        _t('')
    );
    $form->addInput($authorImg);

    $authorMeta = new Typecho_Widget_Helper_Form_Element_Text(
        'authorMeta',
        NULL,
        NULL,
        _t('侧边栏/我的名片/信息描述'),
        _t('')
    );
    $form->addInput($authorMeta);

    $authorRemark = new Typecho_Widget_Helper_Form_Element_Text(
        'authorRemark',
        NULL,
        NULL,
        _t('侧边栏/我的名片/简介描述'),
        _t(''));
    $form->addInput($authorRemark);

    $links = new Typecho_Widget_Helper_Form_Element_Textarea(
        'links',
        null,
        null,
        _t('侧边栏/走走逛逛'),
        _t('友情链接格式：名称@链接地址：暮城留风@https://www.liaocp.cn/<br/>一行一条，逐行读取'));
    $form->addInput($links);
}


/**
 * 输出友情链接
 */
function links()
{
    $options = Typecho_Widget::widget('Widget_Options');
    $list = explode("\r\n", $options->links);
    $arrlength = count($list);
    for ($x = 0; $x < $arrlength; $x++) {
        list($title, $siteUrl) = explode('@', $list[$x]);
        echo '<div class="column is-4"><a href="' . $siteUrl . '" title="' . $title . '" target="_blank">' . $title . '</a></div>';
    }
}

function avatar()
{
    $user = Typecho_Widget::widget('Widget_User');
    echo  Typecho_Common::gravatarUrl($user->mail, 220, 'X', 'mm', true);
}