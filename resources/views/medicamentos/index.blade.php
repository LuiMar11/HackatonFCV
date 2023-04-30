@extends('layouts.app')
@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid">
        <br>
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-header text-center">
                    <h3>Lista medicamentos</h3>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Agregar medicamento
                    </button>
                    <!-- Modal crear-->
                    <div class="modal fade align-middle" id="staticBackdrop" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="staticBackdropLabel">Agregar medicamento</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-floating" action="{{ route('medicamentos.store') }}"method="POST">
                                        @csrf
                                        <div class="form-floating">
                                            <select class="form-select" id="nombre" name="nombre">
                                                <option selected>Seleccione un medicamento</option>
                                                <option value="Acetaminofen">Acetaminofén</option>
                                                <option value="Acido Acetilsalicilico">Ácido Acetilsalicílico</option>
                                                <option value="Esomeprazol">Esomeprazol</option>
                                            </select>
                                            <label for="floatingSelect">Nombre del medicamento</label>
                                        </div><br>
                                        <div class="btn-group btn-group-sm flex-wrap" data-toggle="buttons" name="grupo_dia"
                                            role="group" aria-label="Basic checkbox toggle button group">
                                            <input type="checkbox" class="form-check-input btn-check" value="lunes"
                                                id="lunes" autocomplete="off" name="dias[]">
                                            <label class="btn btn-outline-primary" for="lunes">Lunes</label>

                                            <input type="checkbox" class="form-check-input btn-check" value="martes"
                                                id="martes" autocomplete="off" name="dias[]">
                                            <label class="btn btn-outline-primary" for="martes">Martes</label>

                                            <input type="checkbox" class="form-check-input btn-check" value="miercoles"
                                                id="miercoles" autocomplete="off" name="dias[]">
                                            <label class="btn btn-outline-primary" for="miercoles">Miércoles</label>

                                            <input type="checkbox" class="form-check-input btn-check" value="jueves"
                                                id="jueves" autocomplete="off" name="dias[]">
                                            <label class="btn btn-outline-primary" for="jueves">Jueves</label>
                                            <input type="checkbox" class="form-check-input btn-check" value="viernes"
                                                id="viernes" autocomplete="off" name="dias[]">
                                            <label class="btn btn-outline-primary" for="viernes">Viernes</label>

                                            <input type="checkbox" class="form-check-input btn-check" value="sabado"
                                                id="sabado" autocomplete="off" name="dias[]">
                                            <label class="btn btn-outline-primary" for="sabado">Sábado</label>

                                            <input type="checkbox" class="form-check-input btn-check" value="domingo"
                                                id="domingo" autocomplete="off" name="dias[]">
                                            <label class="btn btn-outline-primary" for="domingo">Domingo</label>
                                        </div><br>
                                        <div class="form-floating">
                                            <input type="time" class="form-control" name="hora" id="hora"
                                                required>
                                            <label for="floatingPassword">Hora de tomar el medicamento</label>
                                        </div><br>
                                        <div class="form-group float-end">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Agregar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Modal crear-->
                </div>
                <div class="card-body justify-content-center text-center">
                    <div class="container mt-5 mb-3">
                        <div class="row">
                            @foreach ($medicamentos as $medicamento)
                                <div class="col-md-4">
                                    <div class="card p-3 mb-2">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="icon"><i class="far fa-capsules"></i></div>
                                                <h2 class="heading">{{ $medicamento->nombre }}</h2>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <label class="lblHora" for=""><b>Dias que toma el medicamento</b>
                                                {{ $medicamento->dias }}</label>
                                            <label class="lblHora" for=""><b>Hora toma
                                                    medicamento</b> {{ $medicamento->hora }}</label>
                                        </div>
                                        <div class="card-footer">
                                            <div class="btn-group" role="group"
                                                aria-label="Basic mixed styles example">
                                                <a class="btn btn-success"
                                                    href="{{ route('medicamentos.edit', $medicamento->id) }}"><i
                                                        class="fas fa-pencil"></i></a>

                                                <form action="{{ route('medicamentos.destroy', $medicamento->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger" type="submit"
                                                        onclick="return confirm('¿Desea eliminar el medicamento?')"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
