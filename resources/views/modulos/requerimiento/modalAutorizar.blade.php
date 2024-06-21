<!-- Modal AUTORIZAR -->
<div class="modal fade " id="md-autorizarRepuesto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="border-radius: 10px 10px 10px 10px">
        <div class="modal-content">
            <div class="card "  style="border-radius: 10px 10px 10px 10px" >
                <div class="header" style="background-color: #06419f">
                    <h3 class="title text-center" style="font-size: 20px; color: #ffffff ; padding-bottom :8px;"><strong>AUTORIZAR</strong></h3>
                </div>
            </div>
            <div class="modal-header">
                <table id="clients" class="table" style="border-collapse: collapse;border-radius: 8px;box-shadow: inset 0 0 0 1px #0000001f; font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">
                    <thead style="background-color: #AED6F1">
                        <tr>
                            <th scope="col" class="text-center" style="border-radius: 10px 0 0 0 ; color:rgb(57, 56, 56)"><strong>CLIENTE</strong></th>
                            <th scope="col" class="text-center" style="height: 1px; color:rgb(57, 56, 56)"><strong>DOCUMENTO</strong></th>
                            <th scope="col" class="text-center" style="border-radius: 0 10px 0 0 ;color:rgb(57, 56, 56)"><strong>NOMBRES</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tr>
                    <th id="clienteTipo" width="33%" style="font-size: 12px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0) 1.5px solid">
                        &nbsp;<label><strong></strong></label>

                    </th>
                    <th id="clienteDocumento" width="33%" style="font-size: 12px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0) 1.5px solid">
                    &nbsp;<label><strong id="nombreCliente"></strong></label>
                    </th>

                    <th id="clienteNombre" width="33%" style="font-size: 12px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0) 1.5px solid">
                        &nbsp;<label><strong></strong></label>
                    </th>
                </tr>
                    </tbody>
                </table>
                <table id="clients" class="table" style="border-collapse: collapse;border-radius: 8px;box-shadow: inset 0 0 0 1px #0000001f; font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">
                    <thead  class="">
                        <tr style="background-color: #AED6F1; ">
                            <th scope="col" class="text-center" style="color: rgb(57, 56, 56);border-radius: 10px 0 0 0;"><strong>EQUIPO</strong></th>
                            <th scope="col" class="text-center" style="color: rgb(57, 56, 56)"><strong>MARCA</strong></th>
                            <th scope="col" class="text-center" style="color: rgb(57, 56, 56)"><strong>REFERENCIA</strong></th>
                            <th scope="col" class="text-center" style="color: rgb(57, 56, 56) ;border-radius: 0 10px 0 0;"><strong>SERIAL</strong></th>

                        </tr >
                    </thead>
                    <tbody style="border: rgb(0, 0, 0) 1.5px solid">
                        <tr >
                            <th id="equipoRepuesto" width="25%" style="font-size: 12px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                            &nbsp;<label><strong></strong></label>

                            </th>
                            <th id="equipoMarca" width="25%" style="font-size: 12px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                &nbsp;<label><strong></strong></label>

                            </th>
                            <th id="equipoReferencia" width="25%" style="font-size: 12px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                &nbsp;<label><strong></strong></label>
                            </th>
                            <th id="equipoSerial" width="25%"style="font-size: 12px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                            &nbsp;<label><strong></strong></label>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <div class="card">
                    <div class="row">


                        <div class="col-md-2">
                            <div class="form-group">
                                <label><strong>CANTIDAD</strong></label>
                                <input type="number"  class="form-control" name="cantidadRepuesto" id="cantidadRepuesto"  required autocomplete="off" style="text-transform: uppercase">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label ><strong>REPUESTO</strong></label>
                                <input type="text" disabled maxlength="10" class="form-control"  name="nombreRepuesto" id="nombreRepuesto"  required autocomplete="off">
                            </div>

                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label ><strong>PRECIO UNITARIO</strong></label>
                                <input type="text" class="form-control number" placeholder="$ con IVA " maxlength="10" name="precioUnitario" id="precioUnitario"  autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10" style="text-align: right">
                            <div class="form-group">
                                <label for="">$ PRECIO TOTAL</label>
                            </div>
                        </div>

                        <div class="col-md-2" style="text-align: right">
                            <strong><div class="form-group" id="precioTotal" style="text-align: left; font-size: 15px">
                            </div></strong>
                        </div>
                    </div>
                </div>
                <button style="float: right" class="btn btn-success btn-fill" onclick="autorizarRepuesto()" >AUTORIZAR</button>

                <button style="float: right ; margin-right: 15px" class="btn btn-danger btn-fill " onclick="CloseModal()">Cerrar</button>

                </div>
            </div>


        </div>
    </div>
</div>
