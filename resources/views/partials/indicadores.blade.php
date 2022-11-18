<div class="section">
    <button class="btn blue" onclick="traerValores('dolar')">Dolar</button>
    <button class="btn pink" id="euro">Euro</button>
    <button class="btn red" id="uf">UF</button>
    <button class="btn yellow" id="utm">U.T.M</button>
</div>
<div class="section">
    <table class="striped centered #bbdefb blue lighten-4">
        <thead>
        <tr>
            <th>Fecha</th>
            <th>Valor</th>
        </tr>
        </thead>
        <tbody id="indicadores">

        </tbody>
    </table>
</div>
<script>
    document.querySelector('#euro').addEventListener('click', function () {
        traerValores('euro');
    });
    document.querySelector('#uf').addEventListener('click', function () {
        traerValores('uf');
    });
    document.querySelector('#utm').addEventListener('click', function () {
        traerValores('utm');
    });


    //Parametro desde querySelector y se pasa el tipo de valor
    function traerValores(valor) {
        let url = `https://mindicador.cl/api/${valor}`;

        //consulta con AJAX
        const api = new XMLHttpRequest();

        api.open('GET', url, true);

        api.send();

        api.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {

                //parsear json, primero se crea variable y posterior el responseText
                let datos = JSON.parse(this.responseText);
                //console.log(datos.serie);

                //guardar variable result, que viene del html
                let resultado = document.querySelector('#indicadores');
                resultado.innerHTML = '';

                let i = 0;

                //ciclo para recorrer array
                for (let item of datos.serie) {
                    //console.log(item.fecha);

                    i++;

                    //substring para cortar texto, se parte del 10 al caracter 10
                    resultado.innerHTML += `
                    <tr>
                    <td>${item.fecha.substring(0, 10)}</td>
                    <td>$${item.valor}</td>
                    </tr>
                    `;

                    if (i > 5) {
                        break;
                    }
                }
            }
        }
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
