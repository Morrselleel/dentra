var deleteID;
var checkUN;
var checkEmail;

var id_arry = ['#firstName', '#lastName', '#dob', '#phone', '#zip', '#street', '#city', '#state', '#cardio',
               '#hrt_rate', '#pace_mkr', '#height', '#weight', '#dr_name', '#dr_phone', '#npi', '#mdcr'];

var inputArry = ['#firstname', '#lastname', '#email', '#username', '#password', '#usertype'];

var token = $('#token').val();
var AuthSuccess = $('#AuthSuccess').val();
var id = $('#id').val();

$(document).ready(function() {
    $('body').css({
        backgroundColor: "#ff652f",
    })
    $('#title').text('Dashboard')




/*---------------------------Memorize current page---------------------------*/{
    setTimeout(function () {
        if (localStorage.getItem('current_page') == 'form') {
            $('#form').click()
            $('#hide-all').animate({opacity:"100%"},500)
        } else if (localStorage.getItem('current_page') == 'dashboard') {
            $('#dashboard').click()
            $('#hide-all').animate({ opacity: "100%" },500)
        } else if (localStorage.getItem('current_page') == 'enrollments') {
            $('#enrollments').click()
            $('#hide-all').animate({ opacity: "100%" },500)
        }
    }, 1);
}/*---------------------------Memorize current page---------------------------*/

   




/*---------------------------Login Button actions---------------------------*/{0
    $('#AuthButton').click(function () {
        $('#p').animate({ opacity: "0%" },100)
        $('#load').animate({ opacity: "100%" }, 400)
        var loginUser = $('#loginUser').val();
        var loginPassword = $('#loginPassword').val();
        $.ajax({
            url: 'view/form_1',
            method: "POST",
            data: {
                '_token': token,
                'loginUser': loginUser,
                'loginPassword': loginPassword
            },
            success: function (response) {
                if (response.fail != 'fail'){
                    $('#worning').animate({ opacity: "0" }, 400)
                    $('#load').animate({ opacity: "0%" }, 100)
                    $('#p').animate({ opacity: "100%" }, 400)
                    $('#AuthForm').animate({
                        bottom: "1000px"
                    }, 500, function () {
                        $('#view-wrapper').html(response);
                    })
                }else{
                    $('#load').animate({ opacity: "0%" }, 100)
                    $('#p').animate({ opacity: "100%" }, 400)
                    $('#worning').animate({ opacity: "100%" }, 400)
                }
            }, 
            error: function (error) {
                $('#load').animate({ opacity: "0%" },100)
                $('#p').animate({ opacity: "100%" }, 400)
                console.log(error)
            }
        });

    });
}/*---------------------------Login Button actions---------------------------*/






/*---------------------------Logout Button actions---------------------------*/{
    $('#logout').click(function() {
        $('#title').text('Login')
        $(this).hide()
        $('#load1').show().animate({ opacity: "100%" }, 200)
        $.ajax({
            url: 'view/logout',
            method: "POST",
            data: {
                '_token': token,
            },
            success: function (response)  {            
                $('#hide-all').animate({
                    opacity: "0"
                }, function () {
                    $('#view-wrapper').html(response);
                    $('#AuthForm').css({
                        bottom: "1000px"
                    });
                    $('#AuthForm').animate({
                       bottom:"0" 
                   }, 1000)
                });
                  $('body').css({
                   backgroundColor: "rgb(247, 247, 247)",
                   transition: ".3s ease-out"
               }) 
            }
        });
    });
}/*---------------------------Logout Button actions---------------------------*/






/*---------------------------Dashboard---------------------------*/{
    $('#dashboard').click(function () {
        $('#title').text('Dashboard')
        $('#form_submit').show()
        $('#form_update').hide()
        $('#enrol').hide()
        $('#firstName').val('');
        $('#lastName').val('');
        $('#dob').val('');
        $('#phone').val('');
        $('#zip').val('');
        $('#apt').val('');
        $('#street').val('');
        $('#city').val('');
        $('#state').val('');
        $('#cardio').val('');
        $('#hrt_rate').val('');
        $('#pace_mkr').val('');
        $('#other_cardio').val('');
        $('#height').val('');
        $('#weight').val('');
        $('#dr_name').val('');
        $('#dr_phone').val('');
        $('#npi').val('');
        $('#mdcr').val('')
        localStorage.setItem("current_page", 'dashboard');
        $('.main-board,.sticky-long').css({
            height: "545px"
        })
        localStorage.setItem("dashboard_height", "545px");
        $('.cardio-form,#myList').animate({ opacity: "0" },100).hide()
        $('.cardio-form, #myList').css({
            dispaly: "none"
        })
        $('#list').animate({ opacity: "0" }, 10)
        $('#myChart,#weekly-score,#daily-score,h6,#week-count,#day-count').show().animate({ opacity: "100%" })
        $('#enrollments_icon,#enrollments_txt').animate({ opacity: "0" }, 20)
        $('#form_icon,#form_txt').animate({ opacity: "0" }, 20)
        $('#upper-selected').animate({ top: "0" })
        $('#radius2,#shadow-cover-top').animate({
            opacity: "0"
        },1)
        $('#dashboard_icon,#dashboard_txt').delay(280).animate({ opacity: "100%" }, 200)
    })
}/*---------------------------Dashboard---------------------------*/ 






/*---------------------------Cardio form---------------------------*/{
    $.ajax({
        url: 'view/states',
        type: 'POST',
        dataType: 'html',
        data: {
            '_token': token
        },
        success: function (response) {

            $('#state').html(response)
        },
        error: function (response) {
            console.log(response)
        }
    })



    $('#state').change(function () {
        $.ajax({
            url: 'view/cities',
            type: 'POST',
            dataType: 'html',
            data: {
                '_token': token,
                'state': $(this).val()
            },
            success: function (response) {
                $('#city').html(response)
            },
            error: function (response) {
                console.log(response)
            }
        })
    })



    for (var x = 0; x < 17; x++) {
        $(id_arry[x]).focus(function () {
            $(this).css({
                backgroundColor: "white"
            });
        });
    }
    $('#form').click(function () {
        $('#list').hide()
        $('#title').text('Cardio Form')
        localStorage.setItem("current_page", 'form');
        $('.main-board,.sticky-long').css({
            height: $('#cardio-form').height()+300
        })
        localStorage.setItem("form_height", $('#cardio-form').height() + 300);
        $('#form_icon,#form_txt').delay(280).animate({ opacity: "100%" }, 200)
        $('#myChart,#weekly-score,#daily-score,h6,#week-count,#day-count').animate({ opacity: "0" }, 100).hide()
        $('#myChart,#weekly-score,#daily-score,h6,#week-count,#day-count').css({
            dispaly: "none"
        })
        $('#list').animate({ opacity: "0" }, 10)
        $('.cardio-form').show().animate({opacity:"100%"})
        $('#dashboard_icon,#dashboard_txt').animate({ opacity: "0" }, 20)
        $('#enrollments_icon,#enrollments_txt').animate({ opacity: "0" }, 20)
        $('#upper-selected').animate({ top: "135px" })
        $('#radius2,#shadow-cover-top').delay(100).animate({
            opacity:"100%"
        },1)
    })
}/*---------------------------Cardio form---------------------------*/ 






/*---------------------------Enrollments list---------------------------*/{
    var updateList = function () {
        $.ajax({
            url: 'view/list',
            type: 'GET',
            dataType: 'html',
            data: {
                '_token': token,
                'AuthSuccess': AuthSuccess,
                'id': id
            },
            success: function (response) {
                $('#myTable').html(response)
                $('.main-board,.sticky-long').css({
                    height: $('#myList').height() + 200
                })    
                localStorage.setItem("list_height", $('#myList').height() + 200);
                $('#list').animate({ opacity: "100%" }, 200)
            },
            error: function (response) {
                console.log(response);
            }
        })
    }
    $('#enrollments').click(function () {
        $('#firstName').val('');
        $('#lastName').val('');
        $('#dob').val('');
        $('#phone').val('');
        $('#zip').val('');
        $('#apt').val('');
        $('#street').val('');
        $('#city').val('');
        $('#state').val('');
        $('#cardio').val('');
        $('#hrt_rate').val('');
        $('#pace_mkr').val('');
        $('#other_cardio').val('');
        $('#height').val('');
        $('#weight').val('');
        $('#dr_name').val('');
        $('#dr_phone').val('');
        $('#npi').val('');
        $('#mdcr').val('')
        $('#title').text('Enrollments')
        $('#form_submit').show()
        $('#form_update').hide()
        $('#enrol').hide()
        $('#list').show()
        updateList()
        localStorage.setItem("current_page", 'enrollments');
        $('#myList').show().animate({ opacity: "100%" },500)
        $('#myChart,#weekly-score,#daily-score,h6,#week-count,#day-count').animate({ opacity: "0" }, 100).hide()
        $('#myChart,#weekly-score,#daily-score,h6,#week-count,#day-count').css({
            dispaly: "none"
        })
        $('.cardio-form').animate({ opacity: "0" }, 100).hide()
        $('.cardio-form').css({
            dispaly:"none"
        })
        $('#dashboard_icon,#dashboard_txt').animate({ opacity: "0" }, 20)
        $('#form_icon,#form_txt').animate({ opacity: "0" }, 20)
        $('#upper-selected').animate({ top: "260px" })
        $('#radius2,#shadow-cover-top').delay(100).animate({
            opacity: "100%"
        }, 1)
        $('#enrollments_icon,#enrollments_txt').delay(280).animate({ opacity: "100%" }, 200)
    })

}/*---------------------------Enrollments list---------------------------*/   






/*---------------------------Chart.js API ---------------------------*/{
    var updateChart = function () {
        var myChart = document.getElementById('myChart').getContext('2d');
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';
        $.ajax({
            url: 'view/chart',
            type: 'GET',
            dataType: 'json',
            data: {
                '_token': token,
                'AuthSuccess': AuthSuccess,
                'id': id
            },
            success: function (response) {
                $('#h123').html(response)
                var total = 0
                for (var x = 0; x < 5; x++){
                  total += response.arryData[x]  
                }
                $('#week-count').text(total)
                $('#day-count').text(response.today)
                var massPopChart = new Chart(myChart, {
                    type: 'line',
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: 'daily enrollments',
                            data: response.arryData,
                            backgroundColor: '#ff652f',
                            borderWidth: 2,
                            borderColor: '#f74e11',
                            hoverBorderWidth: 1,
                            hoverBorderColor: 'white'
                        }]
                    },
                    options: {
                        responsive: true,
                        interaction: {
                            mode: 'index',
                            intersect: false,
                        },
                        legend: {
                            display: false,
                            position: 'center',
                            labels: {
                                fontColor: '#000'
                            }
                        },
                        layout: {
                            padding: {
                                left: 50,
                                right: 0,
                                bottom: 0,
                                top: 0
                            }
                        },
                        tooltips: {
                            enabled: true
                        },
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    fontSize: 15,
                                    fontColor: "white"
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    fontSize: 15,
                                    fontColor: "white"
                                }
                            }]
                        }
                    }
                });
            },
            error: function (response) {
                console.log(response);
            }
        })
    }
    setTimeout(function () {
        $('#myChart').click()
    }, 1);
    $('#myChart').click(function () {
        updateChart();
    })
}/*---------------------------Chart.js API ---------------------------*/






