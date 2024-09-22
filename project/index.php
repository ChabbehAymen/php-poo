<?php
require_once './controller/Controller.php';

$runProgram = true;
$controller = new Controller();
$tab = str_repeat("\t", 5);

program();

function program() {
    global $runProgram, $tab, $controller;

    echo "\n" . $tab . str_repeat('=', 50) . "\n";
    echo $tab . 'Welcome to Our Library' . "\n";
    echo $tab . str_repeat('=', 50) . "\n\n";

    echo $tab . '[u]    Login as a Reader' . "\n";
    echo $tab . '[a]    Login as an Admin' . "\n\n";

    $isAdmin = ask($tab . "Login: ") === 'a';
    
    while ($runProgram) {
        displayOptions($isAdmin);
        $op = ask($tab . 'Select An Operation: ');

        handleOperation($op, $isAdmin);
    }
}

function displayOptions($isAdmin) {
    global $tab;
    echo $tab . 'How can I help you?' . "\n";
    echo $tab . '[s]    Search Book' . "\n";

    if ($isAdmin) {
        echo $tab . '[i]    Add a Book' . "\n";
        echo $tab . '[d]    Delete a Book' . "\n";
        echo $tab . '[u]    Update a Book' . "\n"; // Update function commented out in original
    }

    echo $tab . '[x]    Exit The Program' . "\n";
}

function handleOperation($op, $isAdmin) {
    if ($op === 'i' && $isAdmin) {
        addBook();
    } elseif ($op === 'd' && $isAdmin) {
        deleteBook();
    } elseif ($op === 's') {
        findBook();
    } elseif ($op === 'x') {
        endProgram();
    } else {
        echo 'Unknown Command' . "\n";
    }
}

function ask($query) {
    echo $query;
    return trim(fgets(STDIN));
}

function addBook() {
    global $controller, $tab;

    echo "\n";
    $book = new Book(ISBN:ask($tab . 'Book\'s ISBN: '), title: ask($tab . 'Book\'s Title: '), pubDate: ask($tab . 'Book\'s Publication Date: '));

    if ($controller->addBook($book)) {
        echoSuccessMessage('Book added successfully');
    }
}

function deleteBook() {
    global $controller, $tab;
    $bookTitle = ask($tab . "Book's Title: ");
    
    if ($controller->deleteBook($bookTitle)) {
        echo $tab . 'Book deleted successfully';
    }
}

function findBook() {
    global $tab, $controller;

    $bookTitle = ask($tab . "What is the Book Title: ");
    $book = $controller->findBook($bookTitle);
    
    if ($book) {
        echoBook($book);
    } else {
        echo $tab . 'No Book Found With This Title';
    }
}

function echoBook($book) {
    global $tab;

    echo $tab . 'Title: ' . $book['title'] . PHP_EOL;
    echo $tab . 'Authors Are: ' . PHP_EOL;

    foreach ($book['author'] as $author) {
        echo $tab . '      ' . $author . PHP_EOL;
    }

    echo $book['loaned'] == 'true' 
        ? $tab . 'Loaned To ' . $book['reader'] 
        : $tab . 'Available: True';
}

function endProgram() {
    global $runProgram, $tab;
    
    $runProgram = false;
    echo "\n" . $tab . str_repeat('=', 50) . "\n";
    echo $tab . 'See You Again' . "\n";
    echo $tab . str_repeat('=', 50) . "\n";
}

function echoSuccessMessage($message) {
    global $tab;
    echo $tab . str_repeat('=', 50) . "\n" . $tab . $message . "\n" . $tab . str_repeat('=', 50) . "\n";
}
