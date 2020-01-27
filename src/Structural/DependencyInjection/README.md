## 依赖注入 - `DependencyInjection`

### 定义

一个将行为从依赖中分离的技术，简单地说，它允许开发者定义一个方法函数依赖于外部其他各种交互，而不需要编码如何获得这些外部交互的实例。这样就在各种组件之间解耦，从而获得干净的代码，相比依赖的硬编码，一个组件只有在运行时才调用其所需要的其他组件，因此在代码运行时，通过特定的框架或容器，将其所需要的其他依赖组件进行注入，主动推入。依赖注入可以看成是控制反转（`Inversion of Control`）的一个特例。依赖注入说白一点，就是容器将某个类依赖的其他类注入到这个类中。

### 场景

* 高层次的模块不应该依赖于低层次的模块，他们都应该依赖于抽象。
* 抽象不应该依赖于具体实现，具体实现应该依赖于抽象。

### 特性

#### 优点

* 代码解耦，便于单元测试及 `Mock`。
* 提供一种调控系统，实现依赖解析的自动注入。

#### 缺点

* `DI` 强制构建的分离还会使调试变得麻烦。
* 并不能解决复用性问题，反而引入了模块查找和构造的额外代价。
* `DI` 要求集中管理依赖的所有实现，那么 `Client` 引入你的工具库中任何一部分都必须首先构造整个 `IoC` 容器。