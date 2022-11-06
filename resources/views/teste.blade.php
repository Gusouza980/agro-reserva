<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
        }
    
        #tabela-cotacao table {
            font-family: 'Trebuchet MS', Helvetica, sans-serif;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -webkit-touch-callout: none;
            user-select: none;
        }
    
        #tabela-cotacao th {
            height: 40px;
            background-color: #3f6023;
            color: #FFF;
            text-align: center;
            font-size: 14px;
        }
    
        #tabela-cotacao th:nth-child(2) {
            background-color: #eaa83e;
        }
    
        #tabela-cotacao tr.conteudo:nth-child(even) {
            background: #eeeeee
        }
    
        #tabela-cotacao tr.conteudo:nth-child(odd) {
            background: #ffffff
        }
    
        #tabela-cotacao tr.conteudo:nth-child(even)>.n2 {
            background: #eeeeee
        }
    
        #tabela-cotacao tr.conteudo:nth-child(odd)>.n2 {
            background: #ffffff
        }
    
        #tabela-cotacao .top td,
        #tabela-cotacao .top th {
            background-color: #91aa34;
            color: #FFFFFF;
            text-align: center;
            font-weight: bold;
        }
    
        #tabela-cotacao .bd-right {
            border-right: 1px solid rgb(2, 97, 69);
        }
    
        #tabela-cotacao .titulo,
        #tabela-cotacao .titulo2 {
            height: 30px;
            background-color: #cbeeb1;
            font-size: 12px;
            font-weight: bold;
            text-align: left;
            padding: 0 0 0 10px;
        }
    
        #tabela-cotacao .titulo2 {
            background-color: #f5cd6e;
        }
    
        #tabela-cotacao .subtitle {
            height: 30px;
            background-color: #cbeeb1;
            font-size: 11px;
            font-weight: bold;
            color: #000;
            text-align: center;
        }
    
        #tabela-cotacao .subtitle td:not(0) {
            border-bottom: 1px solid #000;
        }
    
        #tabela-cotacao .subtitle:nth-child(2) {
            background-color: #548028;
        }
    
        #tabela-cotacao .subtitle td {
            padding: 0 0 0 10px;
        }
    
        #tabela-cotacao .conteudo {
            height: 25px;
            font-size: 12px;
            padding: 2px
        }
    
        #tabela-cotacao .conteudo td {
            text-align: center;
        }
    
        #tabela-cotacao .final {
            background-color: #CCCCCC;
            font-size: 11px;
            text-align: left;
            height: 21px;
        }
    
        #tabela-cotacao .final td {
            padding: 0 0 0 10px;
        }
    
    </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="row justify-content-center">
        <div class="col-6">
            <table id="tabela-cotacao">
                {!! $html !!}
            </table>
        </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>