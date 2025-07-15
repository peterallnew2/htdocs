<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C 語言互動教學 (可拖曳版面)</title>

    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>

    <script>
    MathJax = {
      tex: {
        inlineMath: [['$', '$'], ['\$', '\$']],
        displayMath: [['$$', '$$'], ['\$$', '\$$']]
      }
    };
    </script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&family=Source+Code+Pro:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- 引入 Split.js -->
    <script src="https://unpkg.com/split.js/dist/split.min.js"></script>

    <style>
        /* 沿用大部分 styles.css 的樣式 */
        .container {
            display: flex;
            height: 100vh;
            width: 100%;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .split {
            display: flex;
            flex-direction: row;
            width: 100%;
            height: 100%;
        }

        .gutter {
            background-color: #eee;
            background-repeat: no-repeat;
            background-position: 50%;
        }

        .gutter.gutter-horizontal {
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAeCAYAAADkftS9AAAAIklEQVQoU2M4c+bMfxl79uzZDC4whs8gTDAjA5jHwHw4jA8ADpWfS/o2H54AAAAASUVORK5CYII=');
            cursor: col-resize;
        }

        .tutorial-content, .interactive-panel {
            height: 100%;
            overflow-y: auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .interactive-panel {
            background-color: #f7f7f7;
            border-left: 1px solid #ddd;
        }

        #explanation-area {
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            height: 100%;
        }
        #explanation-area h4 {
            margin-top: 0;
            color: #007bff;
        }
        #explanation-area pre {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        
        /* 隱藏原本的詳解區和下一題按鈕 */
        .quiz-card .explanation,
        .quiz-card .next-btn-container {
            display: none;
        }
        
        /* 顯示點擊後才出現的下一題按鈕 */
        .quiz-card .next-btn-container.visible {
            display: block;
            margin-top: 15px;
        }

    </style>
