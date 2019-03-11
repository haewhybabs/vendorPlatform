<?php
//This file is a template for sending email
?>
<!DOCTYPE html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext" rel="stylesheet">
     <style>
      
        body{
            font-family: 'Didact Gothic', sans-serif;
            font-size: 90%;
        }
        #footer { 
            position: fixed;
            bottom: 0px;
            width: 100%;
            border-top: 3px solid #000;
            text-align: center;
            color: #000;
            font-size: 80%;
            font-style: italic;
        }
        #company{
            text-align: center;
        }
        #company img{
            height: 150px;
            width: 200px;
        }
        .details-box{
           
            padding: 10px;
        }
        .header{
            background-color: #eee;
            text-align: center;
            padding: 10px;
            font-size: 120%;
        }
        
        #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
       
    </style>
</head>
<body>
    <div id="company">
        <img src="http://e-procure.lfcww.org/assets/global/images/logo/new_logo.jpg" alt="LFC logo" >
    </div>
    <h5 class="header"> Purchase Order</h5>
    <p>APPROVED BY: &nbsp; </p>
    <p>Date of Issue: &nbsp; </p>
    <p>EXPECTED DATE OF DELIVERY: &nbsp;</p>
    <p>PRODUCT CATEGORIES: &nbsp;</p>
    <p>ORGANIZATION NAME: <?php  echo $vendor[0]->company_name;?></p>
    <?php // var_dump($reqdetails); ?>
    <div class="details-box">
        <table id="customers">
           <tr>
            <th>QUANTITY</th>
               <th>PRODUCT</th>
            <th>DESCRIPTION</th>
            <th>UNIT PRICE</th>
            <th>TOTAL</th>
            </tr>
            <?php

            foreach ($reqdetails as $req){
            // var_dump($select);

                ?>
                        <tr>
                          <td><?php echo $req->quantity; ?></td>
                            <td><?php echo $req->name;?></td>
                          <td><?php echo $req->specification; ?></td>
                          <td><?php echo number_format($req->price); ?></td>
                           <td><?php echo number_format($req->price * $req->quantity); ?></td>
                        </tr>
                    <?php } ?>
        </table>
    </div>
    <p></p>
   
    <div id="footer">
       <p>Login here <a href="http://procure.lfcww.org/">Living Faith Admin. Portal Login</a></p>
    </div>
</body>

