@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('home'),
        'Penelitian' => route('penelitians.index'),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('penelitians.index'), 'icon-list', 'List Penelitian') !!}
@endsection

@section('styles')
    <link href="{{ asset('css/quill.snow.css') }}" rel="stylesheet">
    <style>

        .step-progressbar {
            list-style: none;
            counter-reset: step;
            display: flex;
            padding: 0;
        }

        .step-progressbar__item {
            display: flex;
            flex-direction: column;
            flex: 1;
            text-align: center;
            position: relative;
        }

        .step-progressbar__item:before {
            width: 3em;
            height: 3em;
            content: counter(step);
            counter-increment: step;
            align-self: center;
            background: #999;
            color: #fff;
            border-radius: 100%;
            line-height: 3em;
            margin-bottom: 0.5em;
        }

        .step-progressbar__item:after {
            height: 2px;
            width: calc(100% - 4em);
            content: '';
            background: #999;
            position: absolute;
            top: 1.5em;
            left: calc(50% + 2em);
        }

        .step-progressbar__item:last-child:after {
            content: none;
        }

        .step-progressbar__item--active:before {
            background: #000;
        }

        .step-progressbar__item--complete:before {
            content: '✔';
        }

    </style>
@endsection

@section('content')

    @if($skemas->count() > 0)

        <div class="row">
            <div class="col-md-12">
                <ul class="step-progressbar">
                    <li class="step-progressbar__item step-progressbar__item--active"><a
                            href="{{ route('penelitians.create') }}">Informasi Dasar</a></li>
                    <li class="step-progressbar__item">Ringkasan
                    <li>
                    <li class="step-progressbar__item">Peneliti</li>
                    <li class="step-progressbar__item">Submit</li>
                </ul>
            </div>
        </div>

        <div class="card">
            {{ html()->form('POST', route('penelitians.store'))->acceptsFiles()->open() }}

            <div class="card-header">
                {{ trans('global.create') }} {{ trans('cruds.penelitian.title_singular') }}
            </div>

            <div class="card-body">
                @csrf

                @include('penelitians._form')

            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">
                    Selanjutnya
                </button>
            </div>

            {{ html()->form()->close() }}
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <h4>Mohon Maaf...Tidak ada skema penelitian yang dapat menerima proposal untuk saat ini</h4>
            </div>
        </div>
    @endif

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            var quill = new Quill('#editor', {
                theme: 'snow',   // Specify theme in configuration
                modules: {
                    toolbar: ['bold', 'italic', 'underline']
                }
            });

            var editor = document.getElementById('editor').getElementsByClassName('ql-editor')[0];
            var inputJudul = document.getElementById("judul");
            var text = "";

            quill.on('text-change', function () {
                text = editor.innerHTML;
                console.log(text);
                inputJudul.value = text;
            })
        });
    </script>
@endsection
