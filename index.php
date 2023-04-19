<?php

    $name = $_POST["name"];
    $email = $_POST["email"];
    $contents = $_POST["contents"];

    echo "入力内容をご確認ください。<br>";
    echo "<hr>";
    echo "お名前：{$name}<br>";
    echo "Email：{$email}<br>";
    echo "問い合わせ内容：{$contents}<br>";

    // try{
    //     $dbh = new PDO($dsn,$user,$pass,[
    //         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    //     ]);
    // }catch(PDOException $e){
    //     echo '接続失敗'. $e->getMessage();
    //     exit();
    // };

    // return $dbh;

    $dsn ='mysql:host=localhost;dbname=contact_app;charset=utf8';
    $user = 'blog_user';
    $pass = 'pw57245724';

    try {
        $dbh = new PDO($dsn,$user,$pass,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }catch(PEDException $e){
        echo '接続失敗'. $e->getMessage();
        exit();
    };

    // $dbh->beginTransaction();
    // try {
    //     $stmt = $dbh->prepare($sql);
    //     $stmt->bindValue(':title',$blogs['title'],PDO::PARAM_STR);
    //     $stmt->bindValue(':content',$blogs['content'],PDO::PARAM_STR);
    //     $stmt->bindValue(':category',$blogs['category'],PDO::PARAM_STR);
    //     $stmt->bindValue(':publish_status',$blogs['publish_status'],PDO::PARAM_STR);
    //     $stmt->execute();
    //     $dbh->commit();
    // } catch(PDOException $e) {
    //     $dbh->rollBack();
    //     exit($e);
    // }

    $sql = "INSERT INTO contact(name, email, contents) VALUES ('aaa', 'bbb', 'ccc')";

    $dbh->beginTransaction();
    try {
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $dbh->commit();
    } catch(PDOException $e) {
        $dbh->rollBack();
        exit($e);
    }

?>
