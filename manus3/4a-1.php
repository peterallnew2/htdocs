<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C 語言 第四章 詳細追蹤練習 (1/3)</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    <script>
    MathJax = {
      tex: {
        inlineMath: [['$', '$'], ['\\(', '\\)']],
        displayMath: [['$$', '$$'], ['\\[', '\\]']]
      }
    };
    </script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&family=Source+Code+Pro:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4a90e2;
            --background-color: #1e1e1e;
            --text-color: #dcdcdc;
            --header-color: #ffffff;
            --card-bg: #2d2d2d;
            --border-color: #444;
            --code-bg: #282c34;
            --success-color: #73c990;
            --error-color: #f47174;
            --font-body: 'Noto Sans TC', sans-serif;
            --font-code: 'Source Code Pro', monospace;
        }
        body {
            font-family: var(--font-body);
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.2;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .container {
            display: flex;
            max-width: 100%;
            height: 100vh;
            margin: 0 auto;
            padding: 0;
        }
        .tutorial-content {
            width: 70%;
            min-width: 350px;
            padding: 20px 40px;
            box-sizing: border-box;
            overflow-y: auto;
            height: 100vh;
        }
        .resizer {
            width: 8px;
            cursor: col-resize;
            background-color: var(--border-color);
            flex-shrink: 0;
            transition: background-color 0.2s;
        }
        .resizer:hover {
            background-color: var(--primary-color);
        }
        .interactive-panel {
            width: 30%;
            min-width: 400px;
            flex-grow: 1;
            position: relative;
            top: 0;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }
        h1, h2, h3 {
            color: var(--header-color);
            font-weight: 700;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }
        h1 { font-size: 2.2em; margin-bottom:20px;}
        h2 { font-size: 1.8em; margin-top: 30px; }
        h3 { font-size: 1.3em; margin-top: 25px; border-bottom: none; color:var(--primary-color); }
        p, ul {
            font-size: 1em;
            line-height: 1.7;
        }
        ul {
            list-style-type: disc;
            padding-left: 20px;
        }
        li {
            margin-bottom: 8px;
        }
        code:not(pre > code) {
            background-color: var(--card-bg);
            color: var(--primary-color);
            padding: 2px 6px;
            border-radius: 4px;
            font-family: var(--font-code);
        }
        pre {
            margin: 1em 0;
        }
        .explanation table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 15px;
            font-size: 0.9em;
            background-color: var(--code-bg);
        }
        .explanation th, .explanation td {
            border: 1px solid var(--border-color);
            padding: 8px 10px;
            text-align: left;
            vertical-align: top;
        }
        .explanation th {
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
        }
        .explanation td code {
             background-color: rgba(255,255,255,0.1);
             padding: 1px 4px;
        }
        .run-example-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-family: var(--font-body);
            font-weight: 500;
            transition: background-color 0.3s;
            margin-top: 5px;
            margin-bottom: 10px;
            font-size: 0.9em;
        }
        .run-example-btn:hover {
            background-color: #357ABD;
        }
        .sandbox-container {
            background-color: var(--card-bg);
            border-radius: 8px;
            padding: 15px;
            border: 1px solid var(--border-color);
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .interactive-panel-inner {
            display: flex;
            flex-direction: column;
            height: 100%;
            gap: 15px;
        }
        .sandbox-container h3 {
            margin-top: 0;
            color: var(--primary-color);
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 8px;
            font-size: 1.2em;
            flex-shrink: 0;
        }
        #code-editor {
            width: 100%;
            flex-grow: 1;
            background-color: var(--code-bg);
            color: var(--text-color);
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-family: var(--font-code);
            font-size: 0.9em;
            padding: 10px;
            box-sizing: border-box;
            resize: vertical;
            min-height: 150px;
        }
        .sandbox-controls {
            display: flex;
            justify-content: flex-end;
            padding: 8px 0;
            flex-shrink: 0;
        }
        #run-code-btn {
            background-color: var(--success-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        #run-code-btn:hover {
            background-color: #5aa777;
        }
        #run-code-btn:disabled {
            background-color: #555;
            cursor: not-allowed;
        }
        #output-area {
            background-color: #000;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
            font-family: var(--font-code);
            white-space: pre-wrap;
            word-wrap: break-word;
            min-height: 80px;
            margin-top: 8px;
            flex-shrink: 0;
            font-size: 0.85em;
            overflow-y: auto;
            max-height: 250px;
        }
        .quiz-section {
            margin-top: 30px;
            background-color: transparent;
            border: none;
            padding: 0;
        }
        .quiz-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            scroll-margin-top: 20px;
        }
        .quiz-card h3 {
            margin-top: 0;
            color: var(--header-color);
            font-size: 1.2em;
            border-bottom: 1px dashed var(--border-color);
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .quiz-options .option {
            display: block;
            background-color: #3c3c3c;
            margin: 8px 0;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.3s, background-color 0.3s;
            position: relative;
        }
        .quiz-options .option:hover {
            border-color: var(--primary-color);
        }
        .quiz-options .option.correct {
            border-color: var(--success-color);
            background-color: rgba(115, 201, 144, 0.15);
        }
        .quiz-options .option.incorrect {
            border-color: var(--error-color);
            background-color: rgba(244, 113, 116, 0.15);
        }
        .quiz-options .option.answered {
            cursor: default;
        }
        .quiz-options .option.answered:hover {
            border-color: currentColor;
        }
         .quiz-options .option.correct.answered:hover {
             border-color: var(--success-color);
        }
         .quiz-options .option.incorrect.answered:hover {
             border-color: var(--error-color);
        }
        .feedback-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.1em;
        }
        .explanation {
            display: none;
            margin-top: 15px;
            padding: 15px;
            background-color: rgba(0,0,0,0.1);
            border-radius: 5px;
            border: 1px solid var(--border-color);
            line-height: 1.6;
        }
        .explanation h4 {
            margin-top: 0;
            margin-bottom: 10px;
            color: var(--primary-color);
            font-size: 1.1em;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 5px;
        }
        .explanation ul, .explanation ol {
            padding-left: 20px;
            margin-bottom: 10px;
        }
        .explanation ul li::marker {
            color: var(--primary-color);
        }
        .next-btn-container {
            text-align: right;
            margin-top: 15px;
        }
        .next-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .next-btn:hover {
            background-color: #357ABD;
        }
    </style>
