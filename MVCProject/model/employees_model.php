<?php

class employees_model extends Model {

    function __construct() {
        parent::__construct();
    }

    function tojson($pretty = false) {
        $json = json_encode($this->result, JSON_PRETTY_PRINT);
        if ($pretty) {
            $json = '<pre>' . $json . '</pre>';
        }
        return $json;
    }

    function tohtml() {
        $table = "<table border='1'>";
        $table .= $this->toHtmlHeader($this->result[0]);
        foreach ($this->result as $row) {
            $table .= $this->toHtmlRow($row);
        }
        $table .= '</table>';
        return $table;
    }

    private function toHtmlHeader($row) {
        $tr = '<tr>';
        foreach ($row as $key => $value) {
            $tr .= '<th>' . $key . '</th>';
        }
        $tr .= '</tr>';
        return $tr;
    }

    private function toHtmlRow($row) {
        $tr = '<tr>';
        foreach ($row as $key => $value) {
            if ($key == "idEmployee") {
                $tr .= '<td><form action="http://localhost/MVCProject/Employees/selectFromTable" method="POST"><input type="submit" value="' . $value . '" name="idEmployee"></form></td>';
            } else {
                $tr .= '<td>' . $value . '</td>';
            }
        }
            $tr .= '</tr>';
            return $tr;
    }
        

            function selectall() {
                try {

                    $stmt = $this->db->prepare("SELECT idEmployee, nameEmployee, timeHiredEmployee FROM MVCProject.employee;");
                    $stmt->execute();
                    $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $this->tohtml();
                } catch (Exception $e) {
                    return "Error: " . $e->getMessage();
                }
            }

            function select() {
                try {

                    $stmt = $this->db->prepare("SELECT idEmployee, nameEmployee, timeHiredEmployee FROM MVCProject.employee WHERE idEmployee=:idEmployee;");
                    $stmt->bindParam(':idEmployee', $_POST['idEmployee']);
                    $stmt->execute();
                    $this->result = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $_POST['idEmployee'].' is selected';
                } catch (Exception $e) {
                    return "Error: " . $e->getMessage();
                }
            }

            function update() {

                try {
                    // Prepare statement
                    $stmt = $this->db->prepare("UPDATE MVCProject.employee  SET idEmployee=:idEmployee, nameEmployee=:nameEmployee, timeHiredEmployee=:timeHiredEmployee WHERE idEmployee=:idEmployee");
                    $stmt->bindParam(':idEmployee', $_POST['idEmployee']);
                    $stmt->bindParam(':nameEmployee', $_POST['nameEmployee']);
                    $stmt->bindParam(':timeHiredEmployee', $_POST['timeHiredEmployee']);
                    $stmt->execute();

                    // echo a message to say the UPDATE succeeded
                    return $stmt->rowCount() . " records UPDATED successfully";
                } catch (PDOException $e) {
                    return "<br>" . $e->getMessage();
                }
            }

            function delete() {
                try {

                    $stmt = $this->db->prepare("DELETE FROM MVCProject.employee WHERE idEmployee=:idEmployee;");
                    $stmt->bindParam(':idEmployee', $_POST['idEmployee']);
                    $stmt->execute();
                    return $_POST['idEmployee'] . ' is deleted';
                } catch (Exception $e) {
                    return "Error: " . $e->getMessage();
                }
            }

            function insert() {
                try {
                    $stmt = $this->db->prepare("INSERT INTO MVCProject.employee (idEmployee, nameEmployee, timeHiredEmployee) 
    VALUES (:idEmployee, :nameEmployee, :timeHiredEmployee)");
                    $stmt->bindParam(':idEmployee', $_POST['idEmployee']);
                    $stmt->bindParam(':nameEmployee', $_POST['nameEmployee']);
                    $stmt->bindParam(':timeHiredEmployee', $_POST['timeHiredEmployee']);
                    $stmt->execute();
                    return $_POST['idEmployee'] . ' is inserted';
                } catch (Exception $ex) {
                    return $_POST['idEmployee'] . ' is not inserted';
                }
            }

        }
        