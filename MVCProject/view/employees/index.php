<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Employee</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Employee Form</h1>
        <hr>
        <form action="http://localhost/MVCProject/Employees/crud" method="POST">
            <label>ID: <input type="number" name="idEmployee" value="<?php echo $this->idEmployee ?>"></label>
            <label>Name: <input type="text" name="nameEmployee" value="<?php echo $this->nameEmployee ?>"></label>
            <label>Time Hired: <input type="date" name="timeHiredEmployee" value="<?php echo $this->timeHiredEmployee ?>"></label>
            <br><br>
            <input type="submit" value="select" name="action">
            <input type="submit" value="insert" name="action">
            <input type="submit" value="update" name="action">
            <input type="submit" value="delete" name="action">
            <input type="submit" value="select all" name="action">
           
            
        </form>
        <?php  echo '<br>'.$this->massage ?>
        
    </body>
</html>
