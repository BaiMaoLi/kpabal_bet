@extends('admin.layout.master')
@section('css')
@stop
@section('body')
    <div class="page-content-wrapper">
        <div class="page-content">

            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">{{$page_title}}</span>
                    </div>
                    <div class="tools"></div>
                </div>
                <div class="portlet-body">
                    <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">

                        @foreach($faqs as $key => $f)

                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#generalOne{{ $f->id }}" aria-expanded="true" aria-controls="collapseOne{{ $f->id }}">
                                            {{ $f->title }}
                                        </a>
                                    </h4>
                                </div>
                                <div id="generalOne{{ $f->id }}" class="panel-collapse collapse {{ $key == 0 ? 'in' : '' }}" role="tabpanel" aria-labelledby="headingOne{{ $f->id }}">
                                    <div class="panel-body">
                                        {!! $f->description !!}
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('faqs-edit',$f->id) }}" class="btn btn-primary btn-block bold uppercase"><i class="fa fa-edit"></i> Edit faqs</a>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-danger bold uppercase btn-block delete_button"
                                                        data-toggle="modal" data-target="#DelModal"
                                                        data-id="{{ $f->id }}">
                                                    <i class='fa fa-trash'></i> Delete faqs
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="text-center">
                            {!! $faqs->links() !!}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>



    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title bold" id="myModalLabel"> <i class='fa fa-exclamation-triangle'></i> Confirmation !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('faqs-delete') }}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id" class="abir_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button>
                    </form>
                </div>
            </div>
    </div>


@stop
@section('script')
    <script>
        $(document).ready(function () {

            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);
            });
        });
    </script>
@stop