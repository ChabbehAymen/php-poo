<?php
require_once './services/BookService.php';

$bookService = new BookService();
$isAdmin = '';
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
        'author' => [ask($tab . 'Author: ')],
        'reader' => ask($tab . 'Reader: '),
        'loaned' => ask($tab . 'Is It Loaned: '),
    ];
    if ($bookManager->addBook($book)) {
        echo $tab . str_repeat('=', 50) . "\n" . $tab . 'book added successfully' . "\n" . $tab . str_repeat('=', 50) . "\n";
    }
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

function endProgram($tab) {
    global $runProgram;
    $runProgram = false;
    echo "\n" . $tab . str_repeat('=', 50) . "\n";
    echo $tab . 'See You Again' . "\n";
    echo $tab . str_repeat('=', 50) . "\n";
}

function program($bookManager, $tab) {
    global $runProgram, $programEnded, $bookService;
    $op = ask($tab."Slect operation | [l] list all books | [d] delete book | [a] add book ");
    if ($op === 'l') {
        $books = $bookService->getBooks();
    }elseif($op === 'a')
    {
        $isbm = ask($tab.'Enter ISBM:  ');
        $title = ask($tab.'Enter Title:  ');
        $pubDate = ask($tab.'Enter Publication date:  ');
        $book = new Book($isbm, $title, $pubDate);
        $bookService->addBook($book);
    }
    else {
        $op2 = ask($tab.'give me book id: ');
        $bookService->deleteBook($op2);
    }
}

program($adminController, $tab);

