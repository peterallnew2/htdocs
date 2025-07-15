<?php
header('Content-Type: text/html; charset=utf-8');

// EE7-5 Quiz Data
$current_exercises = [
    [
        'id_suffix' => '1',
        'question_text' => '1. 有關 C++語言中變數命名,下列那一個錯誤？',
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
<p>在 C/C++ 中,變數命名有以下規則：</p>
<ul>
    <li>可以包含字母 (大小寫)、數字和底線 <code>_</code>。</li>
    <li>第一個字元不能是數字。</li>
    <li>不能使用語言的關鍵字 (reserved words) 作為變數名。</li>
    <li>區分大小寫 (e.g., <code>myVar</code> 和 <code>myvar</code> 是不同的變數)。</li>
</ul>
<p>C++ 的關鍵字是由語言標準定義的,具有特殊意義,例如 <code>int</code>, <code>float</code>, <code>double</code>, <code>char</code>, <code>void</code>, <code>if</code>, <code>else</code>, <code>for</code>, <code>while</code>, <code>class</code>, <code>public</code> 等。</p>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) Void：</strong><code>Void</code> (大寫 V) 不是 C++ 的關鍵字 (關鍵字是小寫的 <code>void</code>)。因此,<code>Void</code> 可以作為變數名。</li>
    <li><strong>(B) _123：</strong>這個變數名以中文「一」開頭。雖然現代編譯器可能支援 Unicode 字元作為變數名的一部分 (取決於編譯器和設定),但傳統上 C/C++ 變數名主要使用 ASCII 字符集中的字母、數字和底線。然而,題目更可能是考驗標準 ASCII 規則和關鍵字。即使某些編譯器接受,這也不是一個好的命名習慣。但相較於 (D),它不是一個直接的語法錯誤 (關鍵字衝突)。</li>
    <li><strong>(C) print：</strong><code>print</code> 不是 C++ 的標準關鍵字。雖然 C 語言中有 <code>printf</code> 函式,C++ 中有 <code>std::cout</code>,但 <code>print</code> 本身並非保留字。因此,它可以作為變數名 (儘管不建議,因為可能與自訂或庫函式名混淆)。</li>
    <li><strong>(D) int：</strong><code>int</code> 是 C++ 用於宣告整數型態的關鍵字。關鍵字不能被用作變數名稱。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>選項 (D) <code>int</code> 是 C++ 的關鍵字,因此不能作為變數名稱,這是一個明確的語法錯誤。</p>
HTML
    ],
    [
        'id_suffix' => '2',
        'question_text' => '2. 有關 C++語言的變數命名,以下何者正確？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) %abcd'],
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
    <li><strong>(A) %abcd：</strong>包含特殊字元 <code>%</code>,這是不允許的。</li>
    <li><strong>(B) 1abcd：</strong>以數字開頭,這是不允許的。</li>
    <li><strong>(C) fruit-apple一long一name：</strong>包含特殊字元 <code>-</code> (減號),這通常不允許在變數名中 (容易與減法運算混淆)。也包含中文字元,如前一題所述,雖然部分編譯器可能支援,但非標準 ASCII 做法。</li>
    <li><strong>(D) 一a一long一name：</strong>這個變數名以底線 <code>_</code> 開頭 (題目中的長橫線應理解為底線),後面跟著字母、數字和底線的組合 (假設題目中的 "一" 是底線的另一種表示或筆誤)。如果將所有 "一" 視為底線 <code>_</code>,則 <code>_a_long_name</code> 是一個合法的 C++ 變數名。它以底線開頭,後續字元為字母和底線。</li>
</ul>
<p><strong>3. 結論：</strong></p>
<p>假設題目中的 "一" 是為了排版而代替底線 <code>_</code>,則 (D) <code>_a_long_name</code> 是唯一符合 C++ 變數命名規則的選項。其他選項都違反了明確的規則 (特殊字元、數字開頭)。</p>
<p><em>註：如果 "一" 被嚴格解釋為中文字元 "一",則 (D) 在傳統 C++ 標準下也是不合法的。但通常這類題目會預期考生將其視為底線或一個可接受的字母替代。在此,我們以最寬鬆且符合常見出題模式的方式解釋,即將其視為底線的替代寫法。</em></p>
HTML
    ],
    [
        'id_suffix' => '3',
        'question_text' => '3. 以下何者不是 C++語言整數資料型態？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) double'],
            ['key' => 'B', 'text' => '(B) short'],
            ['key' => 'C', 'text' => '(C) byte'],
            ['key' => 'D', 'text' => '(D) int'],
        ],
        'correct_answer' => 'A',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：C++ 資料型態</strong></p>
<p>C++ 提供的基本資料型態主要分為：</p>
<ul>
    <li><strong>整數型態：</strong> 用於儲存沒有小數部分的數字。常見的有：
        <ul>
            <li><code>char</code> (技術上是整數型態,常 用於字元)</li>
            <li><code>short</code> (或 <code>short int</code>)</li>
            <li><code>int</code></li>
            <li><code>long</code> (或 <code>long int</code>)</li>
            <li><code>long long</code> (或 <code>long long int</code>)</li>
            <li>這些型態還可以加上 <code>signed</code> (預設) 或 <code>unsigned</code> 修飾字。</li>
        </ul>
    </li>
    <li><strong>浮點數型態：</strong> 用於儲存帶有小數部分的數字。常見的有：
        <ul>
            <li><code>float</code> (單精度浮點數)</li>
            <li><code>double</code> (雙精度浮點數)</li>
            <li><code>long double</code> (擴展精度浮點數)</li>
        </ul>
    </li>
    <li><strong>布林型態：</strong> <code>bool</code> (值為 <code>true</code> 或 <code>false</code>)</li>
    <li><strong>空型態：</strong> <code>void</code> (表示沒有型態,常用於函式回傳或指標)</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) double：</strong><code>double</code> 是 C++ 中的浮點數資料型態,用於表示帶有小數的數值,不是整數型態。</li>
    <li><strong>(B) short：</strong><code>short</code> (或 <code>short int</code>) 是 C++ 中的整數資料型態,通常比 <code>int</code> 佔用更少的記憶體空間。</li>
    <li><strong>(C) byte：</strong><code>byte</code> 不是 C++ 標準的關鍵字或基本資料型態。雖然 "byte" 是一個常用的計算機儲存單位 (通常指 8 位元),但在 C++ 語言層面,我們通常使用 <code>char</code> 或 <code>unsigned char</code> 來表示一個位元組大小的整數。某些程式語言 (如 Java, C#) 有 <code>byte</code> 型態,但 C++ 標準沒有。</li>
    <li><strong>(D) int：</strong><code>int</code> 是 C++ 中最常用的整數資料型態。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p><code>double</code> 明顯不是整數資料型態,它是浮點數型態。</p>
<p><code>byte</code> 也不是 C++ 的標準整數資料型態。如果題目是單選題且必須選一個最明確的「不是 C++ 語言整數資料型態」,<code>double</code> 是浮點數型態,而 <code>byte</code> 根本不是標準型態。通常這類問題會將 <code>byte</code> 視為一個混淆項,因為它在其他語言中存在。若嚴格按照 C++ 標準,(A) 和 (C) 都不是 C++ 的整數資料型態。然而,(A) 是 C++ 的一個標準型態但屬於浮點數,(C) 則不是 C++ 的標準型態。題目通常會期望選擇 (A) 因為它是一個明確的「非整數」的標準型態。</p>
<p><em>在此解釋中,我們將 (A) 視為首選答案,因為 <code>double</code> 是 C++ 標準中明確定義的「非整數」型態。如果題目允許,(C) 也是正確的,因為 <code>byte</code> 不是 C++ 標準型態。針對此題,答案標為 (A)。</em></p>
HTML
    ],
    [
        'id_suffix' => '4',
        'question_text' => '4. 若考慮正負號,1 個 Byte 的長度,它可以儲存的最大值',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) 255'],
            ['key' => 'B', 'text' => '(B) 127'],
            ['key' => 'C', 'text' => '(C) 512'],
            ['key' => 'D', 'text' => '(D) 36727'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：有號整數的表示範圍</strong></p>
<p>1 Byte 等於 8 bits (位元)。</p>
<p>當考慮正負號時 (即有號數,signed number),通常使用最高位元 (most significant bit, MSB) 作為符號位：</p>
<ul>
    <li>0 代表正數或零。</li>
    <li>1 代表負數。</li>
</ul>
<p>剩下的 7 個位元用於表示數值的大小。對於負數,通常使用二補數 (two's complement) 表示法。</p>
<p>範圍計算：</p>
<ul>
    <li><strong>最大正數：</strong> 符號位為 0,其餘 7 位元全為 1。即 <code>01111111</code> (二進制)。
        <br><code>(1 * 2^6) + (1 * 2^5) + (1 * 2^4) + (1 * 2^3) + (1 * 2^2) + (1 * 2^1) + (1 * 2^0)</code>
        <br><code>= 64 + 32 + 16 + 8 + 4 + 2 + 1 = 127</code>。</li>
    <li><strong>最小負數 (絕對值最大)：</strong> 在二補數表示法中,1 Byte 的有號整數範圍是 <code>-128</code> 到 <code>+127</code>。
        <br><code>-128</code> 的二進制表示 (二補數) 是 <code>10000000</code>。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 255：</strong>這是 1 Byte 無號整數 (unsigned) 的最大值 (<code>11111111</code> 二進制)。</li>
    <li><strong>(B) 127：</strong>這是 1 Byte 有號整數的最大值,如上所述。</li>
    <li><strong>(C) 512：</strong>這需要超過 1 Byte 來儲存 (例如,需要 10 位元才能表示 <code>1000000000</code>,即 2<sup>9</sup>)。</li>
    <li><strong>(D) 36727：</strong>(應為 32767) 這是 2 Bytes (short int) 有號整數的最大值。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>若考慮正負號,1 個 Byte 的長度可以儲存的最大值是 127。</p>
HTML
    ],
    [
        'id_suffix' => '5',
        'question_text' => '5. 若不考慮正負號,1 個 Byte 的長度,它可以儲存的最大值？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) 255'],
            ['key' => 'B', 'text' => '(B) 512'],
            ['key' => 'C', 'text' => '(C) 128'],
            ['key' => 'D', 'text' => '(D) 1024'],
        ],
        'correct_answer' => 'A',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：無號整數的表示範圍</strong></p>
<p>1 Byte 等於 8 bits (位元)。</p>
<p>若不考慮正負號 (即無號數,unsigned number),則所有 8 個位元都用於表示數值的大小。</p>
<p>範圍計算：</p>
<ul>
    <li><strong>最小值：</strong> 所有位元為 0。即 <code>00000000</code> (二進制) = 0 (十進制)。</li>
    <li><strong>最大值：</strong> 所有位元為 1。即 <code>11111111</code> (二進制)。
        <br><code>(1*2^7) + (1*2^6) + (1*2^5) + (1*2^4) + (1*2^3) + (1*2^2) + (1*2^1) + (1*2^0)</code>
        <br><code>= 128 + 64 + 32 + 16 + 8 + 4 + 2 + 1 = 255</code>。
        <br>或者,更簡單的公式是 2<sup>n</sup> - 1,其中 n 是位元數。對於 8 位元,2<sup>8</sup> - 1 = 256 - 1 = 255。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 255：</strong>這是 1 Byte 無號整數的最大值,如上所述。</li>
    <li><strong>(B) 512：</strong>這需要 10 位元 (2<sup>9</sup>)。</li>
    <li><strong>(C) 128：</strong>這是 2<sup>7</sup>,或者是有號 1 Byte 的最小負數的絕對值。</li>
    <li><strong>(D) 1024：</strong>這需要 11 位元 (2<sup>10</sup>)。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>若不考慮正負號,1 個 Byte 的長度可以儲存的最大值是 255。</p>
HTML
    ],
    [
        'id_suffix' => '6',
        'question_text' => '6. C++程式指令 printf("%6.2f", 597.7231); 執行後輸出為以下那一個？',
        'code_snippet' => "#include <stdio.h>\n\nint main() {\n    printf(\"|%6.2f|\", 597.7231);\n    return 0;\n}",
        'run_code_id' => 'q6-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nint main() {\n    // Added | | to show spacing clearly\n    printf(\"|%6.2f|\", 597.7231);\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A) 597.723'],
            ['key' => 'B', 'text' => '(B) 597.72'],
            ['key' => 'C', 'text' => '(C) 000597.72'],
            ['key' => 'D', 'text' => '(D) 597'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：<code>printf</code> 格式化輸出 (浮點數)</strong></p>
<p>在 C/C++ 的 <code>printf</code> 函式中,格式指定符 <code>%f</code> 用於輸出浮點數。它可以帶有寬度和精度修飾：</p>
<p><code>%[寬度].[精度]f</code></p>
<ul>
    <li><strong>寬度 (width)：</strong> 指定輸出總共佔用的最小字元數。如果實際輸出的字元數少於此寬度,則預設會在左邊補空格 (右對齊)。如果實際字元數多於此寬度,則寬度指定會被忽略,並完整輸出數字。</li>
    <li><strong>精度 (precision)：</strong> 對於浮點數 (<code>f</code>, <code>e</code>, <code>E</code>),精度指定小數點後顯示的位數。數值會被四捨五入到指定的精度。</li>
</ul>

<p><strong>2. 程式碼分析：</strong></p>
<p>指令是 <code>printf("%6.2f", 597.7231);</code></p>
<ul>
    <li><strong>數值：</strong> <code>597.7231</code></li>
    <li><strong>格式：</strong> <code>%6.2f</code>
        <ul>
            <li><code>.2</code>：精度為 2。表示小數點後顯示 2 位。<code>597.7231</code> 四捨五入到小數點後兩位變成 <code>597.72</code>。</li>
            <li><code>6</code>：寬度為 6。表示輸出總共至少佔用 6 個字元。
                <ul>
                    <li>數字 <code>597.72</code> 本身包含 <code>5</code>, <code>9</code>, <code>7</code>, <code>.</code>, <code>7</code>, <code>2</code>,共 6 個字元。</li>
                    <li>由於實際輸出的字元數 (6) 等於指定的寬度 (6),所以不需要額外補空格。</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>

<p><strong>3. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 597.723：</strong>這是小數點後 3 位,不符合 <code>.2f</code> 的精度。</li>
    <li><strong>(B) 597.72：</strong>小數點後 2 位,總長度 6 位。這符合 <code>%6.2f</code> 的格式。</li>
    <li><strong>(C) 000597.72：</strong>這表示總寬度更大且有前導零填充,例如 <code>%09.2f</code>。題目中的 <code>%6.2f</code> 不會產生前導零,只會補空格 (如果需要的話)。</li>
    <li><strong>(D) 597：</strong>這是整數部分,忽略了小數。</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>執行 <code>printf("%6.2f", 597.7231);</code> 後,輸出為 <code>597.72</code>。</p>
HTML
    ],
    [
        'id_suffix' => '7',
        'question_text' => '7. 程式執行時,程式中的變數值是存放在',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)記憶體'],
            ['key' => 'B', 'text' => '(B)硬碟'],
            ['key' => 'C', 'text' => '(C)輸出入裝置'],
            ['key' => 'D', 'text' => '(D)匯流排'],
        ],
        'correct_answer' => 'A',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：程式執行與記憶體</strong></p>
