const form = document.getElementById('transaction-form');
const list = document.getElementById('transaction-list');
const incomeEl = document.getElementById('income');
const expenseEl = document.getElementById('expense');
const balanceEl = document.getElementById('balance');

let transactions = JSON.parse(localStorage.getItem('transactions')) || [];

function updateStorage() {
  localStorage.setItem('transactions', JSON.stringify(transactions));
}

function renderTransactions() {
  list.innerHTML = '';
  let income = 0;
  let expense = 0;

  transactions.forEach((t, index) => {
    const li = document.createElement('li');
    li.textContent = `${t.description}: R$ ${t.amount}`;
    li.className = t.amount > 0 ? 'income' : 'expense';
    li.onclick = () => {
      transactions.splice(index, 1);
      updateStorage();
      renderTransactions();
    };
    list.appendChild(li);

    if (t.amount > 0) income += t.amount;
    else expense += t.amount;
  });

  incomeEl.textContent = income.toFixed(2);
  expenseEl.textContent = Math.abs(expense).toFixed(2);
  balanceEl.textContent = (income + expense).toFixed(2);
}

form.addEventListener('submit', (e) => {
  e.preventDefault();
  const desc = document.getElementById('description').value;
  const amount = parseFloat(document.getElementById('amount').value);
  if (!desc || isNaN(amount)) return;

  transactions.push({ description: desc, amount });
  updateStorage();
  renderTransactions();
  form.reset();
});

renderTransactions();
