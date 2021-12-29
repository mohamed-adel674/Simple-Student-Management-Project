<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>school</title>
    <style>
    body{
        background-color: whitesmoke;
        font-family: 'Poppins', sans-serif;
    }
    #mother{
        width: 100%;
        font-size: 20px;
    }
    main{
        float: right;
        border: 1px solid gray;
        padding: 5px;
    }
    input{
        padding: 4px;
        border: 2px solid black;
        text-align: center;
        font-size: 17px;
        font-family: 'Poppins', sans-serif;
    }

    aside{
        text-align: center;
        width: 300px;
        float: left;
        border: 1px solid black;
        padding: 10px;
        font-size: 20px;
        background-color: silver;
        color: blue;
    }
    #tbl{
        width: 890px;
        font-size: 20px;
        text-align: center;
    }
    #tbl:hover{
        background-color: green;
    }

    #tbl th{
        background-color: silver;
        color: black;
        font-size: 20px;
        padding: 10px;
        text-align: center;
    }
    

    aside button{
        width: 190px;
        padding: 8px;
        margin-top: 7px;
        font-size: 17px;
        font-family: 'Poppins', sans-serif;
        font-weight: bold;
    }
    </style>

</head>
<body dir="rtl">
        <?php
            #الاتصال بقاعده البيانات
            $host='localhost';
            $user='root';
            $pass='';
            $db='student';
            $con= mysqli_connect($host, $user, $pass, $db);
            $res=mysqli_query($con,"select * from student");

            #button variable --
            $id='';
            $name='';
            $address='';
            if(isset($_POST['id'])){
                $id=$_POST['id'];
            }
            if(isset($_POST['name'])){
                $name= $_POST['name'];
            }
            if(isset($_POST['address'])){
                $address= $_POST['address'];
            }
            $sqls='';
            if(isset($_POST['add'])){
                $sqls="insert into student value($id, '$name', '$address')";
                mysqli_query($con, $sqls);
                header("location: home.php");
            }
            if(isset($_POST['del'])){
                $sqls= "delete from student where name='$name'";
                mysqli_query($con,$sqls);
                header("location: home.php");
            }



        ?>
    <div id="mother">
    <form method="POST">
    <!-- لوحه التحكم-->
    <aside>
        <div id="div">
        <img src="https://www.pinclipart.com/picdir/big/575-5755003_happy-graduation-student-png-download-image-cartoon-graduate.png" alt="لوجو الموقع" width="200">
        <h3>Admin panel</h3>
        <label>Student ID :</label><br>
        <input type="text" name="id" id="id"><br>
        <label>student's name :</label><br>
        <input type="text" name="name" id="name"><br>
        <label>Student's address:</label><br>
        <input type="text" name="address" id="address"><br><br>
        <button name="add" > add student</button>
        <button name="del" > delete student</button> 
        </div>
    </aside>
    <!--عرض بيانات الطلاب-->
    <main>
    <table id="tbl" >
    <tr>
    <th>Serial Number</th>
    <th>student name </th>
    <th>Student address</th>
    </tr>
    <?php
    while ( $row = mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<tr>";
    }
    
    
    ?>
    </table>
    </main>
    </form>
    </div>
</body>
</html>
