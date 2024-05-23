<?php
    include("config.php");
    
    $conn->query("drop table if exists cart") or die("something went wrong while dropping table users");
    $conn->query("drop table if exists order_product") or die("something went wrong while dropping table users");
    $conn->query("drop table if exists products") or die("Something went wrong while dropping table products");
    $conn->query("drop table if exists orders") or die("something went wrong while dropping table users");
    $conn->query("drop table if exists users") or die("something went wrong while dropping table users");

    $sql = "CREATE TABLE if not exists products (
            id int primary key auto_increment,
            name varchar(50) not null,
            price int not null,
            image varchar(50)
        )";
    $conn->query($sql) or die("table products creation failed");
    $conn->query("insert into products(name,price,image) values('asdfasdf',1234,'http://localhost/img/grafitti2.jpg')") or die("inserting value failed in table products");

    $conn->query("CREATE TABLe if not exists users (
            id int primary key auto_increment,
            firstName varchar(50) not null,
            lastName varchar(50) not null,
            username varchar(50) not null,
            password varchar(255) not null,
            phoneNumber varchar(10) not null,
            email varchar(50) not null,
            address varchar(50) not null,
            role varchar(50) not null
        )") or die("table users creation failed");

    $password = md5("admin");
    $conn->query("insert into users(firstName,lastName,username,password,phoneNumber,email,address,role) values('adsf','adsfsdf','admin','$password','981233123','asdfdsf@gmail.com','asdfsd123','admin')");
    $conn->query("CREATE table if not exists cart(
        id int primary key auto_increment,
        bid int(11) not null,
        uid int(11) not null,
        quantity int default 1,
        foreign key (bid) references products(id),
        foreign key (uid) references users(id))
        ");
    $conn->query("CREATE TABLE IF NOT EXISTS orders ( 
            id int primary key auto_increment,
            uid int(11) not null,
            total_price int(50) not null,
            foreign key (uid) references users(id))
        ");

    $conn->query("CREATE TABLE IF NOT EXISTS order_product(
            id int primary key auto_increment,
            oid int(11) not null,
            bid int(11) not null,
            quantity int(11) not null,
            
            foreign key (oid) references orders(id),
            foreign key (bid) references products(id)
        )");
    echo "<p style='font-size:50px;color:green;text-align:center;'>Success</p>"
?>