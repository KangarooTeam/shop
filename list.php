$books = $db->query("SELECT * FROM books");
foreach ($books as $book) {
      echo "<b>{$book['title']}</b>  <a href='#'>Add to cart</a> <br>";
}