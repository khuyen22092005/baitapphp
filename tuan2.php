<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài Tập Tuần 2</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #89f7fe, #66a6ff);
            margin: 0;
            padding: 40px;
        }
        .container {
            background: white;
            max-width: 500px;
            margin: auto;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.15);
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }
        h1 {
            color: #222;
            font-size: 28px;
            margin-bottom: 20px;
        }
        .btn {
            display: block;
            background-color: #4facfe;
            background-image: linear-gradient(to right, #4facfe, #00f2fe);
            color: white;
            padding: 15px;
            margin: 12px 0;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Bài Tập Tuần 2</h1>
    <a href="get-post.php" class="btn">📄 Bài tập trên lớp</a>
    <a href="bai1.php" class="btn">📄 Bài 1</a>
    <a href="bai2.php" class="btn">📄 Bài 2</a>
    <a href="bai3.php" class="btn">📄 Bài 3</a>
</div>
</body>
</html>
