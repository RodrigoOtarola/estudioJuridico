<div class="collapsible-header" id="traerFeriados">
    <i class="material-icons">list_alt</i>
    Feriados en chile.
    <span class="badge"></span>
</div>
<div class="collapsible-body white">
    <table class="striped centered #bbdefb blue lighten-4">
        <thead>
        <tr>
            <th>Fecha</th>
            <th>Nombre</th>
            <th>Tipo</th>
        </tr>
        </thead>
        <tbody id="feriados">

        </tbody>
    </table>
</div>

<!--Instancia de axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script>
    //id a leer
    const traerFeriados = document.querySelector('#traerFeriados');

    //Variable a llenar dinamicamente
    const feriados = document.querySelector('#feriados');

    let datos = [];

    traerFeriados.addEventListener('click', () => {

        axios
            .get('https://api.victorsanmartin.com/feriados/en.json')
            .then(res => {
                datos = (this.info = res.data)
                //console.log(datos);

                //creacion de elemento html vacio
                feriados.innerHTML = '';

                for (let item of datos.data) {

                    //console.log(item);

                    //Llenar tabla dinamicamente
                    feriados.innerHTML += `
                    <tr>
                        <td>${item.date}</td>
                        <td>${item.title}</td>
                        <td>${item.extra}</td>
                    </tr>`;
                }
            })
    });
</script>



