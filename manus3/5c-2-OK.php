<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C 語言 陣列與指標應用 (修改版)</title>

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
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden; /* 防止滾動條出現在 body 層級 */
        }
        body {
            font-family: var(--font-body);
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.2;
        }
        .container {
            display: flex;
            width: 100%;
            height: 100vh; /* 使用 vh 確保佔滿整個視窗高度 */
            margin: 0 auto;
            padding: 0;
        }
        .tutorial-content {
            width: 70%;
            min-width: 350px;
            padding: 20px 40px;
            box-sizing: border-box;
            overflow-y: auto; /* 內容可滾動 */
            height: 100%;
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
        .interactive-panel {
            width: 30%;
            min-width: 300px;
            flex-grow: 1;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
            display: flex; /* 使用 flex 來佈局內部元素 */
            flex-direction: column; /* 垂直排列 */
            overflow: hidden; /* 防止內部元素溢出 */
        }
        h1, h2 {
            color: var(--header-color);
            font-weight: 700;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }
        h1 { font-size: 2.0em; margin-bottom:15px;}
        h2 { font-size: 1.6em; margin-top: 25px; }

        p, ul, ol {
            font-size: 0.95em;
            line-height: 1.6;
            margin-bottom: 0.7em;
        }
        ul, ol {
            padding-left: 20px;
        }
        li {
            margin-bottom: 6px;
        }
        code:not(pre > code) {
            background-color: var(--card-bg);
            color: var(--primary-color);
            padding: 2px 6px;
            border-radius: 4px;
            font-family: var(--font-code);
        }
        pre {
            margin: 0.8em 0;
            padding: 10px;
            background-color: var(--code-bg);
            border-radius: 4px;
            overflow-x: auto;
            font-size: 0.85em;
        }

        /* ----- 新增的右側詳解區塊樣式 ----- */
        #explanation-panel {
            background-color: var(--card-bg);
            border-radius: 8px;
            border: 1px solid var(--border-color);
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow: hidden; /* 確保內容超出時可滾動 */
        }
        #explanation-panel h3 {
            margin: 0;
            color: var(--primary-color);
            border-bottom: 1px solid var(--border-color);
            padding: 15px;
            font-size: 1.2em;
            flex-shrink: 0; /* 標題不縮小 */
        }
        #explanation-content {
            padding: 15px;
            overflow-y: auto; /* 當內容過多時，提供滾動條 */
            flex-grow: 1; /* 佔滿剩餘空間 */
        }
        #explanation-content p,
        #explanation-content ul,
        #explanation-content ol,
        #explanation-content table {
            font-size: 0.9em;
        }
        #explanation-content h4 {
             margin-top: 0;
             margin-bottom: 10px;
             color: var(--primary-color);
             font-size: 1.05em;
             border-bottom: 1px solid var(--border-color);
             padding-bottom: 5px;
        }
         /* 確保從左側複製過來的內容樣式正確 */
        #explanation-content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
            margin-bottom: 12px;
            font-size: 0.85em;
            background-color: var(--code-bg);
        }
        #explanation-content th, #explanation-content td {
            border: 1px solid var(--border-color);
            padding: 6px 8px;
            text-align: left;
            vertical-align: top;
        }
        #explanation-content th {
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
        }
        #explanation-content td code {
             background-color: rgba(255,255,255,0.1);
             padding: 1px 4px;
             border-radius: 3px;
        }
        #explanation-content ul li::marker {
            color: var(--primary-color);
        }

        /* ----- 測驗卡片相關樣式 ----- */
        .quiz-section {
            margin-top: 20px;
            background-color: transparent;
            border: none;
            padding: 0;
        }
        .quiz-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            scroll-margin-top: 20px;
        }
        .quiz-card h3 {
            margin-top: 0;
            color: var(--header-color);
            font-size: 1.1em;
            border-bottom: 1px dashed var(--border-color);
            padding-bottom: 8px;
            margin-bottom: 12px;
        }
        .quiz-options .option {
            display: block;
            background-color: #3c3c3c;
            margin: 8px 0;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.3s, background-color 0.3s;
            position: relative;
            font-size: 0.9em;
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

        /* 將原生的詳解區塊隱藏 */
        .explanation {
            display: none;
        }
        .next-btn-container {
            text-align: right;
            margin-top: 15px;
        }
        .next-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 0.9em;
        }
        .next-btn:hover {
            background-color: #357ABD;
        }
        /* 移除 run-example-btn 的樣式，因為它已被移除 */
        .run-example-btn {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <main class="tutorial-content">
            <h1>C 語言練習：第五章 Part 4 - 綜合應用與陷阱</h1>
            <p>本頁面為 C/C++ 語言第五章練習題的第四部分 (原第 58-76 題，其中 Q62, Q63 略過，共17題)。此部分包含更多指標、陣列、字串以及常見程式邏輯的綜合應用與易錯點。請仔細分析每個問題，並利用右側的沙箱進行實作與驗證。</p>

            <div class="quiz-section">
                <h2>第五章 互動練習題組 (4/4)</h2>
                <p>請挑戰下面的題目，檢驗您的學習成果！點擊選項作答後，詳解將顯示於右側面板。</p>
                <div id="q1" class="quiz-card">
                    <h3>1. (原 Q58) 下列 C 語言，何者不是宣告一個指標變數？</h3>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) <code>int p;</code></div>
                        <div class="option" data-option="B">(B) <code>int *q;</code></div>
                        <div class="option" data-option="C">(C) <code>char *s;</code></div>
                        <div class="option" data-option="D">(D) <code>float **fp;</code></div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路：指標宣告</h4>
                        <p>在 C 語言中，宣告指標變數的特徵是在變數名稱前加上星號 <code>*</code>。星號的數量表示指標的級別（一級指標、二級指標等）。</p>
                        <ul>
                            <li><strong>(A) <code>int p;</code></strong>：這宣告了一個名為 <code>p</code> 的整數型態 (<code>int</code>) 變數。它不是指標變數。</li>
                            <li><strong>(B) <code>int *q;</code></strong>：這宣告了一個名為 <code>q</code> 的指標變數，它可以指向一個整數型態 (<code>int</code>) 的記憶體位置。</li>
                            <li><strong>(C) <code>char *s;</code></strong>：這宣告了一個名為 <code>s</code> 的指標變數，它可以指向一個字元型態 (<code>char</code>) 的記憶體位置。常用於表示字串。</li>
                            <li><strong>(D) <code>float **fp;</code></strong>：這宣告了一個名為 <code>fp</code> 的二級指標變數。它可以指向一個「指向浮點數型態 (<code>float</code>) 的指標」。</li>
                        </ul>
                        <p>因此，<code>int p;</code> 不是一個指標變數的宣告。</p>
                        <p><em>(註：原題目提供之選項與問題不符，此處使用推測的合理選項進行解釋。)</em></p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (A)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q2">下一題</button></div>
                </div>

                <div id="q2" class="quiz-card">
                    <h3>2. (原 Q59) 一 C 語言程式片段如下，當該程式片段執行後，變數 y 之值為下列何者？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
