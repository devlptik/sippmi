@extends('layouts.admin')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => url('home'),
        'Penelitian' => route('admin.penelitians.index'),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.penelitians.index'), 'icon-list', 'List Penelitian') !!}
@endsection

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endsection

@section('content')
    <div class="card">
        <form method="POST" action="{{ route("admin.penelitians.store") }}" enctype="multipart/form-data">
            <div class="card-header">
                Tambah Data Penelitian
            </div>

            <div class="card-body">
                @csrf

                @include('admin.penelitians._form')

            </div>
            <div class="card-footer">
                <button class="btn btn-danger" type="submit">
                    Simpan
                </button>
            </div>
        </form>
    </div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            var quill = new Quill('#editor_judul', {
                theme: 'snow',   // Specify theme in configuration
                modules: {
                    toolbar: ['bold', 'italic', 'underline']
                }
            });

            var editor = document.getElementById('editor_judul').getElementsByClassName('ql-editor')[0];
            var inputJudul = document.getElementById("judul");
            var text = "";

            quill.on('text-change', function () {
                text = editor.innerHTML;
                // console.log(text);
                inputJudul.value = text;
            })

            var quill_eksekutif = new Quill('#editor_eksekutif', {
                theme: 'snow',   // Specify theme in configuration
                modules: {
                    toolbar: ['bold', 'italic', 'underline']
                }
            });

            var editor_eksekutif = document.getElementById('editor_eksekutif').getElementsByClassName('ql-editor')
            var input_eksekutif = document.getElementById('ringkasan_eksekutif')
            var text_eksekutif = "";

            quill_eksekutif.on('text-change', function (){
                text_eksekutif = editor_eksekutif.innerHTML;
                input_eksekutif.value = text_eksekutif;
            })
        });
    </script>
@endsection
