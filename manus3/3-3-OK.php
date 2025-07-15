<?php
// 這是一個 PHP 檔案，以確保在支援 PHP 的網頁伺服器上能正確解析和提供服務。
// 即使沒有動態 PHP 程式碼，使用 .php 副檔名也能滿足某些伺服器環境設定。
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C 語言互動式學習 (詳解分離版)</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>

    <script>
    MathJax = {
      tex: {
        inlineMath: [['$', '$'], ['\(', '\)']],
        displayMath: [['$$', '$$'], ['\[', '\]']]
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
            line-height: 1.8;
            margin: 0;
            padding: 0;
            overflow: hidden; /* 防止頁面本身滾動 */
        }
        .container {
            display: flex;
            max-width: 100%;
            height: 100vh;
            margin: 0 auto;
            padding: 0;
        }
        .tutorial-content { /* 左側教學區 */
            width: 55%;
            min-width: 400px;
            padding: 25px 40px;
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
            z-index: 10;
        }
        .resizer:hover, .resizer.is-dragging {
            background-color: var(--primary-color);
        }
        .interactive-panel {  /* 右側互動區 */
            width: 45%;
            min-width: 300px;
            flex-grow: 1;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            background-color: var(--card-bg);
            border-left: 1px solid var(--border-color);
        }
        h1, h2, h3 {
            color: var(--header-color);
            font-weight: 700;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }
        h1 { font-size: 2.5em; margin-bottom: 30px; }
        h2 { font-size: 2em; margin-top: 50px; }
        h3 { font-size: 1.5em; margin-top: 30px; border-bottom: none; }
        p, ul, li {
            font-size: 1.1em;
        }
        ul { list-style-type: disc; padding-left: 25px; }
        li { margin-bottom: 10px; }
        code:not(pre > code) {
            background-color: var(--code-bg);
            color: var(--primary-color);
            padding: 3px 7px;
            border-radius: 4px;
            font-family: var(--font-code);
        }
        .knowledge-point {
            margin-bottom: 25px;
            padding: 20px;
            border-left: 4px solid var(--primary-color);
            background-color: rgba(74, 144, 226, 0.1);
            border-radius: 0 8px 8px 0;
        }

        /* Right Panel Styles */
        #explanation-panel {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        #explanation-panel h3 {
            margin-top: 0;
            color: var(--primary-color);
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 10px;
            flex-shrink: 0;
        }
        #explanation-content {
            flex-grow: 1;
            overflow-y: auto;
            font-size: 1em;
            line-height: 1.7;
        }
        #explanation-content .placeholder {
            color: #888;
            text-align: center;
            padding-top: 50px;
            font-style: italic;
        }
        #explanation-content h4 {
            color: var(--primary-color);
            font-size: 1.3em;
            margin-top: 25px;
        }
        #explanation-content ul { padding-left: 20px; }
        #explanation-content ul li::marker { color: var(--primary-color); }
        #explanation-content pre {
            background-color: var(--code-bg);
            padding: 15px;
            border-radius: 5px;
            border: 1px solid var(--border-color);
        }


        /* Quiz Section Styles */
        .quiz-section { margin-top: 50px; background-color: transparent; border: none; padding: 0; }
        .quiz-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 25px;
            scroll-margin-top: 20px; /* For smooth scrolling */
        }
        .quiz-card h3 { margin-top: 0; color: var(--header-color); }
        .quiz-options .option {
            display: block;
            background-color: #3c3c3c;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.3s, background-color 0.3s;
            position: relative;
        }
        .quiz-options .option:hover { border-color: var(--primary-color); }
        .quiz-options .option.correct {
            border-color: var(--success-color);
            background-color: rgba(115, 201, 144, 0.2);
        }
        .quiz-options .option.incorrect {
            border-color: var(--error-color);
            background-color: rgba(244, 113, 116, 0.2);
        }
        .quiz-options .option.answered { cursor: default; }
        .quiz-options .option.answered:hover { border-color: transparent; }
        .quiz-options .option.correct.answered:hover { border-color: var(--success-color); }
        .quiz-options .option.incorrect.answered:hover { border-color: var(--error-color); }
        .feedback-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.2em;
        }
        .explanation {
            display: none; /* Hide original explanation block */
        }
        .next-btn-container { text-align: right; margin-top: 20px; }
        .next-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .next-btn:hover { background-color: #357ABD; }
    </style>
</head>
<body>

    <div class="container">
        <main class="tutorial-content">
            <h1>C 語言核心觀念：變數、運算子與型別</h1>
            <p>歡迎來到 C 語言的互動學習之旅！本章節將帶您了解程式設計中最基本的元素。點擊題目選項後，將在右方互動區顯示該題的完整詳解。</p>
            <p>本站已整合 <strong>MathJax</strong> 動態公式渲染器，可優雅地呈現數學與指標運算式。例如，二次方程式公式：$x = {-b \pm \sqrt{b^2-4ac} \over 2a}$</p>



            <div class="quiz-section">
                <h2>第二節：運算子與表示式 (互動題庫)</h2>
                <p>完成左側的學習後，試著挑戰下面的題目，檢驗你的學習成果！點擊選項後會顯示詳解。</p>

                <div id="q1" class="quiz-card">
                    <h3>1. 下列哪一個運算式的執行結果與其它三個不同？</h3>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">（A) :NOT （ 18 > 15 　)</div>
                        <div class="option" data-option="B">（B) :　（ 12 &lt;= 11 ) OR （ 200 > 100 )</div>
                        <div class="option" data-option="C">（C) :　（ 12 &lt;= 11 ) XOR （ 200 > 100 )</div>
                        <div class="option" data-option="D">（D) :　（ 18 > 15 ) AND （ 200 > 100 )</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 考點說明：邏輯運算子 （Logical Operators)</h4><p>本題測驗對基本邏輯運 NOT、OR、XOR、AND 的理解。在 C 語言中，關係運算的結果為 `true` （真，以 `1` 表示) 或 `false` （假，以 `0` 表示)。</p>
                        <ul>
                            <li><b>（A) :  NOT（true)</b> &rightarrow; `false` （0)</li>
                            <li><b>（B) :  false OR true</b> &rightarrow; `true` （1)</li>
                            <li><b>（C) :  false XOR true</b> &rightarrow; `true` （1)</li>
                            <li><b>（D) :  true AND true</b> &rightarrow; `true` （1)</li>
                        </ul>
                        <h4>✗ 錯誤選項原因</h4><p>選項 （B) : 、（C) : 、（D) :  的最終運算結果都是 `true` （1)，只有選項 （A) :  的結果是 `false` （0)，因此 （A) :  與其他三者不同。</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q2">下一題</button></div>
                </div>

                <div id="q2" class="quiz-card">
                    <h3>2. 考慮下面這一段 C 程式碼，變數 x 的最終值為何？</h3>
                    <pre><code class="language-c">int x = 21;
