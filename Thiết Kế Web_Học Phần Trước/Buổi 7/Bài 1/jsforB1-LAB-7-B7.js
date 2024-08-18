document.addEventListener("DOMContentLoaded", function() {
    // Lấy tất cả các menu cha
    var parentMenus = document.querySelectorAll("#menu > li");
  
    // Thêm sự kiện click cho từng menu cha
    parentMenus.forEach(function(parentMenu) {
      parentMenu.addEventListener("click", function() {
        // Ẩn tất cả các menu con
        parentMenus.forEach(function(menu) {
          if (menu !== parentMenu) {
            menu.querySelector("ul").style.display = "none";
          }
        });
  
        // Hiển thị hoặc ẩn menu con của menu cha được nhấp
        var submenu = parentMenu.querySelector("ul");
        if (submenu.style.display === "block") {
          submenu.style.display = "none";
        } else {
          submenu.style.display = "block";
        }
      });
    });
  });
  