// main() is generally int main() or int main(void)
int main(void) { // Corrected from main()
    int x=1, y=2;
    int *ip;
    ip=&amp;x;
    y=*ip;
    printf("y=%d\n", y);
    return 0; // Added return 0
}</code></pre>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 0</div>
                        <div class="option" data-option="B">(B) 1</div>
                        <div class="option" data-option="C">(C) 2</div>
                        <div class="option" data-option="D">(D) 3</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>讓我們一步步分析程式碼：</p>
                        <ol>
                            <li><code>int x=1, y=2;</code>：宣告整數變數 <code>x</code> 並初始化為 1，宣告整數變數 <code>y</code> 並初始化為 2。
                                <ul><li><code>x</code> 的值是 1。</li><li><code>y</code> 的值是 2。</li></ul>
                            </li>
                            <li><code>int *ip;</code>：宣告一個指向整數的指標 <code>ip</code>。此時 <code>ip</code> 尚未初始化，不指向任何特定記憶體位置。</li>
                            <li><code>ip=&amp;x;</code>：將變數 <code>x</code> 的記憶體位址賦予指標 <code>ip</code>。現在 <code>ip</code> 指向 <code>x</code>。</li>
                            <li><code>y=*ip;</code>：
                                <ul>
                                    <li><code>*ip</code>：解參考指標 <code>ip</code>，取得 <code>ip</code> 所指向的記憶體位置中的值。因為 <code>ip</code> 指向 <code>x</code>，所以 <code>*ip</code> 的值等於 <code>x</code> 的值，即 1。</li>
                                    <li><code>y = *ip;</code>：將 <code>*ip</code> (值為 1) 賦予變數 <code>y</code>。因此，<code>y</code> 的值變為 1。</li>
                                </ul>
                            </li>
                            <li><code>printf("y=%d\n", y);</code>：印出變數 <code>y</code> 的目前值，即 1。</li>
                        </ol>
                        <p>最終，變數 <code>y</code> 的值為 1。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q3">下一題</button></div>
                </div>

                <div id="q3" class="quiz-card">
                    <h3>3. (原 Q60) 執行下列 C 語言函式 arr(9)，回傳之值為何？</h3>
                    <pre><code class="language-c">int arr(int n){
    int i, a[10];
    for(i=n;i&gt;=0;i--) {
        // Added boundary check for safety, though original problem implies n=9
        if (i &lt; 10) {
            a[i]=10-i;
        }
    }
    return (a[2]+a[5]+a[8]);
}</code></pre>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 18</div>
                        <div class="option" data-option="B">(B) 15</div>
                        <div class="option" data-option="C">(C) 12</div>
                        <div class="option" data-option="D">(D) 10</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>當呼叫 <code>arr(9)</code> 時，參數 <code>n</code> 的值為 9。函式內部宣告了一個整數陣列 <code>a</code>，大小為 10 (索引從 0 到 9)。</p>
                        <p>迴圈 <code>for(i=n;i&gt;=0;i--)</code> 的行為 (當 <code>n=9</code>)：</p>
                        <ul>
                            <li><code>i=9</code>: <code>a[9] = 10-9 = 1</code></li>
                            <li><code>i=8</code>: <code>a[8] = 10-8 = 2</code></li>
                            <li><code>i=7</code>: <code>a[7] = 10-7 = 3</code></li>
                            <li><code>i=6</code>: <code>a[6] = 10-6 = 4</code></li>
                            <li><code>i=5</code>: <code>a[5] = 10-5 = 5</code></li>
                            <li><code>i=4</code>: <code>a[4] = 10-4 = 6</code></li>
                            <li><code>i=3</code>: <code>a[3] = 10-3 = 7</code></li>
                            <li><code>i=2</code>: <code>a[2] = 10-2 = 8</code></li>
                            <li><code>i=1</code>: <code>a[1] = 10-1 = 9</code></li>
                            <li><code>i=0</code>: <code>a[0] = 10-0 = 10</code></li>
                        </ul>
                        <p>迴圈結束後，陣列 <code>a</code> 的相關元素值為：</p>
                        <ul>
                            <li><code>a[2] = 8</code></li>
                            <li><code>a[5] = 5</code></li>
                            <li><code>a[8] = 2</code></li>
                        </ul>
                        <p>函式回傳 <code>a[2]+a[5]+a[8]</code>：</p>
                        <p><code>8 + 5 + 2 = 15</code></p>
                        <p>因此，<code>arr(9)</code> 回傳的值是 15。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q4">下一題</button></div>
                </div>

                <div id="q4" class="quiz-card">
                    <h3>4. (原 Q61) 當程式設計的陣列，在執行時發生 "subscript out of range"的系統錯誤時，表示此程式發生以下何種狀況？</h3>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 不合法的運算碼(Illegal Operation Code)</div>
                        <div class="option" data-option="B">(B) 不合法的記憶體存取(Illegal Memory Access)</div>
                        <div class="option" data-option="C">(C) 整數的 Overflow</div>
                        <div class="option" data-option="D">(D) 整數的 Underflow</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路：陣列索引越界</h4>
                        <p>"Subscript out of range" (或類似的 "array index out of bounds") 錯誤訊息意味著程式嘗試存取陣列中一個不存在的索引位置。</p>
                        <p>例如，如果一個陣列宣告為 <code>int arr[10];</code>，其合法的索引範圍是從 0 到 9。若程式嘗試存取 <code>arr[10]</code>、<code>arr[-1]</code> 或任何其他超出此範圍的索引，就會發生此錯誤。</p>
                        <ul>
                            <li><strong>(A) 不合法的運算碼 (Illegal Operation Code):</strong> 通常指 CPU 嘗試執行一個無法識別或無效的機器指令。這與陣列索引無直接關聯。</li>
                            <li><strong>(B) 不合法的記憶體存取 (Illegal Memory Access):</strong> 當程式試圖讀取或寫入其無權存取的記憶體區域時發生。陣列索引越界正是這種情況的一種，因為它試圖存取陣列邊界之外的記憶體，這塊記憶體可能未被分配給該程式，或者用於其他目的。在許多系統上，這會導致作業系統介入並終止程式（例如，產生分段錯誤 Segmentation Fault）。</li>
                            <li><strong>(C) 整數的 Overflow:</strong> 當一個整數運算的結果超出了該整數型態所能表示的最大值時發生。</li>
                            <li><strong>(D) 整數的 Underflow:</strong> 當一個整數運算的結果小於了該整數型態所能表示的最小值時發生（較不常見於一般整數，更常用於浮點數）。</li>
                        </ul>
                        <p>因此，"subscript out of range" 最直接相關的是不合法的記憶體存取。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q5">下一題</button></div>
                </div>

                <div id="q5" class="quiz-card">
                    <h3>5. (原 Q64) 下列何者代表 C 語言裡的 指標？</h3>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) null</div>
                        <div class="option" data-option="B">(B) nil</div>
                        <div class="option" data-option="C">(C) empty</div>
                        <div class="option" data-option="D">(D) not</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路：空指標常數</h4>
                        <p>這個問題可能有些歧義，但從選項來看，它最有可能是在詢問 C 語言中用來表示「指標不指向任何有效物件」的特殊值或概念。</p>
                        <p>在 C 語言中，這個特殊的值是<strong>空指標 (null pointer)</strong>，通常用宏 <code>NULL</code> 來表示。<code>NULL</code> 在標準庫 (如 <code>&lt;stddef.h&gt;</code>, <code>&lt;stdio.h&gt;</code> 等) 中被定義。它通常被定義為 <code>(void*)0</code> 或一個整數常數 0。</p>
                        <p>分析選項：</p>
                        <ul>
                            <li><strong>(A) null:</strong> 雖然 C 語言標準的宏是 <code>NULL</code> (全大寫)，但 "null" 這個詞彙是描述空指標概念的核心。在許多程式語言中，"null" 或類似的詞 (如 "nil", "None") 都用於表示空引用或空指標。如果題目指的是這個概念，"null" 是最接近的。</li>
                            <li><strong>(B) nil:</strong> "nil" 是某些其他程式語言 (如 Pascal, Objective-C, Go, Lisp) 中用來表示空指標或空引用的關鍵字或值，但不是 C 語言的標準術語。</li>
                            <li><strong>(C) empty:</strong> "empty" 通常用於描述集合 (如字串、列表、陣列) 沒有任何元素的情況，與指標本身是否指向有效位置無關。</li>
                            <li><strong>(D) not:</strong> "not" 是一個邏輯運算子 (在 C 中是 <code>!</code>)，與指標概念無關。</li>
                        </ul>
                        <p>鑑於選項，(A) "null" 是最能代表 C 語言中空指標概念的詞彙，即使標準宏是 <code>NULL</code>。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (A)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q6">下一題</button></div>
                </div>

                <div id="q6" class="quiz-card">
                    <h3>6. (原 Q65) 請問以下程式之執行結果為何？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(void) { // Corrected from main()
    int a[5];
    int *pa; // Corrected: was 'int pa;' which is not a pointer. Assumed int *pa;
    a[0]=10; a[1]=20; a[2]=30;
    pa=&amp;a[0];
    // Original: printf("%d",(pa+2)); prints an address.
    // Intended output '30' implies *(pa+2)
    printf("Value of *(pa+2) (intended): %d\n", *(pa+2));
    // printf("Value of (pa+2) (address): %p\n", (void*)(pa+2));
    return 0; // Added return 0
}</code></pre>
                    <div class="quiz-options" data-correct="C">
                        <div class="option" data-option="A">(A) 10</div>
                        <div class="option" data-option="B">(B) 20</div>
                        <div class="option" data-option="C">(C) 30</div>
                        <div class="option" data-option="D">(D) 5</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與指標運算</h4>
                        <p>讓我們分析程式碼：</p>
                        <ol>
                            <li><code>int a[5];</code>：宣告一個包含 5 個整數的陣列 <code>a</code>。</li>
                            <li><code>int *pa;</code>：(假設原意是宣告指標) 宣告一個指向整數的指標 <code>pa</code>。如果原題是 <code>int pa;</code>，則後面 <code>pa=&amp;a[0];</code> 會有型別不匹配的編譯錯誤。我們假設它是 <code>int *pa;</code> 以使程式有意義。</li>
                            <li><code>a[0]=10; a[1]=20; a[2]=30;</code>：初始化陣列 <code>a</code> 的前三個元素。
                                <ul>
                                    <li><code>a[0]</code> 是 10</li>
                                    <li><code>a[1]</code> 是 20</li>
                                    <li><code>a[2]</code> 是 30</li>
                                </ul>
                            </li>
                            <li><code>pa=&amp;a[0];</code>：指標 <code>pa</code> 指向陣列 <code>a</code> 的第一個元素 <code>a[0]</code>。</li>
                            <li><code>printf("%d",(pa+2));</code>：這是問題的關鍵。
                                <ul>
                                    <li><code>pa</code> 是一個指向 <code>a[0]</code> 的指標。</li>
                                    <li><code>pa+2</code> 進行指標運算。它計算出的位址是 <code>pa</code> 指向的位址再往後移動 <code>2 * sizeof(int)</code> 個位元組。因此，<code>pa+2</code> 指向 <code>a[2]</code>。</li>
                                    <li>然而，<code>printf("%d", address_value)</code> 會嘗試將記憶體位址本身解釋為一個整數來列印。這通常不是我們想要的，且結果會因系統而異，但它不是陣列元素的值。</li>
                                    <li><strong>如果題目的意圖是印出 <code>a[2]</code> 的值 (即 30)，則程式碼應該是 <code>printf("%d", *(pa+2));</code>。</strong> 星號 <code>*</code> 是解參考運算子，它會取得指標所指向位置的值。</li>
                                </ul>
                            </li>
                        </ol>
                        <p>由於選項 (C) 是 30，這強烈暗示題目的意圖是想得到 <code>a[2]</code> 的值，即 <code>*(pa+2)</code>。</p>
                        <p>如果嚴格按照 <code>printf("%d",(pa+2));</code> 執行，它會印出 <code>a[2]</code> 的記憶體位址（轉換為整數）。但這不是選項中的任何一個有意義的數值 (10, 20, 30, 5)。</p>
                        <p>假設意圖是 <code>*(pa+2)</code>：</p>
                        <ul>
                            <li><code>pa</code> 指向 <code>a[0]</code>。</li>
                            <li><code>pa+2</code> 指向 <code>a[2]</code>。</li>
                            <li><code>*(pa+2)</code> 的值是 <code>a[2]</code> 的值，即 30。</li>
                        </ul>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (C) (基於對題目意圖的常見理解，即獲取指標指向的值)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q7">下一題</button></div>
                </div>

                <div id="q7" class="quiz-card">
                    <h3>7. (原 Q66) 在 C 程式語言中定義二維整數陣列 a[4][5]，已知一個整數佔用 4 位元組(bytes)，陣列索引值從 0 開始，且知道 C 程式語言以列為主(row-major)方式儲存陣列，則 a[1][3]和 a[3][1]的記憶體位址相差多少個位元組？</h3>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) 20</div>
                        <div class="option" data-option="B">(B) 24</div>
                        <div class="option" data-option="C">(C) 26</div>
                        <div class="option" data-option="D">(D) 28</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路：二維陣列記憶體定址 (列主序)</h4>
                        <p>陣列定義為 <code>int a[4][5];</code>，這表示有 4 列 (row)，每列有 5 個元素 (column)。</p>
                        <p>一個整數 (<code>int</code>) 佔用 4 位元組。</p>
                        <p>C 語言以列為主 (row-major) 方式儲存二維陣列。這意味著第一列的所有元素會先連續儲存，然後是第二列的所有元素，依此類推。</p>
                        <p>元素 <code>a[i][j]</code> 相對於陣列起始位址 (<code>&amp;a[0][0]</code>) 的位元組偏移量計算公式為：</p>
                        <p><code>offset(a[i][j]) = (i * num_columns + j) * sizeof(int)</code></p>
                        <p>其中 <code>num_columns</code> 是 5，<code>sizeof(int)</code> 是 4。</p>
                        <p>計算 <code>a[1][3]</code> 的偏移量：</p>
                        <p><code>offset(a[1][3]) = (1 * 5 + 3) * 4 = (5 + 3) * 4 = 8 * 4 = 32</code> 位元組。</p>
                        <p>計算 <code>a[3][1]</code> 的偏移量：</p>
                        <p><code>offset(a[3][1]) = (3 * 5 + 1) * 4 = (15 + 1) * 4 = 16 * 4 = 64</code> 位元組。</p>
                        <p>兩個記憶體位址的差值 (絕對值)：</p>
                        <p><code>|offset(a[3][1]) - offset(a[1][3])| = |64 - 32| = 32</code> 位元組。</p>
                        <p><b>註：</b>標準計算結果為 32 位元組。然而，原題目提供的選項中並無 32，最接近的選項是 28。這表示原題目或選項可能存在錯誤。如果我們假設相差 7 個元素，則位址差為 <code>7 * 4 = 28</code> 位元組。但在 <code>a[4][5]</code> 陣列中，<code>a[1][3]</code> 和 <code>a[3][1]</code> 之間相差 <code>(3*5+1) - (1*5+3) = 16 - 8 = 8</code> 個元素。此處解說以標準計算為準，但點選符合題目來源的答案 (D)。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (D) (依題目提供答案，但計算應為32)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q8">下一題</button></div>
                </div>

                <div id="q8" class="quiz-card">
                    <h3>8. (原 Q67) 下列程式執行後的輸出結果為？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(void) {
    int ary[3][4];
    int i,j;
    for ( i=0; i&lt;3; i++) {
        for ( j=0; j&lt;4; j++) {
            ary[i][j] = (i+1)*(j+1);
        }
    }
    printf("%d\n", ary[2][3]+ ary[1][2] );
    return 0;
}</code></pre>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 8</div>
                        <div class="option" data-option="B">(B) 18</div>
                        <div class="option" data-option="C">(C) 12</div>
                        <div class="option" data-option="D">(D) 7</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與陣列初始化</h4>
                        <p>首先，我們分析雙重迴圈如何初始化二維陣列 <code>ary[3][4]</code>：</p>
                        <p><code>ary[i][j] = (i+1)*(j+1)</code></p>
                        <ul>
                            <li>當 <code>i=0</code>:
                                <ul>
                                    <li><code>j=0</code>: <code>ary[0][0] = (0+1)*(0+1) = 1*1 = 1</code></li>
                                    <li><code>j=1</code>: <code>ary[0][1] = (0+1)*(1+1) = 1*2 = 2</code></li>
                                    <li><code>j=2</code>: <code>ary[0][2] = (0+1)*(2+1) = 1*3 = 3</code></li>
                                    <li><code>j=3</code>: <code>ary[0][3] = (0+1)*(3+1) = 1*4 = 4</code></li>
                                </ul>
                            </li>
                            <li>當 <code>i=1</code>:
                                <ul>
                                    <li><code>j=0</code>: <code>ary[1][0] = (1+1)*(0+1) = 2*1 = 2</code></li>
                                    <li><code>j=1</code>: <code>ary[1][1] = (1+1)*(1+1) = 2*2 = 4</code></li>
                                    <li><code>j=2</code>: <code>ary[1][2] = (1+1)*(2+1) = 2*3 = 6</code></li>
                                    <li><code>j=3</code>: <code>ary[1][3] = (1+1)*(3+1) = 2*4 = 8</code></li>
                                </ul>
                            </li>
                            <li>當 <code>i=2</code>:
                                <ul>
                                    <li><code>j=0</code>: <code>ary[2][0] = (2+1)*(0+1) = 3*1 = 3</code></li>
                                    <li><code>j=1</code>: <code>ary[2][1] = (2+1)*(1+1) = 3*2 = 6</code></li>
                                    <li><code>j=2</code>: <code>ary[2][2] = (2+1)*(2+1) = 3*3 = 9</code></li>
                                    <li><code>j=3</code>: <code>ary[2][3] = (2+1)*(3+1) = 3*4 = 12</code></li>
                                </ul>
                            </li>
                        </ul>
                        <p>陣列 <code>ary</code> 的內容如下：</p>
                        <pre>
