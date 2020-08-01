<div class="text">
  <h2>Сортировка</h2>
  <p>Перед тем, как рассуждать, как сделать сортировку правильно и быстро, мы должны сначала понять, что это вообще такое. <br>
  Сортировка - это такой алгоритм, который позволяет отсортировать какую-то структуру данных. Так, это уже лучше, теперь надо понять, что называется отсортированным.
  Отсортированная структура данных - это такая структура данных, элементы которой расположены в каком-то заданном порядке, есть какое-то правило, по которому они сортируются.
  <br> Например массив [1, 7, 5, 3, 2] не отсортирован в подярке возрастания, а массив [1, 2, 3, 5, 7] - да.</p>
  <p>Итак мы разобрались с целью, теперь приступим к размышлению.</p>
  <h3>Сортировка <abbr title="Пузырьком её назвали в честь того, что элемент в процессе сортировки 'поднимается' наверх">"пузырьком"</abbr></h3>
  <h4>Алгоритм</h4>
  <p>N раз обходим массив, и если два подряд идущих элемента стоят <b>не</b> по порядку, меняем их местами.</p>
  <p>Скорость: O(n<sup>2</sup>)</p>
  <p>Память: O(1)</p>
  <h4>Доказательство</h4>
  <p>На самом деле тут всё банально просто. За 1 проход мы переместим 1 элемент в самый конец - это и будет являться тот элемент, который и должен там стоять => за n операций таких
  элементов будет n.</p>
  <h4>Пример (сортировка по возрастанию)</h4>
</div>

<div style="background: #222226; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><pre style="margin: 0; line-height: 125%"><span style="color: #75715e">#include &lt;bits/stdc++.h&gt;</span>
 
<span style="color: #66d9ef">using</span> <span style="color: #66d9ef">namespace</span> <span style="color: #f8f8f2">std;</span>
 
<span style="color: #66d9ef">int</span> <span style="color: #a6e22e">main</span><span style="color: #f8f8f2">()</span> <span style="color: #f8f8f2">{</span>
  <span style="color: #66d9ef">int</span> <span style="color: #f8f8f2">n;</span>
  <span style="color: #f8f8f2">cin</span> <span style="color: #f92672">&gt;&gt;</span> <span style="color: #f8f8f2">n;</span>
  <span style="color: #f8f8f2">vector</span><span style="color: #f92672">&lt;</span><span style="color: #66d9ef">int</span><span style="color: #f92672">&gt;</span> <span style="color: #f8f8f2">vect(n);</span>
  <span style="color: #66d9ef">for</span> <span style="color: #f8f8f2">(</span><span style="color: #66d9ef">int</span> <span style="color: #f92672">&amp;</span><span style="color: #f8f8f2">x</span> <span style="color: #f92672">:</span> <span style="color: #f8f8f2">vect)</span>
    <span style="color: #f8f8f2">cin</span> <span style="color: #f92672">&gt;&gt;</span> <span style="color: #f8f8f2">x;</span>
  <span style="color: #66d9ef">for</span> <span style="color: #f8f8f2">(</span><span style="color: #66d9ef">int</span> <span style="color: #f8f8f2">i</span> <span style="color: #f92672">=</span> <span style="color: #ae81ff">0</span><span style="color: #f8f8f2">;</span> <span style="color: #f8f8f2">i</span> <span style="color: #f92672">&lt;</span> <span style="color: #f8f8f2">n;</span> <span style="color: #f92672">++</span><span style="color: #f8f8f2">i)</span> <span style="color: #f8f8f2">{</span>
    <span style="color: #66d9ef">for</span> <span style="color: #f8f8f2">(</span><span style="color: #66d9ef">int</span> <span style="color: #f8f8f2">j</span> <span style="color: #f92672">=</span> <span style="color: #ae81ff">1</span><span style="color: #f8f8f2">;</span> <span style="color: #f8f8f2">j</span> <span style="color: #f92672">&lt;</span> <span style="color: #f8f8f2">n;</span> <span style="color: #f92672">++</span><span style="color: #f8f8f2">j)</span> <span style="color: #f8f8f2">{</span>
      <span style="color: #66d9ef">if</span> <span style="color: #f8f8f2">(vect[j</span> <span style="color: #f92672">-</span> <span style="color: #ae81ff">1</span><span style="color: #f8f8f2">]</span> <span style="color: #f92672">&gt;</span> <span style="color: #f8f8f2">vect[j])</span> <span style="color: #f8f8f2">{</span>
        <span style="color: #f8f8f2">swap(vect[j</span> <span style="color: #f92672">-</span> <span style="color: #ae81ff">1</span><span style="color: #f8f8f2">],</span> <span style="color: #f8f8f2">vect[j]);</span>
      <span style="color: #f8f8f2">}</span>
    <span style="color: #f8f8f2">}</span>
  <span style="color: #f8f8f2">}</span>
  <span style="color: #66d9ef">for</span> <span style="color: #f8f8f2">(</span><span style="color: #66d9ef">int</span> <span style="color: #f8f8f2">x</span> <span style="color: #f92672">:</span> <span style="color: #f8f8f2">vect)</span>
    <span style="color: #f8f8f2">cout</span> <span style="color: #f92672">&lt;&lt;</span> <span style="color: #f8f8f2">x</span> <span style="color: #f92672">&lt;&lt;</span> <span style="color: #e6db74">&quot; &quot;</span><span style="color: #f8f8f2">;</span>
  <span style="color: #66d9ef">return</span> <span style="color: #ae81ff">0</span><span style="color: #f8f8f2">;</span>
 
<span style="color: #f8f8f2">}</span>
</pre></div>
