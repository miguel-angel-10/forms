

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <title>Login</title>
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }
    form {
      min-width: 460px;
      margin: 4rem auto;
      padding: 20px;
    }
    main {
      flex: 1 0 auto;
    }
    .rowform{
      width: 50%;
      margin: 0 auto;
    }
    .logout {
      position: relative;
      top: 25px;
      right: 10px;
      background-color: red;
      width: 25px;
      height: 25px;
      border-radius: 50%;
    }
    .logout::after {
      width: 3px;
      border: 2px solid white;
    }
  </style>
</head>
<body class="grey lighten-4">
  
  <nav>
    <div class="nav-wrapper green lighten-1">
      <a href="index.php" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="login.php">Connexion</a></li>
        <li><a href="logout.php" title="logout" class="logout"></a></li>
      </ul>
     
    </div>
  </nav>
