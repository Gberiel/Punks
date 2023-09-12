document.getElementById("registration-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que el formulario se envíe por defecto
  
    var passwordInput = document.getElementById("contraseña");
    var passwordValue = passwordInput.value;
  
    if (passwordValue === "IPET363") {
      // Realizar el registro o mostrar mensaje de éxito
      alert("¡Acceso permitido! Registro exitoso.");
      // Redireccionar a pgexterna.html
      window.location.href = "pgexterna.html";
    } else {
      // Mostrar mensaje de acceso denegado
      alert("Acceso denegado. Contraseña incorrecta.");
      passwordInput.value = ""; // Limpiar el campo de contraseña
    }
  });
  