<p>當一個程式執行時,它會被載入到電腦的主記憶體 (RAM - Random Access Memory) 中。記憶體是用來儲存程式指令以及程式在執行過程中需要用到的資料,包括變數的值。</p>
<ul>
    <li><strong>變數 (Variables)：</strong> 是程式中用來儲存資料的命名空間。當宣告一個變數時,編譯器會為它在記憶體中分配一塊空間。程式執行期間,變數的值就儲存在這塊記憶體空間中,並且可以被讀取或修改。</li>
    <li><strong>硬碟 (Hard Disk)：</strong> 是永久性儲存裝置,用於儲存作業系統、應用程式檔案、使用者文件等。程式檔案本身儲存在硬碟上,但在執行前需要載入到記憶體。硬碟存取速度遠慢於記憶體。</li>
    <li><strong>輸出入裝置 (I/O Devices)：</strong> 如鍵盤、滑鼠、螢幕、印表機等,用於程式與使用者或外部世界的互動。它們不直接儲存程式執行時的變數值。</li>
    <li><strong>匯流排 (Bus)：</strong> 是電腦內部元件之間傳輸資料的通道,例如 CPU 與記憶體之間、CPU 與周邊裝置之間。它負責資料的傳輸,而不是儲存。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 記憶體：</strong>正確。程式執行時,變數的值動態地儲存在主記憶體中。</li>
    <li><strong>(B) 硬碟：</strong>錯誤。硬碟用於永久儲存,變數在執行時的動態值不在硬碟。</li>
    <li><strong>(C) 輸出入裝置：</strong>錯誤。這些裝置用於互動,不儲存執行中的變數。</li>
    <li><strong>(D) 匯流排：</strong>錯誤。匯流排是傳輸路徑,不負責儲存。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>程式執行時,程式中的變數值是存放在記憶體中。</p>
HTML
    ],
    [
        'id_suffix' => '8',
        'question_text' => '8. 如果 x=123 則使用敘述 printf("%6d",x); 顯示 x 時',
        'code_snippet' => "#include <stdio.h>\n\nint main() {\n    int x = 123;\n    printf(\"%6d\", x);\n    return 0;\n}",
        'run_code_id' => 'q8-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nint main() {\n    int x = 123;\n    // Added | | to show spacing clearly\n    printf(\"|%6d|\", x);\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)總共 6 個位置,空格在後'],
            ['key' => 'B', 'text' => '(B)總共 6 個位置,空格在前'],
            ['key' => 'C', 'text' => '(C)自動調整為 3 個位置'],
            ['key' => 'D', 'text' => '(D)以上皆非'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：<code>printf</code> 格式化輸出 (整數與寬度)</strong></p>
<p>在 C/C++ 的 <code>printf</code> 函式中,格式指定符 <code>%d</code> 用於輸出十進制整數。它可以帶有寬度修飾：</p>
<p><code>%[寬度]d</code></p>
<ul>
    <li><strong>寬度 (width)：</strong> 指定輸出總共佔用的最小字元數。
        <ul>
            <li>如果實際輸出的數字位數少於指定的寬度,則預設會在數字的<strong>左邊</strong>補上空格,以達到指定的總寬度 (即數字右對齊)。</li>
            <li>如果實際輸出的數字位數多於或等於指定的寬度,則寬度指定不起作用,數字會被完整輸出。</li>
        </ul>
    </li>
</ul>

<p><strong>2. 程式碼分析：</strong></p>
<p>敘述是 <code>printf("%6d", x);</code> 且 <code>x = 123</code>。</p>
<ul>
    <li><strong>數值：</strong> <code>123</code> (它有 3 個數字位)。</li>
    <li><strong>格式：</strong> <code>%6d</code>
        <ul>
            <li><code>6</code>：寬度為 6。表示輸出總共至少佔用 6 個字元位置。</li>
            <li>由於數字 <code>123</code> 只有 3 位,少於指定的寬度 6。</li>
            <li>因此,會在數字 <code>123</code> 的左邊補上 <code>6 - 3 = 3</code> 個空格。</li>
        </ul>
    </li>
</ul>
<p>輸出結果將會是 <code>"   123"</code> (前面有三個空格)。</p>

<p><strong>3. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 總共 6 個位置, 格在後：</strong>錯誤。空格 (如果需要填充) 是補在數字前面 (左邊),實現右對齊。</li>
    <li><strong>(B) 總共 6 個位置, 格在前：</strong>正確。總共佔用 6 個位置,數字 <code>123</code> (3位) 不足的部分由前面的 3 個空格填充。</li>
    <li><strong>(C) 自動調整為 3 個位置：</strong>錯誤。寬度指定符 <code>%6d</code> 要求至少 6 個位置。</li>
    <li><strong>(D) 以上皆非：</strong>錯誤,因為 (B) 是正確的。</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>使用 <code>printf("%6d", 123);</code> 顯示時,會輸出總共 6 個位置,數字 <code>123</code> 右對齊,不足的 3 個位置在數字前面補空格。</p>
HTML
    ],
    [
        'id_suffix' => '9',
        'question_text' => '9. 在 C 語言中,資料型別 short 代表用較少的 bytes 數來記錄整數。相較於 int,short 只需要 2 bytes,請問 short 能記錄的最大數及最小數分別為多少？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) 32767,0'],
            ['key' => 'B', 'text' => '(B) 32768,-32768'],
            ['key' => 'C', 'text' => '(C)  32767,-32768'],
            ['key' => 'D', 'text' => '(D) 32768,0'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：有號整數 <code>short</code> 的表示範圍</strong></p>
<p>題目說明 <code>short</code> 型別使用 2 bytes (位元組) 來儲存整數。</p>
<p>2 bytes = 2 * 8 bits = 16 bits。</p>
<p>當 <code>short</code> 用於表示有號整數時 (C 語言中 <code>short</code> 預設為 <code>signed short</code>),表示範圍的計算如下：</p>
<ul>
    <li>總位元數 n = 16。</li>
    <li>最高位元 (MSB) 用作符號位。</li>
    <li><strong>最小值 (負數)：</strong> 使用二補數表示法,對於 n 位元的有號整數,最小值是 -2<sup>(n-1)</sup>。
        <br>所以,對於 16 位元,最小值是 -2<sup>(16-1)</sup> = -2<sup>15</sup> = -32768。</li>
    <li><strong>最大值 (正數)：</strong> 對於 n 位元的有號整數,最大值是 2<sup>(n-1)</sup> - 1。
        <br>所以,對於 16 位元,最大值是 2<sup>(16-1)</sup> - 1 = 2<sup>15</sup> - 1 = 32768 - 1 = 32767。</li>
</ul>
<p>因此,一個 2-byte 的有號 <code>short</code> 整數的範圍是從 -32768 到 32767。</p>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 32767,0：</strong>最小數錯誤。0 不是有號 <code>short</code> 的最小值。</li>
    <li><strong>(B) 32768,-32768：</strong>最大數錯誤。32768 超出了正數範圍 (它需要符號位為0,但數值部分會溢出)。</li>
    <li><strong>(C) 32767,-32768：</strong>正確。最大數為 32767,最小數為 -32768。</li>
    <li><strong>(D) 32768,0：</strong>最大數和最小數都錯誤。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>一個 2 bytes 的 <code>short</code> (有號) 整數能記錄的最大數是 32767,最小數是 -32768。</p>
HTML
    ],
    [
        'id_suffix' => '10',
        'question_text' => '10. 下列 4 種數值資料型別,何者可表示的數值資料範圍最大？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)整數(Integer)'],
            ['key' => 'B', 'text' => '(B)長整數(Long)'],
            ['key' => 'C', 'text' => '(C)單精度(Single)'],
            ['key' => 'D', 'text' => '(D)倍精度(Double)'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：數值資料型別的範圍</strong></p>
<p>在 C/C++ 中,不同的數值資料型別有不同的大小 (佔用的記憶體空間) 和表示範圍：</p>
<ul>
    <li><strong>整數 (Integer - <code>int</code>)：</strong> 通常是 4 bytes (32 bits) 在現代系統上。其範圍大約是 -2 × 10<sup>9</sup> 到 +2 × 10<sup>9</sup>。</li>
    <li><strong>長整數 (Long - <code>long int</code> 或 <code>long</code>)：</strong> 標準保證至少和 <code>int</code> 一樣大。在很多系統上,<code>long</code> 也是 4 bytes (與 <code>int</code> 相同),但在某些系統 (特別是 64 位元 Unix-like 系統) 上可能是 8 bytes (64 bits)。如果 <code>long</code> 是 64 位元,其範圍遠大於 32 位元 <code>int</code>。<code>long long int</code> 則保證至少 64 位元。</li>
    <li><strong>單精度 (Single - <code>float</code>)：</strong> 通常是 4 bytes (32 bits)。用於表示浮點數。其表示範圍大約是 ±3.4 × 10<sup>-38</sup> 到 ±3.4 × 10<sup>+38</sup>,精度約為 7 位十進制數字。</li>
    <li><strong>倍精度 (Double - <code>double</code>)：</strong> 通常是 8 bytes (64 bits)。用於表示浮點數,具有比 <code>float</code> 更大的範圍和更高的精度。其表示範圍大約是 ±1.7 × 10<sup>-308</sup> 到 ±1.7 × 10<sup>+308</sup>,精度約為 15-17 位十進制數字。</li>
</ul>
<p>比較範圍時,不僅要看數值的絕對大小,還要看能表示的數量級。</p>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 整數(Integer)：</strong>範圍相對較小,受限於其位元數 (通常 32 位元)。</li>
    <li><strong>(B) 長整數(Long)：</strong>如果 <code>long</code> 和 <code>int</code> 大小相同 (例如都是 32 位元),則範圍也相同。如果 <code>long</code> 是 64 位元,則其範圍遠大於 32 位元 <code>int</code>,但仍小於 <code>double</code> 的指數範圍。</li>
    <li><strong>(C) 單精度(Single - <code>float</code>)：</strong>可以表示非常大或非常小的數 (透過指數),但其絕對範圍和精度不如 <code>double</code>。</li>
    <li><strong>(D) 倍精度(Double - <code>double</code>)：</strong>擁有最大的表示範圍 (由於其指數部分) 和最高的精度。它可以表示遠比整數型別更大或更小的數值。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>在給定的選項中,<code>double</code> (倍精度浮點數) 型別可表示的數值資料範圍最大,因為它不僅可以表示非常大的正負數,還可以表示非常接近於零的小數,且精度也較高。</p>
HTML
    ],
    [
        'id_suffix' => '11',
        'question_text' => '11. 在撰寫 C 語言程式時,下列哪一個變數宣告可以儲存 64 位元的浮點數？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) int'],
            ['key' => 'B', 'text' => '(B) float'],
            ['key' => 'C', 'text' => '(C) long'],
            ['key' => 'D', 'text' => '(D) double'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：C/C++ 資料型別大小</strong></p>
<p>C/C++ 語言標準對基本資料型別的大小有一些最小保證,但具體大小可能因編譯器和平台而異。不過,有一些常見的約定：</p>
<ul>
    <li><strong><code>int</code>：</strong> 通常是系統的「自然」字長,現代系統上常見為 32 位元 (4 bytes)。用於儲存整數。</li>
    <li><strong><code>float</code>：</strong> 單精度浮點數。根據 IEEE 754 標準,通常是 32 位元 (4 bytes)。</li>
    <li><strong><code>long</code> (或 <code>long int</code>)：</strong> 長整數。標準保證至少與 <code>int</code> 一樣大。在許多系統上是 32 位元,但在一些 64 位元系統上可能是 64 位元。用於儲存整數。</li>
    <li><strong><code>double</code>：</strong> 雙精度浮點數。根據 IEEE 754 標準,通常是 64 位元 (8 bytes)。</li>
    <li><strong><code>long double</code>：</strong> 擴展精度浮點數。大小不固定,但通常至少與 <code>double</code> 一樣大,可能是 80 位元或 128 位元。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) int：</strong>通常是 32 位元整數。</li>
    <li><strong>(B) float：</strong>通常是 32 位元浮點數。</li>
    <li><strong>(C) long：</strong>可能是 32 位元或 64 位元整數,但不是浮點數。</li>
    <li><strong>(D) double：</strong>通常是 64 位元浮點數。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>要儲存 64 位元的浮點數,應使用 <code>double</code> 型別。</p>
