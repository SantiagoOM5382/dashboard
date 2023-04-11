
// ocultar navbar y logica de boton
function hiddenavbar() {
    $("#navbar").attr("hidden", true);
    $("#toggle_two").removeAttr("hidden");
    $("#toggle_one").attr("hidden", true);        
}

// mostrar navbar y logica de boton
function shownavbar() {
    $("#navbar").removeAttr("hidden");
    $("#toggle_two").attr("hidden", true);
    $("#toggle_one").removeAttr("hidden");
}




// submenus
const dropdownMenus = document.querySelectorAll('.nav-item.dropdown');
dropdownMenus.forEach(dropdownMenu => {
  const dropdownMenuSubmenu = dropdownMenu.querySelector('.dropdown-menu');
  if (dropdownMenuSubmenu) {
    dropdownMenu.addEventListener('click', event => {
      event.preventDefault();
      const dropdownMenuLink = dropdownMenu.querySelector('.nav-text');
      const isSubmenuOpen = dropdownMenuSubmenu.classList.contains('show');
      if (isSubmenuOpen) {
        dropdownMenuSubmenu.classList.remove('show');
      } else {
        dropdownMenuSubmenu.classList.add('show');
      }
    });
  }
});

window.addEventListener('click', event => {
    dropdownMenus.forEach(dropdownMenu => {
      const dropdownMenuSubmenu = dropdownMenu.querySelector('.dropdown-menu');
      if (dropdownMenuSubmenu && !dropdownMenu.contains(event.target)) {
        dropdownMenuSubmenu.classList.remove('show');
      }
    });
  });

