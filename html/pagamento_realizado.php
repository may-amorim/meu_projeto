<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento Realizado</title>
    <link rel="stylesheet" href="pagamento.css">
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

        #cabecalho {
            display: flex;
            align-items: center;
            gap: 15px;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            z-index: 1000;
            border-bottom: 1px solid gray;
            background-color: white;
        }

        #logo {
            border-radius: 100%;
            width: 69px;
            height: 69px;
            display: flex;

        }

        #textos {
            display: flex;
            flex-direction: column;
        }

        #t_escolar {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
        }

        #p_motorista {
            margin: 0;
            color: gray;
        }

        #logout {
            margin-left: auto;
            margin-right: 40px;
        }

        #sair {

            width: 22px;
            height: 22px;

        }





.main{
    display: flex;
    align-items: center;
    align-items: flex-start;
    background-color: white;
    gap: 100px;


}

.formulario{
    background: #d9d9d9;
            padding: 10px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            width: 200px;
            margin: 20px 20px;
            box-shadow: 0 2px 10px rgb(0, 0, 0, 0.9);
}

.formulario a{
            padding: 10px;
            background: white;
            border: none;
            text-align: left;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;;

        }

         .formulario img {
            width: 22px;
            height: 22px;
        }

        .formulario a:hover {
            background-color: darkgrey;
            text-decoration: none;

        }
            .pagamento{
    flex: 1;
    margin: 20px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    background-color: white;
        }
        .cont{
            gap:15px;
            display: flex;
            flex-direction: column;

        }
        h3{
    color: #a1a0a0;
        }

        .mensalidade{
            background-color: #d7d7d7;
            width: 90%;
            height: 32vh;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
        }

        #status{
            font-size: 25px;
            font-weight: bold;
            margin-left: 30px;
            margin-top: 10px;
        }
        .confrimado{
            display: flex;
            flex-direction: column;
            align-items: center;
             width: 90%;
            height: 32vh;
            background-color: rgb(167, 218, 172);
            border-radius: 5px;
        }
        .cont-img{
            margin-top: 15px;
}

        #bloco{
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            justify-content:space-evenly;
            width: 80%;
            height: 58%;
            background-color: white;
            margin-left: 10%;
            border-radius: 5px;
            

        }
        #money{
            font-size: 50px;
            font-weight: bold;
            margin-left: 30px;
        }
        #valor{
            font-size: 30px;
            margin-left: 30px;
            font-style:italic

        }
        #texto1{
            font-size: 40px;
            font-weight: bold;
            margin-top: 10px;
            color: #1B4C02;

        }
        #texto2{
            font-size: 20px;
            font-weight: bold;
            color: #1B4C02;

        }

        #ultimo-dia{
    font-size: 18px;
    margin-left: 15px;
    margin-top: 10px;
    font-style: italic;
}
#casa{
    text-decoration: none;
    color: black;
    font-size: 20px;
}
#casa:hover{
    color: red;
    text-decoration: none;
}
</style>
</head>

      <body>


    <div id="cabecalho">

        <img id="logo" src="logo.png" alt="logo da empresa">

        <div id="textos">
            <p id="t_escolar">Transporte Escolar</p>
            <p id="p_motorista">Painel do Aluno</p>
        </div>

        <div id="logout">

            <a href="logout.php"><img src="imagens/sair.png" alt="sair" id="sair"></a>
            <a href="logout.php" id="casa">sair</a>

        </div>

    </div>
      
    </header>

    <main class="main">
    <div class="formulario">
        <a  href="home_aluno.php" style="text-decoration: none;color: black;"><img  src="imagens/casa.png" alt="icon de uma casa" > Meu Perfil </a>
        <a><img src="imagens/carteira.png"  alt=" icon carteira"> Pagamento</a>
        <a> <img  src="imagens/rota_mapa.png" alt=" icon mapa"> Minhas Rotas</a>
    
</div>
<div class="pagamento">
        <h1>Pagamento</h1>
        <h3 class="h2">Realize o pagamento da mensalidade: </h3><!-- colocar o mês devedor-->
        <div class="cont">
            <div class="mensalidade">
                            <div id="status">Status de Pagamento:</div>
                            <div id="bloco">
                                <div  id="valor">Valor da mensalidade</div>
                                <div id="money">R$400</div>
                            </div>
                            <div id="ultimo-dia">Ultimo dia da mensalidade</div>
            </div>
            </div>
            <div class="confrimado">
                <div class="cont-img">
                <img 
                        src="imagens/verificar.png" 
                        alt="QR Code do PIX"
                        width="120"
                        height="120"

                    >
                    </div>
                    <div id="texto1">Pagamento Realizado</div>
                    <div id="texto2">Seu pagamento da mensalidade de: Abril</div><!--ESPAÇO PARA O PHP-->
            </div>
        </div>

</main>
</body>
</html>