<!-- Modal -->

<div class="modal fade " id="md-buscarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card " style="margin-bottom: -10px" >
                <div class="header" style=" border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #06419f">
                    <h3 class="title text-center" style="font-size: 20px; color: #ffffff ; padding-bottom :8px;"><strong>BUSCAR CLIENTE</strong></h3>
                </div>
            </div>
            <div class="modal-header">
                <table style="margin-top: -20px" id="clients" class="table table-striped" border bordercolor="#CDCDD8">
                    <thead style="background:#25273148" class="thead-light">
                        <tr>
                            <th scope="col"  width="20%" class="text-center" style="color:#16172C"><strong>CLIENTE</strong></th>
                            <th scope="col" width="20%" class="text-center" style="color:#16172C"><strong>Documento</strong></th>
                            <th scope="col" width="55%" class="text-center" style="color:#16172C"><strong>NOMBRES</strong></th>
                            <th scope="col" width="5%" class="text-center" style="color:#16172C"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td style="" height="10px" class="text-center">{{ $cliente->cliente_tipo }}</td>
                                <td class="text-center">{{ $cliente->cliente_documento }}</td>
                                <td class="text-center">{{ $cliente->cliente_nombres }}</td>
                                <td>
                                    <button title="SELECCIONAR" style="margin: 0%; border: none; outline:none; text-decoration: none" class="btn btn-round"
                                        onclick="consultarCliente('{{ $cliente->cliente_id }}')" >
                                        <i  style="margin: 0%; color: #2E86C1; font-size: 17px" class="bi bi-arrow-down-circle-fill box-info pull-left"></i>
                                    </button>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
                <button style="float: right" class="btn btn-danger btn-fill " onclick="cerrarModal()">Cerrar</button>

            </div>
        </div>
    </div>
</div>
