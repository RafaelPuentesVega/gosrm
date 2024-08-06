<!-- Modal para agregar producto -->
<div class="modal fade" id="modalDetalleRemision" tabindex="-1" role="dialog" aria-labelledby="modalDetalleRemisionLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modalDetalleRemisionLabel">Detalle Remision - <span id="idRemision"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class=" table table-style" width="100%"
                    style="border-radius: 8px;box-shadow: 0 0 11px 4px #0000001f;  font-size: 13px; border: rgba(255, 255, 255, 0) 2.5px solid">

                    <tr style=" font-size: 17px;  ">
                        <th colspan="4"
                            style="padding: 1px ;border-top-left-radius: 10px; border-top-right-radius: 10px;background-color: #AED6F1 ;height: 1%; text-align: center; font-weight:normal; border: rgba(0, 0, 0, 0) 1.5px solid">
                            &nbsp;<label style="color: #1C2833; font-size: 14px"><strong>CLIENTE</strong> </label> </th>
                        </th>
                    </tr>
                    <tr style=" font-size: 12px ">
                        <th width=""
                            style=" height: 40px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.5px solid">
                            &nbsp;<strong><label>Nit o C.C: &nbsp; </label><span id="documento"
                                    class="text-uppercase"></span></strong>
                        </th>
                        <th style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                            &nbsp; <strong>
                                <label>Nombre:&nbsp;</label><span id="nombres" class="text-uppercase"></span></strong>
                        </th>
                        <th width=""
                            style="font-size: 11px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                            &nbsp;<strong><label>E-Mail:&nbsp;</label><span id="correo"
                                    class="text-uppercase"></span></strong>
                        </th>

                    </tr>

                    <tr>
                        <th width="30%"
                            style="font-size: 12px ; font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                            &nbsp;<strong><label>Telefono:&nbsp;</label><span id="telefono"
                                    class="text-uppercase"></span></strong>

                        </th>
                        <th width="30%"
                            style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                            &nbsp;<strong><label>Celular:&nbsp;</label><span id="celular"
                                    class="text-uppercase"></span></strong>

                        </th>
                        <th width="40%"
                            style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                            &nbsp;<strong><label>Direccion:&nbsp;</label><span id="direccion"
                                    class="text-uppercase"></span></strong>

                        </th>

                    </tr>
                </table>

                <br>
                <h4 style="text-align: center">Productos</h4>
                <table id="tablaDetalleProductos" class="table table-striped " style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" style="text-align: right;">Total:</th>
                            <th id="totalPrecio" style="text-align: left;">$0.00</th>
                        </tr>
                    </tfoot>
                </table>

                <!-- Campo para mostrar método de pago -->
                <div class="form-group">
                    <label><strong>Método de Pago:</strong></label>
                    <p id="metodoPago" class="text-uppercase"></p>
                </div>

                <!-- Botón para imprimir -->
                <div class="text-center">
                    <button id="btnImprimirRemision" class="btn btn-primary">Imprimir</button>
                </div>

            </div>
        </div>
    </div>
</div>
