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
				<button type="button" class="nav-link align-self-center showElement" onclick="sessionDestroy()"><p class="h5">ВЫЙТИ</p></button>
			  </div>
		  </div>
		</div>
	</nav>
	<header class = "cab w-100">
    	<div class = "container col d-flex justify-content-center align-items-center h-100">
    	  <h1 class = "text-light fs-1">ПАНЕЛЬ АДМИНИСТРАТОРА</h1>
      </div>
  </header>
  <main>
    <div class = "container-fuild m-5">
      <div class = "row">
        <div class = "list-group col-md-2 h-100">
          <button type = "button" class = "list-group-item list-group-item-action list-group-item-dark"  onclick = "adminSort('client-list')">Пользователи</button>
          <button type = "button" class = "list-group-item list-group-item-action list-group-item-dark" onclick = "adminSort('admin-katalog')">Каталог</button>
          <button type = "button" class = "list-group-item list-group-item-action list-group-item-dark">FAQ</button>
        </div>
        <div class = "col-md-10">
          <div class = "client-list">
          <h2 class = "w-100">Список пользователей</h2>
          <table class="table table-light table-striped w-100">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Имя пользователя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Email</th>
                <th scope="col">Страна</th>
                <th scope="col">Адрес</th>
                <th scope="col">Роль</th>
              </tr>
            </thead>
            <tbody>
            <?php
              require_once("php/db.php");
              $sql = "SELECT * FROM `users`";
              $result = $conn ->query($sql);
              while ($row = $result->fetch_assoc()) {
                echo "
              <tr>
                <form method = 'post' action = 'php/updateUser.php'>
                <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                <input type='hidden' name='role' value='" . htmlspecialchars($row['role']) . "'>
                <th scope='row'>" .$row['id']. "</th>
                <td>" .$row['fname']. "</td>
                <td>" .$row['lname']. "</td>
                <td>" .$row['email']. "</td>
                <td>" .$row['country']. "</td>
                <td>" .$row['adress']. "</td>
                <td>" .$row['role']. "</td>
                <td><button type = 'success' class = 'btn btn-dark'>Изменить</button></td>
                </form>
              </tr>";
            };
              ?>
            </tbody>
          </table>
          </div>
          <div class = "admin-katalog">
            <h2>Каталог</h2>
            <table class="table table-light table-striped w-100">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Фото</th>
                <th scope="col">Цена</th>
                <th scope="col">Категория</th>
              </tr>
            </thead>
            <tbody>
            <?php
              require_once("php/db.php");
              $sql = "SELECT * FROM `katalog`";
              $result = $conn ->query($sql);
              while ($row = $result->fetch_assoc()) {
                echo "
              <tr>
                <th scope='row'>" .$row['id']. "</th>
                <td>" .$row['name']. "</td>
                <td>" .$row['description']. "</td>
                <td>" .$row['photo']. "</td>
                <td>" .$row['price']. "</td>
                <td>" .$row['category']. "</td>
                <td><button type = 'success' class = 'btn btn-dark'>Удалить</button></td>
              </tr>";
            };
              ?>
            </tbody>
          </table>
          <form method="post" action="php/addContent.php" class=" col-3 border border-secondary rounded p-3">
            <legend>Добавить товар</legend>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Название</label>
              <input name="name" class="form-control border border-secondary rounded" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Описание</label>
              <input name="description" class="form-control border border-secondary rounded" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Название фото</label>
              <input name="photo" class="form-control border border-secondary rounded" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Цена</label>
              <input name="price" class="form-control border border-secondary rounded" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Категория</label>
              <input name="category" class="form-control border border-secondary rounded" required>
            </div>
            <button type="submit" onclick="checkForm()" class="btn btn-dark">Добавить</button>
          </form>
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
</body>
</html>