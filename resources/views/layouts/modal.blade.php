
<!-- Password Update Modal -->
<div id="changePassword" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">

        <form action="{{url('back_office/change_password', Auth::user()->id)}}" method="POST" class="form-horizontal login_validator" >

          {{csrf_field()}}

                                                    <table class="table">
                                                       
                                                        <tr>
                                                            <th>
                                                                Current Password
                                                            </th>
                                                            <td>
                                                                <input type="password" name="password" value="" class="form-control" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                New Password
                                                            </th>
                                                            <td>
                                                                <input type="password" name="new_password" value="" class="form-control" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Confirm New Password
                                                            </th>
                                                            <td>
                                                                <input type="password" name="confirm_password" value="" class="form-control" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{Auth::user()->security_question}}
                                                            </th>
                                                            <td>
                                                                <input type="text" name="security_answer" value="" class="form-control" placeholder="Enter Your Secret Answer">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

                                                
  </div>
</div>


<!-- Security QA Update Modal -->
<div id="changeSecurity" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Secret</h4>
      </div>
      <div class="modal-body">

        <form action="{{url('back_office/change_security', Auth::user()->id)}}" method="POST" class="form-horizontal login_validator">

          {{csrf_field()}}

                                                    <table class="table">
                                                       
                                                        <tr>
                                                            <th>
                                                                New Security Question 
                                                            </th>
                                                            <td>
                                                                <input type="text" name="new_security_question" value="" class="form-control" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                New Security Answer 
                                                            </th>
                                                            <td>
                                                                <input type="password" name="new_security_answer" value="" class="form-control" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Password
                                                            </th>
                                                            <td>
                                                                <input type="password" name="password" value="" class="form-control" >
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

                                                
  </div>
</div>

<!-- Security QA Update Modal -->
<div id="addWallet" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Bitcoin Wallet</h4>
      </div>
      <div class="modal-body">

        <form action="{{url('back_office/wallet', Auth::user()->id)}}" method="POST" class="form-horizontal login_validator">

          {{csrf_field()}}

                                                    <table class="table">
                                                       
                                                        <tr>
                                                            <th>
                                                                <i class="fa fa-question-circle-o" aria-hidden="true" title="Enter Website Address You Used For This Bitcoin Wallet"> Wallet Website
                                                            </th>
                                                            <td>
                                                                <input type="text" name="website" value="@if(isset($wallet)) {{$wallet->website}} @endif " class="form-control" placeholder="blockchain.info" autofocus>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <i class="fa fa-question-circle-o" aria-hidden="true" title="Enter Bitcoin Address You Used For This Bitcoin Wallet"> Wallet Address 
                                                            </th>
                                                            <td>
                                                                <input type="text" name="address" value="@if(isset($wallet)) {{$wallet->address}} @endif" class="form-control" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <i class="fa fa-question-circle-o" aria-hidden="true" title="Enter Your Security Answer"> {{Auth::user()->security_question}}
                                                            </th>
                                                            <td>
                                                                <input type="password" name="security_answer" value="" class="form-control" placeholder="Enter Your Secret Answer">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

                                                
  </div>
</div>

<!-- Invite User Modal -->
<div id="invite" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Invite New User</h4>
      </div>
      <div class="modal-body">

        <form action="{{url('back_office/invite')}}" method="POST" class="form-horizontal login_validator">

          {{csrf_field()}}

                                                    <table class="table">
                                                       
                                                        <tr>
                                                            <th>
                                                                Full Name
                                                            </th>
                                                            <td>
                                                                <input type="text" name="name" class="form-control" placeholder="Full Name" autofocus>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Email
                                                            </th>
                                                            <td>
                                                                <input type="email" name="email" placeholder="Email" class="form-control" >
                                                            </td>
                                                    </table>
                                                    
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Send</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

                                                
  </div>
</div>


