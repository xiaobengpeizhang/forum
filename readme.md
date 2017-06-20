# 基于laravel 5.2.31框架的社区论坛系统

## 更新日志

2017-06-17 

1. 创建user表和discussion表，并各填充30条测试数据
2. 利用bootstrap搭建前台布局页面
3. 创建路由，控制器，数据表模型并建立一对多关系
4. 在控制器中向视图传递模型数据参数

## 心得体会

1. 善用<code>php artisan</code>工具，能用命令行搞定的不用手工创建。

* <code>php artisan make:migration create_[tableName]_table -m</code> -> 创建数据表和相应的模型，<strong>务必一次搞定!!第二次删除重建时会报错！！</strong>
* <code>php artisan migrate</code>  -> 填充数据
* <code>php artisan make:controller</code> ->创建控制器
* <code>php artisan tinker</code> -> 数据库交互工具

2. 一次创建多条路由时候，可以用resource方法，并用命令行查看路由和控制器方法的对应关系。

* <code>Route::resource('article','articleController');</code>
* <code>php artisan route:list</code>

