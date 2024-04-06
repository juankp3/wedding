fetch('./dist/js/data.json')
  .then(response => response.json())
  .then(data => {
    document.getElementById('boyfriend').innerHTML = data.couple.boyfriend;
    document.getElementById('bride').innerHTML = data.couple.bride;


    var contenedorImagen = document.getElementById('container-main-photo');
    var imagen = document.createElement('img');
    imagen.src = data.mainphoto;
    contenedorImagen.appendChild(imagen);
    
    console.log(data);
  })
  .catch(error => {
    console.error('Error al cargar el archivo JSON:', error);
  });