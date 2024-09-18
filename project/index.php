<?php
require_once './Controller/BooksController.php';

$bookManager = new BooksController();
$runProgram = true;
$programEnded = false;
$tab = str_repeat("\t", 5);

function ask($query) {
    echo $query;
    return trim(string: fgets(STDIN));
}

function addBook($bookManager, $tab) {
    echo "\n";
    $book = [
        'title' => ask($tab . 'Book Title: '),
        'author' => [ask($tab . 'Author: ')],
        'reader' => ask($tab . 'Reader: '),
        'loaned' => ask($tab . 'Is It Loaned: '),
    ];
    if ($bookManager->addBook($book)) {
        echo $tab . str_repeat('=', 50) . "\n" . $tab . 'book added successfully' . "\n" . $tab . str_repeat('=', 50) . "\n";
    }
}

function findBook() {
    global $tab, $bookManager;
    $bookTitle = ask($tab."What is the Book Title: ");
    $book = $bookManager->findBook($bookTitle);
    $book ?echoBook($book):$tab.'No Book Found With This Title';
}

function echoBook($book){
    global $tab;
    echo $tab.'Title: '.$book['title'].PHP_EOL;
    echo $tab.'Authors Are: '.PHP_EOL;
    foreach ($book['author'] as $author) {
        echo $tab.'      '.$author.PHP_EOL;
    }
    
    if ($book['loaned'] == 'true') {
        echo $tab.'Loaned To '.$book['reader'];
    }else echo $tab.'Avialable: True';
}

function endProgram($tab) {
    global $runProgram;
    $runProgram = false;
    echo "\n" . $tab . str_repeat('=', 50) . "\n";
    echo $tab . 'See You Again' . "\n";
    echo $tab . str_repeat('=', 50) . "\n";
}

function program($bookManager, $tab) {
    global $runProgram, $programEnded;
    while ($runProgram) {
        echo "\n" . $tab . str_repeat('=', 50) . "\n";
        echo $tab . 'Welcome to Our Library' . "\n";
        echo $tab . str_repeat('=', 50) . "\n";

        echo $tab . 'How can I help you?' . "\n";
        echo $tab . '[i]    Add a Book' . "\n";
        echo $tab . '[s]    Search Book' . "\n";
        echo $tab . '[x]    Exit The Program' . "\n";

        $op = ask($tab . 'Select An Operation: ');
        switch ($op) {
            case 'i':
                addBook($bookManager, $tab);
                break;
            case 'x':
                endProgram($tab);
                break;
            case 's':
                findBook();
                break;
            default:
                echo 'Unknown Command' . "\n";
                break;
        }
        $programEnded = true;
    }
}

program($bookManager, $tab);

