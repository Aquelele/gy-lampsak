<?php

function turnon() {
    system(“ gpio-g mode 24 out “) ;
    system(“ gpio-g write 24 1”) ;
}

function turnoff() {
    system(“ gpio-g mode 24 out “) ;
    system(“ gpio-g write 24 0”) ;
}

?>