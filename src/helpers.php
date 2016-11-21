<?php

function mask($acc){
    return substr_replace($acc, str_repeat('*', 7), 5, 7);
}