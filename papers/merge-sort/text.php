<div class="text">
  <h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="_0"></a>Сортируй</h1>
  <p class="has-line-data" data-line-start="2" data-line-end="3">Сортируй, сортируй и ещё раз сортируй! Не ленись, это ведь так просто! Когда ты сортируешь, у тебя</p>
  <ol>
  <li class="has-line-data" data-line-start="3" data-line-end="4">Появляется время o(nlogn)</li>
  <li class="has-line-data" data-line-start="4" data-line-end="5">Элементы идут в каком-то порядке</li>
  <li class="has-line-data" data-line-start="5" data-line-end="7">Сортировать - это круто!</li>
  </ol>

  <blockquote>
  <p class="has-line-data" data-line-start="7" data-line-end="9">Сортировка - это важная часть олимпиадного программмирования, не стоит ей пренебрегать.<br>
  <strong>Самый лучший прогер на свете</strong></p>
  </blockquote>

  <h2 class="code-line" data-line-start=10 data-line-end=11 ><a id="C_10"></a>C++</h2>
</div>
<pre><code class="has-line-data" data-line-start="12" data-line-end="27" class="language-c++"><span class="hljs-preprocessor">#<span class="hljs-keyword">include</span> <span class="hljs-string">&lt;bits/stdc++.h&gt;</span></span>

<span class="hljs-keyword">using</span> <span class="hljs-keyword">namespace</span> <span class="hljs-built_in">std</span>;

<span class="hljs-function"><span class="hljs-keyword">int</span> <span class="hljs-title">main</span><span class="hljs-params">()</span> </span>{
    <span class="hljs-keyword">int</span> n; <span class="hljs-built_in">cin</span> &gt;&gt; n;
    <span class="hljs-built_in">vector</span>&lt;<span class="hljs-keyword">int</span>&gt; v(n);
    <span class="hljs-keyword">for</span> (<span class="hljs-keyword">auto</span>&amp; x : v) <span class="hljs-built_in">cin</span> &gt;&gt; x;
    sort(v.begin(), v.end());
    <span class="hljs-keyword">for</span> (<span class="hljs-keyword">const</span> <span class="hljs-keyword">auto</span>&amp; x : v)
        <span class="hljs-built_in">cout</span> &lt;&lt; x &lt;&lt; <span class="hljs-string">" "</span>;
    <span class="hljs-built_in">cout</span> &lt;&lt; <span class="hljs-string">"\n"</span>;
    <span class="hljs-keyword">return</span> <span class="hljs-number">0</span>;
}
</code></pre>
<div class="text">
  <h2 class="code-line" data-line-start=28 data-line-end=29 ><a id="Javascript_28"></a>Javascript</h2>
  <p class="has-line-data" data-line-start="30" data-line-end="31">Язык говно, лучше не пишите на нём</p>
</div>
