<?php
header('Content-Type: text/html; charset=utf-8');

// EE7-6 Quiz Data - 28 Object-Oriented Questions
$current_exercises = [
    [
        'id_suffix' => '1',
        'question_text' => '1. 關於 C++語言的結構(struct)和類別(class)，下列哪一個敘述正確？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) C++是物件導向語言，使用類別來定義資料和操作資料的方法'],
            ['key' => 'B', 'text' => '(B) 結構是使用者自已建立的資料型態，包含多個成員'],
            ['key' => 'C', 'text' => '(C) 一個類別可以有多個物件的實作'],
            ['key' => 'D', 'text' => '(D) 以上皆是'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：C++ 結構 (struct) 與類別 (class)</strong></p>
<ul>
    <li><strong>類別 (Class)：</strong> 是C++物件導向程式設計的核心。它是一個藍圖，用於定義物件的屬性 (資料成員) 和行為 (成員函式/方法)。C++ 使用類別來實現封裝、繼承和多型等物件導向特性。</li>
    <li><strong>結構 (Struct)：</strong> 在C++中，結構與類別非常相似。主要的預設差異在於成員的存取權限：
        <ul>
            <li><code>struct</code> 的成員預設是 <code>public</code>。</li>
            <li><code>class</code> 的成員預設是 <code>private</code>。</li>
        </ul>
        除此之外，<code>struct</code> 也可以有成員函式、建構子、解構子，並且可以參與繼承。結構本質上也是一種使用者自訂的資料型態，可以將多個不同型別的資料組合成一個單元。
    </li>
    <li><strong>物件 (Object)：</strong> 是類別的一個實例 (instance)。一個類別定義了物件的規格，而程式可以根據這個規格創建多個具有相同結構和行為的物件。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) C++是物件導向語言，使用類別來定義資料和操作資料的方法：</strong>正確。這是C++作為物件導向語言的基本特徵，類別是定義物件藍圖的方式，包含資料 (attributes) 和方法 (behaviors)。</li>
    <li><strong>(B) 結構是使用者自已建立的資料型態，包含多個成員：</strong>正確。結構允許使用者將不同型別的資料組合成一個新的、自訂的資料型態。</li>
    <li><strong>(C) 一個類別可以有多個物件的實作：</strong>正確。類別是模板，可以根據這個模板創建任意數量的物件實例。例如，可以有一個 <code>Car</code> 類別，然後創建多個 <code>Car</code> 物件，如 <code>myCar</code>, <code>yourCar</code>。</li>
    <li><strong>(D) 以上皆是：</strong>因為 (A), (B), (C) 都正確，所以此選項正確。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>所有敘述都是正確的。</p>
HTML
    ],
    [
        'id_suffix' => '2',
        'question_text' => '2. 有關 C++語言的類別描述，下列何者錯誤？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) 類別可以實現 C++物件導向的特性'],
            ['key' => 'B', 'text' => '(B) 一個類別只能產生一個物件實例'],
            ['key' => 'C', 'text' => '(C) 類別的建構子可以重載'],
            ['key' => 'D', 'text' => '(D) 類別的解構子只能有一個'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：C++ 類別特性</strong></p>
<ul>
    <li><strong>物件導向特性：</strong>類別是C++實現物件導向三大特性 (封裝、繼承、多型) 的基礎。</li>
    <li><strong>物件實例：</strong>一個類別是創建物件的模板。根據一個類別，可以創建任意多個物件實例。例如，<code>class Dog {...}; Dog dog1, dog2, dog3;</code> 這樣就從 <code>Dog</code> 類別產生了三個物件實例。</li>
    <li><strong>建構子 (Constructor)：</strong>是一種特殊的成員函式，在創建類別的物件時自動被呼叫，主要用於初始化物件的資料成員。
        <ul>
            <li>建構子的名稱與類別名稱完全相同。</li>
            <li>建構子沒有回傳型別 (連 <code>void</code> 都不寫)。</li>
            <li>一個類別可以有多個建構子，只要它們的參數列表不同 (個數、型態、順序不同)，這稱為<strong>建構子重載 (overloading)</strong>。</li>
        </ul>
    </li>
    <li><strong>解構子 (Destructor)：</strong>也是一種特殊的成員函式，在物件的生命週期結束時 (例如，物件離開其作用域或被 <code>delete</code> 刪除時) 自動被呼叫，主要用於釋放物件在建構時可能獲取的資源 (如動態分配的記憶體)。
        <ul>
            <li>解構子的名稱是在類別名稱前加上波浪號 <code>~</code> (例如 <code>~MyClass()</code>)。</li>
            <li>解構子沒有回傳型別，也沒有參數。</li>
            <li>一個類別<strong>只能有一個解構子</strong>。解構子不能被重載。</li>
        </ul>
    </li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 類別可以實現 C++物件導向的特性：</strong>正確。類別是實現封裝、繼承、多型的基礎。</li>
    <li><strong>(B) 一個類別只能產生一個物件實例：</strong>錯誤。一個類別是藍圖，可以根據這個藍圖創建任意數量的物件實例。如果一個類別只能產生一個物件，那通常是透過設計模式 (如單例模式 Singleton Pattern) 來刻意限制的，而非類別本身的固有特性。</li>
    <li><strong>(C) 類別的建構子可以重載：</strong>正確。只要參數列表不同，一個類別可以有多個建構子。</li>
    <li><strong>(D) 類別的解構子只能有一個：</strong>正確。解構子不能有參數，因此不能被重載，每個類別最多只有一個解構子。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>敘述「(B) 一個類別只能產生一個物件實例」是錯誤的。</p>
HTML
    ],
    [
        'id_suffix' => '3',
        'question_text' => '3. 有關 C++語言的物件導向功能，下列何者正確？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A) C 語言繼承 C++語言，所以 C 語言也是物件導向語言'],
            ['key' => 'B', 'text' => '(B) 使用「..」表示類別之間的繼承關係'],
            ['key' => 'C', 'text' => '(C) 一個子類別可以繼承多個父類別'],
            ['key' => 'D', 'text' => '(D) 類別就是物件的實作'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：C++ 物件導向特性</strong></p>
<ul>
    <li><strong>C 與 C++ 的關係：</strong>C++ 是在 C 語言的基礎上發展起來的，它擴展了 C 語言並增加了物件導向的特性。C 語言本身是一種程序導向 (procedural) 語言，不直接支援物件導向的核心概念如類別、繼承和多型。所以 C++ 繼承並擴展了 C，而不是反過來。</li>
    <li><strong>繼承語法：</strong>在 C++ 中，表示類別之間的繼承關係使用冒號 <code>:</code>，後面跟著存取修飾詞 (如 <code>public</code>, <code>protected</code>, <code>private</code>) 和父類別的名稱。例如：<code>class DerivedClass : public BaseClass { ... };</code>。</li>
    <li><strong>多重繼承 (Multiple Inheritance)：</strong>C++ 語言支援多重繼承，這意味著一個子類別 (derived class) 可以同時繼承自多個父類別 (base classes)。語法如：<code>class Child : public Parent1, public Parent2 { ... };</code>。</li>
    <li><strong>類別與物件：</strong>
        <ul>
            <li><strong>類別 (Class)：</strong>是一個藍圖、模板或定義。它描述了一類物件共同具有的屬性 (資料成員) 和行為 (成員函式)。類別本身不是一個具體的實體。</li>
            <li><strong>物件 (Object)：</strong>是類別的一個具體實例 (instance)。物件是根據類別的定義在記憶體中創建的實體。可以說，物件是類別的「實作」或「實例化」。</li>
        </ul>
    </li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) C 語言繼承 C++語言，所以 C 語言也是物件導向語言：</strong>錯誤。C++ 是基於 C 發展並增加了物件導向特性。C 語言本身不是物件導向語言。</li>
    <li><strong>(B) 使用「..」表示類別之間的繼承關係：</strong>錯誤。C++ 使用冒號 <code>:</code> 來表示繼承關係。<code>..</code> 運算子通常用於範圍解析 (scope resolution operator 是 <code>::</code>) 或其他語言的特定語法，與 C++ 繼承無關。</li>
    <li><strong>(C) 一個子類別可以繼承多個父類別：</strong>正確。這是 C++ 的多重繼承特性。</li>
    <li><strong>(D) 類別就是物件的實作：</strong>這個說法不夠精確，容易混淆。更準確地說，物件是類別的實作 (或實例)。類別是定義，物件是根據該定義創建的實體。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>敘述「(C) 一個子類別可以繼承多個父類別」是正確的，描述了 C++ 的多重繼承能力。</p>
HTML
    ],
    [
        'id_suffix' => '4',
        'question_text' => '4. 一程式片段如下，關於程式碼的說明，何者錯誤？<pre><code class="language-cpp">class I : public J { public: void beep(); };</code></pre>',
        'code_snippet' => "class J { /* ... J members ... */ };\nclass I : public J {\npublic:\n    void beep() { /* ... beep implementation ... */ }\n    // I will have J's public (and protected) members\n};",
        'run_code_id' => 'q4-code',
        'code_snippet_for_runner' => "#include <iostream>\n\nclass J {\npublic:\n    int j_public_var = 10;\n    void j_public_method() {\n        std::cout << \"J's public method called.\\n\";\n    }\nprotected:\n    int j_protected_var = 20;\nprivate:\n    int j_private_var = 30; // I cannot access this directly\n};\n\nclass I : public J {\npublic:\n    void beep() {\n        std::cout << \"I's beep method called.\\n\";\n        std::cout << \"Accessing J's public_var from I: \" << j_public_var << std::endl;\n        std::cout << \"Accessing J's protected_var from I: \" << j_protected_var << std::endl;\n        // std::cout << \"Trying to access J's private_var from I: \" << j_private_var << std::endl; // This would be a compile error\n    }\n    void access_j_method() {\n        j_public_method(); // I can call J's public method\n    }\n};\n\nint main() {\n    I i_obj;\n    i_obj.beep();\n    i_obj.access_j_method();\n    // J j_obj; // J does not have beep()\n    // j_obj.beep(); // Compile error\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A) I 類別繼承 J 類別'],
            ['key' => 'B', 'text' => '(B) I 類別會擁有 J 類別的公有成員'],
            ['key' => 'C', 'text' => '(C) J 類別擁有 beep( )成員函式'],
            ['key' => 'D', 'text' => '(D) I 和 J 是物件導向的繼承關係'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：C++ 類別繼承</strong></p>
<p>程式碼片段 <code>class I : public J { public: void beep(); };</code> 描述了類別繼承關係。</p>
<ul>
    <li><strong><code>class I : public J</code>：</strong>這表示類別 <code>I</code> 公開繼承 (publicly inherits) 自類別 <code>J</code>。
        <ul>
            <li><code>I</code> 被稱為子類別 (derived class 或 child class)。</li>
            <li><code>J</code> 被稱為父類別 (base class 或 parent class)。</li>
        </ul>
    </li>
    <li><strong>公開繼承 (<code>public J</code>)：</strong>
        <ul>
            <li>父類別 <code>J</code> 的 <code>public</code> 成員在子類別 <code>I</code> 中仍然是 <code>public</code>。</li>
            <li>父類別 <code>J</code> 的 <code>protected</code> 成員在子類別 <code>I</code> 中變成 <code>protected</code>。</li>
            <li>父類別 <code>J</code> 的 <code>private</code> 成員對子類別 <code>I</code> 是不可直接存取的 (但它們仍然是子類別物件的一部分)。</li>
        </ul>
        因此，子類別 <code>I</code> "擁有" (繼承了) 父類別 <code>J</code> 的公有 (public) 和保護 (protected) 成員。
    </li>
    <li><strong><code>public: void beep();</code>：</strong>這是在子類別 <code>I</code> 中宣告了一個名為 <code>beep</code> 的公有成員函式。這個函式是類別 <code>I</code> 特有的 (或可能是對父類別中同名函式的覆寫，但題目未提供 <code>J</code> 的定義)。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) I 類別繼承 J 類別：</strong>正確。語法 <code>class I : public J</code> 明確表示 <code>I</code> 繼承自 <code>J</code>。</li>
    <li><strong>(B) I 類別會擁有 J 類別的公有成員：</strong>正確。由於是公開繼承，<code>J</code> 的公有成員會成為 <code>I</code> 的公有成員，<code>J</code> 的保護成員會成為 <code>I</code> 的保護成員。所以 <code>I</code> 確實 "擁有" (可以存取和使用) <code>J</code> 的公有成員。</li>
    <li><strong>(C) J 類別擁有 beep( )成員函式：</strong>錯誤。<code>beep()</code> 函式是在類別 <code>I</code> 的定義中宣告的，因此它是類別 <code>I</code> 的成員函式。除非類別 <code>J</code> 自身也定義了一個名為 <code>beep</code> 的函式 (題目未顯示)，否則不能說 <code>J</code> 擁有這個在 <code>I</code> 中定義的 <code>beep()</code>。</li>
    <li><strong>(D) I 和 J 是物件導向的繼承關係：</strong>正確。這正是程式碼所展示的。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>敘述「(C) J 類別擁有 beep( )成員函式」是錯誤的。<code>beep()</code> 是在 <code>I</code> 類別中定義的。</p>
HTML
    ],
    [
        'id_suffix' => '5',
        'question_text' => '5. 小雪在 C/C++語言中宣告一個結構 box，程式碼如下，請問該結構會佔用多少的記憶體空間？<pre><code class="language-c">struct box{\n    int hight, length, width;\n};</code></pre>',
        'code_snippet' => "struct box{\n    int hight, length, width;\n};",
        'run_code_id' => 'q5-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nstruct box{\n    int hight, length, width;\n};\n\nint main() {\n    printf(\"Size of int: %zu bytes\\n\", sizeof(int));\n    printf(\"Size of struct box: %zu bytes\\n\", sizeof(struct box));\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)3Byte'],
            ['key' => 'B', 'text' => '(B)12Byte'],
            ['key' => 'C', 'text' => '(C)24Byte'],
            ['key' => 'D', 'text' => '(D)48Byte'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：結構 (struct) 的記憶體大小與 <code>sizeof</code></strong></p>
<p>結構 (<code>struct</code>) 是一種使用者自訂的資料型態，它可以將多個不同型別的資料成員組合成一個單一的單元。</p>
<p>結構所佔用的總記憶體空間通常是其所有成員大小的總和。然而，由於<strong>記憶體對齊 (memory alignment)</strong> 的要求，編譯器有時可能會在成員之間或結構末尾插入一些額外的填充位元組 (padding bytes)，以確保每個成員都位於適合其型態的記憶體位址上，從而提高存取效率。</p>
<p>對於這個特定的結構：</p>
<pre><code class="language-c">
struct box{
    int hight;
    int length;
    int width;
};
</code></pre>
<ul>
    <li>它包含三個 <code>int</code> 型別的成員：<code>hight</code>, <code>length</code>, <code>width</code>。</li>
    <li>在大多數現代系統上，一個 <code>int</code> 型別通常佔用 4 bytes。</li>
</ul>
<p>如果沒有記憶體對齊的填充，該結構的大小將是：<br>
Size = sizeof(hight) + sizeof(length) + sizeof(width)<br>
Size = sizeof(int) + sizeof(int) + sizeof(int)<br>
Size = 4 bytes + 4 bytes + 4 bytes = 12 bytes。</p>
<p>由於所有成員都是 <code>int</code> 型別，它們通常具有相同的對齊要求 (例如，4位元組對齊)，並且它們可以連續排列而不需要額外的填充位元組。</p>

<p><strong>2. 選項分析 (假設 <code>int</code> 為 4 bytes)：</strong></p>
<ul>
    <li><strong>(A) 3Byte：</strong>太小了，一個 <code>int</code> 通常就比這大。</li>
    <li><strong>(B) 12Byte：</strong>這是 3 個 4-byte <code>int</code> 成員的總和 (3 * 4 = 12)。這在沒有額外填充的情況下是正確的。</li>
    <li><strong>(C) 24Byte：</strong>太大，除非 <code>int</code> 是 8 bytes (不常見，通常 <code>long long</code> 才是)。</li>
    <li><strong>(D) 48Byte：</strong>遠大於預期。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>假設在一個 <code>int</code> 型別佔用 4 bytes 的常見系統中，並且沒有因特殊對齊需求而產生額外填充，<code>struct box</code> 將佔用 12 bytes 的記憶體空間。</p>
HTML
    ],
    [
        'id_suffix' => '6',
        'question_text' => '6. 承上題，使用 box 結構宣告 a 和 b 兩個結構變數，何者才是正確的語法？',
        'code_snippet' => "// struct box{\n// int hight, length, width;\n// };",
        'run_code_id' => 'q6-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nstruct box{\n    int hight, length, width;\n};\n\nint main() {\n    struct box a, b; // Correct declaration\n    a.hight = 10;\n    b.width = 20;\n    printf(\"a.hight = %d\\n\", a.hight);\n    printf(\"b.width = %d\\n\", b.width);\n    // struct(box) c; // Incorrect\n    // box struct d; // Incorrect\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A) a=struct(box)， b=struct(box)，'],
            ['key' => 'B', 'text' => '(B) struct box a， b，'],
            ['key' => 'C', 'text' => '(C) box struct a， b，'],
            ['key' => 'D', 'text' => '(D) #struct box a<br>#struct box b'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：C/C++ 結構變數的宣告</strong></p>
<p>在 C 和 C++ 中，一旦定義了一個結構型態，就可以使用該型態來宣告變數。</p>
<p>假設我們有以下結構定義 (來自上一題)：</p>
<pre><code class="language-c">
struct box {
    int hight, length, width;
};
</code></pre>

<p>宣告該結構型態的變數的語法是：</p>
<p><code>struct <結構名稱> <變數名1>, <變數名2>, ...;</code></p>
<p>所以，要宣告兩個名為 <code>a</code> 和 <code>b</code> 的 <code>box</code> 結構變數，正確的語法是：</p>
<p><code>struct box a, b;</code></p>
<p>或者可以分開宣告：</p>
<p><code>struct box a;</code><br>
<code>struct box b;</code></p>

<p><strong>在 C++ 中，</strong> 一旦結構 (或類別) 被定義，你也可以省略 <code>struct</code> (或 <code>class</code>) 關鍵字來宣告變數，直接使用結構名作為型態名：</p>
<p><code>box a, b; // C++ only, after struct box is defined</code></p>
<p>然而，題目中的選項更偏向 C 語言的傳統風格，並且選項 (B) 是 C 和 C++ 都完全正確的語法。</p>

<p><strong>2. 選項分析：</strong></p>
<p>注意：選項中的逗號 <code>，</code> 應為半形 <code>,</code>。</p>
<ul>
    <li><strong>(A) <code>a=struct(box)， b=struct(box)，</code>：</strong>這是錯誤的語法。<code>struct(box)</code> 不是一個有效的型態轉換或賦值語法。變數宣告不使用賦值符號來指定型態。</li>
    <li><strong>(B) <code>struct box a， b，</code> (應為 <code>struct box a, b;</code>)：</strong>這是正確的 C/C++ 語法，用於宣告兩個 <code>struct box</code> 型態的變數 <code>a</code> 和 <code>b</code> (忽略行末多餘的逗號)。</li>
    <li><strong>(C) <code>box struct a， b，</code>：</strong>這是錯誤的語法。<code>struct</code> 關鍵字應該在結構名稱之前。</li>
    <li><strong>(D) <code>#struct box a</code><br><code>#struct box b</code>：</strong>這是錯誤的語法。<code>#</code> 符號在 C/C++ 中用於前置處理指令 (如 <code>#include</code>, <code>#define</code>)，不適用於變數宣告。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>選項 (B) <code>struct box a, b;</code> (修正標點後) 是宣告結構變數 <code>a</code> 和 <code>b</code> 的正確語法。</p>
HTML
    ],
    [
        'id_suffix' => '7',
        'question_text' => '7. 承上題，完成結構變數 a 和 b 的宣告後，執行下列程式片段的輸出為何？<pre><code class="language-cpp">a.width = 50;\nb = a;\ncout << b.width;</code></pre>',
        'code_snippet' => "struct box { int hight, length, width; };\n// ... in main or a function ...\nstruct box a, b;\na.width = 50;\nb = a;\n// std::cout << b.width; // Using C++ for cout",
        'run_code_id' => 'q7-code',
        'code_snippet_for_runner' => "#include <iostream> // For std::cout\n\nstruct box{\n    int hight, length, width;\n};\n\nint main() {\n    struct box a, b;\n    a.hight = 10; // Initialize other members for completeness\n    a.length = 20;\n    a.width = 50;\n\n    b = a; // Structure assignment\n\n    std::cout << b.width << std::endl;\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)50'],
            ['key' => 'B', 'text' => '(B)40'],
            ['key' => 'C', 'text' => '(C)30'],
            ['key' => 'D', 'text' => '(D)20'],
        ],
        'correct_answer' => 'A',
        'explanation_html' => <<<HTML
