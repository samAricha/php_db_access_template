<?php
$host =     'localhost';
$dbname =   'mentors';
$user =     'root';
$password = '';

try{
    $dsn = 'mysql:host='.$host.';dbname='.$dbname;
    $conn = new PDO($dsn, $user, $password);
    $conn ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    
    //getting and displaying a list of mentors
    $sql ='SELECT * FROM mentors1';
    
    $stmt = $conn->prepare($sql);
    $stmt ->execute();
    $mentors = $stmt->fetchAll();
    
    //var_dump($mentors[0]->name);
    echo $mentors[1]->name.'<br>';

    //getting and displaying one mentor
    $sql ='SELECT * FROM mentors1 WHERE organization= :org && gender = :gender';
    $organization = 'Google';
    $gender = 0;

    $stmt = $conn->prepare($sql);
    $stmt ->execute(['org' => $organization, 'gender' => $gender]);
    $mentors = $stmt->fetchAll();
    
    foreach($mentors as $mentor){
        echo $mentor->name.'<br>';
    }

}catch(PDOException $e){
    echo "Error in connection ".$e;
}

?>

