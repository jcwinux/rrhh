@extends('pages._templates.template_reclutamiento')
@section('content')
<div class="wrap">
<div class="content container">
        <div class="row">
            <div class="col-sm-12">
                <section class="widget">
                    <header>
                        <h4><i class="fa fa-user"></i> Persona <small>Creación</small></h4>
                    </header>
                    <div class="body">
                        <form id="persona-form" 
							  action="#"
							  class="form-horizontal form-label-left"
                              method="post">
							  {{ csrf_field() }}
                            <fieldset>
                                <legend class="section">Información personal</legend>
								<div class="form-group">
									<label for="num_identificacion" class="control-label col-sm-2">Num. identificación <span class="required">*</span></label>
									<div class="col-sm-3">
										<div class="input-group">
											<input id="num_identificacion" class="form-control" required="required" type="text" name="num_identificacion" maxlength="30">
											<input id="person_id" type="hidden" name="person_id" value="">
											<span class="input-group-btn">
												<select id="document_type" class="selectpicker" data-style="btn-default" data-width="auto">
												@foreach ($tipo_doc as $t)
													<option value="{{$t->id}}">{{$t->descripcion}}</option>
												@endforeach
												</select>
											</span>
										</div>
									</div>
                                </div>

								<div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="primer_nombre">Primer nombre <span class="required">*</span></label>
										<div class="col-sm-3"><input type="text" id="primer_nombre" name="primer_nombre" required="required" class="form-control" maxlength="30"></div>
									</div>	
									<div class="cols-md-6">
										<label class="control-label col-sm-2 col-sm-offset-1" for="segundo_nombre">Segundo nombre</label>
										<div class="col-sm-3"><input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control" maxlength="30"></div>
									</div>
								</div>
								<div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="primer_apellido">Primer apellido <span class="required">*</span></label>
										<div class="col-sm-3"><input type="text" id="primer_apellido" name="primer_apellido" required="required" class="form-control" maxlength="30"></div>
									</div>
									<div class="cols-md-6">
										<label class="control-label col-sm-2 col-sm-offset-1" for="segundo_apellido">Segundo apellido</label>
										<div class="col-sm-3"><input type="text" id="segundo_apellido" name="segundo_apellido" class="form-control" maxlength="30"></div>
									</div>
								</div>
                                <div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2">Sexo <span class="required">*</span></label>
										<div class="col-sm-3">
											<div id="gender" class="btn-group" data-toggle="buttons">
												<label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
													<input type="radio" id="hombre" name="sexo" value="hombre" checked>Hombre
												</label>
												<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
													<input type="radio" id="mujer" name="sexo" value="mujer">&nbsp; Mujer &nbsp;
												</label>
											</div>
										</div>
									</div>
									<div class="cols-md-6">
										<label for="fecha_ncto" class="control-label col-sm-2 col-sm-offset-1">Fecha de nacimiento <span class="required">*</span></label>
										<div class="col-sm-3"><input id="fecha_ncto" class="date-picker form-control" required="required" type="text" name="fecha_ncto" value="" ></div>
									</div>
                                </div>
								<div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="nacionalidad">Nacionalidad <span class="required">*</span></label>
										<div class="col-sm-3"><input type="text" id="nacionalidad" name="nacionalidad" required="required" class="form-control" ></div>
									</div>
									<div class="cols-md-6">
										<label class="control-label col-sm-2 col-sm-offset-1" for="trato">Trato <span class="required">*</span></label>
										<div class="col-sm-3"><input type="text" id="trato" name="trato" class="form-control" required="required"></div>
									</div>
								</div>
								<div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="estado_civil">Estado civil</label>
										<div class="col-sm-3">
											<select class="form-control" id="estado_civil" name="estado_civil" required="required">
												<option value=""></option>
												@foreach ($est_civil as $e)
													<option value="{{$e->id}}">{{$e->descripcion}}</option>
												@endforeach
											</select>
										</div>
									</div>	
									<div class="cols-md-6">
										<label class="control-label col-sm-2 col-sm-offset-1" for="nacionalidad">Foto <span class="required">*</span></label>
										<div class="col-sm-3"><input type="file" id="nacionalidad" name="nacionalidad" required="required" class="form-control" ></div>
									</div>
								</div>
                            </fieldset>
                            <fieldset>
                                <legend class="section">Información de contacto</legend>
                                <div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="correo_electronico">Correo electrónico</label>
										<div class="col-sm-3"><input type="text" id="correo_electronico" name="correo_electronico" class="form-control" ></div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="numero_convencional">Número convencional</label>
										<div class="col-sm-3"><input type="text" id="numero_convencional" name="numero_convencional" class="form-control" ></div>
									</div>
									<div class="cols-md-6">
										<label class="control-label col-sm-2 col-sm-offset-1" for="numero_celular">Número celular</label>
										<div class="col-sm-3"><input type="text" id="numero_celular" name="numero_celular" class="form-control" ></div>
									</div>
								</div>
                            </fieldset>
                            <fieldset>
                                <legend class="section">
                                    Domicilio actual
                                </legend>
                                <div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="provincia_residencia">Provincia residencia</label>
										<div class="col-sm-3">
											<select class="form-control" id="provincia_residencia" name="provincia_residencia" required="required">
												<option value=""></option>
												@foreach ($provinc as $p)
													<option value="{{$p->id}}">{{$p->nombre}}</option>
												@endforeach
											</select>
										</div>
									</div>	
									<div class="cols-md-6">
										<label class="control-label col-sm-2 col-sm-offset-1" for="ciudad_residencia">Ciudad residencia</label>
										<div class="col-sm-3">
											<select class="form-control" id="ciudad_residencia" name="ciudad_residencia" required="required">
											</select>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="cols-md-12">
										<label class="control-label col-sm-2" for="parroquia_residencia">Parroquia residencia</label>
										<div class="col-sm-3">
											<select class="form-control" id="parroquia_residencia" name="parroquia_residencia" required="required">
											</select>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="calle_principal">Calle principal</label>
										<div class="col-sm-3"><input type="text" id="calle_principal" name="calle_principal" class="form-control" ></div>
									</div>
									<div class="cols-md-6">
										<label class="control-label col-sm-2 col-sm-offset-1" for="calle_transversal">Calle transversal</label>
										<div class="col-sm-3"><input type="text" id="calle_transversal" name="calle_transversal" class="form-control" ></div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="manzana">Manzana</label>
										<div class="col-sm-3"><input type="text" id="manzana" name="manzana" class="form-control" ></div>
									</div>
									<div class="cols-md-6">
										<label class="control-label col-sm-2 col-sm-offset-1" for="villa">Villa</label>
										<div class="col-sm-3"><input type="text" id="villa" name="villa" class="form-control" ></div>
									</div>
								</div>
                            </fieldset>
							<fieldset>
                                <legend class="section">
                                    Formación académica
                                    <button type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalEstudiosRealizados" data-backdrop="static">
                                        <i class="fa fa-plus"></i>
                                        Añadir
                                    </button>
                                </legend>
								<table class="table table-hover table-bordered" id="estudios_agregados" name="estudios_agregados">
								<thead>
									<tr>
										<th width="40%">Nivel</th>
										<th width="40%">Institución</th>
										<th width="10%">Año</th>
										<th width="10%">Opciones</th>
									</tr>
								</thead>
								<tbody id="det_estudios_agregados">
								</tbody>
								</table>
                            </fieldset>
							<fieldset>
                                <legend class="section">
                                    Cursos realizados
                                    <button type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalCursosRealizados" data-backdrop="static">
                                        <i class="fa fa-plus"></i>
                                        Añadir
                                    </button>
                                </legend>
								<table class="table table-hover table-bordered" id="cursos_realizados" name="cursos_realizados">
								<thead>
									<tr>
										<th width="20%">Curso</th>
										<th width="20%">Institución</th>
										<th width="10%">Tipo</th>
										<th width="10%">Modalidad</th>
										<th width="10%">Desde</th>
										<th width="10%">Hasta</th>
										<th width="10%">Horas</th>
										<th width="10%">Opciones</th>
									</tr>
								</thead>
								<tbody id="det_cursos_realizados">
								</tbody>
								</table>
                            </fieldset>
							<fieldset>
                                <legend class="section">
                                    Idiomas
                                    <button type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalIdiomas" data-backdrop="static">
                                        <i class="fa fa-plus"></i>
                                        Añadir
                                    </button>
                                </legend>
								<table class="table table-hover table-bordered" id="idiomas_agregados" name="idiomas_agregados">
								<thead>
									<tr>
										<th width="30%">Idioma</th>
										<th width="30%">Habilidad</th>
										<th width="30%">Dominio</th>
										<th width="10%">Opciones</th>
									</tr>
								</thead>
								<tbody id="det_idiomas_agregados">
								</tbody>
								</table>
                            </fieldset>
							<fieldset>
                                <legend class="section">
                                    Experiencia laboral
                                    <button type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalExperienciasLaborales" data-backdrop="static">
                                        <i class="fa fa-plus"></i>
                                        Añadir
                                    </button>
                                </legend>
								<table class="table table-hover table-bordered" id="experiencias_laborales" name="experiencias_laborales">
								<thead>
									<tr>
										<th width="15%">Empresa</th>
										<th width="20%">Dirección</th>
										<th width="15%">Cargo</th>
										<th width="10%">Desde</th>
										<th width="10%">Hasta</th>
										<th width="20%">Funciones</th>
										<th width="10%">Opciones</th>
									</tr>
								</thead>
								<tbody id="det_experiencias_laborales">
								</tbody>
								</table>
                            </fieldset>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-sm-7 col-sm-offset-5">
                                        <button type="submit" class="btn btn-primary" title="Guardar cambios"> Guardar <span class=" fa fa-floppy-o"></span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        </div>
        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin"></i>
        </div>
    </div>
	<!--Modals-->
	<div id="modalEstudiosRealizados" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel2">Estudios realizados</h4>
				</div>
				<div class="modal-body">
					<fieldset>
					<div class="form-group">
						<label class="control-label" for="nivel_estudio">Nivel</label>
						<select class="form-control" id="nivel_estudio" name="nivel_estudio" required="required">
							@foreach ($niv_estudio as $n)
								<option value="{{$n->id}}">{{$n->descripcion}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="institucion">Institución</label>
						<input type="text" id="institucion" name="institucion" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label" for="anio">Año</label>
						<input type="text" id="anio" name="anio" class="form-control">
					</div>
				</fieldset>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" id="AgregarEstudio" name="AgregarEstudio">Agregar</button>
				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	
	<div id="modalCursosRealizados" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel2">Cursos realizados</h4>
				</div>
				<div class="modal-body">
					<fieldset>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label" for="curso">Curso</label>
								<input type="text" id="curso" name="curso" class="form-control">
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label" for="institucion_curso">Institución</label>
								<input type="text" id="institucion_curso" name="institucion_curso" class="form-control">
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="curso">Tipo</label>
								<select id="tipo_curso" name="tipo_curso" class="form-control">
								@foreach ($tipo_curso as $tc)
									<option value="{{$tc->id}}">{{$tc->descripcion}}</option>
								@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="curso">Modalidad</label>
								<select id="modalidad_curso" name="modalidad_curso" class="form-control">
								@foreach ($mod_curs as $mc)
									<option value="{{$mc->id}}">{{$mc->descripcion}}</option>
								@endforeach
								</select>
							</div>
						</div>
					</div>	
					
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label" for="fecha_desde">Desde</label>
								<input id="curso_fecha_desde" class="date-picker form-control" required="required" type="text" name="curso_fecha_desde" value="" >
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label" for="fecha_hasta">Hasta</label>
								<input id="curso_fecha_hasta" class="date-picker form-control" required="required" type="text" name="curso_fecha_hasta" value="" >
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label" for="anio_curso">Número de horas</label>
								<input type="text" id="horas_curso" name="horas_curso" class="form-control">
							</div>
						</div>
					</div>
				</fieldset>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" id="AgregarCurso" name="AgregarCurso">Agregar</button>
				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	
	<div id="modalIdiomas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel2">Idiomas</h4>
				</div>
				<div class="modal-body">
					<fieldset>
						<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label" for="idioma">Idioma</label>
								<select id="idioma" name="idioma" class="form-control">
								@foreach ($idiomas as $idioma)
									<option value="{{$idioma->id}}">{{$idioma->descripcion}}</option>
								@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label" for="hablidad">Habilidad</label>
								<select id="hablidad" name="hablidad" class="form-control">
								@foreach ($habilidades as $habilidad)
									<option value="{{$habilidad->id}}">{{$habilidad->descripcion}}</option>
								@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label" for="dominio">Dominio</label>
								<select id="dominio" name="dominio" class="form-control">
								@foreach ($dominios as $dominio)
									<option value="{{$dominio->id}}">{{$dominio->descripcion}}</option>
								@endforeach
								</select>
							</div>
						</div>
					</div>
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" id="AgregarIdioma" name="AgregarIdioma">Agregar</button>
				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	
	<div id="modalExperienciasLaborales" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel2">Experiencias laborales</h4>
				</div>
				<div class="modal-body">
					<fieldset>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label" for="empresa">Empresa</label>
								<input type="text" id="empresa" name="empresa" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label" for="cargo">Dirección</label>
								<input type="text" id="direccion" name="direccion" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label" for="cargo">Cargo</label>
								<input type="text" id="cargo" name="cargo" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="fecha_desde">Desde</label>
								<input id="exp_fecha_desde" class="date-picker form-control" required="required" type="text" name="exp_fecha_desde" value="" >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label" for="fecha_hasta">Hasta</label>
								<input id="exp_fecha_hasta" class="date-picker form-control" required="required" type="text" name="exp_fecha_hasta" value="" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label" for="fecha_desde">Descripción de las funciones</label>
								<textarea id="exp_descripcion" name="exp_descripcion" class="form-control"></textarea>
							</div>
						</div>
					</div>
				</fieldset>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" id="AgregarExperienciaLaboral" name="AgregarExperienciaLaboral">Agregar</button>
				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
@stop
@section('javascript_functions')
	 <script src="{{asset('js/functions/form_persona_crear.js')}}?{{$str_random[0]}}{{$str_random[1]}}{{$str_random[2]}}"></script> 
@stop