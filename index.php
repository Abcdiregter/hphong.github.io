
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAKE BILL BY JAZ7BAZ</title>
    <link rel="stylesheet" href="style.css" />

    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <script src="index.js"></script>
    <script src="api.js"></script>
  </head>

  <body onload="init()">
    <img style="height: 30px" src="menu.png" alt="menu-img" />
    <img style="height: 30px" src="logo-techcombank.svg" alt="tech-img" />

    <div style="text-align: center">
      <p id="exist-key"></p>
    </div>

    <form
      action=""
      class="container"
      id="transfer-form"
      onsubmit="return
      validateForm()"
    >
      <p class="title">Fake Bill Chuyển Tiền(Nhớ Dịch Sang Tiếng Việt)</p>
    
      <div class="item">
        <label for="banks" class="title-item">Ngân hàng thụ hưởng</label>
        <div style="width: 60%">
          <select name="bankId" id="banks" class="input"></select>
        </div>
      </div>
      <div class="item">
        <label for="accountNumber" class="title-item">Số tài khoản</label>
        <div style="width: 60%">
          <input
            style="box-sizing: border-box"
            type="text"
            id="accountNumber"
            class="input"
          />
        </div>
      </div>
      <div class="item">
        <label for="accountName">Tên người thụ hưởng</label>
        <div style="width: 60%">
          <input
            style="box-sizing: border-box"
            type="text"
            id="accountName"
            class="input"
          />
        </div>
      </div>
      <div class="item">
        <label for="Amount">Số Tiền</label>
        <div style="width: 60%">
          <input
            style="box-sizing: border-box"
            type="text"
            id="Amount"
            class="input"
            oninput="number_format()"
          />
        </div>
      </div>
      <div class="item">
        <label for="message">Nội Dung</label>
      </div>
      <div>
        <textarea rows="4" cols="50" id="message" class="input"></textarea>
      </div>

      <button
        class="button"
        type="button"
        id="confirm-btn"
        style="line-height: 40px"
        onclick="submitTransfer()"
      >
        Confirm
      </button>

      <p id="error"></p>
    </form>

    <div id="container-loading">
      <img src="loading.gif" alt="" class="loading" />
    </div>

    <div
      class="bill-container"
      id="bill"
      style="display: none; background: url(back.svg)"
    >
      <bb-icon-ui name="transfer-success" class="mb-4">
        <img src="transfer-success.svg" /></bb-icon-ui
      ><br />
      <img style="height: 100%" src="logo-techcombank.svg" alt="tech-img" />
      <h2>
        Chuyển thành công <br />tới
        <strong><span id="bill-name"></span></strong> <br />
        VND <span id="bill-amount"></span>
      </h2>
      <p>
        Thông tin chi tiết <br />
        <strong
          ><span id="bill-bank"></span> <br />
          <span id="bill-account"></span
        ></strong>
      </p>

      <p>
        Lời nhắn <br />
        <strong><span id="bill-message"></span></strong>
      </p>

      <p>
        Ngày thực hiện<br />
        <strong><span id="bill-transaction-time"></span></strong>
      </p>
      <p>
        Mã giao dịch<br /><strong
          ><span style="letter-spacing: 1px" id="bill-code"></span
        ></strong>
      </p>
      <br /><br />
      <button class="button">
        <a
          href="https://jaz7baz.blogspot.com/"
          style="color: white; text-decoration: none; line-height: 40px"
        >
         Hoàn thành
        </a>
      </button>
    </div>

    <script>
      const time = Math.floor(Math.random() * (5000 - 2750 + 1)) + 2750;
      const confirmBtn = document.querySelector('#confirm-btn');
      const loadingContainer = document.querySelector('#container-loading');

      confirmBtn.addEventListener('click', (event) => {
        event.preventDefault();
        loadingContainer.style.display = 'flex';

        setTimeout(() => {
          loadingContainer.style.display = 'none';
        }, time);
        
      });


      function submitTransfer() {
        var form = document.getElementById("transfer-form");
        form.style.display = "none";

        setTimeout(function () {
          var bill = document.getElementById("bill");
          bill.style.display = "block";

          var transactionTime = new Date().toLocaleString();
          document.getElementById("bill-transaction-time").textContent =
            transactionTime;

          displayBill();
        }, time + 100);

        return false;
      }

      function number_format(){
        var input = document.getElementById("Amount");
        var value = input.value;
        var numericValue = value.replace(/\D/g, "");
        var formattedValue = Number(numericValue).toLocaleString();
        input.value = formattedValue;
      }

      function displayBill() {
        // Get the form values
        var code = generateCode(14);
        var bank = document.getElementById("banks").value;
        if (bank == "970415")
          bank =
            "Ngân hàng TMCP Công Thương Việt Nam ";
        else if (bank == "970400")
          bank = "Ngân Hàng TMCP Công Thương Sài Gòn";
        else if (bank == "970403")
          bank = "Ngân hàng TMCP Sài Gòn Thương Tín";
        else if (bank == "970405")
          bank =
            "Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam ";
        else if (bank == "970406")
          bank = "NGÂN HÀNG TMCP ĐÔNG Á ";
        else if (bank == "970407")
          bank =
            "Ngân Hàng Thương Mại Cổ Phần Kỹ Thương Việt Nam ";
        else if (bank == "970408")
          bank = "Ngân hàng Thương mại TNHH MTV Dầu Khí Toàn Cầu ";
        else if (bank == "970414")
          bank =
            "Ngân hàng TMCP Đại Dương ";
        else if (bank == "970416")
          bank = "Ngân Hàng Thương Mại Cổ Phần Á Châu ";
        else if (bank == "970418")
          bank =
            "Ngân hàng TMCP Đầu tư và Phát triển Việt Nam ";
        else if (bank == "970422")
          bank = "Ngân hàng TMCP Quân Đội ";
        else if (bank == "970448")
          bank = "Orient Joint-stock Commercial Bank ";
        else if (bank == "970436")
          bank =
            "Ngân hàng TMCP Ngoại thương Việt Nam";
        else if (bank == "970423")
          bank = "Ngân hàng TMCP Tiên Phong";
        else if (bank == "970432") bank = "Ngân hàng Việt Nam Thịnh Vượng ";

        var account = document.getElementById("accountNumber").value;
        var name = document.getElementById("accountName").value;
        var amount = document.getElementById("Amount").value;
        var message = document.getElementById("message").value;

        if (message == "") message = "Chuyen khoan";

        // Update the bill values
        document.getElementById("bill-bank").textContent = bank;
        document.getElementById("bill-account").textContent = account;
        document.getElementById("bill-name").textContent = name;
        document.getElementById("bill-amount").textContent = amount;
        document.getElementById("bill-message").textContent = message;
        document.getElementById("bill-code").textContent = "FT" + code;

        // Show the bill
        document.getElementById("bill").style.display = "block";

        // Hide the form
        document.getElementById("transfer-form").style.display = "none";
      }

      function generateCode(length) {
        var characters = "0123456789";
        var code = "";
        for (var i = 0; i < length; i++) {
          var randomIndex = Math.floor(Math.random() * characters.length);
          code += characters.charAt(randomIndex);
        }
        return code;
      }
    </script>
  </body>
</html>
