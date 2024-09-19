<?php
require_once './Controller/AdminController.php';

$adminController = new AdminController();
$runProgram = true;
$programEnded = false;
$tab = str_repeat("\t", 5);


program();

function program() {
    global $runProgram, $programEnded, $tab, $adminController, $isAdmin;
    echo "\n" . $tab . str_repeat('=', 50) . "\n";
    echo $tab . 'Welcome to Our Library' . "\n";
    echo $tab . str_repeat('=', 50) . "\n";
    echo PHP_EOL;
    echo PHP_EOL;
    echo $tab . '[u]    Login as a Reader' . "\n";
    echo $tab . '[a]    Login as an Admin' . "\n";
    echo PHP_EOL;
    $isAdmin = ask($tab."Login: ") === 'a'? true: false;

    while ($runProgram) {
        echo $tab . 'How can I help you?' . "\n";
        echo $tab . '[s]    Search Book' . "\n";
        if ($isAdmin) {
                echo $tab . '[i]    Add a Book' . "\n";
                echo $tab . '[d]    Delete a Book' . "\n";
                echo $tab . '[u]    Update a Book' . "\n";
            }
        echo $tab . '[x]    Exit The Program' . "\n";

        $op = ask($tab . 'Select An Operation: ');
        if ($op === 'i' && $isAdmin) addBook();
        elseif ($op === 'd' && $isAdmin) deleteBook();
        elseif ($op === 'u' && $isAdmin) updateBook();
        elseif ($op === 's') findBook();
        elseif ($op === 'x') endProgram();
        else echo 'Unknown Command' . "\n";
        // switch ($op) {
        //     case 'i' && $isAdmin === true:
        //         addBook();
        //         break;
        //     case 'd' && $isAdmin === true:
        //         deleteBook();
        //         break;
        //     case 'u' && $isAdmin === true:
        //         updateBook();
        //         break;
        //     case 's':
        //         findBook();
        //         break;
        //     case 'x':
        //         endProgram();
        //         break;
        //     default:
                
        //         break;
        // }
        $programEnded = true;
    }
}

function ask($query) {
    echo $query;
    return trim(string: fgets(STDIN));
}

function addBook() {
    global $adminController, $tab;
    echo "\n";
    $book = [
        'title' => ask($tab . 'Book Title: '),
        'author' => [ask($tab . 'Author: ')],
        'reader' => ask($tab . 'Reader: '),
        'loaned' => ask($tab . 'Is It Loaned: '),
    ];
    if ($adminController->addBook($book)) {
        echo $tab . str_repeat('=', 50) . "\n" . $tab . 'book added successfully' . "\n" . $tab . str_repeat('=', 50) . "\n";
    }
}

function deleteBook(){
    global $adminController, $tab, $ask;
    if($adminController->deleteBook(ask($tab."Book's Title:  ")))echo $tab.' Book Deleted successfully';
}

function findBook() {
    global $tab, $adminController;
    $bookTitle = ask($tab."What is the Book Title: ");
    $book = $adminController->findBook($bookTitle);
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

function endProgram() {
    global $runProgram, $tab;
    $runProgram = false;
    echo "\n" . $tab . str_repeat('=', 50) . "\n";
    echo $tab . 'See You Again' . "\n";
    echo $tab . str_repeat('=', 50) . "\n";
}


