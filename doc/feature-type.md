
# feature-flag系统内置feature类型

## Switch type

* 通过on/off控制feature是否生效
* value取值 ： on或off

### 使用场景

* 如果采用主干开发模式：为开发完成的功能可以设定为off，不对外开放。
* 上线某一新功能发现引起bug，修改配置文件关闭该功能，可以快速回滚到正确版本，不用重新上线代码，甚至可以将feature类型改成IP，限定特定IP使用该feature，可以线上调试。

## Percentage type

* 通过百分比控制feature对多少用户开发

        使用baiduid作为百分比取值标准，可以保证feature对同一个用户是否生效是固定的

* value取值 ： 0-1之间，如：0.8表示百分之八十

### 使用场景

* 小流量进行A/Btest

## Date type

* 通过时间控制，某时间之前feature生效
* value取值 ： 具体的时间字符串，格式如下

        ```javascript
        {
            "features" : {
                "featureA" : {
                    "type" : "date",
                    "value" : "2013-12-23 15:00:00 | 2013-12-23 15:00:00", //生效时间 | 失效时间
                    "desc" : "test beforeDate feature work or not"
                }
            }
        }

        ```javascript
        {
            "features" : {
                "featureA" : {
                    "type" : "date",
                    "value" : "* | 2013-12-23 15:00:00", // * 表示无穷小
                    "desc" : "test beforeDate feature work or not"
                }
            }
        }

        {
            "features" : {
                "featureA" : {
                    "type" : "date",
                    "value" : "2013-12-23 15:00:00 | *", // * 表示无穷大
                    "desc" : "test beforeDate feature work or not"
                }
            }
        }

### 使用场景

* 节假日活动专题页：例如6.1儿童节专题页，只需要展现一天
* 某一功能需要特定时间上线或者下线

## Ua type

* 根据ua判断特定用户
* value取值，正则表达式字符串。如识别爬虫程序：


 ```javascript

{
    "features" : {
        "featureA" : {
            "type" : "ua",
            "value" : "/Baiduspider|Googlebot|iaskspider|spider|YodaoBot|msnbot/i",
            "desc" : "test ua feature work or not"
        }
    }
}

```


### 使用场景

* 针对爬虫程序做特殊处理屏蔽某功能等
* 针对某类用户的浏览器、系统等进行识别



# 自定义feature扩展

* [如何扩展自定义feature](./feature-extends.md)
