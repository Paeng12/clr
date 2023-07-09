<div class="card card-outline card-primary">
  <div class="card-body">
    <div class="container-fluid">

      <div class="form-group col-6">
        <label for="operatorid">รหัสพนักงาน</label>
        <input type="text" name="operatorid" id="operatorid" class="form-control" value="" onchange="changedata()" required>
      </div>
      <div class="form-group col-6">
        <label for="firstname">ชื่อ</label>
        <input type="text" name="firstname" id="firstname" class="form-control" value="" required>
      </div>
      <div class="form-group col-6">
        <label for="lastname">นามสกุล</label>
        <input type="text" name="lastname" id="lastname" class="form-control" value="" required>
      </div>
      <div class="form-group col-6">
        <label for="department">แผนก</label>
        <input type="text" name="department" id="department" class="form-control" value="" required>
      </div>
      <div class="form-group col-6">
        <label for="position">ตำแหน่ง</label>
        <input type="text" name="position" id="position" class="form-control" value="" required>
      </div>
      <div class="form-group col-6">
        <label for="shift">shift</label>
        <input type="text" name="shift" id="shift" class="form-control" value="" required>
      </div>
      <div class="form-group col-12">
        <div class="row">
          <div class="form-group col-6">
            <label>รายการขอเบิก รายการที่ 1</label>
            <div class="form-group col-12">
              <label for="request">เลือกการขอเบิก</label>

              <select name="request" id="request" class="form-control" required>
                <option value="">กรุณาเลือกข้อมูลขอเบิก</option>
                <?php
                // Connect to database and select categories table
                $db = mysqli_connect("172.18.106.100", "pe", "123456", "cleanroom");
                mysqli_set_charset($db, "utf8");
                $result = mysqli_query($db, "SELECT id, category FROM category");

                // Loop through categories and create option tags
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group col-12">
              <label for="color">สี</label>
              <select class="form-control" id="color" name="color">
                <option value="">กรุณาเลือกรายการขอเบิกก่อนเลือกสี</option>
              </select>
            </div>
            <div class="form-group col-12">
              <label for="size">ไซส์</label>
              <select class="form-control" id="size" name="size">
                <option value="">กรุณาเลือกสีก่อนเลือกไซส์</option>
              </select>
            </div>
          </div>

          <div class="form-group col-6">
            <label>รายการขอเบิก รายการที่ 2</label>
            <div class="form-group col-12">
              <label for="request2">เลือกการขอเบิก</label>

              <select name="request2" id="request2" class="form-control" required>
                <option value="">กรุณาเลือกข้อมูลขอเบิก</option>
                <?php
                // Connect to database and select categories table
                $db = mysqli_connect("172.18.106.100", "pe", "123456", "cleanroom");
                mysqli_set_charset($db, "utf8");
                $result = mysqli_query($db, "SELECT id, category FROM category");

                // Loop through categories and create option tags
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group col-12">
              <label for="color2">สี</label>
              <select class="form-control" id="color2" name="color2">
                <option value="">กรุณาเลือกรายการขอเบิกก่อนเลือกสี</option>
              </select>
            </div>
            <div class="form-group col-12">
              <label for="size2">ไซส์</label>
              <select class="form-control" id="size2" name="size2">
                <option value="">กรุณาเลือกสีก่อนเลือกไซส์</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group col-12">
        <div class="row">
          <div class="form-group col-6">
            <label>รายการขอเบิก รายการที่ 3</label>
            <div class="form-group col-12">
              <label for="request3">เลือกการขอเบิก</label>

              <select name="request3" id="request3" class="form-control" required>
                <option value="">กรุณาเลือกข้อมูลขอเบิก</option>
                <?php
                // Connect to database and select categories table
                $db = mysqli_connect("172.18.106.100", "pe", "123456", "cleanroom");
                mysqli_set_charset($db, "utf8");
                $result = mysqli_query($db, "SELECT id, category FROM category");

                // Loop through categories and create option tags
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group col-12">
              <label for="color3">สี</label>
              <select class="form-control" id="color3" name="color3">
                <option value="">กรุณาเลือกรายการขอเบิกก่อนเลือกสี</option>
              </select>
            </div>
            <div class="form-group col-12">
              <label for="size3">ไซส์</label>
              <select class="form-control" id="size3" name="size3">
                <option value="">กรุณาเลือกสีก่อนเลือกไซส์</option>
              </select>
            </div>
          </div>

          <div class="form-group col-6">
            <label>รายการขอเบิก รายการที่ 4</label>
            <div class="form-group col-12">
              <label for="request4">เลือกการขอเบิก</label>

              <select name="request4" id="request4" class="form-control" required>
                <option value="">กรุณาเลือกข้อมูลขอเบิก</option>
                <?php
                // Connect to database and select categories table
                $db = mysqli_connect("172.18.106.100", "pe", "123456", "cleanroom");
                mysqli_set_charset($db, "utf8");
                $result = mysqli_query($db, "SELECT id, category FROM category");

                // Loop through categories and create option tags
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group col-12">
              <label for="color4">สี</label>
              <select class="form-control" id="color4" name="color4">
                <option value="">กรุณาเลือกรายการขอเบิกก่อนเลือกสี</option>
              </select>
            </div>
            <div class="form-group col-12">
              <label for="size4">ไซส์</label>
              <select class="form-control" id="size4" name="size4">
                <option value="">กรุณาเลือกสีก่อนเลือกไซส์</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group col-12">
        <div class="row">
          <div class="form-group col-6">
            <label>รายการขอเบิก รายการที่ 5</label>
            <div class="form-group col-12">
              <label for="request5">เลือกการขอเบิก</label>

              <select name="request5" id="request5" class="form-control" required>
                <option value="">กรุณาเลือกข้อมูลขอเบิก</option>
                <?php
                // Connect to database and select categories table
                $db = mysqli_connect("172.18.106.100", "pe", "123456", "cleanroom");
                mysqli_set_charset($db, "utf8");
                $result = mysqli_query($db, "SELECT id, category FROM category");

                // Loop through categories and create option tags
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group col-12">
              <label for="color5">สี</label>
              <select class="form-control" id="color5" name="color5">
                <option value="">กรุณาเลือกรายการขอเบิกก่อนเลือกสี</option>
              </select>
            </div>
            <div class="form-group col-12">
              <label for="size5">ไซส์</label>
              <select class="form-control" id="size5" name="size5">
                <option value="">กรุณาเลือกสีก่อนเลือกไซส์</option>
              </select>
            </div>
          </div>
          <div class="form-group col-6">
            <label>รายการขอเบิก รายการที่ 6</label>
            <div class="form-group col-12">
              <label for="request6">เลือกการขอเบิก</label>

              <select name="request6" id="request6" class="form-control" required>
                <option value="">กรุณาเลือกข้อมูลขอเบิก</option>
                <?php
                // Connect to database and select categories table
                $db = mysqli_connect("172.18.106.100", "pe", "123456", "cleanroom");
                mysqli_set_charset($db, "utf8");
                $result = mysqli_query($db, "SELECT id, category FROM category");

                // Loop through categories and create option tags
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group col-12">
              <label for="color6">สี</label>
              <select class="form-control" id="color6" name="color6">
                <option value="">กรุณาเลือกรายการขอเบิกก่อนเลือกสี</option>
              </select>
            </div>
            <div class="form-group col-12">
              <label for="size6">ไซส์</label>
              <select class="form-control" id="size6" name="size6">
                <option value="">กรุณาเลือกสีก่อนเลือกไซส์</option>
              </select>
            </div>
          </div>

        </div>
      </div>
      <div class="form-group col-12">
        <div class="row">
          <div class="form-group col-6">
            <label>รายการขอเบิก รายการที่ 7</label>
            <div class="form-group col-12">
              <label for="request7">เลือกการขอเบิก</label>

              <select name="request7" id="request7" class="form-control" required>
                <option value="">กรุณาเลือกข้อมูลขอเบิก</option>
                <?php
                // Connect to database and select categories table
                $db = mysqli_connect("172.18.106.100", "pe", "123456", "cleanroom");
                mysqli_set_charset($db, "utf8");
                $result = mysqli_query($db, "SELECT id, category FROM category");

                // Loop through categories and create option tags
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group col-12">
              <label for="color7">สี</label>
              <select class="form-control" id="color7" name="color7">
                <option value="">กรุณาเลือกรายการขอเบิกก่อนเลือกสี</option>
              </select>
            </div>
            <div class="form-group col-12">
              <label for="size7">ไซส์</label>
              <select class="form-control" id="size7" name="size7">
                <option value="">กรุณาเลือกสีก่อนเลือกไซส์</option>
              </select>
            </div>
          </div>
          <div class="form-group col-6">
            <label>รายการขอเบิก รายการที่ 8</label>
            <div class="form-group col-12">
              <label for="request8">เลือกการขอเบิก</label>

              <select name="request8" id="request8" class="form-control" required>
                <option value="">กรุณาเลือกข้อมูลขอเบิก</option>
                <?php
                // Connect to database and select categories table
                $db = mysqli_connect("172.18.106.100", "pe", "123456", "cleanroom");
                mysqli_set_charset($db, "utf8");
                $result = mysqli_query($db, "SELECT id, category FROM category");

                // Loop through categories and create option tags
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['id'] . '">' . $row['category'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group col-12">
              <label for="color8">สี</label>
              <select class="form-control" id="color8" name="color8">
                <option value="">กรุณาเลือกรายการขอเบิกก่อนเลือกสี</option>
              </select>
            </div>
            <div class="form-group col-12">
              <label for="size8">ไซส์</label>
              <select class="form-control" id="size8" name="size8">
                <option value="">กรุณาเลือกสีก่อนเลือกไซส์</option>
              </select>
            </div>
          </div>

        </div>
      </div>
      <div class="form-group col-6">
        <label for="cause">สาเหตุการเบิก</label>
        <select name="cause" id="cause" class="form-control" required>
          <option value="">กรุณาเลือกสาเหตุการเบิก</option>
          <?php
          // Connect to database and select categories table
          $db = mysqli_connect("172.18.106.100", "pe", "123456", "cleanroom");
          mysqli_set_charset($db, "utf8");
          $result = mysqli_query($db, "SELECT * FROM cause");

          // Loop through categories and create option tags
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['cause'] . '">' . $row['cause'] . '</option>';
          }
          ?>
        </select>

        <label for="input" id="input-label" style="display:none;">กรุณากรอกข้อมูลเพิ่มเติม</label>
        <input type="text" name="input" id="input" class="form-control" value="" style="display:none;" required>
        <script>
          var causeSelect = document.getElementById("cause");
          var inputLabel = document.getElementById("input-label");
          var input = document.getElementById("input");

          causeSelect.addEventListener("change", function() {
            if (causeSelect.value == "อื่นๆ") {
              inputLabel.style.display = "block";
              input.style.display = "block";
            } else {
              inputLabel.style.display = "none";
              input.style.display = "none";
            }
          });
        </script>
      </div>
    </div>
  </div>
  <div class="card-footer">
    <div class="col-md-12">
      <div class="row">
        <botton class="btn btn-sm btn-primary mr-2" name="Submit" onclick="save()">save</botton>
        <!-- <button class="btn btn-sm btn-primary mr-2" form="manage-user">Save</button> -->
        <!-- <a class="btn btn-sm btn-secondary" href="">Cancel</a> -->
      </div>
    </div>
  </div>