/*---------------------------dialog close button actions for delete list item & create new user---------------------------*/{
    $('#alert,#btn-close,#cancel').click(function(){
        if (localStorage.getItem('current_page') == 'form') {
            $('.main-board,.sticky-long').css({
                height: localStorage.getItem('form_height')
            })
        } else if (localStorage.getItem('current_page') == 'dashboard') {
            $('.main-board,.sticky-long').css({
                height: localStorage.getItem('dashboard_height')
            })
        } else if (localStorage.getItem('current_page') == 'enrollments') {
            $('.main-board,.sticky-long').css({
                height: localStorage.getItem('list_height')
            })
        }
        $('#alert-wrapper,#add-wrapper').css({
            "pointer-events": "none",
        })
        $('#hide-all').show()
        $('#new-user').html('Create new user')
        $('#btn-close').css({
            border: "none",
            outline: "none"
        })
        $('#dialog,#add-dialog').animate({
            top: "-250px",
        })
        $('#alert,#add').animate({
            opacity: "0"
        },400) 
        setTimeout(function () {
           $('#alert,#add').hide()
        }, 400);
    })
}/*---------------------------dialog close button actions for delete list item & create new user---------------------------*/






/*---------------------------List delete button actions---------------------------*/{
    $('#delete').click(function () {
        $.ajax({
            url: 'view/delete_item',
            type: 'POST',
            data: {
                '_token': token,
                'item_id': deleteID
            },
            success: function (response) {
                updateList()
            }
        });
    })
}/*---------------------------List delete button actions---------------------------*/






