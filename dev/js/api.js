export  class API {

  async getData(file) {
    let response = {};
    var data;

    // this.checkFile(file).then(
    //   async (result ) => {
    //     console.log('result', result)
    //     if (result) {
    //       console.log('lee data')
    //       response = fetch(`./dist/js/${file}`)
    //       data = response.json()
    //     } else {
    //       console.log('no lee data')
    //       response = await fetch(`./dist/js/example.${file}`)
    //       data = response.json()
    //     }

    //   }
    // )

    response = await fetch(`./dist/js/example.${file}`)
    data =  response.json()
    
    return data
  }

  async checkFile(file) {
    var falg = false
    await fetch(`./dist/js/${file}`)
      .then(response => {
        if (response.ok) {
          console.log("El archivo existe.");
          falg = true
          // return true
          // resolve(true);
        } else {
          console.log("El archivo no existe o no se pudo acceder.");
          // return false
          falg = false
        }
      })
      .catch(error => {
        console.error("Error al intentar acceder al archivo:", error);
        // return false
        falg = false
      });

    return falg
  }
}