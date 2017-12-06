<?php

    function testPost($var, $var2){
           if(isset($_POST["$var"]) && !empty($_POST["$var"])){
                $var2 = $_POST["$var"];
                return $var2;
           }
    }
    function testUp($rep, $name){
        if(isset($_FILES)){
            $updir =  dirname(dirname(__FILE__)) . "/articles/$rep/";
            $upfile = $updir . basename($_FILES["$name"]['name']);
            $success = move_uploaded_file($_FILES["$name"]['tmp_name'], $upfile);

            if($success){
                $uploaded = "$rep/" . $_FILES["$name"]['name'];
                return $uploaded;
            }
            else{
                $error = $_FILES["$name"]['error'];
                return $error;
            }
        }
    }
    function repertoire($cat){
        $rep = null;
        switch($cat){
            case 1:
                $rep = 'manga';
                break;
            case 2:
                $rep = 'jeux';
                break;
            case 3:
                $rep = 'comics';
                break;
            case 4:
                $rep = 'anime';
                break;
        }
        return $rep;
    }
    function selectAll($table, $option = null, $value = null){
        global $bdd;
        if(!empty($option) && !empty($value)){
            $sql = "SELECT * FROM $table WHERE $option = $value";
            $results = $bdd->query($sql);
            $item = $results->fetchAll(PDO::FETCH_OBJ);
        }
        else{
            $sql = "SELECT * FROM $table";
            $results = $bdd->query($sql);
            $item = $results->fetchAll(PDO::FETCH_OBJ);
        }
        
        return $item;
    }

    function selectWithId($table1, $table2 = null, $option, $value, $primary_key, $foreign_key){
        global $bdd;
        if(!empty($table2)){
            $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON $table1.$primary_key = $table2.$foreign_key WHERE $table2.$option = $value";
            $results = $bdd->query($sql);
            $item = $results->fetch(PDO::FETCH_OBJ);
        }
        else{
            $sql = "SELECT * FROM $table1 WHERE $option = $value";
            $results = $bdd->query($sql);
            $item = $results->fetch(PDO::FETCH_OBJ);
        }
        
        return $item;
    }

    function selectAllJoin($table1, $table2, $primary_key, $foreign_key, $option = null){
        global $bdd;
        
        if(!empty($option)){
            $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON $table1.$primary_key = $table2.$foreign_key WHERE $foreign_key = $option";
        }
        else{
            $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON $table1.$primary_key = $table2.$foreign_key";
        }
        $results = $bdd->query($sql);
        $itemJoin = $results->fetchAll(PDO::FETCH_OBJ);
        
        return $itemJoin;
    }

    function deleteFrom($table, $key, $value){
        global $bdd;
        
        $sql = "DELETE FROM $table WHERE $key = $value";
        $delete = $bdd->exec($sql);
        
        return $delete;
    }