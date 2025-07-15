<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>C語言互動式學習</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            overflow: hidden; /* 防止滾動條出現 */
        }
        .container {
            display: flex;
            height: 100%;
        }
        .left-pane {
            flex: 0 1 70%; /* 初始寬度 70% */
            padding: 15px;
            overflow-y: auto; /* 如果內容過長，允許滾動 */
            background-color: #f0f0f0;
        }
        .right-pane {
            flex: 0 1 30%; /* 初始寬度 30% */
            padding: 15px;
            overflow-y: auto;
            background-color: #e0e0e0;
            border-left: 2px solid #ccc;
        }
        .handle {
            width: 10px;
            cursor: col-resize;
            background-color: #ccc;
        }
        pre {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
        }
        .code-output {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding: 10px;
            margin-top: 10px;
        }
        .explanation {
            margin-top: 15px;
        }
        .correct {
            color: green;
            font-weight: bold;
        }
        .incorrect {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="left-pane" id="left-pane">
        <?php
        // 題庫
        $questions = [
            [
                "question" => "在C語言中，表達式 `7 / 2` 的值是多少？",
                "options" => ["3.5", "3", "4", "2"],
                "answer" => "3",
                "explanation" => "在C語言中，當兩個整數進行除法運算時，結果會是整數除法，小數部分會被無條件捨去。因此，`7 / 2` 的結果是 3。",
                "code" => "printf("7 / 2 = %d\n", 7 / 2);",
                "output" => "7 / 2 = 3"
            ],
            [
                "question" => "哪個關鍵字用於在C語言中定義一個常數？",
                "options" => ["const", "define", "constant", "final"],
                "answer" => "const",
                "explanation" => "`const` 關鍵字用於宣告一個唯讀的變數，即常數。`#define` 是預處理器指令，也可以用來定義常數，但 `const` 是更現代、型別安全的方法。",
                "code" => "const int MY_CONST = 100;\nprintf("Constant value: %d\n", MY_CONST);",
                "output" => "Constant value: 100"
            ],
            [
                "question" => "C語言中，`int* ptr;` 宣告了一個什麼？",
                "options" => ["整數", "指向整數的指標", "整數陣列", "函式指標"],
                "answer" => "指向整數的指標",
                "explanation" => "`int* ptr;` 宣告了一個名為 `ptr` 的變數，它的型別是指向整數 (`int`) 的指標。這意味著 `ptr` 可以儲存一個整數變數的記憶體位址。",
                "code" => "int var = 20;\nint* ptr = &var;\nprintf("Value of var: %d\n", *ptr);",
                "output" => "Value of var: 20"
            ]
        ];

        // 處理表單提交
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $question_index = $_POST['question_index'];
            $user_answer = $_POST['answer'];
            $question = $questions[$question_index];
            $correct_answer = $question['answer'];

            // 準備要在右側顯示的內容
            $result_html = "<h2>題目：" . htmlspecialchars($question['question']) . "</h2>";
            $result_html .= "<p>你的答案是：" . htmlspecialchars($user_answer) . "</p>";

            if ($user_answer == $correct_answer) {
                $result_html .= "<p class='correct'>答案正確！</p>";
            } else {
                $result_html .= "<p class='incorrect'>答案錯誤！正確答案是：" . htmlspecialchars($correct_answer) . "</p>";
            }

            $result_html .= "<div class='explanation'>";
            $result_html .= "<h3>詳細解說：</h3>";
            $result_html .= "<p>" . nl2br(htmlspecialchars($question['explanation'])) . "</p>";
            if (!empty($question['code'])) {
                $result_html .= "<h3>範例程式碼：</h3>";
                $result_html .= "<pre>" . htmlspecialchars($question['code']) . "</pre>";
            }
            if (!empty($question['output'])) {
                $result_html .= "<h3>程式執行結果：</h3>";
                $result_html .= "<div class='code-output'>" . htmlspecialchars($question['output']) . "</div>";
            }
            $result_html .= "</div>";

            // 使用 JavaScript 將結果顯示在右側
            echo "<script>\n                    window.onload = function() {\n                        var rightPane = window.parent.document.getElementById('right-pane');\n                        if(rightPane) {\n                           rightPane.innerHTML = " . json_encode($result_html) . ";\n                        }\n                    };\n                  </script>";
        }

        // 顯示所有題目
        echo "<h1>C語言基礎測驗</h1>";
        foreach ($questions as $index => $q) {
            echo "<div>";
            echo "<h3>" . ($index + 1) . ". " . htmlspecialchars($q['question']) . "</h3>";
            echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
            echo "<input type='hidden' name='question_index' value='$index'>";
            foreach ($q['options'] as $option) {
                echo "<label><input type='radio' name='answer' value='" . htmlspecialchars($option) . "' required> " . htmlspecialchars($option) . "</label><br>";
            }
            echo "<br><input type='submit' value='提交答案'>";
            echo "</form>";
            echo "<hr>";
            echo "</div>";
        }
        ?>
    </div>
    <div class="handle" id="handle"></div>
    <div class="right-pane" id="right-pane">
        <h2>互動區</h2>
        <p>請在左側選擇題目並提交答案，結果將會顯示在此處。</p>
    </div>
</div>

<script>
    const handle = document.getElementById('handle');
    const leftPane = document.getElementById('left-pane');
    const rightPane = document.getElementById('right-pane');
    const container = document.querySelector('.container');

    let isResizing = false;

    handle.addEventListener('mousedown', function(e) {
        isResizing = true;
        // 防止文字選取
        document.addEventListener('selectstart', preventSelect);
        e.preventDefault();
    });

    document.addEventListener('mousemove', function(e) {
        if (!isResizing) return;

        const containerRect = container.getBoundingClientRect();
        // 計算滑鼠位置相對於 container 的比例
        let leftWidth = e.clientX - containerRect.left;

        // 限制最小寬度
        if (leftWidth < 100) leftWidth = 100;
        if (leftWidth > containerRect.width - 100) leftWidth = containerRect.width - 100;

        const leftFlex = leftWidth / containerRect.width;
        const rightFlex = 1 - leftFlex;

        leftPane.style.flex = `0 1 ${leftWidth}px`;
        rightPane.style.flex = `0 1 ${containerRect.width - leftWidth - handle.offsetWidth}px`;
    });

    document.addEventListener('mouseup', function(e) {
        isResizing = false;
        document.removeEventListener('selectstart', preventSelect);
    });

    function preventSelect(e) {
        e.preventDefault();
    }
</script>

</body>
</html>