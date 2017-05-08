       <li class="ui-state-default">
                <div class="tabIssue" id="tabIssue">
                    <!-- tab title -->
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 1-->
                        <div class="tab-pane fade in show active" id="panel5" role="tabpanel" style="margin-top: -12px">
                            <br>
                            <div class="card" style="width: 450px">
                                <div class="buttons pull-right" style="margin-top: 10px">
                                    <a href="#" class="btn btnsave pull-right">Save</a>
                                    <a href="#" class="btn btncancel pull-right">Cancel</a>
                                </div>
                                <div class="card-block">
                                    <div class="md-form">
                                       <input type="text" id="form3" class="form-control">
                                       <label for="form3">Issue Title:</label>
                                   </div>
                                   <!--DROPDOWN FOR ASSIGN-->
                                   <div class="btn-group pull-right">
                                       <a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sort pull-right" aria-hidden="true"></i></a>
                                       <div class="dropdown-menu">
                                            <?php loopDropDownItem($userdata['user_tbl']); ?>
                                       </div>
                                   </div>
                                    <div class="divassigned">
                                        <p>Assigned to: </p>
                                    </div>
                                      <!--DROPDOWN FOR MODULE-->
                                    <div class="btn-group pull-right">
                                        <a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sort pull-right" aria-hidden="true"></i></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Bug <img class="iconBug pull-right" src="public/img/ladybug.png" style="width: 20px; height: 20px"></a>
                                            <a class="dropdown-item" href="#">Features <img class="iconBug pull-right" src="public/img/star.png" style="width: 20px; height: 20px"></a>
                                        </div>
                                    </div>
                                    <div class="divmodule" style="border-color: red">
                                       <p>Module Type: </p>
                                    </div>  
                                    <!--DROPDOWN FOR QA-->
                                    <div class="btn-group pull-right">
                                        <a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sort pull-right" aria-hidden="true"></i></a>
                                        <div class="dropdown-menu">
                                           <?php loopDropDownItem($userdata['qa_type_tbl']); ?>
                                        </div>
                                    </div>
                                    <div class="divqa" style="border-color: red">
                                       <p>QA Type: </p>
                                    </div>
                                    <!--DROPDOWN FOR GIT-->
                                    <div class="btn-group pull-right">
                                        <a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sort pull-right" aria-hidden="true"></i></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                    <div class="divgit" style="border-color: red">
                                       <p>Git Repository: </p>
                                    </div>
                                    <!--DROPDOWN FOR PLATFORM-->
                                    <div class="btn-group pull-right">
                                        <a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sort pull-right" aria-hidden="true"></i></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                    <div class="divplat" style="border-color: red">
                                       <p>Platform type: </p>
                                    </div>
                                    <!--DROPDOWN FOR PRIORITY-->
                                    <div class="btn-group pull-right">
                                        <a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sort pull-right" aria-hidden="true"></i></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                    <div class="divpriority" style="border-color: red">
                                       <p>Priority Level: </p>
                                    </div>

                                    <div class="md-form">
                                        <input type="text" id="form1" class="form-control">
                                        <label for="form1" class="">Issue Description:</label>
                                    </div>

                                    <button type="button" class="btn btnattach">
                                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                                    </button>

                                    <button type="button" class="btn btnadduser">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </li>