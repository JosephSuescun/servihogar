class ClientJs {

    insertClient() {
        var object = new FormData(document.querySelector('#inser_client'));
        fetch('ClientController/insertClient', {
            method: 'POST',
            body: object
        })
            .then((resp) => resp.text())
            .then(function (response) {

                try {
                    object = JSON.parse(response);
                    //alert("entrado al sistema");
                    Swal.fire({
                        icon: "error",
                        title: "ERROR CAMPOS",
                        text: object.message,
                    });
                } catch (error) {
                    document.querySelector("#content").innerHTML = response;

                    let timerInterval
                    Swal.fire({
                        icon: 'success',
                        title: 'EXITO',
                        html: 'USUARIO REGISTRADO CON EXITO <br> LA VENTANA SE CERRARA EN <b></b>',
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('USUARIO REGISTRADO CON EXITO')
                        }
                    })


                }

            })
            .catch(function (error) {
                console.log(error);
            });
    }

    showClient(id) {
        var object = new FormData();

        object.append('id', id);

        fetch('ClientController/showClient', {
            method: 'POST',
            body: object
        })
            .then((resp) => resp.text())
            .then(function (response) {
                $('#my_modal').modal('show');

                document.querySelector('#modal_title').innerHTML = "Actualizar Cliente";

                document.querySelector('#modal_content').innerHTML = response;
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    updateClient() {
        var object = new FormData(document.querySelector('#update_client'));

        fetch('ClientController/updateClient', {
            method: 'POST',
            body: object
        })
            .then((resp) => resp.text())
            .then(function (response) {
                try {
                    object = JSON.parse(response);
                    Swal.fire({
                        icon: "error",
                        title: "ERROR",
                        text: object.message,
                    });
                } catch (error) {
                    document.querySelector('#content').innerHTML = response;
                    let timerInterval
                    Swal.fire({
                        icon: 'success',
                        title: 'EXITO',
                        html: 'CLIENTE ACTUALIZADA CON EXITO <br> LA VENTANA SE CERRARA EN <b></b>',
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('USUARIO DE ACCESO ACTUALIZADO CON EXITO')
                        }
                    })
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    }


    Pais(id) {
        var clien_pais = document.querySelector('#clie_departamento');
        var object = new FormData();
        object.append("pais", id);
        //fetch("PaisController/showPais", {
        fetch("DepartamentoController/listDepartamento", {
            method: "POST",
            body: object,
        })
            .then((respuesta) => respuesta.text())
            .then(function (response) {
                const Paises = JSON.parse(response);
                let template = '<option class="FORM-CONTROL" selected disable>---Seleccione---</option>'
                Paises.forEach(departa => {
                    template += "<option value=" + departa.cod_departamento + ">" + departa.nombre_departamento + "</option>"
                });
                clien_pais.innerHTML = template
            })
            .catch(function (error) {
                console.log(error);
            });
    
        clien_pais.addEventListener('change', function () {
            const valor = clien_pais.value;
            Client.ciudad(valor);
        })
    
    }

    ciudad(id) {
        let ciudadd = document.querySelector('#clie_ciudad');
        var object = new FormData();
        object.append("ciudad", id);
        fetch("CiudadController/listCiudad", {
            method: "POST",
            body: object
        })
            .then((respuesta) => respuesta.text())
            .then(function (response) {
                const ciudad = JSON.parse(response);
                let template = '<option class="FORM-CONTROL" selected disable>---Seleccione---</option>';
                ciudad.forEach(ciuda => {
                    template += "<option value=" + ciuda.cod_ciudad + ">" + ciuda.nombre_ciudad + "</option>"
                });
                ciudadd.innerHTML = template;
            })
            .catch(function (error) {
                console.log(error);
            })
    }

    u_Pais(id) {
        var clien_pais = document.querySelector('#u_clie_departamento');
        var object = new FormData();
        object.append("pais", id);
        //fetch("PaisController/showPais", {
        fetch("DepartamentoController/listDepartamento", {
            method: "POST",
            body: object,
        })
            .then((respuesta) => respuesta.text())
            .then(function (response) {
                const Paises = JSON.parse(response);
                let template = '<option class="FORM-CONTROL" selected disable>---Seleccione---</option>'
                Paises.forEach(departa => {
                    template += "<option value=" + departa.cod_departamento + ">" + departa.nombre_departamento + "</option>"
                });
                clien_pais.innerHTML = template
            })
            .catch(function (error) {
                console.log(error);
            });
    
        clien_pais.addEventListener('change', function () {
            const valor = clien_pais.value;
            Client.u_ciudad(valor);
        })
    
    }

    u_ciudad(id) {
        let ciudadd = document.querySelector('#u_clie_ciudad');
        var object = new FormData();
        object.append("ciudad", id);
        fetch("CiudadController/listCiudad", {
            method: "POST",
            body: object
        })
            .then((respuesta) => respuesta.text())
            .then(function (response) {
                const ciudad = JSON.parse(response);
                let template = '<option class="FORM-CONTROL" selected disable>---Seleccione---</option>';
                ciudad.forEach(ciuda => {
                    template += "<option value=" + ciuda.cod_ciudad + ">" + ciuda.nombre_ciudad + "</option>"
                });
                ciudadd.innerHTML = template;
            })
            .catch(function (error) {
                console.log(error);
            })
    }

}
var Client = new ClientJs(); 