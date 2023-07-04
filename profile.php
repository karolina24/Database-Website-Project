<?php include_once 'header.php'; ?>
<?php
    if (isset($_SESSION["useruid"])) {
        echo '<p style="font-size: 25px;  display: flex;
        justify-content: center;
        align-items: center;"><a style="background-color: #DACCC1;">Jesteś na swoim profilu ' . $_SESSION["useruid"] . '!</a></p>';
    }
    ?>
<section class="index-intro">
   
    
    <div class="book-list-container">
        <p class="lista">Twoja lista książek do przeczytania:</p>
        
        <?php

        $books = [
            [
                'id' => 1,
                'title' => 'Pani England',
                'author' => 'Halls Stacey',
                'image' => 'img/ksiazka1.webp'
            ],
            [
                'id' => 2,
                'title' => 'Legenda. Tom 1',
                'author' => 'Lu Marie',
                'image' => 'img/ksiazka5.webp'
            ],
            [
                'id' => 3,
                'title' => 'Zanim wystygnie kawa',
                'author' => 'Kawaguchi Toshikazu',
                'image' => 'img/ksiazka2.webp'
            ],
            [
                'id' => 4,
                'title' => 'Nikt nie odpisuje',
                'author' => 'Eun-jin Jang',
                'image' => 'img/ksiazka3.webp'
            ],
            [
                'id' => 5,
                'title' => 'Gdyby był ze mną',
                'author' => 'Laura Nowlin',
                'image' => 'img/ksiazka4.webp'
            ],
            [
                'id' => 6,
                'title' => 'Warcross. Cykl Warcross. Tom 1',
                'author' => 'Lu Marie',
                'image' => 'img/ksiazka6.webp'
            ],
            [
                'id' => 7,
                'title' => 'For Sure Not You',
                'author' => 'Weronika Ancerowicz ',
                'image' => 'img/ksiazka7.webp'
            ],
            [
                'id' => 8,
                'title' => 'The wave',
                'author' => 'Monika Rutka ',
                'image' => 'img/ksiazka8.webp'
            ],

           
        ];

        if (isset($_SESSION["userid"])) {
            require_once 'includes/dbh.inc.php';
            $user_id = $_SESSION["userid"];
            $sql = "SELECT * FROM favorites WHERE user_id = ?";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "i", $user_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    $book_id = $row['book_id'];
                    $matching_book = null;
                    foreach ($books as $book) {
                        if ($book['id'] == $book_id) {
                            $matching_book = $book;
                            break;
                        }
                    }

                    if ($matching_book) {
                        echo '<div class="book-item">';
                        echo '<p><img src="' . $matching_book['image'] . '" alt="' . $matching_book['title'] . '"></p>';
                        echo '<p><strong>Tytuł:</strong> ' . $matching_book['title'] . '</p>';
                        echo '<p><strong>Autor:</strong> ' . $matching_book['author'] . '</p>';
                        echo '<form action="includes\delete_book.php" method="post">';
                        echo '<input type="hidden" name="book_id" value="' . $matching_book['id'] . '">';
                        echo '<button type="submit" name="delete_book">Usuń</button>';
                        echo '</form>';
                        echo '</div>';
                    } 
                }

                mysqli_stmt_close($stmt);
            } else {
                echo 'Error preparing statement: ' . mysqli_error($conn);
            }

            mysqli_close($conn); 
        } else {
            echo 'User not logged in.';
        }
        ?>
    </div>
</section>

<style>
    .index-intro {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .book-list-container {
        background-color: #e4ddd8;
        border: 1px solid #88785b;
        padding: 20px;
    }

    .book-item {
        border: 1px solid #CCC;
        padding: 10px;
        margin-bottom: 10px;
        
    }

    .book-item img {
        width:200px;
        display: block;
        margin: 0 auto;
    }

    .lista{
        margin-bottom:20px;
        font-size: 20px;
    }

   .book-item p{
    font-size: 18px;
   }
</style>

<?php include_once 'footer.php'; ?>