double y = 6;
double z = 14;
y = x / z;
x = 5.5 * y;</code></pre>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">（A) :  8.25</div>
                        <div class="option" data-option="B">（B) :  5.5</div>
                        <div class="option" data-option="C">（C) :  5</div>
                        <div class="option" data-option="D">（D) :  8</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 考點說明：隱式類型轉換與賦值截斷</h4><p>本題測驗在混合型別運算時的自動型別提升，以及將浮點數賦值給整數變數時發生的無條件捨去（截斷）。</p>
                        <h4>✓ 逐行程式碼註釋</h4>
                        <pre><code class="language-c">// y = x / z;
// int x（21) 會被提升為 double, 運算變為 21.0 / 14.0 = 1.5。 y = 1.5。
// x = 5.5 * y;
// 運算為 5.5 * 1.5 = 8.25。
// 將 double 結果 8.25 賦值給 int x 時，小數部分被無條件捨棄。
// 因此 x 的最終值為 8。
                        </code></pre>
                        <h4>✗ 錯誤選項原因</h4><ul><li><b>（A) :  8.25:</b> 這是 `5.5 * 1.5` 的正確浮點數計算結果，但忽略了最後賦值給 `int x` 時會捨去小數部分。</li><li><b>（C) :  5:</b> 可能是將 `x / z` 誤認為整數除法 `21 / 14` 得到 1，然後計算 `5.5 * 1` 再截斷得到 5。</li></ul>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q3">下一題</button></div>
                </div>

                <div id="q3" class="quiz-card">
                    <h3>3. C 語言指令 <code>printf（"%d", 2 && 1);</code>，會印出下列哪一個值？</h3>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">（A) :  0</div>
                        <div class="option" data-option="B">（B) :  1</div>
                        <div class="option" data-option="C">（C) :  2</div>
                        <div class="option" data-option="D">（D) :  3</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：邏輯與運算子 (Logical AND `&&`)</h4><p>對於邏輯運算，任何非零值都被視為 `true`，只有 `0` 被視為 `false`。邏輯運算的結果是 `1` (代表 `true`) 或 `0` (代表 `false`)。</p><p><code>2</code> (true) `&&` <code>1</code> (true) 的結果是 `true`，以整數 `1` 表示。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q4">下一題</button></div>
                </div>

                <div id="q4" class="quiz-card">
                    <h3>4. C 語言指令 <code>printf("%d", 2 & 1);</code>，會印出下列哪一個值？</h3>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">（A) :  0</div>
                        <div class="option" data-option="B">（B) :  1</div>
                        <div class="option" data-option="C">（C) :  2</div>
                        <div class="option" data-option="D">（D) :  3</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：位元與運算子 （Bitwise AND `&`)</h4><pre><code class="language-c">  0010  （2)
