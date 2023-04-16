// Dropdown do menu usuario
const dropdownMenuButton = document.getElementById('dropdownMenuButton');
const dropdownMenu = document.querySelector('.user');

dropdownMenuButton.addEventListener('click', () => {
  dropdownMenu.classList.toggle('show');
});

//caso o usuario clique fora ele fecha o dropdown
document.addEventListener('click', (event) => {
    if (!dropdownMenuButton.contains(event.target)) {
      dropdownMenu.classList.remove('show');
    }
  });

//Dropdown do menu cadastrar
const dropdownMenuCadastro = document.getElementById('dropdownMenuCadastro');
const dropdownCadas = document.querySelector('.cadas');

dropdownMenuCadastro.addEventListener('click', () => {
  dropdownCadas.classList.toggle('show');
});

//caso o usuario clique fora ele fecha o dropdown
document.addEventListener('click', (event) => {
    if (!dropdownMenuCadastro.contains(event.target)) {
      dropdownCadas.classList.remove('show');
    }
  });

//Dropdown do menu cadastrar