/*---------------------------Create new user dialog---------------------------*/{

    if (AuthSuccess == "Admin"){

        $('#add-person').show()

    }else
        if (AuthSuccess == "Agent"){
            $('#add-person').hide()
    }

    $('#email').keyup(function () {
        if ($('#email').val() == '') {
            $('#accepted').animate({ opacity: "0" }, 100).hide()
            $('#denied,#emlexst').animate({ opacity: "0" }, 100).hide()
        }else{
            $.ajax({
                url: 'view/email_check',
                type: 'POST',
                data: {
                    '_token': token,
                    'email': $('#email').val()
                },
                success: function (response) {
                    if (typeof response.auth == 'undefined') {
                        checkEmail = 'accepted'
                        $('#creatUser').css({
                            backgroundColor: "var(--main-color)"
                        })
                        $('#denied,#emlexst').animate({ opacity: "0" }, 100).hide()
                        $('#accepted').animate({ opacity: "100%" }, 100).show()
                    } else
                        if (typeof response.auth != 'undefined') {
                            checkEmail = 'denied'
                            $('#creatUser').css({
                                backgroundColor: "var(--contrast-color-2)"
                            })
                            $('#accepted').animate({ opacity: "0" }, 100).hide()
                            $('#denied,#emlexst').animate({ opacity: "100%" }, 100).show()
                    }
                }
            })
        }
    })
    $('#username').keyup(function () {
        if ($('#username').val() == '') {
            $('#accepted1').animate({ opacity: "0" }, 100).hide()
            $('#denied1,#unexst').animate({ opacity: "0" }, 100).hide()
        } else {
            $.ajax({
                url: 'view/username_check',
                type: 'POST',
                data: {
                    '_token':token,
                    'username': $('#username').val()
                },
                success: function (response) {
                    if (typeof response.auth == 'undefined') {
                        checkUN = 'accepted'
                        $('#creatUser').css({
                            backgroundColor: "var(--main-color)"
                        })
                        $('#denied1,#unexst').animate({ opacity: "0" }, 100).hide()
                        $('#accepted1').animate({ opacity: "100%" }, 100).show()
                    } else
                        if (typeof response.auth != 'undefined') {
                            checkUN = 'denied'
                            $('#creatUser').css({
                                backgroundColor: "var(--contrast-color-2)"
                            })
                            $('#accepted1').animate({ opacity: "0" }, 100).hide()
                            $('#denied1,#unexst').animate({ opacity: "100%" },100).show()
                    }
                }
            })
        }
    })
    for (var x = 0; x < 6; x++) {
        $(inputArry[x]).focus(function(){
            $(this).css({
                backgroundColor: "white"
            });
        })
    }
    $('#creatUser').click(function () {
            var firstname = $('#firstname').val()
            var lastname = $('#lastname').val()
            var email = $('#email').val()
            var username = $('#username').val()
            var password = $('#password').val()
            var usertype = $('#usertype').val()
            if (checkUN == 'accepted' && checkEmail == 'accepted') {
            if (firstname != '' && lastname != '' && email != '' && username != '' && password != '' && usertype != '') {
                $.ajax({
                    url: 'view/create_user',
                    type: 'POST',
                    data: {
                        '_token': token,
                        'firstname': firstname,
                        'lastname': lastname,
                        'email': email,
                        'username': username,
                        'password': password,
                        'usertype': usertype
                    },
                    success: function (response) {
                        $('#firstname').val('')
                        $('#lastname').val('')
                        $('#email').val('')
                        $('#username').val('')
                        $('#password').val('')
                        $('#usertype').val('')
                        $('#new-user').html('New user ID: AU' + response.new_user+' created successfully' )
                    },
                    error: function (response) {
                        console.log(response)
                    }
                })
            } else {
                for (var x = 0; x < 6; x++) {
                    if ($(inputArry[x]).val() == "") {
                        $(inputArry[x]).css({
                            backgroundColor: "rgb(255, 142, 142)"
                        });
                    } else {
                        $(inputArry[x]).css({
                            backgroundColor: "white"
                        });
                    }
                }
            }
            } else {
                for (var x = 0; x < 6; x++) {
                    if ($(inputArry[x]).val() == "") {
                        $(inputArry[x]).css({  
                        backgroundColor: "rgb(255, 142, 142)"
                        });
                    } else {
                        $(inputArry[x]).css({
                        backgroundColor: "white"
                        });
                    }
                }
            }
    })
}/*---------------------------Create new user dialog---------------------------*/
});