HTML
    ],
    [
        'id_suffix' => '12',
        'question_text' => '12. 若我們以 C++撰寫程式碼 std::cout <<"2016 holidays",請問其中的 cout 是？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)運算子'],
            ['key' => 'B', 'text' => '(B)類別'],
            ['key' => 'C', 'text' => '(C)物件'],
            ['key' => 'D', 'text' => '(D)變數'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：C++ 輸入/輸出流 (I/O Streams)</strong></p>
<p>在 C++ 中,標準的輸入輸出操作是通過流 (streams) 來實現的。<code>&lt;iostream&gt;</code> 標頭檔定義了幾個重要的流物件和類別。</p>
<ul>
    <li><strong><code>std::ostream</code>：</strong> 這是一個類別,代表輸出流。它提供了向各種目的地 (如控制台、檔案) 寫入資料的功能。</li>
    <li><strong><code>std::cout</code>：</strong> (console output) 這是 <code>std::ostream</code> 類別的一個<strong>全域物件</strong>。它代表標準輸出流,通常連接到主控台 (螢幕)。我們使用 <code>std::cout</code> 將資料輸出到螢幕上。</li>
    <li><strong><code>&lt;&lt;</code> (插入運算子)：</strong> 當用於 <code>std::ostream</code> 物件 (如 <code>std::cout</code>) 時,<code>&lt;&lt;</code> 被重載為「插入運算子」(insertion operator) 或「流插入運算子」(stream insertion operator)。它將右邊運算元的資料「插入」到左邊的輸出流物件中。</li>
</ul>
<p>程式碼 <code>std::cout &lt;&lt; "2016 holidays";</code> 的意思是：將字串 "2016 holidays" 插入到標準輸出流物件 <code>std::cout</code> 中,從而顯示在螢幕上。</p>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 運算子：</strong><code>&lt;&lt;</code> 在此上下文中是運算子 (插入運算子)。但題目問的是 <code>cout</code>。</li>
    <li><strong>(B) 類別：</strong><code>std::ostream</code> (或其基底類別) 是類別。<code>cout</code> 是這個類別的一個實例 (物件)。</li>
    <li><strong>(C) 物件：</strong>正確。<code>std::cout</code> 是 <code>std::ostream</code> 類別的一個預先定義好的全域物件。</li>
    <li><strong>(D) 變數：</strong>雖然物件在記憶體中佔有空間且可以被操作,類似於變數,但更精確的術語是「物件」。它是類別的一個實例。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>在 <code>std::cout &lt;&lt; "2016 holidays";</code> 中,<code>std::cout</code> 是一個物件 (<code>std::ostream</code> 類別的實例)。</p>
HTML
    ],
    [
        'id_suffix' => '13',
        'question_text' => '13. 使用函數 printf( )輸出字元時必須使用以下哪一種格式？',
        'code_snippet' => "#include <stdio.h>\n\nint main() {\n    char myChar = 'A';\n    printf(\"Character: %c\\n\", myChar);\n    return 0;\n}",
        'run_code_id' => 'q13-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nint main() {\n    char myChar = 'A';\n    printf(\"Character: %c\\n\", myChar);\n    printf(\"ASCII value of char: %d\\n\", myChar);\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)%s'],
            ['key' => 'B', 'text' => '(B)%c'],
            ['key' => 'C', 'text' => '(C)%d'],
            ['key' => 'D', 'text' => '(D)%f'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：<code>printf</code> 格式指定符</strong></p>
<p>C 語言中的 <code>printf</code> 函式使用格式指定符 (format specifiers) 來決定如何解釋和顯示後續參數的值。每個格式指定符以百分比符號 <code>%</code> 開頭。</p>
<p>常用的格式指定符包括：</p>
<ul>
    <li><strong><code>%c</code>：</strong> 用於輸出單個<strong>字元 (character)</strong>。對應的參數應該是一個 <code>char</code> 型別的值 (或可以被安全轉換為 <code>char</code> 的整數,如 ASCII 值)。</li>
    <li><strong><code>%s</code>：</strong> 用於輸出<strong>字串 (string)</strong>。對應的參數應該是一個指向字元陣列 (C-style string) 的指標 (<code>char*</code>)。</li>
    <li><strong><code>%d</code> 或 <code>%i</code>：</strong> 用於輸出有號十進制<strong>整數 (integer)</strong>。對應的參數應該是 <code>int</code> 型別。</li>
    <li><strong><code>%f</code>：</strong> 用於輸出浮點數 (<strong>float</strong> 或 <strong>double</strong>),以標準小數形式表示。當傳遞 <code>float</code> 給 <code>printf</code> 時,它會被自動提升 (promoted) 為 <code>double</code>。</li>
    <li><strong><code>%u</code>：</strong> 用於輸出無號十進制整數。</li>
    <li><strong><code>%x</code> 或 <code>%X</code>：</strong> 用於輸出無號十六進制整數。</li>
    <li><strong><code>%o</code>：</strong> 用於輸出無號八進制整數。</li>
    <li><strong><code>%p</code>：</strong> 用於輸出指標位址。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) %s：</strong>用於輸出字串。</li>
    <li><strong>(B) %c：</strong>用於輸出單個字元。</li>
    <li><strong>(C) %d：</strong>用於輸出有號十進制整數。</li>
    <li><strong>(D) %f：</strong>用於輸出浮點數。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>要使用 <code>printf()</code> 函式輸出單個字元,必須使用 <code>%c</code> 格式指定符。</p>
HTML
    ],
    [
        'id_suffix' => '14',
        'question_text' => '14. 若 a 為一浮點數,a=3.1415; printf("%.2f", a);會印出？',
        'code_snippet' => "#include <stdio.h>\n\nint main() {\n    float a = 3.1415;\n    printf(\"Value: %.2f\\n\", a);\n    return 0;\n}",
        'run_code_id' => 'q14-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nint main() {\n    float a = 3.1415;\n    printf(\"Value: %.2f\\n\", a);\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A) 3.141'],
            ['key' => 'B', 'text' => '(B) 3.14'],
            ['key' => 'C', 'text' => '(C) 3.1'],
            ['key' => 'D', 'text' => '(D) 3.2'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：<code>printf</code> 浮點數精度控制</strong></p>
<p>在 <code>printf</code> 的格式指定符中,對於浮點數 (如 <code>%f</code>),可以使用 <code>.[精度]</code> 來控制小數點後顯示的位數。</p>
<p><code>%.[精度]f</code></p>
<ul>
    <li><strong>精度：</strong> 指定小數點後面應該顯示多少位數字。輸出時,原始浮點數會被<strong>四捨五入</strong>到指定的精度。</li>
</ul>

<p><strong>2. 程式碼分析：</strong></p>
<p><code>a = 3.1415;</code><br>
<code>printf("%.2f", a);</code></p>
<ul>
    <li><strong>數值 <code>a</code>：</strong> <code>3.1415</code></li>
    <li><strong>格式 <code>%.2f</code>：</strong>
        <ul>
            <li><code>.2</code>：表示精度為 2,即小數點後顯示 2 位。</li>
            <li><code>f</code>：表示以標準小數形式輸出浮點數。</li>
        </ul>
    </li>
    <li>要將 <code>3.1415</code> 四捨五入到小數點後兩位：
        <ul>
            <li>我們看第三位小數,它是 <code>1</code>。</li>
            <li>因為 <code>1</code> 小於 5,所以第二位小數 <code>4</code> 不進位。</li>
            <li>結果是 <code>3.14</code>。</li>
        </ul>
    </li>
</ul>

<p><strong>3. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 3.141：</strong>這是小數點後三位,不符合 <code>.2f</code>。</li>
    <li><strong>(B) 3.14：</strong>正確。<code>3.1415</code> 四捨五入到小數點後兩位是 <code>3.14</code>。</li>
    <li><strong>(C) 3.1：</strong>這是小數點後一位。</li>
    <li><strong>(D) 3.2：</strong>這是錯誤的四捨五入 (除非是到小數點後一位且下一位是5或更大)。</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>執行 <code>printf("%.2f", 3.1415);</code> 會印出 <code>3.14</code>。</p>
HTML
    ],
    [
        'id_suffix' => '15',
        'question_text' => '15. C++語言提供 int、short、long、char、float、double 等幾種基本資料型態,關於其所需的記憶體空間大小的排序,下列何者正確？',
        'code_snippet' => "#include <iostream>\n#include <string>\n\nint main() {\n    std::cout << \"Size of char: \" << sizeof(char) << \" bytes\\n\";\n    std::cout << \"Size of short: \" << sizeof(short) << \" bytes\\n\";\n    std::cout << \"Size of int: \" << sizeof(int) << \" bytes\\n\";\n    std::cout << \"Size of long: \" << sizeof(long) << \" bytes\\n\";\n    std::cout << \"Size of long long: \" << sizeof(long long) << \" bytes\\n\"; // Often larger than long\n    std::cout << \"Size of float: \" << sizeof(float) << \" bytes\\n\";\n    std::cout << \"Size of double: \" << sizeof(double) << \" bytes\\n\";\n    std::cout << \"Size of long double: \" << sizeof(long double) << \" bytes\\n\";\n    return 0;\n}",
        'run_code_id' => 'q15-code',
        'code_snippet_for_runner' => "#include <iostream>\n\nint main() {\n    std::cout << \"Size of char: \" << sizeof(char) << \" bytes\\n\";\n    std::cout << \"Size of short: \" << sizeof(short) << \" bytes\\n\";\n    std::cout << \"Size of int: \" << sizeof(int) << \" bytes\\n\";\n    std::cout << \"Size of long: \" << sizeof(long) << \" bytes\\n\";\n    std::cout << \"Size of long long: \" << sizeof(long long) << \" bytes\\n\";\n    std::cout << \"Size of float: \" << sizeof(float) << \" bytes\\n\";\n    std::cout << \"Size of double: \" << sizeof(double) << \" bytes\\n\";\n    std::cout << \"Size of long double: \" << sizeof(long double) << \" bytes\\n\";\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A) short=char<int<float<double=long'],
            ['key' => 'B', 'text' => '(B) char<short<int=float=long<double'],
            ['key' => 'C', 'text' => '(C) char<short<int=float<double<long'],
            ['key' => 'D', 'text' => '(D) short<char=int=float<long<double'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：C++ 基本資料型態大小</strong></p>
<p>C++ 標準規定了各基本資料型態大小之間的關係和最小大小,但確切大小可能因編譯器和平台而異。常見的典型大小 (在多數現代系統上) 如下：</p>
<ul>
    <li><strong><code>char</code>：</strong> 通常 1 byte。標準保證它是最小的可定址單位,足以容納系統基本字元集中的任何字元。</li>
    <li><strong><code>short</code> (<code>short int</code>)：</strong> 通常 2 bytes。標準保證 <code>sizeof(short) &lt;= sizeof(int)</code>。</li>
    <li><strong><code>int</code>：</strong> 通常 4 bytes。系統的「自然」整數大小。</li>
    <li><strong><code>long</code> (<code>long int</code>)：</strong> 通常 4 bytes 或 8 bytes。標準保證 <code>sizeof(int) &lt;= sizeof(long)</code>。在許多32位元系統和部分64位元Windows系統上是4 bytes,在許多64位元Unix-like系統上是8 bytes。</li>
    <li><strong><code>long long</code> (<code>long long int</code>)：</strong> 通常 8 bytes。標準保證 <code>sizeof(long) &lt;= sizeof(long long)</code>。</li>
    <li><strong><code>float</code>：</strong> 通常 4 bytes (單精度浮點數)。</li>
    <li><strong><code>double</code>：</strong> 通常 8 bytes (雙精度浮點數)。</li>
    <li><strong><code>long double</code>：</strong> 通常 8 bytes, 10 bytes, 12 bytes, 或 16 bytes (擴展精度浮點數)。標準保證 <code>sizeof(double) &lt;= sizeof(long double)</code>。</li>
</ul>
<p>標準規定的層級關係：<br>
<code>1 == sizeof(char) &lt;= sizeof(short) &lt;= sizeof(int) &lt;= sizeof(long) &lt;= sizeof(long long)</code><br>
<code>sizeof(float) &lt;= sizeof(double) &lt;= sizeof(long double)</code></p>
<p>重要的是,<code>int</code>, <code>float</code>, 和 <code>long</code> (在 <code>long</code> 為 4 bytes 的系統上) 可能會有相同的大小 (例如都是 4 bytes)。</p>

<p><strong>2. 選項分析 (基於常見大小)：</strong></p>
<p>讓我們假設一個常見的環境,例如 <code>char</code> (1B), <code>short</code> (2B), <code>int</code> (4B), <code>float</code> (4B), <code>long</code> (4B 或 8B), <code>double</code> (8B)。</p>
<ul>
    <li><strong>(A) short=char<int<float<double=long：</strong>
        <ul>
            <li><code>short=char</code> (2B = 1B) -> 錯誤。</li>
        </ul>
    </li>
    <li><strong>(B) char<short<int=float=long<double：</strong>
        <ul>
            <li><code>char</code> (1B) <strong>&lt;</strong> <code>short</code> (2B) -> 正確。</li>
            <li><code>short</code> (2B) <strong>&lt;</strong> (<code>int</code> (4B) <strong>=</strong> <code>float</code> (4B) <strong>=</strong> <code>long</code> (假設為4B)) -> 這部分關係是可能的。</li>
            <li>(<code>int</code>/<code>float</code>/<code>long</code> at 4B) <strong>&lt;</strong> <code>double</code> (8B) -> 正確。</li>
            <li>這個選項在 <code>long</code> 為 4 bytes 的系統上是可能的且最符合層級。</li>
        </ul>
    </li>
    <li><strong>(C) char<short<int=float<double<long：</strong>
        <ul>
            <li>如果 <code>double</code> (8B) <strong>&lt;</strong> <code>long</code>,則 <code>long</code> 必須大於 8B (例如 16B,不常見)。或者如果 <code>long double</code> 被誤認為 <code>long</code>。
            但標準 <code>long</code> 通常不大於 <code>double</code>。</li>
        </ul>
    </li>
    <li><strong>(D) short<char=int=float<long<double：</strong>
        <ul>
            <li><code>short</code> (2B) <strong>&lt;</strong> <code>char</code> (1B) -> 錯誤。</li>
        </ul>
    </li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>考慮到 C++ 標準保證 <code>sizeof(char) &lt;= sizeof(short) &lt;= sizeof(int)</code> 和 <code>sizeof(float)</code> 通常等於 <code>sizeof(int)</code> 在許多系統上,並且 <code>sizeof(int) &lt;= sizeof(long)</code>,而 <code>sizeof(long)</code> 可能等於 <code>sizeof(int)</code> 或 <code>sizeof(double)</code> (如果 <code>long</code> 是 8 bytes 且 <code>int</code> 是 4 bytes)。</p>
<p>選項 (B) <code>char < short < int=float=long < double</code> 描述了一種常見的情況：</p>
<ul>
    <li><code>char</code> (1 byte)</li>
    <li><code>short</code> (2 bytes)</li>
    <li><code>int</code> (4 bytes) = <code>float</code> (4 bytes) = <code>long</code> (4 bytes on many systems)</li>
    <li><code>double</code> (8 bytes)</li>
</ul>
<p>這條鏈 <code>1 < 2 < 4=4=4 < 8</code> 是有效的。其他選項都包含至少一個在常見情況下不成立的強烈不等式或等式。</p>
<p><em>註：這類問題有時會因系統差異而產生歧義。但選項 B 是最能代表 C++ 標準層級和常見實現的。</em></p>
HTML
    ],
    [
        'id_suffix' => '16',
        'question_text' => '16. 關於 C 語言中的基本資料型態,其所佔用的記憶體空間大小,何者有誤？',
        'code_snippet' => "#include <stdio.h>\n\nint main() {\n    printf(\"Size of int: %zu bytes (%zu bits)\\n\", sizeof(int), sizeof(int)*8);\n    printf(\"Size of char: %zu bytes (%zu bits)\\n\", sizeof(char), sizeof(char)*8);\n    printf(\"Size of long: %zu bytes (%zu bits)\\n\", sizeof(long), sizeof(long)*8);\n    printf(\"Size of double: %zu bytes (%zu bits)\\n\", sizeof(double), sizeof(double)*8);\n    return 0;\n}",
        'run_code_id' => 'q16-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nint main() {\n    printf(\"Size of int: %zu bytes (%zu bits)\\n\", sizeof(int), sizeof(int)*8);\n    printf(\"Size of char: %zu bytes (%zu bits)\\n\", sizeof(char), sizeof(char)*8);\n    printf(\"Size of long: %zu bytes (%zu bits)\\n\", sizeof(long), sizeof(long)*8);\n    printf(\"Size of double: %zu bytes (%zu bits)\\n\", sizeof(double), sizeof(double)*8);\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A) int：32bit'],
            ['key' => 'B', 'text' => '(B)char：8bit'],
            ['key' => 'C', 'text' => '(C) long：64bit'],
            ['key' => 'D', 'text' => '(D) double：64bit'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：C/C++ 基本資料型態大小 (Bits)</strong></p>
<p>回顧常見的資料型態大小 (1 byte = 8 bits)：</p>
<ul>
    <li><strong><code>char</code>：</strong> 通常 1 byte = 8 bits. C standard guarantees <code>CHAR_BIT</code> (bits in a char) is at least 8.</li>
    <li><strong><code>int</code>：</strong> 通常 4 bytes = 32 bits on modern systems. The C standard guarantees it's at least 16 bits.</li>
    <li><strong><code>long</code> (<code>long int</code>)：</strong> 標準保證至少 32 bits.
        <ul>
            <li>在許多32位元系統和一些64位元系統 (如Windows 64-bit) 上,<code>long</code> 是 4 bytes = 32 bits.</li>
            <li>在許多64位元Unix-like系統 (如Linux, macOS) 上,<code>long</code> 是 8 bytes = 64 bits.</li>
        </ul>
        所以,<code>long</code> <strong>不一定</strong>是 64 bits。
    </li>
    <li><strong><code>double</code>：</strong> 通常 8 bytes = 64 bits (IEEE 754 double-precision).</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) int：32bit：</strong>在大多數現代系統上,<code>int</code> 是 32 位元。這是常見且通常被接受的說法。</li>
    <li><strong>(B) char：8bit：</strong><code>char</code> 通常是 8 位元。這是標準的。</li>
    <li><strong>(C) long：64bit：</strong>這不總是正確的。<code>long</code> 可能是 32 位元或 64 位元,取決於系統和編譯器。因此,聲稱它「是」64bit 是有誤的,因為它不是一個普適的保證。</li>
    <li><strong>(D) double：64bit：</strong><code>double</code> 通常是 64 位元。這是標準的雙精度浮點表示。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>選項 (C) "long：64bit" 是有誤的,因為 <code>long</code> 型別的大小並非在所有 C/C++ 環境下都固定為 64 位元。它可以是 32 位元。其他選項描述了更為普遍或標準的大小。</p>
HTML
    ],
    [
        'id_suffix' => '17',
        'question_text' => '17. 使用 C 語言的輸出函數 printf( ),要輸出浮點數時,必須使用下列那一種格式控制字元？',
        'code_snippet' => "#include <stdio.h>\n\nint main() {\n    float f_val = 3.14f;\n    double d_val = 2.71828;\n    printf(\"Float: %f\\n\", f_val);\n    printf(\"Double: %f\\n\", d_val); // %f also works for double\n    printf(\"Double (long float): %lf\\n\", d_val); // %lf is also common for double in printf\n    return 0;\n}",
        'run_code_id' => 'q17-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nint main() {\n    float f_val = 3.14f;\n    double d_val = 2.71828;\n    printf(\"Float (using %%f): %f\\n\", f_val);\n    printf(\"Double (using %%f): %f\\n\", d_val);\n    printf(\"Double (using %%lf): %lf\\n\", d_val);\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)%i'],
            ['key' => 'B', 'text' => '(B)%c'],
            ['key' => 'C', 'text' => '(C)%f'],
            ['key' => 'D', 'text' => '(D)%o'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：<code>printf</code> 格式指定符</strong></p>
<p>再次回顧 <code>printf</code> 的主要格式指定符：</p>
<ul>
    <li><code>%d</code> or <code>%i</code>: 用於有號十進制整數。</li>
    <li><code>%u</code>: 用於無號十進制整數。</li>
    <li><code>%f</code>: 用於浮點數 (<code>float</code> 或 <code>double</code>),以標準小數形式輸出。當傳遞 <code>float</code> 給 <code>printf</code> 時,它會被自動提升 (promoted) 為 <code>double</code>。</li>
    <li><code>%e</code> or <code>%E</code>: 用於以科學記號表示法輸出浮點數。</li>
    <li><code>%g</code> or <code>%G</code>: <code>printf</code> 會自動選擇 <code>%f</code> 或 <code>%e</code> 中較短的表示形式。</li>
    <li><code>%c</code>: 用於單個字元。</li>
    <li><code>%s</code>: 用於字串。</li>
    <li><code>%o</code>: 用於八進制整數。</li>
    <li><code>%x</code> or <code>%X</code>: 用於十六進制整數。</li>
    <li><code>%p</code>: 用於指標位址。</li>
    <li><code>%lf</code>: 在 <code>printf</code> 中,<code>%lf</code> (long float) 和 <code>%f</code> 通常都可以用來輸出 <code>double</code> 型別的參數。對於 <code>scanf</code>,<code>%f</code> 用於 <code>float*</code>,而 <code>%lf</code> 用於 <code>double*</code>,這是不同的。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) %i：</strong>用於輸出有號十進制整數。</li>
    <li><strong>(B) %c：</strong>用於輸出單個字元。</li>
    <li><strong>(C) %f：</strong>用於輸出浮點數 (<code>float</code> 或 <code>double</code>)。</li>
    <li><strong>(D) %o：</strong>用於輸出八進制整數。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>要使用 C 語言的 <code>printf()</code> 函式輸出浮點數時,必須使用 <code>%f</code> (或其他浮點數相關的如 <code>%e</code>, <code>%g</code>) 格式控制字元。<code>%lf</code> 也可以用於 <code>double</code>,但 <code>%f</code> 是最基本和通用的浮點數格式。</p>
