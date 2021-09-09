          <!-- The Modal -->
          <div class="modal" id="B2cQueryByParams">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">



                      <!-- Modal Header -->
                      <div class="modal-header">

                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                          <form method="get" autocomplete="off" action="{{ route('admin.business-to-customer.index')}}">
                              {{ csrf_field() }}
                              <div class="row">
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
                              {{-- <div class="col-lg-6 col-sm-6 col-xs-6">
                                  <div class="form-group{{ $errors->has('reference_name_b2c') ? ' has-error' : '' }}">

                                      <select name="reference_name_b2c" id="reference_name_b2c" class="form-control select2">
                                        <option value="" selected data-default>  select a reference name </option>
                                      </select>
                                  </div>
                              </div> --}}
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
