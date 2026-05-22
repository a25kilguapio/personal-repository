<?php

require_once 'connexio.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Chat</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
</head>

<body>

<div class="container">

	<header class="py-3">
		<h1 class="text-center">Xat</h1>
	</header>

	<main>

        <div class="container">

			<div class="row">
				<div class="col-12">

                <?php

                $sql = "SELECT * FROM XAT ORDER BY data ASC";

                $resultat = $conn->query($sql);

                if ($resultat->num_rows > 0) {

                    while($fila = $resultat->fetch_assoc()) {

                        ?>

                        <div class="row">
                            <div class="col-8 offset-2">

                                <div class="alert alert-secondary" role="alert">

                                    <p>
                                        <?php echo htmlspecialchars($fila['missatge']); ?>
                                    </p>

                                    <small>
                                        <span class="badge badge-primary">
                                            <?php echo htmlspecialchars($fila['usuari']); ?>
                                        </span>

                                        a les 
                                        <?php echo date("H:i", strtotime($fila['data'])); ?>
                                    </small>

                                </div>

                            </div>
                        </div>

                        <?php
                    }

                } else {

                    echo "<p class='text-center'>No hi ha missatges</p>";
                }

                ?>

				</div>
			</div>

			<form class="row py-3" action="insertar_missatge.php" method="POST">

                <div class="col-2">

					<input 
                        type="text" 
                        class="form-control" 
                        id="usuari"
                        name="usuari"
                        placeholder="Usuari"
                        required
                    >

				</div>

				<div class="col-7">

					<input 
                        type="text" 
                        class="form-control" 
                        id="missatge"
                        name="missatge"
                        placeholder="Escriu aqui el teu missatge"
                        required
                    >

				</div>

				<div class="col-3">

					<input 
                        type="submit" 
                        class="btn btn-primary btn-block" 
                        value="Enviar"
                    >

				</div>

			</form>

		</div>

	</main>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>

</body>
</html>