/*========================================================Methods========================================================*/











/*---------------------------Submit Enrollment Method---------------------------*/{
var enrollmentCtrl = function (path) {
    var id = $('#id').val();
    var user_name = $('#user_name').val();
    var firstName = $('#firstName').val();
    var lastName = $('#lastName').val();
    var dob = $('#dob').val();
    var phone = $('#phone').val();
    var zip = $('#zip').val();
    var apt = $('#apt').val();
    var street = $('#street').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var cardio = $('#cardio').val();
    var hrt_rate = $('#hrt_rate').val();
    var pace_mkr = $('#pace_mkr').val();
    var other_cardio = $('#other_cardio').val();
    var height = $('#height').val();
    var weight = $('#weight').val();
    var dr_name = $('#dr_name').val();
    var dr_phone = $('#dr_phone').val();
    var npi = $('#npi').val();
    var mdcr = $('#mdcr').val();
    if (firstName != "" && lastName != "" && dob != "" && phone != "" && zip != "" && street != "" && 
       (cardio == "yes" || cardio == "no" || cardio == "not sure") && city != "" && (state != "" || state != "STATE") && 
       (hrt_rate == "yes" || hrt_rate == "no" || hrt_rate == "not sure") && (pace_mkr == "yes" || pace_mkr == "no") && 
        height != "" && weight != "" && dr_name != "" && dr_phone != "" && npi != "" && mdcr != "") {
        $('#p,#p1').animate({ opacity: "0%" }, 100)
        $('#load,#load1').animate({ opacity: "100%" }, 400)
        $.ajax({
            url: path,
            type: 'POST',
            data: {
                '_token': token,
                '_id': id,
                'enrol_id': $('#enrol-nmbr').text(),
                'user_name': user_name,
                'firstName': firstName,
                'lastName': lastName,
                'dob': dob,
                'phone': phone,
                'zip': zip,
                'apt': apt,
                'street': street,
                'city': city,
                'state': state,
                'cardio': cardio,
                'hrt_rate': hrt_rate,
                'pace_mkr': pace_mkr,
                'other_cardio': other_cardio,
                'height': height,
                'weight': weight,
                'dr_name': dr_name,
                'dr_phone': dr_phone,
                'npi': npi,
                'mdcr': mdcr,
            },
            success: function (response) {
                $('#load,#load1').animate({ opacity: "0%" }, 100)
                $('#p,#p1').animate({ opacity: "100%" }, 400)
                $('html,body').delay(1000).animate({
                    scrollTop: 0
                }, 1000)
                if (path == 'view/submit_enrollment'){
                    $('#ce').text('')
                    $('#enrol-nmbr').show().text('New enrollment CE' + response.createdID+' created successfully.')
                } else if (path == 'view/update_enrollment'){
                    $('#ce').text('')
                    $('#enrol-nmbr').show().text('Your enrollment CE' + $('#enrol-nmbr').text() + ' updated successfully.')
                }
                $('#firstName').val('');
                $('#lastName').val('');
                $('#dob').val('');
                $('#phone').val('');
                $('#zip').val('');
                $('#apt').val('');
                $('#street').val('');
                $('#city').val('');
                $('#state').val('');
                $('#cardio').val('');
                $('#hrt_rate').val('');
                $('#pace_mkr').val('');
                $('#other_cardio').val('');
                $('#height').val('');
                $('#weight').val('');
                $('#dr_name').val('');
                $('#dr_phone').val('');
                $('#npi').val('');
                $('#mdcr').val('')
            },
            error: function (massege) {
                console.log(massege)
            }
        });
    } else {
        for (var x = 0; x < 17; x++) {
            if ($(id_arry[x]).val() == "" || $(id_arry[x]).val() == "STATE" || $(id_arry[x]).val() == "CITY") {
                $(id_arry[x]).css({
                    backgroundColor: "rgb(255, 142, 142)"
                });
            } else {
                $(id_arry[x]).css({
                    backgroundColor: "white"
                });
            }
        }
    }
}
}/*---------------------------Submit Enrollment Method---------------------------*/