HTML
    ],
    [
        'id_suffix' => '18',
        'question_text' => '18. 一 C 語言程式指令 printf("%c",66);執行後的輸出為何？',
        'code_snippet' => "#include <stdio.h>\n\nint main() {\n    printf(\"%c\", 66);\n    printf(\"\\n\"); // Add newline for clarity\n    printf(\"Integer 66 is: %d\\n\", 66);\n    return 0;\n}",
        'run_code_id' => 'q18-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nint main() {\n    printf(\"Output of printf(\\\"%%c\\\", 66): \");\n    printf(\"%c\", 66);\n    printf(\"\\n\");\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A) 66'],
            ['key' => 'B', 'text' => '(B) c'],
            ['key' => 'C', 'text' => '(C) B'],
            ['key' => 'D', 'text' => '(D) 42'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：<code>printf</code> 的 <code>%c</code> 格式與 ASCII 碼</strong></p>
<p><code>printf</code> 函式中的 <code>%c</code> 格式指定符用於輸出單個字元。</p>
<p>當你向 <code>%c</code> 提供一個整數值時,<code>printf</code> 會將該整數解釋為一個 ASCII (美國標準資訊交換碼) 值,並印出對應的字元。</p>
<p>ASCII 碼表定義了數字、字母、標點符號和其他控制字元與整數之間的對應關係。</p>
<p>常見的 ASCII 值：</p>
<ul>
    <li>'A' (大寫A) 的 ASCII 值是 65。</li>
    <li>'B' (大寫B) 的 ASCII 值是 66。</li>
    <li>'C' (大寫C) 的 ASCII 值是 67。</li>
    <li>...</li>
    <li>'a' (小寫a) 的 ASCII 值是 97。</li>
    <li>'0' (數字零) 的 ASCII 值是 48。</li>
</ul>

<p><strong>2. 程式碼分析：</strong></p>
<p>指令是 <code>printf("%c", 66);</code></p>
<ul>
    <li><strong>格式指定符：</strong> <code>%c</code>,表示要輸出一 個字元。</li>
    <li><strong>參數：</strong> <code>66</code> (一個整數)。</li>
</ul>
<p><code>printf</code> 會查找 ASCII 值為 66 的字元。根據 ASCII 表,66 對應的是大寫字母 'B'。</p>

<p><strong>3. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 66：</strong>如果格式是 <code>%d</code> (輸出整數),則會印出 66。</li>
    <li><strong>(B) c：</strong>小寫 'c' 的 ASCII 值是 99。</li>
    <li><strong>(C) B：</strong>大寫 'B' 的 ASCII 值是 66。這是正確的。</li>
    <li><strong>(D) 42：</strong>ASCII 值 42 對應的是星號 '*'。</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>執行 <code>printf("%c", 66);</code> 後,會輸出字元 'B'。</p>
HTML
    ],
    [
        'id_suffix' => '19',
        'question_text' => '19. 美花使用 C++語言寫一支程式,需要使用者從鍵盤輸入密碼進行驗證,她應該使用下列哪一行程式碼才是正確的？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) scanf("%i, passwd),'],
            ['key' => 'B', 'text' => '(B) scanf("%i, ＆passwd),'],
            ['key' => 'C', 'text' => '(C) cin<<passwd,'],
            ['key' => 'D', 'text' => '(D)  cout>>passwd,'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：鍵盤輸入</strong></p>
<p>在 C 和 C++ 中,從鍵盤讀取輸入有幾種常用方法：</p>
<ul>
    <li><strong>C 語言 (<code>&lt;stdio.h&gt;</code>)：</strong>
        <ul>
            <li><strong><code>scanf("format_string", &amp;variable1, &amp;variable2, ...);</code></strong>
                <ul>
                    <li><code>format_string</code> 包含格式指定符 (如 <code>%d</code> 代表整數, <code>%f</code> 代表浮點數, <code>%s</code> 代表字串, <code>%c</code> 代表字元)。</li>
                    <li>後續參數必須是變數的<strong>記憶體位址</strong> (通常使用取址運算子 <code>&amp;</code>)。這是因為 <code>scanf</code> 需要知道在哪個記憶體位置寫入讀取到的值。</li>
                    <li>讀取字串到字元陣列時,陣列名本身就是位址,所以不需要 <code>&amp;</code> (例如 <code>scanf("%s", myStringArray);</code>)。</li>
                </ul>
            </li>
        </ul>
    </li>
    <li><strong>C++ 語言 (<code>&lt;iostream&gt;</code>)：</strong>
        <ul>
            <li><strong><code>std::cin &gt;&gt; variable1 &gt;&gt; variable2 ...;</code></strong>
                <ul>
                    <li><code>std::cin</code> 是 <code>std::istream</code> 類別的一個物件,代表標準輸入流 (通常是鍵盤)。</li>
                    <li><code>&gt;&gt;</code> 是流提取運算子 (stream extraction operator),它從輸入流中讀取資料並存儲到右邊的變數中。</li>
                    <li>不需要使用 <code>&amp;</code>,因為運算子 <code>&gt;&gt;</code> 通常被重載以處理不同型態的變數,並能正確地將值存入變數。</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>
<p>題目提到「C++語言」,但選項同時包含了 C 風格的 <code>scanf</code> 和 C++ 風格的 <code>cin</code>/<code>cout</code>。我們需要分析哪個是語法正確且功能正確的。</p>
<p>假設密碼 <code>passwd</code> 是一個整數型態的變數 (例如 <code>int passwd;</code>) 因為選項 (A) 和 (B) 使用了 <code>%i</code> (等同於 <code>%d</code>)。</p>

<p><strong>2. 選項分析：</strong></p>
<p>注意：選項中的百分比符號 <code>%</code> 和逗號 <code>,</code> 似乎是全形字元,在實際程式碼中應為半形 <code>%</code> 和 <code>,</code>。</p>
<ul>
    <li><strong>(A) <code>scanf("%i, passwd),</code> (應為 <code>scanf("%i", passwd);</code>)：</strong>
        <ul>
            <li>如果 <code>passwd</code> 是整數,<code>scanf</code> 需要其位址。這裡缺少了取址運算子 <code>&amp;</code>。所以這是錯誤的。</li>
        </ul>
    </li>
    <li><strong>(B) <code>scanf("%i, ＆passwd),</code> (應為 <code>scanf("%i", &amp;passwd);</code>)：</strong>
        <ul>
            <li>假設 <code>passwd</code> 是整數,<code>%i</code> 是正確的格式指定符。</li>
            <li><code>&amp;passwd</code> 提供了 <code>passwd</code> 變數的記憶體位址。</li>
            <li>這是使用 <code>scanf</code> 讀取整數的正確語法 (忽略全形字元問題)。</li>
        </ul>
    </li>
    <li><strong>(C) <code>cin&lt;&lt;passwd,</code> (應為 <code>std::cin &gt;&gt; passwd;</code>)：</strong>
        <ul>
            <li><code>cin</code> 用於輸入,應該使用提取運算子 <code>&gt;&gt;</code>,而不是插入運算子 <code>&lt;&lt;</code> (<code>&lt;&lt;</code> 用於 <code>cout</code>)。</li>
            <li>所以這是錯誤的。</li>
        </ul>
    </li>
    <li><strong>(D) <code>cout&gt;&gt;passwd,</code> (應為 <code>std::cout &lt;&lt; passwd;</code> 或用於輸入的 <code>std::cin &gt;&gt; passwd;</code>)：</strong>
        <ul>
            <li><code>cout</code> 用於輸出,應該使用插入運算子 <code>&lt;&lt;</code>。</li>
            <li>如果意圖是輸入,應該用 <code>cin</code>。</li>
            <li>所以這是錯誤的。</li>
        </ul>
    </li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>如果我們假設題目意在考察 C 語言風格的輸入,並且忽略選項中的全形字元,選項 (B) <code>scanf("%i", &amp;passwd);</code> 是從鍵盤讀取一個整數到變數 <code>passwd</code> 的正確方式。</p>
<p>如果題目嚴格要求 C++ 風格,則正確的 C++ 寫法會是 <code>std::cin &gt;&gt; passwd;</code>,但這並未完全匹配任何選項的結構。不過,C++ 程式仍然可以使用 <code>scanf</code> (通過包含 <code>&lt;cstdio&gt;</code>)。</p>
<p>鑑於選項的格式,(B) 是最接近語法正確的 C/C++ 輸入方式。</p>
HTML
    ],
    [
        'id_suffix' => '20',
        'question_text' => '20. 在 C++語言中,要使用 cout 物件將字串輸出,在原始檔中需要載入函式庫,下列哪一種寫法正確？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)#include <stdio.h>'],
            ['key' => 'B', 'text' => '(B)#include <stdio>'],
            ['key' => 'C', 'text' => '(C)#include <iostream.h>'],
            ['key' => 'D', 'text' => '(D)#include <iostream>'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：C++ 標準函式庫與標頭檔</strong></p>
<p>在 C++ 中,標準函式庫的功能是通過包含相應的標頭檔 (header files) 來使用的。</p>
<ul>
    <li><strong><code>&lt;iostream&gt;</code>：</strong> 這是 C++ 標準函式庫中用於輸入/輸出操作的標頭檔。它定義了如 <code>std::cin</code> (標準輸入流物件)、<code>std::cout</code> (標準輸出流物件)、<code>std::cerr</code> (標準錯誤流物件) 以及相關的流操作。</li>
    <li><strong><code>&lt;stdio.h&gt;</code>：</strong> 這是 C 語言的標準輸入/輸出標頭檔,提供了如 <code>printf</code>, <code>scanf</code> 等函式。在 C++ 中,為了相容性,也可以使用 C 的標頭檔。C++ 版本的 C 標頭檔通常命名為 <code>&lt;cstdio&gt;</code> (不帶 <code>.h</code> 後綴,並且內容放在 <code>std</code> 命名空間中,儘管全域命名空間通常也可用)。</li>
    <li><strong>舊式 C++ 標頭檔 (如 <code>&lt;iostream.h&gt;</code>)：</strong> 在 C++ 標準化之前 (pre-standard C++),一些編譯器使用帶有 <code>.h</code> 後綴的標頭檔,如 <code>&lt;iostream.h&gt;</code>。然而,標準 C++ 使用不帶 <code>.h</code> 的標頭檔 (如 <code>&lt;iostream&gt;</code>),並且其內容通常位於 <code>std</code> 命名空間內。現代 C++ 程式應優先使用標準形式。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) <code>#include &lt;stdio.h&gt;</code>：</strong> 這會載入 C 語言的標準 I/O 函式庫,主要用於 <code>printf</code>, <code>scanf</code>。雖然可以在 C++ 中使用,但它不是使用 C++ 流物件 <code>std::cout</code> 的主要方式。</li>
    <li><strong>(B) <code>#include &lt;stdio&gt;</code>：</strong>這是 C 標頭檔的 C++ 版本 (等同於 <code>&lt;cstdio&gt;</code>)。同樣,主要用於 C 風格的 I/O。</li>
    <li><strong>(C) <code>#include &lt;iostream.h&gt;</code>：</strong>這是舊式 (pre-standard) C++ 的 I/O 標頭檔。雖然某些舊編譯器可能仍然支援,但它不是現代標準 C++ 的推薦用法。</li>
    <li><strong>(D) <code>#include &lt;iostream&gt;</code>：</strong>這是標準 C++ 中使用 <code>std::cin</code>, <code>std::cout</code> 等流物件所需的正確標頭檔。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>在 C++ 語言中,要使用 <code>cout</code> 物件 (完整名稱是 <code>std::cout</code>) 將字串輸出,需要在原始檔中載入 <code>&lt;iostream&gt;</code> 函式庫 (標頭檔)。</p>
HTML
    ],
    [
        'id_suffix' => '21',
        'question_text' => '21. 何種型別不是簡單資料型別(simple data type)？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)整數(integer)型別'],
            ['key' => 'B', 'text' => '(B)浮點數(float)型別'],
            ['key' => 'C', 'text' => '(C)邏輯(boolean)型別'],
            ['key' => 'D', 'text' => '(D)陣列(array)型別'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：資料型別分類</strong></p>
<p>在程式語言中,資料型別可以大致分為：</p>
<ul>
    <li><strong>簡單資料型別 (Simple Data Types / Primitive Data Types / Basic Data Types)：</strong>
        <ul>
            <li>這些是語言內建的最基本的資料型別,不能再被分解為更小的部分。</li>
            <li>它們通常直接對應於硬體層級可以操作的資料單位。</li>
            <li>範例 (在 C/C++ 中)：
                <ul>
                    <li><strong>整數型別：</strong> <code>char</code>, <code>short</code>, <code>int</code>, <code>long</code>, <code>long long</code> (以及它們的 <code>unsigned</code> 版本)。</li>
                    <li><strong>浮點數型別：</strong> <code>float</code>, <code>double</code>, <code>long double</code>。</li>
                    <li><strong>字元型別：</strong> <code>char</code> (也算作整數型別)。</li>
                    <li><strong>布林型別：</strong> <code>bool</code> (在 C++ 中)。C 語言沒有內建的 <code>bool</code>,通常用整數 (0 代表 false,非 0 代表 true) 模擬。</li>
                </ul>
            </li>
        </ul>
    </li>
    <li><strong>複合資料型別 (Compound Data Types / Aggregate Data Types / Derived Data Types)：</strong>
        <ul>
            <li>這些是由簡單資料型別或其他複合資料型別組合而成的更複雜的型別。</li>
            <li>它們允許將多個資料項組合成一個單一的邏輯單元。</li>
            <li>範例 (在 C/C++ 中)：
                <ul>
                    <li><strong>陣列 (Array)：</strong> 相同型別元素的一個有序集合。</li>
                    <li><strong>結構 (Structure - <code>struct</code>)：</strong> 不同型別元素的集合,組合成一個單一的記錄。</li>
                    <li><strong>聯合 (Union - <code>union</code>)：</strong> 允許在相同的記憶體位置儲存不同型別的資料 (但一次只能使用其中一種)。</li>
                    <li><strong>類別 (Class - C++ 特有)：</strong> 結構的擴展,可以包含資料成員和成員函式 (方法)。</li>
                    <li><strong>指標 (Pointer)：</strong> 儲存記憶體位址的變數。</li>
                    <li><strong>列舉 (Enumeration - <code>enum</code>)：</strong> 使用者定義的整數常數集合。</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 整數(integer)型別：</strong>這是簡單資料型別。</li>
    <li><strong>(B) 浮點數(float)型別：</strong>這是簡單資料型別。</li>
    <li><strong>(C) 邏輯(boolean)型別：</strong>在 C++ 中 (<code>bool</code>) 是簡單資料型別。在 C 中,雖然沒有專用關鍵字,但其概念 (用整數表示) 也被視為基本邏輯判斷。</li>
    <li><strong>(D) 陣列(array)型別：</strong>陣列是由多個相同型別的元素組成的,因此它是一個複合資料型別,不是簡單資料型別。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>陣列 (array) 型別不是簡單資料型別；它是一種複合資料型別。</p>
HTML
    ],
    [
        'id_suffix' => '22',
        'question_text' => '22. 下列敘述何者錯誤？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)	組合語言程式中也有變數及常數'],
            ['key' => 'B', 'text' => '(B)	如果某變數在程式執行中都不改變值的話,可以宣告為常數'],
            ['key' => 'C', 'text' => '(C)變數可以設定為某個常數'],
            ['key' => 'D', 'text' => '(D)常數可以設定為某個變數'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：變數與常數</strong></p>
<ul>
    <li><strong>變數 (Variable)：</strong>
        <ul>
            <li>是程式中用來儲存資料的一個具名記憶體位置。</li>
            <li>變數的值在程式執行過程中<strong>可以改變</strong>。</li>
            <li>在使用前通常需要宣告其資料型態和名稱。</li>
            <li>例如：<code>int age = 25; age = 26;</code> (age 的值可以改變)</li>
        </ul>
    </li>
    <li><strong>常數 (Constant)：</strong>
        <ul>
            <li>代表一個固定的值,在程式執行過程中<strong>不可改變</strong>。</li>
            <li>一旦被定義和初始化後,其值就不能再被修改。</li>
            <li>在 C/C++ 中,可以使用 <code>const</code> 關鍵字或 <code>#define</code> 前置處理指令來定義常數。</li>
            <li>例如：<code>const double PI = 3.14159;</code> 或 <code>#define MAX_USERS 100</code>。嘗試修改 <code>PI</code> 或 <code>MAX_USERS</code> 會導致編譯錯誤或未定義行為。</li>
        </ul>
    </li>
    <li><strong>組合語言 (Assembly Language)：</strong>
        <ul>
            <li>是一種低階程式語言,與特定的電腦架構緊密相關。</li>
            <li>它也支援類似變數 (透過標籤或符號來引用記憶體位置) 和常數 (直接在指令中使用數值或定義符號常數) 的概念。</li>
        </ul>
    </li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 組合語言程式中也有變數及常數：</strong>正確。組合語言使用標籤 (labels) 來代表記憶體位置 (類似變數),並可以直接使用數值或定義符號常數。</li>
    <li><strong>(B) 如果某變數在程式執行中都不改變值的話,可以宣告為常數：</strong>正確。這正是使用常數的目的和好處。如果一個值在程式邏輯中不應改變,將其宣告為常數可以增強程式的可讀性和健壯性,並防止意外修改。</li>
    <li><strong>(C) 變數可以設定為某個常數：</strong>正確。這是變數初始化的常見做法,或者在賦值操作中將一個常數值賦予變數。例如：<code>int score = 100;</code> (變數 <code>score</code> 被設定為常數值 100)。</li>
    <li><strong>(D) 常數可以設定為某個變數：</strong>錯誤。常數的核心特性是其值在定義後不能改變。你不能將一個常數的值設定為一個變數的值,因為變數的值可能會改變,這會違反常數不可變的原則。更準確地說,你不能在常數初始化之後「重新賦值」給它,無論是賦予一個變數的值還是另一個常數的值。例如,<code>const int X = 10; int y = 20; X = y;</code> 是不允許的。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>敘述「(D) 常數可以設定為某個變數」是錯誤的。常數的值在初始化後是固定的,不能被重新設定或賦值,無論是賦予變數的值還是其他值。</p>
HTML
    ],
    [
        'id_suffix' => '23',
        'question_text' => '23. 在 C 語言中沒有布林資料型別,因此將哪一個值視同為 false(假)？',
        'code_snippet' => "#include <stdio.h>\n\nint main() {\n    if (0) {\n        printf(\"0 is true\\n\");\n    } else {\n        printf(\"0 is false\\n\");\n    }\n    if (1) {\n        printf(\"1 is true\\n\");\n    } else {\n        printf(\"1 is false\\n\");\n    }\n    if (-5) {\n        printf(\"-5 is true\\n\");\n    } else {\n        printf(\"-5 is false\\n\");\n    }\n    return 0;\n}",
        'run_code_id' => 'q23-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nint main() {\n    if (0) {\n        printf(\"Inside if(0) - This should NOT print.\\n\");\n    } else {\n        printf(\"Inside else for if(0) - 0 is treated as false.\\n\");\n    }\n\n    if (1) {\n        printf(\"Inside if(1) - 1 is treated as true.\\n\");\n    } else {\n        printf(\"Inside else for if(1) - This should NOT print.\\n\");\n    }\n\n    if (-100) {\n        printf(\"Inside if(-100) - -100 is treated as true.\\n\");\n    } else {\n        printf(\"Inside else for if(-100) - This should NOT print.\\n\");\n    }\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A) -100'],
            ['key' => 'B', 'text' => '(B) -1'],
            ['key' => 'C', 'text' => '(C) 0'],
            ['key' => 'D', 'text' => '(D) 1'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：C 語言中的布林邏輯</strong></p>
<p>標準 C 語言 (例如 C89/C90) 並沒有內建的布林 (boolean) 資料型別關鍵字如 <code>bool</code>、<code>true</code> 或 <code>false</code> (這些是在 C99 標準中通過 <code>&lt;stdbool.h&gt;</code> 引入的,並在 C++ 中作為關鍵字存在)。</p>
<p>在傳統 C 語言中,布林邏輯是通過整數來模擬的：</p>
<ul>
    <li><strong><code>0</code> (零)：</strong> 被視為<strong>假 (false)</strong>。</li>
    <li><strong>任何非零值 (non-zero value)：</strong> 被視為<strong>真 (true)</strong>。這包括所有正整數和所有負整數。</li>
</ul>
<p>這種機制用於條件判斷語句 (如 <code>if</code>, <code>while</code>) 和邏輯運算子 (如 <code>&&</code>, <code>||</code>, <code>!</code>) 的結果。</p>
<p>例如：</p>
<pre><code class="language-c">
int a = 5;
int b = 0;

if (a) { // 'a' is non-zero (5), so this is true
    // ... code executed ...
}

if (b) { // 'b' is zero (0), so this is false
    // ... code NOT executed ...
}
</code></pre>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) -100：</strong>非零值,在 C 語言中視為真 (true)。</li>
    <li><strong>(B) -1：</strong>非零值,在 C 語言中視為真 (true)。</li>
    <li><strong>(C) 0：</strong>零值,在 C 語言中視為假 (false)。</li>
    <li><strong>(D) 1：</strong>非零值,在 C 語言中視為真 (true)。(1 通常被用來代表 true 的典型值)。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>在 C 語言中 (傳統上,在沒有 <code>&lt;stdbool.h&gt;</code> 的情況下),整數值 <code>0</code> 被視同為 false (假)。</p>
HTML
    ],
    [
        'id_suffix' => '24',
        'question_text' => '24. 請問若宣告一個 short int 的整數佔用 2 bytes 的記憶體空間,則此整數的表示範圍為下列何者？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) -2,147,483,648~2,147,483,647'],
            ['key' => 'B', 'text' => '(B) 0~65,535'],
            ['key' => 'C', 'text' => '(C) -32,768~32,767'],
            ['key' => 'D', 'text' => '(D)  0~4,294,967,295'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：有號整數 <code>short int</code> 的表示範圍</strong></p>
<p>題目明確指出 <code>short int</code> 佔用 2 bytes 的記憶體空間。</p>
<p>2 bytes = 2 * 8 bits = 16 bits。</p>
<p>當 <code>short int</code> 用於表示有號整數時 (這是 C/C++ 中 <code>short int</code> 或 <code>short</code> 的預設行為),其表示範圍的計算如下：</p>
<ul>
    <li>總位元數 n = 16。</li>
    <li>最高有效位元 (Most Significant Bit, MSB) 用作符號位 (0 代表正數或零,1 代表負數)。</li>
    <li>其餘的 n-1 (即 15) 位元用於表示數值的大小。</li>
    <li><strong>最小值 (負數)：</strong> 對於 n 位元的有號整數 (使用二補數表示法),最小值是 -2<sup>(n-1)</sup>。
        <br>對於 16 位元,最小值是 -2<sup>(16-1)</sup> = -2<sup>15</sup> = <strong>-32,768</strong>。</li>
    <li><strong>最大值 (正數)：</strong> 對於 n 位元的有號整數,最大值是 2<sup>(n-1)</sup> - 1。
        <br>對於 16 位元,最大值是 2<sup>(16-1)</sup> - 1 = 2<sup>15</sup> - 1 = 32,768 - 1 = <strong>32,767</strong>。</li>
</ul>
<p>因此,一個 2-byte (16-bit) 的有號 <code>short int</code> 的表示範圍是從 -32,768 到 32,767。</p>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) -2,147,483,648 ~ 2,147,483,647：</strong> 這是典型的 4-byte (32-bit) 有號整數 (<code>int</code>) 的範圍。</li>
    <li><strong>(B) 0 ~ 65,535：</strong> 這是典型的 2-byte (16-bit) <strong>無號</strong>整數 (<code>unsigned short int</code>) 的範圍 (2<sup>16</sup> - 1 = 65,535)。</li>
    <li><strong>(C) -32,768 ~ 32,767：</strong> 正確。這符合 2-byte (16-bit) 有號整數的範圍。</li>
    <li><strong>(D) 0 ~ 4,294,967,295：</strong> 這是典型的 4-byte (32-bit) <strong>無號</strong>整數 (<code>unsigned int</code>) 的範圍 (2<sup>32</sup> - 1)。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>若一個 <code>short int</code> 的整數佔用 2 bytes 的記憶體空間,則此 (有號) 整數的表示範圍為 -32,768 到 32,767。</p>