& 0001  （1)
----------
  0000  （0)</code></pre><p>因此結果為 `0`。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q5">下一題</button></div>
                </div>

                <div id="q5" class="quiz-card">
                    <h3>5. 若 C++ 程式的變數 <code>N=10</code>，下列何者的運算結果為 False？</h3>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">（A) :  （N >= 10) ^ （N != 15)</div>
                        <div class="option" data-option="B">（B) :  （N >= 10) & （N != 15)</div>
                        <div class="option" data-option="C">（C) :  （N > 10) || （N &lt; 15)</div>
                        <div class="option" data-option="D">（D) :  !（N > 10)</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：關係與邏輯運算子</h4><p>在 C/C++ 中，`true` 為 1，`false` 為 0。當 `N=10` 時:</p>
                        <ul>
                            <li><b>（A) :  （true) ^ （true)</b> &rightarrow; `1 ^ 1` &rightarrow; `0` （False)</li>
                            <li><b>（B) :  （true) & （true)</b> &rightarrow; `1 & 1` &rightarrow; `1` （True)</li>
                            <li><b>（C) :  （false) || （true)</b> &rightarrow; `true` （1) （True)</li>
                            <li><b>（D) :  !（false)</b> &rightarrow; `true` （1) （True)</li>
                        </ul></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q6">下一題</button></div>
                </div>

                <div id="q6" class="quiz-card">
                    <h3>6. 有一邏輯運算：$（0 \text{ op } 0) = 0$, $（1 \text{ op } 1) = 0$, $（0 \text{ op } 1) = 1$, $（1 \text{ op } 0) = 1$，此 op 之邏輯運算功能為何？</h3>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">（A) :  OR</div>
                        <div class="option" data-option="B">（B) :  AND</div>
                        <div class="option" data-option="C">（C) :  NOR</div>
                        <div class="option" data-option="D">（D) :  XOR</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：邏輯運算定義</h4><p>題目描述的規則是「兩運算元不同時，結果為 1；相同時，結果為 0」。這完全符合 <b>XOR (互斥或)</b> 運算的定義。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q7">下一題</button></div>
                </div>

                <div id="q7" class="quiz-card">
                    <h3>7. 在 C/C++語言中，這兩個指令執行完後，y 的值為何？</h3>
                    <pre><code class="language-c">int x = 2;
