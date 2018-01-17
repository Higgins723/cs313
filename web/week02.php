<?php include("includes/header.php");?>

<link href="css/week02.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Week 02</h1>
            <div class="div1">
                <p>Div 1</p>
                <div class="input-group mb-3">
                  <input type="text" class="form-control newcolor" placeholder="Enter color here" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick(changeColor($('.newcolor').val())) form-control type="button">Change Color</button>
                  </div>
                </div>
            </div>
            <div class="div2">
                <p>Div 2</p>
            </div>
            <div class="div3">
                <p>Div 3</p>
            </div>
            <button type="button" onclick="week02Alert()"  class="btn btn-primary">Click Me</button>
        </div>
    </div>
    <hr/>
</div>

<script src="js/week02.js"></script>

<?php include("includes/footer.php");?>