HTML
    ],
    [
        'id_suffix' => '25',
        'question_text' => '25. 程式執行過程中,若變數發生溢位情形,其主要原因為何？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)以有限數目的位元儲存變數值'],
            ['key' => 'B', 'text' => '(B)電壓不穩定'],
            ['key' => 'C', 'text' => '(C)作業系統與程式不甚相容'],
            ['key' => 'D', 'text' => '(D)變數過多導致編譯器無法完全處理'],
        ],
        'correct_answer' => 'A',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：變數溢位 (Overflow/Underflow)</strong></p>
<p>在電腦程式設計中,變數是用來儲存資料的。每種資料型態 (如 <code>int</code>, <code>short</code>, <code>char</code>, <code>float</code>, <code>double</code>) 都有其固定的大小,即它在記憶體中佔用的位元 (bits) 數目是有限的。這個有限的位元數目決定了該型態變數可以表示的數值的範圍。</p>
<p><strong>溢位 (Overflow)</strong> 發生在嘗試將一個超出該資料型態所能表示的<strong>最大值</strong>存入變數時。例如,如果一個 <code>signed char</code> (通常範圍 -128 到 127) 儲存了 127,然後你再給它加 1,結果可能不會是 128,而是會「繞回」(wrap around) 到 -128 (在二補數表示法中),這就是溢位。</p>
<p><strong>下溢 (Underflow)</strong> 發生在嘗試將一個超出該資料型態所能表示的<strong>最小值</strong> (對於浮點數,則指小於其能表示的最小正數) 存入變數時。例如,對一個 <code>signed char</code> 儲存了 -128,再減 1,結果可能繞回到 127。</p>
<p>總之,溢位/下溢的根本原因是變數的儲存空間 (位元數) 有限,無法表示超出其設計範圍的數值。</p>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 以有限數目的位元儲存變數值：</strong>正確。因為變數的儲存空間是有限的 (例如,一個 <code>int</code> 可能是 32 位元),所以它只能表示一定範圍內的數字。當計算結果超出這個範圍時,就會發生溢位。</li>
    <li><strong>(B) 電壓不穩定：</strong>電壓不穩定可能導致硬體故障或資料損壞,但不是變數溢位的直接和常規原因。溢位是算術運算和資料型態限制的邏輯結果。</li>
    <li><strong>(C) 作業系統與程式不甚相容：</strong>作業系統與程式的相容性問題可能導致程式無法執行或執行錯誤,但與特定變數算術運算超出其型態範圍的溢位問題不直接相關。</li>
    <li><strong>(D) 變數過多導致編譯器無法完全處理：</strong>變數的數量主要影響記憶體的使用。如果變數過多導致記憶體不足,程式可能會崩潰或執行緩慢,但這與單個變數的算術溢位是不同的問題。編譯器可以處理大量變數,只要語法正確且資源足夠。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>程式執行過程中,若變數發生溢位情形,其主要原因是該變數是以有限數目的位元來儲存其值,而運算結果超出了這個有限位元所能表示的範圍。</p>
