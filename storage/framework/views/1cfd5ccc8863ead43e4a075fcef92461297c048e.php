

<?php $__env->startSection('content'); ?>
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title"><?php echo e($config['title']); ?></h1>
        <ol class="breadcrumb" data-plugin="breadcrumb">
            <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
            <li><a href="<?php echo e(route('portal.manage.index')); ?>">Administração</a></li>
            <li class="active"><?php echo e($config['title']); ?></li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body">
              <div id="calendar"></div>
              
        <!--AddEvent Dialog -->
        <div class="modal fade" id="addNewEvent" aria-hidden="true" aria-labelledby="addNewEvent"
        role="dialog" tabindex="-1">
          <div class="modal-dialog">
            <form class="modal-content form-horizontal" action="#" method="post" role="form">
              <div class="modal-header">
                <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                <h4 class="modal-title">Reservar</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="newEname">Responsavel:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="newEname" name="newEname" readOnly="readOnly" value="Rodrigo Monteiro">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="repeats">Área comum:</label>
                  <div class="col-sm-10">
                      <select class="form-control">
                        <option>Selecionar</option>
                        <option>Salão de festas</option>
                        <option>Churrasqueira</option>
                        <option>Quadra de futsal</option>
                        <option>Quadra de tenis</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="starts">Data de inicio:</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <input type="text" class="form-control" id="starts" data-container="#addNewEvent"
                      data-plugin="datepicker">
                      <span class="input-group-addon">
                        <i class="icon md-calendar" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="ends">Data final (opcional):</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <input type="text" class="form-control" id="ends" data-container="#addNewEvent"
                      data-plugin="datepicker">
                      <span class="input-group-addon">
                        <i class="icon md-calendar" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="repeats">Repetir:</label>
                  <div class="col-sm-10">
                      <select class="form-control">
                        <option>Nunca</option>
                        <option>Semanal</option>
                        <option>Quinzenal</option>
                        <option>Mensal</option>
                        <option>Anual</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="people">Presentes:</label>
                  <div class="col-sm-10">
                    <select id="eventPeople" multiple="multiple" data-plugin="jquery-selective"></select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="form-actions">
                  <button class="btn btn-primary" data-dismiss="modal" type="button">Reservar</button>
                  <a class="btn btn-sm btn-white btn-pure" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- End AddEvent Dialog -->


        <!-- Edit Dialog -->
        <div class="modal fade" id="editNewEvent" aria-hidden="true" aria-labelledby="editNewEvent"
        role="dialog" tabindex="-1" data-show="false">
          <div class="modal-dialog">
            <form class="modal-content form-horizontal" action="#" method="post" role="form">
              <div class="modal-header">
                <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                <h4 class="modal-title">Editar minhas reserva</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="editEname">Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="editEname" name="editEname">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="editStarts">Starts:</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <input type="text" class="form-control" id="editStarts" name="editStarts" data-container="#editNewEvent"
                      data-plugin="datepicker">
                      <span class="input-group-addon">
                        <i class="icon md-calendar" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="editEnds">Ends:</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <input type="text" class="form-control" id="editEnds" data-container="#editNewEvent"
                      data-plugin="datepicker">
                      <span class="input-group-addon">
                        <i class="icon md-calendar" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="editRepeats">Repeats:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="editRepeats" name="repeats" data-plugin="TouchSpin"
                    data-min="0" data-max="10" value="0" />
                  </div>
                </div>
                <div class="form-group" id="editColor">
                  <label class="control-label col-sm-2">Color:</label>
                  <div class="col-sm-10">
                    <ul class="color-selector">
                      <li class="bg-blue-600">
                        <input type="radio" data-color="blue|600" name="colorChosen" id="editColorChosen2">
                        <label for="editColorChosen2"></label>
                      </li>
                      <li class="bg-green-600">
                        <input type="radio" data-color="green|600" name="colorChosen" id="editColorChosen3">
                        <label for="editColorChosen3"></label>
                      </li>
                      <li class="bg-cyan-600">
                        <input type="radio" data-color="cyan|600" name="colorChosen" id="editColorChosen4">
                        <label for="editColorChosen4"></label>
                      </li>
                      <li class="bg-orange-600">
                        <input type="radio" data-color="orange|600" name="colorChosen" id="editColorChosen5">
                        <label for="editColorChosen4"></label>
                      </li>
                      <li class="bg-red-600">
                        <input type="radio" data-color="red|600" name="colorChosen" id="editColorChosen6">
                        <label for="editColorChosen6"></label>
                      </li>
                      <li class="bg-blue-grey-600">
                        <input type="radio" data-color="blue-grey|600" name="colorChosen" id="editColorChosen7">
                        <label for="editColorChosen7"></label>
                      </li>
                      <li class="bg-purple-600">
                        <input type="radio" data-color="purple|600" name="colorChosen" id="editColorChosen8">
                        <label for="editColorChosen8"></label>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="editPeople">People:</label>
                  <div class="col-sm-10">
                    <select id="editPeople" multiple="multiple" data-plugin="jquery-selective"></select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="form-actions">
                  <button class="btn btn-primary" data-dismiss="modal" type="button">Save</button>
                  <button class="btn btn-danger" data-dismiss="modal" type="button">Delete</button>
                  <a class="btn btn-sm btn-white btn-pure" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>

        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>