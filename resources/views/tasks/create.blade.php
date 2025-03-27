@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header hstack gap-2">

            <span>Cadastrar Tarefa</span>

            <span class="ms-auto d-sm-flex flex-row">
                <!-- Listar -->
                <a href="{{ route('task.index') }}" class="btn btn-dark btn-sm me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-list-ul" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    </svg>
                </a>
            </span>
        </div>

        <div class="card-body">

            <x-alert />

            <form action="{{ route('task.store') }}" method="POST" class="row g-3">
                @csrf
                @method('POST')

                <div class="col-md-12">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Título completo" value="{{ old('title') }}">
                </div>

                <div class="col-md-9">
                    <label for="description" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Descrição simples da tarefa" value="{{ old('description') }}">
                </div>

                <fieldset class="col mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status1"
                                value="1">
                            <label class="form-check-label" for="status1">
                                Ativa
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status2"
                                value="0" checked>
                            <label class="form-check-label" for="status2">
                                Desativada
                            </label>
                        </div>
                    </div>
                </fieldset>

                <div class="col-12">
                    <button type="submit" class="btn btn-dark btn-sm">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