<h4>詳解 (C++/C Context)</h4>
<p><strong>1. 關鍵概念：結構賦值 (Structure Assignment)</strong></p>
<p>在 C 和 C++ 中，可以直接將一個結構變數的值賦給另一個相同型態的結構變數。這種賦值操作會執行<strong>成員對成員的複製 (memberwise copy)</strong>。也就是說，來源結構的每個成員的值都會被複製到目標結構的相應成員中。</p>
<p>假設結構 <code>box</code> 定義如下：</p>
<pre><code class="language-c">
struct box {
    int hight, length, width;
};
</code></pre>
<p>以及變數宣告：</p>
<pre><code class="language-c">
struct box a, b;
</code></pre>

<p><strong>2. 程式碼分析：</strong></p>
<ol>
    <li><strong><code>a.width = 50;</code></strong>
        <ul><li>將結構變數 <code>a</code> 的成員 <code>width</code> 設定為 50。此時 <code>a</code> 的狀態可能是 (假設其他成員未明確初始化，它們的值是不確定的，但這不影響 <code>width</code>)：<br>
            <code>a = { hight: (不確定), length: (不確定), width: 50 }</code></li></ul>
    </li>
    <li><strong><code>b = a;</code></strong>
        <ul><li>這是一個結構賦值操作。結構 <code>a</code> 的所有成員的值都會被複製到結構 <code>b</code> 的對應成員中。</li>
            <li>所以，<code>b.hight</code> 會得到 <code>a.hight</code> 的值，<code>b.length</code> 會得到 <code>a.length</code> 的值，而重要的是 <code>b.width</code> 會得到 <code>a.width</code> 的值。</li>
            <li>此時 <code>b</code> 的狀態是：<br>
            <code>b = { hight: (a.hight的值), length: (a.length的值), width: 50 }</code></li></ul>
    </li>
    <li><strong><code>cout &lt;&lt; b.width;</code> (題目使用 <code>cout</code>，暗示 C++ 環境)</strong>
        <ul><li>這行程式碼會輸出結構變數 <code>b</code> 的成員 <code>width</code> 的值。</li>
            <li>由於 <code>b.width</code> 在上一步被賦值為 50，所以輸出結果是 50。</li></ul>
    </li>
</ol>

<p><strong>3. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 50：</strong>正確。</li>
    <li><strong>(B) 40：</strong>錯誤。</li>
    <li><strong>(C) 30：</strong>錯誤。</li>
    <li><strong>(D) 20：</strong>錯誤。</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>執行完程式片段後，<code>b.width</code> 的值是 50，因此輸出為 50。</p>