int y = (x != 4);</code></pre>
                    <div class="quiz-options" data-correct="C">
                        <div class="option" data-option="A">(A) :  -1</div>
                        <div class="option" data-option="B">(B) :  0</div>
                        <div class="option" data-option="C">(C) :  1</div>
                        <div class="option" data-option="D">(D) :  2</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：關係運算結果</h4><p>關係運算 `x != 4` (2 不等於 4) 結果為 `true`。將 `true` 賦值給整數變數 `y` 時，會被轉換為整數 `1`。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q8">下一題</button></div>
                </div>

                <div id="q8" class="quiz-card">
                    <h3>8. C 語言指令 <code>printf("%d", 1 & 2);</code> 答案為？</h3>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) :  0</div>
                        <div class="option" data-option="B">(B) :  1</div>
                        <div class="option" data-option="C">(C) :  2</div>
                        <div class="option" data-option="D">(D) :  3</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：位元與運算子 (Bitwise AND `&`)</h4><pre><code class="language-c">  0001  (1)
& 0010  (2)
----------
  0000  (0)</code></pre><p>結果為 `0`。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q9">下一題</button></div>
                </div>

                <div id="q9" class="quiz-card">
                    <h3>9. C 語言指令 <code>printf("%d", 1 && 2);</code> 答案為？</h3>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) :  1</div>
                        <div class="option" data-option="B">(B) :  2</div>
                        <div class="option" data-option="C">(C) :  0</div>
                        <div class="option" data-option="D">(D) :  3</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：邏輯與運算子 (Logical AND `&&`)</h4><p>`1` (true) `&&` `2` (true) 的結果是 `true`，即整數 `1`。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q10">下一題</button></div>
                </div>

                <div id="q10" class="quiz-card">
                    <h3>10. 程式片段執行結果 c 的值為何？</h3>
                    <pre><code class="language-c">int a = 1;
int b = 2;
int c = a ^ b;</code></pre>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) :  0</div>
                        <div class="option" data-option="B">(B) :  1</div>
                        <div class="option" data-option="C">(C) :  2</div>
                        <div class="option" data-option="D">(D) :  3</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：位元互斥或運算子 (Bitwise XOR `^`)</h4><p>位元不同為 1，相同為 0。</p><pre><code class="language-c">  0001  (a=1)
^ 0010  (b=2)
----------
  0011  (c=3)</code></pre><p>因此 `c` 的值為 3。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q11">下一題</button></div>
                </div>

                 <div id="q11" class="quiz-card">
                    <h3>11. 下列的程式片段，請問執行結果為何？</h3>
                    <pre><code class="language-c">int a = 5;
printf("%d ", a);
printf("%d ", a++);
printf("%d", a);</code></pre>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) :  5 5 6</div>
                        <div class="option" data-option="B">(B) :  5 6 6</div>
                        <div class="option" data-option="C">(C) :  6 6 6</div>
                        <div class="option" data-option="D">(D) :  5 5 5</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：後置遞增運算子 (Postfix Increment `a++`)</h4><p>後置 `++` 會先回傳變數「目前」的值，然後才將變數加 1。</p>
                    <ul>
                        <li>第一個 `printf`：印出 `a` 的初始值 `5`。</li>
                        <li>第二個 `printf`：`a++` 先回傳 `5` 給 `printf` 印出，然後 `a` 才變成 `6`。</li>
                        <li>第三個 `printf`：印出 `a` 的新值 `6`。</li>
                    </ul><p>故輸出為 `5 5 6`。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q12">下一題</button></div>
                </div>

                <div id="q12" class="quiz-card">
                    <h3>12. 下列的程式片段，請問執行結果為何？</h3>
                    <pre><code class="language-c">int a = 5;
printf("%d ", a);
printf("%d ", ++a);
printf("%d", a);</code></pre>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) :  5 5 6</div>
                        <div class="option" data-option="B">(B) :  5 6 6</div>
                        <div class="option" data-option="C">(C) :  6 6 6</div>
                        <div class="option" data-option="D">(D) :  5 5 5</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：前置遞增運算子 (Prefix Increment `++a`)</h4><p>前置 `++` 會先將變數加 1，然後才回傳「更新後」的值。</p>
                    <ul>
                        <li>第一個 `printf`：印出 `a` 的初始值 `5`。</li>
                        <li>第二個 `printf`：`++a` 先將 `a` 變成 `6`，再回傳 `6` 給 `printf` 印出。</li>
                        <li>第三個 `printf`：印出 `a` 的現值 `6`。</li>
                    </ul><p>故輸出為 `5 6 6`。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q13">下一題</button></div>
                </div>

                <div id="q13" class="quiz-card">
                    <h3>13. 下列的程式是用來計算球體的體積，但計算的結果有錯，請問錯誤出自哪一行？</h3>
                    <pre><code class="language-c">1 #include &lt;stdio.h&gt;
