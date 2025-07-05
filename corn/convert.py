import os
import markdown

# 創建 'pages' 目錄（如果不存在）
if not os.path.exists('pages'):
    os.makedirs('pages')

# HTML 模板
html_template = """
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        {content}
        <a href="../index.html" class="back-link">返回首頁</a>
    </div>
</body>
</html>
"""

# 獲取當前目錄下所有的 Markdown 檔案
files = [f for f in os.listdir('.') if f.endswith('.md') and f.startswith('W')]

# 對每個檔案進行轉換
for filename in files:
    with open(filename, 'r', encoding='utf-8') as f:
        md_content = f.read()

    # 從檔案名中提取標題
    title = os.path.splitext(filename)[0].split('_')[1]
    
    # 將 Markdown 轉換為 HTML，並啟用表格擴充
    html_content = markdown.markdown(md_content, extensions=['tables'])
    
    # 格式化完整的 HTML 頁面
    full_html = html_template.format(title=title, content=html_content)
    
    # 建立新的 HTML 檔案名
    new_filename = os.path.splitext(filename)[0] + '.html'
    
    # 將轉換後的內容寫入 'pages' 目錄
    with open(os.path.join('pages', new_filename), 'w', encoding='utf-8') as f:
        f.write(full_html)

print(f"成功轉換 {len(files)} 個檔案！")