HTML
    ],
    [
        'id_suffix' => '8',
        'question_text' => '8. 一程式片段如下，試問執行後的輸出為何？<pre><code class="language-cpp">struct item{\n    int x, y;\n};\n\nint main()\n{\n    struct item items[10];\n    for (int i=0; i<10; i++){\n        items[i].x = i / 2;\n        items[i].y = i % 2;\n    }\n    std::cout << items[9].x + items[9].y << std::endl;\n    return 0;\n}</code></pre>',
        'code_snippet' => "struct item{\n    int x, y;\n};\n\nint main()\n{\n    struct item items[10];\n    for (int i=0; i<10; i++){\n        items[i].x = i / 2; // Integer division\n        items[i].y = i % 2; // Modulo operator\n    }\n    // For items[9]:\n    // items[9].x = 9 / 2 = 4 (integer division)\n    // items[9].y = 9 % 2 = 1 (remainder)\n    // items[9].x + items[9].y = 4 + 1 = 5\n    std::cout << items[9].x + items[9].y << std::endl;\n    return 0;\n}",
        'run_code_id' => 'q8-code',
        'code_snippet_for_runner' => "#include <iostream>\n\nstruct item{\n    int x, y;\n};\n\nint main()\n{\n    struct item items[10];\n    // Loop to initialize the array of structs\n    for (int i=0; i<10; i++){\n        items[i].x = i / 2; // Integer division\n        items[i].y = i % 2; // Modulo operator\n        // std::cout << \"items[\" << i << \"].x = \" << items[i].x << \", items[\" << i << \"].y = \" << items[i].y << std::endl;\n    }\n\n    // Specifically for items[9]:\n    // items[9].x = 9 / 2 = 4 (integer division)\n    // items[9].y = 9 % 2 = 1 (remainder)\n    // items[9].x + items[9].y = 4 + 1 = 5\n\n    std::cout << items[9].x + items[9].y << std::endl;\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)3'],
            ['key' => 'B', 'text' => '(B)4'],
            ['key' => 'C', 'text' => '(C)5'],
            ['key' => 'D', 'text' => '(D)6'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：結構陣列、整數除法、模除運算子</strong></p>
<ul>
    <li><strong>結構陣列：</strong><code>struct item items[10];</code> 宣告了一個包含 10 個 <code>struct item</code> 型態元素的陣列。每個元素 <code>items[i]</code> 都是一個獨立的 <code>struct item</code>，擁有自己的 <code>x</code> 和 <code>y</code> 成員。</li>
    <li><strong>整數除法 (<code>/</code>)：</strong>當除法運算子 <code>/</code> 的兩個運算元都是整數時，執行的是整數除法。結果會是商的整數部分，小數部分會被捨棄。例如，<code>9 / 2</code> 的結果是 <code>4</code> (而不是 4.5)。</li>
    <li><strong>模除運算子 (<code>%</code>)：</strong>回傳兩個整數相除後的餘數。例如，<code>9 % 2</code> 的結果是 <code>1</code> (因為 9 = 4*2 + 1)。</li>
</ul>

<p><strong>2. 程式碼追蹤：</strong></p>
<p>迴圈 <code>for (int i=0; i<10; i++)</code> 會執行 10 次，<code>i</code> 的值從 0 到 9。</p>
<p>我們關心的是當 <code>i = 9</code> 時 (因為最後輸出的是 <code>items[9]</code> 的成員)：</p>
<ul>
    <li><code>items[9].x = i / 2;</code>
        <ul><li>當 <code>i = 9</code>，<code>items[9].x = 9 / 2</code>。</li>
            <li>由於這是整數除法，<code>9 / 2 = 4</code>。</li>
            <li>所以，<code>items[9].x</code> 被賦值為 <code>4</code>。</li></ul>
    </li>
    <li><code>items[9].y = i % 2;</code>
        <ul><li>當 <code>i = 9</code>，<code>items[9].y = 9 % 2</code>。</li>
            <li>9 除以 2 的餘數是 <code>1</code>。</li>
            <li>所以，<code>items[9].y</code> 被賦值為 <code>1</code>。</li></ul>
    </li>
</ul>
<p>最後的輸出語句是 <code>std::cout &lt;&lt; items[9].x + items[9].y &lt;&lt; std::endl;</code></p>
<ul>
    <li>這會計算 <code>items[9].x + items[9].y</code>，即 <code>4 + 1</code>。</li>
    <li>結果是 <code>5</code>。</li>
</ul>

<p><strong>3. 選項分析：</strong></p>
<ul>
    <li>(A) 3</li>
    <li>(B) 4</li>
    <li>(C) 5：正確。</li>
    <li>(D) 6</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>程式執行後的輸出為 5。</p>
HTML
    ],
    [
        'id_suffix' => '9',
        'question_text' => '9. 承上題，結構陣列 items[ ]會用掉幾 Bytes 的記憶體空間？',
        'code_snippet' => "struct item{ int x, y; };\n// struct item items[10];",
        'run_code_id' => 'q9-code',
        'code_snippet_for_runner' => "#include <stdio.h> \n\nstruct item{\n    int x, y;\n};\n\nint main() {\n    struct item items[10];\n    size_t size_of_int = sizeof(int);\n    size_t size_of_one_item = sizeof(struct item);\n    size_t size_of_items_array = sizeof(items);\n\n    printf(\"Size of int: %zu bytes\\n\", size_of_int);\n    printf(\"Size of one struct item (int x, int y): %zu bytes\\n\", size_of_one_item);\n    printf(\"Size of items array (10 elements): %zu bytes\\n\", size_of_items_array);\n    \n    // Expected calculation if int is 4 bytes:\n    // One item = sizeof(int) + sizeof(int) = 4 + 4 = 8 bytes (assuming no padding)\n    // Array of 10 items = 10 * 8 = 80 bytes\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)40'],
            ['key' => 'B', 'text' => '(B)60'],
            ['key' => 'C', 'text' => '(C)80'],
            ['key' => 'D', 'text' => '(D)120'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：結構陣列的記憶體大小</strong></p>
<p>要計算結構陣列所佔用的總記憶體空間，我們需要知道：</p>
<ol>
    <li>單個結構元素的大小。</li>
    <li>陣列中元素的數量。</li>
</ol>
<p>總大小 = (單個結構元素的大小) × (陣列中的元素數量)</p>
<p>結構 <code>item</code> 的定義如下 (來自上一題)：</p>
<pre><code class="language-c">
struct item {
    int x;
    int y;
};
</code></pre>
<ul>
    <li>它包含兩個 <code>int</code> 型別的成員。</li>
    <li>假設在一個常見的系統中，一個 <code>int</code> 佔用 4 bytes。</li>
    <li>因此，一個 <code>struct item</code> 元素的大小 (假設沒有記憶體對齊的填充) 是：
        <code>sizeof(int) + sizeof(int) = 4 bytes + 4 bytes = 8 bytes</code>。</li>
</ul>
<p>結構陣列的宣告是 <code>struct item items[10];</code></p>
<ul>
    <li>這表示陣列 <code>items</code> 包含 10 個 <code>struct item</code> 型態的元素。</li>
</ul>

<p><strong>2. 計算總記憶體空間：</strong></p>
<p>總記憶體空間 = (大小為 8 bytes 的單個 <code>struct item</code>) × (10 個元素)<br>
總記憶體空間 = 8 bytes/element × 10 elements = 80 bytes。</p>

<p><strong>3. 選項分析 (假設 <code>int</code> 為 4 bytes)：</strong></p>
<ul>
    <li>(A) 40：如果一個 <code>struct item</code> 是 4 bytes (例如，<code>int</code> 是 2 bytes，或者只有一個 <code>int</code> 成員)。</li>
    <li>(B) 60：不直接對應於常見的 <code>int</code> 大小和10個元素的組合。</li>
    <li>(C) 80：正確。基於每個 <code>int</code> 4 bytes，每個 <code>struct item</code> 8 bytes，10 個元素共 80 bytes。</li>
    <li>(D) 120：如果一個 <code>struct item</code> 是 12 bytes (例如，三個 <code>int</code> 成員)。</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>假設 <code>int</code> 型別佔用 4 bytes，並且結構成員之間沒有額外的對齊填充，結構陣列 <code>items[10]</code> 將用掉 80 Bytes 的記憶體空間。</p>
HTML
    ],
    [
        'id_suffix' => '10',
        'question_text' => '10. 函式 setValue( )的原型宣告如下，現有一 IOT 結構的結構變數 thing，下列何者是呼叫該函式的正確語法？<pre><code class="language-c">void setValue(struct IOT*);</code></pre>',
        'code_snippet' => "// Function prototype: void setValue(struct IOT* ptr_iot);\n// Variable declaration: struct IOT thing;",
        'run_code_id' => 'q10-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nstruct IOT {\n    int data;\n};\n\n// Function prototype that accepts a pointer to struct IOT\nvoid setValue(struct IOT* ptr_iot) {\n    if (ptr_iot != NULL) {\n        ptr_iot->data = 100; // Example modification\n        printf(\"Inside setValue: thing.data set to %d\\n\", ptr_iot->data);\n    }\n}\n\nint main() {\n    struct IOT thing; // Declare a struct IOT variable\n    thing.data = 0;   // Initialize it\n\n    printf(\"Before setValue: thing.data = %d\\n\", thing.data);\n    \n    // Correct way to call setValue, passing the address of 'thing'\n    setValue(&thing); \n    \n    printf(\"After setValue: thing.data = %d\\n\", thing.data);\n    \n    // Incorrect ways (would cause compile errors or undefined behavior):\n    // setValue(thing); // Error: type mismatch, expected struct IOT*, got struct IOT\n    // setValue(*thing); // Error: *thing is not valid if thing is not a pointer itself\n\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)setValue(thing)，'],
            ['key' => 'B', 'text' => '(B)setValue(＆thing)，'],
            ['key' => 'C', 'text' => '(C)setValue(＊thing)，'],
            ['key' => 'D', 'text' => '(D)setValue(IOT(thing))，'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解 (C/C++ Context)</h4>
<p><strong>1. 關鍵概念：函式參數傳遞 - 傳址 (Pass by Address/Pointer)</strong></p>
<p>函式原型 <code>void setValue(struct IOT*);</code> 宣告了一個名為 <code>setValue</code> 的函式，它：</p>
<ul>
    <li>不回傳任何值 (<code>void</code>)。</li>
    <li>接受一個參數。這個參數的型態是 <code>struct IOT*</code>, 這表示它是一個指向 <code>struct IOT</code> 型別變數的<strong>指標</strong>。</li>
</ul>
<p>當函式期望接收一個指標作為參數時，你在呼叫該函式時必須傳遞一個相應型態的記憶體位址。</p>
<p>如果我們有一個變數 <code>struct IOT thing;</code>，那麼：</p>
<ul>
    <li><code>thing</code> 本身代表這個結構變數。</li>
    <li><code>&amp;thing</code> 是取址運算子 (address-of operator)，它會回傳變數 <code>thing</code> 在記憶體中的位址。這個位址的型態就是 <code>struct IOT*</code>，與函式 <code>setValue</code>期望的參數型態相符。</li>
</ul>

<p><strong>2. 選項分析 (假設全形符號是筆誤，應為半形)：</strong></p>
<ul>
    <li><strong>(A) <code>setValue(thing);</code>：</strong>
        <ul><li>這會傳遞 <code>thing</code> 變數本身 (傳值，pass by value)。但函式期望的是一個 <code>struct IOT*</code> (指向 <code>struct IOT</code> 的指標)，而不是 <code>struct IOT</code> 型別的值。這會導致型別不符的編譯錯誤。</li></ul>
    </li>
    <li><strong>(B) <code>setValue(&amp;thing);</code>：</strong>
        <ul><li><code>&amp;thing</code> 獲取變數 <code>thing</code> 的記憶體位址。這個位址的型態是 <code>struct IOT*</code>。</li><li>這與函式原型 <code>void setValue(struct IOT*);</code> 的參數型態完全匹配。這是正確的呼叫方式。</li></ul>
    </li>
    <li><strong>(C) <code>setValue(*thing);</code>：</strong>
        <ul><li><code>*</code> 是解參考運算子 (dereference operator)。它用於獲取指標所指向位置的值。</li><li>由於 <code>thing</code> 本身是一個結構變數，而不是指標，所以對 <code>thing</code> 使用 <code>*</code> 是不合法的 (除非 <code>thing</code> 被錯誤地宣告為指標)。這會導致編譯錯誤。</li></ul>
    </li>
    <li><strong>(D) <code>setValue(IOT(thing));</code>：</strong>
        <ul><li><code>IOT(thing)</code> 看起來像是一個型態轉換或建構子呼叫的語法。如果 <code>IOT</code> 是一個類別且有接受 <code>struct IOT</code> 的轉換建構子或轉換函式，這可能有特定意義。但在 C 語言的結構上下文中，或者如果 <code>IOT</code> 僅是結構名，這不是標準的傳遞指標的方式，並且可能與函式期望的 <code>struct IOT*</code> 型態不符。通常，這不是正確的語法。</li></ul>
    </li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>要呼叫原型為 <code>void setValue(struct IOT*);</code> 的函式，並傳遞一個名為 <code>thing</code> 的 <code>struct IOT</code> 變數，正確的語法是傳遞該變數的位址：<code>setValue(&amp;thing);</code>。因此，選項 (B) 是正確的 (假設全形 <code>＆</code> 是半形 <code>&</code> 的筆誤)。</p>
HTML
    ],
    [
        'id_suffix' => '11',
        'question_text' => '11. 一程式片段如下，哪一個選項無法取得成員 x 的值？<pre><code class="language-c">struct tree{ int x; int y; };\n\nint main(){\n    struct tree t;\n    struct tree *p;\n    p = &t;\n}</code></pre>',
        'code_snippet' => "struct tree{ int x; int y; };\n\nint main(){\n    struct tree t;\n    struct tree *p;\n    p = &t;\n    // How to access t.x or p->x ?\n}",
        'run_code_id' => 'q11-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nstruct tree{\n    int x;\n    int y;\n};\n\nint main(){\n    struct tree t;\n    struct tree *p;\n    p = &t; // p now points to t\n\n    // Initialize x for demonstration\n    t.x = 100;\n    t.y = 200;\n\n    printf(\"Using t.x: %d\\n\", t.x);             // Valid\n    printf(\"Using p->x: %d\\n\", p->x);           // Valid\n    printf(\"Using (*p).x: %d\\n\", (*p).x);       // Valid\n\n    // Option A: t->x would be invalid because 't' is not a pointer.\n    // If we tried: printf(\"Using t->x: %d\\n\", t->x); // This would be a COMPILE ERROR\n    printf(\"Attempting t->x would cause a compile error because 't' is not a pointer.\\n\");\n\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)t->x'],
            ['key' => 'B', 'text' => '(B)p->x'],
            ['key' => 'C', 'text' => '(C)(＊p).x'],
            ['key' => 'D', 'text' => '(D)t.x'],
        ],
        'correct_answer' => 'A',
        'explanation_html' => <<<HTML
<h4>詳解 (C/C++ Context)</h4>
<p><strong>1. 關鍵概念：存取結構成員</strong></p>
<p>在 C/C++ 中，存取結構成員有兩種主要方式，取決於你是透過結構變數本身還是透過指向結構的指標：</p>
<ul>
    <li><strong>透過結構變數直接存取 (使用點運算子 <code>.</code>)：</strong>
        <ul>
            <li>如果 <code>s</code> 是一個結構變數，而 <code>member</code> 是該結構的一個成員，則可以使用 <code>s.member</code> 來存取。</li>
        </ul>
    </li>
    <li><strong>透過指向結構的指標存取 (使用箭頭運算子 <code>-&gt;</code> 或間接存取 <code>(*ptr).member</code>)：</strong>
        <ul>
            <li>如果 <code>ptr</code> 是一個指向結構的指標 (例如 <code>struct MyStruct *ptr;</code>)，而 <code>member</code> 是該結構的一個成員，則有兩種等效的方式存取：
                <ol>
                    <li><strong>箭頭運算子：</strong> <code>ptr-&gt;member</code>。這是更常用且更簡潔的方式。</li>
                    <li><strong>解參考與點運算子：</strong> <code>(*ptr).member</code>。這裡，<code>*ptr</code> 會先解參考指標以獲得指標所指向的結構物件本身，然後再使用點運算子 <code>.</code> 來存取其成員。括號是必需的，因為點運算子 <code>.</code> 的優先級高於解參考運算子 <code>*</code>。</li>
                </ol>
            </li>
        </ul>
    </li>
</ul>

<p><strong>2. 程式碼分析：</strong></p>
<pre><code class="language-c">
struct tree {
    int x;
    int y;
};

int main() {
    struct tree t;    // 't' is a structure variable of type 'struct tree'.
    struct tree *p;   // 'p' is a pointer to a 'struct tree'.
    p = &t;           // 'p' now holds the memory address of 't'. So, 'p' points to 't'.
}
</code></pre>
<p>根據上述定義：</p>
<ul>
    <li><code>t</code> 是一個結構變數。</li>
    <li><code>p</code> 是一個指向結構變數 <code>t</code> 的指標。</li>
</ul>

<p><strong>3. 選項分析 (假設全形＊是半形*，並忽略 D 選項的尾隨符號)：</strong></p>
<ul>
    <li><strong>(A) <code>t-&gt;x</code>：</strong>
        <ul><li>箭頭運算子 <code>-&gt;</code> 用於透過<strong>指標</strong>來存取結構成員。</li>
            <li><code>t</code> 是一個結構<strong>變數</strong>，而不是指標。</li>
            <li>因此，<code>t-&gt;x</code> 是<strong>不合法的</strong>，會導致編譯錯誤。</li></ul>
    </li>
    <li><strong>(B) <code>p-&gt;x</code>：</strong>
        <ul><li><code>p</code> 是一個指向 <code>struct tree</code> 的指標。</li>
            <li>使用箭頭運算子 <code>-&gt;</code> 透過指標 <code>p</code> 存取成員 <code>x</code> 是<strong>合法的</strong>。</li></ul>
    </li>
    <li><strong>(C) <code>(*p).x</code>：</strong>
        <ul><li><code>p</code> 是一個指標。<code>*p</code> 解參考該指標，得到它所指向的結構物件 (即 <code>t</code>)。</li>
            <li>然後使用點運算子 <code>.</code> 存取該物件的成員 <code>x</code>。這是<strong>合法的</strong>，並且與 <code>p-&gt;x</code> 等效。</li></ul>
    </li>
    <li><strong>(D) <code>t.x</code>：</strong>
        <ul><li><code>t</code> 是一個結構變數。</li>
            <li>使用點運算子 <code>.</code> 透過結構變數 <code>t</code> 直接存取其成員 <code>x</code> 是<strong>合法的</strong>。</li></ul>
    </li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>選項 (A) <code>t-&gt;x</code> 無法正確取得成員 <code>x</code> 的值，因為 <code>t</code> 不是指標。</p>
HTML
    ],
    [
        'id_suffix' => '12',
        'question_text' => '12. 有關 C 語言的結構(structure)，下列的說明何者錯誤？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)結構用來定義資料和資料的操作行為'],
            ['key' => 'B', 'text' => '(B)一個結構可以包含 1 個以上的成員'],
            ['key' => 'C', 'text' => '(C)使用「.」運算子存取結構成員'],
            ['key' => 'D', 'text' => '(D)結構陣列的每個元素，都是相同的結構'],
        ],
        'correct_answer' => 'A',
        'explanation_html' => <<<HTML
<h4>詳解 (C Context)</h4>
<p><strong>1. 關鍵概念：C 語言結構 (Structure)</strong></p>
<ul>
    <li><strong>定義：</strong>結構是一種使用者自訂的複合資料型態，它允許將一個或多個不同型態的變數組合成一個單一的邏輯單元。這些變數被稱為結構的「成員」(members)。</li>
    <li><strong>目的：</strong>主要用於組織和管理相關的資料。例如，一個表示學生的結構可能包含姓名 (字串)、學號 (整數)、成績 (浮點數) 等成員。</li>
    <li><strong>資料的操作行為：</strong>在純 C 語言中，結構本身主要用於定義<strong>資料的組織方式</strong>。資料的操作行為 (即函式或程序) 通常是與結構分開定義的。你會編寫函式來處理這些結構變數，但這些函式並不像 C++ 類別的成員函式那樣是結構定義的一部分。C++ 的類別 (class) 才是明確地將資料和操作該資料的方法 (行為) 封裝在一起的機制。</li>
    <li><strong>成員數量：</strong>一個結構可以包含一個或多個成員。</li>
    <li><strong>成員存取：</strong>
        <ul>
            <li>如果有一個結構變數，使用點運算子 (<code>.</code>) 來存取其成員 (例如 <code>studentVar.name</code>)。</li>
            <li>如果有一個指向結構的指標，使用箭頭運算子 (<code>-&gt;</code>) 來存取其成員 (例如 <code>studentPtr-&gt;name</code>)。</li>
        </ul>
    </li>
    <li><strong>結構陣列：</strong>可以宣告一個陣列，其每個元素都是相同型態的結構。例如，<code>struct Student allStudents[30];</code> 創建了一個包含 30 個 <code>Student</code> 結構的陣列。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 結構用來定義資料和資料的操作行為：</strong>這個敘述對於 C 語言的結構來說是<strong>錯誤的</strong>。C 結構主要用於定義資料的集合和組織。雖然你可以編寫操作這些結構資料的函式，但這些函式並不是結構定義的一部分，不像 C++ 類別那樣將資料和方法緊密綁定。C++ 的類別才符合「定義資料和資料的操作行為」的描述。</li>
    <li><strong>(B) 一個結構可以包含 1 個以上的成員：</strong>正確。結構可以有一個或多個成員。</li>
    <li><strong>(C) 使用「.」運算子存取結構成員：</strong>正確。這是透過結構變數直接存取其成員的方式。</li>
    <li><strong>(D) 結構陣列的每個元素，都是相同的結構：</strong>正確。陣列的定義要求其所有元素都必須是相同型態的。因此，結構陣列的每個元素自然都是同一個結構型態的實例。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>敘述「(A) 結構用來定義資料和資料的操作行為」對於 C 語言的結構而言是錯誤的。這個描述更符合 C++ 中類別 (class) 的概念。</p>
