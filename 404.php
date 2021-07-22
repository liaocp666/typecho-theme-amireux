<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php $this->archiveTitle(array(
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <meta name="description" content="但愿初相遇，不负有心人"/>
    <meta name="keywords" content="暮城留风,暮城留风博客"/>
    <link rel="shortcut icon" href="/favicon.ico">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Comfortaa|Gamja+Flower');

        html, body {
            height: 100%;
            width: 100%;
        }

        body {
            font-family: 'Gamja Flower', cursive;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            margin: 0px;
            flex-direction: column;
        }

        p {
            font-family: 'Comfortaa', cursive;
            font-size: 30px;
            text-align: center;
        }

        a {
            color: red;
            text-decoration: none;
        }

        .not-found {
            background-color: black;
            color: white;
            padding: 15px;
            padding-left: 30px;
            padding-right: 30px;
        }

        .tipsiz {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px;
            flex-direction: column;
        }

        .tipsiz-body {
            display: flex;
            align-items: center;
            margin: 10px;
        }

        .arm {
            align-self: flex-end;
            width: 50px;
            height: 90px;
            border-top: 3px solid black;

        }

        .left-arm {
            border-right: 3px solid black;
            transform: skew(20deg);
        }

        .right-arm {
            border-left: 3px solid black;
            transform: skew(-20deg);
        }

        .face {
            width: 300px;
            height: 200px;
            border: 3px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-left: 20px;
            margin-right: 20px;
            border-radius: 15px;
        }

        .upper-face {
            display: flex;
            align-items: center;
            justify-content: center;
            letter-spacing: 80px;
            margin-left: 80px;
        }

        .element {
            font-size: 60px;
        }

        .mouth {
            width: 20px;
            height: 10px;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            border: 3px solid black;
            border-bottom: 0;
        }


    </style>
</head>
<body>
<p class="not-found"> page not found </p>

<div class="tipsiz">
    <div class="tipsiz-body">
        <div class="left-arm arm"></div>
        <div class="face">
            <div class="upper-face">
                <div class="element">4</div>
                <div class="element">0</div>
                <div class="element">4</div>
            </div>
            <div class="mouth"></div>
        </div>
        <div class="right-arm arm"></div>
    </div>
</div>

<p> maybe you want to go <a href='<?php $this->options->siteUrl(); ?>'>home? </a></p>
</body>