2 int main(){
3   double ratio, pi, r, vol;
4   ratio = 4/3;
5   pi=3.1416;
6   scanf("%lf", &r);
7   vol = ratio*pi*r*r*r;
8   printf("The volume = %lf\n", vol);
9   return 0;
10 }</code></pre>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) :  4</div>
                        <div class="option" data-option="B">(B) :  5</div>
                        <div class="option" data-option="C">(C) :  7</div>
                        <div class="option" data-option="D">(D) :  8</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：整數除法 (Integer Division)</h4><p>在第 4 行，`4/3` 是兩個整數相除，C 語言會執行「整數除法」，結果為 `1`，小數部分被捨棄。這導致 `ratio` 的值變成 `1.0` 而非 `1.333...`，造成計算錯誤。應改為 <code>ratio = 4.0 / 3;</code> 來強制浮點數除法。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q14">下一題</button></div>
                </div>

                <div id="q14" class="quiz-card">
                    <h3>14. 下列程式片段中，請問執行結果為何？</h3>
                    <pre><code class="language-c">int n = 255;
int mask = 15;
printf("%d\n", n & mask);</code></pre>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) :  0</div>
                        <div class="option" data-option="B">(B) :  1</div>
                        <div class="option" data-option="C">(C) :  5</div>
                        <div class="option" data-option="D">(D) :  15</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：位元與運算子 (Bitwise AND `&`)</h4><p>此運算常用於「遮罩(masking)」，取出特定位元。</p><pre><code class="language-c">  11111111  (n=255)
& 00001111  (mask=15)
------------------
  00001111  (15)</code></pre><p>結果為 `15`。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q15">下一題</button></div>
                </div>

                <div id="q15" class="quiz-card">
                    <h3>15. 在下列程式片段中，請問執行結果為何？</h3>
                    <pre><code class="language-c">int n = 255;
int mask = 15;
printf("%d\n", n && mask);</code></pre>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) :  0</div>
                        <div class="option" data-option="B">(B) :  1</div>
                        <div class="option" data-option="C">(C) :  5</div>
                        <div class="option" data-option="D">(D) :  15</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：邏輯與運算子 (Logical AND `&&`)</h4><p><code>n</code> (255) 是非零 (true)，<code>mask</code> (15) 也是非零 (true)。`true && true` 的結果為 `true`，以整數 `1` 表示。</p><h4>✗ 錯誤選項原因</h4><ul><li><b>(D) :  15:</b> 這是將邏輯運算 `&&` 與位元運算 `&` 混淆的結果。</li></ul></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q16">下一題</button></div>
                </div>

                <div id="q16" class="quiz-card">
                    <h3>16. 下列程式片段執行結果 c 的值為何？</h3>
                    <pre><code class="language-c">int a = 1;
int b = 2;
int c = a << b;</code></pre>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) :  1</div>
                        <div class="option" data-option="B">(B) :  2</div>
                        <div class="option" data-option="C">(C) :  -3</div>
                        <div class="option" data-option="D">(D) :  4</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：位元左移運算子 (Bitwise Left Shift `<<`)</h4><p><code>a << b</code> 將 `a` 的二進位表示向左移動 `b` 位。在數值上，左移 $y$ 位等效於乘以 $2^y$。</p><p>此例為 $1 \ll 2$，即 $1 \times 2^2 = 1 \times 4 = 4$。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q17">下一題</button></div>
                </div>

                <div id="q17" class="quiz-card">
                    <h3>17. 下列程式片段，如果輸入 n 為 76，執行結果為何？</h3>
                    <pre><code class="language-c">int n;
