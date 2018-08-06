<?php
if(isset($_POST['submit'])){
    //echo "Working";
    $fname= $_POST['firstname'];
    $lname= $_POST['lastname'];

    $form_data = array(
        'firstname'=>$fname,
        'lastname'=>$lname);
        // echo "<pre>";
        // print_r($form_data);exit();

        $str= http_build_query($form_data);
        $ch= curl_init("http://localhost/Curl_php/store.php");
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$str);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE );
        $output=curl_exec($ch);
        curl_close($ch);
        //echo $output;
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curl Example</title>
</head>
<body>
    <div>
    <?php
        if(isset($output)){
            echo $output;
        }
    ?>
    </div>
    <div align="center">
        <form method="post" >
            <p><strong>FirstName</strong></br>
                <input type="text" name="firstname" id="firstname">
            </p>
            <p><strong>LastName</strong></br>
                <input type="text" name="lastname" id="lastname">
            </p>
            <p><input type="submit" name="submit" value="Submit"></p>
        </form>
    </div>
</body>
</html>