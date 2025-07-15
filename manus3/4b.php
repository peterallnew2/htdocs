<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C 語言 第四章 詳細追蹤練習 (2/3)</title>
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
            <h1>C 語言練習：第四章 詳細變數追蹤 (2/3)</h1>
            <p>本頁面提供 C 語言第四章（主要關於迴圈、條件判斷與綜合應用）的互動練習題。每個題目都旨在幫助您更深入地理解程式碼的執行流程。請仔細分析題目，並選擇您認為正確的答案。點擊選項後，將會顯示該題的詳細解說。對於涉及迴圈的題目，解說中會包含「變數變化追蹤表」，以視覺化方式呈現迴圈中各變數在每次迭代的變化情況。您可以利用右側的程式碼沙箱，執行或修改範例程式碼，以加強學習效果。</p>
            <div class="quiz-section">
                <h2>第四章 互動練習題 - 詳細追蹤版 (題目 16-30)</h2>
                <p>請挑戰下面的題目，檢驗您的學習成果！點擊選項後會顯示包含詳細追蹤過程的詳解。</p>
                <!-- QUIZ CARDS START -->
                <div id="q16" class="quiz-card">
                    <h3>16. 一個迴圈程式碼： k = 10000， while (k >=2) { k=k/8， } 其中 k=k/8 總共會執行幾次？</h3>
                    <pre><code class="language-c">/* Conceptual code:
int k = 10000;
int count = 0;
while (k >= 2) {
    k = k / 8; // Integer division
    count++;
}
*/</code></pre>
                    <button class="run-example-btn" data-code-id="q16-code">運行示例</button>
                    <div class="quiz-options" data-correct="C">
                        <div class="option" data-option="A">(A) 3 次</div>
                        <div class="option" data-option="B">(B) 4 次</div>
                        <div class="option" data-option="C">(C) 5 次</div>
                        <div class="option" data-option="D">(D) 6 次</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式碼使用 <code>while</code> 迴圈。變數 <code>k</code> 初始值為 10000。在每次迴圈中，<code>k</code> 的值會變成 <code>k / 8</code> (整數除法)。迴圈持續的條件是 <code>k >= 2</code>。</p>
                        <table>
                            <thead>
                                <tr><th>執行 <code>k=k/8</code> 次數</th><th>迴圈開始前 k</th><th>條件檢查 (k >= 2)</th><th>條件結果</th><th>執行 k = k / 8</th><th>迴圈結束後 k</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>-</td><td>10000 (初始)</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>
                                <tr><td>第 1 次</td><td>10000</td><td>10000 >= 2</td><td>True</td><td>k = 10000 / 8 = 1250</td><td>1250</td></tr>
                                <tr><td>第 2 次</td><td>1250</td><td>1250 >= 2</td><td>True</td><td>k = 1250 / 8 = 156</td><td>156</td></tr>
                                <tr><td>第 3 次</td><td>156</td><td>156 >= 2</td><td>True</td><td>k = 156 / 8 = 19</td><td>19</td></tr>
                                <tr><td>第 4 次</td><td>19</td><td>19 >= 2</td><td>True</td><td>k = 19 / 8 = 2</td><td>2</td></tr>
                                <tr><td>第 5 次</td><td>2</td><td>2 >= 2</td><td>True</td><td>k = 2 / 8 = 0</td><td>0</td></tr>
                                <tr><td>-</td><td>0</td><td>0 >= 2</td><td>False</td><td>- (不執行)</td><td>0 (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>當 <code>k</code> 的值變為 0 時，條件 <code>0 >= 2</code> 為假，迴圈終止。因此，敘述 <code>k = k / 8</code> 總共執行了 5 次。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (C)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q17">下一題</button></div>
                </div>

                <div id="q17" class="quiz-card">
                    <h3>17. 下列程式碼，while 迴圈內 i = i * i 被執行多少次？</h3> <!-- Note: Original question had ＊ -->
                    <pre><code class="language-c">int i=2;
while(i&lt;800) {i=i*i;}</code></pre>
                    <button class="run-example-btn" data-code-id="q17-code">運行示例</button>
                    <div class="quiz-options" data-correct="C">
                        <div class="option" data-option="A">(A) 2</div>
                        <div class="option" data-option="B">(B) 3</div>
                        <div class="option" data-option="C">(C) 4</div>
                        <div class="option" data-option="D">(D) 5</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>變數 <code>i</code> 的初始值為 2。在每次迴圈中，<code>i</code> 的值會變成其自身的平方 (<code>i = i * i</code>)。迴圈持續的條件是 <code>i < 800</code>。</p>
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
                    <div class="next-btn-container"><button class="next-btn" data-target="#q18">下一題</button></div>
                </div>

                <div id="q18" class="quiz-card">
                    <h3>18. 執行下列 c 程式片段，請問最後輸出是？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){ // Corrected from void main
  int number=1061130, result;
  do {
    result = number %10;
    printf("%i", result);
    number = number/10;
  } while(number != 0);
  printf("\n");
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q18-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 1061130</div>
                        <div class="option" data-option="B">(B) 0311601</div>
                        <div class="option" data-option="C">(C) 106113</div>
                        <div class="option" data-option="D">(D) 311601</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式使用 <code>do-while</code> 迴圈來反向印出一個整數的每一位數。變數 <code>number</code> 初始值為 1061130。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 number</th><th>result = number % 10</th><th>printf("%i", result)</th><th>number = number / 10</th><th>條件 (number != 0)</th><th>條件結果</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>1061130</td><td>0</td><td>印出 0</td><td>106113</td><td>106113 != 0</td><td>True</td></tr>
                                <tr><td>106113</td><td>3</td><td>印出 3</td><td>10611</td><td>10611 != 0</td><td>True</td></tr>
                                <tr><td>10611</td><td>1</td><td>印出 1</td><td>1061</td><td>1061 != 0</td><td>True</td></tr>
                                <tr><td>1061</td><td>1</td><td>印出 1</td><td>106</td><td>106 != 0</td><td>True</td></tr>
                                <tr><td>106</td><td>6</td><td>印出 6</td><td>10</td><td>10 != 0</td><td>True</td></tr>
                                <tr><td>10</td><td>0</td><td>印出 0</td><td>1</td><td>1 != 0</td><td>True</td></tr>
                                <tr><td>1</td><td>1</td><td>印出 1</td><td>0</td><td>0 != 0</td><td>False (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>程式輸出的順序是從個位數開始，所以最終輸出為 0311601。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q19">下一題</button></div>
                </div>

                <div id="q19" class="quiz-card">
                    <h3>19. 執行下列 c 程式片段，請問輸出為下列何項？</h3>
                    <pre><code class="language-c">int x=4; int sum=0;
while (x&lt;=100){
  sum+=x;
  x+=4;
}
// printf("sum=%d", sum); // Original has printf
</code></pre>
                    <button class="run-example-btn" data-code-id="q19-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 325</div>
                        <div class="option" data-option="B">(B) 1300</div>
                        <div class="option" data-option="C">(C) 625</div>
                        <div class="option" data-option="D">(D) 2600</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式碼使用 <code>while</code> 迴圈計算從 4 開始，每次遞增 4，直到 100 (包含100) 的所有數的總和。變數 <code>sum</code> 用於累加，<code>x</code> 為迴圈控制變數。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 x</th><th>條件 (x &lt;= 100)</th><th>條件結果</th><th>執行 sum += x (目前 sum)</th><th>執行 x += 4</th><th>迴圈結束後 x</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>4 (初始)</td><td>4 &lt;= 100</td><td>True</td><td>sum = 0 + 4 = 4</td><td>x = 4 + 4 = 8</td><td>8</td></tr>
                                <tr><td>8</td><td>8 &lt;= 100</td><td>True</td><td>sum = 4 + 8 = 12</td><td>x = 8 + 4 = 12</td><td>12</td></tr>
                                <tr><td colspan="6" style="text-align:center;">... 繼續累加 ...</td></tr>
                                <tr><td>96</td><td>96 &lt;= 100</td><td>True</td><td>sum = (sum of 4..92) + 96 = 1200</td><td>x = 96 + 4 = 100</td><td>100</td></tr>
                                <tr><td>100</td><td>100 &lt;= 100</td><td>True</td><td>sum = 1200 + 100 = 1300</td><td>x = 100 + 4 = 104</td><td>104</td></tr>
                                <tr><td>104</td><td>104 &lt;= 100</td><td>False</td><td>- (不執行)</td><td>104 (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>這是一個等差數列求和：4 + 8 + 12 + ... + 100。
                        首項 a1 = 4，末項 an = 100，公差 d = 4。
                        項數 n = (an - a1)/d + 1 = (100 - 4)/4 + 1 = 96/4 + 1 = 24 + 1 = 25 項。
                        總和 S = n * (a1 + an) / 2 = 25 * (4 + 100) / 2 = 25 * 104 / 2 = 25 * 52 = 1300。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q21">下一題</button></div>
                </div>

                <div id="q21" class="quiz-card">
                    <h3>21. 已知一個迴圈程式碼：k=2， while(k&lt;=65535) k=k*k， 估計其中 k=k*k 總共執行多少次？</h3>
                    <pre><code class="language-c">/* Conceptual:
int k=2;
int count = 0;
while(k&lt;=65535) {
    k=k*k; // Assuming k can hold large values for this estimation
    count++;
}
*/</code></pre>
                    <button class="run-example-btn" data-code-id="q21-code">運行示例</button>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) 4 次</div>
                        <div class="option" data-option="B">(B) 5 次</div>
                        <div class="option" data-option="C">(C) 6 次</div>
                        <div class="option" data-option="D">(D) 7 次</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>變數 <code>k</code> 初始值為 2。在每次迴圈中，<code>k</code> 的值會變成其自身的平方 (<code>k = k * k</code>)。迴圈持續的條件是 <code>k &lt;= 65535</code>。我們假設 <code>k</code> 的型別足以容納這些數值而不發生溢位，以便估計執行次數。</p>
                        <table>
                            <thead>
                                <tr><th>執行 <code>k=k*k</code> 次數</th><th>迴圈開始前 k</th><th>條件檢查 (k &lt;= 65535)</th><th>條件結果</th><th>執行 k = k * k</th><th>迴圈結束後 k</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>-</td><td>2 (初始)</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>
                                <tr><td>第 1 次</td><td>2</td><td>2 &lt;= 65535</td><td>True</td><td>k = 2 * 2 = 4</td><td>4</td></tr>
                                <tr><td>第 2 次</td><td>4</td><td>4 &lt;= 65535</td><td>True</td><td>k = 4 * 4 = 16</td><td>16</td></tr>
                                <tr><td>第 3 次</td><td>16</td><td>16 &lt;= 65535</td><td>True</td><td>k = 16 * 16 = 256</td><td>256</td></tr>
                                <tr><td>第 4 次</td><td>256</td><td>256 &lt;= 65535</td><td>True</td><td>k = 256 * 256 = 65536</td><td>65536</td></tr>
                                <tr><td>-</td><td>65536</td><td>65536 &lt;= 65535</td><td>False</td><td>- (不執行)</td><td>65536 (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>當 <code>k</code> 的值變為 65536 時，條件 <code>65536 &lt;= 65535</code> 為假，迴圈終止。因此，敘述 <code>k = k * k</code> 總共執行了 4 次。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (A)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q22">下一題</button></div>
                </div>

                <div id="q22" class="quiz-card">
                    <h3>22. 下面這一段程式的執行結果 n 的值為何？</h3>
                    <pre><code class="language-c">int n=0; int i=1;
while(i&lt;=100){
  n=n+i;
  i=i+2;
}
// printf("%d\n", n); // Original code has printf
</code></pre>
                    <button class="run-example-btn" data-code-id="q22-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 2000</div>
                        <div class="option" data-option="B">(B) 2500</div>
                        <div class="option" data-option="C">(C) 5000</div>
                        <div class="option" data-option="D">(D) 10000</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式碼使用 <code>while</code> 迴圈計算從 1 開始，每次遞增 2 (即所有奇數)，直到 <code>i</code> 超過 100 時的總和。變數 <code>n</code> 用於累加總和，<code>i</code> 從 1 開始，每次增加 2。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 i</th><th>條件 (i &lt;= 100)</th><th>條件結果</th><th>執行 n += i (目前 n)</th><th>執行 i += 2</th><th>迴圈結束後 i</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>1 (初始)</td><td>1 &lt;= 100</td><td>True</td><td>n = 0 + 1 = 1</td><td>i = 1 + 2 = 3</td><td>3</td></tr>
                                <tr><td>3</td><td>3 &lt;= 100</td><td>True</td><td>n = 1 + 3 = 4</td><td>i = 3 + 2 = 5</td><td>5</td></tr>
                                <tr><td colspan="6" style="text-align:center;">... 繼續累加 ...</td></tr>
                                <tr><td>97</td><td>97 &lt;= 100</td><td>True</td><td>n = (sum of 1..95) + 97 = 2401</td><td>i = 97 + 2 = 99</td><td>99</td></tr>
                                <tr><td>99</td><td>99 &lt;= 100</td><td>True</td><td>n = 2401 + 99 = 2500</td><td>i = 99 + 2 = 101</td><td>101</td></tr>
                                <tr><td>101</td><td>101 &lt;= 100</td><td>False</td><td>- (不執行)</td><td>101 (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>這是一個等差數列求和：1 + 3 + 5 + ... + 99。
                        首項 a1 = 1，末項 an = 99，公差 d = 2。
                        項數 N = (an - a1)/d + 1 = (99 - 1)/2 + 1 = 98/2 + 1 = 49 + 1 = 50 項。
                        總和 S = N * (a1 + an) / 2 = 50 * (1 + 99) / 2 = 50 * 100 / 2 = 50 * 50 = 2500。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q24">下一題</button></div>
                </div>

                <div id="q24" class="quiz-card">
                    <h3>24. 執行下列 c 程式後，請問 y3 最後輸出是？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int y1, y2=13, y3=1;
  for (y1=0; y1&lt;=y2; /* y3 not in increment */ ){
    y3 += y1;
    y1 += 2;
  }
  // printf("%i", y3); // Original code has printf
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q24-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 31</div>
                        <div class="option" data-option="B">(B) 43</div>
                        <div class="option" data-option="C">(C) 57</div>
                        <div class="option" data-option="D">(D) 73</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式使用 <code>for</code> 迴圈。變數 <code>y1</code> 從 0 開始，每次迴圈體執行後增加 2。變數 <code>y3</code> 初始為 1，並在迴圈體內累加 <code>y1</code> 的值。迴圈的條件是 <code>y1 &lt;= y2</code> (即 <code>y1 &lt;= 13</code>)。注意 <code>for</code> 迴圈的第三部分（通常用於變數遞增）是空的，但 <code>y1</code> 在迴圈體內被修改。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 y1</th><th>迴圈開始前 y3</th><th>條件 (y1 &lt;= 13)</th><th>條件結果</th><th>執行 y3 += y1</th><th>執行 y1 += 2</th><th>迴圈結束後 y1</th><th>迴圈結束後 y3</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>0 (初始)</td><td>1 (初始)</td><td>0 &lt;= 13</td><td>True</td><td>y3 = 1 + 0 = 1</td><td>y1 = 0 + 2 = 2</td><td>2</td><td>1</td></tr>
                                <tr><td>2</td><td>1</td><td>2 &lt;= 13</td><td>True</td><td>y3 = 1 + 2 = 3</td><td>y1 = 2 + 2 = 4</td><td>4</td><td>3</td></tr>
                                <tr><td>4</td><td>3</td><td>4 &lt;= 13</td><td>True</td><td>y3 = 3 + 4 = 7</td><td>y1 = 4 + 2 = 6</td><td>6</td><td>7</td></tr>
                                <tr><td>6</td><td>7</td><td>6 &lt;= 13</td><td>True</td><td>y3 = 7 + 6 = 13</td><td>y1 = 6 + 2 = 8</td><td>8</td><td>13</td></tr>
                                <tr><td>8</td><td>13</td><td>8 &lt;= 13</td><td>True</td><td>y3 = 13 + 8 = 21</td><td>y1 = 8 + 2 = 10</td><td>10</td><td>21</td></tr>
                                <tr><td>10</td><td>21</td><td>10 &lt;= 13</td><td>True</td><td>y3 = 21 + 10 = 31</td><td>y1 = 10 + 2 = 12</td><td>12</td><td>31</td></tr>
                                <tr><td>12</td><td>31</td><td>12 &lt;= 13</td><td>True</td><td>y3 = 31 + 12 = 43</td><td>y1 = 12 + 2 = 14</td><td>14</td><td>43</td></tr>
                                <tr><td>14</td><td>43</td><td>14 &lt;= 13</td><td>False</td><td>- (不執行)</td><td>-</td><td>14</td><td>43 (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>當 <code>y1</code> 變為 14 時，條件 <code>14 &lt;= 13</code> 為假，迴圈終止。最終 <code>y3</code> 的值為 43。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q25">下一題</button></div>
                </div>

                <div id="q25" class="quiz-card">
                    <h3>25. 在程式片段中，若輸入 n 為 1234，請問執行結果為何？</h3>
                    <pre><code class="language-c">int  n; int sum=0;
// scanf("%d", &n); // Assuming n = 1234 for this trace
n = 1234; // For tracing
while(n!=0){
  sum=sum+n%10;
  n=n/10;
}
// printf("%d\n", sum); // Original code has printf
</code></pre>
                    <p><sub>(註：右側沙箱不支援 `scanf`，您可以修改程式碼，將 `n` 直接賦值為 1234 進行測試。)</sub></p>
                    <button class="run-example-btn" data-code-id="q25-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 1234</div>
                        <div class="option" data-option="B">(B) 10</div>
                        <div class="option" data-option="C">(C) 1</div>
                        <div class="option" data-option="D">(D) 4</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>此程式碼計算輸入整數 <code>n</code> 的各位數字之和。假設輸入 <code>n = 1234</code>。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 n</th><th>迴圈開始前 sum</th><th>條件 (n != 0)</th><th>條件結果</th><th>n % 10</th><th>sum = sum + (n % 10)</th><th>n = n / 10</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>1234</td><td>0</td><td>1234 != 0</td><td>True</td><td>4</td><td>sum = 0 + 4 = 4</td><td>123</td></tr>
                                <tr><td>123</td><td>4</td><td>123 != 0</td><td>True</td><td>3</td><td>sum = 4 + 3 = 7</td><td>12</td></tr>
                                <tr><td>12</td><td>7</td><td>12 != 0</td><td>True</td><td>2</td><td>sum = 7 + 2 = 9</td><td>1</td></tr>
                                <tr><td>1</td><td>9</td><td>1 != 0</td><td>True</td><td>1</td><td>sum = 9 + 1 = 10</td><td>0</td></tr>
                                <tr><td>0</td><td>10</td><td>0 != 0</td><td>False</td><td>-</td><td>-</td><td>- (迴圈終止)</td></tr>
                            </tbody>
                        </table>
                        <p>迴圈結束後，<code>sum</code> 的值為 10。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q26">下一題</button></div>
                </div>

                <div id="q26" class="quiz-card">
                    <h3>26. 執行下列程式碼後，請問輸出結果為？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int x=110, y=20;
  while(x>120){
    y=x-y;
    x++;
  }
  // printf("%3d%3d", x, y); // Original code has printf
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q26-code">運行示例</button>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) 111 90</div>
                        <div class="option" data-option="B">(B) 112 21</div>
                        <div class="option" data-option="C">(C) 110 90</div>
                        <div class="option" data-option="D">(D) 110 20</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>變數初始化：<code>x = 110</code>，<code>y = 20</code>。</p>
                        <p><code>while</code> 迴圈條件為 <code>x > 120</code>。</p>
                        <table>
                            <thead>
                                <tr><th>迴圈開始前 x</th><th>迴圈開始前 y</th><th>條件檢查 (x > 120)</th><th>條件結果</th><th>動作</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>110</td><td>20</td><td>110 > 120</td><td>False</td><td>迴圈體不執行，直接跳過。</td></tr>
                            </tbody>
                        </table>
                        <p>由於初始時 <code>x</code> (110) 並不大於 120，所以 <code>while</code> 迴圈的條件一開始就為假。因此，迴圈體內的程式碼完全不會被執行。<code>x</code> 和 <code>y</code> 的值保持不變。</p>
                        <p>最終 <code>x</code> 的值為 110，<code>y</code> 的值為 20。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (D)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q27">下一題</button></div>
                </div>

                <div id="q27" class="quiz-card">
                    <h3>27. 執行下列程式碼後，請問輸出結果為？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int x=0, y=0;
  for(y=1; y&lt;=20; y++) {
    int z=y%5;
    if(z==0) x++;
  }
  // printf("%3d%3d",x,y); // Original code has printf
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q27-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 0 0</div>
                        <div class="option" data-option="B">(B) 4 21</div>
                        <div class="option" data-option="C">(C) 2 11</div>
                        <div class="option" data-option="D">(D) 3 11</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>變數 <code>x</code> 初始為 0，用於計數。變數 <code>y</code> 是 <code>for</code> 迴圈的計數器，從 1 迭代到 20。</p>
                        <p>在迴圈中，當 <code>y</code> 是 5 的倍數時 (即 <code>y % 5 == 0</code>)，<code>x</code> 會遞增。</p>
                        <p><code>y</code> 的值會是 5 的倍數的情況有：y=5, y=10, y=15, y=20。這四種情況下 <code>x</code> 會增加，所以迴圈結束後 <code>x</code> 的值為 4。</p>
                        <p><code>for</code> 迴圈的執行過程：</p>
                        <ul>
                            <li>初始化：<code>y = 1</code></li>
                            <li>條件檢查：<code>y <= 20</code></li>
                            <li>迴圈體執行</li>
                            <li>遞增：<code>y++</code></li>
                        </ul>
                        <p>當 <code>y</code> 為 20 時，條件 <code>20 <= 20</code> 為真，迴圈體執行 (<code>x</code> 可能增加)。之後 <code>y++</code> 使 <code>y</code> 變為 21。下一輪條件檢查 <code>21 <= 20</code> 為假，迴圈終止。</p>
                        <p>因此，在迴圈結束後，<code>x</code> 的值是 4，<code>y</code> 的值是 21。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q28">下一題</button></div>
                </div>

                <div id="q28" class="quiz-card">
                    <h3>28. 執行下列程式碼後，請問輸出結果為？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int a=5, b=2;
  if(a>b){
    a=a*b+2;
    b++;
  } else {
    a=a/2;
    b=b+4;
  }
  // printf("%3d%3d",a,b); // Original code has printf
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q28-code">運行示例</button>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 8 2</div>
                        <div class="option" data-option="B">(B) 12 3</div>
                        <div class="option" data-option="C">(C) 2 6</div>
                        <div class="option" data-option="D">(D) 4 6</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路</h4>
                        <ol>
                            <li>變數初始化：<code>a = 5</code>，<code>b = 2</code>。</li>
                            <li><code>if</code> 條件判斷：<code>(a > b)</code> 即 <code>(5 > 2)</code>。此條件為真 (True)。</li>
                            <li>執行 <code>if</code> 為真時的區塊：
                                <ul>
                                    <li><code>a = a * b + 2;</code> => <code>a = 5 * 2 + 2 = 10 + 2 = 12</code>。現在 <code>a</code> 的值為 12。</li>
                                    <li><code>b++;</code> => <code>b = b + 1 = 2 + 1 = 3</code>。現在 <code>b</code> 的值為 3。</li>
                                </ul>
                            </li>
                            <li><code>else</code> 區塊不會被執行。</li>
                            <li>最終 <code>a</code> 的值為 12，<code>b</code> 的值為 3。</li>
                        </ol>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q29">下一題</button></div>
                </div>

                <div id="q29" class="quiz-card">
                    <h3>29. 執行下列程式碼後，請問輸出結果為？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int n=4, x=7, y=8;
  switch(n){
    case 1: x=n;break;
    case 2: y=y+4;
    case 3: x=n+5;break;
    case 4: x=x*4;
    default: y=y-4;
  }
  // printf("%2d%2d",x,y); // Original code has printf
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q29-code">運行示例</button>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) 28 4</div>
                        <div class="option" data-option="B">(B) 4 8</div>
                        <div class="option" data-option="C">(C) 9 12</div>
                        <div class="option" data-option="D">(D) 9 8</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路</h4>
                        <ol>
                            <li>變數初始化：<code>n = 4</code>, <code>x = 7</code>, <code>y = 8</code>。</li>
                            <li><code>switch(n)</code> 使用 <code>n</code> (值為 4) 進行判斷。</li>
                            <li><code>case 4:</code> 條件符合。
                                <ul>
                                    <li>執行 <code>x = x * 4;</code> => <code>x = 7 * 4 = 28</code>。現在 <code>x</code> 的值為 28。</li>
                                    <li>由於 <code>case 4:</code> 後面沒有 <code>break;</code> 語句，程式會繼續執行（fall-through）到下一個 <code>case</code> 或 <code>default</code> 標籤。</li>
                                </ul>
                            </li>
                            <li><code>default:</code> 程式執行到此。
                                <ul>
                                    <li>執行 <code>y = y - 4;</code> => <code>y = 8 - 4 = 4</code>。現在 <code>y</code> 的值為 4。</li>
                                </ul>
                            </li>
                            <li><code>switch</code> 結束。</li>
                            <li>最終 <code>x</code> 的值為 28，<code>y</code> 的值為 4。</li>
                        </ol>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (A)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q30">下一題</button></div>
                </div>

                <div id="q30" class="quiz-card">
                    <h3>30. 執行下列程式碼後，請問輸出結果為？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(){
  int x=30, y;
  if (x&lt;=5) {
    y=x*x;
    x+=5;
  } else {
    if (x&lt;10) {
      y=x-2;
    } else {
      if(x&lt;25) {
        y=x+10;
      } else {
        y=x/10;
      }
    }
    x++;
  }
  // printf("%3d%3d",y,x); // Original code has printf
  return 0;
}</code></pre>
                    <button class="run-example-btn" data-code-id="q30-code">運行示例</button>
                    <div class="quiz-options" data-correct="C">
                        <div class="option" data-option="A">(A) 28 31</div>
                        <div class="option" data-option="B">(B) 40 31</div>
                        <div class="option" data-option="C">(C) 3 31</div>
                        <div class="option" data-option="D">(D) 900 35</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路</h4>
                        <ol>
                            <li>變數初始化：<code>x = 30</code>。<code>y</code> 未明確初始化，但會在後續路徑中被賦值。</li>
                            <li>外層 <code>if</code> 條件：<code>(x <= 5)</code> 即 <code>(30 <= 5)</code>。此條件為假 (False)。</li>
                            <li>執行外層 <code>else</code> 區塊：
                                <ul>
                                    <li>內層第一個 <code>if</code> 條件：<code>(x < 10)</code> 即 <code>(30 < 10)</code>。此條件為假 (False)。</li>
                                    <li>執行內層第一個 <code>else</code> 區塊：
                                        <ul>
                                            <li>內層第二個 <code>if</code> 條件：<code>(x < 25)</code> 即 <code>(30 < 25)</code>。此條件為假 (False)。</li>
                                            <li>執行內層第二個 <code>else</code> 區塊：
                                                <ul>
                                                    <li><code>y = x / 10;</code> => <code>y = 30 / 10 = 3</code>。現在 <code>y</code> 的值為 3。</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>在第一個外層 <code>else</code> 區塊的末尾，執行 <code>x++;</code> => <code>x = 30 + 1 = 31</code>。現在 <code>x</code> 的值為 31。</li>
                                </ul>
                            </li>
                            <li>最終 <code>y</code> 的值為 3，<code>x</code> 的值為 31。</li>
                        </ol>
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
                'q16-code': `int k = 10000; int count = 0; while (k >= 2) { k = k / 8; count++; printf("After division, k = %d\\n", k); } printf("Total executions: %d\\n", count);`,
                'q17-code': `int i=2; while(i<800) { printf("i before: %d\\n", i); i=i*i; printf("i after: %d\\n", i); }`,
                'q18-code': `int number=1061130, result; do { result = number %10; printf("%i", result); number = number/10; } while(number != 0); printf("\\n");`,
                'q19-code': `int x=4; int sum=0; while (x<=100){ sum+=x; x+=4; } printf("sum=%d\\n", sum);`,
                'q21-code': `long long k=2; int count = 0; while(k<=65535) { printf("k before: %lld\\n", k); k=k*k; printf("k after: %lld\\n", k); count++; } printf("Total executions: %d\\n", count);`,
                'q22-code': `int n=0; int i=1; while(i<=100){ n=n+i; i=i+2; } printf("%d\\n", n);`,
                'q24-code': `int y1, y2=13, y3=1; for (y1=0; y1<=y2; ){ y3 += y1; y1 += 2; } printf("%i", y3);`,
                'q25-code': `int n = 1234; int sum=0; while(n!=0){ sum=sum+n%10; n=n/10; } printf("%d\\n", sum);`,
                'q26-code': `int x=110, y=20; while(x>120){ y=x-y; x++; } printf("%3d%3d\\n", x, y);`,
                'q27-code': `int x=0, y=0; for(y=1; y<=20; y++) { int z=y%5; if(z==0) x++; } printf("%3d%3d\\n",x,y);`,
                'q28-code': `int a=5, b=2; if(a>b){ a=a*b+2; b++; } else { a=a/2; b=b+4; } printf("%3d%3d\\n",a,b);`,
                'q29-code': `int n=4, x=7, y=8; switch(n){ case 1: x=n;break; case 2: y=y+4; case 3: x=n+5;break; case 4: x=x*4; default: y=y-4; } printf("%2d%2d\\n",x,y);`,
                'q30-code': `int x=30, y; if (x<=5) { y=x*x; x+=5; } else { if (x<10) { y=x-2; } else { if(x<25) { y=x+10; } else { y=x/10; } } x++; } printf("%3d%3d\\n",y,x);`
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