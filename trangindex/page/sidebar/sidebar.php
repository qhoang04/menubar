<style>
.dmsp {
    font-family: Arial, Helvetica, sans-serif;
    margin-left: -3.3vh;
    margin-right: -3vh;
    margin-top: -1.5vh;
    cursor: pointer;
    color: black;
    background-color: #15a69d;
    padding: 13px 10px;
}

ul li {
    font-family: Arial, Helvetica, sans-serif;
    list-style-type: none;
}
.listicon {
    content: "";
    display: inline-block;
    width: 17px;
    height: 17px;
    margin: -3px 10px;
    background: url("list-solid.svg") no-repeat;
    color: #fff;
}
.moreicon {
    content: "";
    display: inline-block;
    width: 17px;
    height: 17px;
    margin: -5px 20px;
    background: url("greater-than-solid.svg") no-repeat;
    color: #fff;
}
.navbar {
    font-size: 2.1vh;
    margin-top: 2%;
    background: rgba(0, 0, 0, 0.1);
    border-radius: 3px;
    color: black;
    width: 29vh;
    height: 70%;
    position: absolute;
    top: 0;
    left: 0;
    padding: 20px;
    margin-left: 90px;
    margin-top: 370px;
    box-shadow: 5px 7px 10px rgba(0, 0, 0, .5);
}

.navbar a {
    color: black;
    text-decoration: none;
    padding: 10px 15px;
    display: block;
}

.navbar a.active {
    background-color: #15a69d;
}

.submenu {
    padding-left: 20px;
    display: none;
}

.submenu a {
    color: black;
    text-decoration: none;
    padding: 10px 15px;
    display: block;
}
ul {
    padding-left: 2px;
}
.navbar ul li a:hover {
    background: rgba(0, 0, 0, 0.7);
    color: #fff;
}
</style>
<?php include("function.php") ?>
<script>
  function on_offMenu(event) {
    event.stopPropagation();
    var submenu = event.target.nextElementSibling;
    if (submenu) {
      event.target.classList.toggle('active');
      submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
    }
  }
</script>
<body>
  <div class="navbar" onclick="on_offMenu(event)">
  <p class="dmsp"><i class="listicon"></i>Danh mục sản phẩm</p>
    <?php
      echo buildMenu($conn); 
    ?>
  </div>
</body>
</html>