HTML
    ],
    [
        'id_suffix' => '26',
        'question_text' => '26. 下列程式片段的執行結果為何？',
        'code_snippet' => "int a;\nprintf(\"%zu\", sizeof(a)); // Use %zu for sizeof",
        'run_code_id' => 'q26-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nint main() {\n    int a;\n    // sizeof returns size_t, correctly printed with %zu\n    printf(\"Size of a (int): %zu\\n\", sizeof(a));\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A) 1'],
            ['key' => 'B', 'text' => '(B) 2'],
            ['key' => 'C', 'text' => '(C) 4'],
            ['key' => 'D', 'text' => '(D) 8'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：<code>sizeof</code> 運算子</strong></p>
<p>在 C/C++ 中,<code>sizeof</code> 是一個一元運算子 (unary operator),它回傳其運算元 (可以是一個型態或一個變數/表達式) 在記憶體中所佔用的空間大小,單位是<strong>位元組 (bytes)</strong>。</p>
<p><code>sizeof</code> 的結果型態是 <code>size_t</code>,這是一個無符號整數型態。在 <code>printf</code> 中,輸出 <code>size_t</code> 型別的值建議使用 <code>%zu</code> 格式指定符。</p>
<p>對於資料型態 <code>int</code>：</p>
<ul>
    <li>C/C++ 標準並沒有嚴格規定 <code>int</code> 必須是特定的大小,但它通常對應於處理器的「自然」字長 (word size)。</li>
    <li>在大多數現代的32位元和64位元系統上,<code>int</code> 型別通常佔用 <strong>4 bytes</strong> (即 32 bits)。</li>
    <li>在一些較舊的系統 (如16位元系統) 上,<code>int</code> 可能是 2 bytes。</li>
</ul>

<p><strong>2. 程式碼分析：</strong></p>
<pre><code class="language-c">
int a;
printf("%d", sizeof(a)); // Note: %d is technically incorrect for size_t, should be %zu
</code></pre>
<ul>
    <li><code>int a;</code>：宣告了一個整數型態的變數 <code>a</code>。</li>
    <li><code>sizeof(a)</code>：計算變數 <code>a</code> (其型態為 <code>int</code>) 所佔用的記憶體大小 (以 bytes 為單位)。</li>
</ul>
<p>假設在一個 <code>int</code> 為 4 bytes 的常見系統上執行這段程式碼,<code>sizeof(a)</code> 將回傳 4。</p>

<p><strong>3. 選項分析 (基於常見 <code>int</code> 大小)：</strong></p>
<ul>
    <li><strong>(A) 1：</strong>通常是 <code>char</code> 的大小。</li>
    <li><strong>(B) 2：</strong>通常是 <code>short</code> 的大小,或在舊系統上 <code>int</code> 的大小。</li>
    <li><strong>(C) 4：</strong>在大多數現代系統上,這是 <code>int</code> (和 <code>float</code>, 有時 <code>long</code>) 的大小。</li>
    <li><strong>(D) 8：</strong>通常是 <code>double</code>, <code>long long</code> 的大小,或在某些64位元系統上 <code>long</code> 的大小。</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>雖然 <code>int</code> 的確切大小是依賴於實現 (implementation-defined),但在目前絕大多數的教學和競賽環境中,可以預期 <code>int</code> 是 4 bytes。因此,<code>sizeof(a)</code> (其中 <code>a</code> 是 <code>int</code>) 的結果最可能是 4。</p>
<p><em>重要提示：在 <code>printf</code> 中,用於 <code>sizeof</code> 結果的正確格式指定符是 <code>%zu</code>。使用 <code>%d</code> 可能在某些情況下能工作,但並非完全可移植或正確。</em></p>
HTML
    ],
    [
        'id_suffix' => '27',
        'question_text' => '27. 在  C/C++語言中,以下指令執行完後,顯示的值為何？',
        'code_snippet' => "printf(\"%o\\n\",15);",
        'run_code_id' => 'q27-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nint main() {\n    printf(\"Decimal 15 in octal: %o\\n\", 15);\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A) 17'],
            ['key' => 'B', 'text' => '(B) 15'],
            ['key' => 'C', 'text' => '(C) F'],
            ['key' => 'D', 'text' => '(D) 15.0'],
        ],
        'correct_answer' => 'A',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：<code>printf</code> 的 <code>%o</code> 格式指定符 (八進制輸出)</strong></p>
<p>在 C/C++ 的 <code>printf</code> 函式中,<code>%o</code> 格式指定符用於將一個整數值以<strong>無符號八進制 (octal, base-8)</strong> 的形式輸出。</p>
<p>八進制系統使用數字 0 到 7。</p>
<p>要將十進制數轉換為八進制數,可以採用除以 8 取餘數的方法：</p>
<p>對於十進制數 15：</p>
<ul>
    <li>15 ÷ 8 = 1 ... 餘數 <strong>7</strong> (這是八進制數的最低位)</li>
    <li>1 ÷ 8 = 0 ... 餘數 <strong>1</strong> (這是八進制數的下一位)</li>
</ul>
<p>將餘數從下往上讀取,得到八進制表示：<code>17</code><sub>8</sub>。</p>
<p>(驗證：17<sub>8</sub> = 1 * 8<sup>1</sup> + 7 * 8<sup>0</sup> = 1 * 8 + 7 * 1 = 8 + 7 = 15<sub>10</sub>)</p>

<p><strong>2. 程式碼分析：</strong></p>
<pre><code class="language-c">
printf("%o\\n",15);
</code></pre>
<ul>
    <li><code>%o</code>：指示 <code>printf</code> 將參數 <code>15</code> (一個十進制整數) 轉換為其八進制表示並輸出。</li>
    <li><code>\\n</code>：輸出一個換行符。</li>
</ul>
<p>如上轉換,15 的八進制表示是 17。</p>

<p><strong>3. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 17：</strong>正確。這是十進制 15 的八進制表示。</li>
    <li><strong>(B) 15：</strong>如果格式是 <code>%d</code> (十進制),則會輸出 15。</li>
    <li><strong>(C) F：</strong>如果格式是 <code>%X</code> 或 <code>%x</code> (十六進制),則會輸出 F (因為十進制 15 等於十六進制 F)。</li>
    <li><strong>(D) 15.0：</strong>如果格式是 <code>%f</code> (浮點數),並且 15 被當作浮點數處理,則可能輸出 15.000000 (預設精度)。</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>執行 <code>printf("%o\\n",15);</code> 後,會顯示 <code>17</code>,然後換行。</p>
