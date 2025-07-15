<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C語言互動式測驗</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .left-panel {
            width: 70%;
            padding: 20px;
            border-right: 1px solid #ddd;
            overflow-y: auto;
            height: calc(100vh - 40px);
        }
        .right-panel {
            width: 30%;
            padding: 20px;
            height: calc(100vh - 40px);
            position: sticky;
            top: 20px;
        }
        .question-container {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        h1, h2, h3, h4 {
            color: #0056b3;
        }
        pre {
            background-color: #eee;
            padding: 10px;
            border-radius: 5px;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .options label {
            display: block;
            margin-bottom: 10px;
            cursor: pointer;
        }
        .solution {
            margin-top: 15px;
            padding: 15px;
            background-color: #e7f3fe;
            border-left: 5px solid #2196F3;
        }
        .solution h3 {
            margin-top: 0;
        }
        .correct {
            color: green;
            font-weight: bold;
        }
        .incorrect {
            color: red;
            font-weight: bold;
        }
        #interactive-area {
            border: 1px solid #ccc;
            padding: 10px;
            height: 80%;
            overflow-y: auto;
            background-color: #f9f9f9;
        }
        #interactive-area h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>

<?php
$questions = [
    [
        'id' => 1,
        'question' => '在C語言中，`int x = 5; int y = 2; float z = x / y;` 執行後，`z` 的值是多少？',
        'options' => ['a' => '2.5', 'b' => '2.0', 'c' => '2', 'd' => '編譯錯誤'],
        'answer' => 'b',
        'explanation' => '因為 `x` 和 `y` 都是整數（int），所以 `x / y` 會執行整數除法，結果為 2。然後將整數 2 賦值給浮點數 `z`，所以 `z` 的值變為 2.0。',
        'program_output' => "z = 2.000000",
        'variables' => ['x' => 5, 'y' => 2, 'z' => '2.0f']
    ],
    [
        'id' => 2,
        'question' => '以下哪個選項是C語言中正確的註解方式？',
        'options' => ['a' => '// 這是一個註解', 'b' => '/* 這是一個註解 */', 'c' => '# 這是一個註解', 'd' => 'a 和 b 都是'],
        'answer' => 'd',
        'explanation' => 'C語言支持兩種註解方式：單行註解 `//` 和多行註解 `/* ... */`。選項 a 和 b 都是正確的用法。',
    ],
    [
        'id' => 3,
        'question' => '`int a = 10; a++;` 執行後，`a` 的值是多少？',
        'options' => ['a' => '10', 'b' => '11', 'c' => '9', 'd' => '不確定'],
        'answer' => 'b',
        'explanation' => '`a++` 是後置遞增運算子，它會將變數 `a` 的值加 1。所以 `a` 從 10 變為 11。',
        'program_output' => "a 的新值是: 11",
        'variables' => ['a (執行前)' => 10, 'a (執行後)' => 11]
    ],
];
?>

<div class="container">
    <div class="left-panel">
        <h1>C語言互動式測驗</h1>
        <?php foreach ($questions as $q): ?>
            <div class="question-container" id="question<?php echo $q['id']; ?>">
                <h2>問題 <?php echo $q['id']; ?>:</h2>
                <p><?php echo $q['question']; ?></p>
                <div class="options">
                    <?php foreach ($q['options'] as $key => $value): ?>
                        <label>
                            <input type="radio" name="q<?php echo $q['id']; ?>" value="<?php echo $key; ?>" onclick="showSolution(<?php echo $q['id']; ?>, '<?php echo $key; ?>')">
                            <?php echo $key; ?>) <?php echo $value; ?>
                        </label>
                    <?php endforeach; ?>
                </div>
                <div class="solution" id="solution<?php echo $q['id']; ?>" style="display: none;">
                    <!-- 此區域���內容將由 JavaScript 動態生成並移至右側 -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="right-panel">
        <h2>互動區</h2>
        <div id="fixed-content">
            <p>請在左側選擇答案，詳細解說將會顯示在下方。</p>
        </div>
        <div id="interactive-area">
            <!-- 答案解說將顯示在這裡 -->
        </div>
    </div>
</div>

<script>
    // 將 PHP 陣列轉換為 JavaScript 物件
    const questions = <?php echo json_encode($questions, JSON_UNESCAPED_UNICODE); ?>;

    function showSolution(questionId, selectedOption) {
        const interactiveArea = document.getElementById('interactive-area');
        
        // 從 JavaScript 物件中尋找對應的題目
        const question = questions.find(q => q.id === questionId);

        if (!question) {
            interactiveArea.innerHTML = '發生錯誤，找不到題目資訊。';
            return;
        }

        const isCorrect = (selectedOption === question.answer);
        let solutionContent = '<h3>答案解說</h3>';
        solutionContent += `<p>你的答案: ${selectedOption.toUpperCase()} ${isCorrect ? '<span class="correct">(正確)</span>' : '<span class="incorrect">(錯誤)</span>'}</p>`;
        solutionContent += `<p>正確答案: ${question.answer.toUpperCase()}</p>`;
        solutionContent += `<p>${question.explanation}</p>`;

        if (question.program_output) {
            solutionContent += '<h4>程式執行結果</h4>';
            solutionContent += `<pre>${question.program_output}</pre>`;
        }

        if (question.variables) {
            solutionContent += '<h4>變數列表</h4>';
            solutionContent += '<ul>';
            for (const key in question.variables) {
                if (Object.hasOwnProperty.call(question.variables, key)) {
                    const value = question.variables[key];
                    solutionContent += `<li>${key}: ${value}</li>`;
                }
            }
            solutionContent += '</ul>';
        }

        interactiveArea.innerHTML = solutionContent;
    }
</script>

</body>
</html>