scanf("%d", &n);
printf("%d ", n / 50); n %= 50;
printf("%d ", n / 10); n %= 10;
printf("%d ", n / 5);  n %= 5;
printf("%d", n);</code></pre>
                    <p><sub>(註：右側沙箱不支援 `scanf`，請自行推算或修改為靜態賦值)</sub></p>
                    <div class="quiz-options" data-correct="C">
                        <div class="option" data-option="A">(A) :  1 2 2 2</div>
                        <div class="option" data-option="B">(B) :  1 2 2 1</div>
                        <div class="option" data-option="C">(C) :  1 2 1 1</div>
                        <div class="option" data-option="D">(D) :  1 1 1 1</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：整除與取模運算 (找零錢問題)</h4>
                        <ul>
                            <li><b>n = 76:</b> `76 / 50` 是 1，印出 1。`n` 變成 `76 % 50 = 26`。</li>
                            <li><b>n = 26:</b> `26 / 10` 是 2，印出 2。`n` 變成 `26 % 10 = 6`。</li>
                            <li><b>n = 6:</b> `6 / 5` 是 1，印出 1。`n` 變成 `6 % 5 = 1`。</li>
                            <li><b>n = 1:</b> 最後印出 `n` 的值 1。</li>
                        </ul>
                        <p>最終輸出為 `1 2 1 1`。</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q18">下一題</button></div>
                </div>

                <div id="q18" class="quiz-card">
                    <h3>18. C 語言指令 <code>printf( "%d", 4 / 3 * 3);</code>，答案為？</h3>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) :  4</div>
                        <div class="option" data-option="B">(B) :  3</div>
                        <div class="option" data-option="C">(C) :  3.99999</div>
                        <div class="option" data-option="D">(D) :  0.44444</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：整數除法與運算優先級</h4><p>`*` 和 `/` 優先級相同，由左至右計算。</p>
                    <ol>
                        <li>先計算 `4 / 3`。因是整數除法，結果為 `1`。</li>
                        <li>再計算 `1 * 3`，結果為 `3`。</li>
                    </ol></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q19">下一題</button></div>
                </div>

                <div id="q19" class="quiz-card">
                    <h3>19. C 語言的指令 <code>1 && 2</code> 與 <code>1 & 2</code> 的值分別為何？</h3>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) :  1, 2</div>
                        <div class="option" data-option="B">(B) :  1, 0</div>
                        <div class="option" data-option="C">(C) :  0, 1</div>
                        <div class="option" data-option="D">(D) :  2, 1</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：邏輯 AND (`&&`) vs. 位元 AND (`&`)</h4><ul><li><b><code>1 && 2</code>:</b> 邏輯運算。`true && true` &rightarrow; `true` (1)。</li><li><b><code>1 & 2</code>:</b> 位元運算。`01 & 10` &rightarrow; `00` (0)。</li></ul><p>故分別為 `1` 和 `0`。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q20">下一題</button></div>
                </div>

                <div id="q20" class="quiz-card">
                    <h3>20. C 語言的指令 <code>1 || 2</code> 與 <code>1 | 2</code> 的值分別為何？</h3>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) :  1, 3</div>
                        <div class="option" data-option="B">(B) :  3, 1</div>
                        <div class="option" data-option="C">(C) :  1, 2</div>
                        <div class="option" data-option="D">(D) :  2, 1</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：邏輯 OR (`||`) vs. 位元 OR (`|`)</h4><ul><li><b><code>1 || 2</code>:</b> 邏輯運算。`true || true` &rightarrow; `true` (1)。</li><li><b><code>1 | 2</code>:</b> 位元運算。`01 | 10` &rightarrow; `11` (3)。</li></ul><p>故分別為 `1` 和 `3`。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q21">下一題</button></div>
                </div>

                <div id="q21" class="quiz-card">
                    <h3>21. 下列 C 語言程式碼片段執行後，x 與 y 的結果為何？</h3>
                    <pre><code class="language-c">int x, a = 7, b = 2;
