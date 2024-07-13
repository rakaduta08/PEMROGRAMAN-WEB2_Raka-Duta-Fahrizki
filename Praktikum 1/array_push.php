<!DOCTYPE html>
<html>
<body>
    <?php
    $tims = ["erwin","heru","zaki"];
    array_push($tims,"wati");
    foreach($tims as $person){
        echo $person.'<br/>';
    }

?>
</body>
</html>