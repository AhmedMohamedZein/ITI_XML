<?php

session_start();

include_once("./functions.php");
session_set();






if (!empty($_POST)) {
    $post = array_values($_POST);

    $submit_value = $post[4];


    switch ($submit_value) {
        case 'add':
            add_employee();
            break;

        case 'next':
            // echo "next";
            nextindex();
            // $index++;
            break;

        case 'previous':
            // echo "previous";
            previousindex();
            // $index++;
            break;
            case 'delete':
                // echo "previous";
               deleteNode();
                // $index++;
                break;
                case 'update':
                    // echo "previous";
                   update_employee();
                    // $index++;
                    break;


        default:
            # code...
            break;
    }
}

require_once("./form.php");