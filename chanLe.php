<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .kqNumber, .kqString {
            margin-top: 10px;
            font-size: 18px;
            color: #333;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }

        .kqString {
            font-weight: bold;
            color: #007BFF;
        }
    </style>
</head>
<body>
    <?php error_reporting(0) ;
        function Ok($hk1, $hk2,$year) {
            $sum = 0;
            if ($year==1) {
                $sum = ($hk1+($hk2*3))/3;
            } else if ($year== 2) {
                $sum = ($hk1+($hk2*3))/4;
            }
            return $sum;
        }
        $s1 = $_POST['S1'];
        $s2 = $_POST['S2'];
        $y = $_POST['year'];
        $kq = Ok($s1, $s2, $y);
        function display($result):void  {
            if ($result>=8) {
                echo "Học sinh Giỏi";
            } else if ($result>=6.5) {
                echo "Học sinh Khá";
            } else if ($result>=5) {
                echo "Học sinh Trung bình";
            } else {
                echo "Học LẠI";
        }}
    ?>
    <form method="post" action="chanLe.php">
        <h1>Bảng điểm của em</h1>
        Semester 1: <input type="number" name="S1"><br/>
        Semester 2: <input type="number" name="S2"><br/>
        Year: <select name="year">
            <option value = "1" name="year">1</option>
            <option value = "2" name="year">2</option>
        </select><br>
        <input type="submit" value="Sunbmit">
        <p class="kqNumber">
            Summarise: 
            <?php 
             echo $kq;
             ?>
        </p>
        <p class="kqString">
           <?php  $KQ = display($kq);
                   echo $KQ; ?>
        </p>
    </form>
</body>
</html>