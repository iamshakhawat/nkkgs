@extends('backend.inc.main')
@section('title', 'Notice')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="content-page">
                <div class="row">
                    <div class="col-lg-12 col-md-12 ">
                        <div class="card p-3">
                            <h4>All Notice</h4>
                            <hr class="mt-0">

                            <div class="d-flex justify-content-between align-items-center mb-3"
                                style="border: 1px solid #cccccc">
                                <span class="bg-success p-3 text-white" style="font-size: 18px">Notice:</span>
                                <marquee style="font-size: 20px" behavior="scroll" id="notice" direction="rtl"
                                    onMouseOver="this.stop()" onMouseOut="this.start()">
                                    @if (count($currentNotice) > 0)
                                        {!! html_entity_decode($currentNotice[0]->notice) !!}
                                    @endif
                                </marquee>

                            </div>
                            <form action="{{ route('admin.addnotice') }}" method="POST" class="mb-3">
                                @csrf
                                <div class="d-flex ">
                                    <input name="notice" rows="2" placeholder="Type your notice"
                                        class="form-control rounded-0" id="ckeditor">
                                    <button type="submit" class="btn btn-primary rounded-0">Publish</button>
                                </div>
                                @error('notice')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </form>
                            <div class="d-flex justify-content-between">

                                <h4>All Notice</h4>
                                <span class="text-muted">{{ $total }} notice found</span>
                            </div>
                            <table class=" table table-bordered">
                                <tr>
                                    <th style="width: 30px">#</th>
                                    <th>Notice</th>
                                    <th style="width: 100px">Date</th>
                                    <th style="width: 100px">Action</th>
                                </tr>

                                @foreach ($notices as $notice)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{!! html_entity_decode($notice->notice) !!}</td>
                                        <td>{{ $notice->publish }}</td>
                                        <td>
                                            <button onclick="edit({{ $notice->id }})" class="btn btn-sm btn-primary"><i
                                                    class="fa fa-edit"></i></button>
                                            <a href="{{ route('admin.deletenotice', ['id' => $notice->id]) }}"
                                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="row justify-content-center mt-3">
                                {{ $notices->appends($_GET)->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Notice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.updatenotice') }}" method="POST">
                <div class="modal-body">
                    <div class="container-fluid">
                        @csrf
                        <div class=" d-flex ">
                            <input type="hidden" id="id" name="id">
                            <input type="text" name="notice" id="noticeinput" placeholder="Type your notice" class="form-control rounded-0 mb-2 w-75">

                            <input type="date" name="date" id="date" class="form-control rounded-0 w-25 mb-2">

                        </div>
                        @error('notice')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function edit(id) {
            $(this).addClass('disabled');
            $.ajax({
                type: "POST",
                url: "{{ route('admin.editNotice') }}",
                data: {
                    id:id
                },
                success: function (response) {
                    $("#id").val(response.id);
                    $("#noticeinput").val(response.notice);
                    $("#date").val(response.publish);
                    $("#modelId").modal('show');
                }
            });
        }
    </script>


@endsection