HTML
    ],
    [
        'id_suffix' => '13',
        'question_text' => '13. 下列有關 C/C++語言的敘述，何者是錯誤的？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)陣列是一個資料結構，可以存放多個相同資料型態的元素'],
            ['key' => 'B', 'text' => '(B)C++是物件導向語言，C 是程序導向語言'],
            ['key' => 'C', 'text' => '(C)C++支援函式重載(overload)，C   語言不支援'],
            ['key' => 'D', 'text' => '(D)自訂函式的回傳值型態為  null，表示函式沒有回傳值'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：C/C++ 語言特性</strong></p>
<ul>
    <li><strong>陣列 (Array)：</strong>是一種基本的資料結構，用於儲存固定大小的、相同資料型態元素的序列。元素在記憶體中是連續儲存的。</li>
    <li><strong>程式設計範式 (Programming Paradigms)：</strong>
        <ul>
            <li><strong>程序導向程式設計 (Procedural Programming)：</strong>以程序 (或函式) 為中心來組織程式碼，強調一系列要執行的步驟。C 語言是典型的程序導向語言。</li>
            <li><strong>物件導向程式設計 (Object-Oriented Programming, OOP)：</strong>以「物件」為中心，物件封裝了資料 (屬性) 和操作資料的方法 (行為)。C++ 支援物件導向，同時也相容程序導向。</li>
        </ul>
    </li>
    <li><strong>函式重載 (Function Overloading)：</strong>允許在同一個作用域內定義多個同名函式，只要它們的參數列表 (參數的數量、型態或順序) 不同即可。編譯器會根據呼叫時提供的參數來決定使用哪個版本的函式。
        <ul>
            <li><strong>C++ 支援函式重載。</strong></li>
            <li><strong>C 語言不支援函式重載。</strong>在 C 中，每個函式名稱必須是唯一的 (考慮到連結時的名稱修飾)。</li>
        </ul>
    </li>
    <li><strong>函式回傳型態 (Function Return Type)：</strong>
        <ul>
            <li>函式可以回傳一個值給呼叫者。回傳值的型態在函式宣告和定義時指定。</li>
            <li>如果函式不回傳任何值，其回傳型態應宣告為 <strong><code>void</code></strong>。</li>
            <li><code>null</code> (或更常見的是 <code>NULL</code> 巨集，通常定義為 <code>(void*)0</code> 或整數 <code>0</code>) 主要用於表示空指標，即不指向任何有效記憶體位置的指標。它不是一個通用的「無回傳值」的型態關鍵字。</li>
        </ul>
    </li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 陣列是一個資料結構，可以存放多個相同資料型態的元素：</strong>正確。這是陣列的基本定義。</li>
    <li><strong>(B) C++是物件導向語言，C 是程序導向語言：</strong>正確。C++ 增加了物件導向特性，而 C 主要是程序導向的。</li>
    <li><strong>(C) C++支援函式重載(overload)，C 語言不支援：</strong>正確。函式重載是 C++ 的一個重要特性，C 語言則沒有。</li>
    <li><strong>(D) 自訂函式的回傳值型態為 null，表示函式沒有回傳值：</strong>錯誤。如果函式沒有回傳值，其回傳型態應該宣告為 <strong><code>void</code></strong>。<code>null</code> (或 <code>NULL</code>) 是指標上下文中用來表示空指標的，與函式不回傳值的概念不同。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>敘述「(D) 自訂函式的回傳值型態為 null，表示函式沒有回傳值」是錯誤的。</p>
HTML
    ],
    [
        'id_suffix' => '14',
        'question_text' => '14. 一程式片段如下，執行後的輸出為何？<pre><code class="language-cpp">struct beta{\n    int x, y, z;\n};\n\nint main(){\n    struct beta a, b;\n    struct beta *p, *q;\n    p = &a;\n    q = &b;\n    (*p).x = 10;\n    (*p).y = 20;\n    (*p).z = 30;\n    q=p;\n    std::cout << q->x + q->y + q->z << std::endl;\n}</code></pre>',
        'code_snippet' => "struct beta{\n    int x, y, z;\n};\n\nint main(){\n    struct beta a, b;\n    struct beta *p, *q;\n    p = &a; // p points to a\n    q = &b; // q points to b\n\n    (*p).x = 10; // a.x = 10\n    (*p).y = 20; // a.y = 20\n    (*p).z = 30; // a.z = 30\n\n    q=p; // Now q also points to a (b is no longer pointed to by q)\n\n    // q->x is a.x (10)\n    // q->y is a.y (20)\n    // q->z is a.z (30)\n    // Sum = 10 + 20 + 30 = 60\n    std::cout << q->x + q->y + q->z << std::endl;\n    return 0; // Added for completeness\n}",
        'run_code_id' => 'q14-code',
        'code_snippet_for_runner' => "#include <iostream>\n\nstruct beta{\n    int x, y, z;\n};\n\nint main(){\n    struct beta a, b;\n    struct beta *p, *q;\n\n    p = &a; // p points to structure a\n    q = &b; // q points to structure b\n\n    // Modifying structure 'a' through pointer 'p'\n    (*p).x = 10; // Equivalent to p->x = 10; or a.x = 10;\n    (*p).y = 20; // Equivalent to p->y = 20; or a.y = 20;\n    (*p).z = 30; // Equivalent to p->z = 30; or a.z = 30;\n\n    // At this point: a = {10, 20, 30}, b is uninitialized (or default initialized)\n    // p points to a, q points to b\n\n    q = p; // Now pointer q is reassigned to point to the same address as p (i.e., address of 'a')\n           // q no longer points to 'b'. 'b' is unchanged and still exists.\n\n    // Now, q points to 'a'. So, q->x, q->y, q->z will access members of 'a'.\n    // q->x is a.x which is 10\n    // q->y is a.y which is 20\n    // q->z is a.z which is 30\n\n    int sum = q->x + q->y + q->z; // sum = 10 + 20 + 30 = 60\n\n    std::cout << sum << std::endl;\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)10'],
            ['key' => 'B', 'text' => '(B)20'],
            ['key' => 'C', 'text' => '(C)30'],
            ['key' => 'D', 'text' => '(D)60'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：結構、指標、指標賦值</strong></p>
<ul>
    <li><strong>結構 (<code>struct beta</code>)：</strong>定義了一個包含三個整數成員 <code>x</code>, <code>y</code>, <code>z</code> 的資料型態。</li>
    <li><strong>結構變數：</strong><code>struct beta a, b;</code> 宣告了兩個 <code>beta</code> 型態的結構變數 <code>a</code> 和 <code>b</code>。</li>
    <li><strong>結構指標：</strong><code>struct beta *p, *q;</code> 宣告了兩個指向 <code>beta</code> 型態結構的指標 <code>p</code> 和 <code>q</code>。</li>
    <li><strong>取址運算子 (<code>&amp;</code>)：</strong><code>p = &amp;a;</code> 使指標 <code>p</code> 指向結構變數 <code>a</code> 的記憶體位址。同樣，<code>q = &amp;b;</code> 使 <code>q</code> 指向 <code>b</code>。</li>
    <li><strong>解參考與成員存取 (<code>(*ptr).member</code> 或 <code>ptr-&gt;member</code>)：</strong>
        <ul>
            <li><code>(*p).x = 10;</code> 等同於 <code>p-&gt;x = 10;</code> 或 <code>a.x = 10;</code> (因為 <code>p</code> 指向 <code>a</code>)。</li>
        </ul>
    </li>
    <li><strong>指標賦值 (<code>q = p;</code>)：</strong>這是一個關鍵步驟。它使得指標 <code>q</code> 不再指向它原來指向的物件 (<code>b</code>)，而是複製指標 <code>p</code> 的值 (即 <code>a</code> 的記憶體位址) 給 <code>q</code>。因此，在這行之後，<strong><code>q</code> 和 <code>p</code> 都指向同一個結構物件 <code>a</code></strong>。結構 <code>b</code> 本身並未改變，只是 <code>q</code> 不再指向它了。</li>
</ul>

<p><strong>2. 程式碼執行追蹤：</strong></p>
<ol>
    <li><code>struct beta a, b;</code>：宣告兩個結構變數。</li>
    <li><code>struct beta *p, *q;</code>：宣告兩個結構指標。</li>
    <li><code>p = &amp;a;</code>：<code>p</code> 指向 <code>a</code>。</li>
    <li><code>q = &amp;b;</code>：<code>q</code> 指向 <code>b</code>。</li>
    <li><code>(*p).x = 10;</code>：因為 <code>p</code> 指向 <code>a</code>，所以 <code>a.x</code> 被設為 10。</li>
    <li><code>(*p).y = 20;</code>：<code>a.y</code> 被設為 20。</li>
    <li><code>(*p).z = 30;</code>：<code>a.z</code> 被設為 30。
        <br>此時，<code>a = {x:10, y:20, z:30}</code>。<code>b</code> 的成員值未被初始化 (或為預設值)。
    </li>
    <li><strong><code>q = p;</code></strong>：指標 <code>q</code> 現在也指向 <code>a</code>。 (<code>q</code> 不再指向 <code>b</code>)。</li>
    <li><code>std::cout &lt;&lt; q-&gt;x + q-&gt;y + q-&gt;z &lt;&lt; std::endl;</code>：
        <ul>
            <li>因為 <code>q</code> 指向 <code>a</code>，所以 <code>q-&gt;x</code> 就是 <code>a.x</code> (值為 10)。</li>
            <li><code>q-&gt;y</code> 就是 <code>a.y</code> (值為 20)。</li>
            <li><code>q-&gt;z</code> 就是 <code>a.z</code> (值為 30)。</li>
            <li>所以，表達式計算為 <code>10 + 20 + 30</code>，結果是 <code>60</code>。</li>
        </ul>
    </li>
</ol>

<p><strong>3. 選項分析：</strong></p>
<ul>
    <li>(A) 10</li>
    <li>(B) 20</li>
    <li>(C) 30</li>
    <li>(D) 60：正確。</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>程式執行後的輸出為 60。</p>
HTML
    ],
    [
        'id_suffix' => '15',
        'question_text' => '15. 一程式片段如下，執行後的輸出為何？<pre><code class="language-cpp">struct  CAT{\n    int a, b;\n};\n\nvoid callCAT(struct CAT *pCAT){\n    pCAT->a = 100;\n    pCAT->b = pCAT->a;\n}\n\nint main(){\n    struct CAT c;\n    struct CAT *p;\n    p = &c;\n    p->a = 50;\n    callCAT(p);\n    std::cout << p->b << std::endl;\n}</code></pre>',
        'code_snippet' => "struct CAT{\n    int a, b;\n};\n\nvoid callCAT(struct CAT *pCAT){\n    pCAT->a = 100;\n    pCAT->b = pCAT->a; // pCAT->b becomes 100\n}\n\nint main(){\n    struct CAT c;\n    struct CAT *p;\n    p = &c;      // p points to c\n    p->a = 50;   // c.a becomes 50 (c.b is uninitialized)\n    callCAT(p);  // Pass address of c to callCAT\n                 // Inside callCAT: c.a becomes 100, then c.b becomes 100\n    std::cout << p->b << std::endl; // p still points to c, so output c.b\n    return 0; // Added for completeness\n}",
        'run_code_id' => 'q15-code',
        'code_snippet_for_runner' => "#include <iostream>\n\nstruct CAT{\n    int a, b;\n};\n\n// Function that takes a pointer to a CAT struct\nvoid callCAT(struct CAT *pCAT){\n    // Modifies the 'a' member of the struct pointed to by pCAT\n    pCAT->a = 100;\n    // Modifies the 'b' member of the struct pointed to by pCAT, setting it to the new value of 'a'\n    pCAT->b = pCAT->a; // So, pCAT->b will also be 100\n}\n\nint main(){\n    struct CAT c;     // Declare a CAT struct variable 'c'\n    struct CAT *p;    // Declare a pointer 'p' to a CAT struct\n\n    p = &c;           // Make 'p' point to the address of 'c'\n\n    p->a = 50;        // Set member 'a' of struct 'c' (via pointer p) to 50.\n                      // At this point: c.a = 50, c.b is uninitialized.\n\n    callCAT(p);       // Call callCAT, passing the pointer 'p' (which points to 'c').\n                      // Inside callCAT:\n                      // 1. pCAT (which is 'p', pointing to 'c') has its 'a' member set to 100.\n                      //    So, c.a becomes 100.\n                      // 2. pCAT has its 'b' member set to its 'a' member (which is now 100).\n                      //    So, c.b becomes 100.\n\n    // After callCAT returns, c.a is 100 and c.b is 100.\n    // p still points to c.\n    std::cout << p->b << std::endl; // Output the value of c.b (which is 100).\n\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)10'],
            ['key' => 'B', 'text' => '(B)50'],
            ['key' => 'C', 'text' => '(C)100'],
            ['key' => 'D', 'text' => '(D)編譯錯誤'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：結構、指標、函式傳址呼叫</strong></p>
<ul>
    <li><strong>結構 (<code>struct CAT</code>)：</strong>定義了一個包含兩個整數成員 <code>a</code> 和 <code>b</code> 的資料型態。</li>
    <li><strong>指標 (<code>struct CAT *p</code>)：</strong><code>p</code> 是一個指向 <code>CAT</code> 型態結構的指標。</li>
    <li><strong>函式傳址 (Pass by Address/Pointer)：</strong>函式 <code>callCAT(struct CAT *pCAT)</code> 接受一個指向 <code>CAT</code> 結構的指標作為參數。這意味著在函式內部對 <code>pCAT</code> 所指向的結構的成員進行修改，會直接影響到原始傳入的結構物件。</li>
</ul>

<p><strong>2. 程式碼執行追蹤：</strong></p>
<ol>
    <li><code>struct CAT c;</code>：宣告一個 <code>CAT</code> 型態的結構變數 <code>c</code>。此時 <code>c.a</code> 和 <code>c.b</code> 的值是未初始化的 (垃圾值)。</li>
    <li><code>struct CAT *p;</code>：宣告一個指向 <code>CAT</code> 結構的指標 <code>p</code>。</li>
    <li><code>p = &amp;c;</code>：指標 <code>p</code> 現在指向結構變數 <code>c</code> 的記憶體位址。</li>
    <li><code>p-&gt;a = 50;</code>：透過指標 <code>p</code>，將 <code>c.a</code> 的值設定為 50。
        <br>此時：<code>c = { a:50, b:(未初始化) }</code>。</li>
    <li><code>callCAT(p);</code>：呼叫 <code>callCAT</code> 函式，並將指標 <code>p</code> (即 <code>c</code> 的位址) 傳遞給它。
        <ul>
            <li>在 <code>callCAT</code> 函式內部，參數 <code>pCAT</code> 現在也指向原始的 <code>c</code> 物件。</li>
            <li><code>pCAT-&gt;a = 100;</code>：透過 <code>pCAT</code> 修改 <code>c.a</code> 的值為 100。
                <br>此時在 <code>callCAT</code> 內 (也是對 <code>main</code> 中的 <code>c</code> 的修改)：<code>c = { a:100, b:(未初始化) }</code>。</li>
            <li><code>pCAT-&gt;b = pCAT-&gt;a;</code>：將 <code>pCAT-&gt;a</code> (即 <code>c.a</code>，現在是 100) 的值賦給 <code>pCAT-&gt;b</code> (即 <code>c.b</code>)。
                <br>此時在 <code>callCAT</code> 內 (也是對 <code>main</code> 中的 <code>c</code> 的修改)：<code>c = { a:100, b:100 }</code>。</li>
        </ul>
    </li>
    <li>函式 <code>callCAT</code> 執行完畢返回。</li>
    <li><code>std::cout &lt;&lt; p-&gt;b &lt;&lt; std::endl;</code>：
        <ul>
            <li>指標 <code>p</code> 仍然指向結構 <code>c</code>。</li>
            <li>輸出 <code>p-&gt;b</code>，即 <code>c.b</code> 的值。</li>
            <li>由於 <code>callCAT</code> 函式修改了 <code>c.b</code>，其值現在是 100。</li>
        </ul>
    </li>
</ol>

<p><strong>3. 選項分析：</strong></p>
<ul>
    <li>(A) 10</li>
    <li>(B) 50</li>
    <li>(C) 100：正確。</li>
    <li>(D) 編譯錯誤：程式碼語法正確，可以成功編譯。</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>程式執行後的輸出為 100。</p>
HTML
    ],
    [
        'id_suffix' => '16',
        'question_text' => '16. 關於下列程式片段的描述，何者正確？<pre><code class="language-cpp">x = &y;\nx->a = 1;</code></pre>',
        'code_snippet' => "// Assuming 'y' is a struct variable and 'x' is a pointer to that struct type.\n// And the struct type has a member 'a'.\n\nstruct SomeStruct { int a; /* other members */ };\n\n// ... later in code ...\n// struct SomeStruct y;\n// struct SomeStruct *x;\n// x = &y;\n// x->a = 1;",
        'run_code_id' => 'q16-code',
        'code_snippet_for_runner' => "#include <stdio.h>\n\nstruct MyStruct {\n    int a;\n    char b;\n};\n\nint main() {\n    struct MyStruct y; // y is a struct variable\n    struct MyStruct *x; // x is a pointer to a struct of type MyStruct\n\n    // Initialize y's members for clarity, though not strictly needed for the question's logic\n    y.a = 0;\n    y.b = 'Z';\n\n    printf(\"Before assignment:\\n\");\n    printf(\"y.a = %d\\n\", y.a);\n\n    // Line 1: x = &y;\n    // x now holds the memory address of y. x points to y.\n    x = &y; \n\n    // Line 2: x->a = 1;\n    // This means: access the member 'a' of the struct that 'x' points to, and set it to 1.\n    // Since x points to y, this is equivalent to y.a = 1.\n    x->a = 1;\n\n    printf(\"\\nAfter assignment (x = &y; x->a = 1;):\\n\");\n    printf(\"y.a = %d (because x points to y)\\n\", y.a);\n    printf(\"x->a = %d\\n\", x->a);\n\n    // (A) x 是一個結構指標，指向結構變數 y -- This is true from x = &y;\n    // (B) a 是結構變數 y 的其中一個成員 -- This is true from struct definition\n    // (C) y.a 的值是 1 -- This is true after x->a = 1; because x points to y\n\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)x 是一個結構指標，指向結構變數 y'],
            ['key' => 'B', 'text' => '(B)a 是結構變數 y 的其中一個成員'],
            ['key' => 'C', 'text' => '(C)y.a 的值是 1'],
            ['key' => 'D', 'text' => '(D)以上皆正確'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解 (C/C++ Context)</h4>
<p><strong>1. 關鍵概念：指標、結構、成員存取</strong></p>
<p>要理解這段程式碼，我們需要假設一些上下文：</p>
<ul>
    <li><code>y</code> 必須是一個結構 (或類別) 型態的變數。</li>
    <li>該結構 (或類別) 型態必須有一個名為 <code>a</code> 的成員。</li>
    <li><code>x</code> 必須是一個指向與 <code>y</code>相同結構 (或類別) 型態的指標。</li>
</ul>
<p>例如，我們可以假設有如下定義：</p>
<pre><code class="language-c">
struct SomeType {
    int a;
    // ... other members ...
};

struct SomeType y;     // y is a structure variable
struct SomeType *x;    // x is a pointer to a structure of SomeType
</code></pre>

<p><strong>2. 程式碼片段分析：</strong></p>
<ol>
    <li><strong><code>x = &amp;y;</code></strong>
        <ul>
            <li><code>&amp;y</code>：取結構變數 <code>y</code> 的記憶體位址。</li>
            <li><code>x = ...</code>：將 <code>y</code> 的位址賦值給指標 <code>x</code>。</li>
            <li>因此，這行執行後，指標 <code>x</code> 指向結構變數 <code>y</code>。</li>
        </ul>
    </li>
    <li><strong><code>x-&gt;a = 1;</code></strong>
        <ul>
            <li><code>x-&gt;a</code>：透過指標 <code>x</code> 存取它所指向的結構物件中的成員 <code>a</code>。</li>
            <li>因為 <code>x</code> 指向 <code>y</code>，所以 <code>x-&gt;a</code> 實際上就是存取 <code>y.a</code>。</li>
            <li><code>= 1;</code>：將成員 <code>a</code> (即 <code>y.a</code>) 的值設定為 1。</li>
        </ul>
    </li>
</ol>

<p><strong>3. 選項分析：</strong></p>
<ul>
    <li><strong>(A) x 是一個結構指標，指向結構變數 y：</strong>
        <ul><li>正確。根據 <code>x = &amp;y;</code>，<code>x</code> 儲存了 <code>y</code> 的位址，因此 <code>x</code> 是一個指向 <code>y</code> 的指標。我們也從上下文推斷 <code>x</code> 被宣告為結構指標，<code>y</code> 被宣告為結構變數。</li></ul>
    </li>
    <li><strong>(B) a 是結構變數 y 的其中一個成員：</strong>
        <ul><li>正確。<code>x-&gt;a</code> 的語法能夠成立，表示 <code>x</code> 所指向的結構型態 (即 <code>y</code> 的型態) 必須有一個名為 <code>a</code> 的成員。</li></ul>
    </li>
    <li><strong>(C) y.a 的值是 1：</strong>
        <ul><li>正確。因為 <code>x</code> 指向 <code>y</code>，所以 <code>x-&gt;a = 1;</code> 的操作等同於將 <code>y.a</code> 的值設定為 1。</li></ul>
    </li>
    <li><strong>(D) 以上皆正確：</strong>
        <ul><li>由於 (A), (B), 和 (C) 都正確，所以此選項正確。</li></ul>
    </li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>所有描述 (A), (B), 和 (C) 都是正確的。</p>
HTML
    ],
    [
        'id_suffix' => '17',
        'question_text' => '17. C++語言的保留字有其特殊的含意，下列有關於保留字的說明，何者錯誤？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)break：中斷程式的執行，離開目前的程式區塊'],
            ['key' => 'B', 'text' => '(B)this：指向物件本身的指標'],
            ['key' => 'C', 'text' => '(C)const：建立自訂的結構型態'],
            ['key' => 'D', 'text' => '(D)continue：忽略後面的程式碼，立刻執行下一次迴圈'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：C++ 保留字 (Keywords/Reserved Words)</strong></p>
<p>C++ 語言有一些保留字，它們具有特殊的意義，不能被用作變數名、函式名或其他識別碼。</p>
<ul>
    <li><strong><code>break</code>：</strong>
        <ul>
            <li>用於迴圈 (<code>for</code>, <code>while</code>, <code>do-while</code>) 或 <code>switch</code> 語句中。</li>
            <li>在迴圈中，<code>break</code> 會立即終止包含它的最內層迴圈的執行，程式流程跳到迴圈之後的第一條語句。</li>
            <li>在 <code>switch</code> 語句中，<code>break</code> 用於跳出 <code>switch</code> 區塊，防止「貫穿」(fall-through) 到下一個 <code>case</code>。</li>
            <li>所以「中斷程式的執行，離開目前的程式區塊」是對其在迴圈/switch中作用的合理描述。</li>
        </ul>
    </li>
    <li><strong><code>this</code>：</strong>
        <ul>
            <li>是一個特殊的指標，它只在類別的<strong>非靜態成員函式</strong>內部可用。</li>
            <li><code>this</code> 指標指向呼叫該成員函式的物件本身。</li>
            <li>可以用來存取物件的資料成員或呼叫其他成員函式，特別是在成員函式的參數名稱與資料成員名稱相同時，可以用來區分。例如：<code>this-&gt;member = member;</code>。</li>
        </ul>
    </li>
    <li><strong><code>const</code>：</strong>
        <ul>
            <li>是一個型別限定字 (type qualifier)。</li>
            <li>用於宣告一個變數為常數，表示其值在初始化後不能被修改 (e.g., <code>const int MAX_VALUE = 100;</code>)。</li>
            <li>也可以用於函式參數 (表示函式內部不應修改該參數)、函式回傳型別 (表示回傳值是常數)，以及成員函式 (表示該成員函式不會修改物件的資料成員，稱為常數成員函式)。</li>
            <li>它<strong>不是</strong>用來「建立自訂的結構型態」。建立自訂結構型態使用 <code>struct</code> 關鍵字 (或 <code>class</code> 關鍵字來建立類別)。</li>
        </ul>
    </li>
    <li><strong><code>continue</code>：</strong>
        <ul>
            <li>用於迴圈 (<code>for</code>, <code>while</code>, <code>do-while</code>) 中。</li>
            <li>它會立即終止目前迴圈迭代中 <code>continue</code> 語句之後的程式碼，並開始下一次迴圈的迭代。</li>
            <li>對於 <code>for</code> 迴圈，會先執行更新表達式，再進行條件判斷。對於 <code>while</code> 和 <code>do-while</code>，會直接跳到條件判斷部分。</li>
        </ul>
    </li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) break：中斷程式的執行，離開目前的程式區塊：</strong>正確 (指迴圈或 switch 區塊)。</li>
    <li><strong>(B) this：指向物件本身的指標：</strong>正確。這是 <code>this</code> 指標在類別成員函式中的作用。</li>
    <li><strong>(C) const：建立自訂的結構型態：</strong>錯誤。<code>const</code> 用於定義常數或常數行為。建立自訂結構型態使用 <code>struct</code> 關鍵字。</li>
    <li><strong>(D) continue：忽略後面的程式碼，立刻執行下一次迴圈：</strong>正確。這是 <code>continue</code> 在迴圈中的作用。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>敘述「(C) const：建立自訂的結構型態」是錯誤的。</p>
HTML
    ],
    [
        'id_suffix' => '18',
        'question_text' => '18. 有關 C++語言的類別建構子，哪一個描述是錯誤的？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)建構子可以重載'],
            ['key' => 'B', 'text' => '(B)建構子的名稱必須和類別名稱相同'],
            ['key' => 'C', 'text' => '(C)建構子一定要有回傳值'],
            ['key' => 'D', 'text' => '(D)宣告物件時，會自動呼叫建構子，完成物件初始化'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：C++ 類別建構子 (Constructor)</strong></p>
<p>建構子是類別中一種特殊的成員函式，其主要職責是在創建該類別的物件時進行初始化工作。</p>
<ul>
    <li><strong>名稱：</strong>建構子的名稱必須與其所屬的類別名稱完全相同。</li>
    <li><strong>回傳值：</strong>建構子<strong>沒有回傳型別</strong>，連 <code>void</code> 都不寫。它隱含地「回傳」一個新創建並初始化的物件。</li>
    <li><strong>自動呼叫：</strong>當宣告一個類別的物件時，相應的建構子會被自動呼叫。</li>
    <li><strong>重載 (Overloading)：</strong>一個類別可以有多個建構子，只要它們的參數列表 (參數的數量、型態或順序) 不同即可。這允許以不同的方式初始化物件。例如，可以有一個無參數的預設建構子，以及一個或多個帶參數的建構子。</li>
    <li><strong>初始化：</strong>建構子通常用於初始化物件的資料成員，分配必要的資源等。</li>
    <li><strong>預設建構子：</strong>如果程式設計師沒有為類別定義任何建構子，編譯器通常會自動產生一個公有的無參數預設建構子 (default constructor)，它對成員執行預設初始化 (對於基本型態可能是不確定的值，對於類別型態成員則呼叫其預設建構子)。但如果程式設計師定義了任何建構子 (即使是帶參數的)，編譯器就不再自動產生預設建構子，除非明確使用 <code>= default;</code> (C++11 起)。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 建構子可以重載：</strong>正確。只要參數列表不同，就可以定義多個同名的建構子。</li>
    <li><strong>(B) 建構子的名稱必須和類別名稱相同：</strong>正確。這是建構子的一個明確規則。</li>
    <li><strong>(C) 建構子一定要有回傳值：</strong>錯誤。建構子沒有回傳型別，也不宣告 <code>void</code>。它們不使用 <code>return</code> 語句來回傳值。</li>
    <li><strong>(D) 宣告物件時，會自動呼叫建構子，完成物件初始化：</strong>正確。這是建構子的主要目的和行為。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>敘述「(C) 建構子一定要有回傳值」是錯誤的。</p>
HTML
    ],
    [
        'id_suffix' => '19',
        'question_text' => '19. 有一函式原型 void key( )，下列何者不是其合法的重載函式？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)void key(int)，'],
            ['key' => 'B', 'text' => '(B)int key(float)，'],
            ['key' => 'C', 'text' => '(C)	void key(int， int)，'],
            ['key' => 'D', 'text' => '(D)int key( )，'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：函式重載 (Function Overloading)</strong></p>
<p>在 C++ 中，函式重載允許在同一個作用域 (scope) 中定義多個同名函式，但這些同名函式必須具有<strong>不同的參數列表</strong>。參數列表的不同可以體現在：</p>
<ol>
    <li>參數的<strong>數量</strong>不同。</li>
    <li>參數的<strong>型態</strong>不同。</li>
    <li>參數的<strong>順序</strong>不同 (如果型態也因此不同)。</li>
</ol>
<p><strong>重要的是，函式的回傳型態本身不能作為區分重載函式的依據。</strong>如果兩個函式只有回傳型態不同，而函式名稱和參數列表都相同，則它們不是合法的重載，會導致編譯錯誤 (通常是重定義錯誤)。</p>
<p>原始函式原型是：<code>void key()</code></p>
<ul>
    <li>名稱：<code>key</code></li>
    <li>參數列表：無參數 (<code>()</code>)</li>
    <li>回傳型態：<code>void</code></li>
</ul>

<p><strong>2. 選項分析 (假設選項中的全形逗號是筆誤，應為半形)：</strong></p>
<ul>
    <li><strong>(A) <code>void key(int)</code>：</strong>
        <ul>
            <li>名稱：<code>key</code> (相同)</li>
            <li>參數列表：一個 <code>int</code> 參數 (<code>(int)</code>)。與原函式的無參數列表 <code>()</code> 不同。</li>
            <li>回傳型態：<code>void</code> (與原函式相同，但不影響重載判斷)。</li>
            <li>結論：合法重載。</li>
        </ul>
    </li>
    <li><strong>(B) <code>int key(float)</code>：</strong>
        <ul>
            <li>名稱：<code>key</code> (相同)</li>
            <li>參數列表：一個 <code>float</code> 參數 (<code>(float)</code>)。與原函式的無參數列表 <code>()</code> 不同。</li>
            <li>回傳型態：<code>int</code> (與原函式不同，但不影響重載判斷，因為參數列表已不同)。</li>
            <li>結論：合法重載。</li>
        </ul>
    </li>
    <li><strong>(C) <code>void key(int, int)</code>：</strong>
        <ul>
            <li>名稱：<code>key</code> (相同)</li>
            <li>參數列表：兩個 <code>int</code> 參數 (<code>(int, int)</code>)。與原函式的無參數列表 <code>()</code> 不同。</li>
            <li>回傳型態：<code>void</code>。</li>
            <li>結論：合法重載。</li>
        </ul>
    </li>
    <li><strong>(D) <code>int key()</code>：</strong>
        <ul>
            <li>名稱：<code>key</code> (相同)</li>
            <li>參數列表：無參數 (<code>()</code>)。<strong>與原函式的參數列表完全相同。</strong></li>
            <li>回傳型態：<code>int</code> (與原函式的 <code>void</code> 不同)。</li>
            <li>結論：<strong>不合法重載。</strong>因為函式名稱和參數列表都與原函式 <code>void key()</code> 相同，僅有回傳型態不同，這在 C++ 中是不允許的，會被視為函式重定義。</li>
        </ul>
    </li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>選項 (D) <code>int key()</code> 不是 <code>void key()</code> 的合法重載函式，因為它們具有相同的名稱和參數列表，僅回傳型態不同。</p>
HTML
    ],
    [
        'id_suffix' => '20',
        'question_text' => '20. 關於下列程式碼片段的功能說明，哪一個是錯誤的？<pre><code class="language-cpp">class box{\nprivate:\n    int x, y;\npublic:\n    box(){\n        this->x=10; this->y=10;\n    }\n    box(int x, int y){\n        this->x = x; this->y = y;\n    }\n};</code></pre>',
        'code_snippet' => "class box{\nprivate:\n    int x, y;\npublic:\n    box(){\n        this->x=10; this->y=10;\n    }\n    box(int x, int y){\n        this->x = x; this->y = y;\n    }\n    // Example of how to use it:\n    // box b1; // Calls box() - b1.x is 10, b1.y is 10\n    // box b2(5, 20); // Calls box(int, int) - b2.x is 5, b2.y is 20\n};",
        'run_code_id' => 'q20-code',
        'code_snippet_for_runner' => "#include <iostream>\n\nclass box{\nprivate:\n    int x, y;\npublic:\n    // Default constructor\n    box(){\n        this->x=10; \n        this->y=10;\n        std::cout << \"Default constructor called. x=\" << this->x << \", y=\" << this->y << std::endl;\n    }\n    // Parameterized constructor\n    box(int x, int y){\n        this->x = x; \n        this->y = y;\n        std::cout << \"Parameterized constructor called. x=\" << this->x << \", y=\" << this->y << std::endl;\n    }\n    void print_values() {\n        std::cout << \"Box values: x=\" << x << \", y=\" << y << std::endl;\n    }\n};\n\nint main() {\n    box b1; // Calls default constructor\n    b1.print_values();\n\n    box b2(5, 25); // Calls parameterized constructor\n    b2.print_values();\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)宣告一個 box 類別，有 4 個成員'],
            ['key' => 'B', 'text' => '(B)x 和 y 是公有成員，可以直接存取'],
            ['key' => 'C', 'text' => '(C)有 2 個重載的建構子，可以對物件初始化'],
            ['key' => 'D', 'text' => '(D)this 是指向物件本身的指標'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：C++ 類別定義</strong></p>
<p>分析提供的類別 <code>box</code> 定義：</p>
<pre><code class="language-cpp">
class box {
private:
    int x, y; // Data members
public:
    // Default constructor
    box() {
        this->x = 10;
        this->y = 10;
    }
    // Parameterized constructor
    box(int x, int y) {
        this->x = x;
        this->y = y;
    }
};
</code></pre>
<ul>
    <li><strong>資料成員 (Data Members)：</strong>
        <ul>
            <li><code>int x;</code></li>
            <li><code>int y;</code></li>
            <li>這兩個是類別 <code>box</code> 的資料成員。它們被宣告在 <code>private</code> 區塊，意味著它們只能被類別 <code>box</code> 的成員函式 (包括建構子) 直接存取，不能從類別外部直接存取。這是實現資料封裝的一種方式。</li>
        </ul>
    </li>
    <li><strong>成員函式 (Member Functions)：</strong>
        <ul>
            <li><code>box()</code>：這是一個無參數的建構子 (預設建構子)。當創建 <code>box</code> 物件而不提供參數時 (例如 <code>box b1;</code>)，它會被呼叫，並將 <code>x</code> 和 <code>y</code> 初始化為 10。</li>
            <li><code>box(int x, int y)</code>：這是一個帶有兩個整數參數的建構子 (參數化建構子)。當創建 <code>box</code> 物件並提供兩個整數參數時 (例如 <code>box b2(5, 20);</code>)，它會被呼叫，並使用傳入的參數值來初始化物件的 <code>x</code> 和 <code>y</code> 成員。這兩個建構子同名但參數列表不同，構成了建構子重載。</li>
        </ul>
    </li>
    <li><strong><code>this</code> 指標：</strong>在類別的非靜態成員函式中，<code>this</code> 是一個隱含的指標，它指向呼叫該函式的物件本身。可以用 <code>this-&gt;member</code> 的形式來明確存取物件的成員，尤其是在成員函式的參數名稱與資料成員名稱相同時，用以區分。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 宣告一個 box 類別，有 4 個成員：</strong>
        <ul>
            <li>錯誤。該類別有 <strong>2 個資料成員</strong> (<code>x</code> 和 <code>y</code>) 和 <strong>2 個成員函式</strong> (兩個建構子)。「成員」通常可以指資料成員和成員函式。如果題目僅指資料成員，則有2個。如果指所有成員 (資料+函式)，則有4個。但選項的表述通常傾向於資料成員的數量，或者是一個概括性的總數。相較於 (B) 的明確錯誤，此選項的「錯誤」程度較低，但也不完全精確。</li>
        </ul>
    </li>
    <li><strong>(B) x 和 y 是公有成員，可以直接存取：</strong>
        <ul>
            <li>錯誤。<code>x</code> 和 <code>y</code> 被宣告在 <code>private:</code> 區塊內，所以它們是<strong>私有成員</strong>。私有成員不能從類別外部直接存取。例如，<code>box b; b.x = 5;</code> 這樣的程式碼會導致編譯錯誤。</li>
        </ul>
    </li>
    <li><strong>(C) 有 2 個重載的建構子，可以對物件初始化：</strong>
        <ul>
            <li>正確。類別 <code>box</code> 有兩個建構子：<code>box()</code> 和 <code>box(int x, int y)</code>。它們名稱相同但參數列表不同，構成重載。它們都用於初始化物件。</li>
        </ul>
    </li>
    <li><strong>(D) this 是指向物件本身的指標：</strong>
        <ul>
            <li>正確。在建構子 <code>box()</code> 和 <code>box(int x, int y)</code> 內部，<code>this</code> 指標指向正在被創建和初始化的 <code>box</code> 物件。</li>
        </ul>
    </li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>選項 (B) "x 和 y 是公有成員，可以直接存取" 是明確錯誤的，因為它們是私有成員。</p>
<p>選項 (A) 也不完全精確，類別有2個資料成員和2個成員函式(建構子)。如果題目問的是資料成員數量，則是2。但相較之下，(B) 的錯誤更為根本和直接。</p>
HTML
    ],
    [
        'id_suffix' => '21',
        'question_text' => '21. 在 C++中宣告類別時，將資料成員宣告在哪個修飾子區塊內，可以達到物件導向的 「封裝」特性？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)public'],
            ['key' => 'B', 'text' => '(B)hidden'],
            ['key' => 'C', 'text' => '(C)private'],
            ['key' => 'D', 'text' => '(D)close'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：封裝 (Encapsulation) 與存取修飾子 (Access Specifiers)</strong></p>
<p><strong>封裝</strong>是物件導向程式設計 (OOP) 的核心原則之一。它的主要思想是：</p>
<ul>
    <li>將資料 (屬性) 和操作該資料的方法 (行為) 捆綁在一個單元 (即物件或類別) 中。</li>
    <li><strong>隱藏物件的內部狀態和實作細節</strong>，只對外提供一個定義良好的介面 (通常是公有成員函式) 來與物件互動。</li>
</ul>
<p>這樣做的好處包括：</p>
<ul>
    <li><strong>資料保護：</strong>防止外部程式碼直接、意外地修改物件的內部資料，確保資料的完整性和一致性。資料只能透過類別提供的受控方法來修改。</li>
    <li><strong>模組化：</strong>物件成為一個自給自足的模組。</li>
    <li><strong>靈活性與可維護性：</strong>如果類別的內部實作需要改變，只要公有介面保持不變，使用該類別的外部程式碼就不需要修改。</li>
</ul>
<p>C++ 使用<strong>存取修飾子</strong>來控制類別成員 (資料成員和成員函式) 的可見性和可存取性：</p>
<ul>
    <li><strong><code>public</code>：</strong>公有成員。可以從類別的任何地方被存取，包括類別外部的程式碼以及子類別。公有成員構成了類別的外部介面。</li>
    <li><strong><code>private</code>：</strong>私有成員。只能被同一類別的成員函式 (以及友元函式/類別) 存取。它們對類別外部的程式碼和子類別 (除非透過繼承的公有/保護介面) 都是不可見和不可存取的。<strong>將資料成員宣告為 <code>private</code> 是實現資料隱藏和封裝的主要手段。</strong></li>
    <li><strong><code>protected</code>：</strong>保護成員。可以被同一類別的成員函式、友元函式/類別以及其子類別的成員函式存取。但對類別外部的無關程式碼是不可存取的。</li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) public：</strong>將資料成員宣告為 <code>public</code> 會使其可以從外部直接存取，這違反了封裝的資料隱藏原則。</li>
    <li><strong>(B) hidden：</strong><code>hidden</code> 不是 C++ 的標準存取修飾子關鍵字。</li>
    <li><strong>(C) private：</strong>正確。將資料成員宣告為 <code>private</code>，並提供公有的成員函式 (getter/setter) 來間接存取或修改這些資料，是實現封裝的標準做法。</li>
    <li><strong>(D) close：</strong><code>close</code> 不是 C++ 的標準存取修飾子關鍵字。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>在 C++ 中宣告類別時，將資料成員宣告在 <code>private</code> 修飾子區塊內，可以達到物件導向的「封裝」(特別是其資料隱藏方面) 的特性。</p>
HTML
    ],
    [
        'id_suffix' => '22',
        'question_text' => '22. 要將 C++中的成員函式做為對外的操作介面，達到資料隠藏的功能，必須使用哪一個修飾子來宣告成員函式？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)public'],
            ['key' => 'B', 'text' => '(B)private'],
            ['key' => 'C', 'text' => '(C)open'],
            ['key' => 'D', 'text' => '(D)external'],
        ],
        'correct_answer' => 'A',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：資料隱藏與公有介面 (Public Interface)</strong></p>
<p><strong>資料隱藏 (Data Hiding)</strong> 是封裝原則的一個重要方面。它的目的是保護物件的內部狀態 (資料成員) 不被外部程式碼直接、隨意地修改，從而確保物件狀態的完整性和一致性。</p>
<p>實現資料隱藏的典型做法是：</p>
<ol>
    <li>將類別的<strong>資料成員宣告為 <code>private</code></strong> (或 <code>protected</code>，如果希望子類別能存取)。</li>
    <li>提供一組<strong>公有 (<code>public</code>) 的成員函式</strong>作為物件的「介面」。外部程式碼只能透過這些公有函式來與物件互動，包括查詢或修改物件的狀態。</li>
</ol>
<p>這些公有成員函式（通常稱為 getters 和 setters，或存取器和修改器）可以包含驗證邏輯，確保對資料的修改是合法的和受控的。</p>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) public：</strong>正確。成員函式若要作為對外的操作介面，讓類別外部的程式碼可以呼叫它們來間接操作被隱藏的私有資料，這些函式本身必須是公有的 (<code>public</code>)。</li>
    <li><strong>(B) private：</strong>如果成員函式被宣告為 <code>private</code>，則它們只能被同一類別的其他成員函式呼叫，不能作為對外的直接操作介面。</li>
    <li><strong>(C) open：</strong><code>open</code> 不是 C++ 的標準存取修飾子關鍵字。</li>
    <li><strong>(D) external：</strong><code>external</code> (或 <code>extern</code>) 關鍵字在 C++ 中用於宣告變數或函式具有外部連結性 (external linkage)，表示其定義可能在其他檔案中，與成員的存取權限無關。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>要將 C++ 中的成員函式作為對外的操作介面，以達到資料隱藏 (透過操作這些介面函式來間接存取通常是私有的資料成員) 的功能，這些成員函式必須使用 <code>public</code> 修飾子來宣告。</p>
