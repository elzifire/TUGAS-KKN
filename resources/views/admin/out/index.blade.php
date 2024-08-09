@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kas keluar</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-enter-check"></i>Kas keluar</h4>
                    </div>

                    <div class="card-body">
                            <div class="input-group-prepend">
                                <a href="{{ route('out.create') }}" class="btn btn-primary mb-3" style="padding-top: 10px;"><i
                                        class="fa fa-plus-circle"></i> TAMBAH KAS KELUAR</a>
                            <a href="{{ route('out-export') }}" class="btn btn-success mx-2"><i class="fa-solid fa-file-excel"></i> &nbsp;Export Excel</a>
                            <form method="GET" action="{{ route('out.index') }}" class="my-3">
                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="date" name="start_date" id="date" class="form-control" value="{{ request('start_date') }}" placeholder="dari tanggal">
                                    </div>
                                    <div class="col">
                                        <input type="date" name="end_date" id="date" class="form-control" value="{{ request('end_date') }}" placeholder="sampai">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-filter"></i> &nbsp;Filter</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                        <th scope="col">KETERANGAN</th>
                                        <th scope="col">JENIS</th>
                                        <th scope="col">TANGGAL</th>
                                        <th scope="col">TOTAL</th>
                                        <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($outs as $no => $out)
                                        <tr>
                                            <th scope="row" style="text-align: center">{{ ($outs->currentPage() - 1) * $outs->perPage() + $no + 1 }}</th>
                                            <td>{{ $out->name }}</td>
                                            <td>UANG KELUAR</td>
                                            <td>{{ $out->date }}</td>
                                            <td>{{ $out->balance }}</td>
                                            <td class="text-center">
                                                    <a href="{{ route('out.edit', $out->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('out.destroy', $out->id) }}" method="post"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Apakah Anda Yakin?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right p-3">UANG MASUK :</th>
                                        <th><span>Rp. {{ $moneyIn }}</span></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right p-3">UANG KELUAR :</th>
                                        <th><span>Rp.{{ $moneyOut }}</span></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right p-3">SALDO</th>
                                        <th><span>Rp. {{ $totalBalance }}</span>
                                        </th>
                                    </tr>

                                </tfoot>

                            </table>
                            {{ $outs->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop