<?php
// require_once './Controller/BooksController.php';

// $bookManager = new BooksController();
$runProgram = true;
$programEnded = false;
$tab = str_repeat("\t", 5);

function ask($query) {
    echo $query;
    return trim(fgets(STDIN));
}

function addBook($bookManager, $tab) {
    echo "\n";
    $book = [
        'title' => ask($tab . 'Book Title: '),
        'writer' => ask($tab . 'Writer: '),
        'code' => ask($tab . 'Code: '),
        'pubDate' => ask($tab . 'Publication Date: '),
        'type' => ask($tab . 'Type: '),
        'size' => ask($tab . 'Size: '),
        'disposability' => ask($tab . 'Disposability: ')
    ];
    if ($bookManager->insert($book)) {
        echo $tab . str_repeat('=', 50) . "\n" . $tab . 'book added successfully' . "\n" . $tab . str_repeat('=', 50) . "\n";
    }
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
        echo $tab . '[x]    Exit The Program' . "\n";

        $op = ask($tab . 'Select An Operation: ');
        switch ($op) {
            case 'i':
                addBook($bookManager, $tab);
                break;
            case 'x':
                endProgram($tab);
                break;
            default:
                echo 'Unknown Command' . "\n";
                break;
        }
        $programEnded = true;
    }
}

program($bookManager, $tab);

