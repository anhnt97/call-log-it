@extends('theme.layouts.layout_blank')
@section('content')
    <div class="col-md-9">
        <div class="col-md-6">
            <label class="control-label sbold">Bộ phận IT<span class="required">*</span></label>
            <select name="id_part" class="form-control select2-allow-clear select2-bootstrap-prepend">
                <option></option>
                @foreach ($listPart as $key=>$value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
            <label class="control-label sbold">Nhóm IT<span class="required">*</span></label>
            <select name="id_team" class="form-control select2-allow-clear select2-bootstrap-prepend">
            </select>
            <label class="control-label sbold">Người thực hiện<span class="required">*</span></label>
            <select name="id_assign" class="form-control select2-allow-clear select2-bootstrap-prepend">
            </select>
        </div>

    </div>
@endsection

@section('js3')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="id_part"]').on('change', function() {
            var partID = $(this).val();
            if(partID) {
                $.ajax({
                    url: '/getDataTeam/'+partID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="id_team"]').empty();
                        $('select[name="id_assign"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="id_team"]').append('<option value="'+ key +'">'+ value +'</option>');

                        });
                    }
                });
            }else{
                $('select[name="id_team"]').empty();
            }
        });
    });
    $('select[name="id_team"]').on('change', function() {
        var partID = $('select[name="id_part"]').val();
        var teamID = $(this).val();
        if(teamID) {
            $.ajax({
                url: '/getDataUser/'+partID+'/'+teamID,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="id_assign"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="id_assign"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });

                }
            });
        }else{
            $('select[name="id_assign"]').empty();
        }
    });
</script>
@endsection
