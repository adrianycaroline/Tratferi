// Dropdown do menu usuario
const dropdownMenuButton = document.getElementById('dropdownMenuButton');// id do botão
const dropdownMenu = document.querySelector('.user'); //classe do dropdown escondido

dropdownMenuButton.addEventListener('click', () => {
  dropdownMenu.classList.toggle('show');
});

//caso o usuario clique fora ele fecha o dropdown
document.addEventListener('click', (event) => {
    if (!dropdownMenuButton.contains(event.target)) {
      dropdownMenu.classList.remove('show');
    }
  });