1  2  3  4
2  4  6  8
3  6  9 12
</pre>
                        <p>程式接著要計算 <code>ary[2][3] + ary[1][2]</code>：</p>
                        <ul>
                            <li><code>ary[2][3]</code> 是第3列 (索引2)、第4行 (索引3) 的元素，其值為 12。</li>
                            <li><code>ary[1][2]</code> 是第2列 (索引1)、第3行 (索引2) 的元素，其值為 6。</li>
                        </ul>
                        <p>所以，<code>ary[2][3] + ary[1][2] = 12 + 6 = 18</code>。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q9">下一題</button></div>
                </div>

                <div id="q9" class="quiz-card">
                    <h3>9. (原 Q68) 下列程式執行後的輸出結果為何？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(void) { // main should return int
    int a[] = {8,6,4,2};
    int b[] = {4,3,2,1};
    printf("%d\n",a[b[2]]);
    return 0;
}</code></pre>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) 4</div>
                        <div class="option" data-option="B">(B) 2</div>
                        <div class="option" data-option="C">(C) 6</div>
                        <div class="option" data-option="D">(D) 8</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路：陣列索引</h4>
                        <p>分析程式碼：</p>
                        <ol>
                            <li><code>int a[] = {8,6,4,2};</code>：宣告並初始化陣列 <code>a</code>。
                                <ul>
                                    <li><code>a[0]=8</code>, <code>a[1]=6</code>, <code>a[2]=4</code>, <code>a[3]=2</code></li>
                                </ul>
                            </li>
                            <li><code>int b[] = {4,3,2,1};</code>：宣告並初始化陣列 <code>b</code>。
                                <ul>
                                    <li><code>b[0]=4</code>, <code>b[1]=3</code>, <code>b[2]=2</code>, <code>b[3]=1</code></li>
                                </ul>
                            </li>
                            <li><code>printf("%d\n",a[b[2]]);</code>：這是輸出的關鍵。
                                <ul>
                                    <li>首先計算內部索引 <code>b[2]</code>。從陣列 <code>b</code> 中，<code>b[2]</code> 的值是 2。</li>
                                    <li>然後將 <code>b[2]</code> 的結果 (即 2) 作為陣列 <code>a</code> 的索引：<code>a[2]</code>。</li>
                                    <li>從陣列 <code>a</code> 中，<code>a[2]</code> 的值是 4。</li>
                                </ul>
                            </li>
                        </ol>
                        <p>因此，程式會印出 4。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (A)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q10">下一題</button></div>
                </div>

                <div id="q10" class="quiz-card">
                    <h3>10. (原 Q69) <code>m[] = {1,6,3,4,2,0,3}</code>，<code>n[] = {2,3,1,4,6,0,5}</code>，<code>output = m[n[m[n[4]]]]+n[m[n[m[1]]]];</code> 請問 output 之值為何？</h3>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 9</div>
                        <div class="option" data-option="B">(B) 4</div>
                        <div class="option" data-option="C">(C) 5</div>
                        <div class="option" data-option="D">(D) 7</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路：複雜陣列索引</h4>
                        <p>陣列 <code>m</code> 和 <code>n</code> 的內容如下：</p>
                        <p><code>m = {1, 6, 3, 4, 2, 0, 3}</code> (索引 0 到 6)</p>
                        <p><code>n = {2, 3, 1, 4, 6, 0, 5}</code> (索引 0 到 6)</p>
                        <p>我們要計算 <code>output = m[n[m[n[4]]]] + n[m[n[m[1]]]];</code></p>
                        <p><strong>第一部分：<code>m[n[m[n[4]]]]</code></strong></p>
                        <ol>
                            <li><code>n[4]</code>: 陣列 <code>n</code> 的索引 4 的元素是 6。</li>
                            <li><code>m[n[4]]</code> => <code>m[6]</code>: 陣列 <code>m</code> 的索引 6 的元素是 3。</li>
                            <li><code>n[m[n[4]]]</code> => <code>n[3]</code>: 陣列 <code>n</code> 的索引 3 的元素是 4。</li>
                            <li><code>m[n[m[n[4]]]]</code> => <code>m[4]</code>: 陣列 <code>m</code> 的索引 4 的元素是 2。</li>
                        </ol>
                        <p>所以，第一部分的值是 2。</p>
                        <p><strong>第二部分：<code>n[m[n[m[1]]]]</code></strong></p>
                        <ol>
                            <li><code>m[1]</code>: 陣列 <code>m</code> 的索引 1 的元素是 6。</li>
                            <li><code>n[m[1]]</code> => <code>n[6]</code>: 陣列 <code>n</code> 的索引 6 的元素是 5。</li>
                            <li><code>m[n[m[1]]]</code> => <code>m[5]</code>: 陣列 <code>m</code> 的索引 5 的元素是 0。</li>
                            <li><code>n[m[n[m[1]]]]</code> => <code>n[0]</code>: 陣列 <code>n</code> 的索引 0 的元素是 2。</li>
                        </ol>
                        <p>所以，第二部分的值是 2。</p>
                        <p><strong>總和：</strong></p>
                        <p><code>output = 第一部分 + 第二部分 = 2 + 2 = 4</code>。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q11">下一題</button></div>
                </div>

                <div id="q11" class="quiz-card">
                    <h3>11. (原 Q70) 若宣告一個字元陣列 <code>char str[20] = "Hello world!";</code> 該陣列 <code>str[12]</code> 值為何？</h3>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 未宣告</div>
                        <div class="option" data-option="B">(B) \0</div>
                        <div class="option" data-option="C">(C) !</div>
                        <div class="option" data-option="D">(D) \n</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路：C 字串與空終止符</h4>
                        <p>在 C 語言中，字串是以空終止符 <code>\0</code> (null character) 結束的字元序列。</p>
                        <p>當我們宣告並初始化 <code>char str[20] = "Hello world!";</code>：</p>
                        <ul>
                            <li>陣列 <code>str</code> 的大小是 20 個字元。</li>
                            <li>字串 "Hello world!" 包含 12 個可見字元 (H, e, l, l, o,  , w, o, r, l, d, !)。</li>
                            <li>編譯器會自動在這個字串的末尾添加一個空終止符 <code>\0</code>。</li>
                        </ul>
                        <p>所以，陣列 <code>str</code> 的內容如下 (僅顯示前面部分)：</p>
                        <ul>
                            <li><code>str[0]</code> = 'H'</li>
                            <li><code>str[1]</code> = 'e'</li>
                            <li><code>str[2]</code> = 'l'</li>
                            <li><code>str[3]</code> = 'l'</li>
                            <li><code>str[4]</code> = 'o'</li>
                            <li><code>str[5]</code> = ' '</li>
                            <li><code>str[6]</code> = 'w'</li>
                            <li><code>str[7]</code> = 'o'</li>
                            <li><code>str[8]</code> = 'r'</li>
                            <li><code>str[9]</code> = 'l'</li>
                            <li><code>str[10]</code> = 'd'</li>
                            <li><code>str[11]</code> = '!'</li>
                            <li><code>str[12]</code> = '\0' (空終止符)</li>
                            <li><code>str[13]</code> 到 <code>str[19]</code> 也是 <code>\0</code>，因為字串常數初始化會將剩餘部分填零。</li>
                        </ul>
                        <p><code>strlen("Hello world!")</code> 會回傳 12，因為它計算的是到空終止符之前的字元數量。</p>
                        <p>因此，<code>str[12]</code> 的值是空終止符 <code>\0</code>。</p>
                        <ul>
                            <li>(A) 未宣告：<code>str[12]</code> 是在陣列 <code>str[20]</code> 的合法範圍內，所以它是已宣告且已定義的。</li>
                            <li>(C) !：這是 <code>str[11]</code> 的值。</li>
                            <li>(D) \n：這是換行符，不是字串 "Hello world!" 的一部分，也不是其結尾。</li>
                        </ul>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q12">下一題</button></div>
                </div>

                <div id="q12" class="quiz-card">
                    <h3>12. (原 Q71) 下列程式片段執行過程的輸出為何？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(void) {
    // int i, sum, arr[10]; // Original 'i' is shadowed by loop variables
    int sum, arr[10];
    for (int idx=0; idx&lt;10; idx=idx+1) arr[idx] = idx;
    sum = 0;
    for (int idx=1; idx&lt;9; idx=idx+1) {
        sum = sum - arr[idx-1] + arr[idx] + arr[idx+1];
    }
    printf("%d\n", sum);
    return 0;
}</code></pre>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 44</div>
                        <div class="option" data-option="B">(B) 52</div>
                        <div class="option" data-option="C">(C) 54</div>
                        <div class="option" data-option="D">(D) 63</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與迴圈追蹤</h4>
                        <p><strong>第一步：初始化陣列 <code>arr</code></strong></p>
                        <p><code>for (int idx=0; idx&lt;10; idx=idx+1) arr[idx] = idx;</code></p>
                        <p>陣列 <code>arr</code> 的內容變為：<code>{0, 1, 2, 3, 4, 5, 6, 7, 8, 9}</code>。</p>
                        <p><strong>第二步：計算 <code>sum</code></strong></p>
                        <p><code>sum = 0;</code></p>
                        <p>迴圈 <code>for (int idx=1; idx&lt;9; idx=idx+1)</code> 會執行，其中 <code>idx</code> 的值從 1 到 8。</p>
                        <p><code>sum = sum - arr[idx-1] + arr[idx] + arr[idx+1];</code></p>
                        <p>追蹤 <code>sum</code> 的變化：</p>
                        <table>
                            <thead><tr><th>idx</th><th>arr[idx-1]</th><th>arr[idx]</th><th>arr[idx+1]</th><th>計算</th><th>sum (累計)</th></tr></thead>
                            <tbody>
                                <tr><td>-</td><td>-</td><td>-</td><td>-</td><td>初始</td><td>0</td></tr>
                                <tr><td>1</td><td>arr[0]=0</td><td>arr[1]=1</td><td>arr[2]=2</td><td>0 - 0 + 1 + 2 = 3</td><td>3</td></tr>
                                <tr><td>2</td><td>arr[1]=1</td><td>arr[2]=2</td><td>arr[3]=3</td><td>3 - 1 + 2 + 3 = 7</td><td>7</td></tr>
                                <tr><td>3</td><td>arr[2]=2</td><td>arr[3]=3</td><td>arr[4]=4</td><td>7 - 2 + 3 + 4 = 12</td><td>12</td></tr>
                                <tr><td>4</td><td>arr[3]=3</td><td>arr[4]=4</td><td>arr[5]=5</td><td>12 - 3 + 4 + 5 = 18</td><td>18</td></tr>
                                <tr><td>5</td><td>arr[4]=4</td><td>arr[5]=5</td><td>arr[6]=6</td><td>18 - 4 + 5 + 6 = 25</td><td>25</td></tr>
                                <tr><td>6</td><td>arr[5]=5</td><td>arr[6]=6</td><td>arr[7]=7</td><td>25 - 5 + 6 + 7 = 33</td><td>33</td></tr>
                                <tr><td>7</td><td>arr[6]=6</td><td>arr[7]=7</td><td>arr[8]=8</td><td>33 - 6 + 7 + 8 = 42</td><td>42</td></tr>
                                <tr><td>8</td><td>arr[7]=7</td><td>arr[8]=8</td><td>arr[9]=9</td><td>42 - 7 + 8 + 9 = 52</td><td>52</td></tr>
                            </tbody>
                        </table>
                        <p>迴圈結束後，<code>sum</code> 的最終值為 52。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q13">下一題</button></div>
                </div>

                <div id="q13" class="quiz-card">
                    <h3>13. (原 Q72) 請問下列程式輸出為何？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