HTML
    ],
    [
        'id_suffix' => '23',
        'question_text' => '23. C++語言支援物件導向的功能，要在程式中宣告一個類別，需使用哪一個關鍵字？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)object'],
            ['key' => 'B', 'text' => '(B)struct'],
            ['key' => 'C', 'text' => '(C)define'],
            ['key' => 'D', 'text' => '(D)class'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：C++ 類別宣告</strong></p>
<p>在 C++ 中，類別 (Class) 是物件導向程式設計的核心構造塊。它是一個藍圖，用於定義物件的屬性 (資料成員) 和可以對這些物件執行的操作 (成員函式)。</p>
<p>要宣告一個類別，C++ 語言提供了關鍵字 <strong><code>class</code></strong>。</p>
<p>基本語法：</p>
<pre><code class="language-cpp">
class ClassName {
public:
    // 公有成員 (資料和函式)
protected:
    // 保護成員 (資料和函式)
private:
    // 私有成員 (資料和函式)
};
</code></pre>

<p>雖然 <code>struct</code> 在 C++ 中也幾乎等同於 <code>class</code> (主要預設存取權限不同：<code>struct</code> 預設 <code>public</code>，<code>class</code> 預設 <code>private</code>)，並且也可以用來實現物件導向的許多方面，但當明確談論「宣告一個類別」以支援完整的物件導向功能 (特別是強調封裝時預設為私有) 時，<code>class</code> 是更慣用和直接的關鍵字。</p>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) object：</strong><code>object</code> 不是 C++ 中用於宣告類別的關鍵字。物件是類別的實例。</li>
    <li><strong>(B) struct：</strong>可以用於定義類似類別的結構，但在 C++ 中，<code>class</code> 是更典型地用於表示物件導向中的「類別」概念，特別是當預設成員為私有是期望行為時。題目問的是宣告「類別」。</li>
    <li><strong>(C) define：</strong><code>#define</code> 是一個前置處理指令，用於定義巨集，通常用於建立符號常數或簡單的程式碼替換，不是用來宣告類別。</li>
    <li><strong>(D) class：</strong>正確。<code>class</code> 是 C++ 中用於宣告類別的關鍵字。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>要在 C++ 程式中宣告一個類別，需使用 <code>class</code> 關鍵字。</p>
