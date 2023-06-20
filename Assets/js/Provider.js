class ProviderJs {

    insertProvider() {
        var object = new FormData(document.querySelector('#insert_proveedor'));
        fetch('ProviderController/insertProvider', {
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
                        html: 'PROVEEDOR REGISTRADO CON EXITO <br> LA VENTANA SE CERRARA EN <b></b>',
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
                            console.log('PROVEEDOR REGISTRADO CON EXITO')
                        }
                    })


                }

            })
            .catch(function (error) {
                console.log(error);
            });
    }

    updateProvider() {
        var object = new FormData(document.querySelector('#update_proveedor'));

        fetch('ProviderController/updateProvider', {
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
                        html: 'PROVEEDOR ACTUALIZADA CON EXITO <br> LA VENTANA SE CERRARA EN <b></b>',
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
                            console.log('PROVEEDOR ACTUALIZADA CON EXITO')
                        }
                    })
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    showProvider(id) {
        var object = new FormData();

        object.append('id', id);

        fetch('ProviderController/showProvider', {
            method: 'POST',
            body: object
        })
            .then((resp) => resp.text())
            .then(function (response) {
                $('#my_modal').modal('show');

                document.querySelector('#modal_title').innerHTML = "Actualizar PROVEEDOR";

                document.querySelector('#modal_content').innerHTML = response;
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    updateProvider() {
        var object = new FormData(document.querySelector('#update_provider'));

        fetch('ProviderController/updateProvider', {
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
                        html: 'PROVEEDOR ACTUALIZADA CON EXITO <br> LA VENTANA SE CERRARA EN <b></b>',
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
                            console.log('PROVEEDOR ACTUALIZADA CON EXITO')
                        }
                    })
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    }



    Pais(id) {
        var clien_pais = document.querySelector('#cod_departamento');
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
            Provider.ciudad(valor);
        })
    
    }

    ciudad(id) {
        let ciudadd = document.querySelector('#cod_ciudad');
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
        var clien_pais = document.querySelector('#u_proveedor_departamento');
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
            Provider.u_ciudad(valor);
        })
    
    }

    u_ciudad(id) {
        let ciudadd = document.querySelector('#u_proveedor_ciudad');
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
var Provider = new ProviderJs();