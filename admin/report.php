<?php require("./layout/Header.php") ?>
<?php require("./layout/db.php") ?>

<div class="container mt-3">
    <h3 class="mt-4" style="color:#2b74e2;display:flex;flex-direction:row;justify-content:space-between">
        <span>Report :</span>
    </h3>

    <br>  
    <form onsubmit="document.getElementById('loader').style.display='block'" action="/admin/action/report.php" class="row" method="post">
        <div class="col-4"></div>
        <div class="form-floating mb-3 col-4">
            <input required type="text" class="form-control"  name="sid" placeholder="Staff ID">
            <label >Staff ID</label>
        </div>
        <div class="col-4"></div>
        <div class="col-4"></div>
        <div class="col-4">
            <button class="btn w-100" style="background-color:#2b74e2;color:#fff">Download</button>
        </div>
    </form> 
    <br>
</div>





<script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    if(urlParams.get('err')){
      document.write("<div id='err' style='position:fixed;bottom:30px; right:30px;background-color:#FF0000;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('err')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("err").style.display="none"
    }, 3000)
</script>

<script>
    if(urlParams.get('msg')){
      document.write("<div id='msg' style='position:fixed;bottom:30px; right:30px;background-color:#4CAF50;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('msg')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("msg").style.display="none"
    }, 3000)
</script>


<?php require("./layout/Footer.php") ?>