@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="text-center">
                <h3>Editar el horario del medicamento {{ $medicamento->nombre }}</h3>
            </div><br>
            <form class="form-floating" action=" {{ route('medicamentos.update', $medicamento->id) }} " method="POST">
                @csrf
                {{ method_field('PATCH') }}
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="form-floating">
                            <select class="form-select" id="nombre" name="nombre">
                                <option selected>{{ $medicamento->nombre }}</option>
                                <option value="Acetaminofen">Acetaminofén</option>
                                <option value="Acido Acetilsalicilico">Ácido Acetilsalicílico</option>
                                <option value="Esomeprazol">Esomeprazol</option>
                            </select>
                            <label for="floatingSelect">Nombre del medicamento</label>
                        </div>
                    </div>
                </div><br>
                <div class="row justify-content-center">
                    <div class="col-md-auto">

                        <div class="btn-group btn-group-sm flex-wrap" data-toggle="buttons" name="grupo_dia" role="group"
                            aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" class="form-check-input btn-check" value="lunes" id="lunes"
                                autocomplete="off" name="dias[]">
                            <label class="btn btn-outline-primary" for="lunes">Lunes</label>

                            <input type="checkbox" class="form-check-input btn-check" value="martes" id="martes"
                                autocomplete="off" name="dias[]">
                            <label class="btn btn-outline-primary" for="martes">Martes</label>

                            <input type="checkbox" class="form-check-input btn-check" value="miercoles" id="miercoles"
                                autocomplete="off" name="dias[]">
                            <label class="btn btn-outline-primary" for="miercoles">Miércoles</label>

                            <input type="checkbox" class="form-check-input btn-check" value="jueves" id="jueves"
                                autocomplete="off" name="dias[]">
                            <label class="btn btn-outline-primary" for="jueves">Jueves</label>
                            <input type="checkbox" class="form-check-input btn-check" value="viernes" id="viernes"
                                autocomplete="off" name="dias[]">
                            <label class="btn btn-outline-primary" for="viernes">Viernes</label>

                            <input type="checkbox" class="form-check-input btn-check" value="sabado" id="sabado"
                                autocomplete="off" name="dias[]">
                            <label class="btn btn-outline-primary" for="sabado">Sábado</label>

                            <input type="checkbox" class="form-check-input btn-check" value="domingo" id="domingo"
                                autocomplete="off" name="dias[]">
                            <label class="btn btn-outline-primary" for="domingo">Domingo</label>
                        </div>
                    </div>
                </div><br>
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="form-floating">
                            <input type="time" class="form-control" name="hora" id="hora"
                                value="{{ $medicamento->hora }}">
                            <label for="floatingPassword">Hora de tomar el medicamento</label>
                        </div>
                    </div>
                </div><br>
                <div class="row justify-content-center">
                    <div class="col-md-auto">
                        <div class="form-group">
                            <a class="btn btn-danger" href="{{ route('medicamentos.index') }}">Cancelar</a>
                            <button type="submit" class="btn btn-success">Editar</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