int main(void) {
    int A[5], B[5], i, c;
    // Loops use 1-based indexing up to 4. Array size 5 is sufficient.
    for (i=1; i&lt;=4; i=i+1) {
        A[i] = 2 + i*4; // Assuming i4 means i*4
        B[i] = i*5;   // Assuming i5 means i*5
    }
    c = 0;
    for (i=1; i&lt;=4; i=i+1) {
        if (B[i] &gt; A[i]) {
            c = c + (B[i] % A[i]);
        } else {
            c = 1;
        }
    }
    printf("%d\n", c);
    return 0;
}</code></pre>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) 1</div>
                        <div class="option" data-option="B">(B) 4</div>
                        <div class="option" data-option="C">(C) 3</div>
                        <div class="option" data-option="D">(D) 33</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與迴圈追蹤</h4>
                        <p><strong>第一步：初始化陣列 <code>A</code> 和 <code>B</code></strong> (假設 <code>i4</code> 為 <code>i*4</code>，<code>i5</code> 為 <code>i*5</code>)</p>
                        <p>迴圈 <code>for (i=1; i&lt;=4; i=i+1)</code>:</p>
                        <ul>
                            <li><code>i=1</code>: <code>A[1] = 2 + 1*4 = 6</code>, <code>B[1] = 1*5 = 5</code></li>
                            <li><code>i=2</code>: <code>A[2] = 2 + 2*4 = 10</code>, <code>B[2] = 2*5 = 10</code></li>
                            <li><code>i=3</code>: <code>A[3] = 2 + 3*4 = 14</code>, <code>B[3] = 3*5 = 15</code></li>
                            <li><code>i=4</code>: <code>A[4] = 2 + 4*4 = 18</code>, <code>B[4] = 4*5 = 20</code></li>
                        </ul>
                        <p>陣列內容 (僅顯示索引 1-4)：</p>
                        <p><code>A = {?, 6, 10, 14, 18}</code></p>
                        <p><code>B = {?, 5, 10, 15, 20}</code></p>
                        <p><strong>第二步：計算 <code>c</code></strong></p>
                        <p><code>c = 0;</code></p>
                        <p>迴圈 <code>for (i=1; i&lt;=4; i=i+1)</code>:</p>
                        <table>
                            <thead><tr><th>i</th><th>A[i]</th><th>B[i]</th><th>B[i] &gt; A[i]?</th><th>動作</th><th>c (累計)</th></tr></thead>
                            <tbody>
                                <tr><td>-</td><td>-</td><td>-</td><td>-</td><td>初始</td><td>0</td></tr>
                                <tr><td>1</td><td>6</td><td>5</td><td>False (5 &gt; 6 is false)</td><td><code>c = 1</code></td><td>1</td></tr>
                                <tr><td>2</td><td>10</td><td>10</td><td>False (10 &gt; 10 is false)</td><td><code>c = 1</code></td><td>1</td></tr>
                                <tr><td>3</td><td>14</td><td>15</td><td>True (15 &gt; 14 is true)</td><td><code>c = c + (B[3] % A[3]) = 1 + (15 % 14) = 1 + 1 = 2</code></td><td>2</td></tr>
                                <tr><td>4</td><td>18</td><td>20</td><td>True (20 &gt; 18 is true)</td><td><code>c = c + (B[4] % A[4]) = 2 + (20 % 18) = 2 + 2 = 4</code></td><td>4</td></tr>
                            </tbody>
                        </table>
                        <p>迴圈結束後，<code>c</code> 的最終值為 4。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q14">下一題</button></div>
                </div>

                <div id="q14" class="quiz-card">
                    <h3>14. (原 Q73) 定義 a[n]為一陣列(array)，陣列元素的指標為 0 至 n-1。若要將陣列中 a[0]的元素移到 a[n-1]，下列程式片段空白處該塡入何運算式？</h3>
                    <pre><code class="language-c">int i, hold, n; // n is the size of the array
