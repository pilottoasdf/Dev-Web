<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro - GameMind</title>
  <style>
    body {
      height: 100vh;
      margin: 0;
      background-color: rgb(71, 74, 132);
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
    }

    .form_cadastro {
      background-color: white;
      padding: 100px 50px 50px;
      border-radius: 0 0 10px 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      width: 500px;
      box-sizing: border-box;
      position: relative;
    }

    .tabs {
      display: flex;
      width: 100%;
      margin: 0;
      border-radius: 10px 10px 0 0;
      overflow: hidden;
      position: absolute;
      top: 0;
      left: 0;
      height: 50px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      background-color: #e5e5e5;
    }

    .tab {
      flex: 1;
      text-align: center;
      line-height: 50px;
      font-weight: bold;
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

    .tab:hover:not(.active) {
      background-color: #dcdcdc;
    }

    form {
      width: 100%;
    }

    input[type="email"],
    input[type="text"],
    input[type="password"],
    input[type="date"],
    select {
      width: 100%;
      padding: 8px 5px;
      border: none;
      border-bottom: 2px solid #ccc;
      background-color: transparent;
      box-sizing: border-box;
      outline: none;
      transition: border-color 0.3s ease;
      margin-bottom: 15px;
      font-size: 14px;
      font-family: inherit;
    }

    input[type="email"]:focus,
    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="date"]:focus,
    select:focus {
      border-bottom-color: rgb(71, 74, 132);
    }

    select {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D'14'%20height%3D'8'%20viewBox%3D'0%200%2014%208'%20xmlns%3D'http%3A//www.w3.org/2000/svg'%3E%3Cpath%20d%3D'M1%201l6%206%206-6'%20stroke%3D'%23777'%20stroke-width%3D'2'%20fill%3D'none'%20fill-rule%3D'evenodd'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 10px center;
      background-size: 14px 8px;
      cursor: pointer;
    }

    /* Radio buttons labels */
    label {
      font-size: 14px;
      color: #333;
      display: block;
      margin-bottom: 8px;
      cursor: pointer;
      user-select: none;
    }

    /* Adjust spacing after radios */
    input[type="radio"] {
      margin-right: 6px;
      cursor: pointer;
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
      font-size: 16px;
      font-family: inherit;
    }

    button[type="submit"]:hover {
      background-color: rgb(71, 74, 132);
      color: white;
    }
  </style>
</head>
<body>
  <div class="form_cadastro">
    <div class="tabs">
      <a href="login" class="tab">Entrar</a>
      <a href="cadastro" class="tab active">Cadastrar</a>
    </div>

    <form method="POST" action="">
      @csrf
      <input type="email" name="email" placeholder="E-mail" required /><br />

      <input type="text" name="username" placeholder="Nome de usuário" required /><br /><br />

      <label><input type="radio" name="tipo" value="discente" /> Sou discente</label>
      <label><input type="radio" name="tipo" value="docente" /> Sou docente</label><br /><br />

      <select name="escolaridade" required>
        <option value="" disabled selected>Escolaridade</option>
        <option value="fundamental">Fundamental</option>
        <option value="médio">Médio</option>
        <option value="superior">Superior</option>
      </select><br /><br />

      <input type="date" name="data_nascimento" required /><br />

      <input type="password" name="password" placeholder="Senha" required /><br />

      <input type="password" name="password_confirmation" placeholder="Confirmar senha" required /><br />

      <button type="submit">Cadastrar</button>
    </form>
  </div>
</body>
</html>
