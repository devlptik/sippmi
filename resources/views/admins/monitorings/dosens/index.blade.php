@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui_breadcrumb([
        'Home' => route('admin.home'),
        'Luaran Dosen' => '#'
    ]) !!}
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <strong><i class="fa fa-filter"></i> Filter</strong>
        </div>

        <div class="card-body">
            @include('admins.monitorings.dosens._form')
        </div>
    </div>

    @if($penelitians)
        <div class="card">

            <div class="card-body">

                @foreach($penelitians as $penelitian)

                    <div class="form-group row">
                        <div class="col-sm-2">
                            <strong>Judul</strong>
                        </div>
                        <div class="col-sm-10">
                            {!! str_replace('<p>','', str_replace('</p>', '', $penelitian->judul)) !!}
                            <br>
                            <em><small>{{ $penelitian->skema }}</small></em>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">
                            <strong>Tahun</strong>
                        </div>
                        <div class="col-sm-10">
                            {{ $penelitian->tahun }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">
                            <strong>Biaya</strong>
                        </div>
                        <div class="col-sm-10">
                            Rp {{ number_format($penelitian->biaya, 0, ',', '.').',-' }}
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-2">
                            <strong>Output</strong>
                        </div>
                        <div class="col-sm-10">
                            <ul>
                            @foreach($penelitian->outputs as $output)
                                <li>
                                    {{ $output->luaran }}
                                    @if($output->required == 1)
                                        (Wajib)
                                    @endif
                                    :
                                    @if(!empty($output->filename))
                                        <a href="storage/luaran/{{ $output->filename }}"><i class="fa fa-download text-primary"></i> Download </a>
                                    @else
                                        <i class="fa fa-stop-circle text-danger"></i>
                                    @endif
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                    <hr>

            @endforeach
            </div>
        </div>
    @endif

@endsection
