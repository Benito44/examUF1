<?php

require_once '../model/pdo-articles.php';
require_once '../controller/session.php';
//ex 7.1
//$postsPerPage = 10;

//ex 7.2
//$orderBy = 'date-desc';

$searchTerm = "";
if (isset($_GET['search'])) $searchTerm = $_GET['search'];


session_start();


//ex 7.1
if (isset($_GET['postsPerPage'])) {
    $_SESSION['productes'] = $_GET['postsPerPage'];
}
if (!isset($_SESSION['productes'])) {
    $_SESSION['productes'] = 10; // Valor predeterminado
}
$postsPerPage = 10;
$postsPerPage = $_SESSION['productes'];
// ex7.2
if (isset($_GET['orderBy'])) {
    $_SESSION['mostra'] = $_GET['orderBy'];
}
if (!isset($_SESSION['mostra'])) {
    $_SESSION['mostra'] = 10; // Valor predeterminado
}
$orderBy = 'date-desc';
$orderBy = $_SESSION['mostra'];




$userId = getSessionUserId();

$nArticles = getCountOfPosts($userId, $searchTerm); 
$nPages = ceil($nArticles / $postsPerPage); 

if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

if ($nArticles > 0 && ($currentPage > $nPages || $currentPage < 1)) {
    header("Location: index.php");
}

$ndxArticle = $postsPerPage * ($currentPage - 1);

$articles = getPosts($userId, $ndxArticle, $postsPerPage, $orderBy, $searchTerm); 

if ($currentPage <= 3) $backScope = $currentPage - 1;
else $backScope = 3;
if ($currentPage + 3 > $nPages) $frontScope = $nPages - $currentPage;
else $frontScope = 3;


$firstPage = $currentPage == 1;
$lastPage = $currentPage == $nPages;

$firstPageClass = $firstPage ? 'disabled' : '';
$lastPageClass = $lastPage ? 'disabled' : '';

$searchQuery = !empty($searchTerm) ? "?search=$searchTerm&" : "?";
$nextPageLink = $lastPage ? "#" : $searchQuery . "page=" . ($currentPage + 1);
$previousPageLink = $firstPage ? "#" : $searchQuery . "page=" . ($currentPage - 1);
$firstPageLink = $firstPage ? "#" : $searchQuery . "page=1";
$lastPageLink = $lastPage ? "#" : $searchQuery . "page=$nPages";
//ex2
//require_once '../view/index.view.php';
include '../view/index.view.php';