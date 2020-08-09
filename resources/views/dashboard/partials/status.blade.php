@if (session('status'))

    <div id="successmodal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content alert alert-success">
                    {{ session('status') }}
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.onload = function () {
            $('#successmodal').modal('show');
            setTimeout(function(){
                $('#successmodal').modal('hide');
            }, 2000);
        }
    </script>
@endif
