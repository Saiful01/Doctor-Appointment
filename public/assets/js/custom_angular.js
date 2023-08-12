app.controller('appointmentController', function ($scope, $http, $location) {


    var intervalId;

    $scope.sendOtp = function () {


        if ($scope.phone == null || $scope.phone.toString().length < 10) {
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

        let url = "/web-api/otp-sent";

        let params = {
            'phone': $scope.phone,
        };
        document.getElementById("loader").style.display = "block";
        $http.post(url, params).then(function success(response) {

            console.log(response.data)

            if (response.data.code == 200) {
                messageSuccess(response.data.message)
                $scope.startCounter(120);
                document.getElementById("phone-area").style.display = "none";
                document.getElementById("otp-area").style.display = "block";
                document.getElementById("timer").style.display = "block";
                document.getElementById("registration-area").style.display = "none";
                document.getElementById("loader").style.display = "none";

            } else {
                document.getElementById("loader").style.display = "none";

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
        console.log($scope.password)
        if ($scope.name == null) {
            messageError('Please Enter Your name')
            return;
        }
        if ($scope.gender == null) {
            messageError('Please Enter Your Gender')
            return;
        }
        if ($scope.occupation == null) {
            messageError('Please Enter Your Occupation')
            return;
        }
        if ($scope.designation == null) {
            messageError('Please Enter Your Designation')
            return;
        }
        if ($scope.institution == null) {
            messageError('Please Enter Your Institution')
            return;
        }
        if ($scope.address == null) {
            messageError('Please Enter Your address')
            return;
        }

        if ($scope.password == null) {
            messageError('Please Enter Your password')
            return;
        }
        if ($scope.cnf_password == null) {
            messageError('Please Enter Your Confirm password')
            return;
        }
        if ($scope.cnf_password != $scope.password) {
            messageError('Password And Confirm Password Not Match')
            return;
        }

        let url = "/web-api/registration/save";
        let params = {
            'name': $scope.name,
            'phone': $scope.phone,
            'email': $scope.email,
            'gender': $scope.gender,
            'occupation': $scope.occupation,
            'designation': $scope.designation,
            'institution': $scope.institution,
            'address': $scope.address,
            'password': $scope.password,
        };
        $http.post(url, params).then(function success(response) {

            if (response.data.code == 200) {

                messageSuccess(response.data.message)
                window.location.href = "/applicant/profile";

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
