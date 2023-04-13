// Dropdown do menu usuario
const dropdownMenuButton = document.getElementById('dropdownMenuButton');
const dropdownMenu = document.querySelector('.user');

dropdownMenuButton.addEventListener('click', () => {
  dropdownMenu.classList.toggle('show');
});

//Dropdown do menu cadastrar
const dropdownMenuCadastro = document.getElementById('dropdownMenuCadastro');
const dropdownCadas = document.querySelector('.cadas');

dropdownMenuCadastro.addEventListener('click', () => {
  dropdownCadas.classList.toggle('show');
});