<?php

function varchar($param) {
    return "'" . $param . "'";
}

function dbDatetime($param){
    return "'" . $param . "'";
}