/*---------------------------Delete Enrollment Method---------------------------*/{
var deleteItem = function(id){
    deleteID = id
    $('#alert-wrapper').css({
        "pointer-events":"all",
        height: $('#myList').height() + 380
    })
    $('#dialog').animate({
        top: "50px",
    })
        $('#enrol-del').text('You are about to delete enrollment CE' + id)
        $('#alert').animate({
            opacity: "100%"
        }).show()
        $('#dialog').animate({
            top: "-121px"
        })
}
}/*---------------------------Delete Enrollment Method---------------------------*/




/*---------------------------Update Enrollment Method---------------------------*/{
var editItem = function (id) {
    var editId = $('#editId'+id).val()
    $.ajax({
        url: 'view/edit',
        type: 'POST',
        dataType: 'json',
        data: {
            '_token': token,
            'editId': editId
        },
        success: function (response) {         
            $('#form_submit').hide()
            $('#form_update').show()
            $('#enrol').show()
            $('#enrol-nmbr').html(id)
            $('#firstName').val(response.arrayEnroll[0]);
            $('#lastName').val(response.arrayEnroll[1]);
            $('#dob').val(response.arrayEnroll[2]);
            $('#phone').val(response.arrayEnroll[3]);
            $('#zip').val(response.arrayEnroll[4]);
            $('#apt').val(response.arrayEnroll[5]);
            $('#street').val(response.arrayEnroll[6]);
            $('#state').val(response.arrayEnroll[8]);

            $.ajax({
                url: 'view/cities',
                type: 'POST',
                dataType: 'html',
                data: {
                    '_token': token,
                    'state': $('#state').val()
                },
                success: function (response1) {
                    $('#city').html(response1)
                    $('#city').val(response.arrayEnroll[7]);
                },
                error: function (response1) {
                    console.log(response1)
                }
            })
           
            $('#cardio').val(response.arrayEnroll[9])
            $('#hrt_rate').val(response.arrayEnroll[10])
            $('#pace_mkr').val(response.arrayEnroll[11])
            $('#other_cardio').val(response.arrayEnroll[12]);
            $('#height').val(response.arrayEnroll[13]);
            $('#weight').val(response.arrayEnroll[14]);
            $('#dr_name').val(response.arrayEnroll[15]);
            $('#dr_phone').val(response.arrayEnroll[16]);
            $('#npi').val(response.arrayEnroll[17]);
            $('#mdcr').val(response.arrayEnroll[18]);
            setTimeout(function () {
                $('#form').click()
                $('#list').hide()
            }, 1);
        }
    })
}
}/*---------------------------Update Enrollment Method---------------------------*/




/*---------------------------Create new User Method---------------------------*/{
var addPerson = function () {
    $('#title').text('Create User')
    $('.main-board,.sticky-long').css({
        height: "400px"
    })
    $('#add-wrapper').css({
        "pointer-events": "all",
    })
    $('#hide-all').hide()
    $('#add-dialog').animate({
        top: "40px",
    })
    $('#add').animate({
        opacity: "100%"
    }).show()
    $('#add-dialog').animate({
        top: "-70px"
    })
}
}/*---------------------------Create new User Method---------------------------*/