HTML
    ],
    [
        'id_suffix' => '24',
        'question_text' => '24. 有關 C/C++語言的敘述，下列何者正確？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)C 和 C++語言都支援物件導向功能'],
            ['key' => 'B', 'text' => '(B)C  語言沒有字串(string)資料型別'],
            ['key' => 'C', 'text' => '(C)C++語言不支援函式重載'],
            ['key' => 'D', 'text' => '(D)C  是低階語言，C++是高階語言'],
        ],
        'correct_answer' => 'B',
        'explanation_html' => <<<HTML
<h4>詳解</h4>
<p><strong>1. 關鍵概念：C 與 C++ 語言特性比較</strong></p>
<ul>
    <li><strong>物件導向功能：</strong>
        <ul>
            <li><strong>C++：</strong>是一種支援多種程式設計範式的語言，包括物件導向程式設計 (OOP)。它提供了類別 (class)、繼承、多型、封裝等 OOP 核心特性。</li>
            <li><strong>C：</strong>是一種程序導向語言，不直接內建支援物件導向的核心特性。雖然可以用 C 語言模擬某些 OOP 概念 (例如使用結構和函式指標)，但這不是語言的原生支援。</li>
        </ul>
    </li>
    <li><strong>字串 (string) 資料型別：</strong>
        <ul>
            <li><strong>C：</strong>沒有內建的 <code>string</code> 資料型別關鍵字。在 C 語言中，字串通常表示為以空字元 (<code>\\0</code>) 結尾的字元陣列 (<code>char[]</code> 或 <code>char*</code>)。操作字串需要使用 <code>&lt;string.h&gt;</code> 中的函式 (如 <code>strcpy</code>, <code>strlen</code>)。</li>
            <li><strong>C++：</strong>除了支援 C 風格的字元陣列字串外，C++ 標準函式庫還提供了一個強大的 <code>std::string</code> 類別 (在 <code>&lt;string&gt;</code> 標頭檔中)，它提供了更方便和安全的字串操作。</li>
        </ul>
    </li>
    <li><strong>函式重載 (Function Overloading)：</strong>
        <ul>
            <li><strong>C++：</strong>支援函式重載，允許定義多個同名但參數列表不同的函式。</li>
            <li><strong>C：</strong>不支援函式重載。每個函式名稱在 C 中通常必須是唯一的 (考慮連結時的名稱)。</li>
        </ul>
    </li>
    <li><strong>語言級別 (Low-level vs. High-level)：</strong>
        <ul>
            <li><strong>C：</strong>通常被認為是一種中階語言 (middle-level language)。它提供了接近硬體的低階操作能力 (如指標操作、位元運算)，同時也具有高階語言的結構化特性。</li>
            <li><strong>C++：</strong>也是一種中階到高階的語言。它繼承了 C 的低階能力，並增加了許多高階抽象特性，如物件導向、泛型程式設計 (模板) 等。</li>
            <li>將 C 嚴格定義為「低階」而 C++ 為「高階」可能過於簡化。兩者都具有跨越不同抽象層次的能力。但 C 相對更接近硬體一些。</li>
        </ul>
    </li>