HTML
    ],
    [
        'id_suffix' => '28',
        'question_text' => '28. 下列那一個不是 C 語言的合法變數名稱？ 【106 年工科技藝競賽】',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) _Test'],
            ['key' => 'B', 'text' => '(B) TEST'],
            ['key' => 'C', 'text' => '(C) 5test'],
            ['key' => 'D', 'text' => '(D) test1'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：C/C++ 變數命名規則</strong></p>
<p>在 C/C++ 中,變數(或識別碼)的命名必須遵循以下規則：</p>
<ul>
    <li>可以包含：
        <ul>
            <li>大小寫英文字母 (<code>a-z</code>, <code>A-Z</code>)</li>
            <li>數字 (<code>0-9</code>)</li>
            <li>底線 (<code>_</code>)</li>
        </ul>
    </li>
    <li><strong>第一個字元必須是字母或底線 (<code>_</code>)。第一個字元不能是數字。</strong></li>
    <li>變數名稱區分大小寫 (例如,<code>myVar</code> 和 <code>MyVar</code> 是不同的變數)。</li>
    <li>不能使用 C/C++ 的關鍵字 (保留字) 作為變數名稱 (例如 <code>int</code>, <code>while</code>, <code>float</code> 等)。</li>
    <li>長度通常沒有嚴格限制,但過長的名稱可能不易閱讀或被某些舊編譯器截斷。</li>
    <li>習慣上,不建議使用連續底線或以雙底線開頭的名稱,因為這些通常保留給編譯器或標準函式庫內部使用。以單底線開頭的名稱也應謹慎使用。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) _Test：</strong>
        <ul>
            <li>以底線 <code>_</code> 開頭：合法。</li>
            <li>後續字元 <code>Test</code> (字母)：合法。</li>
            <li>整體：合法。</li>
        </ul>
    </li>
    <li><strong>(B) TEST：</strong>
        <ul>
            <li>全部由大寫字母組成：合法。</li>
            <li>整體：合法。</li>
        </ul>
    </li>
    <li><strong>(C) 5test：</strong>
        <ul>
            <li><strong>以數字 <code>5</code> 開頭：不合法。</strong>變數名稱的第一個字元不能是數字。</li>
        </ul>
    </li>
    <li><strong>(D) test1：</strong>
        <ul>
            <li>以字母 <code>t</code> 開頭：合法。</li>
            <li>後續字元 <code>est1</code> (字母和數字)：合法。</li>
            <li>整體：合法。</li>
        </ul>
    </li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>選項 (C) <code>5test</code> 不是 C 語言的合法變數名稱,因為它以數字開頭。</p>
HTML
    ],
    [
        'id_suffix' => '29',
        'question_text' => '29. 在 C 語言中,下列那一種變數名稱是不合法？ 【107 年工科技藝競賽】',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) _Happy'],
            ['key' => 'B', 'text' => '(B) Happy'],
            ['key' => 'C', 'text' => '(C) 9Happy'],
            ['key' => 'D', 'text' => '(D) Happy2'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：C/C++ 變數命名規則</strong></p>
<p>再次複習 C/C++ 變數命名規則：</p>
<ul>
    <li>可包含字母 (a-z, A-Z), 數字 (0-9), 和底線 (<code>_</code>)。</li>
    <li><strong>第一個字元必須是字母或底線 (<code>_</code>)。不能是數字。</strong></li>
    <li>不能是關鍵字。</li>
    <li>區分大小寫。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) _Happy：</strong>
        <ul>
            <li>以底線 <code>_</code> 開頭：合法。</li>
            <li>後續字元 <code>Happy</code> (字母)：合法。</li>
            <li>整體：合法。</li>
        </ul>
    </li>
    <li><strong>(B) Happy：</strong>
        <ul>
            <li>以字母 <code>H</code> 開頭：合法。</li>
            <li>後續字元 <code>appy</code> (字母)：合法。</li>
            <li>整體：合法。</li>
        </ul>
    </li>
    <li><strong>(C) 9Happy：</strong>
        <ul>
            <li><strong>以數字 <code>9</code> 開頭：不合法。</strong>變數名稱的第一個字元不能是數字。</li>
        </ul>
    </li>
    <li><strong>(D) Happy2：</strong>
        <ul>
            <li>以字母 <code>H</code> 開頭：合法。</li>
            <li>後續字元 <code>appy2</code> (字母和數字)：合法。</li>
            <li>整體：合法。</li>
        </ul>
    </li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>選項 (C) <code>9Happy</code> 不是 C 語言的合法變數名稱,因為它以數字開頭。</p>
HTML
    ],
    [
        'id_suffix' => '30',
        'question_text' => '30. 關於 C 程式語言中,使用 define 建立常數的方式,下列何者正確？【111 年統測】',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)define PI=3.14;'],
            ['key' => 'B', 'text' => '(B)define PI 3.14;'],
            ['key' => 'C', 'text' => '(C)#define PI=3.14'],
            ['key' => 'D', 'text' => '(D)#define PI 3.14'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：<code>#define</code> 前置處理指令</strong></p>
<p>在 C/C++ 中,<code>#define</code> 是一個前置處理指令 (preprocessor directive),用於定義巨集 (macros)。它最常見的用途之一是定義符號常數 (symbolic constants)。</p>
<p><code>#define</code> 的基本語法如下：</p>
<p><code>#define IDENTIFIER replacement_text</code></p>
<ul>
    <li><strong><code>#define</code>：</strong> 指令本身,必須以 <code>#</code> 開頭,通常放在一行的開頭 (前面可以有空白)。</li>
    <li><strong><code>IDENTIFIER</code>：</strong> 你要定義的巨集名稱 (常數名)。命名規則與變數名類似 (通常使用全大寫以區分普通變數)。</li>
    <li><strong><code>replacement_text</code>：</strong> 在前置處理階段,原始碼中所有出現的 <code>IDENTIFIER</code> (除非它在字串常值或註解中,或有其他特殊情況) 都會被這個 <code>replacement_text</code> 原文取代。</li>
    <li><strong>不需要等號 <code>=</code></strong> 在 <code>IDENTIFIER</code> 和 <code>replacement_text</code> 之間。</li>
    <li><strong>不需要分號 <code>;</code></strong> 在指令的末尾。如果加了分號,分號本身也會成為 <code>replacement_text</code> 的一部分,這通常不是期望的行為 (除非刻意為之,例如在定義多行巨集時)。</li>
</ul>
<p>例如：<code>#define PI 3.14159</code>
在前置處理後,程式碼中的 <code>area = PI * r * r;</code> 會變成 <code>area = 3.14159 * r * r;</code>。</p>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) <code>define PI=3.14;</code>：</strong>
        <ul>
            <li>缺少了指令開頭的 <code>#</code>。</li>
            <li>包含了等號 <code>=</code>,這是錯誤的語法。</li>
            <li>包含了分號 <code>;</code>,這會成為替換文本的一部分。</li>
        </ul>
    </li>
    <li><strong>(B) <code>define PI 3.14;</code>：</strong>
        <ul>
            <li>缺少了指令開頭的 <code>#</code>。</li>
            <li>包含了分號 <code>;</code>,這會成為替換文本的一部分。</li>
        </ul>
    </li>
    <li><strong>(C) <code>#define PI=3.14</code>：</strong>
        <ul>
            <li>包含了指令開頭的 <code>#</code>,正確。</li>
            <li>包含了等號 <code>=</code>,這是錯誤的語法。如果這樣寫,<code>PI</code> 會被替換為 <code>=3.14</code>,這在大多數上下文中會導致編譯錯誤。</li>
        </ul>
    </li>
    <li><strong>(D) <code>#define PI 3.14</code>：</strong>
        <ul>
            <li>包含了指令開頭的 <code>#</code>,正確。</li>
            <li><code>PI</code> 是識別碼。</li>
            <li><code>3.14</code> 是替換文本。</li>
            <li>沒有等號,沒有行末分號。這是正確的語法。</li>
        </ul>
    </li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>使用 <code>#define</code> 建立常數的正確方式是 (D) <code>#define PI 3.14</code>。</p>
HTML
    ],
    [
        'id_suffix' => '31',
        'question_text' => '31. 關於 C 程式語言的資料型態,下列敘述何者錯誤？ 【111 年統測】',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) float 資料型態可以儲存浮點數,數值精確度跟 double 資料型態相同'],
            ['key' => 'B', 'text' => '(B) 宣告 int 資料型態可以儲存整數資料'],
            ['key' => 'C', 'text' => '(C) double 資料型態可以儲存浮點數值'],
            ['key' => 'D', 'text' => '(D) 宣告 char 資料型態可以儲存字元符號'],
        ],
        'correct_answer' => 'A',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：C/C++ 資料型態特性</strong></p>
<ul>
    <li><strong><code>float</code>：</strong>單精度浮點數型態。用於儲存帶有小數點的數值。它通常佔用 4 bytes (32 bits)。其精度(有效數字位數)通常約為 6-9 位十進制數字。</li>
    <li><strong><code>double</code>：</strong>雙精度浮點數型態。也用於儲存帶有小數點的數值,但通常比 <code>float</code> 佔用更多的記憶體空間 (通常 8 bytes / 64 bits) 並提供更高的精度和更大的表示範圍。其精度通常約為 15-17 位十進制數字。</li>
    <li><strong><code>int</code>：</strong>整數型態。用於儲存沒有小數部分的整數。大小通常為 4 bytes。</li>
    <li><strong><code>char</code>：</strong>字元型態。用於儲存單個字元 (如 'a', '$', '7')。它實際上是小整數型態,通常佔用 1 byte,儲存的是字元的 ASCII 值或其他字元編碼值。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) float 資料型態可以儲存浮點數,數值精確度跟 double 資料型態相同：</strong>
        <ul>
            <li>前半句「float 資料型態可以儲存浮點數」是正確的。</li>
            <li>後半句「數值精確度跟 double 資料型態相同」是<strong>錯誤的</strong>。<code>double</code> 型態被設計為提供比 <code>float</code> 型態更高的數值精確度 (通常約兩倍的有效數字位數) 和更大的表示範圍。</li>
        </ul>
    </li>
    <li><strong>(B) 宣告 int 資料型態可以儲存整數資料：</strong>正確。這是 <code>int</code> 型態的基本用途。</li>
    <li><strong>(C) double 資料型態可以儲存浮點數值：</strong>正確。這是 <code>double</code> 型態的基本用途。</li>
    <li><strong>(D) 宣告 char 資料型態可以儲存字元符號：</strong>正確。這是 <code>char</code> 型態的主要用途。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>敘述「(A) float 資料型態可以儲存浮點數,數值精確度跟 double 資料型態相同」是錯誤的,因為 <code>double</code> 的精確度遠高於 <code>float</code>。</p>
