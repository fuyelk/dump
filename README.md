## Redis常用方法封装

## 安装
> composer require fuyelk/dump

## 介绍
用PHP简单的在控制台输出有样式的内容

## 特征
1. 支持前景色，可选项见 `Dump::$COLOR_LIST`
2. 支持背景色，可选项见 `Dump::$COLOR_LIST`
3. 支持字体样式，可选项见 `Dump::$FONT_LIST`

### 方法
```
    echo Dump::format("出错啦！", Dump::COLOR_RED, null, Dump::FONT_BLINK);
```