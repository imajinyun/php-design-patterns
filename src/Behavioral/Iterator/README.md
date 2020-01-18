## 迭代器 - `Iterator`

### 定义

提供一种方法顺序访问一个聚合对象中各个元素，而又不需暴露该对象的内部表示。

### 场景

* 访问一个聚合对象的内容而无须暴露它的内部表示。
* 需要为聚合对象提供多种遍历方式。
* 为遍历不同的聚合结构提供一个统一的接口。

### 特性

#### 优点

* 简化了遍历方式，对于对象集合的遍历，还是比较麻烦的，对于数组或者有序列表，我们尚可以通过游标来取得，但用户需要在对集合了解很清楚的前提下，自行遍历对象，但是对于 hash 表来说，用户遍历起来就比较麻烦了. 而引入了迭代器方法后，用户用起来就简单的多了。
* 可以提供多种遍历方式，比如说对有序列表，我们可以根据需要提供正序遍历，倒序遍历两种迭代器，用户用起来只需要得到我们实现好的迭代器，就可以方便的对集合进行遍历了。
* 封装性良好，用户只需要得到迭代器就可以遍历，而对于遍历算法则不用去关心。

#### 缺点

* 对于比较简单的遍历（ 像数组或者有序列表），使用迭代器方式遍历较为繁琐，像 ArrayList 我们宁可愿意使用 for 循环和 get 方法来遍历集合。
* 由于迭代器模式将存储数据和遍历数据的职责分离，增加新的聚合类需要对应增加新的迭代器类，类的个数成对增加，这在一定程度上增加了系统的复杂性。