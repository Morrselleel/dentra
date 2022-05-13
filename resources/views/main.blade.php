<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title id="title"></title>
</head>
<body>
    <div id="view-wrapper">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        @if(Session()->has('AuthSuccess') && Session()->get('AuthSuccess') != 'fail')

        <input type="hidden" name="AuthSuccess" id="AuthSuccess" value="{{ Session()->get('AuthSuccess') }}">
        <input type="hidden" name="id" id="id" value="{{ Session()->get('id') }}">

        <div class="sticky-long" id="add-wrapper" style="top:-180px;left:0px;pointer-events: none;">
            <div class="alert-background modal " tabindex="-1" id="add" style="animation: tobkgnd 1s linear ;">
                <div class="modal-dialog alert-dialog" id="add-dialog">
                    <div class="modal-content"
                        style="display: flex;justify-content: center;align-items: center;border:none;box-shadow:var(--shadow) ">
                        <a id="btn-close" style="position:relative;cursor:pointer;left:214px;"><i
                                class="bi bi-x-square close"></i></a>
                        <h5 id="new-user">Create new user</h5>
                        <label>First Name</label>
                        <input class="field-style" style="border:1px solid black" type="text" name="firstname"
                            id="firstname" autocomplete="new-password" require>
                        <label>Last Name</label>
                        <input class="field-style" style="border:1px solid black" type="text" name="lastname"
                            id="lastname" autocomplete="new-password" require>
                        <label>Email</label>
                        <input class="field-style" style="border:1px solid black" type="email" name="email" id="email"
                            autocomplete="new-password" require>
                        <div style="position:absolute; right:129px;top:210px;">
                            <i class="bi bi-check-circle" id="accepted"
                                style="position:absolute;color:green;font-size:20px;opacity:0"></i>
                            <i class="bi bi-x-circle" id="denied"
                                style="position:absolute;color:red;font-size:20px;opacity:0"></i>
                            <span id="emlexst"
                                style="position:absolute;color:red;right:-93px;top:15px;font-size:11px;font-weight:bold;opacity:0">email
                                exists !</span>
                        </div>
                        <label>User Name</label>
                        <input class="field-style" style="border:1px solid black" type="text" name="username"
                            id="username" autocomplete="new-password" require>
                        <div style="position:absolute; right:130px;top:269px;">
                            <i class="bi bi-check-circle" id="accepted1"
                                style="position:absolute;color:green;font-size:20px;opacity:0"></i>
                            <i class="bi bi-x-circle" id="denied1"
                                style="position:absolute;color:red;font-size:20px;opacity:0"></i>
                            <span id="unexst"
                                style="position:absolute;color:red;right:-115px;top:15px;font-size:11px;font-weight:bold;opacity:0">username
                                exists !</span>
                        </div>
                        <label>Password</label>
                        <input class="field-style" style="border:1px solid black" type="password" name="password"
                            id="password" autocomplete="new-password" require>
                        <label>User Type</label>
                        <select class="field-style" style="border:1px solid black" name="usertype" id="usertype"
                            require>
                            <option value=""></option>
                            <option value="Admin">Admin</option>
                            <option value="Agent">Agent</option>
                        </select>
                        <div class="submit-btn" id="creatUser" style="height:30px;margin-top:20px;margin-bottom:20px;padding-top:3px;
                            font-weight:lighter;margin-right:157px">Create User</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="hide-all" style="opacity:0">
{{--..........................showing User Name.......................--}}
            <div style="position:absolute;margin-top:3px">
                <span class="bi bi-person-fill user-icon" style></span>
                <h5 class="user-name">Welcome {{ Session()->get('AuthSuccess') }} {{ Session()->get('AuthName')}} AU{{
                    Session()->get('id')}}</h5>
            </div>
{{--..........................showing User Name.......................--}}
            <div class="main-board"></div>
            <div class="sticky-long" id="main-sticky">
                <div class="sidebar">
                    <div class="sidebar-btn" id="dashboard">
                        <i class="bi bi-house" style="font-size: 28px;cursor: pointer;"></i>
                    </div>
                    <div class="sidebar-btn" id="form">
                        <i class="bi bi-ui-checks-grid" style="font-size: 20px;margin-left:4px;cursor: pointer;"></i>
                    </div>
                    <div class="sidebar-btn" id="enrollments">
                        <svg style="font-size:50px;margin-left:2px;cursor: pointer;" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-list">
                            <line x1="8" y1="6" x2="21" y2="6"></line>
                            <line x1="8" y1="12" x2="21" y2="12">
                            </line>
                            <line x1="8" y1="18" x2="21" y2="18"></line>
                            <line x1="3" y1="6" x2="3.01" y2="6">
                            </line>
                            <line x1="3" y1="12" x2="3.01" y2="12"></line>
                            <line x1="3" y1="18" x2="3.01" y2="18"></line>
                        </svg>
                    </div>
                    <div class=" sidebar-selected" id="upper-selected">
                        <div class="shadow-cover-right"></div>
                        <div class="shadow-cover-bottom"></div>
                        <div class="shadow-cover-top" id="shadow-cover-top"></div>
                        <div class="outter-radius-bottom" id="radius1"></div>
                        <div class="outter-radius-top" id="radius2"></div>
                        <i class="bi bi-house sidebar-btn" id="dashboard_icon"
                            style="position: absolute; font-size: 28px ;margin-left:15px; top:0px;color:var(--secondary-color)"></i>
                        <h5 id="dashboard_txt"
                            style="position: absolute; margin-left:45px; top:17px;color:var(--secondary-color)">
                            Dashboard</h5>
                        <i class="bi bi-ui-checks-grid sidebar-btn" id="form_icon"
                            style="position: absolute;font-size: 20px; margin-left:19px; top:6px;color:var(--secondary-color);opacity:0;"></i>
                        <h5 id="form_txt"
                            style="position: absolute; margin-left:45px; top:14px;color:var(--secondary-color);opacity:0;">
                            Form</h5>
                        <i class="bi sidebar-btn" id="enrollments_icon"
                            style="position: absolute; margin-left:17px; top:-6px;color:var(--secondary-color);opacity:0;">
                            <svg style="font-size:50px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12" style="font-size:35px;">
                                </line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3.01" y2="6">
                                </line>
                                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                <line x1="3" y1="18" x2="3.01" y2="18"></line>
                            </svg>
                        </i>
                        <h5 id="enrollments_txt"
                            style="position: absolute; margin-left:45px; top:12.5px;color:var(--secondary-color);opacity:0;">
                            Enrollments</h5>
                    </div>
                </div>
                <div class="top-board">
{{--..........................logout button.......................--}}
                    <form class="logout-form">
                        <div class="spinner" id="load1" style="display:none; right:-11px;top:-6px"></div>
                        <div id="logout" class="logout-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                        </div>
                    </form>
{{--..........................logout button.......................--}}     


{{--..........................Create new User (AdminAccess).......................--}}                    
                    <div id="add-person" onclick="addPerson()" class="logout-btn" style="right:100px;top:-70px">
                        <i class="bi bi-person-plus"></i>
                    </div>
{{--..........................Create new User (AdminAccess).......................--}}  


                    @include('index.cardio-form')
                    @include('index.admin')
                    @include('index.list')
                </div>
            </div>
            @else
            @include('auth.login')
            @endif
        </div>







        {{-- jQuery --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
        <script src="{{asset('js/script.js')}}"></script>
</body>
</html>