</div>
<!-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
document.getElementById("operatorid").onchange = function() {myFunction()};

function myFunction() {
    var x = document.getElementById("operatorid");
}
</script> -->
<!-- <script src="./plugins/jquery/jquery.js">
</script> -->
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
  function changedata() {
    let opid = $("#operatorid").val();
    console.log(opid);
    $.ajax({
      url: './page/stockout/submit.php',
      type: 'POST', //หรือ post (ค่าเริ่มต้นเป็นแบบ get)
      data: {
        status: 'getdata',
        // csrfmiddlewaretoken: '{{ csrf_token }}',
        operatorid: opid,

        // positionid : positionid,
      },
      dataType: 'json', //หรือ json หรือ xml
      success: function(response) { //ฟังชันที่เรียกออกมา
        console.log(response); //ดูค่าว่าออกมาไหม
        $("#firstname").val(response[0]["name"]); //แทนค่าเข้าไปในไอดี response[0]["name"] เรียกจากใน array มาทีละตัว
        $("#lastname").val(response[0]["surname"]);
        $("#department").val(response[0]["department"]);
        $("#position").val(response[0]["oeposition"]);
        $("#shift").val(response[0]["shift"]);

        console.log(response[0]["name"]);
        // $("#firstname").show(name);
        //callback ที่เตรียมไว้รันตอนเซิร์ฟเวอร์ตอบกลับมา
      }
    });
  };

  function save() {
    let operatorid = $("#operatorid").val();
    let firstname = $("#firstname").val();
    let lastname = $("#lastname").val();
    let department = $("#department").val();
    let position = $("#position").val();
    let shift = $("#shift").val();
    let cause = $("#cause").val();
    let input = $("#input").val();

    let request = $("#request").val();
    let color = $("#color").val();
    let size = $("#size").val();

    let request2 = $("#request2").val();
    let color2 = $("#color2").val();
    let size2 = $("#size2").val();

    let request3 = $("#request3").val();
    let color3 = $("#color3").val();
    let size3 = $("#size3").val();

    let request4 = $("#request4").val();
    let color4 = $("#color4").val();
    let size4 = $("#size4").val();

    let request5 = $("#request5").val();
    let color5 = $("#color5").val();
    let size5 = $("#size5").val();

    let request6 = $("#request6").val();
    let color6 = $("#color6").val();
    let size6 = $("#size6").val();

    let request7 = $("#request7").val();
    let color7 = $("#color7").val();
    let size7 = $("#size7").val();

    let request8 = $("#request8").val();
    let color8 = $("#color8").val();
    let size8 = $("#size8").val();

    console.log(operatorid);
    console.log(firstname);
    console.log(lastname);
    console.log(department);
    console.log(position);
    console.log(shift);
    console.log(cause);
    console.log(input);

    console.log(request);
    console.log(color);
    console.log(size);

    console.log(request2);
    console.log(color2);
    console.log(size2);

    console.log(request3);
    console.log(color3);
    console.log(size3);

    console.log(request4);
    console.log(color4);
    console.log(size4);

    console.log(request5);
    console.log(color5);
    console.log(size5);

    console.log(request6);
    console.log(color6);
    console.log(size6);

    console.log(request7);
    console.log(color7);
    console.log(size7);

    console.log(request8);
    console.log(color8);
    console.log(size8);

    $.ajax({
      url: './page/stockout/submit.php',
      type: 'POST', //หรือ post (ค่าเริ่มต้นเป็นแบบ get)
      data: {
        status: 'save',
        // csrfmiddlewaretoken: '{{ csrf_token }}',
        operatorid: operatorid,
        firstname: firstname,
        lastname: lastname,
        department: department,
        position: position,
        shift: shift,
        cause: cause,
        input: input,

        request: request,
        color: color,
        size: size,

        request2: request2,
        color2: color2,
        size2: size2,

        request3: request3,
        color3: color3,
        size3: size3,

        request4: request4,
        color4: color4,
        size4: size4,

        request5: request5,
        color5: color5,
        size5: size5,

        request6: request6,
        color6: color6,
        size6: size6,

        request7: request7,
        color7: color7,
        size7: size7,

        request8: request8,
        color8: color8,
        size8: size8,


        // positionid : positionid,
      },
      dataType: 'json', //หรือ json หรือ xml
      success: function(response) { //ฟังชันที่เรียกออกมา
        console.log(response); //ดูค่าว่าออกมาไหม
        alert(response["status"]);
        // location.reload();
        if (response["status"] === "การร้องขอสำเร็จแล้ว") {
          let operatorid = $("#operatorid").val("");
          let firstname = $("#firstname").val("");
          let lastname = $("#lastname").val("");
          let department = $("#department").val("");
          let position = $("#position").val("");
          let shift = $("#shift").val("");
          let cause = $("#cause").val("");
          let input = $("#input").val("");

          let request = $("#request").val("");
          let color = $("#color").val("");
          let size = $("#size").val("");

          let request2 = $("#request2").val("");
          let color2 = $("#color2").val("");
          let size2 = $("#size2").val("");

          let request3 = $("#request3").val("");
          let color3 = $("#color3").val("");
          let size3 = $("#size3").val("");

          let request4 = $("#request4").val("");
          let color4 = $("#color4").val("");
          let size4 = $("#size4").val("");

          let request5 = $("#request5").val("");
          let color5 = $("#color5").val("");
          let size5 = $("#size5").val("");

          let request6 = $("#request6").val("");
          let color6 = $("#color6").val("");
          let size6 = $("#size6").val("");

          let request7 = $("#request7").val("");
          let color7 = $("#color7").val("");
          let size7 = $("#size7").val("");

          let request8 = $("#request8").val("");
          let color8 = $("#color8").val("");
          let size8 = $("#size8").val("");
        }

        // if (response["status"] === "Operator ID หรือ user ถูกใช้ไปแล้ว") {
        //   let operatorid = $("#operatorid").val("");
        //   let username = $("#username").val("");
        // }

        // $("#firstname").val(response[0]["name"]);//แทนค่าเข้าไปในไอดี response[0]["name"] เรียกจากใน array มาทีละตัว
        // $("#lastname").val(response[0]["surname"]);
        // $("#department").val(response[0]["department"]);
        // $("#position").val(response[0]["oeposition"]);
        // console.log(response[0]["name"]);
        // // $("#firstname").show(name);
        //   //callback ที่เตรียมไว้รันตอนเซิร์ฟเวอร์ตอบกลับมา
      }
    });
  };

  $("#request").on('change', function() {
    let request = $('#request').val();
    console.log(request);
    if (request === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX request to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          request: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.colors) {
            var colorSelect = $('#color');
            colorSelect.empty(); // clear previous options
            colorSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.colors, function(index, color) {
              colorSelect.append($('<option>').text(color).attr('value', color));
            });
          }
        }
      });
    }
  });


  $("#color").on('change', function() {
    let request = $('#request').val();
    console.log(request);
    if (color === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX color to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          color: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.sizes) {
            var sizeSelect = $('#size');
            sizeSelect.empty(); // clear previous options
            sizeSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.sizes, function(index, size) {
              sizeSelect.append($('<option>').text(size).attr('value', size));
            });
          }
        }
      });
    }
  });


  $("#request2").on('change', function() {
    let request = $('#request2').val();
    console.log(request);
    if (request === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX request to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          request: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.colors) {
            var colorSelect = $('#color2');
            colorSelect.empty(); // clear previous options
            colorSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.colors, function(index, color) {
              colorSelect.append($('<option>').text(color).attr('value', color));
            });
          }
        }
      });
    }
  });


  $("#color2").on('change', function() {
    let request = $('#request2').val();
    console.log(request);
    if (color === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color2').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX color to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          color: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.sizes) {
            var sizeSelect = $('#size2');
            sizeSelect.empty(); // clear previous options
            sizeSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.sizes, function(index, size) {
              sizeSelect.append($('<option>').text(size).attr('value', size));
            });
          }
        }
      });
    }
  });

  $("#request3").on('change', function() {
    let request = $('#request3').val();
    console.log(request);
    if (request === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX request to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          request: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.colors) {
            var colorSelect = $('#color3');
            colorSelect.empty(); // clear previous options
            colorSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.colors, function(index, color) {
              colorSelect.append($('<option>').text(color).attr('value', color));
            });
          }
        }
      });
    }
  });


  $("#color3").on('change', function() {
    let request = $('#request3').val();
    console.log(request);
    if (color === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color3').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX color to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          color: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.sizes) {
            var sizeSelect = $('#size3');
            sizeSelect.empty(); // clear previous options
            sizeSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.sizes, function(index, size) {
              sizeSelect.append($('<option>').text(size).attr('value', size));
            });
          }
        }
      });
    }
  });

  $("#request4").on('change', function() {
    let request = $('#request4').val();
    console.log(request);
    if (request === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX request to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          request: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.colors) {
            var colorSelect = $('#color4');
            colorSelect.empty(); // clear previous options
            colorSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.colors, function(index, color) {
              colorSelect.append($('<option>').text(color).attr('value', color));
            });
          }
        }
      });
    }
  });


  $("#color4").on('change', function() {
    let request = $('#request4').val();
    console.log(request);
    if (color === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color4').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX color to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          color: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.sizes) {
            var sizeSelect = $('#size4');
            sizeSelect.empty(); // clear previous options
            sizeSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.sizes, function(index, size) {
              sizeSelect.append($('<option>').text(size).attr('value', size));
            });
          }
        }
      });
    }
  });

  $("#request5").on('change', function() {
    let request = $('#request5').val();
    console.log(request);
    if (request === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX request to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          request: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.colors) {
            var colorSelect = $('#color5');
            colorSelect.empty(); // clear previous options
            colorSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.colors, function(index, color) {
              colorSelect.append($('<option>').text(color).attr('value', color));
            });
          }
        }
      });
    }
  });


  $("#color5").on('change', function() {
    let request = $('#request5').val();
    console.log(request);
    if (color === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color5').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX color to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          color: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.sizes) {
            var sizeSelect = $('#size5');
            sizeSelect.empty(); // clear previous options
            sizeSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.sizes, function(index, size) {
              sizeSelect.append($('<option>').text(size).attr('value', size));
            });
          }
        }
      });
    }
  });

  $("#request6").on('change', function() {
    let request = $('#request6').val();
    console.log(request);
    if (request === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX request to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          request: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.colors) {
            var colorSelect = $('#color6');
            colorSelect.empty(); // clear previous options
            colorSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.colors, function(index, color) {
              colorSelect.append($('<option>').text(color).attr('value', color));
            });
          }
        }
      });
    }
  });


  $("#color6").on('change', function() {
    let request = $('#request6').val();
    console.log(request);
    if (color === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color6').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX color to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          color: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.sizes) {
            var sizeSelect = $('#size6');
            sizeSelect.empty(); // clear previous options
            sizeSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.sizes, function(index, size) {
              sizeSelect.append($('<option>').text(size).attr('value', size));
            });
          }
        }
      });
    }
  });
  $("#request7").on('change', function() {
    let request = $('#request7').val();
    console.log(request);
    if (request === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX request to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          request: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.colors) {
            var colorSelect = $('#color7');
            colorSelect.empty(); // clear previous options
            colorSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.colors, function(index, color) {
              colorSelect.append($('<option>').text(color).attr('value', color));
            });
          }
        }
      });
    }
  });


  $("#color7").on('change', function() {
    let request = $('#request7').val();
    console.log(request);
    if (color === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color7').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX color to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          color: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.sizes) {
            var sizeSelect = $('#size7');
            sizeSelect.empty(); // clear previous options
            sizeSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.sizes, function(index, size) {
              sizeSelect.append($('<option>').text(size).attr('value', size));
            });
          }
        }
      });
    }
  });
  $("#request8").on('change', function() {
    let request = $('#request8').val();
    console.log(request);
    if (request === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX request to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          request: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.colors) {
            var colorSelect = $('#color8');
            colorSelect.empty(); // clear previous options
            colorSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.colors, function(index, color) {
              colorSelect.append($('<option>').text(color).attr('value', color));
            });
          }
        }
      });
    }
  });


  $("#color8").on('change', function() {
    let request = $('#request8').val();
    console.log(request);
    if (color === '') {
      // If the "Select Department" option is selected, add the default "Select Process" option
      $('#color8').html('<option value="">กรุณาเลือกรายการขอเบิก</option>');
    } else {
      // 	// Otherwise, make an AJAX color to the server to get the options for the selected department
      $.ajax({
        method: "POST",
        url: "./page/stockout/apiselectstockot.php",
        data: {
          color: request,
        },
        dataType: "json",
        success: function(response) {
          console.log(response);
          if (response.sizes) {
            var sizeSelect = $('#size8');
            sizeSelect.empty(); // clear previous options
            sizeSelect.append($('<option>').text('กรุณาเลือกสี').attr('value', '')); // add default option
            $.each(response.sizes, function(index, size) {
              sizeSelect.append($('<option>').text(size).attr('value', size));
            });
          }
        }
      });
    }
  });
</script>