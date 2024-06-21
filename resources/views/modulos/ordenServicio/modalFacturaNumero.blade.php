<!-- Modal AUTORIZAR -->
<div class="modal fade " id="md-facturaNumero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card "  >
                <div class="header" style="background-color: #06419f">
                    <h3 class="title text-center" style="font-size: 20px; color: #ffffff ; padding-bottom :8px;"><strong>AGREGAR NUMERO DE FACTURA</strong></h3>
                </div>
            </div>
            <div class="modal-header">
                <table style="margin-top: -35px" id="clients" class="table table-striped" border bordercolor="#CDCDD8">
                    <thead style="background:#aed6f18a" class="thead">
                        <tr>
                            <th scope="col" class="text-center" style="color:#16172C"><strong>CLIENTE</strong></th>
                            <th scope="col" class="text-center" style="height: 1px; color:#16172C"><strong>DOCUMENTO</strong></th>
                            <th scope="col" class="text-center" style="color:#16172C"><strong>NOMBRES</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tr>
                    <th id="clienteTipo" width="33%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                        &nbsp;<label><strong>asa</strong></label>

                    </th>
                    <th id="clienteDocumento" width="33%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                    &nbsp;<label><strong id="nombreCliente"></strong></label>
                    </th>

                    <th id="clienteNombre" width="33%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                        &nbsp;<label><strong>asa</strong></label>
                    </th>
                </tr>
                    </tbody>
                </table>
                <table id="equipo" class="table table-striped" border bordercolor="#CDCDD8">
                    <thead style="background:#aed6f18a" class="thead">
                        <tr>
                            <th scope="col" class="text-center" style="color:#16172C"><strong>EQUIPO</strong></th>
                            <th scope="col" class="text-center" style="color:#16172C"><strong>MARCA</strong></th>
                            <th scope="col" class="text-center" style="color:#16172C"><strong>REFERENCIA</strong></th>
                            <th scope="col" class="text-center" style="color:#16172C"><strong>SERIAL</strong></th>

                        </tr>
                    </thead>
                    <tbody>
                        </tr>
                            <th id="equipoRepuesto" width="25%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                            &nbsp;<label><strong></strong></label>

                            </th>
                            <th id="equipoMarca" width="25%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                &nbsp;<label><strong></strong></label>

                            </th>
                            <th id="equipoReferencia" width="25%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                &nbsp;<label><strong></strong></label>
                            </th>
                            <th id="equipoSerial" width="25%"style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                            &nbsp;<label><strong></strong></label>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <div  id="repuestoFactura" >

                    {{-- IMPRIMIMOS EL CICLO DE LOS REPUESTOS --}}
                </div>
                <div class="card">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>&nbsp; VALOR TOTAL</label>
                                <input disabled type="text"  class="form-control" name="valorTotalOrden" id="valorTotalOrden"  required autocomplete="off" style="text-transform: uppercase">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>&nbsp; NUMERO DE FACTURA</label>
                                <input type="text"  class="form-control" name="numeroFactura" id="numeroFactura"  required autocomplete="off" style="text-transform: uppercase">
                            </div>
                        </div>

                    </div>

                </div>
                <button style="float: right" class="btn btn-success btn-fill" onclick="guardarNumeroFactura()" >GUARDAR</button>

                <button style="float: right ; margin-right: 15px" class="btn btn-danger btn-fill " onclick="CloseModal()">Cerrar</button>

                </div>
            </div>


        </div>
    </div>
</div>
