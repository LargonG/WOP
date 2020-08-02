<div class="text">
  <h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="__0"></a>Сортировка пузырьком</h1>
  <p class="has-line-data" data-line-start="2" data-line-end="3">Что такое сортировка? Это процесс, в результате которого в какой-либо структуре данных элементы идут в определённом порядке. Например, в словаре сначала идут слова, первое слово которых начинается с более ранней буквы, чем у другого. Или когда дети в строю на уроках физкультуры стоят в порядке уменьшения роста, только сначала идут мальчики, а уже потом девочки. Так и здесь мы преследуем аналогичные цели: расставить что-то по определённым правилам.</p>
  <p class="has-line-data" data-line-start="4" data-line-end="5">Рассмотрим, например, массив чисел: [54, 2, 3, 24, 13]. Допустим, мы хотим его отсортировать в порядке возрастания, т.е. результатом работы будет: [2, 3, 13, 24, 54]. Для этого применим алгоритм сортировки пузырьком. Он работает за O(n^2).</p>
  <p class="has-line-data" data-line-start="6" data-line-end="7">Итак, как же работает данный алгоритм? Очень просто! Нам нужно n раз пройтись по массиву и локально сравнить соседние элементы. Это сработает из-за того, что за n шагов самый наименьший элемент будет стоять на самом первом месте, а самый наибольший - на последнем. И так с каждым.</p>
  <h2 class="code-line" data-line-start=8 data-line-end=9 ><a id="C_8"></a>C++</h2>
</div>

<pre><code class="has-line-data" data-line-start="10" data-line-end="33" class="language-c++"><span class="hljs-preprocessor">#<span class="hljs-keyword">include</span> <span class="hljs-string">&lt;bits/stdc++.h&gt;</span></span>

<span class="hljs-keyword">using</span> <span class="hljs-keyword">namespace</span> <span class="hljs-built_in">std</span>;

<span class="hljs-function"><span class="hljs-keyword">int</span> <span class="hljs-title">main</span><span class="hljs-params">()</span> </span>{
    <span class="hljs-keyword">int</span> n;
    <span class="hljs-built_in">cin</span> &gt;&gt; n;

    <span class="hljs-built_in">vector</span>&lt;<span class="hljs-keyword">int</span>&gt; v(n);
    <span class="hljs-keyword">for</span> (<span class="hljs-keyword">auto</span>&amp; x : v)
        <span class="hljs-built_in">cin</span> &gt;&gt; x;
    
    <span class="hljs-keyword">for</span> (<span class="hljs-keyword">int</span> i = <span class="hljs-number">0</span>; i &lt; n; ++i)
        <span class="hljs-keyword">for</span> (<span class="hljs-keyword">int</span> j = <span class="hljs-number">0</span>; j &lt; n - <span class="hljs-number">1</span>; ++j)
            <span class="hljs-keyword">if</span> (v[i] &gt; v[j])
                swap(v[i], v[j]);

    <span class="hljs-keyword">for</span> (<span class="hljs-keyword">const</span> <span class="hljs-keyword">auto</span>&amp; x : v)
        <span class="hljs-built_in">cout</span> &lt;&lt; x &lt;&lt; <span class="hljs-string">" "</span>;

    <span class="hljs-keyword">return</span> <span class="hljs-number">0</span>;
}
</code></pre>