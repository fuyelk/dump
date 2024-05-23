<?php

namespace fuyelk\dump;

use Exception;

/**
 * 控制台带样式输出
 * @author fuyelk <fuyelk@fuyelk.com>
 * @date 2023/5/21 15:42
 */
class Dump
{
    /**
     * @var int 颜色：黑
     */
    const COLOR_BLACK = 0;

    /**
     * @var int 颜色：红
     */
    const COLOR_RED = 1;

    /**
     * @var int 颜色：绿
     */
    const COLOR_GREEN = 2;

    /**
     * @var int 颜色：黄
     */
    const COLOR_YELLOW = 3;

    /**
     * @var int 颜色：蓝
     */
    const COLOR_BLUE = 4;

    /**
     * @var int 颜色：紫
     */
    const COLOR_PURPLE = 5;

    /**
     * @var int 颜色：青
     */
    const COLOR_CYAN = 6;

    /**
     * @var int 颜色：白
     */
    const COLOR_WHITE = 7;

    /**
     * @var int 颜色：灰
     */
    const COLOR_GRAY = 8;

    /**
     * @var int 颜色：粉
     */
    const COLOR_PINK = 9;

    /**
     * @var string[] 可用颜色列表
     */
    public static $COLOR_LIST = [
        self::COLOR_BLACK => 'black',
        self::COLOR_RED => 'red',
        self::COLOR_GREEN => 'green',
        self::COLOR_YELLOW => 'yellow',
        self::COLOR_BLUE => 'blue',
        self::COLOR_PURPLE => 'purple',
        self::COLOR_CYAN => 'cyan',
        self::COLOR_WHITE => 'white',
        self::COLOR_GRAY => 'gray',
        self::COLOR_PINK => 'pink',
    ];

    /**
     * @var int 字体：粗体
     */
    const FONT_BOLD = 1;

    /**
     * @var int 字体：下划线
     */
    const FONT_UNDERLINE = 4;

    /**
     * @var int 字体：闪烁
     */
    const FONT_BLINK = 5;

    /**
     * @var string[] 可用字体样式列表
     */
    public static $FONT_LIST = [
        self::FONT_BOLD => 'bold',
        self::FONT_UNDERLINE => 'underline',
        self::FONT_BLINK => 'blink',
    ];

    /**
     * 设置前景色
     * @param string|null $foreground
     * @return array[]
     * @throws Exception
     * @author fuyelk <fuyelk@fuyelk.com>
     */
    private static function setForeground(string $foreground = null): array
    {
        if (is_null($foreground)) return [];

        if (!isset(self::$COLOR_LIST[$foreground])) {
            throw new Exception('前景色有误');
        }

        return [38, 5, $foreground];
    }

    /**
     * 设置背景色
     * @param string|null $background
     * @return array[]
     * @throws Exception
     * @author fuyelk <fuyelk@fuyelk.com>
     */
    private static function setBackground(string $background = null): array
    {
        if (is_null($background)) return [];

        if (!isset(self::$COLOR_LIST[$background])) {
            throw new Exception('前景色有误');
        }

        return [48, 5, $background];
    }

    /**
     * 设置字体
     * @param string|array|null $font
     * @return array
     * @throws Exception
     * @author fuyelk <fuyelk@fuyelk.com>
     */
    private static function setFont($font = null): array
    {
        if (empty($font)) return [];

        if (!is_array($font)) $font = [$font];

        $params = [];
        foreach ($font as $item) {
            if (!isset(self::$FONT_LIST[$item])) {
                throw new Exception('字体有误');
            }
            $params[] = $item;
        }

        return $params;
    }

    /**
     * 清屏
     * @return string
     * @throws Exception
     * @author fuyelk <fuyelk@fuyelk.com>
     */
    public static function clear(): string
    {
        return "\033[0H\033[0J";
    }

    /**
     * 退格
     * @return string
     * @author fuyelk <fuyelk@fuyelk.com>
     * @date 2024/5/23 11:33
     */
    public static function backspace()
    {
        return "\010";
    }

    /**
     * 格式化
     * @param string $text 文本
     * @param string|null $foreground 前景色
     * @param string|null $background 背景色
     * @param string|array|null $font 字体样式
     * @return string
     * @throws Exception
     * @author fuyelk <fuyelk@fuyelk.com>
     */
    public static function format(string $text, string $foreground = null, string $background = null, $font = null): string
    {
        $params = array_merge(self::setForeground($foreground),
            self::setBackground($background),
            self::setFont($font)
        );
        return sprintf("\033[%sm%s\033[0m", implode(';', $params), $text);
    }
}