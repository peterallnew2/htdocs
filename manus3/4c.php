<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C 語言 第四章 詳細追蹤練習 (3/3)</title>
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
            <h1>C 語言練習：第四章 詳細變數追蹤 (3/3)</h1>
            <p>本頁面提供 C 語言第四章（主要關於迴圈、條件判斷與綜合應用）的互動練習題。每個題目都旨在幫助您更深入地理解程式碼的執行流程。請仔細分析題目，並選擇您認為正確的答案。點擊選項後，將會顯示該題的詳細解說。對於涉及迴圈的題目，解說中會包含「變數變化追蹤表」，以視覺化方式呈現迴圈中各變數在每次迭代的變化情況。您可以利用右側的程式碼沙箱，執行或修改範例程式碼，以加強學習效果。</p>
            <div class="quiz-section">
                <h2>第四章 互動練習題 - 詳細追蹤版 (題目 31-44)</h2>
                <p>請挑戰下面的題目，檢驗您的學習成果！點擊選項後會顯示包含詳細追蹤過程的詳解。</p>
                <!-- QUIZ CARDS START -->
                <div id="q31" class="quiz-card">
                    <h3>31. 當執行下列程式碼並輸入一串數值 5 2 -1 10 後，請問輸出結果為？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int x=3, y=6, z=0;
  // Assuming inputs 5, 2, -1, 10 for z in sequence for scanf
  // For tracing, we'll manually set z based on the sequence
  // Iteration 1: z=5
  // Iteration 2: z=2
  // Iteration 3: z=-1
  // Iteration 4: z=10
  do{
    // scanf("%d", &z); // Placeholder for actual input
    x = x+z+y;
    y++;
  } while(z&lt;10);
  y *= 2;
  // printf("%3d%3d%3d",z,x,y); // Original code has printf
  return 0;
}</code></pre>
                    <p><sub>(註：右側沙箱不支援 `scanf`，您可以參考範例程式碼中模擬輸入的方式進行測試。)</sub></p>
                    <button class="run-example-btn" data-code-id="q31-code">運行示例</button>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) 10 49 20</div>
                        <div class="option" data-option="B">(B) 10 48 20</div>
                        <div class="option" data-option="C">(C) 10 45 18</div>
                        <div class="option" data-option="D">(D) 10 3 6</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式使用 <code>do-while</code> 迴圈。變數 <code>x</code>, <code>y</code>, <code>z</code> 的初始值分別為 3, 6, 0。假設模擬的 <code>scanf</code> 輸入的 <code>z</code> 值序列為 5, 2, -1, 10。</p>
                        <table>
                            <thead>
                                <tr><th>迭代</th><th>開始前 x</th><th>開始前 y</th><th>模擬輸入 z (scanf)</th><th>執行 x=x+z+y</th><th>執行 y++</th><th>結束時 x</th><th>結束時 y</th><th>結束時 z</th><th>條件 (z&lt;10)</th><th>條件結果</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>-</td><td>3</td><td>6</td><td>0 (初始)</td><td>-</td><td>-</td><td>3</td><td>6</td><td>0</td><td>-</td><td>(進入迴圈)</td></tr>
                                <tr><td>1</td><td>3</td><td>6</td><td>5</td><td>x = 3+5+6 = 14</td><td>y = 7</td><td>14</td><td>7</td><td>5</td><td>5 &lt; 10</td><td>True</td></tr>
                                <tr><td>2</td><td>14</td><td>7</td><td>2</td><td>x = 14+2+7 = 23</td><td>y = 8</td><td>23</td><td>8</td><td>2</td><td>2 &lt; 10</td><td>True</td></tr>
                                <tr><td>3</td><td>23</td><td>8</td><td>-1</td><td>x = 23+(-1)+8 = 30</td><td>y = 9</td><td>30</td><td>9</td><td>-1</td><td>-1 &lt; 10</td><td>True</td></tr>
                                <tr><td>4</td><td>30</td><td>9</td><td>10</td><td>x = 30+10+9 = 49</td><td>y = 10</td><td>49</td><td>10</td><td>10</td><td>10 &lt; 10</td><td>False (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>迴圈終止後：</p>
                        <ul>
                            <li><code>z</code> 的最後讀取值是 10。</li>
                            <li><code>x</code> 的值是 49。</li>
                            <li><code>y</code> 的值是 10。</li>
                        </ul>
                        <p>接著執行 <code>y *= 2;</code> => <code>y = 10 * 2 = 20</code>。</p>
                        <p>最終 <code>z</code>=10, <code>x</code>=49, <code>y</code>=20。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (A)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q32">下一題</button></div>
                </div>

                <div id="q32" class="quiz-card">
                    <h3>32. 執行下列程式碼之後，請問最後 sum 的值多少？</h3>
                    <pre><code class="language-c">int x=0; int sum=0;
while(x &lt;= 200){
  sum += x;
  x += 2;
}
// printf("sum=%d", sum); // Original code has printf
</code></pre>
                    <button class="run-example-btn" data-code-id="q32-code">運行示例</button>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) 2000</div>
                        <div class="option" data-option="B">(B) 2525</div>
                        <div class="option" data-option="C">(C) 5050</div>
                        <div class="option" data-option="D">(D) 10100</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式碼使用 <code>while</code> 迴圈計算從 0 開始，每次遞增 2（即所有偶數），直到 <code>x</code> 超過 200 時的總和。變數 <code>sum</code> 用於累加，<code>x</code> 從 0 開始。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 x</th><th>條件 (x &lt;= 200)</th><th>條件結果</th><th>執行 sum += x (目前 sum)</th><th>執行 x += 2</th><th>迴圈結束後 x</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>0 (初始)</td><td>0 &lt;= 200</td><td>True</td><td>sum = 0 + 0 = 0</td><td>x = 0 + 2 = 2</td><td>2</td></tr>
                                <tr><td>2</td><td>2 &lt;= 200</td><td>True</td><td>sum = 0 + 2 = 2</td><td>x = 2 + 2 = 4</td><td>4</td></tr>
                                <tr><td>4</td><td>4 &lt;= 200</td><td>True</td><td>sum = 2 + 4 = 6</td><td>x = 4 + 2 = 6</td><td>6</td></tr>
                                <tr><td colspan="6" style="text-align:center;">... 繼續累加 ...</td></tr>
                                <tr><td>198</td><td>198 &lt;= 200</td><td>True</td><td>sum = (sum of 0..196) + 198 = 9900</td><td>x = 198 + 2 = 200</td><td>200</td></tr>
                                <tr><td>200</td><td>200 &lt;= 200</td><td>True</td><td>sum = 9900 + 200 = 10100</td><td>x = 200 + 2 = 202</td><td>202</td></tr>
                                <tr><td>202</td><td>202 &lt;= 200</td><td>False</td><td>- (不執行)</td><td>202 (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>這是一個等差數列求和：0 + 2 + 4 + ... + 200。
                        首項 a1 = 0，末項 an = 200，公差 d = 2。
                        項數 N = (an - a1)/d + 1 = (200 - 0)/2 + 1 = 100 + 1 = 101 項。
                        總和 S = N * (a1 + an) / 2 = 101 * (0 + 200) / 2 = 101 * 200 / 2 = 101 * 100 = 10100。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (D)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q33">下一題</button></div>
                </div>

                <div id="q33" class="quiz-card">
                    <h3>33. 在下列的程式片段中，請問執行結果為何？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int a=1;
  while(++a&lt;5){
    printf("%d ", a);
  }
  // printf("\n"); // For clarity if run
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q33-code">運行示例</button>
                    <div class="quiz-options" data-correct="C">
                        <div class="option" data-option="A">(A) 1 2 3 4</div>
                        <div class="option" data-option="B">(B) 1 2 3 4 5</div>
                        <div class="option" data-option="C">(C) 2 3 4</div>
                        <div class="option" data-option="D">(D) 2 3 4 5</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>變數 <code>a</code> 初始值為 1。<code>while</code> 迴圈的條件是 <code>++a &lt; 5</code>，這裡使用了前置遞增運算子 (pre-increment)。這表示 <code>a</code> 會先加 1，然後才用新的值進行條件比較。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 a</th><th>執行 ++a (a 變為)</th><th>條件檢查 (新 a &lt; 5)</th><th>條件結果</th><th>動作 (printf a)</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>1 (初始)</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>
                                <tr><td>1</td><td>a = 2</td><td>2 &lt; 5</td><td>True</td><td>印出 "2 "</td></tr>
                                <tr><td>2</td><td>a = 3</td><td>3 &lt; 5</td><td>True</td><td>印出 "3 "</td></tr>
                                <tr><td>3</td><td>a = 4</td><td>4 &lt; 5</td><td>True</td><td>印出 "4 "</td></tr>
                                <tr><td>4</td><td>a = 5</td><td>5 &lt; 5</td><td>False</td><td>迴圈終止</td></tr>
                            </tbody>
                        </table>
                        <p>最終輸出為 "2 3 4 "。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (C)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q34">下一題</button></div>
                </div>

                <div id="q34" class="quiz-card">
                    <h3>34. 在下列的程式片段中，請問執行結果為何？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int a=1;
  while(a++&lt;5){
    printf("%d ", a);
  }
  // printf("\n"); // For clarity if run
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q34-code">運行示例</button>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) .1 2 3 4</div>
                        <div class="option" data-option="B">(B) .1 2 3 4 5</div>
                        <div class="option" data-option="C">(C) .2 3 4</div>
                        <div class="option" data-option="D">(D) .2 3 4 5</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>變數 <code>a</code> 初始值為 1。<code>while</code> 迴圈的條件是 <code>a++ &lt; 5</code>，這裡使用了後置遞增運算子 (post-increment)。這表示先使用 <code>a</code> 的當前值進行條件比較，然後才將 <code>a</code> 的值加 1。迴圈體內印出的是遞增後的 <code>a</code>。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 a</th><th>條件檢查 (舊 a &lt; 5)</th><th>條件結果</th><th>執行 a++ (a 變為)</th><th>動作 (printf 新 a)</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>1 (初始)</td><td>1 &lt; 5</td><td>True</td><td>a = 2</td><td>印出 "2 "</td></tr>
                                <tr><td>2</td><td>2 &lt; 5</td><td>True</td><td>a = 3</td><td>印出 "3 "</td></tr>
                                <tr><td>3</td><td>3 &lt; 5</td><td>True</td><td>a = 4</td><td>印出 "4 "</td></tr>
                                <tr><td>4</td><td>4 &lt; 5</td><td>True</td><td>a = 5</td><td>印出 "5 "</td></tr>
                                <tr><td>5</td><td>5 &lt; 5</td><td>False</td><td>a = 6 (仍執行遞增)</td><td>迴圈終止</td></tr>
                            </tbody>
                        </table>
                        <p>最終輸出為 "2 3 4 5 "。選項中的點 `.` 應為題目來源的筆誤。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (D)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q35">下一題</button></div>
                </div>

                <div id="q35" class="quiz-card">
                    <h3>35. 在下列的程式片段中，請問執行結果為何？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int a=1;
  do{
    printf("%d ", a);
  }while(++a&lt;5);
  // printf("\n"); // For clarity if run
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q35-code">運行示例</button>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) . 1 2 3 4</div>
                        <div class="option" data-option="B">(B) . 1 2 3 4 5</div>
                        <div class="option" data-option="C">(C) . 2 3 4</div>
                        <div class="option" data-option="D">(D) . 2 3 4 5</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>變數 <code>a</code> 初始值為 1。此為 <code>do-while</code> 迴圈，迴圈體至少執行一次。條件是 <code>++a &lt; 5</code> (前置遞增)。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 a</th><th>動作 (printf a)</th><th>執行 ++a (a 變為)</th><th>條件檢查 (新 a &lt; 5)</th><th>條件結果</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>1 (初始)</td><td>印出 "1 "</td><td>a = 2</td><td>2 &lt; 5</td><td>True</td></tr>
                                <tr><td>2</td><td>印出 "2 "</td><td>a = 3</td><td>3 &lt; 5</td><td>True</td></tr>
                                <tr><td>3</td><td>印出 "3 "</td><td>a = 4</td><td>4 &lt; 5</td><td>True</td></tr>
                                <tr><td>4</td><td>印出 "4 "</td><td>a = 5</td><td>5 &lt; 5</td><td>False (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>最終輸出為 "1 2 3 4 "。選項中的點 `.` 應為題目來源的筆誤。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (A)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q36">下一題</button></div>
                </div>

                <div id="q36" class="quiz-card">
                    <h3>36. 在下列的程式片段中，請問執行結果為何？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int a=1;
  do{
    printf("%d ", a);
  }while(a++&lt;5);
  // printf("\n"); // For clarity if run
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q36-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) . 1 2 3 4</div>
                        <div class="option" data-option="B">(B) . 1 2 3 4 5</div>
                        <div class="option" data-option="C">(C) . 2 3 4</div>
                        <div class="option" data-option="D">(D) . 2 3 4 5</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>變數 <code>a</code> 初始值為 1。此為 <code>do-while</code> 迴圈，迴圈體至少執行一次。條件是 <code>a++ &lt; 5</code> (後置遞增)。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 a</th><th>動作 (printf a)</th><th>條件檢查 (使用舊 a &lt; 5)</th><th>條件結果</th><th>執行 a++ (a 變為)</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>1 (初始)</td><td>印出 "1 "</td><td>1 &lt; 5</td><td>True</td><td>a = 2</td></tr>
                                <tr><td>2</td><td>印出 "2 "</td><td>2 &lt; 5</td><td>True</td><td>a = 3</td></tr>
                                <tr><td>3</td><td>印出 "3 "</td><td>3 &lt; 5</td><td>True</td><td>a = 4</td></tr>
                                <tr><td>4</td><td>印出 "4 "</td><td>4 &lt; 5</td><td>True</td><td>a = 5</td></tr>
                                <tr><td>5</td><td>印出 "5 "</td><td>5 &lt; 5</td><td>False</td><td>a = 6 (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>最終輸出為 "1 2 3 4 5 "。選項中的點 `.` 應為題目來源的筆誤。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q37">下一題</button></div>
                </div>

                <div id="q37" class="quiz-card">
                    <h3>37. 在下列的程式片段中，是利用輾轉相除法來求得 m 與 n 的最大公因數，請問迴圈內的敘述應該為何？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int m,n,r;
  // Assume m and n are read via scanf, e.g., m=48, n=18
  // m = 48; n = 18; // For tracing example
  r = m % n;
  while (r != 0){
    // MISSING LOGIC
  }
  // printf("GCD is %d\n", n);
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q37-code">運行示例</button>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A"><pre><code class='language-markup'>r = m % n;
m = n;
n = r;</code></pre></div>
                        <div class="option" data-option="B"><pre><code class='language-markup'>r = m % n;
n = r;
m = n;</code></pre></div>
                        <div class="option" data-option="C"><pre><code class='language-markup'>n = r;
m = n;
r = m % n;</code></pre></div>
                        <div class="option" data-option="D"><pre><code class='language-markup'>m = n;
n = r;
r = m % n;</code></pre></div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路：輾轉相除法 (Euclidean Algorithm)</h4>
                        <p>輾轉相除法的核心思想是：兩個整數的最大公因數 (GCD) 等於其中較小數與兩數相除餘數的 GCD。重複此過程直到餘數為 0，此時的除數即為原始兩數的 GCD。</p>
                        <p>程式碼中，<code>r = m % n;</code> 在迴圈外計算了第一次的餘數。<code>while (r != 0)</code> 條件表示只要餘數不為零，就繼續運算。</p>
                        <p>在迴圈內部，需要進行以下更新：</p>
                        <ol>
                            <li>原來的除數 <code>n</code> 變成新的被除數 (新的 <code>m</code>)。</li>
                            <li>原來的餘數 <code>r</code> (上一輪 <code>m % n</code> 的結果) 變成新的除數 (新的 <code>n</code>)。</li>
                            <li>然後計算新的餘數 <code>r</code> (用新的 <code>m</code> 和 <code>n</code>)，用於下一次迴圈條件的判斷。</li>
                        </ol>
                        <p>對照選項，選項 (D) <code>m = n; n = r; r = m % n;</code> 完全符合這個迭代步驟。</p>
                        <p><b>追蹤範例 (m=48, n=18):</b></p>
                        <p>初始： <code>m = 48</code>, <code>n = 18</code>. 迴圈外計算 <code>r = 48 % 18 = 12</code>.</p>
                        <table>
                            <thead><tr><th>迴圈開始前 m</th><th>迴圈開始前 n</th><th>迴圈開始前 r</th><th>條件 (r != 0)</th><th>執行 (D)</th><th>結束時 m</th><th>結束時 n</th><th>結束時 r</th></tr></thead>
                            <tbody>
                                <tr><td>48</td><td>18</td><td>12</td><td>12 != 0 (True)</td><td>m=18; n=12; r=18%12=6;</td><td>18</td><td>12</td><td>6</td></tr>
                                <tr><td>18</td><td>12</td><td>6</td><td>6 != 0 (True)</td><td>m=12; n=6; r=12%6=0;</td><td>12</td><td>6</td><td>0</td></tr>
                                <tr><td>12</td><td>6</td><td>0</td><td>0 != 0 (False)</td><td>迴圈終止</td><td>12</td><td>6</td><td>0</td></tr>
                            </tbody>
                        </table>
                        <p>迴圈終止後，<code>n</code> 的值為 6，這就是 48 和 18 的最大公因數。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (D)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q38">下一題</button></div>
                </div>

                <div id="q38" class="quiz-card">
                    <h3>38. 請問下列程式片段執行後，會印出什麼？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int x=2, y=0;
  for (y=1; y&lt;=30; y++){
    int z=y%6;
    if (z==0) x+=2;
  }
  // printf("%3d%3d", x, y); // Original code has printf
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q38-code">運行示例</button>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) 5 31</div>
                        <div class="option" data-option="B">(B) 15 31</div>
                        <div class="option" data-option="C">(C) 10 31</div>
                        <div class="option" data-option="D">(D) 12 31</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>變數 <code>x</code> 初始為 2。<code>for</code> 迴圈使變數 <code>y</code> 從 1 迭代到 30。在每次迭代中，如果 <code>y</code> 是 6 的倍數 (即 <code>y % 6 == 0</code>)，則 <code>x</code> 的值增加 2。</p>
                        <p><code>y</code> 是 6 的倍數的情況 (在 1 到 30 之間)：6, 12, 18, 24, 30。共有 5 次。</p>
                        <p>每次符合條件時 <code>x</code> 增加 2，所以 <code>x</code> 總共增加 <code>5 * 2 = 10</code>。
                        因此，<code>x</code> 的最終值為 <code>2 (初始值) + 10 = 12</code>。</p>
                        <p><code>for</code> 迴圈的執行：<code>y</code> 從 1 開始，條件是 <code>y &lt;= 30</code>。當 <code>y</code> 為 30 時，迴圈體執行，然後 <code>y++</code> 使 <code>y</code> 變為 31。下一輪條件檢查 <code>31 &lt;= 30</code> 為假，迴圈終止。</p>
                        <p>因此，在迴圈結束後，<code>x</code> 的值是 12，<code>y</code> 的值是 31。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (D)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q39">下一題</button></div>
                </div>

                <div id="q39" class="quiz-card">
                    <h3>39. 請問下列程式片段執行後，輸出的第 12 個數值是？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
#include &lt;stdbool.h&gt;
int main(){
  int p,d;
  bool flag;
  int prime_count = 0;
  int twelfth_prime_val = 0; // To store the 12th prime

  for (p=2; p&lt;=50; ++p){
    flag = true;
    for (d=2; d&lt;p; ++d) {
      if (p%d == 0) {
        flag=false;
        break;
      }
    }
    if (flag) {
      // printf("%i ", p); // Original code implies printing
      prime_count++;
      if (prime_count == 12) {
        twelfth_prime_val = p;
        // No break here, so it finds all primes up to 50
      }
    }
  }
  // The question asks for the 12th value *outputted*.
  // If twelfth_prime_val was printed, that would be it.
  // Assuming the question implies the 12th prime in the sequence generated.
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q39-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 31</div>
                        <div class="option" data-option="B">(B) 37</div>
                        <div class="option" data-option="C">(C) 41</div>
                        <div class="option" data-option="D">(D) 43</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路</h4>
                        <p>此程式碼片段的目的是找出並（概念上，如果 <code>printf</code> 被啟用）印出從 2 到 50 之間的所有質數。題目問的是輸出的第 12 個數值。</p>
                        <p>質數是只能被 1 和它本身整除的大於 1 的自然數。</p>
                        <p>外層迴圈 <code>for (p=2; p&lt;=50; ++p)</code> 迭代可能的質數候選者 <code>p</code>。</p>
                        <p>內層迴圈 <code>for (d=2; d&lt;p; ++d)</code> 檢查 <code>p</code> 是否能被 <code>d</code> (從 2 到 <code>p-1</code>) 整除。如果 <code>p % d == 0</code>，則 <code>p</code> 不是質數，<code>flag</code> 設為 <code>false</code>，並透過 <code>break</code> 提早跳出內層迴圈。</p>
                        <p>如果內層迴圈完成後 <code>flag</code> 仍為 <code>true</code>，則 <code>p</code> 是質數。程式會增加 <code>prime_count</code>。如果 <code>prime_count</code> 達到 12，則將該質數存入 <code>twelfth_prime_val</code>。</p>
                        <p>我們來列出 2 到 50 之間的質數，並計數：</p>
                        <ol>
                            <li>p=2, flag=true. prime_count=1.</li>
                            <li>p=3, flag=true. prime_count=2.</li>
                            <li>p=5, flag=true. prime_count=3.</li>
                            <li>p=7, flag=true. prime_count=4.</li>
                            <li>p=11, flag=true. prime_count=5.</li>
                            <li>p=13, flag=true. prime_count=6.</li>
                            <li>p=17, flag=true. prime_count=7.</li>
                            <li>p=19, flag=true. prime_count=8.</li>
                            <li>p=23, flag=true. prime_count=9.</li>
                            <li>p=29, flag=true. prime_count=10.</li>
                            <li>p=31, flag=true. prime_count=11.</li>
                            <li><b>p=37, flag=true. prime_count=12.</b> (twelfth_prime_val = 37)</li>
                            <li>p=41, flag=true. prime_count=13.</li>
                            <li>p=43, flag=true. prime_count=14.</li>
                            <li>p=47, flag=true. prime_count=15.</li>
                        </ol>
                        <p>因此，程式找到的第 12 個質數是 37。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q40">下一題</button></div>
                </div>

                <div id="q40" class="quiz-card">
                    <h3>40. 下列 cIc++程式片段之敘述，何者正確？</h3> <!-- Assuming cIc++ means C/C++ -->
                    <pre><code class="language-c">// Assuming C context with stdio.h for I/O
#include &lt;stdio.h&gt;
int main() {
  int a,b,c;
  // Original problem implies reading a and b, e.g. using cin or scanf
  // For C, this would be: scanf("%d %d", &a, &b);
  // Let's assume a=5, b=10 for demonstration.
  a = 5;
  b = 10;

  c=a; // c is now 5
  if (b>c) { // (10 > 5) is true
     c=b; // c becomes 10
  }
  // printf("the output is:%d\n", c); // c is 10 (the maximum of a and b)
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q40-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 找出輸入數值最小值</div>
                        <div class="option" data-option="B">(B) 找出輸入數值最大值</div>
                        <div class="option" data-option="C">(C) 輸入三個變數</div>
                        <div class="option" data-option="D">(D) 輸出結果為 the output is.c</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路</h4>
                        <p>此程式碼片段的目的是找出兩個（概念上）輸入的數值 <code>a</code> 和 <code>b</code> 中的最大值。</p>
                        <ol>
                            <li>宣告三個整數變數 <code>a</code>, <code>b</code>, <code>c</code>。</li>
                            <li>（假設）程式會讀取兩個整數值到 <code>a</code> 和 <code>b</code>。</li>
                            <li>將 <code>a</code> 的值賦給 <code>c</code>。所以 <code>c</code> 的初始值與 <code>a</code> 相同。</li>
                            <li>進行條件判斷 <code>if (b > c)</code>：
                                <ul>
                                    <li>如果 <code>b</code> 的值大於 <code>c</code>（也就是大於 <code>a</code> 的初始值），則將 <code>b</code> 的值賦給 <code>c</code>。此時 <code>c</code> 會儲存 <code>b</code> 的值。</li>
                                    <li>如果 <code>b</code> 的值不大於 <code>c</code>，則 <code>c</code> 的值（即 <code>a</code> 的值）保持不變。</li>
                                </ul>
                            </li>
                            <li>最終，<code>c</code> 會儲存 <code>a</code> 和 <code>b</code> 中較大的那個值。</li>
                        </ol>
                        <p>因此，此程式片段的功能是找出輸入的兩個數值中的最大值。</p>
                        <ul>
                            <li>(A) 不正確，程式是找最大值。</li>
                            <li>(C) 不正確，程式主要處理兩個輸入變數 <code>a</code> 和 <code>b</code>；<code>c</code> 用於儲存比較後的結果。</li>
                            <li>(D) 不正確，"the output is.c" 是一個檔案名稱的格式，不是 C 語言程式的輸出結果。</li>
                        </ul>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q41">下一題</button></div>
                </div>

                <div id="q41" class="quiz-card">
                    <h3>41. 在下列的程式片段中，中間的 13~16 行的 if 該如何寫，可以將 x， y， z 三個數由小到大排序？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int x, y, z;
  int temp;
  // Assume x, y, z are initialized, e.g., x=7, y=2, z=5 for testing
  // scanf("%d%d%d", &x, &y, &z);

  // Step 1: Ensure x &lt;= y
  if(x>y){
    temp = x; x = y; y = temp;
  }
  // At this point, x holds the smaller of original x and y.
  // y holds the larger of original x and y.

  // Step 2: (Lines 13-16) - The missing if block
  // This step should place z correctly relative to the current y.
  // We want to ensure y &lt;= z after this step.
  // Option (B): if (y > z) { temp = y; y = z; z = temp; }
  // This swaps y and z if y is larger, making y the smaller of (current y, current z)
  // and z the larger.

  // Step 3: Ensure x &lt;= y again
  // After step 2, z might have been swapped into y. This new y could be smaller than x.
  if (x>y){
    temp = x; x = y; y = temp;
  }
  // printf("%d %d %d\n", x, y, z);
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q41-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A"><pre><code class='language-markup'>if (x > z){
temp = x; x = z;
z = temp;
}</code></pre></div>
                        <div class="option" data-option="B"><pre><code class='language-markup'>if (y > z){
temp = y; y = z;
z = temp;
}</code></pre></div>
                        <div class="option" data-option="C"><pre><code class='language-markup'>if (x > y){
temp = x; x = y;
y = temp;
}</code></pre></div>
                        <div class="option" data-option="D"><pre><code class='language-markup'>if (z > x){
temp = z; z = x;
x = temp;
}</code></pre></div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路：三數排序 (簡易氣泡排序法變形)</h4>
                        <p>此程式的目標是透過一系列的比較和交換，將三個整數 <code>x</code>, <code>y</code>, <code>z</code> 由小到大排序。</p>
                        <ol>
                            <li><b>第一個 <code>if(x>y)</code> 區塊 (行 7-10):</b>
                                <p>此區塊確保執行後 <code>x &lt;= y</code>。如果原始 <code>x</code> 大於 <code>y</code>，則交換它們。</p>
                                <p><i>範例 (x=7, y=2, z=5):</i> <code>7 > 2</code> 為真，交換後 <code>x=2, y=7, z=5</code>。</p>
                            </li>
                            <li><b>中間遺失的 <code>if</code> 區塊 (行 13-16) - 選項 (B) <code>if (y > z) { temp = y; y = z; z = temp; }</code>:</b>
                                <p>此時我們有 <code>x &lt;= y</code>。這個區塊的目的是比較當前的 <code>y</code> 和 <code>z</code>。如果 <code>y > z</code>，則交換它們，確保執行後 <code>y &lt;= z</code>。</p>
                                <p><i>範例 (續上 x=2, y=7, z=5):</i> <code>y > z</code> (即 <code>7 > 5</code>) 為真。交換 <code>y</code> 和 <code>z</code>。
                                <br><code>temp = 7; y = 5; z = 7;</code>
                                <br>執行後狀態：<code>x=2, y=5, z=7</code>。</p>
                            </li>
                            <li><b>最後一個 <code>if(x>y)</code> 區塊 (行 18-22):</b>
                                <p>在前一步中，如果 <code>z</code> 原本比 <code>y</code> 小，它們會被交換，使得原來的 <code>z</code> 現在位於 <code>y</code> 的位置。這個新的 <code>y</code> 值（即原來的 <code>z</code>）有可能比 <code>x</code> 還要小。因此，需要再次比較 <code>x</code> 和 <code>y</code>。如果 <code>x > y</code>，則交換它們，以確保最小的值最終在 <code>x</code> 中。</p>
                                <p><i>範例 (續上 x=2, y=5, z=7):</i> <code>x > y</code> (即 <code>2 > 5</code>) 為假。不執行交換。</p>
                                <p>最終狀態：<code>x=2, y=5, z=7</code>，已排序。</p>
                            </li>
                        </ol>
                        <p>這個三步驟的過程能有效地將三個數排序。選項 (B) 是完成此排序邏輯的正確中間步驟。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q42">下一題</button></div>
                </div>

                <div id="q42" class="quiz-card">
                    <h3>42. 在下面的程式片段中 8~10 行，while 迴圈該如何撰寫，可以計算輸入的整數 n 每個位數的總和，例如輸入 1234，輸出 10。</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int n;
  int sum = 0;
  // scanf("%d", &n); // Assume n is initialized, e.g., n=1234

  // while( /* MISSING CONDITION AND BODY */ ){
  //
  // }

  // printf("%d\n", sum);
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q42-code">運行示例</button>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A"><pre><code class='language-markup'>while(n != 0){
n /= 10;
sum += n%10;
}</code></pre></div>
                        <div class="option" data-option="B"><pre><code class='language-markup'>while(n/10 != 0){
sum += n%10;
n /= 10;
}</code></pre></div>
                        <div class="option" data-option="C"><pre><code class='language-markup'>while(n != 0){
sum = n%10; // Error: sum is overwritten
n /= 10;
}</code></pre></div>
                        <div class="option" data-option="D"><pre><code class='language-markup'>while(n != 0){
sum += n%10;
n /= 10;
}</code></pre></div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路：計算各位數字之和</h4>
                        <p>要計算一個整數 <code>n</code> 的各位數字之和，我們通常使用取模 (<code>%</code>) 和整除 (<code>/</code>) 運算：</p>
                        <ol>
                            <li>取得 <code>n</code> 的最右邊（個位）數字：<code>digit = n % 10</code>。</li>
                            <li>將此數字加到總和 <code>sum</code>：<code>sum = sum + digit</code>。</li>
                            <li>移除 <code>n</code> 的最右邊數字：<code>n = n / 10</code> (整數除法)。</li>
                            <li>重複以上步驟，直到 <code>n</code> 變為 0 (表示所有位數都已處理)。</li>
                        </ol>
                        <p>分析選項：</p>
                        <ul>
                            <li><b>(A)</b> <code>n /= 10; sum += n%10;</code> - 錯誤。它先移除了 <code>n</code> 的個位數 (例如 1234 變成 123)，然後才用新的 <code>n</code> (123) 去取模 (123%10 = 3)，這會導致原始的個位數 (4) 被遺漏。</li>
                            <li><b>(B)</b> <code>while(n/10 != 0)</code> - 錯誤。如果 <code>n</code> 是個位數 (例如 <code>n=7</code>)，<code>n/10</code> 會是 0，迴圈條件 <code>0 != 0</code> 為假，迴圈一次都不會執行，導致這個個位數沒有被加總。它會在處理到只剩最高位數時提前終止。</li>
                            <li><b>(C)</b> <code>sum = n%10;</code> - 錯誤。這會用每個個位數去覆寫 <code>sum</code> 的值，而不是累加。最終 <code>sum</code> 只會是原始數字的最高位數 (因為迴圈最後一次迭代時 <code>n</code> 是最高位數)。</li>
                            <li><b>(D)</b> <code>while(n != 0){ sum += n%10; n /= 10; }</code> - 正確。
                                <ul>
                                    <li>迴圈條件 <code>n != 0</code> 確保所有位數都被處理，直到 <code>n</code> 變成0。</li>
                                    <li><code>sum += n%10;</code> 正確地將當前 <code>n</code> 的個位數累加到 <code>sum</code>。</li>
                                    <li><code>n /= 10;</code> 正確地移除 <code>n</code> 的個位數，為下一輪迭代做準備。</li>
                                </ul>
                            </li>
                        </ul>
                        <p><b>以 n=1234 追蹤選項 (D)：</b></p>
                        <table>
                            <thead><tr><th>迴圈開始前 n</th><th>迴圈開始前 sum</th><th>條件 (n != 0)</th><th>n % 10</th><th>sum += (n%10) (sum變為)</th><th>n /= 10 (n變為)</th></tr></thead>
                            <tbody>
                                <tr><td>1234</td><td>0</td><td>1234 != 0 (True)</td><td>4</td><td>0 + 4 = 4</td><td>123</td></tr>
                                <tr><td>123</td><td>4</td><td>123 != 0 (True)</td><td>3</td><td>4 + 3 = 7</td><td>12</td></tr>
                                <tr><td>12</td><td>7</td><td>12 != 0 (True)</td><td>2</td><td>7 + 2 = 9</td><td>1</td></tr>
                                <tr><td>1</td><td>9</td><td>1 != 0 (True)</td><td>1</td><td>9 + 1 = 10</td><td>0</td></tr>
                                <tr><td>0</td><td>10</td><td>0 != 0 (False)</td><td colspan="3">- (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (D)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q43">下一題</button></div>
                </div>

                <div id="q43" class="quiz-card">
                    <h3>43. 有關下面 c 程式片段之描述，int k=10， while (k==0) k=k-1， 何者正確？</h3>
                    <div class="quiz-options" data-correct="C">
                        <div class="option" data-option="A">(A) 迴圈內程式，被執行 1 次</div>
                        <div class="option" data-option="B">(B) 迴圈內程式，會被一直執行</div>
                        <div class="option" data-option="C">(C) 迴圈內程式，1 次也不會被執行</div>
                        <div class="option" data-option="D">(D) 迴圈內程式，被執行 10 次</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路</h4>
                        <ol>
                            <li>變數初始化：<code>int k=10;</code>。</li>
                            <li><code>while</code> 迴圈條件檢查：<code>(k==0)</code>.
                                <ul>
                                    <li>將 <code>k</code> 的當前值 (10) 與 0 比較：<code>(10 == 0)</code>。</li>
                                    <li>此條件為假 (False)，因為 10 不等於 0。</li>
                                </ul>
                            </li>
                            <li>由於迴圈條件一開始就為假，迴圈體 <code>k=k-1;</code> 一次也不會被執行。</li>
                        </ol>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (C)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q44">下一題</button></div>
                </div>

                <div id="q44" class="quiz-card">
                    <h3>44. 請問下面 c 程式中，printf("\n")共被執灖幾次？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main() {
  for (int i=1; i&lt;=4; i++){
    for (int j=1; j&lt;5; j++)
      printf("*");
    printf("\n");
  }
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q44-code">運行示例</button>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) 4</div>
                        <div class="option" data-option="B">(B) 5</div>
                        <div class="option" data-option="C">(C) 8</div>
                        <div class="option" data-option="D">(D) 16</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路</h4>
                        <p>此程式碼包含一個巢狀迴圈結構。</p>
                        <ul>
                            <li><b>外層迴圈：</b><code>for (int i=1; i&lt;=4; i++)</code>。這個迴圈會執行 4 次 (當 <code>i</code> 分別為 1, 2, 3, 4 時)。</li>
                            <li><b>內層迴圈：</b><code>for (int j=1; j&lt;5; j++)</code>。這個迴圈會執行 4 次 (當 <code>j</code> 分別為 1, 2, 3, 4 時)。</li>
                            <li><b><code>printf("\n");</code> 的位置：</b>這個敘述位於外層迴圈之內，但在內層迴圈之外。</li>
                        </ul>
                        <p>執行流程如下：</p>
                        <ol>
                            <li><code>i=1</code>: 內層迴圈執行4次 (印出 "****")，然後執行一次 <code>printf("\n")</code>。</li>
                            <li><code>i=2</code>: 內層迴圈執行4次 (印出 "****")，然後執行一次 <code>printf("\n")</code>。</li>
                            <li><code>i=3</code>: 內層迴圈執行4次 (印出 "****")，然後執行一次 <code>printf("\n")</code>。</li>
                            <li><code>i=4</code>: 內層迴圈執行4次 (印出 "****")，然後執行一次 <code>printf("\n")</code>。</li>
                        </ol>
                        <p>因此，<code>printf("\n")</code> 敘述的執行次數與外層迴圈的執行次數相同，總共為 4 次。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (A)</p>
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
        // All the JavaScript logic from 4.php
        document.addEventListener('DOMContentLoaded', function () {
            // Resizer logic
            const resizer = document.getElementById('resizer');
            const leftPanel = document.querySelector('.tutorial-content');
            const rightPanel = document.querySelector('.interactive-panel');

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
                    rightPanel.style.width = rightPanelWidth + 'px';
                }
            }

            // Quiz interaction logic
            const quizOptions = document.querySelectorAll('.quiz-options');
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
                            const correctOptionEl = optionsContainer.querySelector(`[data-option="${correctAnswer}"]`);
                            if (correctOptionEl) {
                                correctOptionEl.classList.add('correct');
                            }
                        }

                        if (explanation && explanation.classList.contains('explanation')) {
                            explanation.style.display = 'block';
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
                'q31-code': `int x=3, y=6, z=0; int inputs[] = {5, 2, -1, 10}; int i = 0; do{ z = inputs[i++]; x = x+z+y; y++; } while(z<10); y *= 2; printf("%3d%3d%3d\\n",z,x,y);`,
                'q32-code': `int x=0; int sum=0; while(x <= 200){ sum += x; x += 2; } printf("sum=%d\\n", sum);`,
                'q33-code': `int a=1; while(++a<5){ printf("%d ", a); } printf("\\n");`,
                'q34-code': `int a=1; while(a++<5){ printf("%d ", a); } printf("\\n");`,
                'q35-code': `int a=1; do{ printf("%d ", a); }while(++a<5); printf("\\n");`,
                'q36-code': `int a=1; do{ printf("%d ", a); }while(a++<5); printf("\\n");`,
                'q37-code': `int m=48, n=18, r; r = m % n; while (r != 0){ m = n; n = r; r = m % n; } printf("GCD is %d\\n", n);`,
                'q38-code': `int x=2, y=0; for (y=1; y<=30; y++){ int z=y%6; if (z==0) x+=2; } printf("%3d%3d\\n", x, y);`,
                'q39-code': `int p,d; int flag; int prime_count = 0; for (p=2; p<=50; ++p){ flag = 1; for (d=2; d<p; ++d) { if (p%d == 0) { flag=0; break; } } if (flag) { printf("%d ", p); prime_count++; } } printf("\\nFound %d primes.\\n", prime_count);`,
                'q40-code': `int a=5, b=10, c; c=a; if (b>c) { c=b; } printf("the output is:%d\\n", c);`,
                'q41-code': `int x=7, y=2, z=5; int temp; if(x>y){ temp = x; x = y; y = temp; } if (y > z){ temp = y; y = z; z = temp; } if (x>y){ temp = x; x = y; y = temp; } printf("%d %d %d\\n", x, y, z);`,
                'q42-code': `int n=1234, sum=0; while(n != 0){ sum += n%10; n /= 10; } printf("%d\\n", sum);`,
                'q44-code': `for (int i=1; i<=4; i++){ for (int j=1; j<5; j++) printf("*"); printf("\\n"); }`
            };

            runExampleBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const codeId = this.getAttribute('data-code-id');
                    const snippet = codeSnippets[codeId];
                    if (snippet) {
                        if (!snippet.includes("int main")) {
                             codeEditor.value = `#include <stdio.h>\n\nint main() {\n  ${snippet.replace(/\n/g, '\n  ')}\n  return 0;\n}`;
                        } else {
                             codeEditor.value = snippet;
                        }
                        outputArea.textContent = "程式碼已載入，請點擊「執行程式碼」。";
                    }
                });
            });

            runCodeBtn.addEventListener('click', function() {
                outputArea.textContent = "執行功能在此環境中為模擬狀態。\n您可以在本地C編譯器中運行以上程式碼以得到真實結果。";
            });
        });
    </script>
</body>
</html>