float y;
x = a / b;
y = (float)a / b;</code></pre>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) :  x 為 3，y 為 3</div>
                        <div class="option" data-option="B">(B) :  x 為 3，y 為 3.5</div>
                        <div class="option" data-option="C">(C) :  x 為 3.5，y 為 3</div>
                        <div class="option" data-option="D">(D) :  x 為 3.5，y 為 3.5</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：整數除法與顯式型別轉換</h4><ul><li><b><code>x = a / b;</code>:</b> 整數除法 `7 / 2` 結果為 `3`。</li><li><b><code>y = (float)a / b;</code>:</b> `(float)a` 強制 `a` 變成 `7.0`，執行浮點數除法 `7.0 / 2` 結果為 `3.5`。</li></ul></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q22">下一題</button></div>
                </div>

                <div id="q22" class="quiz-card">
                    <h3>22. 下列 C 語言程式碼執行後，其結果為何？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main() {
    int a=9, b=7;
    printf("%d", a ^ b);
    return 0;
}</code></pre>
                    <div class="quiz-options" data-correct="C">
                        <div class="option" data-option="A">(A) :  1</div>
                        <div class="option" data-option="B">(B) :  2</div>
                        <div class="option" data-option="C">(C) :  14</div>
                        <div class="option" data-option="D">(D) :  15</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：位元互斥或運算子 (Bitwise XOR `^`)</h4><pre><code class="language-c">  1001  (a=9)
^ 0111  (b=7)
----------
  1110  (14)</code></pre><p>結果為 `14`。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q23">下一題</button></div>
                </div>

                <div id="q23" class="quiz-card">
                    <h3>23. 依 C 語言之運算子優先權順序，下列運算式的結果，何者為真(true)？</h3>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) :  !(1 != 3) || 1 == 3</div>
                        <div class="option" data-option="B">(B) :  1 != 3 && !!(1 == 3)</div>
                        <div class="option" data-option="C">(C) :  !(1 &lt; 3) || 1 >= 3</div>
                        <div class="option" data-option="D">(D) :  1 &lt; 3 && !(1 >= 3)</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：運算子優先級與邏輯運算</h4>
                    <ul>
                        <li>(A) :  `!(true) || false` &rightarrow; `false || false` &rightarrow; `false`</li>
                        <li>(B) :  `true && !!(false)` &rightarrow; `true && false` &rightarrow; `false`</li>
                        <li>(C) :  `!(true) || false` &rightarrow; `false || false` &rightarrow; `false`</li>
                        <li>(D) :  `true && !(false)` &rightarrow; `true && true` &rightarrow; `true`</li>
                    </ul></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q24">下一題</button></div>
                </div>

                <div id="q24" class="quiz-card">
                    <h3>24. 執行完下列片段程式後，Num1 與 Num2 的數值分別為何？</h3>
                    <pre><code class="language-c">int Num1 = 10, Num2 = 5;
