app.controller('appointmentController', function ($scope, $http, $location) {


    console.log('angular active')


    var intervalId;

    $scope.selectedApplicantType = "Self";
    $scope.appointment_date_type = "Today";
    $scope.appoint_type = "New Visit";


    document.getElementById("guest").style.display = "none";
    document.getElementById("date-area").style.display = "none";
    document.getElementById("guest2").style.display = "none";
    document.getElementById("date-area2").style.display = "none";





    $scope.sendOtp = function () {




        if ($scope.phone == null || $scope.phone.toString().length < 10) {z
            messageError('Please enter a valid phone number with at least 10 digits')
            return;
        }

        if (isNaN($scope.phone)) {
            messageError('Please Enter Number Not String')
            return;
        }
        if ($scope.phone.toString().charAt(0) !== '0') {
            $scope.phone = '0' + $scope.phone;
        }

        //console.log($scope.phone)

        let url = "/web-api/otp-sent";

        let params = {
            'phone': $scope.phone,
        };
      /*  document.getElementById("loader").style.display = "block";*/
        $http.post(url, params).then(function success(response) {

           // console.log(response.data)

            if (response.data.code == 200) {
                messageSuccess(response.data.message)
                $scope.startCounter(120);
                console.log(response.data.otp)
                document.getElementById("phone-area").style.display = "none";
                document.getElementById("otp-area").style.display = "block";
                document.getElementById("timer").style.display = "block";
                document.getElementById("registration-area").style.display = "none";
                document.getElementById("loader").style.display = "none";

            } else {

               /* document.getElementById("loader").style.display = "none";*/

                messageError(response.data.message)
                if (response.data.message == "You have an active OTP") {
                    $scope.startCounter(response.data.time);
                    document.getElementById("phone-area").style.display = "none";
                    document.getElementById("otp-area").style.display = "block";
                    document.getElementById("timer").style.display = "block";
                    document.getElementById("registration-area").style.display = "none";


                }

            }

        });
    }

    $scope.verifyOtp = function () {
        console.log('verify OTP')

        if ($scope.otp == null) {
            messageError('Please Enter Your OTP')
            return;
        }
        if (isNaN($scope.otp)) {
            messageError('Please Enter Number Not String')
            return;
        }
        let url = "/web-api/otp-verify";

        let params = {
            'phone': $scope.phone,
            'otp': $scope.otp,
        };
        $http.post(url, params).then(function success(response) {
            console.log(response.data)

            if (response.data.code == 200) {
                messageSuccess(response.data.message)
                $scope.startCounter(1000);
                document.getElementById("phone-area").style.display = "none";
                document.getElementById("otp-area").style.display = "none";
                document.getElementById("timer").style.display = "none";
                document.getElementById("registration-area").style.display = "block";

            } else {

                messageError(response.data.message)

            }

        });
    }

    $scope.startCounter = function (time) {
        document.getElementById("phone-area").style.display = "none";
        document.getElementById("otp-area").style.display = "block";
        document.getElementById("timer").style.display = "block";
        document.getElementById("registration-area").style.display = "none";

        var sec = time;
        clearInterval(intervalId);
        intervalId = setInterval(function () {
            document.getElementById("timer").innerHTML = sec + " Seconds remaining";
            sec--;
            if (sec == 0) {
                document.getElementById("phone-area").style.display = "block";
                document.getElementById("otp-area").style.display = "none";
                document.getElementById("timer").style.display = "none";
                document.getElementById("registration-area").style.display = "none";
                clearInterval(intervalId);
            }
        }, 1000);
    };
    $scope.register = function () {
        console.log( 'all ok')
        if ($scope.name == null) {
            messageError('Please Enter Your name')
            return;
        }
        if ($scope.gender == null) {
            messageError('Please Enter Your Gender')
            return;
        }
        if ($scope.blood_group == null) {
            messageError('Please Enter Your Blood Group')
            return;
        }
        if ($scope.division_id == null) {
            messageError('Please Enter Your Division')
            return;
        }
        if ($scope.district_id == null) {
            messageError('Please Enter Your District')
            return;
        }
        if ($scope.upazila_id == null) {
            messageError('Please Enter Your Area')
            return;
        }
        if ($scope.address == null) {
            messageError('Please Enter Your Address')
            return;
        }
        if ($scope.age == null) {
            messageError('Please Enter Your Age')
            return;
        }
        if ($scope.dob == null) {
            messageError('Please Enter Your Date of Birth')
            return;
        }

        if ($scope.password == null) {
            messageError('Please Enter Your password')
            return;
        }
   /*     if ($scope.cnf_password == null) {
            messageError('Please Enter Your Confirm password')
            return;
        }
        if ($scope.cnf_password != $scope.password) {
            messageError('Password And Confirm Password Not Match')
            return;
        }*/

        let url = "/web-api/registration/save";
        let params = {
            'name': $scope.name,
            'phone': $scope.phone,
            'email': $scope.email,
            'gender': $scope.gender,
            'blood_group': $scope.blood_group,
            'age': $scope.age,
            'dob': $scope.dob,
            'division_id': $scope.division_id,
            'district_id': $scope.district_id,
            'upazila_id': $scope.upazila_id,
            'address': $scope.address,
            'password': $scope.password,
        };
        $http.post(url, params).then(function success(response) {

            if (response.data.code == 200) {

                messageSuccess(response.data.message)
                window.location.href = "/patient/profile";

            }
            if (response.data.code == 400) {

                messageError(response.data.message)
            }
            console.log(response.data);

        });

    }
    $scope.passwordReset = function () {

        if ($scope.password == null) {
            messageError('Please Enter Your password')
            return;
        }
        if ($scope.confirm_password == null) {
            messageError('Please Enter Your Confirm password')
            return;
        }
        if ($scope.confirm_password != $scope.password) {
            messageError('Password And Confirm Password Not Match')
            return;
        }

        let url = "/web-api/reset-password";
        let params = {
            'phone': $scope.phone,
            'password': $scope.password,
        };
        $http.post(url, params).then(function success(response) {

            if (response.data.code == 200) {

                Swal.fire({
                    title: 'Congratulations !',
                    text: response.data.message,
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#198754',
                    confirmButtonText: 'Please Login'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location = "/applicant/login"
                    }
                })

             /*   window.location.href = "/applicant/login";
                messageSuccess(response.data.message)*/


            }
            if (response.data.code == 400) {

                messageSuccess(response.data.message)
            }
            console.log(response.data);

        });

    }




    $scope.selectedButton = null;
    $scope.selectedTitle = ''; // Initialize the selectedTitle variable

    $scope.serialCheck = function(book, title, event) {
        if (book == 1) {
            messageError('This Serial is Booked, Please Select Blue Color Serial For Booking');
        } else {
            if ($scope.appoint_date) {
                let url = "/web-api/serial-booking-check";
                let params = {
                    'serial_id': $scope.title,
                    'appoint_date': $scope.appoint_date,
                };

                $http.post(url, params).then(function success(response) {
                    if (response.data.code == 200) {
                        console.log(response.data);
                        console.log('Date Check');
                        // Remove btn-success class from all buttons
                        angular.element(document.querySelectorAll('.btn-success')).removeClass('btn-success');
                        // Add btn-success class to the clicked button
                        angular.element(event.target).addClass('btn-success');
                        // Set the selected button title
                        $scope.selectedButton = title;
                        // Update the input field with the selected title
                        $scope.selectedTitle = title;
                    }
                    if (response.data.code == 400) {
                        messageSuccess(response.data.message);
                    }
                })
            } else {

                console.log('outside');
                // Remove btn-success class from all buttons
                angular.element(document.querySelectorAll('.btn-success')).removeClass('btn-success');
                // Add btn-success class to the clicked button
                angular.element(event.target).addClass('btn-success');
                // Set the selected button title
                $scope.selectedButton = title;
                // Update the input field with the selected title
                $scope.selectedTitle = title;
                // Nullify the $scope.appoint_date value

            }
        }
    };

    $scope.applicantType = function(selectedValue) {
        console.log(selectedValue);
        if (selectedValue === "Self") {
            console.log('self');
            document.getElementById("guest").style.display = "none";
        } else {
            console.log('guest');
            document.getElementById("guest").style.display = "block";
        }
    };
    $scope.applicantType2 = function(selectedValue) {
        console.log(selectedValue);
        if (selectedValue === "Self") {
            console.log('self');
            document.getElementById("guest2").style.display = "none";
        } else {
            console.log('guest');
            document.getElementById("guest2").style.display = "block";
        }
    };
    $scope.appointmentDateType = function( value) {
        console.log(value);
        if (value === "Today") {
            $scope.appoint_date = null;
            console.log('Today');
            document.getElementById("date-area").style.display = "none";
        } else {
            console.log('other date');
            document.getElementById("date-area").style.display = "block";
        }
    };
    $scope.appointmentDateType2 = function( value) {
        console.log(value);
        if (value === "Today") {
            $scope.appoint_date = null;
            console.log('Today');
            document.getElementById("date-area2").style.display = "none";
        } else {
            console.log('other date');
            document.getElementById("date-area2").style.display = "block";
        }
    };


    $scope.appointmentStore = function () {

        if (!$scope.appointment_date_type) {
            messageError('Please Select Appoint Date Type')
            return;
        }

        if ($scope.appointment_date_type === "Other" && $scope.appoint_date == null) {
            messageError('Please Select Your Appointment Date ')
            return;
        }
        if (!$scope.selectedTitle) {
            messageError('Please Select Your  Serial')
            return;
        }
        if (!$scope.appoint_type) {
            messageError('Please Select Appoint Type')
            return;
        }
        if (!$scope.selectedApplicantType) {
            messageError('Please Select Applicant Type')
            return;
        }

        if ($scope.selectedApplicantType === "Other") {
            if (!$scope.name) {
                messageError('Please Enter Your Patient name')
                return;
            }
            if (!$scope.phone) {
                messageError('Please Enter Your Patient Phone')
                return;
            }
            if (!$scope.dob) {
                messageError('Please Enter Your Patient Date Of Birth')
                return;
            }
            if (!$scope.address) {
                messageError('Please Enter Your Patient Address')
                return;
            }

        }



        let url = "/web-api/appointment/save";
        let params = {
            'appointment_date_type': $scope.appointment_date_type,
            'appoint_date': $scope.appoint_date,
            'serial_id': $scope.selectedTitle,
            'appoint_type': $scope.appoint_type,
            'applicant_type': $scope.selectedApplicantType,
            'name': $scope.name,
            'phone': $scope.phone,
            'dob': $scope.dob,
            'address': $scope.address,

        };
        $http.post(url, params).then(function success(response) {

            if (response.data.code == 200) {

                messageSuccess(response.data.message)
                window.location.href = "/patient/profile";

            }
            if (response.data.code == 400) {

                messageError(response.data.message)
            }
            console.log(response.data);

        });

    }







    function messageError(message) {

        Swal.fire({
            position: 'center',
            icon: 'error',
            title: message,
            showConfirmButton: true,
            timer: 3000
        })

    }

    function messageSuccess(message) {

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: message,
            showConfirmButton: true,
            timer: 3000
        })

    }


});
