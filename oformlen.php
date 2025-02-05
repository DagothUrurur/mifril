<!doctype html>
<html>
	<head>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<title>Мифрил</title>
		<link rel="icon" href="img/icon.png" type="image/x-icon">
		<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
		<script src="myjs/script.js"></script>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
            sessionCheck();
        });
		</script>
		<link href="mycss/style.css" rel="stylesheet">
	</head>
<body>
	<nav class="navbar navbar-expand-lg bg-light p-0">
		<div class="container-fluid p-0 ">
		  <a class="navbar-brand p-0" href="index.html"><img src = "img/1.png" class = ></a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Переключатель навигации">
			  <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			  <div class="navbar-nav position-absolute start-50 translate-middle top-50">
				<a class="nav-link align-self-center" aria-current="page" href="index.html"><p class="h5">ГЛАВНАЯ</p></a>
				<a class="nav-link align-self-center" href="shop.php"><p class="h5">КАТАЛОГ</p></a>
				<a class="nav-link align-self-center" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><p class="h5">ГЕНШИН</p></a>
				<button type="button" class="nav-link align-self-center hide" data-bs-toggle="modal" data-bs-target="#exampleModal"><p class="h5">ПРОФИЛЬ</p></button>
				<a class="nav-link align-self-center showElement" href="cabinet.php"><p class="h5">ЛИЧНЫЙ КАБИНЕТ</p></a>
				<a class="nav-link align-self-center showElement" href="corzina.php"><p class="h5">КОРЗИНА</p></a>
				<button type="button" class="nav-link align-self-center showElement" onclick="sessionDestroy()"><p class="h5">ВЫЙТИ</p></button>
				<a class="nav-link align-self-center" href="faq.html"><p class="h5">FAQ</p></a>
			  </div>
		  </div>
		</div>
	</nav>

	<header class = "oform w-100">
    	<div class = "container col d-flex justify-content-center align-items-center h-100">
        	
    		<h1 class = "text-light fs-1">ОФОРМЛЕННЫЕ ТОВАРЫ</h1>
            
        </div>
        <main>

        <?php
require_once('php/db.php');
$id = $_COOKIE['id_user'];
$sql = "SELECT orders.id, orders.product_id, katalog.price, katalog.photo, katalog.name 
        FROM orders 
        INNER JOIN users ON orders.user_id = users.id 
        INNER JOIN katalog ON orders.product_id = katalog.id 
        WHERE users.id = $id";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo '<div class="album py-5 bg-light">';
    echo '<div class="container">';
    echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';

    while ($row = $result->fetch_assoc()) {
        echo '<div class="col">';
        echo '<div class="card shadow-sm">';
        echo '<div class="img-container">';
        echo '<img class="card-img-top img-fluid" src="img/' . htmlspecialchars($row['photo']) . '" alt="Изображение товара">';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<p class="card-text">Товар: ' . htmlspecialchars($row['name']) . '</p>';
        echo '<div class="d-flex justify-content-between align-items-center">';
        echo '<div class="btn-group">';
        echo '<a class="link-underline-opacity-0 link-offset-2 link-underline link-secondary m-3" href="#">' . htmlspecialchars($row['price']) . ' р.</a>';
        echo "<a class='link-underline-opacity-0 link-offset-2 link-underline link-secondary m-3' href='shop.php'>Повторить</a>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>'; 
    echo '</div>'; 
    echo '</div>'; 
} else {
    echo "<p>У вас пока нет заказов.</p>";
}
?>
          </main>
          <footer class="footer">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5">
                    <div class="col mb-4">
                        <a href="/" class="d-flex align-items-center mb-3">
                            <img src="img/1.png" alt="Логотип" class="img-fluid">
                        </a>
                        <p class="text-muted">&copy; 2022 Company, Inc</p>
                    </div>
                    <div class="col mb-4"></div>
                    <div class="col mb-4">
                        <h5>ГЛАВНАЯ</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Главная</a></li>
                            <li class="nav-item mb-2"><a href="#costum" class="nav-link p-0 text-muted">О косплее</a></li>
                            <li class="nav-item mb-2"><a href="#karta" class="nav-link p-0 text-muted">Карта</a></li>
                            <li class="nav-item mb-2"><a href="#contact" class="nav-link p-0 text-muted">Контакты</a></li>
                        </ul>
                    </div>
                    <div class="col mb-4">
                        <h5>КАТАЛОГ</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                        </ul>
                    </div>
                    <div class="col mb-4">
                        <h5>ГЕНШИН</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Геншин</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Геншин</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Геншин</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Геншин</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Геншин</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
        </body>
        </html>