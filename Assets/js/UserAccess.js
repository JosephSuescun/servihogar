class UserAccessJs {

    insertUserAccess() {
        var object = new FormData(document.querySelector('#insert_user_access'));
        fetch('UserAccessController/insertUserAccess', {
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

    showUserAccess(id) {
        var object = new FormData();

        object.append('id', id);

        fetch('UserAccessController/showUserAccess', {
            method: 'POST',
            body: object
        })
            .then((resp) => resp.text())
            .then(function (response) {
                $('#content').html(response);
                //$('#my_modal').modal('show');

                //document.querySelector('#modal_title').innerHTML = "Actualizar Cliente";

                //document.querySelector('#modal_content').innerHTML = response;
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    updateUserAccess() {
        var object = new FormData(document.querySelector('#update_user_access'));

        fetch('UserAccessController/updateUserAccess', {
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

}
var UserAccess = new UserAccessJs();