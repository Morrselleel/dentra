<div id="list" style="opacity:0;">
    <div class="sticky-long" id="alert-wrapper" style="top:-180px;left:-200px;pointer-events: none;">
        <div class="alert-background modal " tabindex="-1" id="alert" style="">
            <div class="modal-dialog alert-dialog" id="dialog">
                <div class="modal-content" style="display: flex;justify-content: center;align-items: center;">
                    <a id="btn-close" style="position:relative;cursor:pointer;left:214px;"><i
                            class="bi bi-x-square close"></i></a>
                    <i class="bi bi-x-circle cls-sign"></i>
                    <h1>Are you sure?</h1>
                    <h1 id="enrol-del" style="font-size:20px"></h1>
                    <input type="hidden" name="item_id" value="">
                    <span class="cancel" id="cancel">Cancel</span>
                    <span class="delete" id="delete">Delete</span>
                    <div style="height:50px"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="myList" class="myList">
        <table id="myTable" class="table table-striped" style="color:var(--form-background);">
            <thead style="font-size:14px;border:none;">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Date of birth</th>
                    <th>phone</th>
                    <th>Address</th>
                    <th>Managing Dr</th>
                    <th>Medicare Id</th>
                    <th>Creation date</th>
                    <th>Agent</th>
                    <td></td>
                </tr>
            </thead>
            <tbody id="myTableItems" style="font-size:14px;">
                @if(isset($enrolls) && $enrolls->count() >0)
                @foreach($enrolls as $enroll)
                <tr>
                    <td>CE{{$enroll->id}}</td>
                    <td>{{$enroll->first_name}} {{$enroll->last_name}}</td>
                    <td>{{$enroll->dob}}</td>
                    <td>{{$enroll->phone_number}}</td>
                    <td>{{$enroll->apt_number}} {{$enroll->street}} {{$enroll->city}} {{$enroll->state}}
                        {{$enroll->zipcode}}</td>
                    <td>
                        <p>Name: {{$enroll->dr_name}}</p>
                        <p>Phone: {{$enroll->dr_phone_number}}</p>
                        <p>NPI: {{$enroll->dr_npi}}</p>
                    </td>
                    <td>{{$enroll->medicare}}</td>
                    <td>{{$enroll->creation_day}}</td>
                    <td>{{$enroll->user_name}}</td>
                    <td>
                        <form>
                            <input type="hidden" id="editId{{$enroll->id}}" name="editId" value="{{$enroll->id}}">
                            <a id="edit{{$enroll->id}}" href="javascript:editItem({{$enroll->id}})"
                                class="bi bi-pencil-square findID" style="position:absolute; cursor: pointer;color:rgb(31, 177, 245);
                                margin-top:20px ;margin-left:30px;font-size:19px"></a>
                        </form>
                        <a href="javascript:deleteItem({{$enroll->id}})" class="bi bi-trash" style="position:absolute;cursor: pointer;color:rgb(255, 108, 108);
                        margin-top:60px ;margin-left:29.5px;font-size:19px"></a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>












{{--













--}}