// Assume array 'a' is declared, e.g., int a[n];
// ... array 'a' is filled with values ...
for (i=0; i&lt;= ______ ; i=i+1) {
    hold = a[i];
    a[i] = a[i+1];
    a[i+1] = hold;
}</code></pre>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) n+1</div>
                        <div class="option" data-option="B">(B) n</div>
                        <div class="option" data-option="C">(C) n-1</div>
                        <div class="option" data-option="D">(D) n-2</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路：陣列元素移位</h4>
                        <p>程式的目標是將陣列 <code>a</code> 的第一個元素 <code>a[0]</code> 移動到最後一個位置 <code>a[n-1]</code>。這個移動是透過一系列相鄰元素的交換 (swap) 來實現的，類似氣泡排序的一輪。</p>
                        <p>考慮一個大小為 <code>n</code> 的陣列 <code>a</code>，索引從 <code>0</code> 到 <code>n-1</code>。</p>
                        <p>迴圈的每一次迭代都會將 <code>a[i]</code> 的值與 <code>a[i+1]</code> 的值交換。
                        <ul>
                            <li>當 <code>i=0</code>，<code>a[0]</code> 和 <code>a[1]</code> 交換。原 <code>a[0]</code> 的值現在位於 <code>a[1]</code>。</li>
                            <li>當 <code>i=1</code>，<code>a[1]</code> (即原 <code>a[0]</code>) 和 <code>a[2]</code> 交換。原 <code>a[0]</code> 的值現在位於 <code>a[2]</code>。</li>
                            <li>依此類推...</li>
                        </ul>
                        </p>
                        <p>為了將 <code>a[0]</code> 移動到 <code>a[n-1]</code>，它需要經過 <code>n-1</code> 次這樣的交換。</p>
                        <p>最後一次交換需要將當時位於 <code>a[n-2]</code> 的元素 (即原 <code>a[0]</code>) 與 <code>a[n-1]</code> 交換。
                        這次交換發生在迴圈變數 <code>i</code> 的值為 <code>n-2</code> 時。
                        即 <code>i = n-2</code>: <code>hold = a[n-2]; a[n-2] = a[n-1]; a[n-1] = hold;</code></p>
                        <p>因此，迴圈條件 <code>i &lt;= ______</code> 中的空白處應該填入 <code>n-2</code>，這樣 <code>i</code> 的最大值就是 <code>n-2</code>。</p>
                        <p>如果 <code>i</code> 的上限是：</p>
                        <ul>
                            <li><code>n-1</code>: 當 <code>i = n-1</code> 時，程式會嘗試存取 <code>a[i+1]</code> 即 <code>a[n]</code>，這會超出陣列邊界 (索引越界)。</li>
                            <li><code>n</code> 或 <code>n+1</code>: 同樣會導致更嚴重的索引越界。</li>
                        </ul>
                        <p>所以，為了安全且正確地完成移位，<code>i</code> 的最大值必須是 <code>n-2</code>。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (D)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q15">下一題</button></div>
                </div>

                <div id="q15" class="quiz-card">
                    <h3>15. (原 Q74) 若 A 是一個可儲存 n 筆整數的陣列，且資料儲存於 A[0]~A[n-1]。經過下列程式碼運算後，以下何者敘述不一定正確？</h3>
                    <pre><code class="language-c">// Assume n is defined and A[n] is initialized
