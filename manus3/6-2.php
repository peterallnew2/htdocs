<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C 語言 函式與遞迴 (修改版)</title>

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
            --primary-color: #4a90e2; /* A slightly more vibrant blue */
            --background-color: #1e1e1e; /* Dark background for editor-like feel */
            --text-color: #dcdcdc; /* Light grey for text, good contrast on dark */
            --header-color: #ffffff; /* White for main headers */
            --card-bg: #2d2d2d; /* Slightly lighter dark for cards */
            --border-color: #444; /* Subtle border color */
            --code-bg: #282c34; /* Common dark code editor background */
            --success-color: #73c990; /* Green for correct answers */
            --error-color: #f47174; /* Red for incorrect answers */
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
            overflow: hidden; /* Hide body overflow */
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
            min-width: 350px; /* Minimum width for tutorial content */
            padding: 20px 40px;
            box-sizing: border-box;
            overflow-y: auto; /* Allow scrolling for questions */
            height: 100vh;
        }
        .resizer {
            width: 8px;
            cursor: col-resize;
            background-color: var(--border-color);
            flex-shrink: 0;
            transition: background-color 0.2s;
        }
        .resizer:hover, .resizer.is-dragging {
            background-color: var(--primary-color);
        }
        .interactive-panel {
            width: 30%;
            min-width: 300px; /* Minimum width for interactive panel */
            flex-grow: 1;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
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
        code:not(pre > code) { /* Inline code */
            background-color: var(--card-bg);
            color: var(--primary-color);
            padding: 2px 6px;
            border-radius: 4px;
            font-family: var(--font-code);
        }
        pre { /* Code blocks */
            margin: 0.8em 0;
            padding: 10px;
            background-color: var(--code-bg);
            border-radius: 4px;
            overflow-x: auto;
            font-size: 0.85em;
        }
        
        /* Explanation styles (originally for inline, now for right panel) */
        /* This hidden div holds the source content for explanations */
        .explanation-source {
            display: none;
        }
        
        .explanation-container {
            background-color: var(--card-bg);
            border-radius: 8px;
            padding: 15px;
            border: 1px solid var(--border-color);
            width: 100%;
            display: flex;
            flex-direction: column;
            overflow-y: auto; /* Allow scrolling for long explanations */
        }

        .explanation-container h3 {
            margin-top: 0;
            color: var(--primary-color);
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 8px;
            font-size: 1.2em;
            flex-shrink: 0;
        }

        #explanation-content {
            padding-top: 10px;
            flex-grow: 1;
            font-size: 0.9em;
            line-height: 1.6;
        }

        /* Styles for content dynamically injected into #explanation-content */
        #explanation-content h4 {
            margin-top: 5px;
            margin-bottom: 10px;
            color: var(--primary-color);
            font-size: 1.1em;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 5px;
        }
        #explanation-content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
            margin-bottom: 12px;
            font-size: 0.9em;
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
        #explanation-content pre {
            margin: 0.5em 0;
            padding: 8px;
            background-color: rgba(0,0,0,0.2);
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        #explanation-content .code-block-within-explanation pre {
             background-color: var(--code-bg);
        }

        /* Quiz Card Styling */
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
    </style>
</head>
<body>
    <div class="container">
        <main class="tutorial-content">
            <h1>C 語言練習：第六章 - 函式、遞迴與參數傳遞</h1>
            <p>本頁面為 C/C++ 語言第六章練習題 (第 1-25 題)。此章節著重於函式的定義與呼叫、遞迴的觀念與應用、參數傳遞方式 (傳值、傳址) 的理解，以及相關的標準函式庫使用。請仔細分析每個問題，並在選擇答案後於右側面板查看詳細解說。</p>

            <div class="quiz-section">
                <h2>第六章 互動練習題組 (1/1)</h2>
                <p>請挑戰下面的題目，檢驗您的學習成果！</p>
                
                <div id="q1" class="quiz-card">
                    <h3>1. 下列是一個用 C 的語法寫成的程式，請問程式執行結束時，變數 value 之值為何？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;
