# Сортируй

Сортируй, сортируй и ещё раз сортируй! Не ленись, это ведь так просто! Когда ты сортируешь, у тебя
1. Появляется время o(nlogn)
2. Элементы идут в каком-то порядке
3. Сортировать - это круто!

> Сортировка - это важная часть олимпиадного программмирования, не стоит ей пренебрегать.
> **Самый лучший прогер на свете**

Для сортировки за время O(NlogN) можно пользоваться функцией std::sort(). У этой функции есть 2 параметра:
1. Итератор начала вектора
2. Итератор, следующий за концом вектора
Данная функция отсортирует вектор по неубыванию в диапазоне, который вы сообщите ей при помощи итераторов.
## C++
```c++
#include <bits/stdc++.h>

using namespace std;

int main() {
    int n; cin >> n;
    vector<int> v(n);
    for (auto& x : v) cin >> x;
    sort(v.begin(), v.end());
    for (const auto& x : v)
        cout << x << " ";
    cout << "\n";
    return 0;
}
```

Этой функцией можно также пользоваться и в обычных массивах, только вместо итераторов, нужно передать в функцию указатели на начало и элемент за концом массива.

## C++
```c++
#include <bits/stdc++.h>

using namespace std;

int main() {
    int n; cin >> n;
    int arr[n];
    for (int i = 0; i < n; ++i) cin >> arr[i];
    sort(arr, arr + n);
    for (int i = 0; i < n; ++i) cout << arr[i] << " ";
    cout << "\n";
    return 0;
}
```

## Компаратор для std::sort()
**Компаратор** - это специальная функция, которая передается как третий параметр в std::sort(). Эта функция должна возвращать *true* или *false* в зависимости от того, в правильном ли порядке стоят соседние элементы или нет (если стоят как нам надо, возвращает *true*, иначе *false*). Поясним на примере: имеем какой-то вектор целых чисел **v**. Чтобы отсортировать массив не в порядке неубывания, а например невозрастания, функция должна быть такой:
## C++
```c++
bool comp(int a, int b)
{
    return a > b;
}
```
Соответственно, функция std::sort() Будет вызваться так:

## C++
```c++
std::sort(v.begin(), v.end(), comp);
```
Обратите внимание, что функция-компаратор обязательно должна принимать 2 значения, возвращать *bool*, как упоминалось раннее, и передается она в std::sort() без скобочек. Эту функцию также можно заменить лямбда-выражением, записав его как третий параметр функции.
## C++
```c++
std::sort(v.begin(), v.end(), [](int a, int b) {return a > b;});
```
Для закрепления, пример программы, которая сортирует числа в массиве не по их значения, а по модулю, независимо от знака.
## C++
```c++
#include <bits/stdc++.h>

using namespace std;

int main() {
    int n; cin >> n;
    vector<int> v(n);
    for (auto& x : v) cin >> x;
    sort(v.begin(), v.end(), [](int a, int b) {return abs(a) < abs(b);});
    for (const auto& x : v)
        cout << x << " ";
    cout << "\n";
    return 0;
}
```

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [dill]: <https://github.com/joemccann/dillinger>
   [git-repo-url]: <https://github.com/joemccann/dillinger.git>
   [john gruber]: <http://daringfireball.net>
   [df1]: <http://daringfireball.net/projects/markdown/>
   [markdown-it]: <https://github.com/markdown-it/markdown-it>
   [Ace Editor]: <http://ace.ajax.org>
   [node.js]: <http://nodejs.org>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [@tjholowaychuk]: <http://twitter.com/tjholowaychuk>
   [express]: <http://expressjs.com>
   [AngularJS]: <http://angularjs.org>
   [Gulp]: <http://gulpjs.com>

   [PlDb]: <https://github.com/joemccann/dillinger/tree/master/plugins/dropbox/README.md>
   [PlGh]: <https://github.com/joemccann/dillinger/tree/master/plugins/github/README.md>
   [PlGd]: <https://github.com/joemccann/dillinger/tree/master/plugins/googledrive/README.md>
   [PlOd]: <https://github.com/joemccann/dillinger/tree/master/plugins/onedrive/README.md>
   [PlMe]: <https://github.com/joemccann/dillinger/tree/master/plugins/medium/README.md>
   [PlGa]: <https://github.com/RahulHP/dillinger/blob/master/plugins/googleanalytics/README.md>
