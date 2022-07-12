<?php
// Load Necessary Classes
require_once('classes/load_all_class.php');

echo '<nav class="navbar sticky-top navbar-expand navbar-light bg-light" style="background-color: #f15d30 !important;">
<div class="container-fluid">
  <img src="favicon.png" alt="" class="navbar-brand align-text-top d-inline-block" width="45" height="60">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    &nbsp;


      <li class="nav-item">


        <input class="form-control form-inline" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
        <datalist id="datalistOptions">
          <option value="San Francisco">
          <option value="New York">
          <option value="Seattle">
          <option value="Los Angeles">
          <option value="Chicago">
        </datalist>


      </li>&nbsp;
      <li class="nav-item">


        <input class="form-control form-inline" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
        <datalist id="datalistOptions">
          <option value="San Francisco">
          <option value="New York">
          <option value="Seattle">
          <option value="Los Angeles">
          <option value="Chicago">
        </datalist>


      </li> &nbsp;
      <li class="nav-item">


        <input class="form-control form-inline" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
        <datalist id="datalistOptions">
          <option value="San Francisco">
          <option value="New York">
          <option value="Seattle">
          <option value="Los Angeles">
          <option value="Chicago">
        </datalist>


      </li>
      &nbsp;
      <li class="nav-item">
      <button class="btn btn-inline-success" type="submit" style="background-color: #0a4d53; color: aliceblue;">Search</button>
      </li>

    </ul>


  </div>
</div>
</nav>';