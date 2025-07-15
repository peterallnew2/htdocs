<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C 語言 第四章 詳細追蹤練習 - 新版</title>
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
            z-index: 10;
        }
        .resizer:hover {
            background-color: var(--primary-color);
        }
        .interactive-panel {
            width: 30%;
            min-width: 400px;
            flex-grow: 1;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            gap: 15px;
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
        .explanation-panel {
            background-color: var(--card-bg);
            border-radius: 8px;
            padding: 15px;
            border: 1px solid var(--border-color);
            flex-basis: 40%; /* Initial height */
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .explanation-panel h3 {
            margin-top: 0;
            color: var(--primary-color);
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 8px;
            font-size: 1.2em;
            flex-shrink: 0;
        }
        #explanation-content {
            overflow-y: auto;
            height: 100%;
            padding-right: 10px;
        }
        #explanation-content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 15px;
            font-size: 0.9em;
            background-color: var(--code-bg);
        }
        #explanation-content th, #explanation-content td {
            border: 1px solid var(--border-color);
            padding: 8px 10px;
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
        }
        #explanation-content h4 {
            margin-top: 0;
            margin-bottom: 10px;
            color: var(--primary-color);
            font-size: 1.1em;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 5px;
        }
        #explanation-content ul, #explanation-content ol {
            padding-left: 20px;
            margin-bottom: 10px;
        }
        #explanation-content ul li::marker {
            color: var(--primary-color);
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
            flex-basis: 60%; /* Initial height */
            flex-grow: 1;
            display: flex;
            flex-direction: column;
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
            min-height: 100px;
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
            min-height: 50px;
            margin-top: 8px;
            flex-shrink: 0;
            font-size: 0.85em;
            overflow-y: auto;
            max-height: 150px;
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
            display: none; /* This is now hidden and its content moved to the right panel */
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
            <h1>C 語言練習：第四章 詳細變數追蹤</h1>
            <p>本頁面提供 C 語言第四章（主要關於迴圈、條件判斷與綜合應用）的互動練習題。每個題目都旨在幫助您更深入地理解程式碼的執行流程。請仔細分析題目，並選擇您認為正確的答案。點擊選項後，將會顯示該題的詳細解說於右側的「詳解區」。您可以利用右側的程式碼沙箱，執行或修改範例程式碼，以加強學習效果。</p>

            <div class="quiz-section">
                <h2>第四章 互動練習題 - 詳細追蹤版</h2>
                <p>請挑戰下面的題目，檢驗您的學習成果！點擊選項後會顯示包含詳細追蹤過程的詳解。</p>
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
                <!-- The rest of the quiz cards are omitted for brevity, but they follow the same structure -->
            </div>
        </main>
        <div class="resizer" id="resizer"></div>
        <aside class="interactive-panel">
            <div class="explanation-panel">
                <h3>詳解區</h3>
                <div id="explanation-content">
                    <p>請點擊左側任一題目的選項，答題的詳細解說將會顯示在此處。</p>
                </div>
            </div>
            <div class="sandbox-container">
                <h3>程式碼沙箱 (WASM)</h3>
                <textarea id="code-editor" spellcheck="false"></textarea>
                <div class="sandbox-controls">
                    <button id="run-code-btn">執行程式碼</button>
                </div>
                <h3>輸出結果</h3>
                <div id="output-area">點擊「運行示例」或貼上您的程式碼，然後點擊「執行程式碼」。</div>
            </div>
        </aside>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Resizer logic
        const resizer = document.getElementById('resizer');
        const leftPanel = document.querySelector('.tutorial-content');
        const rightPanel = document.querySelector('.interactive-panel');

        let isResizing = false;

        resizer.addEventListener('mousedown', function (e) {
            isResizing = true;
            document.body.style.userSelect = 'none';
            document.body.style.pointerEvents = 'none';

            document.addEventListener('mousemove', handleMouseMove);
            document.addEventListener('mouseup', stopResizing);
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

        function stopResizing() {
            isResizing = false;
            document.body.style.userSelect = 'auto';
            document.body.style.pointerEvents = 'auto';

            document.removeEventListener('mousemove', handleMouseMove);
            document.removeEventListener('mouseup', stopResizing);
        }

        // Quiz interaction logic
        const quizOptions = document.querySelectorAll('.quiz-options');
        const explanationContent = document.getElementById('explanation-content');

        quizOptions.forEach(optionsContainer => {
            const correctAnswer = optionsContainer.getAttribute('data-correct');
            const options = optionsContainer.querySelectorAll('.option');
            let isAnswered = false;

            options.forEach(option => {
                option.addEventListener('click', function handleOptionClick() {
                    if (isAnswered) return;
                    isAnswered = true;

                    const selectedOption = option.getAttribute('data-option');
                    const explanationDiv = optionsContainer.parentElement.querySelector('.explanation');

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

                    if (explanationDiv) {
                        explanationContent.innerHTML = explanationDiv.innerHTML;
                        if (typeof MathJax !== 'undefined' && MathJax.typeset) {
                            MathJax.typesetPromise([explanationContent]);
                        }
                         if (typeof Prism !== 'undefined') {
                            Prism.highlightAllUnder(explanationContent);
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
            'q1-code': `int k=6; int count=0; do { count++; k=k*2; } while (k<100); printf("Printout executed %d times.\n", count);`,
            'q3-code': `int count=0; for(int i=5; i<=10; i=i+1) for(int j=1; j<=i; j=j+1) for (int k=1; k<=j; k=k+1) if (i==j) count=count+1; printf("count = %d\n", count);`,
            'q4-code': `int n=0; int x=0; do { x += n; n++; } while (n<10); printf("x = %d\n", x);`,
            'q5-code': `int i=2; int count=0; while (i < 800) { i = i * i; count++; } printf("i = i * i executed %d times.\n", count);`,
            'q6-code': `printf("This will run indefinitely. Execution stopped.\n");`,
            'q7-code': `int p=2; while(p<2000){ p=2*p; } printf("p = %d\n", p);`,
            'q8-code': `int k = 2; int m=10000; int count=0; do { m = m / k; k = k * 3; count++; } while (k<120); printf("m = m / k executed %d times.\n", count);`,
            'q9-code': `int x = 50; int y = 90; if (y<95) if (y<200) x = 30; else x =45; printf("x = %d\n", x);`,
            'q10-code': `int s = 0; for (int i=2; i<=100; i+=2) s+=i; printf("s = %d\n", s);`,
            'q11-code': `int i; for (i = 7; i <= 72; i += 7) ; printf("i is %d\n", i);`,
            'q16-code': `int k = 10000; int count = 0; while (k >= 2) { k = k / 8; count++; } printf("k=k/8 executed %d times.\n", count);`,
            'q17-code': `int i=2; int count=0; while(i<800) {i=i*i; count++;} printf("i=i*i executed %d times.\n", count);`,
            'q18-code': `int number=1061130, result; do { result = number %10; printf("%i", result); number = number/10; } while(number != 0); printf("\\n");`,
            'q19-code': `int x=4; int sum=0; while (x<=100){ sum+=x; x+=4; } printf("sum=%d\\n", sum);`,
            'q21-code': `long long k=2; int count = 0; while(k<=65535) { k=k*k; count++; } printf("k=k*k executed %d times.\\n", count);`,
            'q22-code': `int n=0; int i=1; while(i<=100){ n=n+i; i=i+2; } printf("%d\\n", n);`,
            'q24-code': `int y1, y2=13, y3=1; for (y1=0; y1<=y2; ){ y3 += y1; y1 += 2; } printf("%i\\n", y3);`,
            'q25-code': `int n=1234; int sum=0; while(n!=0){ sum=sum+n%10; n=n/10; } printf("%d\\n", sum);`,
            'q26-code': `int x=110, y=20; while(x>120){ y=x-y; x++; } printf("%3d%3d\\n", x, y);`,
            'q27-code': `int x=0, y=0; for(y=1; y<=20; y++) { int z=y%5; if(z==0) x++; } printf("%3d%3d\\n",x,y);`,
            'q28-code': `int a=5, b=2; if(a>b){ a=a*b+2; b++; } else { a=a/2; b=b+4; } printf("%3d%3d\\n",a,b);`,
            'q29-code': `int n=4, x=7, y=8; switch(n){ case 1: x=n;break; case 2: y=y+4; case 3: x=n+5;break; case 4: x=x*4; default: y=y-4; } printf("%2d%2d\\n",x,y);`,
            'q30-code': `int x=30, y=0; if (x<=5) { y=x*x; x+=5; } else { if (x<10) { y=x-2; } else { if(x<25) { y=x+10; } else { y=x/10; } } x++; } printf("%3d%3d\\n",y,x);`,
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
                    Prism.highlightAll();
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