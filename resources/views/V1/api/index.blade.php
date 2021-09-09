@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">

            <div class="float-right"><a href="{{ url('home') }}"> <i class="fa fa-home"> Home</i></a> <i
                    class="fa fa-angle-right" aria-hidden="true"></i> <i class="fa fa-cogs"> Api settings </i></div>
        </div>
        <div class="card-body">
            <h5>API credentials</h5>
            <p>API credentials helps us authenticate requests that you make to our APIs. <a
                    href="https://docs.statum.co.ke/docs/authentication" target="_blank"> Click here </a> to read more on
                API authentication.</p>
            <p><a href="{{ route('admin.api.credentials') }}" data-href="{{ route('admin.api.credentials') }}"
                    class="btn btn-info btn-xs" role="button" data-toggle="modal" data-target="#confirm-generate"><i
                        class="fa fa-cog" aria-hidden="true"></i> Generate credentials?</a></p>
            <div class="modal fade" id="confirm-generate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Generate new credentials?
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>You are about to generate new API credentials, this procedure is irreversible.</p>
                            <p> <b> Please record the values that you generate for later use as you will not see them from
                                    this dashboard on subsequent visits.</b></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-success btn-ok">Proceed</a>
                        </div>
                    </div>
                </div>
            </div>
            <p>
                @if (\Session::has('consumer_secret') && \Session::has('consumer_key'))
                    <div class="alert alert-success">
                        <b> consumerKey:</b> {!! \Session::get('consumer_key') !!}
                    </div>
                    <div class="alert alert-success">
                        <b> consumerSecret :</b> {!! \Session::get('consumer_secret') !!}
                    </div>
                @endif
            </p>
            <hr>
            <h5>Result notifications</h5>
            <p>To receive transaction notifications the instant we need to let you know that something has occurred, you can
                register a callback URL that we will invoke.</p>
            <div class="table-responsive">
                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#webHookModal"> <i
                        class="fa fa-edit" aria-hidden="true"></i> Add webhook?</button><br><br>
                <table id="callBackUrls" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Service name</th>
                            <th>Webhook</th>
                            <th>Created on</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($callBackData ?? [] as $data)

                            <tr>
                                <td> {{ str_replace('_', ' ', $data->service->name) }}</td>
                                <td>{{ $data->url ?? '' }}</td>
                                <td>{{ $data->updated_at ?? '' }}</td>
                                <td>
                                    <form method="POST" autocomplete=off action="{{ route('admin.webhook.delete') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <div class="row">
                                            <div class="col-6 text-right">
                                                <input type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Do you wish to delete URL?');" value='Delete'>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal" id="webHookModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add webhook?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" autocomplete=off action="{{ route('admin.webhook.store') }}">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <select class="form-control" id="service_id" name="service_id" required="required">
                                <option value=""> --Select the service -- </option>
                                @foreach ($services ?? [] as $data)
                                    @if ($data->name == 'mpesa_stk_push')
                                        @continue
                                    @endif
                                    <option value="{{ $data->id }}"> {{ str_replace('_', ' ', $data->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br><br>
                        <div class="input-group mb-4">
                            <input name="url" autocomplete="randomString" type="url" class="form-control"
                                placeholder="https://api.example.com/api/callback" required="required">
                            @error('url')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            <div class="col-6 text-right">
                                <input type="submit" class="btn btn-primary px-4" value='Save'>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    @parent
    <script>
        $('#confirm-generate').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

            $('').html('Generate URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });

    </script>
@endsection
@endsection
