<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C語言互動學習</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* 可以在這裡添加一些針對index.php的特定微調樣式，但主要樣式依賴style.css */
        body {
            font-family: 'Arial', '微軟正黑體', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .main-nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0 0 20px 0;
            background-color: #333;
            overflow: hidden;
        }
        .main-nav li {
            float: left;
        }
        .main-nav li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .main-nav li a:hover {
            background-color: #111;
        }
        .chapter-content {
            margin-bottom: 40px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .chapter-content h2 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .teaching-material {
            margin-bottom: 30px;
        }
        .exercises h3 {
            color: #555;
            margin-top: 30px;
            border-top: 1px dashed #ccc;
            padding-top: 20px;
        }
        /* 更多樣式將在style.css中定義 */
    </style>
</head>
<body>
    <div class="container">




        <nav class="main-nav">
            <ul>
                <li><a href="#chapter2">第二章 常數與變數</a></li>
                <li><a href="#chapter3">第三章 運算式與敘述</a></li>
                <li><a href="#chapter4">第四章 迴圈</a></li>
                <li><a href="#chapter5">第五章 陣列與指標</a></li>
                <li><a href="#chapter6">第六章 函式</a></li>
                <li><a href="#chapter7">第七章 結構與類別</a></li>
            </ul>
        </nav>

        <main>
            <!-- 章節內容將通過PHP動態載入或直接在此處填充 -->
            <div id="chapter2" class="chapter-content">
                <h2>第二章 資料型態、常數與變數</h2>
                <div class="teaching-material">
                    <!-- PHP 將在此處載入教學內容 -->
                  <p><a href="chap2.html">第二章教學內容</a></p>
                </div>
                <div class="exercises">

                    <!-- PHP 將在此處載入練習題 -->
                    <p><a href="bbb2-1-OK.php">第二章練習題</a></p>
                </div>
            </div>

            <div id="chapter3" class="chapter-content">
                <h2>第三章 運算元、運算式與敘述</h2>
                <div class="teaching-material">
                    <p><a href="chap3.html">第三章教學內容</a></p>
                    <p><a href="3-add1.html">第三章 補充資料1 - 短路求值 </a></p>
                    <p><a href="3-add2.html">第三章 補充資料2 - ++--練習題 </a></p>
                </div>
                <div class="exercises">

                    <p><a href="3-3-OK.php">第三章練習題</a></p>
                </div>
            </div>

            <div id="chapter4" class="chapter-content">
                <h2>第四章 流程指令與迴圈</h2>
                <div class="teaching-material">
                    <p><a href="chap4.html">第四章教學內容</a></p>
                </div>
                <div class="exercises">

                  <p><a href="4a-2-OK.php">第四章練習題1</a></p>
                  <p><a href="4b-2-OK.php">第四章練習題2</a></p>
                  <p><a href="4c.php">第四章練習題3</a></p>
                </div>
            </div>

            <div id="chapter5" class="chapter-content">
                <h2>第五章 陣列與指標</h2>
                <div class="teaching-material">
                    <p><a href="chap5.html">第五章教學內容</a></p>
                    <p><a href="chap5-add1.html">第五章 補充內容1</a></p>
                    <p><a href="chap5-add2.html">第五章 補充內容2</a></p>
                    <p><a href="chap5-add3.html">第五章 補充內容3</a></p>
                    <p><a href="chap5-add4.html">第五章 補充內容4</a></p>

              </div>
                <div class="exercises">

                    <p><a href="5a-2-OK.php">第5-1練習題</a></p>
                    <p><a href="5b-2.php">第5-2練習題</a></p>
				  <p><a href="5c-2-OK.php">第5-3練習題</a></p>
                </div>
            </div>

            <div id="chapter6" class="chapter-content">
                <h2>第六章 函式</h2>
                <div class="teaching-material">
                    <p><a href="chap6.html">第六章教學內容</a></p>
                    <p><a href="chap6-add1.html">第六章 補充內容1</a></p>
                    <p><a href="chap6-add2.html">第六章 補充內容1</a></p>
                </div>
                <div class="exercises">
                    <p><a href="6a-2.php">第6-1練習題</a></p>
                  <p><a href="6b-2.php">第6-2練習題</a></p>
                </div>
            </div>

            <div id="chapter7" class="chapter-content">
                <h2>第七章 結構與類別</h2>
                <div class="teaching-material">
                    <p><a href="chap7.html">第七章教學內容</a></p>
                </div>
                <div class="exercises">

                  <p><a href="ff7-1-OK.php">第七章練習題</a></p>
                </div>
            </div>
        </main>

        <footer>
            <p>&copy; <?php echo date("Y"); ?> C語言互動學習</p>
        </footer>
    </div>

    <script src="script.js"></script>
    <script src="script2.js"></script> </body>
</html>
