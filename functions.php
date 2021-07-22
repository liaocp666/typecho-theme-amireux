<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

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

    $customCSS = new Typecho_Widget_Helper_Form_Element_Textarea(
        'customCSS',
        null,
        null,
        _t('头部/自定义CSS'),
        _t('在头部head标签中插入填写代码，无需填写style标签'));
    $form->addInput($customCSS);

    $customJS = new Typecho_Widget_Helper_Form_Element_Textarea(
        'customJS',
        null,
        null,
        _t('脚部/自定义JS'),
        _t('在最后body标签前插入填写代码，无需填写script标签'));
    $form->addInput($customJS);
}

function themeFields($layout)
{
    $thumb = new Typecho_Widget_Helper_Form_Element_Text(
        'thumb',
        NULL,
        NULL,
        '自定义文章缩略图',
        '优先显示填写的缩略图 -> 文章内第一张图片'
    );
    $layout->addItem($thumb);

    $type = new Typecho_Widget_Helper_Form_Element_Select(
        'type',
        array('post' => '文章', 'notice' => '通知'),
        'post',
        '请选择文章类型',
        '通知：使用通知块在页面显示；文章：正常文章排版'
    );
    $layout->addItem($type);

    $desc = new Typecho_Widget_Helper_Form_Element_Text(
        'desc',
        NULL,
        NULL,
        'SEO描述',
        '用于填写文章或独立页面的SEO描述，如果不填写则显示默认描述'
    );
    $layout->addItem($desc);

    $keywords = new Typecho_Widget_Helper_Form_Element_Text(
        'keywords',
        NULL,
        NULL,
        'SEO关键词',
        '用于填写文章或独立页面的SEO关键词，如果不填写则显示默认关键词'
    );
    $layout->addItem($keywords);
}

// 获取缩略图
function showThumbnail($widget)
{
    $cai = '';
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';


    if ($widget->fields->thumb) {
        // 填写了缩略图字段
        $ctu = $widget->fields->thumb;
    } else if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
        //下面是调用文章第一个图片
        $ctu = $thumbUrl[1][0] . $cai;
    } else if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
        //如果是内联式markdown格式的图片
        $ctu = $thumbUrl[1][0] . $cai;
    } else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
        //如果是脚注式markdown格式的图片
        $ctu = $thumbUrl[1][0] . $cai;
    }
    return $ctu;
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