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


