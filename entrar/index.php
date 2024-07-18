<!DOCTYPE html>
<?php
	require "../atalho.php";
	$entrar = new sig_in;
	if (isset($_POST['username'])) {
		if (!empty($_POST['username']) && !empty($_POST['senha'])) {
			foreach ($_POST as $key => $value) {
				$dados[$key] = $value;
			}
			if ($entrar->logar($dados)) {
				?>
				<script>
					window.location.href = "../";
				</script>
				<?php
			}else{
				?>
				<script>
					alert("senha ou username errado");
				</script>
				<?php
			}
		}else{
			?>
				<script>
					alert("preencha todas as abas");
				</script>
				<?php
		}
	}elseif(isset($_POST['nome'])){
		if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['senha_conf']) && !empty($_POST['telefone']) && !empty($_POST['indereco']) && !empty($_POST['data_nasciemnto'])) {
			foreach ($_POST as $key => $value) {
				$dados[$key] = $value;
			}
			if ($dados['senha'] == $dados['senha_conf']) {
				if ($entrar->cadastrar($dados)) {
					?>
					<script>
						window.location.href = "../";
					</script>
					<?php
				}else{
					?>
					<script>
						alert("falha ao cadastrar conta tente novamente se o problema persistir, deixe uma mensagem");
					</script>
					<?php
				}
			}else{
				?>
				<script>
					alert("senha e confirmar senha nao correspondem");
				</script>
				<?php
			}
		}else{
			?>
			<script>
				alert("preencha todas as abas");
			</script>
			<?php
		}
	}
?>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<!-- Icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- SEO -->
		<title>Praça | Entre ou Cadastre-se</title>
    <meta name="description" content="Cadastre-se na nova plataforma de compra e venda de Angola, ou ainda faça login se já tiver uma conta... [gerar texto com gpt]">
    <meta name="keywords" content="Angola, Henrique Strees, OLX, compra e venda, Loja Online">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://www.novaolx.com">

    <!-- Estilo e Scripts -->
		<link rel="stylesheet" href="style.css" />

	</head>
	<body>
		<div class="container">
			<div class="forms-container">
				<div class="forms">
					<?php include('signin.html'); ?>
					<?php include('signup.html'); ?>
				</div>
			</div>
			<div class="panels-container">
				<div class="panel left-panel">
					<div class="content">
						<h3>Primeira vez?</h3>
						<p>Não perca a oportunidade de fazer parte do mercadão</p>
						<button class="btn transparent" id="sign-up-btn">cadastre-se</button>
					</div>
					<img src="img/log.svg" class="image" alt="" />
				</div>
				<div class="panel right-panel">
					<div class="content">
						<h3>Já tem uma conta?</h3>
						<p>Faça login com os seus dados, clicando no botão à baixo</p>
						<button class="btn transparent" id="sign-in-btn">Login</button>
					</div>
					<img src="img/register.svg" class="image" alt="" />
				</div>
			</div>
		</div>
		<script src="app.js"></script>
	</body>
</html>
