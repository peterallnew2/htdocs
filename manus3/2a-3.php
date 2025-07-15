<?php
header('Content-Type: text/html; charset=utf-8');

// EE7-5 Quiz Data
$current_exercises = [
    [
        'id_suffix' => '1',
        'question_text' => '1. 有關 C++語言中變數命名，下列那一個錯誤？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) Void'],
            ['key' => 'B', 'text' => '(B) _123'],
            ['key' => 'C', 'text' => '(C) print'],
            ['key' => 'D', 'text' => '(D) int'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：變數命名規則與關鍵字</strong></p>
<p>在 C/C++ 中，變數命名有以下規則：</p>
<ul>
    <li>可以包含字母 (大小寫)、數字和底線 <code>_</code>。</li>
    <li>第一個字元不能是數字。</li>
    <li>不能使用語言的關鍵字 (reserved words) 作為變數名。</li>
    <li>區分大小寫 (e.g., <code>myVar</code> 和 <code>myvar</code> 是不同的變數)。</li>
</ul>
<p>C++ 的關鍵字是由語言標準定義的，具有特殊意義，例如 <code>int</code>, <code>float</code>, <code>double</code>, <code>char</code>, <code>void</code>, <code>if</code>, <code>else</code>, <code>for</code>, <code>while</code>, <code>class</code>, <code>public</code> 等。</p>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) Void：</strong><code>Void</code> (大寫 V) 不是 C++ 的關鍵字 (關鍵字是小寫的 <code>void</code>)。因此，<code>Void</code> 可以作為變數名。</li>
    <li><strong>(B) _123：</strong>這個變數名以中文「一」開頭。雖然現代編譯器可能支援 Unicode 字元作為變數名的一部分 (取決於編譯器和設定)，但傳統上 C/C++ 變數名主要使用 ASCII 字符集中的字母、數字和底線。然而，題目更可能是考驗標準 ASCII 規則和關鍵字。即使某些編譯器接受，這也不是一個好的命名習慣。但相較於 (D)，它不是一個直接的語法錯誤 (關鍵字衝突)。</li>
    <li><strong>(C) print：</strong><code>print</code> 不是 C++ 的標準關鍵字。雖然 C 語言中有 <code>printf</code> 函式，C++ 中有 <code>std::cout</code>，但 <code>print</code> 本身並非保留字。因此，它可以作為變數名 (儘管不建議，因為可能與自訂或庫函式名混淆)。</li>
    <li><strong>(D) int：</strong><code>int</code> 是 C++ 用於宣告整數型態的關鍵字。關鍵字不能被用作變數名稱。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>選項 (D) <code>int</code> 是 C++ 的關鍵字，因此不能作為變數名稱，這是一個明確的語法錯誤。</n>HTML
    ],
    [
        'id_suffix' => '2',
        'question_text' => '2. 有關 C++語言的變數命名，以下何者正確？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) ％abcd'],
            ['key' => 'B', 'text' => '(B) 1abcd'],
            ['key' => 'C', 'text' => '(C) fruit-apple_long_name'],
            ['key' => 'D', 'text' => '(D) _a_long_name'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：變數命名規則</strong></p>
<p>複習 C/C++ 變數命名規則：</p>
<ul>
    <li>可以包含字母 (a-z, A-Z)、數字 (0-9) 和底線 <code>_</code>。</li>
    <li>第一個字元必須是字母或底線 <code>_</code>。不能是數字。</li>
    <li>不能使用關鍵字。</li>
    <li>區分大小寫。</li>
    <li>特殊字元 (如 <code>%</code>, <code>-</code>) 通常不允許在變數名中使用 (除了底線)。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) ％abcd：</strong>包含特殊字元 <code>％</code>，這是不允許的。</li>
    <li><strong>(B) 1abcd：</strong>以數字開頭，這是不允許的。</li>
    <li><strong>(C) fruit-apple一long一name：</strong>包含特殊字元 <code>-</code> (減號)，這通常不允許在變數名中 (容易與減法運算混淆)。也包含中文字元，如前一題所述，雖然部分編譯器可能支援，但非標準 ASCII 做法。</li>
    <li><strong>(D) 一a一long一name：</strong>這個變數名以底線 <code>_</code> 開頭 (題目中的長橫線應理解為底線)，後面跟著字母、數字和底線的組合 (假設題目中的 