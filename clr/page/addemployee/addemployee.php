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
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="" required autocomplete="off">
      </div>
      <div class="form-group col-6">
        <label for="password">Password</label>
        <input type="text" class="form-control" id="password" name="password">
      </div>
      <div class="form-group col-6">
        <label for="type">ประเภทการดูแลระบบ</label>
        <select name="type" id="type" class="custom-select" value="" required>
          <option value="ADMIN">Administrator</option>
          <option value="STAFF">Staff</option>
        </select>
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
<script src="./plugins/jquery/jquery.js">
</script>
<script>
  function changedata() {
    let opid = $("#operatorid").val();
    console.log(opid);
    $.ajax({
      url: './page/addemployee/submit.php',
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
    let username = $("#username").val();
    let password = $("#password").val();
    let type = $("#type").val();

    console.log(operatorid);
    console.log(firstname);
    console.log(lastname);
    console.log(department);
    console.log(position);
    console.log(username);
    console.log(password);
    console.log(type);
    $.ajax({
      url: './page/addemployee/submit.php',
      type: 'POST', //หรือ post (ค่าเริ่มต้นเป็นแบบ get)
      data: {
        status: 'save',
        // csrfmiddlewaretoken: '{{ csrf_token }}',
        operatorid: operatorid,
        firstname: firstname,
        lastname: lastname,
        department: department,
        position: position,
        username: username,
        password: password,
        type: type,
        // positionid : positionid,
      },
      dataType: 'json', //หรือ json หรือ xml
      success: function(response) { //ฟังชันที่เรียกออกมา
        console.log(response); //ดูค่าว่าออกมาไหม
        alert(response["status"])
        if (response["status"] === "ลงทะเบียนสำเร็จแล้ว") {
          // let operatorid = $("#operatorid").val("");
          // let firstname = $("#firstname").val("");
          // let lastname = $("#lastname").val("");
          // let department = $("#department").val("");
          // let position = $("#position").val("");
          // let username = $("#username").val("");
          // let password = $("#password").val("");
          // let type = $("#type").val("");
          window.location.href = 'http://172.18.106.100:8888/clr/index.php?page=showemployee'
        }

        if (response["status"] === "Operator ID หรือ user ถูกใช้ไปแล้ว") {
          let operatorid = $("#operatorid").val("");
          let username = $("#username").val("");
        }

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
</script>