<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Controle Financeiro</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <nav class="menu">
      <img class="logotipo" src="{{ asset('logo.svg') }}" alt="Logo" draggable="false">
    </nav>
    
    <section class="titulo">
      <h1>Controle Financeiro</h1>
    </section>

    <section class="lembretes">
        <div class="card">
          <h1>A pagar hoje</h1>
        </div>
        <div class="card"></div>
        <div class="card"></div>
        <div class="card"></div>
    </section>

    <section class="conteudo">
      <form id="transaction-form">
        <input type="text" id="description" placeholder="Descrição" required />
        <input type="number" id="amount" placeholder="Valor" required />
        <input type="date" id="data" placeholder="Data" required />
        <button type="submit">Adicionar</button>
      </form>
    
      <ul id="transaction-list"></ul>
    
      <div id="summary">
        <p>Receitas: R$ <span id="income">0.00</span></p>
        <p>Despesas: R$ <span id="expense">0.00</span></p>
        <p>Saldo: R$ <span id="balance">0.00</span></p>
      </div>
    </section>

  <script src="{{ asset('script.js') }}"></script>
</body>
</html>
