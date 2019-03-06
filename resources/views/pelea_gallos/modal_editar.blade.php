<!-- Modal -->
<div class="modal fade" id="peleaGallosEditarModal" tabindex="-1" role="dialog" aria-labelledby="peleaGallosEditarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="peleaGallosEditarModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action=" {{ url('/pelea_gallos/actualizar') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" placeholder="Id pelea gallo" value="" style="visibility:hidden">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ganador" class="col-sm-3 col-form-label">Ganador:</label>
                        <div class="col-sm-9">
                            <select name="ganador" id="ganador" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tiempo" class="col-sm-3 col-form-label">Tiempo:</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" id="tiempo" name="tiempo" value="00:05">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="observacion" class="col-sm-3 col-form-label">Observación:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="observacion" name="observacion" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" id="actualizar" class="btn btn-primary" >Actualizar</button>
                    <button type="button" id="cerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>