</head>
<body>
    <div class="container">
        <main class="tutorial-content">
            <h1>C 語言練習：第四章 詳細變數追蹤 (1/3)</h1>
            <p>本頁面提供 C 語言第四章（主要關於迴圈、條件判斷與綜合應用）的互動練習題。每個題目都旨在幫助您更深入地理解程式碼的執行流程。請仔細分析題目，並選擇您認為正確的答案。點擊選項後，該題的詳細解說將會顯示在右方的互動區塊中。對於涉及迴圈的題目，解說中會包含「變數變化追蹤表」，以視覺化方式呈現迴圈中各變數在每次迭代的變化情況。</p>
            <div class="quiz-section">
                <h2>第四章 互動練習題 - 詳細追蹤版 (題目 1-15)</h2>
                <p>請挑戰下面的題目，檢驗您的學習成果！點擊選項後，詳解將顯示於右方互動區。</p>
                <!-- QUIZ CARDS START -->
                <div id="q1" class="quiz-card">
                    <h3>1. 已知下列程式碼，則其中 Printout 總共執行幾次？</h3>
                    <pre><code class="language-c">k=6; do {Printout; k=k*2;} while (k&lt;100);</code></pre>
                    <button class="run-example-btn" data-code-id="q1-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 4</div>
                        <div class="option" data-option="B">(B) 5</div>
                        <div class="option" data-option="C">(C) 6</div>
                        <div class="option" data-option="D">(D) 7</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此題使用 <code>do-while</code> 迴圈。變數 <code>k</code> 的初始值為 6。迴圈首先執行一次動作（<code>Printout</code> 並將 <code>k</code> 乘以 2），然後檢查條件 <code>k &lt; 100</code> 是否成立。如果成立，則繼續下一輪迴圈。</p>
                        <table>
                            <thead>
                                <tr>
                                    <th>執行 Printout 次數</th>
                                    <th>迴圈開始前 k</th>
                                    <th>執行動作</th>
                                    <th>迴圈結束後 k</th>
                                    <th>條件檢查 (k &lt; 100)</th>
                                    <th>條件結果</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>-</td><td>6</td><td>-</td><td>-</td><td>-</td><td>(進入迴圈)</td></tr>
                                <tr><td>第 1 次</td><td>6</td><td>Printout; k = 6 * 2</td><td>12</td><td>12 &lt; 100</td><td>True</td></tr>
                                <tr><td>第 2 次</td><td>12</td><td>Printout; k = 12 * 2</td><td>24</td><td>24 &lt; 100</td><td>True</td></tr>
                                <tr><td>第 3 次</td><td>24</td><td>Printout; k = 24 * 2</td><td>48</td><td>48 &lt; 100</td><td>True</td></tr>
                                <tr><td>第 4 次</td><td>48</td><td>Printout; k = 48 * 2</td><td>96</td><td>96 &lt; 100</td><td>True</td></tr>
                                <tr><td>第 5 次</td><td>96</td><td>Printout; k = 96 * 2</td><td>192</td><td>192 &lt; 100</td><td>False (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>當 <code>k</code> 的值變為 192 時，條件 <code>192 &lt; 100</code> 為假，迴圈終止。因此，<code>Printout</code> 總共執行了 5 次。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q2">下一題</button></div>
                </div>

                <div id="q2" class="quiz-card">
                    <h3>2. 設 A 的值為 0000000，B 的值為 1000000，則經過(A OR B) AND (NOT B)運算後的結果為何？</h3>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) 0000000</div>
                        <div class="option" data-option="B">(B) 1111111</div>
                        <div class="option" data-option="C">(C) 1000000</div>
                        <div class="option" data-option="D">(D) 0111111</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路</h4>
                        <p>本題考查位元邏輯運算：OR、AND、NOT。</p>
                        <ol>
                            <li><b>A OR B：</b>
                                <pre><code class="language-text">  0000000 (A)
OR 1000000 (B)
----------
  1000000 (Result1)</code></pre>
                            </li>
                            <li><b>NOT B：</b> (假設為7位元反相)
                                <pre><code class="language-text">NOT 1000000 (B)
