<?php
session_start();
include_once 'db.php';
    $movieID = "";
    $moviename = "";
    $genre = "";
    $lenguage = "";
    $duration = "";
    $releseDate = "";
    $director = "";
    $writer = "";
    $state = "";
    $movChar = "";
    $realChar = "";
    $charImg = "";
    $movImg = "";
    $rank = "";
    $price = "";
    $about = "";
    $trailer = "";
$edit_state = false;

// Save Movie
if (isset($_POST['save'])) {

    $movieID = $_POST['movieID'];
    $moviename = $_POST['movieName'];
    $genre = $_POST['genre'];
    $lenguage = $_POST['lenguage'];
    $duration = $_POST['duration'];
    $releseDate = $_POST['releseDate'];
    $director = $_POST['director'];
    $writer = $_POST['writer'];
    $state = $_POST['state'];
    $movChar = $_POST['movChar'];
    $realChar = $_POST['realChar'];
    $charImg = $_POST['charImg'];
    $movImg = $_POST['movImg'];
    $rank = $_POST['rank'];
    $price = $_POST['price'];
    $about = $_POST['about'];
    $trailer = $_POST['trailer'];

    

    $query = "INSERT INTO `movies`(`movieID`, `movieName`, `genre`, `median`, `duration`, `releseDate`, `director`, `writer`, `about`, `state`, `movieChar`, `realChar`, `charImage`, `movieImage`, `rank`, `price`,`trailer`) VALUES('$movieID', '$moviename', '$genre', '$lenguage', '$duration', '$releseDate', '$director', '$writer', '$about', '$state', '$movChar', '$realChar', '$charImg', '$movImg', '$rank', '$price','$trailer')";
 if (mysqli_query($conn, $query)) {
 	$_SESSION['message'] = "Movie Added Successfully";
		header("Location: movie.php");
	 } else {
		mysqli_close($conn);
	 }

}
// For updating records
if (isset($_POST['update'])) {
    $movieID = $_POST['movieID'];
    $moviename = $_POST['movieName'];
    $genre = $_POST['genre'];
    $lenguage = $_POST['lenguage'];
    $duration = $_POST['duration'];
    $releseDate = $_POST['releseDate'];
    $director = $_POST['director'];
    $writer = $_POST['writer'];
    $state = $_POST['state'];
    $movChar = $_POST['movChar'];
    $realChar = $_POST['realChar'];
    $charImg = $_POST['charImg'];
    $movImg = $_POST['movImg'];
    $rank = $_POST['rank'];
    $price = $_POST['price'];
    $about = $_POST['about'];
    $trailer = $_POST['trailer'];

    mysqli_query($conn,"UPDATE `movies` SET `movieID`='$movieID',`movieName`='$moviename',`genre`='$genre',`median`='$lenguage',`duration`='$duration',`releseDate`='$releseDate',`director`='$director',`writer`='$writer',`about`='$about',`state`='$state',`movieChar`='$movChar',`realChar`='$realChar',`charImage`='$charImg',`movieImage`='$movImg',`rank`='$rank',`price`='$price', `trailer`='$trailer' WHERE `movieID` = '$movieID'");
            $_SESSION['message'] = "Movie Updated Successfully";
	header('location: movie.php');
}
// For deleteing records
if (isset($_GET['delete'])) {
	$movieID = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM movies WHERE movieID='$movieID'");
	$_SESSION['message'] = "Movie Deleted Successfully";
	header('location:movie.php');
}
?>