</head>
<body>

    <div class="container split">
        <main class="tutorial-content">
            <h1>C 語言入門：變數、常數與基本概念</h1>
            <p>歡迎來到 C 語言的互動學習之旅！本章節將帶您了解程式設計中最基本的元素：變數與常數。</p>

            <h2>2-3 基本輸入輸出 (變數篇)</h2>
            <p>程式執行時使用的資料，會暫時存在記憶體中，這些暫存的資料稱為<strong>變數 (Variable)</strong>。</p>

            <div class="knowledge-point">
                <h3>變數宣告</h3>
                <p>在使用變數前，必須先宣告變數，宣告的目的是定義變數的名稱與資料型態，以便編譯器能配置適當的記憶體空間。</p>
                <p><strong>宣告語法：</strong></p>
                <pre><code class="language-c">資料型態 變數名稱;</code></pre>
                <p><strong>宣告並給予初始值：</strong></p>
                <pre><code class="language-c">資料型態 變數名稱 = 初始值;</code></pre>
            </div>

            <div class="knowledge-point">
                <h3>識別字 (Identifier) 命名規則</h3>
                <p>變數名稱必需是合法的<strong>識別�� (Identifier)</strong>，需符合下列規則：</p>
                <ul>
                    <li>(1) 可以使用英文字母 (a-z, A-Z)、阿拉伯數字 (0-9)，以及底線 `_`。不可以使用特殊字元 (如 @, #, %, &, *)。</li>
                    <li>(2) 不能使用阿拉伯數字開頭。例如 `1var` 是錯誤的。</li>
                    <li>(3) 英文的大小寫有區別。例如 `myVar` 和 `myvar` 是不同的變數。</li>
                    <li>(4) 不能使用 C 語言的關鍵字 (Keywords) 或保留字 (Reserved Word)，如 `int`, `for`, `while` 等。</li>
                </ul>
            </div>

            <div class="quiz-section">
                <h2>2-5 程式設計實習 (互動題庫)</h2>
                <p>完成左側的學習後，試著挑戰下面的題目，檢驗你的學習成果！</p>

                <div id="q1" class="quiz-card">
                    <h3>1. 要在同一行程式碼中宣告多個整數變數，要使用哪一個符號間隔？</h3>
                    <div class="quiz-options" data-correct="A">
                        <div class="option" data-option="A">(A) `,`</div>
                        <div class="option" data-option="B">(B) `.`</div>
                        <div class="option" data-option="C">(C) `；` (全形分號)</div>
                        <div class="option" data-option="D">(D) `.`</div>
                    </div>
                    <div class="explanation">
                        <h4>✓ 考點說明：多變數宣告語法</h4><p>在 C 語言中，若要於單一敘述中宣告多個相同型別的變數，應使用半形的逗號 <code>,</code> 來分隔各個變數名稱。</p><pre><code class="language-c">// 正確語法
int a = 1, b = 2, c = 3;</code></pre>
                        <h4>✗✗ 錯誤選項原因</h4><ul><li><b>(B) . (句點):</b> 在 C 中主要用於存取 struct 或 union 的成員。</li><li><b>(C) ； (全形分號):</b> C 語言的語法符號皆為半形，全形字元會導致編譯錯誤。</li><li><b>(D) . (句號):</b> 同 (B)。</li></ul>
                    </div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q2">下一題</button></div>
                </div>
                <div id="q2" class="quiz-card" style="display:none;">
                    <h3>2. 下面哪一個是合法的變數名稱？</h3>
                    <div class="quiz-options" data-correct="D"><div class="option" data-option="A">(A) %123abc</div><div class="option" data-option="B">(B) &123abc</div><div class="option" data-option="C">(C) @123abc</div><div class="option" data-option="D">(D) _123abc</div></div>
                    <div class="explanation"><h4>✓ 考點說明：識別字命名規則</h4><p>C 語言的識別字 (包含變數名稱) 只能由英文字母、數字和底線 <code>_</code> 組成，且不能以數字開頭。底線 <code>_</code> 是唯一一個可以作為開頭的非英文字母字元。</p><h4>✗✗ 錯誤選項原因</h4><ul><li><b>(A) %123abc:</b> 包含特殊字元 <code>%</code>���不合法。</li><li><b>(B) &123abc:</b> 包含特殊字元 <code>&</code>，不合法。</li><li><b>(C) @123abc:</b> 包含特殊字元 <code>@</code>，不合法。</li></ul></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q10">下一題</button></div>
                </div>
                <div id="q10" class="quiz-card" style="display:none;">
                    <h3>10. 一程式片段如下，請問執行後的輸出為何？</h3>
                    <pre><code class="language-c">#include &lt;stdio.h&gt;

void main() {
    enum color {Red=1, Blue, Yellow, Green, Black, White};
    color c = Yellow;
    printf("%d", c);
}
                    </code></pre>
                    <div class="quiz-options" data-correct="D"><div class="option" data-option="A">(A) 0</div><div class="option" data-option="B">(B) 1</div><div class="option" data-option="C">(C) 2</div><div class="option" data-option="D">(D) 3</div></div>
                    <div class="explanation"><h4>✓ 考點說明：`enum` (列舉) 的值分配</h4><p>在 `enum` 中，如果沒有為成員明確指定值，它會自動被設定為前一個成員的值加 1。如果第一個成員沒有指定值，則預設為 0。</p><h4>✓ 逐行程式碼註釋</h4><pre><code class="language-c">// 宣告一個名為 color 的列舉型別
// Red 被明確指定為 1
// Blue 未指定，所以其值為 Red + 1 = 2
// Yellow 未指定，所以其值為 Blue + 1 = 3
// Green = 4, Black = 5, White = 6
enum color {Red=1, Blue, Yellow, Green, Black, White};

// 宣告一個 color 型別的變數 c，並將其值設為 Yellow
// 此時 c 的內部整數值為 3
color c = Yellow;

// 使用 %d 格式化輸出整數，將 c 的值 (3) 印出
printf("%d", c);</code></pre><p>因此，程式會輸出 `3`。</p></div>
                    <div class="next-btn-container"><button class="next-btn" data-target="#q1">回到第一題</button></div>
                </div>
            </div>
        </main>

        <aside class="interactive-panel">
            <div id="explanation-area">
                <p>請在左側選擇答案，此處將會顯示詳解。</p>
            </div>
        </aside>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const quizCards = document.querySelectorAll('.quiz-card');
        const explanationArea = document.getElementById('explanation-area');

        // 處理答案點擊
        function handleOptionClick(event) {
            const selectedOption = event.currentTarget;
            const optionsContainer = selectedOption.parentElement;
            const quizCard = optionsContainer.closest('.quiz-card');
            
            // 防止重複點擊
            if (optionsContainer.dataset.answered === 'true') {
                return;
            }
            optionsContainer.dataset.answered = 'true';

            const explanation = quizCard.querySelector('.explanation').innerHTML;
            const correctOption = optionsContainer.dataset.correct;
            const selected = selectedOption.dataset.option;

            // 1. 將詳細解說顯示在右側互動區
            explanationArea.innerHTML = explanation;
            // 如果詳解中有程式碼，需要重新觸發 Prism.js 進行高亮
            Prism.highlightAllUnder(explanationArea);

            // 標示答案對錯
            Array.from(optionsContainer.children).forEach(opt => {
                opt.classList.remove('correct', 'incorrect');
                if (opt.dataset.option === correctOption) {
                    opt.classList.add('correct');
                } else if (opt.dataset.option === selected) {
                    opt.classList.add('incorrect');
                }
            });

            // 顯示下一題按鈕
            const nextBtnContainer = quizCard.querySelector('.next-btn-container');
            if (nextBtnContainer) {
                nextBtnContainer.classList.add('visible');
            }
        }

        // 處理下一題按鈕點擊
        function handleNextClick(event) {
            const currentCard = event.target.closest('.quiz-card');
            const targetId = event.target.dataset.target;
            
            currentCard.style.display = 'none';
            document.querySelector(targetId).style.display = 'block';
            
            // 清空右側詳解區
            explanationArea.innerHTML = '<p>請在左側選擇答案，此處將會顯示詳解。</p>';
        }
        
        // 為所有選項按鈕綁定點擊事件
        document.querySelectorAll('.option').forEach(option => {
            option.addEventListener('click', handleOptionClick);
        });

        // 為所有下一題按鈕綁定點擊事件
        document.querySelectorAll('.next-btn').forEach(btn => {
            btn.addEventListener('click', handleNextClick);
        });

        // 2. 初始化 Split.js 讓教學區與互動區可拖曳
        Split(['.tutorial-content', '.interactive-panel'], {
            sizes: [70, 30],      // 初始比例
            gutterSize: 8,        // 拖曳條的寬度
            cursor: 'col-resize', // 滑鼠樣式
            minSize: 200,         // 最小寬度
        });
    });
    </script>
</body>
</html>
