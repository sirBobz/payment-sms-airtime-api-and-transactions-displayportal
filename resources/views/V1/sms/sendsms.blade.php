@extends('layouts.admin')
@section('styles')
    <!--  Flatpicker Styles  -->
    <link rel="stylesheet" href="{{ asset('css/flatpickr/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr/confirmDate.css') }}">
    <style>
        input[type=text] {
            box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.06);
            border-radius: 10px;
        }

        textarea {
            border-radius: 15px;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.06);
        }

        input[type=file] {
            box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.06);
            border-radius: 10px;
        }

        select {
            width: 100%;
            padding: 10px;
            border-radius: 15px;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.06);
        }

    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-right"><a href="{{ url('home') }}"> <i class="fa fa-home"> Home</i></a> <i
                    class="fa fa-angle-right" aria-hidden="true"></i> <i class="fa fa-envelope"> Sms file import
                    (CSV) </i>
            </div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.sms.downloadFile') }}" class="btn btn-primary btn-xs"> <i
                            class="fa fa-download"> Sample csv </i></a>
                </div>
                <div class="card-body">
                    <form role="form" name="smsUploadForm" method="POST" action="{{ route('admin.sms.fileUpload') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row col-md-12">
                            <!--Loads of HTML and Stuff-->
                            <div class="col-md-4">
                                <div class="md-form form-md">
                                    <label></label>
                                    <select class="form-control" required="required" name="sender_id" id="sender_id">
                                        <option value=""> Select a sender ID </option>
                                        @foreach ($senderIds as $data)
                                            <option value="{{ $data->account }}"> {{ $data->account }} </option>
                                        @endforeach
                                    </select>
                                    @error('sender_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label></label>
                                <div class="form-group">
                                    <input name="send_date" type="text" id="send_date" class="form-control"
                                        value="{{ old('send_date') }}" placeholder="Select send date" required data-input>
                                    @error('send_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label></label>
                                    <input name="send_time" id="send_time" value="{{ old('send_time') }}" type="text"
                                        class="form-control" required="required" placeholder="Select send time" data-input>
                                    @error('send_time')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-4">
                                <label></label>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" required accept=".csv"
                                            name="import_file" id="import_file" aria-describedby="import_file">
                                        <label class="custom-file-label" for="import_file">Choose file</label>
                                        @error('import_file')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="table-responsive">
                                    <span id="contactsAlert"></span>
                                    <tableHtml />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label></label>
                                    <input name="reference_name" id="reference_name" value="{{ old('reference_name') }}"
                                        type="text" class="form-control" required="required" placeholder="Set a bulk name">
                                    @error('reference_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <!--Loads of HTML and Stuff-->
                            <div class="col-md-12">
                                <fieldset>
                                    <label> </label>
                                    <textarea name="message" id='messageId' class="form-control" required="required"
                                        placeholder="Type your message here" rows="2"></textarea>
                                    <span id="spnCharLeft"></span>
                                </fieldset>
                                @error('messageId')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" style="border: 12px solid #fff;color:#fff;"
                                class="btn btn-primary float-right px-4" value="Submit">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type='text/javascript'>
        $('#spnCharLeft').css('display', 'none');
        var maxLimit = 1080;
        $(document).ready(function() {
            $('#message').keyup(function() {
                var lengthCount = this.value.length;
                if (lengthCount > maxLimit) {
                    this.value = this.value.substring(0, maxLimit);
                    var charactersLeft = maxLimit - lengthCount + 1;
                } else {
                    var charactersLeft = maxLimit - lengthCount;
                }
                $('#spnCharLeft').css('display', 'block');
                $('#spnCharLeft').text(charactersLeft + ' Characters left');
            });
        });
    </script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script type="text/javascript">
        var lines = [];
        $("#import_file").change(function(e) {
            var ext = $("input#import_file").val().split(".").pop().toLowerCase();
            if ($.inArray(ext, ["csv"]) == -1) {
                alert("Please upload a valid CSV file.");
                return false;
            }
            if (e.target.files != undefined) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    lines = e.target.result.split('\r\n');
                    $('#contactsAlert').css('display', 'block');
                    $('#contactsAlert').text('Confirm the sample contacts are OK');
                    for (i = 0; i < lines.length; ++i) {
                        if (i === 11) {
                            break;
                        }

                        $('tableHtml').append('<table style="width:100%"><tr><th></th></tr><tr> <td>' + lines[
                            i] + '</td></tr></table>');

                    }
                };
                reader.readAsText(e.target.files.item(0));
            }
            return false;
        });
    </script>
    <!--  Flatpickr  -->
    <script src="{{ asset('js/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('js/flatpickr/confirmDate.js') }}"></script>
    <script type="text/javascript">
        $("#send_date").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            confirmIcon: "<i class='fa fa-check'></i>",
            "plugins": [new confirmDatePlugin({})],
            confirmText: "OK ",
            minDate: "today",
            maxDate: new Date().fp_incr(14) // 14 days from now
        });

        $("#send_time").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            minTime: "07:00",
            maxTime: "20:30",
        });
    </script>
@endsection
