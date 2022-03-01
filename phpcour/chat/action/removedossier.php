<?php
$d=filter_input(INPUT_POST, "dossier");
rmdir("../Photos/$d");