</ul>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) C 和 C++語言都支援物件導向功能：</strong>錯誤。C 語言不直接支援物件導向功能；C++支援。</li>
    <li><strong>(B) C 語言沒有字串(string)資料型別：</strong>正確。C 語言沒有像 C++ <code>std::string</code> 那樣的內建字串型別關鍵字，而是使用字元陣列來表示字串。</li>
    <li><strong>(C) C++語言不支援函式重載：</strong>錯誤。C++明確支援函式重載。</li>
    <li><strong>(D) C 是低階語言，C++是高階語言：</strong>這個分類比較模糊且不完全準確。兩者都可視為中階語言，具有不同程度的低階和高階特性。C 更偏向低階一些，但並非純粹的低階語言 (如組合語言)。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>敘述「(B) C 語言沒有字串(string)資料型別」是正確的。C 語言使用以 null 結尾的字元陣列來處理字串，而不是擁有一個內建的 <code>string</code> 關鍵字型別。</p>
HTML
    ],
    [
        'id_suffix' => '25',
        'question_text' => '25. C++語言的 this 關鍵字，表示指向物件本身的指標，要經由 this 存取自身的資料成員，需使用哪一個運算子？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)「.」'],
            ['key' => 'B', 'text' => '(B)「*」'],
            ['key' => 'C', 'text' => '(C)「->」'],
            ['key' => 'D', 'text' => '(D)「::」'],
        ],
        'correct_answer' => 'C',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：<code>this</code> 指標</strong></p>
<p>在 C++ 類別的非靜態成員函式中，<code>this</code> 是一個特殊的隱含指標。它儲存了呼叫該成員函式的物件的記憶體位址。換句話說，<code>this</code> 指向物件本身。</p>
<p>由於 <code>this</code> 是一個<strong>指標</strong>，要透過它來存取物件的成員 (資料成員或成員函式)，需要使用適用於指標的成員存取運算子。</p>
<p>存取指標所指向物件的成員有兩種方式：</p>
<ol>
    <li><strong>箭頭運算子 (<code>-&gt;</code>)：</strong>這是專門用於透過指標存取物件成員的運算子。如果 <code>ptr</code> 是一個指向物件的指標，而 <code>member</code> 是該物件的一個成員，則可以使用 <code>ptr-&gt;member</code>。</li>
    <li><strong>解參考與點運算子 (<code>(*ptr).member</code>)：</strong>首先使用解參考運算子 <code>*</code> 獲取指標 <code>ptr</code> 所指向的物件本身 (即 <code>*ptr</code>)，然後再使用點運算子 <code>.</code> 來存取該物件的成員。</li>
</ol>
<p>對於 <code>this</code> 指標，這兩種形式都可以使用：</p>
<ul>
    <li><code>this-&gt;data_member</code></li>
    <li><code>(*this).data_member</code></li>
</ul>
<p>其中，<code>this-&gt;data_member</code> 是更常見和更簡潔的寫法。</p>

<p><strong>2. 選項分析：</strong></p>
<ul>
    <li><strong>(A) 「.」 (點運算子)：</strong>點運算子用於直接透過物件變數本身 (而不是指向物件的指標) 來存取其成員。例如，如果 <code>obj</code> 是一個物件，則 <code>obj.member</code>。</li>
    <li><strong>(B) 「*」 (星號/解參考運算子)：</strong>單獨使用 <code>*</code> 主要是解參考指標以獲得其指向的物件。例如，<code>*this</code> 會得到物件本身。之後還需要配合點運算子才能存取成員，如 <code>(*this).member</code>。題目問的是「經由 this 存取...需使用哪一個運算子」，暗示一個直接的運算子。</li>
    <li><strong>(C) 「->」 (箭頭運算子)：</strong>正確。箭頭運算子專門用於透過指標 (如 <code>this</code>) 來存取物件的成員。</li>
    <li><strong>(D) 「::」 (範疇解析運算子)：</strong>範疇解析運算子用於指定命名空間或類別的範疇，例如存取靜態成員 (<code>ClassName::static_member</code>) 或在類別外部定義成員函式 (<code>ClassName::functionName()</code>)。它不用於透過 <code>this</code> 指標存取實例成員。</li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>要經由 <code>this</code> 指標存取物件自身的資料成員，需使用箭頭運算子 <code>-&gt;</code> (或者較不直接的 <code>(*this).</code> 組合)。在給定選項中，<code>-&gt;</code> 是最直接和正確的答案。</p>
HTML
    ],
    [
        'id_suffix' => '26',
        'question_text' => '26. 小智宣告一個 C++的類別 pcb，下列哪個選項是其建構子的實作？',
        'code_snippet' => null,
        'run_code_id' => null,
        'code_snippet_for_runner' => null,
        'options' => [
            ['key' => 'A', 'text' => '(A)pcb::pcb(int){ . . }，'],
            ['key' => 'B', 'text' => '(B)int pcb::layout( ){ . . }，'],
            ['key' => 'C', 'text' => '(C)void pcb::route( ){ . . }，'],
            ['key' => 'D', 'text' => '(D)void pcb::import(int) { . . }，'],
        ],
        'correct_answer' => 'A',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：C++ 類別建構子 (Constructor)</strong></p>
<p>建構子是類別中一種特殊的成員函式，用於在創建物件時初始化物件。其主要特點：</p>
<ul>
    <li><strong>名稱與類別名相同：</strong>建構子的名稱必須與其所屬的類別名稱完全一致。</li>
    <li><strong>沒有回傳型別：</strong>建構子不宣告任何回傳型別，連 <code>void</code> 都不寫。</li>
    <li><strong>可以重載：</strong>一個類別可以有多個建構子，只要它們的參數列表不同。</li>
    <li><strong>自動呼叫：</strong>當創建類別的物件時，會自動呼叫對應的建構子。</li>
</ul>
<p>如果建構子是在類別定義的外部進行實作 (definition outside the class declaration)，則需要使用範疇解析運算子 <code>::</code> 來指明該函式屬於哪個類別。語法為：<code>ClassName::ClassName(parameters) { /* implementation */ }</code>。</p>

<p><strong>2. 選項分析：</strong></p>
<p>題目中提到類別名稱是 <code>pcb</code>。我們需要找到一個符合建構子特性的函式實作。</p>
<p>注意：選項中的 <code>..</code> 應理解為範疇解析運算子 <code>::</code>，這是 C++ 中在類別外定義成員函式時的標準語法。逗號 <code>，</code> 和句點 <code>．</code> 應為程式碼中的標準符號。</p>
<ul>
    <li><strong>(A) <code>pcb::pcb(int){ . . }</code>：</strong>
        <ul>
            <li>函式名稱 <code>pcb</code> 與類別名稱 <code>pcb</code> 相同。</li>
            <li>前面有 <code>pcb::</code> 指明這是 <code>pcb</code> 類別的成員。</li>
            <li>它有一個 <code>int</code> 型態的參數。</li>
            <li>它沒有宣告回傳型態。</li>
            <li>這完全符合一個帶參數建構子的定義形式 (在類別外部實作)。</li>
        </ul>
    </li>
    <li><strong>(B) <code>int pcb::layout( ){ . . }</code>：</strong>
        <ul>
            <li>函式名稱是 <code>layout</code>，與類別名稱 <code>pcb</code> 不同。</li>
            <li>它宣告了回傳型態 <code>int</code>。</li>
            <li>這是一個普通的成員函式，不是建構子。</li>
        </ul>
    </li>
    <li><strong>(C) <code>void pcb::route( ){ . . }</code>：</strong>
        <ul>
            <li>函式名稱是 <code>route</code>，與類別名稱 <code>pcb</code> 不同。</li>
            <li>它宣告了回傳型態 <code>void</code>。</li>
            <li>這是一個普通的成員函式，不是建構子。</li>
        </ul>
    </li>
    <li><strong>(D) <code>void pcb::import(int) { . . }</code>：</strong>
        <ul>
            <li>函式名稱是 <code>import</code>，與類別名稱 <code>pcb</code> 不同。</li>
            <li>它宣告了回傳型態 <code>void</code>。</li>
            <li>這是一個普通的成員函式，不是建構子。</li>
        </ul>
    </li>
</ul>

<p><strong>3. 結論：</strong></p>
<p>選項 (A) <code>pcb::pcb(int){ . . }</code> 描述了一個 <code>pcb</code> 類別的建構子 (帶有一個整數參數) 的實作。其名稱與類別名相同，且沒有回傳型態。</p>
HTML
    ],
    [
        'id_suffix' => '27',
        'question_text' => '27. 執行下列程式片段後的輸出為何？<pre><code class="language-cpp">class model{\nprivate:\n    int val[5];\npublic:\n    void setNum(int, int);\n    int getNum(int);\n};\nvoid model::setNum(int i, int num){\n    val[i] = num;\n}\nint model::getNum(int i){\n    return val[i];\n}\nint main(){\n    model m;\n    for (int i=0; i<5; i++){\n        m.setNum(i, i);\n    }\n    std::cout << m.getNum(4);\n}</code></pre>',
        'code_snippet' => "class model{\nprivate:\n    int val[5];\npublic:\n    void setNum(int, int);\n    int getNum(int);\n};\nvoid model::setNum(int i, int num){\n    val[i] = num;\n}\nint model::getNum(int i){\n    return val[i];\n}\nint main(){\n    model m;\n    for (int i=0; i<5; i++){\n        m.setNum(i, i); // val[0]=0, val[1]=1, ..., val[4]=4\n    }\n    // m.getNum(4) will return val[4], which is 4.\n    std::cout << m.getNum(4) << std::endl; // Added endl for clarity\n    return 0; // Added for completeness\n}",
        'run_code_id' => 'q27-code',
        'code_snippet_for_runner' => "#include <iostream>\n\nclass model{\nprivate:\n    int val[5]; // An array of 5 integers\npublic:\n    void setNum(int index, int num); // Sets value at specified index\n    int getNum(int index);          // Gets value from specified index\n};\n\n// Implementation of setNum\nvoid model::setNum(int i, int num){\n    if (i >= 0 && i < 5) { // Basic bounds checking\n        val[i] = num;\n    }\n}\n\n// Implementation of getNum\nint model::getNum(int i){\n    if (i >= 0 && i < 5) { // Basic bounds checking\n        return val[i];\n    }\n    return -1; // Or some error indicator if index is out of bounds\n}\n\nint main(){\n    model m; // Create an object of class model\n\n    // Loop to initialize the 'val' array within the object 'm'\n    for (int i=0; i<5; i++){\n        // m.setNum(0, 0) -> val[0] = 0\n        // m.setNum(1, 1) -> val[1] = 1\n        // m.setNum(2, 2) -> val[2] = 2\n        // m.setNum(3, 3) -> val[3] = 3\n        // m.setNum(4, 4) -> val[4] = 4\n        m.setNum(i, i);\n    }\n\n    // Call getNum(4) on object 'm'. This will return the value of val[4].\n    // From the loop, val[4] was set to 4.\n    std::cout << m.getNum(4) << std::endl;\n\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)1'],
            ['key' => 'B', 'text' => '(B)2'],
            ['key' => 'C', 'text' => '(C)3'],
            ['key' => 'D', 'text' => '(D)4'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：類別、物件、成員函式、陣列</strong></p>
<ul>
    <li><strong>類別 <code>model</code>：</strong>
        <ul>
            <li>有一個私有資料成員 <code>int val[5];</code>，這是一個包含 5 個整數的陣列。</li>
            <li>有兩個公有成員函式：
                <ul>
                    <li><code>void setNum(int i, int num)</code>：將傳入的 <code>num</code> 值設定到陣列 <code>val</code> 的第 <code>i</code> 個位置。</li>
                    <li><code>int getNum(int i)</code>：回傳陣列 <code>val</code> 中第 <code>i</code> 個位置的值。</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>

<p><strong>2. 程式碼執行追蹤：</strong></p>
<ol>
    <li><code>model m;</code>：創建一個 <code>model</code> 類別的物件 <code>m</code>。物件 <code>m</code> 內部會包含一個整數陣列 <code>val</code> (大小為 5)。</li>
    <li><code>for (int i=0; i<5; i++){ m.setNum(i, i); }</code>：這個迴圈執行 5 次，<code>i</code> 的值從 0 到 4。
        <ul>
            <li>當 <code>i = 0</code>：呼叫 <code>m.setNum(0, 0)</code>。這會執行 <code>val[0] = 0;</code>。</li>
            <li>當 <code>i = 1</code>：呼叫 <code>m.setNum(1, 1)</code>。這會執行 <code>val[1] = 1;</code>。</li>
            <li>當 <code>i = 2</code>：呼叫 <code>m.setNum(2, 2)</code>。這會執行 <code>val[2] = 2;</code>。</li>
            <li>當 <code>i = 3</code>：呼叫 <code>m.setNum(3, 3)</code>。這會執行 <code>val[3] = 3;</code>。</li>
            <li>當 <code>i = 4</code>：呼叫 <code>m.setNum(4, 4)</code>。這會執行 <code>val[4] = 4;</code>。</li>
        </ul>
        迴圈結束後，物件 <code>m</code> 內部的 <code>val</code> 陣列的狀態是：<code>val = {0, 1, 2, 3, 4}</code>。
    </li>
    <li><code>std::cout &lt;&lt; m.getNum(4);</code>：
        <ul>
            <li>呼叫物件 <code>m</code> 的 <code>getNum</code> 成員函式，並傳入參數 <code>4</code>。</li>
            <li><code>getNum(4)</code> 會執行 <code>return val[4];</code>。</li>
            <li>由於 <code>val[4]</code> 的值是 <code>4</code>，所以函式回傳 <code>4</code>。</li>
            <li><code>std::cout</code> 將輸出 <code>4</code>。</li>
        </ul>
    </li>
</ol>

<p><strong>3. 選項分析：</strong></p>
<ul>
    <li>(A) 1</li>
    <li>(B) 2</li>
    <li>(C) 3</li>
    <li>(D) 4：正確。</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>程式執行後的輸出為 4。</p>
HTML
    ],
    [
        'id_suffix' => '28',
        'question_text' => '28. 執行下列程式片段後的輸出為何？<pre><code class="language-cpp">class base{\nprivate:\n    int a, b;\n    void setA(int a){ this->a = a; }\n    void setB(int b){ this->b = b; }\npublic:\n    base(int, int);\n    void begin(int, int);\n    int getA();\n    int getB();\n};\nbase::base(int a, int b){\n    this->a = a;\n    this->b = b;\n}\nvoid base::begin(int a, int b){\n    setA(b); // Calls private setA with b (4), so this->a becomes 4\n    setB(a); // Calls private setB with a (3), so this->b becomes 3\n}\nint base::getA(){ return this->a; }\nint base::getB(){ return this->b; }\n\nint main(){\n    base B(1, 2); // B.a=1, B.b=2\n    B.begin(3, 4); // B.a becomes 4, B.b becomes 3\n    std::cout << B.getA() << std::endl;\n}</code></pre>',
        'code_snippet' => "class base{\nprivate:\n    int a, b;\n    void setA(int val_a){ this->a = val_a; }\n    void setB(int val_b){ this->b = val_b; }\npublic:\n    base(int init_a, int init_b);\n    void begin(int param_a, int param_b);\n    int getA();\n    int getB();\n};\nbase::base(int init_a, int init_b){\n    this->a = init_a;\n    this->b = init_b;\n}\nvoid base::begin(int param_a, int param_b){\n    setA(param_b); // this->a = param_b (4)\n    setB(param_a); // this->b = param_a (3)\n}\nint base::getA(){ return this->a; }\nint base::getB(){ return this->b; }\n\nint main(){\n    base B(1, 2); // Constructor: B.a = 1, B.b = 2\n    B.begin(3, 4); // begin(param_a=3, param_b=4)\n                   // Inside begin: setA(4) -> B.a becomes 4\n                   //             setB(3) -> B.b becomes 3\n    std::cout << B.getA() << std::endl; // Outputs B.a, which is 4\n    return 0; // Added\n}",
        'run_code_id' => 'q28-code',
        'code_snippet_for_runner' => "#include <iostream>\n\nclass base{\nprivate:\n    int a, b;\n    // Private helper methods to set a and b\n    void setA(int val_a){ \n        // std::cout << \"setA called with \" << val_a << std::endl;\n        this->a = val_a; \n    }\n    void setB(int val_b){ \n        // std::cout << \"setB called with \" << val_b << std::endl;\n        this->b = val_b; \n    }\n\npublic:\n    // Constructor\n    base(int init_a, int init_b);\n    // Public method\n    void begin(int param_a, int param_b);\n    // Getter methods\n    int getA();\n    int getB();\n};\n\n// Constructor implementation\nbase::base(int init_a, int init_b){\n    // std::cout << \"Constructor called: a=\" << init_a << \", b=\" << init_b << std::endl;\n    this->a = init_a;\n    this->b = init_b;\n}\n\n// begin method implementation\nvoid base::begin(int param_a, int param_b){\n    // std::cout << \"begin called: param_a=\" << param_a << \", param_b=\" << param_b << std::endl;\n    setA(param_b); // Calls this->setA(param_b). So, object's 'a' becomes param_b\n    setB(param_a); // Calls this->setB(param_a). So, object's 'b' becomes param_a\n}\n\n// getA method implementation\nint base::getA(){ \n    return this->a; \n}\n\n// getB method implementation\nint base::getB(){ \n    return this->b; \n}\n\nint main(){\n    base B(1, 2); // Create object B. Constructor sets B.a=1, B.b=2.\n                  // Current state: B.a = 1, B.b = 2\n\n    B.begin(3, 4); // Call begin method with param_a=3, param_b=4.\n                   // Inside B.begin(3, 4):\n                   //   setA(4) is called (since param_b is 4). This sets B.a to 4.\n                   //   setB(3) is called (since param_a is 3). This sets B.b to 3.\n                   // Current state: B.a = 4, B.b = 3\n\n    std::cout << B.getA() << std::endl; // Calls B.getA(), which returns B.a (which is 4).\n\n    return 0;\n}",
        'options' => [
            ['key' => 'A', 'text' => '(A)1'],
            ['key' => 'B', 'text' => '(B)2'],
            ['key' => 'C', 'text' => '(C)3'],
            ['key' => 'D', 'text' => '(D)4'],
        ],
        'correct_answer' => 'D',
        'explanation_html' => <<<HTML
<h4>詳解 (C++ Context)</h4>
<p><strong>1. 關鍵概念：類別、建構子、成員函式、<code>this</code> 指標</strong></p>
<ul>
    <li><strong>類別 <code>base</code>：</strong>
        <ul>
            <li>私有資料成員：<code>int a, b;</code></li>
            <li>私有成員函式：<code>void setA(int a)</code> 和 <code>void setB(int b)</code>。這些函式使用 <code>this-&gt;a = a;</code> 和 <code>this-&gt;b = b;</code> 來區分參數和資料成員，並設定資料成員的值。</li>
            <li>公有成員：
                <ul>
                    <li>建構子 <code>base(int a, int b)</code>：初始化物件的 <code>a</code> 和 <code>b</code> 成員。</li>
                    <li>成員函式 <code>void begin(int a, int b)</code>：呼叫私有的 <code>setA</code> 和 <code>setB</code>。</li>
                    <li>成員函式 <code>int getA()</code> 和 <code>int getB()</code>：回傳私有資料成員 <code>a</code> 和 <code>b</code> 的值。</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>

<p><strong>2. 程式碼執行追蹤：</strong></p>
<ol>
    <li><strong><code>base B(1, 2);</code></strong>
        <ul>
            <li>創建 <code>base</code> 類別的物件 <code>B</code>。</li>
            <li>呼叫建構子 <code>base::base(int a, int b)</code>，其中建構子的參數 <code>a</code> 為 1，參數 <code>b</code> 為 2。</li>
            <li>在建構子內部：
                <ul>
                    <li><code>this-&gt;a = a;</code> (即 <code>B.a = 1;</code>)</li>
                    <li><code>this-&gt;b = b;</code> (即 <code>B.b = 2;</code>)</li>
                </ul>
            </li>
            <li>此時，物件 <code>B</code> 的狀態是：<code>B.a = 1</code>, <code>B.b = 2</code>。</li>
        </ul>
    </li>
    <li><strong><code>B.begin(3, 4);</code></strong>
        <ul>
            <li>呼叫物件 <code>B</code> 的 <code>begin</code> 成員函式，其中 <code>begin</code> 的參數 <code>a</code> 為 3，參數 <code>b</code> 為 4。</li>
            <li>在 <code>base::begin(int a, int b)</code> 函式內部 (這裡的 <code>a</code> 是參數3, <code>b</code> 是參數4)：
                <ul>
                    <li><code>setA(b);</code>：呼叫物件 <code>B</code> 的私有成員函式 <code>setA</code>，並將 <code>begin</code> 的參數 <code>b</code> (值為 4) 傳遞給它。
                        <ul><li>在 <code>setA(int a)</code> 內部 (這裡 <code>setA</code> 的參數 <code>a</code> 是 4)：<code>this-&gt;a = a;</code> (即 <code>B.a = 4;</code>)。</li></ul>
                    </li>
                    <li><code>setB(a);</code>：呼叫物件 <code>B</code> 的私有成員函式 <code>setB</code>，並將 <code>begin</code> 的參數 <code>a</code> (值為 3) 傳遞給它。
                        <ul><li>在 <code>setB(int b)</code> 內部 (這裡 <code>setB</code> 的參數 <code>b</code> 是 3)：<code>this-&gt;b = b;</code> (即 <code>B.b = 3;</code>)。</li></ul>
                    </li>
                </ul>
            </li>
            <li>此時，物件 <code>B</code> 的狀態是：<code>B.a = 4</code>, <code>B.b = 3</code>。</li>
        </ul>
    </li>
    <li><strong><code>std::cout &lt;&lt; B.getA() &lt;&lt; std::endl;</code></strong>
        <ul>
            <li>呼叫物件 <code>B</code> 的 <code>getA</code> 成員函式。</li>
            <li><code>getA()</code> 函式回傳 <code>this-&gt;a</code> (即 <code>B.a</code>)。</li>
            <li>由於 <code>B.a</code> 的值現在是 <code>4</code>，所以輸出 <code>4</code>。</li>
        </ul>
    </li>
</ol>

<p><strong>3. 選項分析：</strong></p>
<ul>
    <li>(A) 1</li>
    <li>(B) 2</li>
    <li>(C) 3</li>
    <li>(D) 4：正確。</li>
</ul>

<p><strong>4. 結論：</strong></p>
<p>程式執行後的輸出為 4。</p>
HTML
    ],
];