----------
    0111111 (Result2)</code></pre>
                            </li>
                            <li><b>(A OR B) AND (NOT B)</b> 即 Result1 AND Result2：
                                <pre><code class="language-text">  1000000 (Result1)
AND 0111111 (Result2)
----------
  0000000 (Final Result)</code></pre>
                            </li>
                        </ol>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (A)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q3">下一題</button></div>
                </div>

                <div id="q3" class="quiz-card">
                    <h3>3. 當下列程式片段執行完畢後，變數 count 的數值為何？</h3>
                    <pre><code class="language-c">int count=0;
for(int i=5; i&lt;=10; i=i+1)
  for(int j=1; j&lt;=i; j=j+1)
    for (int k=1; k&lt;=j; k=k+1)
      if (i==j) count=count+1;</code></pre>
                    <button class="run-example-btn" data-code-id="q3-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 50</div>
                        <div class="option" data-option="B">(B) 45</div>
                        <div class="option" data-option="C">(C) 30</div>
                        <div class="option" data-option="D">(D) 20</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式使用三層巢狀 <code>for</code> 迴圈。變數 <code>count</code> 只有在最內層迴圈且條件 <code>i == j</code> 成立時才會遞增。我們需要分析外層迴圈 <code>i</code> 和中層迴圈 <code>j</code> 的關係。</p>
                        <p>關鍵在於：當 <code>i == j</code> 時，最內層的 <code>k</code> 迴圈 (<code>for (int k=1; k&lt;=j; k=k+1)</code>) 會執行 <code>j</code> 次（也就是 <code>i</code> 次）。</p>
                        <table>
                            <thead>
                                <tr><th>外層 i</th><th>中層 j</th><th>條件 (i==j)</th><th>count 增加量 (j 次)</th><th>累計 count</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>5 (初始)</td><td>-</td><td>-</td><td>-</td><td>0</td></tr>
                                <tr><td>i=5</td><td>j=1 to 4</td><td>False</td><td>0</td><td>0</td></tr>
                                <tr><td></td><td>j=5</td><td>True</td><td>5 (k從1到5)</td><td>0 + 5 = 5</td></tr>
                                <tr><td>i=6</td><td>j=1 to 5</td><td>False</td><td>0</td><td>5</td></tr>
                                <tr><td></td><td>j=6</td><td>True</td><td>6 (k從1到6)</td><td>5 + 6 = 11</td></tr>
                                <tr><td>i=7</td><td>j=1 to 6</td><td>False</td><td>0</td><td>11</td></tr>
                                <tr><td></td><td>j=7</td><td>True</td><td>7 (k從1到7)</td><td>11 + 7 = 18</td></tr>
                                <tr><td>i=8</td><td>j=1 to 7</td><td>False</td><td>0</td><td>18</td></tr>
                                <tr><td></td><td>j=8</td><td>True</td><td>8 (k從1到8)</td><td>18 + 8 = 26</td></tr>
                                <tr><td>i=9</td><td>j=1 to 8</td><td>False</td><td>0</td><td>26</td></tr>
                                <tr><td></td><td>j=9</td><td>True</td><td>9 (k從1到9)</td><td>26 + 9 = 35</td></tr>
                                <tr><td>i=10</td><td>j=1 to 9</td><td>False</td><td>0</td><td>35</td></tr>
                                <tr><td></td><td>j=10</td><td>True</td><td>10 (k從1到10)</td><td>35 + 10 = 45</td></tr>
                            </tbody>
                        </table>
                        <p>因此，<code>count</code> 的最終值是 5 + 6 + 7 + 8 + 9 + 10 = 45。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q4">下一題</button></div>
                </div>

                <div id="q4" class="quiz-card">
                    <h3>4. 當下列程式片段執行完畢後，變數 x 的數值為何？</h3>
                    <pre><code class="language-c">int n=0; int x=0;
