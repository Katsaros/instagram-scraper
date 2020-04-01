<?php
    foreach (glob("model/*.php") as $filename)
    {
        include $filename;
    }
    foreach (glob("controller/*.php") as $filename)
    {
        include $filename;
    }
    foreach (glob("service/*.php") as $filename)
    {
        include $filename;
    }
    foreach (glob("config/*.php") as $filename)
    {
        include $filename;
    }
?>