$html_title = "C++ 物件導向進階測驗 (EE7-6)"; // Static title for this specific quiz page

?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($html_title); ?></title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&family=Source+Code+Pro:wght@400;500&display=swap" rel="stylesheet">
    <script>
    MathJax = {
      tex: {
        inlineMath: [['$', '$'], ['\\(', '\\)']],
        displayMath: [['$$', '$$'], ['\\[', '\\]']]
      }
    };
    </script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</head>
<body>
    <nav class="simple-nav">
        <a href="index.php">返回主頁</a>
        | <a href="ee7-1.php">EE7-1 C++ OOP測驗 I</a>
        | <a href="ee7-5.php">EE7-5 C/C++綜合測驗</a>
        | EE7-6 C++ OOP測驗 II (本頁)
    </nav>
    <div class="container">
        <main class="tutorial-content">
            <h1>C++ 物件導向進階測驗 (EE7-6)</h1>
            <p>本頁面包含一系列 C++ 物件導向程式設計的進階練習題，涵蓋類別、物件、繼承、建構子、解構子、this 指標、封裝等重要概念。請仔細研讀每個題目和程式碼片段，並利用右側的沙箱進行實作與驗證。</p>

            <div class="quiz-section" id="quiz-section-dynamic">
                <h2>C++ 物件導向進階練習題組 (EE7-6)</h2>
                <p>請挑戰下面的題目，檢驗您的 C++ OOP 知識！ (共 <?php echo count($current_exercises); ?> 題)</p>

                <?php foreach ($current_exercises as $index => $exercise): ?>
                    <div id="q<?php echo htmlspecialchars($exercise['id_suffix']); ?>" class="quiz-card">
                        <h3><?php
                            $q_text = $exercise['question_text'];
                            // Check if the question text itself contains the pre-formatted code block.
                            if (preg_match('/(<pre><code[^>]*>)(.*?)(<\\/code><\\/pre>)/s', $q_text, $matches)) {
                                // Part 1: Text before the <pre><code> block
                                // To get text before, we can find the position of the <pre> tag
                                $prePos = strpos($q_text, $matches[0]);
                                $before_text = substr($q_text, 0, $prePos);
                                echo nl2br(htmlspecialchars(trim($before_text)));

                                // Part 2: The <pre><code> block itself
                                $code_content_from_question = str_replace("\\n", "\n", $matches[2]);
                                echo $matches[1] . htmlspecialchars($code_content_from_question) . $matches[3];

                                // Part 3: Text after the <pre><code> block (if any)
                                $after_text = substr($q_text, $prePos + strlen($matches[0]));
                                echo nl2br(htmlspecialchars(trim($after_text)));

                            } else {
                                // No <pre><code> block in question_text, treat as plain text.
                                echo nl2br(htmlspecialchars($q_text));
                            }
                        ?></h3>

                        <?php
                        // This block is for a SEPARATE 'code_snippet' field in the PHP array.
                        // It's used if a question has a dedicated code block separate from the main question text.
                        // We ensure not to duplicate if the main question_text itself already rendered a <pre><code> block (handled above).
                        if (!empty($exercise['code_snippet']) && (strpos($exercise['question_text'], '<pre><code') === false)) :
                            // For separate code_snippets, ensure \n are actual newlines for <pre>
                            $formatted_snippet = str_replace("\\n", "\n", $exercise['code_snippet']);
                        ?>
                            <pre><code class="language-cpp"><?php echo htmlspecialchars($formatted_snippet); ?></code></pre>
                        <?php endif; ?>

                        <?php if (!empty($exercise['run_code_id']) && !empty($exercise['code_snippet_for_runner'])): ?>
                            <button class="run-example-btn" data-code-id="<?php echo htmlspecialchars($exercise['run_code_id']); ?>">運行示例</button>
                        <?php endif; ?>

                        <div class="quiz-options" data-correct="<?php echo htmlspecialchars($exercise['correct_answer']); ?>">
                            <?php foreach ($exercise['options'] as $option): ?>
                                <div class="option" data-option="<?php echo htmlspecialchars($option['key']); ?>">
                                    <?php echo str_replace('&amp;','&', htmlspecialchars($option['text'])); // Allow & but escape others ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="explanation">
                            <?php echo $exercise['explanation_html']; // HTML is already structured ?>
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
                    <h3>C++ 程式碼沙箱 (WASM)</h3> <!-- Updated title for C++ context -->
                    <textarea id="code-editor" spellcheck="false">/* 點擊題目下方的「運行示例」按鈕以載入程式碼，或在此處編寫您自己的 C++ 程式碼。 */</textarea>
                    <div class="sandbox-controls">
                        <button id="run-code-btn">編譯與執行</button>
                    </div>
                    <pre id="output-area" aria-live="polite">輸出結果將顯示於此...</pre>
                </div>
            </div>
        </aside>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    <script src="script.js"></script>
    <script>
        window.pageCodeSamples = {
            <?php
            $runnable_samples_ee7_6 = [];
            if (isset($current_exercises) && is_array($current_exercises)) {
                foreach ($current_exercises as $exercise) {
                    if (!empty($exercise['run_code_id']) && !empty($exercise['code_snippet_for_runner'])) {
                        $escaped_code = str_replace(["\r\n", "\n", "\r"], "\\n", addslashes($exercise['code_snippet_for_runner']));
                        $runnable_samples_ee7_6[] = "'" . addslashes($exercise['run_code_id']) . "': \"" . $escaped_code . "\"";
                    }
                }
            }
            echo implode(",\n            ", $runnable_samples_ee7_6);
            if (empty($runnable_samples_ee7_6)) {
                 echo "'q_default_sample_ee7_6': \"#include <iostream>\\n\\nint main() {\\n    std::cout << \\\"Hello, C++ world! EE7-6\\\" << std::endl;\\n    return 0;\\n}\"";
            }
            ?>
        };

        // Initialize the first code sample in the editor if pageCodeSamples is not empty
        document.addEventListener('DOMContentLoaded', function() {
            const codeEditor = document.getElementById('code-editor');
            if (window.pageCodeSamples && Object.keys(window.pageCodeSamples).length > 0) {
                const firstSampleKey = Object.keys(window.pageCodeSamples)[0];
                if (window.pageCodeSamples[firstSampleKey]) {
                    codeEditor.value = window.pageCodeSamples[firstSampleKey];
                }
            } else {
                 codeEditor.value = "// No runnable C++ examples specifically for this page. Write your code here.";
            }
        });
    </script>
</body>
</html>
