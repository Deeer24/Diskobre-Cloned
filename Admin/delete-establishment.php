<?php

    $link = mysqli_connect('localhost','root','');
    mysqli_select_db($link,"diskobre");

    $establishment_id = $_POST['establishment_id'];
    
    $qSelect = mysqli_query($link, "SELECT * FROM establishment WHERE establishment_id = ".$establishment_id);
    $aEstOwn = mysqli_fetch_assoc($qSelect);
    mysqli_query($link, "DELETE from user WHERE user_id = ".$aEstOwn['user_fk']);

    $delete_query = "DELETE from establishment where establishment_id =".$establishment_id;
    $run_delete_query = mysqli_query($link, $delete_query);

    echo 'Successfully Delete Estalishment Detail.';
?>