# PHP 版设计模式

> 🌹 一个使用 **PHP** 语言实现的设计模式实例。

[![Build Status](https://travis-ci.org/imajinyun/php-design-patterns.svg?branch=master)](https://travis-ci.org/imajinyun/php-design-patterns)
[![Build status](https://ci.appveyor.com/api/projects/status/lbf61giw9iavhtt5/branch/master?svg=true)](https://ci.appveyor.com/project/imajinyun/php-design-pattern/branch/master)
[![codecov](https://codecov.io/gh/imajinyun/php-design-patterns/branch/master/graph/badge.svg)](https://codecov.io/gh/imajinyun/php-design-patterns)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/imajinyun/php-design-patterns/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/imajinyun/php-design-patterns/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/imajinyun/php-design-patterns/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/imajinyun/php-design-patterns/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/imajinyun/php-design-patterns/badges/build.png?b=master)](https://scrutinizer-ci.com/g/imajinyun/php-design-patterns/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/imajinyun/php-design-patterns/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![StyleCI](https://styleci.io/repos/112085360/shield?branch=master)](https://styleci.io/repos/112085360)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/368998e20fe64b2da7f8ef1f42444527)](https://www.codacy.com/app/imajinyun/php-design-pattern?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=imajinyun/php-design-patterns&amp;utm_campaign=Badge_Grade)
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fimajinyun%2Fphp-design-pattern.svg?type=shield)](https://app.fossa.io/projects/git%2Bgithub.com%2Fimajinyun%2Fphp-design-pattern?ref=badge_shield)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/imajinyun/php-design-pattern.svg)](http://php.net/releases/)

## 安装 PHPUnit 测试扩展包

> [PHPUnit](https://phpunit.de/getting-started.html)

```bash
wget https://phar.phpunit.de/phpunit.phar
chmod +x phpunit.phar
sudo mv phpunit.phar /usr/local/bin/phpunit
phpunit --version
```

## 代码测试

```bash
git clone https://github.com/imajinyun/php-design-pattern.git
cd ./php-design-pattern
phpunit -v
```

## 结构型模式 - `Structural Pattern`

### [依赖注入 - `DependencyInjection`](src/Structural/DependencyInjection)

#### 定义

一个将行为从依赖中分离的技术, 简单地说, 它允许开发者定义一个方法函数依赖于外部其他各种交互, 而不需要编码如何获得这些外部交互的实例. 这样就在各种组件之间解耦, 从而获得干净的代码, 相比依赖的硬编码, 一个组件只有在运行时才调用其所需要的其他组件, 因此在代码运行时, 通过特定的框架或容器, 将其所需要的其他依赖组件进行注入, 主动推入. 依赖注入可以看成是控制反转(`Inversion of Control`)的一个特例. 依赖注入说白一点, 就是容器将某个类依赖的其他类注入到这个类中

#### 场景

- 高层次的模块不应该依赖于低层次的模块, 他们都应该依赖于抽象
- 抽象不应该依赖于具体实现, 具体实现应该依赖于抽象

#### 特性

##### 优点

- 代码解耦, 便于单元测试及 `Mock`
- 提供一种调控系统, 实现依赖解析的自动注入

##### 缺点

- `DI` 强制构建的分离还会使调试变得麻烦
- 并不能解决复用性问题, 反而引入了模块查找和构造的额外代价
- `DI` 要求集中管理依赖的所有实现, 那么 `Client` 引入你的工具库中任何一部分都必须首先构造整个 `IOC` 容器

### [外观 - `Facade`](src/Structural/Facade)

#### 定义

为子系统中的一组接口提供一个一致的界面, 外观模式定义了一个高层接口, 这个接口使得这一子系统更加容易使用

#### 场景

- 当要为一个复杂子系统提供一个简单接口时可以使用外观模式. 该接口可以满足大多数用户的需求, 而且用户也可以越过外观类直接访问子系统
- 客户程序与多个子系统之间存在很大的依赖性. 引入外观类将子系统与客户以及其他子系统解耦, 可以提高子系统的独立性和可移植性
- 在层次化结构中, 可以使用外观模式定义系统中每一层的入口, 层与层之间不直接产生联系, 而通过外观类建立联系, 降低层之间的耦合度

#### 特性

##### 优点

- 对客户屏蔽子系统组件, 减少了客户处理的对象数目并使得子系统使用起来更加容易. 通过引入外观模式, 客户代码将变得很简单, 与之关联的对象也很少
- 实现了子系统与客户之间的松耦合关系, 这使得子系统的组件变化不会影响到调用它的客户类, 只需要调整外观类即可
- 降低了大型软件系统中的编译依赖性, 并简化了系统在不同平台之间的移植过程, 因为编译一个子系统一般不需要编译所有其他的子系统. 一个子系统的修改对其他子系统没有任何影响, 而且子系统内部变化也不会影响到外观对象
- 只是提供了一个访问子系统的统一入口, 并不影响用户直接使用子系统类

##### 缺点

- 不能很好地限制客户使用子系统类, 如果对客户访问子系统类做太多的限制则减少了可变性和灵活性
- 在不引入抽象外观类的情况下, 增加新的子系统可能需要修改外观类或客户端的源代码, 违背了开闭原则

### [连贯接口 - `FluentInterface`](src/Structural/FluentInterface)

#### 定义

又称流接口或方法链, 实现一种面向对象的, 能提高代码可读性的 `API` 的方法

#### 场景

查询构建器

#### 特性

##### 优点

可以编写具有自然语言一样可读性的代码

##### 缺点

### [享元 - `Flyweight`](src/Structural/Flyweight)

#### 定义

使用共享物件, 以便有效的支持大量小颗粒对象, 用来尽可能减少内存使用量以及分享资讯给尽可能多的相似物件

#### 场景

- 一个系统有大量相同或者相似的对象, 由于这类对象的大量使用, 造成内存的大量耗费
- 对象的大部分状态都可以外部化, 可以将这些外部状态传入对象中
- 使用享元模式需要维护一个存储享元对象的享元池, 而这需要耗费资源, 因此, 应当在多次重复使用享元对象时才值得使用享元模式

#### 特性

##### 优点

- 享元模式的优点在于它可以极大减少内存中对象的数量, 使得相同对象或相似对象在内存中只保存一份
- 享元模式的外部状态相对独立, 而且不会影响其内部状态, 从而使得享元对象可以在不同的环境中被共享

##### 缺点

- 享元模式使得系统更加复杂, 需要分离出内部状态和外部状态, 这使得程序的逻辑复杂化
- 为了使对象可以共享, 享元模式需要将享元对象的状态外部化, 而读取外部状态使得运行时间变长

### [代理 - `Proxy`](src/Structural/Proxy)

#### 定义

为其他对象提供一个代理以控制对这个对象的访问

#### 场景

- 远程(`Remote`)代理: 为一个位于不同的地址空间的对象提供一个本地的代理对象, 这个不同的地址空间可以是在同一台主机中, 也可是在另一台主机中, 远程代理又叫做大使(`Ambassador`)
- 虚拟(`Virtual`)代理: 如果需要创建一个资源消耗较大的对象, 先创建一个消耗相对较小的对象来表示, 真实对象只在需要时才会被真正创建
- `Copy-on-Write` 代理: 它是虚拟代理的一种, 把复制(克隆)操作延迟到只有在客户端真正需要时才执行. 一般来说, 对象的深克隆是一个开销较大的操作, `Copy-on-Write` 代理可以让这个操作延迟, 只有对象被用到的时候才被克隆
- 保护(`Protect or Access`)代理: 控制对一个对象的访问, 可以给不同的用户提供不同级别的使用权限
- 缓冲(`Cache`)代理: 为某一个目标操作的结果提供临时的存储空间, 以便多个客户端可以共享这些结果
- 防火墙(`Firewall`)代理: 保护目标不让恶意用户接近
- 同步化(`Synchronization`)代理: 使几个用户能够同时使用一个对象而没有冲突
- 智能引用(`Smart Reference`)代理: 当一个对象被引用时, 提供一些额外的操作, 如将此对象被调用的次数记录下来等

#### 特性

##### 优点

- 代理模式能够协调调用者和被调用者, 在一定程度上降低了系统的耦合度
- 远程代理使得客户端可以访问在远程机器上的对象, 远程机器可能具有更好的计算性能与处理速度, 可以快速响应并处理客户端请求
- 虚拟代理通过使用一个小对象来代表一个大对象, 可以减少系统资源的消耗, 对系统进行优化并提高运行速度
- 保护代理可以控制对真实对象的使用权限

##### 缺点

- 由于在客户端和真实主题之间增加了代理对象, 因此 有些类型的代理模式可能会造成请求的处理速度变慢
- 实现代理模式需要额外的工作, 有些代理模式的实现非常复杂

## License
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fimajinyun%2Fphp-design-pattern.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2Fimajinyun%2Fphp-design-pattern?ref=badge_large)
