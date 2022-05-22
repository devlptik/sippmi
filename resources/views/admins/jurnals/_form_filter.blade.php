<!-- Input (Select) jurnal_skema_id -->
<div class="form-group">
    <label class="form-label" for="jurnal_skema_id">Skema Usulan</label>
    {{ html()->select('jurnal_skema_id')->options($skemas)->value($skema_id)->class(["form-control", "is-invalid" => $errors->has('jurnal_skema_id')])->id('jurnal_skema_id')}}
    @error('jurnal_skema_id')
    <div class="invalid-feedback">{{ $errors->first('jurnal_skema_id') }}</div>
    @enderror
</div>

<!-- Input (Select) periode_id -->
<div class="form-group">
    <label class="form-label" for="periode_id">Periode Skema</label>
    {{ html()->select('periode_id')->options($periodes)->class(["form-control", "is-invalid" => $errors->has('periode_id')])->id('periode_id')}}
    @error('periode_id')
    <div class="invalid-feedback">{{ $errors->first('periode_id') }}</div>
    @enderror
</div>


@section('scripts')
    <script>
        $(document).ready(function() {
        $('select[name="jurnal_skema_id"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                var url = '/admin/jurnal-skemas/'+stateID+'/periodes/data';
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log('success');
                        $('select[name="periode_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="periode_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    },
                    fail: function (){
                       $('select[name="periode_id"]').empty();
                    }
                });
            }else{
                $('select[name="periode_id"]').empty();
            }
        });
    });
    </script>
@endsection