HTML
    ],
    [
        'id_suffix' => '32',
        'question_text' => '32. 小芳在一個原本可以編譯(Compile)成功的程式中,在 main( )主程式內再加入行號 1 至行號 6 的程式碼,但加入後發 編譯錯誤的情況。

小芳刪除行號 1 至行號 5 中的哪一個部分後,可以使程式編譯成功？ 【112 年統測】',
        'code_snippet' => "1 #define Value1  100\n2 #define Value2 (Value1 - 1)\n3 const  int  Value3;\n4 int CheckValue = 0;\n5 Value3 = Value2;\n6 CheckValue = Value1 + Value3;\n",
        'run_code_id' => 'q32-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\n#define Value1 100\n#define Value2 (Value1 - 1)\n\nint main() {\n    // const int Value3; // Line 3: Error if uninitialized and later assigned\n    // int CheckValue = 0; // Line 4\n    // Value3 = Value2;    // Line 5: Error - assignment to const variable\n\n    // To make it compile by removing 'const' from line 3:\n    int Value3_modified; // Simulating removal of 'const'\n    int CheckValue_modified = 0;\n    Value3_modified = Value2;\n    CheckValue_modified = Value1 + Value3_modified;\n    printf(\"If 'const' is removed from Value3 declaration:\\n\");\n    printf(\"Value3_modified = %d\\n\", Value3_modified);\n    printf(\"CheckValue_modified = %d\\n\\n\", CheckValue_modified);\n\n    // To make it compile by initializing Value3 at declaration (and keeping const):\n    const int Value3_initialized_at_declaration = Value2;\n    int CheckValue_option2 = 0;\n    // Value3_initialized_at_declaration = Value2; // This would be an error now\n    CheckValue_option2 = Value1 + Value3_initialized_at_declaration;\n    printf(\"If Value3 is const AND initialized at declaration:\\n\");\n    printf(\"Value3_initialized_at_declaration = %d\\n\", Value3_initialized_at_declaration);\n    printf(\"CheckValue_option2 = %d\\n\", CheckValue_option2);\n\n    // printf(\"\\nOriginal problem: Value3 declared const but not initialized, then assigned.\\n\");\n    // printf(\"This causes a compile error.\\n\");\n\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)(Value1 - 1)'],
            ['key' => 'B', 'text' => '(B)Value3 = Value2;'],
            ['key' => 'C', 'text' => '(C)const'],
            ['key' => 'D', 'text' => '(D)#define Value2 (Value1 - 1)'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：<code>const</code> 限定字與初始化</strong></p>
<p>在 C/C++ 中,<code>const</code> 是一個型別限定字 (type qualifier),用於宣告一個變數為常數。這意味著一旦一個 <code>const</code> 變數被初始化後,它的值就不能再被修改。</p>
<p>重要的規則：</p>
<ul>
    <li><code>const</code> 變數<strong>必須在宣告時進行初始化</strong>,除非它是 <code>extern</code> 宣告或者有其他特殊的類別成員初始化方式 (如在建構子的初始化列表中)。</li>
    <li>對於普通的區域性或全域性 <code>const</code> 變數,如果不在宣告時初始化,之後就無法再賦值給它,這會導致編譯錯誤。</li>
</ul>

<p><strong>2. 程式碼分析 (假設 <code>Value1 – 1</code> 中的 <code>–</code> 是減號 <code>-</code>)：</strong></p>
<pre><code class="language-c">
//1 #define Value1  100
//2 #define Value2 (Value1 - 1)  // Value2 will be replaced by (100 - 1), i.e., 99
//3 const  int  Value3;          // Line 3: Value3 is declared as a const int, BUT NOT INITIALIZED.
//4 int CheckValue = 0;
//5 Value3 = Value2;             // Line 5: Attempting to assign a value to Value3.
//6 CheckValue = Value1 + Value3;
</code></pre>
<ul>
    <li><strong>行號 3 (<code>const int Value3;</code>)：</strong> 這裡宣告了一個整數常數 <code>Value3</code>。然而,它沒有在宣告的同時被初始化。這本身對於某些編譯器或上下文可能還不是錯誤,但問題出在下一行。</li>
    <li><strong>行號 5 (<code>Value3 = Value2;</code>)：</strong>
        <ul>
            <li><code>Value2</code> 會被前置處理器替換為 <code>(Value1 - 1)</code>,進一步被替換為 <code>100 - 1</code>,即 <code>99</code>。</li>
            <li>所以這一行等效於 <code>Value3 = 99;</code>。</li>
            <li>因為 <code>Value3</code> 被宣告為 <code>const</code>,你不能在它宣告之後再對它進行賦值。這行會導致編譯錯誤,通常是類似 "assignment of read-only variable 'Value3'" 的訊息。</li>
        </ul>
    </li>
</ul>
<p>編譯錯誤的主要原因是對一個 <code>const</code> 變數進行賦值操作 (行號 5),而這個 <code>const</code> 變數沒有在宣告時初始化 (行號 3)。</p>

<p><strong>3. 如何修正使程式編譯成功 (根據選項)：</strong></p>
<ul>
    <li><strong>(A) 刪除 <code>(Value1 - 1)</code> (來自 <code>#define Value2</code>)：</strong> 這會使 <code>Value2</code> 未定義,導致行號 5 出現新的編譯錯誤。不能解決問題。</li>
    <li><strong>(B) 刪除 <code>Value3 = Value2;</code> (行號 5)：</strong> 這會移除對 <code>const</code> 變數的賦值錯誤。但是,<code>Value3</code> 仍然未被初始化。在行號 6 (<code>CheckValue = Value1 + Value3;</code>) 中使用未初始化的 <code>Value3</code> 會導致未定義行為 (如果編譯器允許) 或新的編譯錯誤 (如果編譯器檢測到使用未初始化的 const 變數)。這不是一個完整的解決方案,因為 <code>Value3</code> 還是沒有確定的值。</li>
    <li><strong>(C) 刪除 <code>const</code> (從行號 3 <code>const int Value3;</code> 中刪除 <code>const</code>)：</strong>
        <ul>
            <li>如果行號 3 變成 <code>int Value3;</code>,那麼 <code>Value3</code> 就變成一個普通的 (非 const) 整數變數。</li>
            <li>這樣一來,行號 5 <code>Value3 = Value2;</code> (即 <code>Value3 = 99;</code>) 就變成了一個合法的賦值操作。</li>
            <li>程式碼將可以成功編譯。</li>
        </ul>
    </li>
    <li><strong>(D) 刪除 <code>#define Value2 (Value1 - 1)</code> (行號 2)：</strong> 這會使 <code>Value2</code> 未定義,導致行號 5 出現新的編譯錯誤。</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>要使程式編譯成功,最直接且符合選項的方式是刪除行號 3 中的 <code>const</code> 限定字。這樣 <code>Value3</code> 就變成一個普通變數,可以在行號 5 被賦值。</p>
<p>另一種修正方式 (雖然不是選項中「刪除」的行為) 是在行號 3 初始化 <code>Value3</code>,例如：<code>const int Value3 = Value2;</code>。但題目問的是「刪除」哪個部分。</p>
HTML
    ],
    [
        'id_suffix' => '33',
        'question_text' => '33. 同上題,程式修正後 (假設是透過刪除行號 3 的 const),當程式執行完行號 6 的時候,CheckValue 的值為下列何者？',
        'code_snippet' => "#define Value1 100\n#define Value2 (Value1 - 1)\n\n// Assuming 'const' is removed from Value3's declaration:\nint Value3;\nint CheckValue = 0;\nValue3 = Value2; // Value3 becomes 99\nCheckValue = Value1 + Value3; // CheckValue = 100 + 99",
        'run_code_id' => 'q33-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\n#define Value1 100\n#define Value2 (Value1 - 1)\n\nint main() {\n    // Original line 3 was: const int Value3;\n    // We assume 'const' is removed for this question.\n    int Value3; \n    int CheckValue = 0;\n\n    // Line 5 after macro expansion: Value3 = (100 - 1);\n    Value3 = Value2; \n    // So, Value3 becomes 99.\n\n    // Line 6 after macro expansion: CheckValue = 100 + Value3;\n    CheckValue = Value1 + Value3;\n    // CheckValue = 100 + 99 = 199;\n\n    printf(\"Value1 = %d\\n\", Value1);\n    printf(\"Value2 = %d (after macro expansion for (Value1 - 1))\\n\", Value2);\n    printf(\"Value3 = %d\\n\", Value3);\n    printf(\"CheckValue = %d\\n\", CheckValue);\n\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)200'],
            ['key' => 'B', 'text' => '(B)199'],
            ['key' => 'C', 'text' => '(C)198'],
            ['key' => 'D', 'text' => '(D)100'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：程式執行流程與巨集代換</strong></p>
<p>根據上一題的分析,為了使程式碼能夠編譯,我們假設行號 3 中的 <code>const</code> 關鍵字被刪除。修改後的相關程式碼片段如下：</p>
<pre><code class="language-c">
//1 #define Value1  100
//2 #define Value2 (Value1 - 1)
//3 int  Value3;                 // 'const' removed
//4 int CheckValue = 0;
//5 Value3 = Value2;
//6 CheckValue = Value1 + Value3;
</code></pre>

<p><strong>2. 程式碼執行追蹤：</strong></p>
<ul>
    <li><strong>前置處理階段：</strong>
        <ul>
            <li><code>Value1</code> 被定義為 <code>100</code>。</li>
            <li><code>Value2</code> 被定義為 <code>(Value1 - 1)</code>。當 <code>Value2</code> 在程式碼中被使用時,它會首先被替換為 <code>(Value1 - 1)</code>,然後 <code>Value1</code> 再被替換為 <code>100</code>,所以 <code>Value2</code> 實際上代表 <code>(100 - 1)</code>,即 <code>99</code>。</li>
        </ul>
    </li>
    <li><strong>行號 3 (<code>int Value3;</code>)：</strong>宣告一個整數變數 <code>Value3</code>。它未被初始化,所以其值是不確定的 (直到被賦值)。</li>
    <li><strong>行號 4 (<code>int CheckValue = 0;</code>)：</strong>宣告一個整數變數 <code>CheckValue</code> 並初始化為 0。</li>
    <li><strong>行號 5 (<code>Value3 = Value2;</code>)：</strong>
        <ul>
            <li><code>Value2</code> 被替換為 <code>(100 - 1)</code>,計算結果為 <code>99</code>。</li>
            <li>將 <code>99</code> 賦值給 <code>Value3</code>。所以,此行執行後,<code>Value3</code> 的值變為 <code>99</code>。</li>
        </ul>
    </li>
    <li><strong>行號 6 (<code>CheckValue = Value1 + Value3;</code>)：</strong>
        <ul>
            <li><code>Value1</code> 被替換為 <code>100</code>。</li>
            <li>此時 <code>Value3</code> 的值是 <code>99</code> (來自上一行)。</li>
            <li>計算 <code>100 + 99</code>,結果是 <code>199</code>。</li>
            <li>將 <code>199</code> 賦值給 <code>CheckValue</code>。所以,此行執行後,<code>CheckValue</code> 的值變為 <code>199</code>。</li>
        </ul>
    </li>
</ul>

<p><strong>3. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 200</strong></li>
    <li><strong>(B) 199</strong></li>
    <li><strong>(C) 198</strong></li>
    <li><strong>(D) 100</strong></li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>當程式執行完行號 6 的時候,<code>CheckValue</code> 的值為 199。</p>
HTML
    ],
];

?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C/C++ 綜合測驗 (EE7-5)</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
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
    <!-- Inline styles removed, assuming they are in styles.css -->
</head>
<body>
    <div class="container">
        <main class="tutorial-content">
            <h1>C/C++ 綜合測驗 (EE7-5)</h1>
            <p>本頁面提供一系列 C 和 C++ 語言的綜合練習題,涵蓋資料型態、變數、運算子、控制結構、函式、輸出入等基礎概念。部分題目亦會涉及 C++ 特有的物件導向特性。請仔細分析每個問題,並利用右側的沙箱進行實作與驗證。</p>

            <nav class="simple-nav">
                <a href="index.php">返回主頁</a>
                 | <a href="ee7-1.php">EE7-1 C++ OOP測驗</a>
                 | EE7-5 C/C++綜合測驗 (本頁)
            </nav>

            <div class="quiz-section">
                <h2>C/C++ 綜合練習題組 (EE7-5)</h2>
                <p>請挑戰下面的題目,檢驗您的 C/C++ 綜合能力！ (共 <?php echo count($current_exercises); ?> 題)</p>

                <?php foreach ($current_exercises as $index => $exercise): ?>
                    <div id="q<?php echo htmlspecialchars($exercise['id_suffix']); ?>" class="quiz-card" data-explanation="<?php echo htmlspecialchars(addslashes($exercise['explanation_html'])); ?>">
                        <h3><?php echo htmlspecialchars($exercise['question_text']); ?></h3>

                        <?php if (!empty($exercise['code_snippet'])): ?>
                            <pre><code class="language-clike"><?php echo htmlspecialchars($exercise['code_snippet']); ?></code></pre>
                        <?php endif; ?>

                        <?php if (!empty($exercise['run_code_id']) && !empty($exercise['code_snippet_for_runner'])): ?>
                            <button class="run-example-btn" data-code-id="<?php echo htmlspecialchars($exercise['run_code_id']); ?>">運行示例</button>
                        <?php endif; ?>

                        <div class="quiz-options" data-correct="<?php echo htmlspecialchars($exercise['correct_answer']); ?>">
                            <?php foreach ($exercise['options'] as $option): ?>
                                <div class="option" data-option="<?php echo htmlspecialchars($option['key']); ?>">
                                    <?php echo htmlspecialchars($option['text']); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="next-btn-container">
                            <?php if ($index < count($current_exercises) - 1): ?>
                                <button class="next-btn" data-target="#q<?php echo htmlspecialchars($current_exercises[$index + 1]['id_suffix']); ?>">下一題</button>
                            <?php else: ?>
                                <button class="next-btn" data-target="#q<?php echo htmlspecialchars($current_exercises[0]['id_suffix']); ?>">回到第一題</button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>

        <div class="resizer" id="dragMe"></div>

        <aside class="interactive-panel">
            <div class="interactive-panel-inner">
                <div class="sandbox-container">
                    <h3>C/C++ 程式碼沙箱 (WASM)</h3>
                    <textarea id="code-editor" spellcheck="false">/* 點擊題目下方的「運行示例」按鈕以載入程式碼,或在此處編寫您自己的 C/C++ 程式碼。 */</textarea>
                    <div class="sandbox-controls">
                        <button id="run-code-btn">編譯與執行</button>
                    </div>
                    <pre id="output-area" aria-live="polite">輸出結果將顯示於此...</pre>
                </div>
            </div>
        </aside>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    <script src="script.js"></script>
    <script>
        window.pageCodeSamples = {
            <?php
            $runnable_samples = [];
            foreach ($current_exercises as $exercise) {
                if (!empty($exercise['run_code_id']) && !empty($exercise['code_snippet_for_runner'])) {
                    $escaped_code = str_replace(["\r\n", "\n", "\r"], "\\n", addslashes($exercise['code_snippet_for_runner']));
                    $runnable_samples[] = "'" . addslashes($exercise['run_code_id']) . "': \"" . $escaped_code . "\"";
                }
            }
            echo implode(",\n            ", $runnable_samples);
            if (empty($runnable_samples)) {
                 // Add a default sample if none are present to avoid JS errors and provide a starting point
                 echo "'q_default_sample': \"#include <stdio.h>\\n\\nint main() {\\n    printf(\\\"Hello, C/C++ world!\\\\n\\\");\\n    return 0;\\n}\"";
            }
            ?>
        };

        // Initialize the first code sample in the editor if pageCodeSamples is not empty
        document.addEventListener('DOMContentLoaded', function() {
            const codeEditor = document.getElementById('code-editor');
            if (Object.keys(window.pageCodeSamples).length > 0) {
                const firstSampleKey = Object.keys(window.pageCodeSamples)[0];
                if (window.pageCodeSamples[firstSampleKey]) {
                    codeEditor.value = window.pageCodeSamples[firstSampleKey];
                }
            } else {
                 codeEditor.value = "// No runnable examples specifically for this page. Write your C/C++ code here.";
            }
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const options = document.querySelectorAll('.quiz-options .option');
        const interactivePanel = document.querySelector('.interactive-panel-inner');

        if (interactivePanel) {
            options.forEach(option => {
                option.addEventListener('click', () => {
                    const quizCard = option.closest('.quiz-card');
                    if (quizCard) {
                        const explanationContent = quizCard.dataset.explanation;
                                const explanationContainer = `
                                    <div class="sandbox-container">
                                        <h3>詳細解說</h3>
                                <div class="explanation-content" style="padding: 15px; height: calc(100% - 60px); overflow-y: auto; background: #fff; border: 1px solid #ddd; border-radius: 4px; font-family: 'Noto Sans TC', sans-serif; color: #333;">
                                    ${explanationContent}
                                </div>
                            </div>
                        `;
                        
                        interactivePanel.innerHTML = explanationContainer;
                    }
                });
            });
        }
    });
    </script>
</body>
</html>