<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

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

    <header class = "corz w-100">
    	<div class = "container col d-flex justify-content-center align-items-center h-100">
        	
    		<h1 class = "text-light fs-1">ЛИЧНЫЙ КАБИНЕТ</h1>
            
        </div>
        <main>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
  <main>
    <div class="container py-5">
      <!-- Заголовок -->
      <h2 class="mb-4"><i class="bi bi-cart3"></i> Ваша корзина</h2>
  
      <!-- Список товаров -->
      <div class="card mb-4">
          <div class="card-body">
          <?php 
					require_once("php/db.php");
                    $id_user = $_COOKIE['id_user'];
					$sql = "SELECT * FROM katalog
                    INNER JOIN cart
                    ON katalog.id = cart.id_product
                    WHERE user_id = $id_user";
					$result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="row g-3 align-items-center mb-4">
                  <div class="col-md-2">
                      <img src="img/'.$row['photo'].'" class="img-fluid rounded" alt="Название товара">
                  </div>
                  <div class="col-md-4">
                      <h5 class="mb-1">'.$row['name'].'</h5>
                      <p class="text-muted mb-0">'.$row['description'].'</p>
                  </div>
                  <div class="col-md-3">
                      <div class="input-group">
                          <button class="btn btn-outline-secondary minus-btn" type="button">
                              <i class="bi bi-dash"></i>
                          </button>
                          <input type="number" class="form-control text-center" value="1" min="1">
                          <button class="btn btn-outline-secondary plus-btn" type="button">
                              <i class="bi bi-plus"></i>
                          </button>
                      </div>
                  </div>
                  <div class="col-md-2 text-md-end">
                      <h5 class="mb-0 price">'.$row['price'].' ₽</h5>
                  </div>
                  <div class="col-md-1 text-end">
                      <button class="btn btn-danger btn-sm">
                          <i class="bi bi-trash"></i>
                      </button>
                  </div>
              </div>';
                        }
                    }
					?>
          </div>
      </div>
      <div class="card mb-4">
          <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                      <h5 class="mb-3">Промокод</h5>
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Введите промокод">
                          <button class="btn btn-outline-secondary" type="button">Применить</button>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="d-flex justify-content-between mb-2">
                          <span>Товары (2):</span>
                          <span class="total-price" id = "total">40 498 ₽</span>
                      </div>
                      <div class="d-flex justify-content-between mb-2">
                          <span>Доставка:</span>
                          <span>Бесплатно</span>
                      </div>
                      <hr>
                      <div class="d-flex justify-content-between">
                          <h5>Итого:</h5>
                          <h5 class="total-price"></h5>
                      </div>
                      <form method="post" action="php/checkout.php" id="checkoutForm">
                        <button type="submit" class="btn btn-primary w-100 mt-3">
                            <i class="bi bi-credit-card"></i> Перейти к оплате
                        </button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
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
<script>
  document.querySelectorAll('input[type="number"]').forEach(input => {
      input.addEventListener('change', updateTotal);
  });

  document.querySelectorAll('.minus-btn, .plus-btn').forEach(btn => {
      btn.addEventListener('click', () => {
          const input = btn.parentNode.querySelector('input');
          btn.classList.contains('minus-btn') ? input.stepDown() : input.stepUp();
          updateTotal();
      });
  });

  function updateTotal() {
      let total = 0;
      document.querySelectorAll('.price').forEach(priceElement => {
          const price = parseFloat(priceElement.textContent.replace(/[^\d.]/g, ''));
          const quantity = parseFloat(priceElement.closest('.row').querySelector('input').value);
        total += price * quantity;
      });
      
      document.querySelectorAll('.total-price').forEach(element => {
          element.textContent = new Intl.NumberFormat('ru-RU', {
              style: 'currency',
              currency: 'RUB',
              maximumFractionDigits: 0
          }).format(total);
      });
  }
</script>
</body>
</html>