void swap(int *a, int *b){
    int t;
    t=*a;
    *a=*b;
    *b=t;
}
int main(void){
    int value=1, list[5]={0,2,4,6,8};
    swap(&amp;list[2],&amp;list[3]);
    swap(&amp;value,&amp;list[3]);
    swap(&amp;value,&amp;list[value]);
    return 0;
}</code></pre>
                    <div class="quiz-options" data-correct="D">
                        <div class="option" data-option="A">(A) 1</div>
                        <div class="option" data-option="B">(B) 4</div>
                        <div class="option" data-option="C">(C) 6</div>
                        <div class="option" data-option="D">(D) 8</div>
                    </div>
                    <div class="explanation-source">
                        <h4>✓ 解題思路與變數追蹤</h4>
                        <p>我們需要逐步追蹤變數 <code>value</code> 和陣列 <code>list</code> 的變化。</p>
                        <p><strong>初始狀態：</strong></p>
                        <ul>
                            <li><code>value = 1</code></li>
                            <li><code>list = {0, 2, 4, 6, 8}</code> (即 <code>list[0]=0, list[1]=2, list[2]=4, list[3]=6, list[4]=8</code>)</li>
                        </ul>
                        <p><strong>第一次交換：<code>swap(&amp;list[2], &amp;list[3]);</code></strong></p>
                        <ul>
                            <li>交換 <code>list[2]</code> (值為 4) 和 <code>list[3]</code> (值為 6)。</li>
                            <li>之後：<code>list[2] = 6</code>, <code>list[3] = 4</code>。</li>
                            <li><code>value</code> 仍為 1。</li>
                            <li><code>list</code> 變為 <code>{0, 2, 6, 4, 8}</code>。</li>
                        </ul>
                        <p><strong>第二次交換：<code>swap(&amp;value, &amp;list[3]);</code></strong></p>
                        <ul>
                            <li>交換 <code>value</code> (值為 1) 和 <code>list[3]</code> (目前值為 4)。</li>
                            <li>之後：<code>value = 4</code>, <code>list[3] = 1</code>。</li>
                            <li><code>list</code> 變為 <code>{0, 2, 6, 1, 8}</code>。</li>
                        </ul>
                        <p><strong>第三次交換：<code>swap(&amp;value, &amp;list[value]);</code></strong></p>
                        <ul>
                            <li>此時 <code>value</code> 的值是 4。</li>
                            <li>所以 <code>list[value]</code> 指的是 <code>list[4]</code>。</li>
                            <li><code>list[4]</code> 的值是 8。</li>
                            <li>交換 <code>value</code> (目前值為 4) 和 <code>list[4]</code> (值為 8)。</li>
                            <li>之後：<code>value = 8</code>, <code>list[4] = 4</code>。</li>
                            <li><code>list</code> 變為 <code>{0, 2, 6, 1, 4}</code>。</li>
                        </ul>
                        <p>程式執行結束時，變數 <code>value</code> 的值為 8。</p>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (D)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q2">下一題</button></div>
                </div>

                <div id="q2" class="quiz-card">
                    <h3>2. 下列哪一種演算法採用重複呼叫自己，直至達到設定條件滿足後才逐層跳脫。</h3>
                    <div class="quiz-options" data-correct="C">
                        <div class="option" data-option="A">(A) 搜尋</div>
                        <div class="option" data-option="B">(B) 反覆</div>
                        <div class="option" data-option="C">(C) 遞迴</div>
                        <div class="option" data-option="D">(D) 排序</div>
                    </div>
                    <div class="explanation-source">
                        <h4>✓ 解題思路：演算法特性</h4>
                        <ul>
                            <li><strong>(A) 搜尋 (Searching):</strong> 搜尋演算法的目的是在資料集合中尋找特定的項目。例如線性搜尋、二元搜尋。它們不一定涉及重複呼叫自己。</li>
                            <li><strong>(B) 反覆 (Iteration):</strong> 反覆通常指使用迴圈 (如 for, while) 來重複執行一段程式碼，直到滿足某個終止條件。這與函式呼叫自己不同。</li>
                            <li><strong>(C) 遞迴 (Recursion):</strong> 遞迴是一種演算法或函式設計技巧，其中函式會直接或間接地呼叫自己。每次呼叫都會處理問題的一個較小部分，直到達到一個或多個「基本情況」(base case) 或設定條件，此時遞迴停止，結果會逐層回傳並組合。這完全符合題目描述的「重複呼叫自己，直至達到設定條件滿足後才逐層跳脫」。</li>
                            <li><strong>(D) 排序 (Sorting):</strong> 排序演算法的目的是將資料集合依照特定的順序排列。例如氣泡排序、快速排序。有些排序演算法 (如快速排序、合併排序) 可以用遞迴方式實現，但「排序」本身是一個目標，而不是描述這種自我呼叫機制的術語。</li>
                        </ul>
                        <h4>✓ 正確答案</h4> <p>本題的正確答案是： (C)</p>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q3">下一題</button></div>
                </div>

                </div>
        </main>

        <div class="resizer" id="dragMe"></div>

        <aside class="interactive-panel">
            <div class="explanation-container">
                <h3>詳細解說</h3>
                <div id="explanation-content">
                    <p style="color: #aaa; font-style: italic; text-align: center; margin-top: 20px;">
                        請先在左側選擇任一題的答案，<br>此處將會顯示該題的詳細解說。
                    </p>
                </div>
            </div>
        </aside>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Quiz interaction logic ---
            const explanationPanel = document.getElementById('explanation-content');

            document.querySelectorAll('.quiz-options').forEach(optionsContainer => {
                optionsContainer.addEventListener('click', function(e) {
                    // Check if the clicked element is an option and the question hasn't been answered yet
                    if (e.target.classList.contains('option') && !this.classList.contains('answered')) {
                        this.classList.add('answered'); // Mark question as answered
                        
                        const selectedOption = e.target;
                        const correctAnswer = this.getAttribute('data-correct');
                        const selectedAnswer = selectedOption.getAttribute('data-option');

                        // Provide visual feedback on all options
                        this.querySelectorAll('.option').forEach(opt => {
                           const optValue = opt.getAttribute('data-option');
                           const feedbackIcon = document.createElement('span');
                           feedbackIcon.classList.add('feedback-icon');

                           if (optValue === correctAnswer) {
                               opt.classList.add('correct');
                               feedbackIcon.textContent = ' ✅';
                           } else if (optValue === selectedAnswer) {
                               opt.classList.add('incorrect');
                               feedbackIcon.textContent = ' ❌';
                           }

                           // Add icon to the selected answer and the correct answer
                           if (opt === selectedOption || optValue === correctAnswer) {
                                if (opt.querySelector('.feedback-icon') == null) {
                                   opt.appendChild(feedbackIcon);
                                }
                           }
                           opt.classList.add('answered'); // Make all options non-clickable
                        });
                        
                        // Load the explanation into the right panel
                        const explanationSource = this.closest('.quiz-card').querySelector('.explanation-source');
                        if (explanationSource && explanationPanel) {
                            explanationPanel.innerHTML = explanationSource.innerHTML;

                            // Re-render MathJax and Prism for the new content
                            if (window.MathJax) {
                                MathJax.typesetPromise([explanationPanel]);
                            }
                            if (window.Prism) {
                                Prism.highlightAllUnder(explanationPanel);
                            }
                        }
                    }
                });
            });

            // --- "Next" button scroll logic ---
            document.querySelectorAll('.next-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });

            // --- Panel resizing logic ---
            const resizer = document.getElementById('dragMe');
            const leftSide = document.querySelector('.tutorial-content');
            
            const mouseDownHandler = function (e) {
                resizer.classList.add('is-dragging');
                const x = e.clientX;
                const leftWidth = leftSide.getBoundingClientRect().width;

                // Create a temporary overlay to prevent iframe/other elements from stealing mouse events
                const overlay = document.createElement('div');
                overlay.style.position = 'fixed';
                overlay.style.top = '0';
                overlay.style.left = '0';
                overlay.style.width = '100%';
                overlay.style.height = '100%';
                overlay.style.cursor = 'col-resize';
                overlay.style.zIndex = '9999';
                document.body.appendChild(overlay);

                const mouseMoveHandler = function (e_move) {
                    const dx = e_move.clientX - x;
                    const newLeftWidth = leftWidth + dx;
                    // Add constraints to prevent panels from becoming too small
                    if (newLeftWidth > 350 && newLeftWidth < (document.body.clientWidth - 300)) {
                       leftSide.style.width = `${newLeftWidth}px`;
                    }
                };

                const mouseUpHandler = function () {
                    resizer.classList.remove('is-dragging');
                    document.body.removeChild(overlay);
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