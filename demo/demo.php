<?php

require '../src/Dump.php';

use fuyelk\dump\Dump;

function info(string $text)
{
    echo Dump::format($text.PHP_EOL, Dump::COLOR_CYAN);
}

function options(string $text)
{
    echo Dump::format($text . PHP_EOL, Dump::COLOR_YELLOW);
}

function success(string $text)
{
    echo Dump::format($text . PHP_EOL, Dump::COLOR_GREEN, null, Dump::FONT_BOLD);
}

function error(string $text)
{
    echo Dump::format($text . PHP_EOL, Dump::COLOR_RED, null, Dump::FONT_BLINK);
}

info("+====================+");
info("| 欢迎使用xxxx工具库 |");
info("+====================+");

options("Options");
success("\t--help\t帮助");
success("\t--path\t路径");
success("\t--ext\t扩展名");


success('操作成功！');
error('参数错误！');
