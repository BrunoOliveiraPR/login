<?php
if(!isset($_SESSION))
    session_start();

if(isset($_POST['logins'])){
	
	
	
	if ($_POST['inlineRadioOptions'] = "option1"){
		
		
		include('class/conexao.php');
  
  $erro = array();

    $senha = $_POST['password'];
    $_SESSION['email'] = $mysqli->escape_string($_POST['email']);
	$emails = $_POST['email'];


    if(count($erro) == 0){

        $sql = "SELECT senha as senha 
        FROM inscricao 
        WHERE cpf = '$emails' order by id desc limit 1";
        $que = $mysqli->query($sql) or die($mysqli->error);
        $dado = $que->fetch_assoc();
        
        if($que->num_rows == 0)
            $erro[] = "Nenhum usuário possui o <strong>login</strong> informado.";

        elseif(strcmp($dado['senha'], ($senha)) == 0){
            $_SESSION['logado'] = "logado";
        }else
            $erro[] = "<strong>Senha</strong> incorreta.";

        if(count($erro) == 0){
            echo "<script>location.href='http://intranet.helixcursos.com.br/dashboard.php';</script>";
            exit();
        }

    }

		
		
	}
	if ($_POST['inlineRadioOptions'] = "option2"){
		
		
		include('class/conexao.php');
  
  $erro = array();

  // Captação de dados
    $senha = $_POST['password'];
    $_SESSION['email'] = $mysqli->escape_string($_POST['email']);
	$emails = $_POST['email'];


    if(count($erro) == 0){

        $sql = "SELECT senha as senha 
        FROM inscricaopcom 
        WHERE cpf = '$emails' order by id desc limit 1";
        $que = $mysqli->query($sql) or die($mysqli->error);
        $dado = $que->fetch_assoc();
        
        if($que->num_rows == 0)
            $erro[] = "Nenhum usuário possui o <strong>login</strong> informado.";

        elseif(strcmp($dado['senha'], ($senha)) == 0){
            $_SESSION['logado'] = "logado";
        }else
            $erro[] = "<strong>Senha</strong> incorreta.";

        if(count($erro) == 0){
            echo "<script>location.href='http://intranet.helixcursos.com.br/dashboard.php';</script>";
            exit();
        }

    }

		
		
	}
	

	
  

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Intranet Helix Cursos
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>
<script src="https://unpkg.com/imask"></script>

<body class="">
 
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
					
<p align="center"><img src="http://intranet.helixcursos.com.br/logo.fw.png" width="231" height="121" alt=""/>
<h4 class="font-weight-bolder text-warning text-gradient text-center">Bem-vindo!</h4></p>
				
				  
                  <p class="mb-0">Entre com seu <strong>CPF </strong>e <strong>SENHA</strong>, cadastrados no ato da inscrição.</p>
                
				<form method="post" action="" role="form">
				  <br>
					  
				  </div>

                <div class="card-body">
                  
                    <label>CPF</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="email" id="cpf" placeholder="CPF" aria-label="CPF" aria-describedby="email-addon" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>" required>
                    </div>
                    <label>Senha</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="password" placeholder="Senha" aria-label="Senha" aria-describedby="password-addon" required>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="logins" class="btn bg-gradient-warning w-100 mt-4 mb-0">Entrar</button>
                    </div>
                  </form>
						   <?php 
                        if(isset($erro)) 
                            if(count($erro) > 0){ ?>
                                <div class="alert alert-danger">
                                    <?php foreach($erro as $msg) echo "$msg <br>"; ?>
                                </div>
                            <?php 
                            }
                            ?>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Esqueceu a senha?
                    <a href="javascript:;" class="text-danger text-gradient font-weight-bold" data-bs-toggle='modal' data-bs-target='#recuperar'>Recuperar</a>
                  </p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
	  
	  <div class='col-md-4'>
					<div class='modal fade' id='recuperar' tabindex='-1' role='dialog' aria-labelledby='modal-default' aria-hidden='true'>
					<div class='modal-dialog modal- modal-dialog-centered modal-' role='document'>
					<div class='modal-content'>
					<div class='modal-header'>
					<h6 class='modal-title' id='modal-title-default'>Recuperação de senha</h6>
					<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
					<span aria-hidden='true'>×</span>
					</button>
					</div>
					<div class='modal-body'>
					
					
						  <form method="post" action="" role="form">
                    <label>CPF do aluno</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="emails" placeholder="CPF cadastrado na inscrição" aria-label="CPF" aria-describedby="email-addon" value="" required>
                    </div>
                 

                    <div class="text-center">
                      <button disabled type="submit" name="logins" class="btn bg-gradient-warning w-100 mt-4 mb-0">Reenviar senha por e-mail</button>
                    </div>
                  </form>
						
						
					</div>
					<div class='modal-footer'>
					<button type='button' class='btn btn-outline-dark btn-sm  ml-auto' data-bs-dismiss='modal'>Cancelar</button>
					</div>
					</div>
					</div>
					</div>
		  
		  
  </main>

	<footer class="footer py-5">
    <div class="container">
      
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script><strong> Helix Cursos</strong>
          </p>
        </div>
      </div>
    </div>
  </footer>

	
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
	  
	  
	  var element = document.getElementById('cpf');
var maskOptions = {
  mask: '00000000000'
};
var mask = IMask(element, maskOptions);
	  
	  
	  
  </script>
	
	
	
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>

		  
	
</body>

</html>