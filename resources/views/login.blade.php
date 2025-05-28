<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - GameMind</title>
  <style>
    body {
      height: 100vh; 
      margin: 0; 
      background-color: rgb(71, 74, 132);
      display: flex;
      justify-content: center; 
      align-items: center;    
    }

  .form_login {
  background-color: white;
  padding: 100px 50px 50px; /* menos padding topo porque as abas vão ficar ali */
  border-radius: 0 0 10px 10px; /* só arredonda embaixo */
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
  width: 500px;
  box-sizing: border-box;
  position: relative; /* só para garantir */
}

.tabs {
  display: flex;
  width: 100%;
  margin: 0; /* remove margens */
  border-radius: 10px 10px 0 0;
  overflow: hidden;
  position: absolute; /* posiciona em cima do form_login */
  top: 0;
  left: 0;
  height: 50px; /* altura da aba */
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.tab {
  flex: 1;
  text-align: center;
  line-height: 50px; /* centraliza vertical */
  font-weight: bold;
  background-color: #e5e5e5;
  color: #777;
  text-decoration: none;
  border: none;
  border-radius: 10px 10px 0 0;
  transition: background-color 0.3s ease;
  cursor: pointer;
  user-select: none;
}

.tab.active {
  background-color: white;
  color: #333;
  box-shadow: inset 0 -3px 0 0 rgb(71, 74, 132);
}

.tab:hover {
  background-color: #dcdcdc;
}


    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 8px 5px;
      border: none;
      border-bottom: 2px solid #ccc;
      background-color: transparent;
      box-sizing: border-box;
      outline: none;
      transition: border-color 0.3s ease;
      margin-bottom: 15px;
    }

    button[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: rgb(225, 225, 225);
      color: gray;
      font-weight: bold;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      transition: background-color 0.5s ease, transform 0.2s ease;
    }

    button[type="submit"]:hover {
      background-color: rgb(71, 74, 132);
      color: white;
    }

    .esqueci_senha {
      display: block;
      margin-bottom: 20px;
      color: #3b5998;
      text-decoration: none;
      font-size: 14px;
    }

    .esqueci_senha:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="form_login">
    <div class="tabs">
      <a href="login" class="tab active">Entrar</a>
      <a href="cadastro" class="tab">Cadastrar</a>
    </div>

    <form method="POST" action="#" class="form">
      @csrf
      <label>Login:</label><br>
      <input type="text" name="login"><br>

      <label>Senha:</label><br>
      <input type="password" name="password"><br>

      <a class="esqueci_senha" href="/cadastro">Esqueci a senha</a>
      <button type="submit">Acessar</button>
    </form>
  </div>
</body>
</html>
