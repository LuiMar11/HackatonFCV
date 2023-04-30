@extends('layouts.app')
@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid">
        <br>
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-header text-center">
                    <h3>Lista de citas</h3>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Agregar cita
                    </button>
                    <!-- Modal crear-->
                    <div class="modal fade align-middle" id="staticBackdrop" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="staticBackdropLabel">Agregar cita</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-floating" action="{{ route('medicamentos.store') }}"method="POST">
                                        @csrf
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="hora" id="hora">
                                            <label for="floatingPassword">Nombre cita</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="date" class="form-control" name="hora" id="hora">
                                            <label for="floatingPassword">Fecha de la cita o terapia</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="time" class="form-control" name="hora" id="hora">
                                            <label for="floatingPassword">Hora de la cita o terapia</label>
                                        </div>
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
                            @foreach ($citas as $cita)
                                <div class="col-md-4">
                                    <div class="card p-3 mb-2">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="icon"><i class="far fa-capsules"></i></div>
                                                <h2 class="heading"></h2>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <label class="lblHora" for=""></label>
                                            <label class="lblHora" for=""></label>
                                        </div>
                                        <div class="card-footer">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
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
