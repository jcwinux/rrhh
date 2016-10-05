@extends('pages._templates.template_reclutamiento')
@section('content')
<div class="wrap">
<div class="content container">
        <div class="row">
            <div class="col-sm-12">
                <section class="widget">
                    <header>
                        <h4><i class="fa fa-user"></i> Persona <small>Creación o edición</small></h4>
                    </header>
                    <div class="body">
                        <form id="user-form" class="form-horizontal form-label-left"
                              novalidate="novalidate"
                              method="post"
                              data-parsley-priority-enabled="false"
                              data-parsley-excluded="input[name=gender]">
                            <div class="row">
                                <div class="col-sm-2 col-sm-offset-10">
                                    <div class="text-align-center">
                                        <img class="img-circle" src="img/3.png" alt="64x64" style="height: 112px;">
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-sm-2 col-sm-offset-10">
									<div class="text-align-center form-actions fileupload-buttonbar no-margin">
										<span class="btn btn-default fileinput-button mr-xs">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Add files...</span>
                                        <input type="file" name="files[]" multiple>
                                    </span>
									</div>
                                </div>
                            </div>
                            <fieldset>
                                <legend class="section">Información personal</legend>
								<div class="form-group">
									<label for="num_identificacion" class="control-label col-sm-2">Num. identificación <span class="required">*</span></label>
									<div class="col-sm-3">
										<div class="input-group">
											<input id="num_identificacion" class="form-control" required="required" type="text" name="num_identificacion" maxlength="30">
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
										<label class="control-label col-sm-2 col-sm-offset-2" for="segundo_nombre">Segundo nombre</label>
										<div class="col-sm-3"><input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control" maxlength="30"></div>
									</div>
								</div>
								<div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="primer_apellido">Primer apellido <span class="required">*</span></label>
										<div class="col-sm-3"><input type="text" id="primer_apellido" name="primer_apellido" required="required" class="form-control" maxlength="30"></div>
									</div>
									<div class="cols-md-6">
										<label class="control-label col-sm-2 col-sm-offset-2" for="segundo_apellido">Segundo apellido</label>
										<div class="col-sm-3"><input type="text" id="segundo_apellido" name="segundo_apellido" class="form-control" maxlength="30"></div>
									</div>
								</div>
                                <div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2">Sexo <span class="required">*</span></label>
										<div class="col-sm-3">
											<div id="gender" class="btn-group" data-toggle="buttons">
												<label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
													<input type="radio" name="sexo" value="1" checked>Hombre
												</label>
												<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
													<input type="radio" name="sexo" value="0">&nbsp; Mujer &nbsp;
												</label>
											</div>
										</div>
									</div>
									<div class="cols-md-6">
										<label for="fecha_ncto" class="control-label col-sm-2 col-sm-offset-2">Fecha de nacimiento <span class="required">*</span></label>
										<div class="col-sm-3"><input id="fecha_ncto" class="date-picker form-control" required="required" type="text" name="fecha_ncto" value=""></div>
									</div>
                                </div>
								<div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="nacionalidad">Nacionalidad <span class="required">*</span></label>
										<div class="col-sm-3"><input type="text" id="nacionalidad" name="nacionalidad" required="required" class="form-control" ></div>
									</div>
									<div class="cols-md-6">
										<label class="control-label col-sm-2 col-sm-offset-2" for="trato">Trato <span class="required">*</span></label>
										<div class="col-sm-3"><input type="text" id="trato" name="trato" class="form-control" required="required"></div>
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
										<label class="control-label col-sm-2 col-sm-offset-2" for="numero_celular">Número celular</label>
										<div class="col-sm-3"><input type="text" id="numero_celular" name="numero_celular" class="form-control" ></div>
									</div>
								</div>
                            </fieldset>
                            <fieldset>
                                <legend class="section">
                                    Dirección
                                </legend>
                                <div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="ciudad_residencia">Ciudad residencia</label>
										<div class="col-sm-3">
											<select class="form-control" required="required">
												@foreach ($provinc as $p)
													<option value="{{$p->id}}">{{$p->nombre}}</option>
												@endforeach
											</select>
										</div>
									</div>	
									<div class="cols-md-6">
										<label class="control-label col-sm-2 col-sm-offset-2" for="ciudad_residencia">Ciudad residencia</label>
										<div class="col-sm-3">
											<select class="form-control" required="required">
												@foreach ($provinc as $p)
													<option value="{{$p->id}}">{{$p->nombre}}</option>
												@endforeach
											</select>
										</div>
									</div>	
								</div>
								
								<div class="form-group">
									<div class="cols-md-12">
										<label class="control-label col-sm-2" for="parroquia_residencia">Parroquia residencia</label>
										<div class="col-sm-3"><input type="text" id="parroquia_residencia" name="parroquia_residencia" class="form-control" ></div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="calle_principal">Calle principal</label>
										<div class="col-sm-3"><input type="text" id="calle_principal" name="calle_principal" class="form-control" ></div>
									</div>
									<div class="cols-md-6">
										<label class="control-label col-sm-2 col-sm-offset-2" for="calle_transversal">Calle transversal</label>
										<div class="col-sm-3"><input type="text" id="calle_transversal" name="calle_transversal" class="form-control" ></div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="cols-md-6">
										<label class="control-label col-sm-2" for="manzana">Manzana</label>
										<div class="col-sm-3"><input type="text" id="manzana" name="first-name" class="form-control" ></div>
									</div>
									<div class="cols-md-6">
										<label class="control-label col-sm-2 col-sm-offset-2" for="villa">Villa</label>
										<div class="col-sm-3"><input type="text" id="villa" name="villa" class="form-control" ></div>
									</div>
								</div>
                            </fieldset>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-4">
                                        <button type="submit" class="btn btn-primary">Validar y Enviar</button>
                                        <button type="reset" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Limpiar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
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
@stop
@section('titulo')
	Nueva Persona
@stop