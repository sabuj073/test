<?php 
session_start();
if(!isset($_SESSION["userid"])){
  header("Location: index.php");
  die();
}
?>

<style type="text/css">

  .center{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .modal-box{
    top: 30%;
    opacity: 0;
    visibility: hidden;
    background: white;
    width:450px;
    height: auto;
    padding: 30px;
    border-radius: 5px;
    border: 1px solid #0C90A0;

  }
  .start-btn.show-modal{
    opacity: 0;
    visibility: hidden;
    z-index: 9999;
  }
  .modal-box.show-modal{
    top: 50%;
    opacity: 1;
    visibility: visible;
    transition: .4s;
    z-index:9999;
  }
  .modal-box .fa-times{
    position: absolute;
    top: 0;
    right: 0;
    height: 45px;
    width: 50px;
    line-height: 40px;
    color: black;
    font-size: 18px;
    border-radius: 0 5px 0 50px;
    padding-left: 13px;
    cursor: pointer;
    z-index:9999;
  }

  .modal-box header{
    font-size: 31px;
    margin-bottom: 10px;
  }
  .modal-box p{
    /* margin-bottom: 10px; */
    line-height: 20px;
    color: grey;
  }

}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Foreigner Loan in Korea</title>
  <link rel="shortcut icon" type="image/x-icon" href="image/logo.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    function step1_method(){
      var loan_start_date = $("#loan_start_date").val();
      var visa_expiry_date = $("#visa_expiry_date").val();
      if (loan_start_date!="") {
        get_pay_day();
        if (visa_expiry_date!="") {
          
          $.ajax({
            url: "php/method1.php",
            type:"POST",
            data :{
              visa_expiry_date:visa_expiry_date, 
              loan_start_date:loan_start_date
            },
            cache:false,
            success: function(response){
              var date = JSON.parse(response);
              $("#vis_remaining").html(date.months);
              $("#max_loan_period").html(date.max_loan);
            }

          });
        }
      }
    }
    function get_pay_day(){
      var loan_start_date = $("#loan_start_date").val();
     // var visa_expiry_date = $("#visa_expiry_date").val();
     var pay_day = $("#pay_day").val();
     $.ajax({
      url: "php/pay_day.php",
      type:"POST",
      data :{
        get_pay:pay_day,
        loan_start_date:loan_start_date

      },
      cache:false,
      success: function(response){
        var date = JSON.parse(response);
        console.log(response);
        $("#repayment_date").html(date.pay_day);
        $("#1st_repayment_day").html(date.loan_pay_day);
        getTable()
      }

    });

   }

   function step2_method(){
    var loan_period = $("#loan_period").val();
    var loan_amount = $("#loan_amount").val();
    $.ajax({
      url: "php/step2_method.php",
      type:"POST",
      data :{
        loan_period:loan_period, 
        loan_amount:loan_amount
      },
      cache:false,
      success: function(response){
        var date = JSON.parse(response);
        $("#monthly_amount").html(date.monthly_payable);
        $("#total_interest").html(date.interest);
        $("#loan_rate").html(date.interest_rate);
        $("#total_amount").html(date.totalamount);
        getTable();
      }

    });

  }

  function getTable(){
    var loan_period = $("#loan_period").val();
    var loan_amount = $("#loan_amount").val(); 
    var loan_start_date = $("#loan_start_date").val();
    var pay_day = $("#pay_day").val();
    $.ajax({
      url: "php/table.php",
      type:"POST",
      data :{
        loan_period:loan_period, 
        loan_amount:loan_amount,
        get_pay:pay_day,
        loan_start_date:loan_start_date
      },
      dataType : "text",
      success: function(data){
        $('#dataTable').html(data);
      }

    });

  }
