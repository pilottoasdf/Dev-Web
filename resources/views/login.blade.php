<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login3.css">
    <title>Login - GameMind</title>
   
</head>
<body>
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
    padding: 100px 60px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);


    display: flex;
    flex-direction: column;
    gap: 15px; 

 
    width: 320px;
  }

  
  .form_login > div {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 20px;
  }

 
  .form_login > div a {
    padding: 8px 20px;
    background-color: #3b5998;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
  }

  .form_login > div a:hover {
    background-color: #2d4373;
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
}

  button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color:rgb(225, 225, 225);
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
   
    margin-bottom:20px ;
    color: #3b5998;
    text-decoration: none;
  }

  .esqueci_senha:hover {
    text-decoration: underline;
  }
</style>
<div class="form_login">
    <div>
        <a href="login">Entrar</a>
        <a href="cadastro">Cadastrar</a>
    </div>

    <form method="POST" action="#">
        @csrf
        <label>Login:</label><br>
        <input type="text" name="login"><br><br>

        <label>Senha:</label><br>
        <input type="password" name="password"><br><br>
        <a class="esqueci_senha" href="/cadastro">Esqueci a senha</a>

        <button type="submit">Acessar</button>
    </form>

    
    </div>
</body>
</html>
