# php开发助手工具箱
> 1、一些实用的php常用方法，他会自动加载到程序当中  
> 2、还有一些关于面向对象开发时的基础类  
> 3、当前包会持续更新，增加新的功能和方法

当前包还没有发布，可在本地进行安装，安装后更新或修改这个包即可使用新功能，无需进行composer update

### 安装方法
1. 将当前包 clone 到项目同级目录中

2. 在package.json文件中添加
```
"repositories": {
    "hug-code/php-tool": {
        "type": "path",
        "url": "../php-tool",
        "options": {
            "symlink": true
        }
    }
},
```
3. 执行安装命令
```
composer require hug-code/php-tool @dev
```
