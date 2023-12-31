<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap 5 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>


        /* Styles for desktop screens (e.g., screens wider than 768px) */
        @media (min-width: 769px) {
            .desktop-background {
                background: url('../img/1st.png') center;
                height: 166px;
            }
            .desktop-background1 {
                background: url('../img/Artboard 8.png') center;
                height: 700px;
                margin-top: -10px;
            }
            .desktop-background2 {
                background: url('../img/Artboard 9.png') center;
                height: 326px;
                margin-top: -50px;


            }
            .quiz {
                color: white !important;
                margin-top: -20px;
                padding-bottom: 150px;

            }
            .quiz input{
                margin-top: 10px !important;
            }

            input::placeholder {
                font-size: 14px !important;
            }
            .header-text{
                padding-top: 50px;
            }
            .quiz-header {
                font-size: 15px;

            }
        }

        /* Styles for mobile screens (e.g., screens 768px or narrower) */
        @media (max-width: 768px) {
            .mobile-background {
                background: url('../img/1st.png') center;
                background-size: cover;
             height:120px;
            }
            .mobile-background1 {
                background: url('../img/Artboard 8.png') center;
                background-size: cover;
             height:500px;
                margin-top: -5px;
            }
            .mobile-background2 {
                background: url('../img/Artboard 9.png') center;
                background-size: cover;
                height: 200px;
                margin-top: 0px;

            }
            .quiz {
                color: white !important;
                padding-top: -94px;
                padding-bottom: 50px;

            }
            .quiz input{
                margin-top: 10px !important;
            }

            input::placeholder {
                font-size: 12px !important;
            }
            .header-text{
                padding-top: 50px;
            }
            .quiz-header {
                font-size: 13px;
            }
        }

</style>
</head>
<body>

<div class="container-fluid desktop-background">
    <div class="row">
        <!-- Content for desktop -->
    </div>
</div>
<div class="container-fluid mobile-background">
    <div class="row">
        <!-- Content for mobile -->
    </div>
</div>
<div class="container-fluid desktop-background1">
    <div class="row">
        <!-- Content for desktop -->
    </div>
</div>
<div class="container-fluid mobile-background1">
    <div class="row">
        <!-- Content for mobile -->
    </div>
</div>

<div class="container-fluid"
     style="background: url('../img/Artboard 4.png') center; background-repeat: no-repeat; height: 406px">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h5 class="text-danger fw-bold mt-5 text-center">হ্যান্ডস অন কোর্সটি দেখতে নিচের তথ্যগুলো দিয়ে সহায়তা
                করুন </h5>

            <div class="row">
                <div class="col-md-6 col-6 mt-5">
                    <input type="text" class="form-control" name="" placeholder="আপনার নাম">
                </div>
                <div class="col-md-6 col-6 mt-5">
                    <input type="text" class="form-control" name="" placeholder="ফোন নাম্বার ">
                </div>
                <div class="col-md-6 col-6 mt-3">
                    <input type="text" class="form-control" name="" placeholder="ই-মেইল ">
                </div>
                <div class="col-md-6 col-6 mt-3">
                    <input type="text" class="form-control" name="" placeholder="জেন্ডার ">
                </div>
                <div class="col-md-2 col-4 mx-auto mt-5">
                    <a class="btn btn-danger "> <span class="p-3">পরবর্তী</span> </a>
                </div>

            </div>

        </div>


    </div>
</div>
<div class="container-fluid quiz"
     style="background: url('../img/Artboard 3.png') center; background-repeat: no-repeat; ">

    <h5 class="fw-bold text-center header-text">হ্যান্ডস অন কোর্সটি দেখতে নিচের তথ্যগুলো দিয়ে সহায়তা করুন </h5>

    <div class="row ">
        <div class="col-md-6 mx-auto">
            <div class="col-md-8 col-8 mx-auto mt-3">
                <label class="text-center quiz-header">কোনটি সাধারণত রান্নায় বেকিং বোঝায় ?</label> <br>
                <input type="text " class="form-control" name="" placeholder="খাবারকে চুলায় শুকনো তাপ দিয়ে ঘিরে রান্না করা">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
            </div>
            <div class="col-md-8 col-8 mx-auto mt-3">
                <label class="text-center quiz-header">প্যানে রান্নার সময় খাবার উল্টানো এবং ঘুরানোর জন্য কোনটি সাধারণত ব্যবহার করা হয়?
                </label> <br>
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
            </div>
            <div class="col-md-8 col-8 mx-auto mt-3" >
                <label class="text-center quiz-header">গ্রিলিং বা রোস্টিং করার আগে মাংস ম্যারিনেট করার উদ্দেশ্য কী?
                </label> <br>
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
            </div>
            <div class="col-md-8 col-8 mx-auto mt-3">
                <label class="text-center quiz-header">একটি ক্লাসিক ভিনেগ্রেট স্যালাড ড্রেসিং তৈরিতে কোন উপাদানটি অপরিহার্য?
                </label> <br>
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
            </div>
            <div class="col-md-8 col-8 mx-auto mt-3">
                <label class="text-center quiz-header"> রান্নায় লবণের প্রাথমিক কাজ কী?

                </label> <br>
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
                <input type="text " class="form-control" name="" placeholder="কোনটি সাধারণত রান্নায় বেকিং বোঝায়">
            </div>

        </div>




    </div>
</div>

<div class="container-fluid desktop-background2">
    <div class="row">
        <!-- Content for desktop -->
    </div>
</div>
<div class="container-fluid mobile-background2">
    <div class="row">
        <!-- Content for mobile -->
    </div>
</div>



</body>
</html>
