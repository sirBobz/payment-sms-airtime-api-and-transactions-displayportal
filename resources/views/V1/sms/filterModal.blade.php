          <!-- The Modal -->
          <div class="modal" id="smsQueryByParams">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">

                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                          <form method="get" autocomplete="off" action="{{ route('admin.sms.index')}}">
                              {{ csrf_field() }}
                              <div class="row">

                              <div class="col-lg-6 col-sm-6 col-xs-6">
                                  <div class="form-group{{ $errors->has('telco_id') ? ' has-error' : '' }}">

                                      <select name="telco_name" class="form-control browser-default select2">
                                        <option value="" selected data-default>  Select a service provider </option>
                                        <option value="Safaricom"> Safaricom</option>
                                        <option value="Airtel"> Airtel</option>
                                        <option value="Telkom"> Telkom</option>
                                        <option value="Equitel"> Equitel</option>
                                        <option value="Default"> Others</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-sm-6 col-xs-6">
                                <div class="form-group{{ $errors->has('reference_name') ? ' has-error' : '' }}">

                                    <input name="reference_name" type="text" class="form-control" placeholder="Reference name" >
                                    @if ($errors->has('reference_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reference_name') }}</strong>
                                    </span> @endif
                                </div>
                            </div>
                              </div>
                              <br>
                              <div class="row">
                                  <div class="col-lg-6 col-sm-6 col-xs-6">
                                      <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">

                                          <input name="from" type="text" class="form-control" id='fromperiod' placeholder="Start Date" >
                                          @if ($errors->has('date'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('date') }}</strong>
                                          </span> @endif
                                      </div>
                                  </div>

                              <div class="col-lg-6 col-sm-6 col-xs-6">
                                  <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">

                                      <input name="to" type="text" class="form-control" id='toperiod' placeholder="End Date">
                                      @if ($errors->has('date'))
                                      <span class="help-block">
                                              <strong>{{ $errors->first('date') }}</strong>
                                          </span> @endif
                                  </div>
                              </div>

                              </div>
                              <br>
                              <div class="row">
                              <div class="col-lg-6 col-sm-6 col-xs-6">
                                  <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">

                                      <select name="status" class="form-control browser-default custom-select">
                                          <option value=""> -- Select a status --</option>
                                          <option value="Success"> Success</option>
                                          <option value="Fail">  Fail</option>

                                      </select>
                                  </div>
                              </div>
                              </div>
                              <br>
                              <div class="row">
                                  <div class="col-12 text-right">

                                      <input type="submit" class="btn btn-primary px-4" value='search'>
                                  </div>
                              </div>

                          </form>
                      </div>

                  </div>
              </div>
          </div>
