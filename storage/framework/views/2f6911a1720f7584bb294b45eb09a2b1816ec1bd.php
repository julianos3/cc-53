<div class="modal fade modal-success" id="modalComment" aria-hidden="true" aria-labelledby="modalComment"
     role="dialog" tabindex="-1">'
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo Form::open(['route'=>'portal.communication.message.public.reply.store']); ?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Comentar</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo Form::label('message', 'Resposta *', ['class' => 'font-weight-bold']); ?>

                            <?php echo Form::textarea('message', null, ['class'=>'form-control', 'required' => 'required']); ?>

                        </div>
                    </div>
                </div>

                <input type="hidden" name="message_id" id="messageId" value="" />
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                <button type="submit" data-toggle="tooltip" data-original-title="Enviar Resposta" class="btn btn-success waves-effect waves-light">
                    <i class="icon md-check" aria-hidden="true"></i>
                    Enviar Resposta
                </button>
            </div>


            <?php echo Form::close(); ?>

        </div>
    </div>
</div>