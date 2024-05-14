<?php
include "isLoggedIn.php";
$conn = mysqli_connect("localhost", "root", "", "agencydb");
if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
} else {
    if (isset($_GET['destID'])) {
        $id = mysqli_real_escape_string($conn, $_GET['destID']);
        $getData = "SELECT * FROM destination WHERE DestinationID= $id";
        $result = mysqli_query($conn, $getData);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $destName = $row['DestinationName'];
                $price = $row['DestinationPrice'];
                $destID = $row['DestinationID'];
                $destType = $row['Type'];
                $destRev = $row['Revenue'];
            }
      
            mysqli_free_result($result);
            mysqli_close($conn);
            if (isset($_POST['payment'])) {
                header("Location: bill.php?cardNumber=$cardNumber&expiry=$expiry&cvv=$cvv&cardName=$cardName&destName=$destName&price=$price");

            }


            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <title>Processing Payment</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
                    type="text/css" />
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                        font-family: 'Poppins', sans-serif
                    }

                    .container {
                        margin: 30px auto;
                    }

                    .container .card {
                        width: 100%;
                        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                        background: #fff;
                        border-radius: 0px;
                    }

                    body {
                        background: #eee
                    }



                    .btn.btn-primary {
                        background-color: #ddd;
                        color: black;
                        box-shadow: none;
                        border: none;
                        font-size: 20px;
                        width: 100%;
                        height: 100%;
                    }

                    .btn.btn-primary:focus {
                        box-shadow: none;
                    }

                    .container .card .img-box {
                        width: 80px;
                        height: 50px;
                    }

                    .container .card img {
                        width: 100%;
                        object-fit: fill;
                    }

                    .container .card .number {
                        font-size: 24px;
                    }

                    .container .card-body .btn.btn-primary .fab.fa-cc-paypal {
                        font-size: 32px;
                        color: #3333f7;
                    }

                    .fab.fa-cc-amex {
                        color: #1c6acf;
                        font-size: 32px;
                    }

                    .fab.fa-cc-mastercard {
                        font-size: 32px;
                        color: red;
                    }

                    .fab.fa-cc-discover {
                        font-size: 32px;
                        color: orange;
                    }

                    .c-green {
                        color: green;
                    }

                    .box {
                        height: 40px;
                        width: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        background-color: #ddd;
                    }

                    .btn.btn-primary.payment {
                        background-color: #1c6acf;
                        color: white;
                        border-radius: 0px;
                        height: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-top: 24px;
                    }


                    .form__div {
                        height: 50px;
                        position: relative;
                        margin-bottom: 24px;
                    }

                    .form-control {
                        width: 100%;
                        height: 45px;
                        font-size: 14px;
                        border: 1px solid #DADCE0;
                        border-radius: 0;
                        outline: none;
                        padding: 2px;
                        background: none;
                        z-index: 1;
                        box-shadow: none;
                    }

                    .form__label {
                        position: absolute;
                        left: 16px;
                        top: 10px;
                        background-color: #fff;
                        color: #80868B;
                        font-size: 16px;
                        transition: .3s;
                        text-transform: uppercase;
                    }

                    .form-control:focus+.form__label {
                        top: -8px;
                        left: 12px;
                        color: #1A73E8;
                        font-size: 12px;
                        font-weight: 500;
                        z-index: 10;
                    }

                    .form-control:not(:placeholder-shown).form-control:not(:focus)+.form__label {
                        top: -8px;
                        left: 12px;
                        font-size: 12px;
                        font-weight: 500;
                        z-index: 10;
                    }

                    .form-control:focus {
                        border: 1.5px solid #1A73E8;
                        box-shadow: none;
                    }
                </style>

                <script>
                    // Define the function for formatting card number and date inputs
                    $(document).ready(function () {
                        // For Card Number formatted input
                        var cardNum = document.getElementById('cr_no');
                        cardNum.onkeyup = function (e) {
                            if (this.value == this.lastValue) return;
                            var caretPosition = this.selectionStart;
                            var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
                            var parts = [];

                            for (var i = 0, len = sanitizedValue.length; i < len; i += 4) {
                                parts.push(sanitizedValue.substring(i, i + 4));
                            }

                            for (var i = caretPosition - 1; i >= 0; i--) {
                                var c = this.value[i];
                                if (c < '0' || c > '9') {
                                    caretPosition--;
                                }
                            }
                            caretPosition += Math.floor(caretPosition / 4);

                            this.value = this.lastValue = parts.join(' ');
                            this.selectionStart = this.selectionEnd = caretPosition;
                        }

                        // For Date formatted input
                        var expDate = document.getElementById('exp');
                        expDate.onkeyup = function (e) {
                            if (this.value == this.lastValue) return;
                            var caretPosition = this.selectionStart;
                            var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
                            var parts = [];

                            for (var i = 0, len = sanitizedValue.length; i < len; i += 2) {
                                parts.push(sanitizedValue.substring(i, i + 2));
                            }

                            for (var i = caretPosition - 1; i >= 0; i--) {
                                var c = this.value[i];
                                if (c < '0' || c > '9') {
                                    caretPosition--;
                                }
                            }
                            caretPosition += Math.floor(caretPosition / 2);

                            this.value = this.lastValue = parts.join('/');
                            this.selectionStart = this.selectionEnd = caretPosition;
                        }
                    });
                </script>


                </script>


            </head>

            <body>
                <br><br><br><br><br><br><br>
                <div class="container">
                    <div class="col-12 mt-4">
                        <div class="card p-3">
                            <p class="mb-0 fw-bold h4">Payment Methods</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card p-3">
                            <div class="card-body border p-0">
                                <div class="collapse p-3 pt-0" id="collapseExample">
                                    <div class="row">
                                        <div class="col-8">
                                            <p class="h4 mb-0">Summary</p>
                                            <p class="mb-0"><span class="fw-bold">Product:</span><span
                                                    class="c-green"><?php echo $destName; ?></span></p>
                                            <p class="mb-0"><span class="fw-bold">Price:</span><span
                                                    class="c-green">$<?php echo $price; ?></span></p>
                                            <p class="mb-0">Please enter your payment details in order to proceed with your booking.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border p-0">
                                <p>
                                    <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between"
                                        data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                        aria-controls="collapseExample">
                                        <span class="fw-bold">Credit Card</span>
                                        <br><br>
                                        <span>
                                            <span class="fab fa-cc-amex"></span>
                                            <span class="fab fa-cc-mastercard"></span>
                                            <span class="fab fa-cc-discover"></span>
                                        </span>
                                    </a>
                                </p>
                                <div class="collapse show p-3 pt-0" id="collapseExample">
                                    <div class="row">
                                        <div class="col-lg-5 mb-lg-0 mb-3">
                                            <p class="h4 mb-0">Summary</p>
                                            <p class="mb-0"><span class="fw-bold">Client Name:</span><span
                                                    class="c-green"><?php echo $_SESSION['username']; ?></span></p>
                                            <p class="mb-0"><span class="fw-bold">Product:</span><span
                                                    class="c-green"><?php echo $destName; ?></span></p>
                                            <p class="mb-0"><span class="fw-bold">Price:</span><span
                                                    class="c-green">$<?php echo $price; ?></span></p>
                                            <p class="mb-0">Please enter your payment details in order to proceed with your booking.
                                            </p>
                                        </div>
                                        <div class="col-lg-7">
                                            <form method="post" action="bill.php" class="form" name="paymentForm"
                                                onsubmit="return validateForm()">
                                                <!-- Other form fields -->
                                                <input type="hidden" name="destName" value="<?php echo $destName; ?>">
                                                <input type="hidden" name="price" value="<?php echo $price; ?>">



                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form__div">
                                                            <input type="text" id="cr_no" class="form-control" placeholder=""
                                                                required minlength="19" maxlength="19">
                                                            <label for="cr_no" class="form__label">Card Number</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form__div">
                                                            <input type="text" id="exp" class="form-control" placeholder=" "
                                                                required minlength="5" maxlength="5">
                                                            <label for="exp" class="form__label">MM / yy</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form__div">
                                                            <input type="password" class="form-control" placeholder=" " required
                                                                minlength="3" maxlength="3">
                                                            <label for="" class="form__label">CVV Code</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form__div">
                                                            <input type="text" class="form-control" placeholder=" " required>
                                                            <label for="" class="form__label">Name on the Card</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12">

                                                    <input class="btn btn-primary payment" type="submit" name="payment"
                                                        value="Make Payment">


                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </body>

            </html>
            <?php
        }
    } else {
        echo "Destination ID not found";
    }
}
?>