// int A[n]={ … };
// int p = q = A[0]; // Assuming n > 0
// for (int i=1; i&lt;n; i=i+1) {
//     if (A[i] &gt; p) p = A[i];
//     if (A[i] &lt; q) q = A[i];
// }</code></pre>
                    <div class="quiz-options" data-correct="C">
                        <div class="option" data-option="A">(A) p 是 A 陣列資料中的最大值</div>
                        <div class="option" data-option="B">(B) q 是 A 陣列資料中的最小值</div>
                        <div class="option" data-option="C">(C) q &lt; p</div>
                        <div class="option" data-option="D">(D) A[0] &lt;= p</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路：尋找最大值與最小值</h4>
                        <p>程式碼的目的是在陣列 <code>A</code> 中找到最大值 (存於 <code>p</code>) 和最小值 (存於 <code>q</code>)。</p>
                        <ol>
                            <li><code>int p = q = A[0];</code>：將 <code>p</code> 和 <code>q</code> 都初始化為陣列的第一個元素 <code>A[0]</code>。這假設陣列至少有一個元素 (<code>n > 0</code>)。</li>
                            <li>迴圈 <code>for (int i=1; i&lt;n; i=i+1)</code>：遍歷陣列從第二個元素到最後一個元素。
                                <ul>
                                    <li><code>if (A[i] &gt; p) p = A[i];</code>：如果目前元素 <code>A[i]</code> 大於目前記錄的最大值 <code>p</code>，則更新 <code>p</code> 為 <code>A[i]</code>。</li>
                                    <li><code>if (A[i] &lt; q) q = A[i];</code>：如果目前元素 <code>A[i]</code> 小於目前記錄的最小值 <code>q</code>，則更新 <code>q</code> 為 <code>A[i]</code>。</li>
                                </ul>
                            </li>
                        </ol>
                        <p>分析選項：</p>
                        <ul>
                            <li><strong>(A) p 是 A 陣列資料中的最大值：</strong> 這是正確的。程式的邏輯確保 <code>p</code> 會被更新為遇到的任何更大的值，最終 <code>p</code> 會是陣列中的最大值。</li>
                            <li><strong>(B) q 是 A 陣列資料中的最小值：</strong> 這是正確的。程式的邏輯確保 <code>q</code> 會被更新為遇到的任何更小的值，最終 <code>q</code> 會是陣列中的最小值。</li>
                            <li><strong>(C) q &lt; p：</strong> 這個敘述<strong>不一定正確</strong>。
                                <ul>
                                    <li>如果陣列中所有元素都相同 (例如 <code>A = {5, 5, 5}</code>)，則 <code>p</code> 和 <code>q</code> 都會是 5，此時 <code>q == p</code>，所以 <code>q < p</code> 為假。</li>
                                    <li>如果陣列只有一個元素 (例如 <code>A = {5}</code>)，則 <code>p</code> 和 <code>q</code> 都會是 5，<code>q < p</code> 為假。</li>
                                    <li>只有當陣列中至少有兩個不同的元素時，才有可能 <code>q < p</code>。</li>
                                </ul>
                            </li>
                            <li><strong>(D) A[0] &lt;= p：</strong> 這是正確的。<code>p</code> 被初始化為 <code>A[0]</code>。之後，<code>p</code> 只會在遇到更大的值時被更新。因此，<code>p</code> 永遠不會小於 <code>A[0]</code>；它要麼等於 <code>A[0]</code>（如果 <code>A[0]</code> 是最大值或所有元素都等於 <code>A[0]</code>），要麼大於 <code>A[0]</code>。所以 <code>A[0] <= p</code> 恆成立。</li>
                        </ul>
                        <p>因此，不一定正確的敘述是 (C) q < p。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (C)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q16">下一題</button></div>
                </div>

                <div id="q16" class="quiz-card">
                    <h3>16. (原 Q75) 右側 F( )函式執行時，若輸入依序為整數 0, 1, 2, 3, 4, 5, 6, 7, 8, 9，請問 X[] 陣列的元素值依順序為何？</h3>
                    <pre><code class="language-c">void F() {
    int X[10] = {0}; // Initialize all to 0
    for (int i=0; i&lt;10; i=i+1) {
        scanf("%d", &amp;X[(i+2)%10]);
    }
    // To see the result, you'd typically print X here.
    // Example: for(int i=0; i&lt;10; i++) printf("%d ", X[i]);
} // Added missing closing brace</code></pre>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) 0, 1, 2, 3, 4, 5, 6, 7, 8, 9</div>
                        <div class="option" data-option="B">(B) 2, 0, 2, 0, 2, 0, 2, 0, 2, 0</div>
                        <div class="option" data-option="C">(C) 9, 0, 1, 2, 3, 4, 5, 6, 7, 8</div>
                        <div class="option" data-option="D">(D) 8, 9, 0, 1, 2, 3, 4, 5, 6, 7</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路與迴圈追蹤</h4>
                        <p>函式 <code>F()</code> 初始化一個大小為 10 的整數陣列 <code>X</code>，所有元素為 0。然後它透過一個迴圈讀取 10 個整數輸入，並將它們存儲到陣列 <code>X</code> 的特定位置。</p>
                        <p>儲存位置由 <code>X[(i+2)%10]</code> 決定。我們需要追蹤當 <code>i</code> 從 0 到 9 變化時，<code>(i+2)%10</code> 的值以及對應的輸入值。</p>
                        <p>輸入序列為：0, 1, 2, 3, 4, 5, 6, 7, 8, 9。</p>
                        <p>初始狀態：<code>X = {0, 0, 0, 0, 0, 0, 0, 0, 0, 0}</code></p>
                        <table>
                            <thead><tr><th>i</th><th>輸入值</th><th>(i+2)%10 (儲存索引)</th><th>X 陣列狀態 (相關索引變動)</th></tr></thead>
                            <tbody>
                                <tr><td>0</td><td>0</td><td>(0+2)%10 = 2</td><td>X[2]=0</td></tr>
                                <tr><td>1</td><td>1</td><td>(1+2)%10 = 3</td><td>X[3]=1</td></tr>
                                <tr><td>2</td><td>2</td><td>(2+2)%10 = 4</td><td>X[4]=2</td></tr>
                                <tr><td>3</td><td>3</td><td>(3+2)%10 = 5</td><td>X[5]=3</td></tr>
                                <tr><td>4</td><td>4</td><td>(4+2)%10 = 6</td><td>X[6]=4</td></tr>
                                <tr><td>5</td><td>5</td><td>(5+2)%10 = 7</td><td>X[7]=5</td></tr>
                                <tr><td>6</td><td>6</td><td>(6+2)%10 = 8</td><td>X[8]=6</td></tr>
                                <tr><td>7</td><td>7</td><td>(7+2)%10 = 9</td><td>X[9]=7</td></tr>
                                <tr><td>8</td><td>8</td><td>(8+2)%10 = 0</td><td>X[0]=8</td></tr>
                                <tr><td>9</td><td>9</td><td>(9+2)%10 = 1</td><td>X[1]=9</td></tr>
                            </tbody>
                        </table>
                        <p>迴圈結束後，陣列 <code>X</code> 的內容變為：</p>
                        <ul>
                            <li><code>X[0] = 8</code> (來自 i=8 的輸入)</li>
                            <li><code>X[1] = 9</code> (來自 i=9 的輸入)</li>
                            <li><code>X[2] = 0</code> (來自 i=0 的輸入)</li>
                            <li><code>X[3] = 1</code> (來自 i=1 的輸入)</li>
                            <li><code>X[4] = 2</code> (來自 i=2 的輸入)</li>
                            <li><code>X[5] = 3</code> (來自 i=3 的輸入)</li>
                            <li><code>X[6] = 4</code> (來自 i=4 的輸入)</li>
                            <li><code>X[7] = 5</code> (來自 i=5 的輸入)</li>
                            <li><code>X[8] = 6</code> (來自 i=6 的輸入)</li>
                            <li><code>X[9] = 7</code> (來自 i=7 的輸入)</li>
                        </ul>
                        <p>所以，陣列 <code>X</code> 的元素值依順序為：<code>8, 9, 0, 1, 2, 3, 4, 5, 6, 7</code>。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (D)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q17">下一題</button></div>
                </div>

                <div id="q17" class="quiz-card">
                    <h3>17. (原 Q76) 若 A[1]、A[2]，和 A[3]分別為陣列 A[ ]的三個元素(element)，下列哪個程式片段可以將 A[1] 和 A[2]的內容交換？</h3>
                    <div class="quiz-options" data-correct="B">
                        <div class="option" data-option="A">(A) <code>A[1] = A[2]; A[2] = A[1];</code></div>
                        <div class="option" data-option="B">(B) <code>A[3] = A[1]; A[1] = A[2]; A[2] = A[3];</code></div>
                        <div class="option" data-option="C">(C) <code>A[2] = A[1]; A[3] = A[2]; A[1] = A[3];</code></div>
                        <div class="option" data-option="D">(D) 以上皆可。</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 解題思路：變數交換邏輯</h4>
                        <p>要交換兩個變數（例如 <code>var1</code> 和 <code>var2</code>）的值，標準的方法是使用一個臨時變數（例如 <code>temp</code>）：</p>
                        <ol>
                            <li><code>temp = var1;</code> (將 var1 的值存到 temp)</li>
                            <li><code>var1 = var2;</code> (將 var2 的值存到 var1，此時 var1 的原值已丟失，但存在 temp 中)</li>
                            <li><code>var2 = temp;</code> (將 temp 中保存的 var1 原值存到 var2)</li>
                        </ol>
                        <p>在題目中，我們要交換 <code>A[1]</code> 和 <code>A[2]</code> 的內容。陣列元素 <code>A[3]</code> 可以作為臨時變數。</p>
                        <p>分析選項：</p>
                        <ul>
                            <li><strong>(A) <code>A[1] = A[2]; A[2] = A[1];</code></strong>
                                <ol>
                                    <li><code>A[1] = A[2];</code>：執行後，<code>A[1]</code> 的值變成了 <code>A[2]</code> 的原值。此時 <code>A[1]</code> 的原始值已經丟失了。</li>
                                    <li><code>A[2] = A[1];</code>：由於 <code>A[1]</code> 現在的值等於 <code>A[2]</code> 的原值，這一步實際上是將 <code>A[2]</code> 的原值又賦給了 <code>A[2]</code>。結果是 <code>A[1]</code> 和 <code>A[2]</code> 都會變成 <code>A[2]</code> 的原始值。交換失敗。</li>
                                </ol>
                            </li>
                            <li><strong>(B) <code>A[3] = A[1]; A[1] = A[2]; A[2] = A[3];</code></strong>
                                <ol>
                                    <li><code>A[3] = A[1];</code>：將 <code>A[1]</code> 的值保存到臨時變數 <code>A[3]</code>。</li>
                                    <li><code>A[1] = A[2];</code>：將 <code>A[2]</code> 的值賦予 <code>A[1]</code>。</li>
                                    <li><code>A[2] = A[3];</code>：將保存在 <code>A[3]</code> 中的 <code>A[1]</code> 的原值賦予 <code>A[2]</code>。</li>
                                </ol>
                                這完全符合標準的交換邏輯。交換成功。
                            </li>
                            <li><strong>(C) <code>A[2] = A[1]; A[3] = A[2]; A[1] = A[3];</code></strong>
                                <ol>
                                    <li><code>A[2] = A[1];</code>：執行後，<code>A[2]</code> 的值變成了 <code>A[1]</code> 的原值。<code>A[2]</code> 的原始值丟失。</li>
                                    <li><code>A[3] = A[2];</code>：由於 <code>A[2]</code> 現在等於 <code>A[1]</code> 的原值，所以 <code>A[3]</code> 也等於 <code>A[1]</code> 的原值。</li>
                                    <li><code>A[1] = A[3];</code>：由於 <code>A[3]</code> 等於 <code>A[1]</code> 的原值，這一步沒有改變 <code>A[1]</code>。結果是 <code>A[1]</code> 和 <code>A[2]</code> 都會變成 <code>A[1]</code> 的原始值。交換失敗。</li>
                                </ol>
                            </li>
                            <li><strong>(D) 以上皆可：</strong>由於 (A) 和 (C) 是錯誤的，此選項也是錯誤的。</li>
                        </ul>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (B)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q1">回到本頁第一題</button></div>
                </div>
                </div>
        </main>

        <div class="resizer" id="dragMe"></div>

        <aside class="interactive-panel">
            <div id="explanation-panel">
                <h3>詳細解說</h3>
                <div id="explanation-content">
                    <p style="color: #888; text-align: center; margin-top: 40px;">請在左側選擇一個題目進行作答，詳解將會顯示於此處。</p>
                </div>
            </div>
        </aside>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const explanationContent = document.getElementById('explanation-content');

            // 處理選項點擊事件
            document.querySelectorAll('.quiz-options').forEach(optionsContainer => {
                optionsContainer.addEventListener('click', function(e) {
                    if (e.target.classList.contains('option') && !this.classList.contains('answered')) {
                        const selectedOption = e.target;
                        const correctAnswer = this.getAttribute('data-correct');
                        const selectedAnswer = selectedOption.getAttribute('data-option');

                        this.classList.add('answered'); // 標記此問題已回答

                        // 標示正確與錯誤選項
                        this.querySelectorAll('.option').forEach(opt => {
                           const optValue = opt.getAttribute('data-option');
                           const feedbackIcon = document.createElement('span');
                           feedbackIcon.classList.add('feedback-icon');

                           if(optValue === correctAnswer){
                               opt.classList.add('correct');
                               feedbackIcon.textContent = ' ✅';
                           } else if (optValue === selectedAnswer) {
                               opt.classList.add('incorrect');
                               feedbackIcon.textContent = ' ❌';
                           }
                           
                           if (opt === selectedOption || optValue === correctAnswer) {
                               if(opt.querySelector('.feedback-icon') == null) {
                                  opt.appendChild(feedbackIcon);
                               }
                           }
                           opt.classList.add('answered');
                        });

                        // **核心修改：將詳解載入到右側面板**
                        const explanation = this.closest('.quiz-card').querySelector('.explanation');
                        if (explanation) {
                            explanationContent.innerHTML = explanation.innerHTML;
                            // 如果詳解中有程式碼，重新觸發 Prism.js 進行語法高亮
                            Prism.highlightAllUnder(explanationContent);
                            // 如果詳解中有 LaTeX，重新觸發 MathJax 進行渲染
                            if (window.MathJax) {
                                MathJax.typesetPromise([explanationContent]);
                            }
                        }
                    }
                });
            });

            // 處理"下一題"按鈕的滾動
            document.querySelectorAll('.next-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });

            // **核心修改：處理面板拖曳功能**
            const resizer = document.getElementById('dragMe');
            const leftSide = document.querySelector('.tutorial-content');
            
            const mouseDownHandler = function (e) {
                // 防止拖曳時選取到文字
                e.preventDefault();

                resizer.classList.add('is-dragging');

                const x = e.clientX;
                const leftWidth = leftSide.getBoundingClientRect().width;

                const mouseMoveHandler = function (e_move) {
                    const dx = e_move.clientX - x;
                    const newLeftWidth = leftWidth + dx;
                    // 設置邊界，防止面板過小或過大
                    const containerWidth = resizer.parentElement.getBoundingClientRect().width;
                    if (newLeftWidth > 350 && newLeftWidth < (containerWidth - 300)) {
                       leftSide.style.width = `${newLeftWidth}px`;
                       // 右側面板寬度會因 flexbox 自動調整
                    }
                };

                const mouseUpHandler = function () {
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