document.addEventListener('DOMContentLoaded', function () {
    const selectSocio = document.querySelector('select[name="id_socio"]');
    const cobaseInput = document.getElementById('cobase');

    selectSocio.addEventListener('change', function () {
        const socioId = this.value;

        if (socioId) {
            fetch(`../../Controlador/SocioControlador.php?id=${socioId}`)
                .then(response => response.json())
                .then(data => {
                    cobaseInput.value = data.cobase || '';
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            cobaseInput.value = '';
        }
    });
});
