$('#btn-logout').click(function () {

    swal({
        title: "Realmente deseja sair?",
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        buttons: ['Cancelar', 'Sair'],
    })
        .then((willLogout) => {
            if (willLogout) {
                $('#logout-form').submit();
            }
            swal.close();
        });
});
