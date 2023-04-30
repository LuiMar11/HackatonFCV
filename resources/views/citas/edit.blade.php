@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="text-center">
                <h3>Editar cita {{ $cita->nombre }}</h3>
            </div><br>
            <form class="form-floating" action=" {{ route('citas.update', $cita->id) }} " method="POST">
                @csrf
                {{ method_field('PATCH') }}
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="nombre" id="nombre" required
                                value="{{ $cita->nombre }}">
                            <label for="nombre">Nombre cita o terapia</label>
                        </div>
                    </div>
                </div><br>
                <div class="row justify-content-center">
                    <div class="col-md-auto">
                        <div class="col-8">
                            <div class="form-floating">
                                <input type="date" class="form-control" name="nombre" id="nombre" required
                                    value="{{ $cita->fecha }}">
                                <label for="nombre">Fecha de la cita o terapia</label>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="form-floating">
                            <input type="time" class="form-control" name="hora" id="hora"
                                value="{{ $cita->hora }}">
                            <label for="floatingPassword">Hora de la cita</label>
                        </div>
                    </div>
                </div><br>
                <div class="row justify-content-center">
                    <div class="col-md-auto">
                        <div class="form-group">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Editar</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
