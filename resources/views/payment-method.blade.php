<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Method</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; }
        .topbar { background-color: #f8f9fa; padding: 10px 20px; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #ddd; }
        .topbar .menu { display: flex; gap: 20px; }
        .topbar .menu-item { cursor: pointer; font-weight: bold; }
        .topbar .menu-item.active { color: #198754; }
        .main-content { display: flex; justify-content: center; align-items: center; padding: 30px; height: 100vh; }
        .content-container { width: 100%; max-width: 500px; }
        .form-control { margin-bottom: 20px; }
        .pay-button, .cancel-button { width: 100%; margin-top: 10px; }
        .modal-confirm { color: #636363; width: 325px; margin: 30px auto; }
        .modal-confirm .modal-content { padding: 20px; border-radius: 5px; border: none; }
        .modal-confirm .modal-header { border-bottom: none; position: relative; }
        .modal-confirm h4 { text-align: center; font-size: 26px; margin: 30px 0 -15px; }
        .modal-confirm .icon-box { color: #fff; position: absolute; margin: 0 auto; left: 0; right: 0; top: -70px; width: 95px; height: 95px; border-radius: 50%; background: #82ce34; padding: 15px; text-align: center; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1); }
        .modal-confirm .icon-box i { font-size: 58px; position: relative; top: 3px; }
        .modal-confirm .btn { color: #fff; border-radius: 4px; background: #82ce34; text-decoration: none; transition: all 0.4s; line-height: normal; border: none; }
        .modal-confirm .btn:hover, .modal-confirm .btn:focus { background: #6fb32b; outline: none; }
    </style>
</head>
<body>

    <!-- Topbar -->
    <div class="topbar">
        <h5>PAY WITH</h5>
        <div class="menu">
            <div class="menu-item active" id="bank-tab" onclick="showTab('bank')">Bank</div>
            <div class="menu-item" id="card-tab" onclick="showTab('card')">Card</div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <div class="col-md-12 main-content">
                <div class="content-container">
                    <div id="bank-content">
                        <h4>Enter bank details to pay</h4>
                        <select class="form-control" name="bankName" id="bankName">
                            <option value="Bank Name" disabled selected hidden>Bank Name</option>
                            <option value="bankislam">Bank Islam</option>
                            <option value="maybank">Maybank</option>
                            <option value="rhb">RHB</option>
                        </select>                          
                        <input type="text" class="form-control" placeholder="Name on Card" >
                        <input type="text" class="form-control" placeholder="Account No.">
                        <button class="btn btn-success pay-button" data-toggle="modal" data-target="#myModal">Done</button>
                        <button id="cancelBookingBtn" class="btn btn-secondary cancel-button">Cancel Payment</button>
                    </div>

                    <div id="card-content" style="display: none;">
                        <h4>Enter your card details to pay</h4>
                        <input type="text" class="form-control" placeholder="CARD NUMBER" value="0000 0000 0000 0000" >
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="CARD EXPIRY" value="MM/YY" >
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="CVV" value="•••" >
                            </div>
                        </div>
                        <button class="btn btn-success pay-button" data-toggle="modal" data-target="#myModal">Done</button>
                        <button id="cancelBookingBtn" class="btn btn-secondary cancel-button">Cancel Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Payment Form -->
    <form id="paymentForm" action="{{ route('confirmPayment') }}" method="POST">
        @csrf
        <input type="hidden" name="bookingID" value="{{ $bookingID }}">
        <input type="hidden" name="paymentMethod" id="paymentMethodInput" value="Bank">
        <input type="hidden" name="totalAmount" value="{{ $totalAmount }}">
    </form>

    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>				
                    <h4 class="modal-title">Awesome!</h4>	
                </div>
                <div class="modal-body">
                    <p class="text-center">Your booking has been confirmed. Check your email for details.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-block" onclick="submitPayment()">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"></script>

    <script>
        function showTab(tab) {
            document.getElementById('bank-content').style.display = (tab === 'bank') ? 'block' : 'none';
            document.getElementById('card-content').style.display = (tab === 'card') ? 'block' : 'none';
            document.getElementById('qr-content') && (document.getElementById('qr-content').style.display = (tab === 'qr') ? 'block' : 'none');

            document.getElementById('bank-tab').classList.toggle('active', tab === 'bank');
            document.getElementById('card-tab').classList.toggle('active', tab === 'card');
        }

        // Cancel Booking Button
        document.addEventListener("DOMContentLoaded", () => {
            const cancelBookingBtn = document.getElementById("cancelBookingBtn");
            cancelBookingBtn.addEventListener("click", () => {
                const userConfirmed = confirm("Are you sure you want to cancel the booking?");
                if (userConfirmed) {
                    window.location.href = "{{ url('/') }}";
                }
            });
        });

        function submitPayment() {
            document.getElementById('paymentForm').submit();
        }
    </script>

</body>
</html>
