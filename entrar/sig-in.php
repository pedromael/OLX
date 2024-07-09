
<html lang="pt" >
<head>
  <meta charset="UTF-8">
  <title>OLX</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
  <link rel="stylesheet" href="../stilo/css.css">
  <link rel="stylesheet" href="../stilo/login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-form">
  <div class="text">
    SIG-in
  </div>
  <form method="POST">
    <div class="field">
      <div class="fas fa-envelope"></div>
      <input name="email" type="text" placeholder="Email">
    </div>
    <div class="field">
      <div class="fas fa-envelope"></div>
      <input name="nome" type="text" placeholder="nome completo">
    </div>
    <p>data de nasciemnto</p>
    <div class="field">
      <div class="fas fa-envelope"></div>
      <input type="date" name="data_nascimento" id="">
    </div>
    <div class="field">
      <div class="fas fa-envelope"></div>
      <input name="indereco" type="text" placeholder="indereco">
    </div>
    <div class="field">
      <div class="fas fa-envelope"></div>
      <input name="pais" type="text" placeholder="Pais">
    </div>
    <div class="field">
      <div class="fas fa-lock"></div>
      <input name="password" type="password" placeholder="password">
    </div>
    <div class="field">
      <div class="fas fa-lock"></div>
      <input name="password_r" type="password" placeholder="repeat password">
    </div>
    <button>LOGIN</button>
    <div class="link">
      alread acount?
      <a href="./">Entrar</a>
    </div>
  </form>
</div>
<!-- partial -->
  
</body>
</html>