int Num3 = 3;
Num1 = Num1 << Num3 - 1;
Num2 = Num2 * Num1 >> 1;</code></pre>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) :  Num1=79、Num2=197</div>
                        <div class="option" data-option="B">(B) :  Num1=79、Num2=195</div>
                        <div class="option" data-option="C">(C) :  Num1=40、Num2=200</div>
                        <div class="option" data-option="D">(D) :  Num1=40、Num2=100</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：運算子優先級</h4><p>算術運算子 (`-`, `*`) 優先於位移運算子 (`<<`, `>>`)</p>
                    <ul>
                        <li><b>Num1:</b> 先算 `Num3 - 1 = 2`。再算 `Num1 = 10 << 2`，結果為 `40`。</li>
                        <li><b>Num2:</b> 先算 `Num2 * Num1 = 5 * 40 = 200`。再算 `Num2 = 200 >> 1`，結果為 `100`。</li>
                    </ul></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q25">下一題</button></div>
                </div>

                <div id="q25" class="quiz-card">
                    <h3>25. 有關運算子的優先順序，假設所有的變數都宣告為整數型態，下列哪一個 C 語言敘述運行的結果都是偶數？</h3>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) :  Result = (A – 5 >> 2) | 0x4;</div>
                        <div class="option" data-option="B">(B) :  Result = ((A + 8) * A – 13) & 0x1B;</div>
                        <div class="option" data-option="C">(C) :  Result = (A – 15) / 2 + 6;</div>
                        <div class="option" data-option="D">(D) :  Result = ((A + 124) & 2) + 2 % 5;</div>
                    </div>
                    <div class="explanation"><h4>✓ 考點說明：位元運与奇偶判断</h4><p>一個整數是偶數，其二進位最低位 (bit 0) 必為 0。</p>
                    <ul>
                        <li>(A) :  `| 0x4` (`...100`) 不保證最低位為 0。</li>
                        <li>(B) :  `& 0x1B` (`...11011`) 的最低位元是 1，可能產生奇數。</li>
                        <li>(C) :  若 `A=17`，`(17-15)/2+6 = 1+6 = 7` (奇數)。</li>
                        <li>(D) :  `(X & 2)` 的結果是偶數 (0或2)。`2 % 5` 的結果是偶數 (2)。<b>偶數 + 偶數 = 偶數</b>，恆成立。</li>
                    </ul></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q1">回到第一題</button></div>
                </div>

            </div>
        </main>

        <div class="resizer" id="dragMe"></div>

        <aside class="interactive-panel">
            <div id="explanation-panel">
                <h3>詳解說明</h3>
                <div id="explanation-content">
                    <p class="placeholder">請點擊左側任一題目的選項，此處將會顯示該題的詳細解說。</p>
                </div>
            </div>
        </aside>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const explanationContent = document.getElementById('explanation-content');

        // --- Quiz Logic ---
        function handleOptionClick(e) {
            const selectedOption = e.target.closest('.option');
            if (!selectedOption) return;

            const optionsContainer = selectedOption.parentElement;
            if (optionsContainer.classList.contains('answered')) return;

            const correctAnswer = optionsContainer.getAttribute('data-correct');
            const selectedAnswer = selectedOption.getAttribute('data-option');
            const quizCard = optionsContainer.closest('.quiz-card');

            optionsContainer.classList.add('answered');

            optionsContainer.querySelectorAll('.option').forEach(opt => {
                const optValue = opt.getAttribute('data-option');
                const feedbackIcon = document.createElement('span');
                feedbackIcon.classList.add('feedback-icon');

                if (optValue === correctAnswer) {
                    opt.classList.add('correct');
                    feedbackIcon.textContent = '✅';
                } else if (optValue === selectedAnswer) {
                    opt.classList.add('incorrect');
                    feedbackIcon.textContent = '❌';
                }

                if (opt.classList.contains('correct') || opt.classList.contains('incorrect')) {
                    opt.appendChild(feedbackIcon);
                }
                opt.classList.add('answered');
            });

            const explanation = quizCard.querySelector('.explanation');
            if (explanation) {
                explanationContent.innerHTML = explanation.innerHTML;
                // Re-run Prism and MathJax on the new content
                Prism.highlightAllUnder(explanationContent);
                MathJax.typesetPromise([explanationContent]);
            }
        }

        document.querySelectorAll('.quiz-options').forEach(optionsContainer => {
            optionsContainer.addEventListener('click', handleOptionClick);
        });

        // --- Next Button Logic ---
        document.querySelectorAll('.next-btn').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // --- Resizer Logic ---
        const resizer = document.getElementById('dragMe');
        const leftSide = document.querySelector('.tutorial-content');
        const rightSide = document.querySelector('.interactive-panel');

        const mouseDownHandler = function(e) {
            e.preventDefault();
            resizer.classList.add('is-dragging');

            const startX = e.clientX;
            const startLeftWidth = leftSide.offsetWidth;

            const mouseMoveHandler = function(e) {
                const dx = e.clientX - startX;
                const newLeftWidth = startLeftWidth + dx;
                const containerWidth = resizer.parentElement.offsetWidth;

                // Set widths in percentages to be more responsive
                const newLeftWidthPercent = (newLeftWidth / containerWidth) * 100;
                leftSide.style.width = `${newLeftWidthPercent}%`;
                rightSide.style.width = `${100 - newLeftWidthPercent}%`;
            };

            const mouseUpHandler = function() {
                resizer.classList.remove('is-dragging');
                document.removeEventListener('mousemove', mouseMoveHandler);
                document.removeEventListener('mouseup', mouseUpHandler);
            };

            document.addEventListener('mousemove', mouseMoveHandler);
            document.addEventListener('mouseup', mouseUpHandler);
        };
        resizer.addEventListener('mousedown', mouseDownHandler);
    });
    </script>
</body>
</html>
