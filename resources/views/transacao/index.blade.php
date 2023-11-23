@extends('components.body')
@section('title')
    Almolin - Transações
@endsection
<style>

</style>
@section('content')
    <h2>Transações</h2>
    <hr>
    <div style="display: flex; flex-direction: row">
        <div class="col-md-2 mb-2" style="width: 9.666667%">
            <a class="btn btn-outline-primary" href="{{ url('transacao/create') }}" role="button">
                <i class="fa-light fa-plus fa-sm"></i> Emprestar</a>
        </div>

        <div class="col-md-2 mb-2" data-bs-toggle="modal" data-bs-target="#modalFilter">
            @if (count($produtos) > 0 && count($transacoes) > 0)
                <a class="btn btn-outline-secondary" role="button">
                    <i class="fa-light fa-filter"></i> Filtrar</a>
            @else
                <a class="btn btn-outline-secondary disabled" role="button">
                    <i class="fa-light fa-filter"></i> Filtrar</a>
            @endif
        </div>
    </div>
    @csrf
    <table class="table table-bordered table-sm text-center">
        <thead class="text-center table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Funcionário</th>
                <th scope="col">Produto</th>
                <th scope="col">QTD</th>
                <th scope="col">Armazém</th>
                <th class="col-2"></th>
            </tr>
        </thead>
        <tbody>
            @if (count($transacoes) > 0)
                @foreach ($transacoes as $transacao)
                    <tr>
                        <td>{{ $transacao->id }}</td>
                        <td>
                            @foreach ($funcionarios as $funcionario)
                                @if ($funcionario->id === $transacao->id_func)
                                    {{ $funcionario->nome }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($produtos as $produto)
                                @if ($produto->id === $transacao->id_itm)
                                    {{ $produto->desc }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            {{ $transacao->qtd }}
                        <td>
                            @foreach ($armazens as $armazem)
                                @if ($armazem->id === $transacao->id_arm)
                                    {{ $armazem->desc }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-danger mx-1 delete"
                                    onclick="Delete('{{ route('transacao.delete', ['id' => $transacao->id]) }}');"><i
                                        class="fa-light fa-trash fa-sm"></i> Remover
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6"> Nenhuma transação cadastrada</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="col-md-6 mt-3">
        <table class="table table-bordered table-sm text-center">
            <thead class="text-center table-dark">
                <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">Total emprestado</th>
                </tr>
            </thead>
            <tbody>
                @if (count($produtos) > 0 && count($transacoes) > 0)
                    @foreach ($produtos as $produto)
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($transacoes as $transacao)
                            @if ($transacao->id_itm === $produto->id)
                                @php
                                    $total += $transacao->qtd;
                                @endphp
                            @endif
                        @endforeach
                        @if ($total > 0)
                            <tr>
                                <td>
                                    {{ $produto->desc }}
                                </td>
                                <td>
                                    {{ $total }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">Sem totais</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    @if (count($produtos) > 0 || count($transacoes) > 0)
        <div class="modal" id="modalFilter">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Filtrar dados</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="formFilterTran" method="get" action="{{ url('transacao/') }}">
                            <div class="mb-3">
                                <label for="produto" class="col-form-label">Produto</label>
                                <select id="produto" name="produto" class="form-select">
                                    <option value="0">TODOS</option>
                                    @foreach ($produtos as $produto)
                                        <option value="{{ $produto->id }}"
                                            {{ $produto->id === $transacao->id_itm ? 'selected' : '' }}>
                                            {{ $produto->desc }}</option>
                                    @endforeach
                                </select>

                                <label for="armazem" class="col-form-label">Armazem</label>
                                <select id="armazem" name="armazem" class="form-select">
                                    <option value="0">TODOS</option>
                                    @foreach ($armazens as $armazem)
                                        <option value="{{ $armazem->id }}"
                                            {{ $armazem->id === $transacao->id_arm ? 'selected' : '' }}>
                                            {{ $armazem->desc }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