do {
  x += n;
  n++;
} while (n&lt;10);</code></pre>
                    <button class="run-example-btn" data-code-id="q4-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 50</div>
                        <div class="option" data-option="B">(B) 45</div>
                        <div class="option" data-option="C">(C) 30</div>
                        <div class="option" data-option="D">(D) 20</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式碼使用 <code>do-while</code> 迴圈計算從 0 到 9 的整數總和。變數 <code>x</code> 用於累加，<code>n</code> 作為計數器，從0開始遞增。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 n</th><th>執行 x += n</th><th>執行 n++</th><th>迴圈結束後 n</th><th>條件檢查 (n &lt; 10)</th><th>條件結果</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>0</td><td>x = 0 + 0 = 0</td><td>n = 1</td><td>1</td><td>1 &lt; 10</td><td>True</td></tr>
                                <tr><td>1</td><td>x = 0 + 1 = 1</td><td>n = 2</td><td>2</td><td>2 &lt; 10</td><td>True</td></tr>
                                <tr><td>2</td><td>x = 1 + 2 = 3</td><td>n = 3</td><td>3</td><td>3 &lt; 10</td><td>True</td></tr>
                                <tr><td>3</td><td>x = 3 + 3 = 6</td><td>n = 4</td><td>4</td><td>4 &lt; 10</td><td>True</td></tr>
                                <tr><td>4</td><td>x = 6 + 4 = 10</td><td>n = 5</td><td>5</td><td>5 &lt; 10</td><td>True</td></tr>
                                <tr><td>5</td><td>x = 10 + 5 = 15</td><td>n = 6</td><td>6</td><td>6 &lt; 10</td><td>True</td></tr>
                                <tr><td>6</td><td>x = 15 + 6 = 21</td><td>n = 7</td><td>7</td><td>7 &lt; 10</td><td>True</td></tr>
                                <tr><td>7</td><td>x = 21 + 7 = 28</td><td>n = 8</td><td>8</td><td>8 &lt; 10</td><td>True</td></tr>
                                <tr><td>8</td><td>x = 28 + 8 = 36</td><td>n = 9</td><td>9</td><td>9 &lt; 10</td><td>True</td></tr>
                                <tr><td>9</td><td>x = 36 + 9 = 45</td><td>n = 10</td><td>10</td><td>10 &lt; 10</td><td>False (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>當 <code>n</code> 增加到 10 時，<code>while</code> 條件 <code>(10 < 10)</code> 判斷為 false，迴圈結束。最終 <code>x</code> 的值是 0 到 9 的總和，即 45。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q5">下一題</button></div>
                </div>

                <div id="q5" class="quiz-card">
                    <h3>5. 下列程式碼，while 迴圈內 i = i ＊ i 被執行多少次？</h3>
                    <pre><code class="language-c">int i= 2; while (i &lt; 800) {i = i * i;}</code></pre>
                    <button class="run-example-btn" data-code-id="q5-code">運行示例</button>
                    <div class="quiz-options" data-correct="C">
                        <div class="option" data-option="A">(A) 2</div>
                        <div class="option" data-option="B">(B) 3</div>
                        <div class="option" data-option="C">(C) 4</div>
                        <div class="option" data-option="D">(D) 5</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式碼使用 <code>while</code> 迴圈。變數 <code>i</code> 的初始值為 2。在每次迴圈中，<code>i</code> 的值會變成其自身的平方 (<code>i = i * i</code>)。迴圈持續的條件是 <code>i < 800</code>。</p>
                        <table>
                            <thead>
                                <tr><th>執行 <code>i=i*i</code> 次數</th><th>迴圈開始前 i</th><th>條件檢查 (i &lt; 800)</th><th>條件結果</th><th>執行 i = i * i</th><th>迴圈結束後 i</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>-</td><td>2 (初始)</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>
                                <tr><td>第 1 次</td><td>2</td><td>2 &lt; 800</td><td>True</td><td>i = 2 * 2 = 4</td><td>4</td></tr>
                                <tr><td>第 2 次</td><td>4</td><td>4 &lt; 800</td><td>True</td><td>i = 4 * 4 = 16</td><td>16</td></tr>
                                <tr><td>第 3 次</td><td>16</td><td>16 &lt; 800</td><td>True</td><td>i = 16 * 16 = 256</td><td>256</td></tr>
                                <tr><td>第 4 次</td><td>256</td><td>256 &lt; 800</td><td>True</td><td>i = 256 * 256 = 65536</td><td>65536</td></tr>
                                <tr><td>-</td><td>65536</td><td>65536 &lt; 800</td><td>False</td><td>- (不執行)</td><td>65536 (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>當 <code>i</code> 的值變為 65536 時，條件 <code>65536 &lt; 800</code> 為假，迴圈終止。因此，敘述 <code>i = i * i</code> 總共執行了 4 次。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (C)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q6">下一題</button></div>
                </div>

                <div id="q6" class="quiz-card">
                    <h3>6. 下列程式，印出多少個 happy？</h3>
                    <pre><code class="language-c">int i = 1; // Corrected initialization
while (i &lt;= 10) puts("happy");</code></pre>
                    <button class="run-example-btn" data-code-id="q6-code">運行示例</button>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) 0</div>
                        <div class="option" data-option="B">(B) 1</div>
                        <div class="option" data-option="C">(C) 0</div>
                        <div class="option" data-option="D">(D) 無限個</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式碼片段初始化變數 <code>i</code> 為 1。接著進入一個 <code>while</code> 迴圈，條件是 <code>i &lt;= 10</code>。在迴圈體內，它會呼叫 <code>puts("happy")</code> 來印出 "happy"。</p>
                        <p>關鍵點在於，迴圈體內並沒有任何語句去修改變數 <code>i</code> 的值。因此，<code>i</code> 的值將永遠保持為 1。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 i</th><th>條件檢查 (i &lt;= 10)</th><th>條件結果</th><th>動作</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>1 (初始)</td><td>1 &lt;= 10</td><td>True</td><td>puts("happy")</td></tr>
                                <tr><td>1</td><td>1 &lt;= 10</td><td>True</td><td>puts("happy")</td></tr>
                                <tr><td>1</td><td>1 &lt;= 10</td><td>True</td><td>puts("happy")</td></tr>
                                <tr><td colspan="4" style="text-align:center;">... 此過程無限重複 ...</td></tr>
                            </tbody>
                        </table>
                        <p>由於 <code>i</code> 的值始終為 1，條件 <code>i &lt;= 10</code> 一直為真，導致迴圈無限執行下去，不斷印出 "happy"。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (D)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q7">下一題</button></div>
                </div>

                <div id="q7" class="quiz-card">
                    <h3>7. 下面 f( )函式執行後所回傳的值為何？</h3>
                    <pre><code class="language-c">int f(){
  int p=2;
  while(p&lt;2000){
    p=2*p;
  }
  return p;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q7-code">運行示例</button>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) 1023</div>
                        <div class="option" data-option="B">(B) 1024</div>
                        <div class="option" data-option="C">(C) 2047</div>
                        <div class="option" data-option="D">(D) 2048</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>函式 <code>f</code> 初始化整數變數 <code>p</code> 為 2。然後進入一個 <code>while</code> 迴圈，只要 <code>p < 2000</code>，迴圈就會執行，將 <code>p</code> 的值乘以 2。當條件不滿足時，迴圈結束，函式回傳 <code>p</code> 的最終值。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 p</th><th>條件檢查 (p &lt; 2000)</th><th>條件結果</th><th>執行 p = 2 * p</th><th>迴圈結束後 p</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>2 (初始)</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>
                                <tr><td>2</td><td>2 &lt; 2000</td><td>True</td><td>p = 2 * 2 = 4</td><td>4</td></tr>
                                <tr><td>4</td><td>4 &lt; 2000</td><td>True</td><td>p = 2 * 4 = 8</td><td>8</td></tr>
                                <tr><td>8</td><td>8 &lt; 2000</td><td>True</td><td>p = 2 * 8 = 16</td><td>16</td></tr>
                                <tr><td>16</td><td>16 &lt; 2000</td><td>True</td><td>p = 2 * 16 = 32</td><td>32</td></tr>
                                <tr><td>32</td><td>32 &lt; 2000</td><td>True</td><td>p = 2 * 32 = 64</td><td>64</td></tr>
                                <tr><td>64</td><td>64 &lt; 2000</td><td>True</td><td>p = 2 * 64 = 128</td><td>128</td></tr>
                                <tr><td>128</td><td>128 &lt; 2000</td><td>True</td><td>p = 2 * 128 = 256</td><td>256</td></tr>
                                <tr><td>256</td><td>256 &lt; 2000</td><td>True</td><td>p = 2 * 256 = 512</td><td>512</td></tr>
                                <tr><td>512</td><td>512 &lt; 2000</td><td>True</td><td>p = 2 * 512 = 1024</td><td>1024</td></tr>
                                <tr><td>1024</td><td>1024 &lt; 2000</td><td>True</td><td>p = 2 * 1024 = 2048</td><td>2048</td></tr>
                                <tr><td>2048</td><td>2048 &lt; 2000</td><td>False</td><td>- (不執行)</td><td>2048 (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>當 <code>p</code> 變為 2048 時，條件 <code>2048 &lt; 2000</code> 為假，迴圈結束。函式回傳 <code>p</code> 的值，即 2048。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (D)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q8">下一題</button></div>
                </div>

                <div id="q8" class="quiz-card">
                    <h3>8. 一個迴圈程式碼如下，其中 m = m / k 總共執行幾次？</h3>
                    <pre><code class="language-c">int k = 2; int m=10000; // Corrected initialization
do {
  m = m / k;
  k = k * 3;
} while (k&lt;120);</code></pre>
                    <button class="run-example-btn" data-code-id="q8-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 3 次</div>
                        <div class="option" data-option="B">(B) 4 次</div>
                        <div class="option" data-option="C">(C) 5 次</div>
                        <div class="option" data-option="D">(D) 6 次</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式碼使用 <code>do-while</code> 迴圈。變數 <code>k</code> 初始為 2，<code>m</code> 初始為 10000。迴圈體先執行一次，然後檢查條件 <code>k &lt; 120</code>。</p>
                        <table>
                            <thead>
                                <tr><th>執行 <code>m=m/k</code> 次數</th><th>迴圈開始前 k</th><th>迴圈開始前 m</th><th>執行 <code>m=m/k</code></th><th>執行 <code>k=k*3</code></th><th>迴圈結束後 k</th><th>條件 (k &lt; 120)</th><th>條件結果</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>-</td><td>2</td><td>10000</td><td>-</td><td>-</td><td>-</td><td>-</td><td>(進入迴圈)</td></tr>
                                <tr><td>第 1 次</td><td>2</td><td>10000</td><td>m = 10000 / 2 = 5000</td><td>k = 2 * 3 = 6</td><td>6</td><td>6 &lt; 120</td><td>True</td></tr>
                                <tr><td>第 2 次</td><td>6</td><td>5000</td><td>m = 5000 / 6 = 833</td><td>k = 6 * 3 = 18</td><td>18</td><td>18 &lt; 120</td><td>True</td></tr>
                                <tr><td>第 3 次</td><td>18</td><td>833</td><td>m = 833 / 18 = 46</td><td>k = 18 * 3 = 54</td><td>54</td><td>54 &lt; 120</td><td>True</td></tr>
                                <tr><td>第 4 次</td><td>54</td><td>46</td><td>m = 46 / 54 = 0</td><td>k = 54 * 3 = 162</td><td>162</td><td>162 &lt; 120</td><td>False (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>當 <code>k</code> 變為 162 時，條件 <code>162 &lt; 120</code> 為假，迴圈終止。因此，敘述 <code>m = m / k</code> 總共執行了 4 次。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q9">下一題</button></div>
                </div>

                <div id="q9" class="quiz-card">
                    <h3>9. 執行下列程式片段，請問最後 x 的值多少？</h3>
                    <pre><code class="language-c">int x = 50; int y = 90;
if (y&lt;95)
  if (y&lt;200) x = 30;
  else x =45;
// printf("x = %d", x); // Original code has printf, but question asks for x's value.
</code></pre>
                    <button class="run-example-btn" data-code-id="q9-code">運行示例</button>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) 30</div>
                        <div class="option" data-option="B">(B) 50</div>
                        <div class="option" data-option="C">(C) 45</div>
                        <div class="option" data-option="D">(D) 90</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路</h4>
                        <ol>
                            <li>變數初始化：<code>x = 50</code>，<code>y = 90</code>。</li>
                            <li>外層 <code>if</code> 條件：<code>(y < 95)</code> 即 <code>(90 < 95)</code>。此條件為真 (True)。</li>
                            <li>由於外層條件為真，程式進入內層 <code>if</code> 判斷。C 語言中，<code>else</code> 與最近的未配對 <code>if</code> 結合。在此，<code>else x = 45;</code> 與內層的 <code>if (y<200)</code> 配對。</li>
                            <li>內層 <code>if</code> 條件：<code>(y < 200)</code> 即 <code>(90 < 200)</code>。此條件為真 (True)。</li>
                            <li>由於內層條件為真，執行 <code>x = 30;</code>。變數 <code>x</code> 的值變為 30。</li>
                            <li>內層 <code>if</code> 的 <code>else</code> 部分 (<code>else x = 45;</code>) 不會被執行。</li>
                        </ol>
                        <p>最終 <code>x</code> 的值為 30。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (A)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q10">下一題</button></div>
                </div>

                <div id="q10" class="quiz-card">
                    <h3>10. 執行下列程式碼之後，請問最後 s 的值多少？</h3>
                    <pre><code class="language-c">int s = 0;
for (int i=2; i&lt;=100; i+=2) s+=i;
// printf("s = %d", s); // Original code has printf
</code></pre>
                    <button class="run-example-btn" data-code-id="q10-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 5500</div>
                        <div class="option" data-option="B">(B) 2550</div>
                        <div class="option" data-option="C">(C) 5050</div>
                        <div class="option" data-option="D">(D) 2500</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式碼使用 <code>for</code> 迴圈計算從 2 到 100 之間所有偶數的總和。變數 <code>s</code> 用於累加總和，迴圈變數 <code>i</code> 從 2 開始，每次增加 2，直到 <code>i</code> 超過 100。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈變數 i</th><th>條件 (i &lt;= 100)</th><th>條件結果</th><th>執行 s += i (目前 s 值)</th><th>迴圈後 s</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>2 (初始)</td><td>2 &lt;= 100</td><td>True</td><td>s = 0 + 2 = 2</td><td>2</td></tr>
                                <tr><td>4</td><td>4 &lt;= 100</td><td>True</td><td>s = 2 + 4 = 6</td><td>6</td></tr>
                                <tr><td>6</td><td>6 &lt;= 100</td><td>True</td><td>s = 6 + 6 = 12</td><td>12</td></tr>
                                <tr><td colspan="5" style="text-align:center;">... 繼續累加 ...</td></tr>
                                <tr><td>98</td><td>98 &lt;= 100</td><td>True</td><td>s = (sum of 2..96) + 98 = 2450</td><td>2450</td></tr>
                                <tr><td>100</td><td>100 &lt;= 100</td><td>True</td><td>s = 2450 + 100 = 2550</td><td>2550</td></tr>
                                <tr><td>102 (i+=2 後)</td><td>102 &lt;= 100</td><td>False</td><td>- (不執行)</td><td>2550 (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>這是一個等差數列求和：2 + 4 + ... + 100。
                        首項 a1 = 2，末項 an = 100，公差 d = 2。
                        項數 n = (an - a1)/d + 1 = (100 - 2)/2 + 1 = 98/2 + 1 = 49 + 1 = 50 項。
                        總和 S = n * (a1 + an) / 2 = 50 * (2 + 100) / 2 = 50 * 102 / 2 = 50 * 51 = 2550。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q11">下一題</button></div>
                </div>

                <div id="q11" class="quiz-card">
                    <h3>11. 執行下列程式後，請問最後 i 的值多少？</h3>
                    <pre><code class="language-c">int i;
for (i = 7; i &lt;= 72; i += 7)
  ; // 空迴圈敘述
// printf("i is %d", i); // Original code has printf
</code></pre>
                    <button class="run-example-btn" data-code-id="q11-code">運行示例</button>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) 77</div>
                        <div class="option" data-option="B">(B) 70</div>
                        <div class="option" data-option="C">(C) 72</div>
                        <div class="option" data-option="D">(D) 7</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式碼使用一個 <code>for</code> 迴圈，但迴圈體是一個空敘述 (僅有一個分號 <code>;</code>)。這表示迴圈的條件檢查和遞增部分會正常執行，但每次迭代時不會執行任何特定的動作。我們需要追蹤變數 <code>i</code> 的值。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 i</th><th>條件檢查 (i &lt;= 72)</th><th>條件結果</th><th>執行 i += 7</th><th>迴圈結束後 i</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>7 (初始)</td><td>7 &lt;= 72</td><td>True</td><td>i = 7 + 7 = 14</td><td>14</td></tr>
                                <tr><td>14</td><td>14 &lt;= 72</td><td>True</td><td>i = 14 + 7 = 21</td><td>21</td></tr>
                                <tr><td>21</td><td>21 &lt;= 72</td><td>True</td><td>i = 21 + 7 = 28</td><td>28</td></tr>
                                <tr><td>28</td><td>28 &lt;= 72</td><td>True</td><td>i = 28 + 7 = 35</td><td>35</td></tr>
                                <tr><td>35</td><td>35 &lt;= 72</td><td>True</td><td>i = 35 + 7 = 42</td><td>42</td></tr>
                                <tr><td>42</td><td>42 &lt;= 72</td><td>True</td><td>i = 42 + 7 = 49</td><td>49</td></tr>
                                <tr><td>49</td><td>49 &lt;= 72</td><td>True</td><td>i = 49 + 7 = 56</td><td>56</td></tr>
                                <tr><td>56</td><td>56 &lt;= 72</td><td>True</td><td>i = 56 + 7 = 63</td><td>63</td></tr>
                                <tr><td>63</td><td>63 &lt;= 72</td><td>True</td><td>i = 63 + 7 = 70</td><td>70</td></tr>
                                <tr><td>70</td><td>70 &lt;= 72</td><td>True</td><td>i = 70 + 7 = 77</td><td>77</td></tr>
                                <tr><td>77</td><td>77 &lt;= 72</td><td>False</td><td>- (不執行)</td><td>77 (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>當 <code>i</code> 的值變為 77 時，條件 <code>77 &lt;= 72</code> 為假，迴圈終止。<code>i</code> 的最終值為 77。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (A)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q15">下一題</button></div>
                </div>

                <div id="q15" class="quiz-card">
                    <h3>15. 布林代數式 A+A+A 等於：</h3>
                    <div class="quiz-options" data-correct="C">
                        <div class="option" data-option="A">(A) 3A</div>
                        <div class="option" data-option="B">(B) 2A</div>
                        <div class="option" data-option="C">(C) A</div>
                        <div class="option" data-option="D">(D) 1</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路</h4>
                        <p>本題考查布林代數的等冪律 (Idempotent Law) for OR operation。</p>
                        <p>在布林代數中，對於 OR 運算 (通常用 `+` 表示)：</p>
                        <ul>
                            <li><code>A + A = A</code></li>
                        </ul>
                        <p>我們可以逐步簡化表達式 <code>A+A+A</code>：</p>
                        <ol>
                            <li>將前兩項分組：<code>(A + A) + A</code></li>
                            <li>根據等冪律，<code>(A + A)</code> 等於 <code>A</code>。</li>
                            <li>所以表達式變為：<code>A + A</code></li>
                            <li>再次應用等冪律，<code>A + A</code> 等於 <code>A</code>。</li>
                        </ol>
                        <p>因此，<code>A+A+A = A</code>。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (C)</p>
                    </div>
                </div>
                <!-- QUIZ CARDS END -->
            </div>
        </main>
        <div class="resizer" id="resizer"></div>
        <aside class="interactive-panel">
            <div class="sandbox-container">
                <div class="interactive-panel-inner">
                    <h3>程式碼沙箱 (WASM)</h3>
                    <textarea id="code-editor" spellcheck="false"></textarea>
                    <div class="sandbox-controls">
                        <button id="run-code-btn">執行程式碼</button>
                    </div>
                    <h3>輸出結果</h3>
                    <div id="output-area">點擊「運行示例」或貼上您的程式碼，然後點擊「執行程式碼」。</div>
                </div>
            </div>
        </aside>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Resizer logic
            const resizer = document.getElementById('resizer');
            const leftPanel = document.querySelector('.tutorial-content');
            const rightPanelContainer = document.querySelector('.interactive-panel');

            let isResizing = false;

            resizer.addEventListener('mousedown', function (e) {
                isResizing = true;
                document.addEventListener('mousemove', handleMouseMove);
                document.addEventListener('mouseup', function () {
                    isResizing = false;
                    document.removeEventListener('mousemove', handleMouseMove);
                });
            });

            function handleMouseMove(e) {
                if (!isResizing) return;
                const containerRect = document.querySelector('.container').getBoundingClientRect();
                const leftPanelWidth = e.clientX - containerRect.left;
                const rightPanelWidth = containerRect.right - e.clientX;

                if (leftPanelWidth > 350 && rightPanelWidth > 400) {
                    leftPanel.style.width = leftPanelWidth + 'px';
                    rightPanelContainer.style.width = rightPanelWidth + 'px';
                }
            }

            // Quiz interaction logic
            const quizOptions = document.querySelectorAll('.quiz-options');
            const rightPanel = document.querySelector('.interactive-panel');

            quizOptions.forEach(optionsContainer => {
                const correctAnswer = optionsContainer.getAttribute('data-correct');
                const options = optionsContainer.querySelectorAll('.option');
                let isAnswered = false;

                options.forEach(option => {
                    option.addEventListener('click', function () {
                        if (isAnswered) return;
                        isAnswered = true;

                        const selectedOption = option.getAttribute('data-option');
                        const explanation = optionsContainer.nextElementSibling;

                        options.forEach(opt => opt.classList.add('answered'));

                        if (selectedOption === correctAnswer) {
                            option.classList.add('correct');
                            option.innerHTML += ' <span class="feedback-icon">✓</span>';
                        } else {
                            option.classList.add('incorrect');
                            option.innerHTML += ' <span class="feedback-icon">✗</span>';
                            // Highlight the correct answer
                            const correctOptionEl = optionsContainer.querySelector(`[data-option="${correctAnswer}"]`);
                            if (correctOptionEl) {
                                correctOptionEl.classList.add('correct');
                            }
                        }

                        if (explanation && explanation.classList.contains('explanation') && rightPanel) {
                            // Instead of showing inline, put content into the right panel.
                            rightPanel.innerHTML = `
                                <div class="sandbox-container">
                                    <div class="interactive-panel-inner" style="display: block; overflow-y: auto; padding: 5px 15px;">
                                        <div class="explanation" style="display: block; margin-top: 0; padding: 0; border: none; background: transparent;">
                                            ${explanation.innerHTML}
                                        </div>
                                    </div>
                                </div>
                            `;

                            // Re-run Prism and MathJax on the new content
                            Prism.highlightAllUnder(rightPanel);
                            if (window.MathJax && typeof MathJax.typesetPromise === 'function') {
                                MathJax.typesetPromise([rightPanel]);
                            }
                        }
                    });
                });
            });

            // Next button logic
            const nextButtons = document.querySelectorAll('.next-btn');
            nextButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const targetId = this.getAttribute('data-target');
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });

            // Code running logic
            const codeEditor = document.getElementById('code-editor');
            const runCodeBtn = document.getElementById('run-code-btn');
            const outputArea = document.getElementById('output-area');
            const runExampleBtns = document.querySelectorAll('.run-example-btn');

            const codeSnippets = {
                'q1-code': `k=6;\ndo {\n  printf("Printout\\n");\n  k=k*2;\n} while (k<100);`,
                'q3-code': `int count=0;\nfor(int i=5; i<=10; i=i+1)\n  for(int j=1; j<=i; j=j+1)\n    for (int k=1; k<=j; k=k+1)\n      if (i==j) count=count+1;\nprintf("count = %d\\n", count);`,
                'q4-code': `int n=0; int x=0;\ndo {\n  x += n;\n  n++;\n} while (n<10);\nprintf("x = %d\\n", x);`,
                'q5-code': `int i=2;\nwhile (i < 800) {\n  printf("i before: %d\\n", i);\n  i = i * i;\n  printf("i after: %d\\n", i);\n}`,
                'q6-code': `int i = 1;\nwhile (i <= 10) puts("happy");\n// This is an infinite loop`,
                'q7-code': `int p=2;\nwhile(p<2000){\n  p=2*p;\n}\nprintf("p = %d\\n", p);`,
                'q8-code': `int k = 2; int m=10000;\ndo {\n  printf("m=%d, k=%d -> ", m, k);\n  m = m / k;\n  k = k * 3;\n  printf("m=%d, k=%d\\n", m, k);\n} while (k<120);`,
                'q9-code': `int x = 50; int y = 90;\nif (y<95)\n  if (y<200) x = 30;\n  else x =45;\nprintf("x = %d\\n", x);`,
                'q10-code': `int s = 0;\nfor (int i=2; i<=100; i+=2) s+=i;\nprintf("s = %d\\n", s);`,
                'q11-code': `int i;\nfor (i = 7; i <= 72; i += 7)\n  ;\nprintf("i is %d\\n", i);`,
                'q15-code': `// Boolean algebra concept, not directly runnable C code for A+A+A=A.\n// This demonstrates the logic with integers (0 or 1)\nint a = 1; // Try with 0 or 1\nint result = a || a || a;\nprintf("A=%d, A+A+A=%d\\n", a, result);\na = 0;\nresult = a || a || a;\nprintf("A=%d, A+A+A=%d\\n", a, result);`
            };

            runExampleBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const codeId = this.getAttribute('data-code-id');
                    const snippet = codeSnippets[codeId];
                    const editor = document.getElementById('code-editor');
                    const output = document.getElementById('output-area');

                    if (snippet && editor && output) {
                        // Wrap in main function if not already present
                        if (!snippet.includes("int main")) {
                             editor.value = `#include <stdio.h>\n\nint main() {\n  ${snippet.replace(/\n/g, '\n  ')}\n  return 0;\n}`;
                        } else {
                             editor.value = snippet;
                        }
                        output.textContent = "程式碼已載入，請點擊「執行程式碼」。";
                    } else if (!editor || !output) {
                        alert("錯誤：找不到程式碼編輯器或輸出區域。詳解顯示後，程式碼沙箱將被替換。");
                    }
                });
            });

            // Add event listener to the body to handle clicks on the run button,
            // as the button might be dynamically removed and re-added.
            document.body.addEventListener('click', function(event) {
                if (event.target.id === 'run-code-btn') {
                    const output = document.getElementById('output-area');
                    if (output) {
                        output.textContent = "執行功能在此環境中為模擬狀態。\n您可以在本地C編譯器中運行以上程式碼以得到真實結果。";
                    }
                }
            });
        });
    </script>
</body>
</html>