</script>
</head>
<body>
  <?php require 'includes/header.php'; ?>
  <button style="float: right; margin-top: -10px;margin-right:10px;" class="button button6 start-btn">Documents need</button>

  
  <div class="container-fluid body_style">

    <h2 class="text" style="margin-top: 0px;">Foreigner Loan in Korea</h2>
    <br>
    <table  class="demo_input">
      <tr>
        <td><div class="table_head text">STEP 1. Input (blue color number)</div><br>
          <table class="step-1 table table_demo_data">
            <tbody>
              <tr>
                <th class="table_data_width">Loan start date<span class="text">*</span>
                  <td><input type="date" id="loan_start_date" name="loan_start_date" class="input_style" onchange="step1_method()"></td>
                </tr>
                <tr>
                  <th>Visa expiry date<span class="text">*</span></th>
                  <td><input type="date" id="visa_expiry_date" name="visa_expiry_date" class="input_style" onchange="step1_method()"></td>
                </tr>
                <tr>
                  <th>Pay day<span class="text">*</span></th>
                  <td><input type="number" id="pay_day" class="input_style" name="" onchange="get_pay_day()"></td>
                </tr>
              </tbody>
            </table>
            <div class="table_head text">Result Automatic Value</div><br>
            <table class="table table_demo_data">
              <tr>
                <th class="table_data_width">Visa Remaining</th>
                <td><div id="vis_remaining"></div></td>
              </tr>
              <tr>
                <th>Max loan period</th>
                <td><div id="max_loan_period"></div></td>
              </tr>
              <tr>
                <th>Max loan limit</th>
                <td><div id="max_loan_limit">15,000,000 won</div></td>
              </tr>
              <tr>
                <th>Repayment date</th>
                <td><div id="repayment_date"></div></td>
              </tr>
              <tr>
                <th>1st Repayment day</th>
                <td><div id="1st_repayment_day"></div></td>
              </tr>
            </table>
            <div class="table_head text">STEP 2. Input</div><br>
            <table width="60%" class="table">
              <tr>
                <th class="table_data_width">Loan Period<span class="text">*</span></th>
                <td><select style="width: 100%" id="loan_period" onchange="step2_method()">
                  <option value="">Select loan period</option>
                  <option value="1">1 Month</option>
                  <option value="2">2 Months</option>
                  <option value="3">3 Months</option>
                  <option value="4">4 Months</option>
                  <option value="5">5 Months</option>
                  <option value="6">6 Months</option>
                  <option value="7">7 Months</option>
                  <option value="8">8 Months</option>
                  <option value="9">9 Months</option>
                  <option value="10">10 Months</option>
                  <option value="11">11 Months</option>
                  <option value="12">12 Months</option>
                  <option value="13">13 Months</option>
                  <option value="14">14 Months</option>
                  <option value="15">15 Months</option>
                  <option value="16">16 Months</option>
                  <option value="17">17 Months</option>
                  <option value="18">18 Months</option>
                  <option value="19">19 Months</option>
                  <option value="20">20 Months</option>
                  <option value="21">21 Months</option>
                  <option value="22">22 Months</option>
                  <option value="23">23 Months</option>
                  <option value="24">24 Months</option>
                  <option value="25">25 Months</option>
                  <option value="26">26 Months</option>
                  <option value="27">27 Months</option>
                  <option value="28">28 Months</option>
                  <option value="29">29 Months</option>
                  <option value="30">30 Months</option>
                  <option value="31">31 Months</option>
                  <option value="32">32 Months</option>
                  <option value="33">33 Months</option>
                  <option value="34">34 Months</option>
                  <option value="35">35 Months</option>
                  <option value="36">36 Months</option>
                </select></td>
              </tr>
              <tr>
                <th>Loan amount<span class="text">*</span></th>
                <td><select style="width: 100%" id="loan_amount" onchange="step2_method()">
                  <option value="">Select loan amount</option>
                  <option value="1000000">1,000,000 won</option>
                  <option value="2000000">2,000,000 won</option>
                  <option value="3000000">3,000,000 won</option>
                  <option value="4000000">4,000,000 won</option>
                  <option value="5000000">5,000,000 won</option>
                  <option value="6000000">6,000,000 won</option>
                  <option value="7000000">7,000,000 won</option>
                  <option value="8000000">8,000,000 won</option>
                  <option value="9000000">9,000,000 won</option>
                  <option value="10000000">10,000,000 won</option>
                  <option value="11000000">11,000,000 won</option>
                  <option value="12000000">12,000,000 won</option>
                  <option value="13000000">13,000,000 won</option>
                  <option value="14000000">14,000,000 won</option>
                  <option value="15000000">15,000,000 won</option>
                <!-- <option value="16000000">16,000,000 won</option>
                <option value="17000000">17,000,000 won</option>
                <option value="18000000">18,000,000 won</option>
                <option value="19000000">19,000,000 won</option>
                <option value="20000000">20,000,000 won</option> -->
              </select></td>
            </tr>
            <tr>
              <th>Loan Rate</th>
              <td><div id="loan_rate"></div></td>
            </tr>
          </table>
          <div class="table_head text">Result Automatic Value</div><br>
          <table  class="table">
            <tr>
              <th class="table_data_width">Monthly amount</th>
              <td><div id="monthly_amount"></div></td>
            </tr>
            <tr>
              <th>Total Interest</th>
              <td><div id="total_interest"></div></td>
            </tr>
            <tr>
              <th>Total Amount</th>
              <td><div id="total_amount"></div></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <div class="table-responsive">
      <table class="table demo_view" id="dataTable">
        <thead>
         <tr>
          <th>Id</th>
          <th>Day</th>
          <th>Amount(A+B)</th>
          <th>Principal(A)</th>
          <th>Interest(B)</th>
          <th>Loan Balance</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>

<?php require 'includes/footer.php'; ?>

</body>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
  $(document).ready(function(){

    /*$('.modal-box').toggleClass("show-modal");
    $('.start-btn').toggleClass("show-modal");*/
    $('.fa-times').click(function(){
      $('.modal-box').toggleClass("show-modal");
      $('.start-btn').toggleClass("show-modal");
    });
    $('.start-btn').click(function(){
      window.location.href = "document.php";
    });

    
  });
  function btn_click(){
    var writername = $("#writername").val();
    var getanswer = $("#answer").prop("checked");
    var rating = $("#rating-value").val();
    var size = $('input[name=size]:checked').val()
    var title = $("#title").val();
    var review = $("#review").val();
    var email = $("#email").val();
  }
</script>


<style type="text/css">

  body, html {
    height: 100%;
  }

  * {
    box-sizing: border-box;
  }

  .demo_input{
    float: left;
    width:25%;
  }
  .demo_view{
    width: 90%;
    float: right;
  }
  .table_head{
    font-size: 20px;
  }
  .text{
    color: #FF6357;
  }
  th{
    background-color:#E5E7E9;
  }
  .bg_color{
    background-color: red;
  }
  #sticky-footer {
    flex-shrink: none;
  }
  .bg-dark{
    background-color: black;
    color: white;
    margin: 0;
    padding-top: 5px;
    padding-bottom: 5px;
    top: 0;
    bottom: 0;
    font-size: 25px;
  }
  a{
    text-decoration: none;
  }
  .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }

  .button2 {background-color: #008CBA;} /* Blue */
  .button3 {background-color: #f44336;} /* Red */ 
  .button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
  .button5 {background-color: #555555;} /* Black */
  .button6 {background-color: #FF6357;} /* Black */


  

  @media screen and (max-width: 600px) {
    .demo_input{
      float: left;
      width:100%;
    }
    .demo_view{
      width: 100%;
      float: left;
    }
  }
</style>

